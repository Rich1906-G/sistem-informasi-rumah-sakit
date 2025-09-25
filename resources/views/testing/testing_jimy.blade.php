<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Rawat Jalan - Jadwal Dokter</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        /* ========================================================= */
        /* Custom Styles for Grid Layout */
        /* ========================================================= */
        .schedule-grid {
            display: grid;
            /* grid-template-columns akan diatur oleh JS berdasarkan jumlah hari */
            border-collapse: collapse;
            width: 100%;
            overflow-x: auto;
            /* Memungkinkan scroll horizontal jika terlalu banyak kolom */
        }

        /* Membuat sidebar dan header kolom "NOW" sticky */
        .sticky-left {
            position: sticky;
            left: 0;
            z-index: 10;
            background-color: #f8f9fa;
            border-right: 1px solid #ccc;
        }

        .header-cell {
            background-color: #007bff;
            /* Warna biru cerah */
            color: white;
            padding: 10px;
            font-weight: bold;
            border: 1px solid #0056b3;
            text-align: center;
            white-space: nowrap;
        }

        .doctor-name-cell {
            background-color: #e9ecef;
            padding: 10px;
            font-weight: bold;
            border: 1px solid #ccc;
            cursor: pointer;
            text-align: left;
            white-space: nowrap;
        }

        .schedule-cell {
            padding: 10px;
            min-height: 50px;
            border: 1px solid #ccc;
            text-align: center;
            transition: background-color 0.3s;
        }

        .slot-time {
            background-color: #e0f7fa;
            border: 1px solid #b2ebf2;
            padding: 5px;
            margin: 2px auto;
            border-radius: 4px;
            font-size: 0.9em;
            cursor: pointer;
            display: inline-block;
            /* Agar bisa diklik dengan jelas */
            width: fit-content;
            min-width: 60px;
        }

        .active-doctor {
            background-color: #d1ecf1 !important;
            font-weight: bold;
        }

        .highlight-schedule {
            background-color: #fff3cd !important;
            border-color: #ffc107 !important;
        }

        /* Custom padding/margin */
        .card-body.p-0>div {
            min-height: 400px;
        }
    </style>
</head>

<body>

    <div class="container-fluid py-4">
        <div class="d-flex justify-content-between align-items-center mb-3">
            <h1>Rawat Jalan | KLINIK INAP HUSNUL KHOTIMAH</h1>
            <button class="btn btn-primary">HARI INI</button>
        </div>
        <p class="text-muted">Status:
            <span class="badge text-bg-danger">Pending</span>
            <span class="badge text-bg-warning">Confirmed</span>
            <span class="badge text-bg-primary">Waiting</span>
            <span class="badge text-bg-success">Engaged</span>
            <span class="badge text-bg-dark">Succeed</span>
        </p>

        <div class="row mt-4">
            <div class="col-md-3">
                <div class="card h-100">
                    <div class="card-header">
                        <strong>Filter Dokter</strong>
                    </div>
                    <ul class="list-group list-group-flush overflow-auto" id="dokter-list" style="max-height: 80vh;">
                        {{-- TOMBOL FILTER SEMUA DOKTER BARU --}}
                        <li class="list-group-item dokter-item active-doctor" data-id="" id="all-doctors-filter"
                            style="cursor: pointer; font-weight: bold;">
                            Semua Dokter
                        </li>
                        {{-- DAFTAR DOKTER UNTUK FILTER INDIVIDUAL --}}
                        @foreach ($dataDokter as $dokter)
                            <li class="list-group-item dokter-item" data-id="{{ $dokter->id_tenaga_medis }}"
                                style="cursor: pointer;">
                                {{ $dokter->gelar_depan }} {{ $dokter->nama_lengkap }} {{ $dokter->gelar_belakang }}
                            </li>
                        @endforeach
                    </ul>
                </div>
            </div>

            <div class="col-md-9">
                <div class="card h-100">
                    <div class="card-body p-0">
                        <div id="jadwal-grid-area">
                            <p class="p-3 text-center text-muted">Memuat jadwal dokter...</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{-- MODAL BARU untuk Form Kunjungan/Pendaftaran --}}
    <div class="modal fade" id="formKunjunganModal" tabindex="-1" aria-labelledby="formKunjunganModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-md">
            <div class="modal-content">
                <div class="modal-header bg-success text-white">
                    <h5 class="modal-title" id="formKunjunganModalLabel">Form Pendaftaran Kunjungan</h5>
                    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"
                        aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form id="kunjunganForm">
                        <div class="mb-3">
                            <label for="dokterNama" class="form-label">Dokter/Spesialis</label>
                            <input type="text" class="form-control" id="dokterNama" readonly>
                        </div>
                        <div class="mb-3">
                            <label for="tanggalKunjungan" class="form-label">Tanggal Praktik</label>
                            <input type="text" class="form-control" id="tanggalKunjungan" readonly>
                        </div>
                        <div class="mb-3">
                            <label for="jamKunjungan" class="form-label">Jam Mulai</label>
                            <input type="text" class="form-control" id="jamKunjungan" readonly>
                        </div>
                        <div class="mb-3">
                            <label for="idPasien" class="form-label">ID Pasien / Nama Pasien</label>
                            {{-- Anda bisa ganti ini dengan input typeahead untuk pencarian pasien --}}
                            <input type="text" class="form-control" id="idPasien"
                                placeholder="Cari ID atau Nama Pasien" required>
                        </div>
                        {{-- Field tersembunyi untuk data yang akan dikirim ke backend --}}
                        <input type="hidden" id="inputDoctorId" name="doctor_id">
                        <input type="hidden" id="inputTanggalDB" name="tanggal_db">
                        <input type="hidden" id="inputJamMulaiDB" name="jam_mulai_db">
                        <input type="hidden" id="inputJadwalId" name="jadwal_id">
                        <hr>
                        <button type="submit" class="btn btn-success w-100">Daftar Kunjungan</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

    <script>
        // Variabel global untuk melacak ID dokter yang difilter
        let activeDoctorId = null;

        // URL GRID: Menggunakan route name yang baru
        // PASTIKAN 'testing.getjadwaldokter' sudah didefinisikan di routes/web.php
        const GRID_API_URL = "{{ route('testing.getjadwaldokter') }}";

        /**
         * Memuat dan merender seluruh grid jadwal.
         * Jika doctorId diberikan, ia akan memfilter hasil hanya untuk dokter tersebut.
         */
        function loadJadwalGrid(doctorId = null) {

            // 1. Tentukan URL AJAX dengan filter
            let apiUrl = GRID_API_URL;
            if (doctorId) {
                // Controller harus menerima parameter ini: ?filter_id=X
                apiUrl = `${GRID_API_URL}?filter_id=${doctorId}`;
                activeDoctorId = doctorId;
            } else {
                activeDoctorId = null; // Tampilkan semua dokter
            }

            $.ajax({
                url: apiUrl,
                method: 'GET',
                beforeSend: function() {
                    $('#jadwal-grid-area').html('<p class="p-3 text-center text-info">Memuat data...</p>');
                },
                success: function(response) {
                    const doctors = response.data_dokter;
                    const headers = response.tanggal_header;
                    const container = $('#jadwal-grid-area');

                    if (Object.keys(headers).length === 0 || doctors.length === 0) {
                        container.html(
                            `<p class="p-3 text-center text-muted">Tidak ada jadwal dokter${activeDoctorId ? ` untuk dokter ini` : ''} ditemukan dalam rentang waktu yang ditampilkan.</p>`
                        );
                        // Pasang ulang listener hanya untuk sidebar filter
                        addDoctorClickListener();
                        return;
                    }

                    const numColumns = Object.keys(headers).length + 1; // +1 untuk kolom "NOW"

                    // Set CSS Grid template columns secara dinamis (Kolom NOW: 100px, Kolom Jadwal: sama rata 1fr)
                    let html =
                        `<div class="schedule-grid" style="grid-template-columns: 180px repeat(${numColumns - 1}, 1fr);">`; // Disesuaikan untuk nama dokter yang panjang

                    // HEADER BARIS PERTAMA
                    html += '<div class="header-cell sticky-left">NOW</div>';
                    for (let dateKey in headers) {
                        const header = headers[dateKey];
                        html += `<div class="header-cell">${header.header_display}</div>`;
                    }

                    // ISI GRID
                    doctors.forEach(doctor => {
                        // BARIS NAMA DOKTER (Kolom Kiri di sidebar)
                        html +=
                            `<div class="doctor-name-cell sticky-left" data-id="${doctor.id_tenaga_medis}">`;
                        html +=
                            `${doctor.gelar_depan || ''} ${doctor.nama_lengkap} ${doctor.gelar_belakang || ''}`;
                        html += '</div>';

                        // SLOT JADWAL PER TANGGAL
                        for (let dateKey in headers) {
                            // Filter jadwal yang cocok untuk dokter dan tanggal ini
                            const jadwalPraktikAman = doctor.jadwalPraktik || [];

                            const schedules = jadwalPraktikAman.filter(j => j.tanggal_praktik ===
                                dateKey);

                            html +=
                                `<div class="schedule-cell" data-date="${dateKey}" data-doctor-id="${doctor.id_tenaga_medis}">`;

                            if (schedules.length > 0) {
                                schedules.forEach(schedule => {
                                    // PENTING: Tambahkan data-jadwal-id
                                    html += `<p class="slot-time" data-jam-mulai="${schedule.jam_mulai}" data-jadwal-id="${schedule.id_jadwal}">
                                                    ${schedule.jam_mulai.substring(0, 5)} WIB
                                                </p>`;
                                });
                            } else {
                                html += '<small class="text-muted">X</small>';
                            }
                            html += '</div>';
                        }
                    });

                    html += '</div>';
                    container.html(html);

                    // 2. Terapkan kembali kelas aktif pada filter sidebar
                    $('.dokter-item').removeClass('active-doctor');

                    if (activeDoctorId) {
                        // Jika filter aktif, sorot dokter yang aktif di sidebar
                        $(`#dokter-list .dokter-item[data-id="${activeDoctorId}"]`).addClass('active-doctor');
                    } else {
                        // Jika tidak ada filter, sorot tombol "Semua Dokter"
                        $('#all-doctors-filter').addClass('active-doctor');
                    }

                    // Tambahkan event listener untuk filter dokter DAN slot jadwal
                    addDoctorClickListener();
                    addScheduleSlotListener(); // Ini yang memicu modal!
                },
                error: function() {
                    $('#jadwal-grid-area').html(
                        '<p class="p-3 text-danger text-center">Gagal memuat jadwal. Pastikan API dan database sudah benar.</p>'
                    );
                }
            });
        }

        /**
         * Menambahkan Event Listener pada nama dokter (sidebar dan grid) dan Tombol Filter "Semua Dokter".
         */
        function addDoctorClickListener() {
            // Listener untuk elemen dokter di sidebar dan grid
            const selector = '#dokter-list .dokter-item'; // Hanya perlu sidebar, klik di grid akan memuat ulang

            $(selector).off('click').on('click', function() {
                const doctorId = $(this).data('id');
                loadJadwalGrid(doctorId);
            });
        }

        /**
         * Menambahkan Event Listener pada slot waktu praktik yang muncul di grid.
         * Ketika diklik, ia akan memanggil form pendaftaran kunjungan.
         */
        function addScheduleSlotListener() {
            $('#jadwal-grid-area .slot-time').off('click').on('click', function(e) {
                e.stopPropagation(); // Hentikan event klik agar tidak memicu elemen lain

                const slotElement = $(this);
                const cellElement = slotElement.closest('.schedule-cell');

                // Cari elemen nama dokter di sticky column berdasarkan data-doctor-id
                const doctorId = cellElement.data('doctor-id');
                const doctorElement = $(`#jadwal-grid-area .doctor-name-cell[data-id="${doctorId}"]`);

                // 1. Ambil Data yang diperlukan
                const doctorName = doctorElement.text().trim();
                const dateKey = cellElement.data('date'); // yyyy-mm-dd
                const jamMulaiDB = slotElement.data('jam-mulai'); // HH:MM:SS
                const jadwalId = slotElement.data('jadwal-id'); // ID dari tabel jadwal praktik

                // Konversi format tanggal dan jam ke format tampilan
                const jamMulaiDisplay = jamMulaiDB.substring(0, 5) + ' WIB';
                const dateObj = new Date(dateKey + 'T00:00:00');
                const formattedDate = dateObj.toLocaleDateString('id-ID', {
                    day: 'numeric',
                    month: 'long',
                    year: 'numeric'
                });


                // 2. Isi data ke dalam Modal Form Kunjungan
                $('#dokterNama').val(doctorName);
                $('#tanggalKunjungan').val(formattedDate);
                $('#jamKunjungan').val(jamMulaiDisplay);

                // Isi hidden input untuk pengiriman data ke backend (PENTING)
                $('#inputDoctorId').val(doctorId);
                $('#inputTanggalDB').val(dateKey);
                $('#inputJamMulaiDB').val(jamMulaiDB);
                $('#inputJadwalId').val(jadwalId); // ID jadwal yang diklik


                // 3. Tampilkan Modal Form Kunjungan
                const formModal = new bootstrap.Modal(document.getElementById('formKunjunganModal'));
                formModal.show();
            });
        }


        // Panggil fungsi utama saat dokumen siap
        $(document).ready(function() {
            loadJadwalGrid();
        });
    </script>

</body>

</html>
