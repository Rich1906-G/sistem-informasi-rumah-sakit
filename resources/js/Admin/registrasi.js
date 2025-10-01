// Rawat Jalan Poli
$(document).ready(function() {

    const $tabel = $('#rawatJalanPoli');
    const dataUrl = $tabel.data('url');
    let table = $tabel.DataTable({
        processing: true,
        serverSide: true, 
        ajax: {
            url: dataUrl,
            data: function (d) {
                // Semua data filter diambil dari input dan dikirim ke server
                d.tanggal_dari         = $('#filter_tgl_dari_rjp').val();
                d.tanggal_hingga       = $('#filter_tgl_hingga_rjp').val();
                d.tenaga_medis_id      = $('#filter_tenaga_medis_rjp').val();
                d.metode_pembayaran_id = $('#filter_pembayaran_rjp').val();
                d.poli_id              = $('#filter_poli_rjp').val();
                d.nama_pasien_mr       = $('#filter_pasien_rjp').val();
            }
        },
        order: [[0, 'asc']],
        columns: [
            { data: 'status', name: 'status' },
            { data: 'tanggal_kunjungan', name: 'tanggal_kunjungan' },
            { data: 'tanggal_dibuat', name: 'tanggal_dibuat' },
            { data: 'no', name: 'no' },
            { data: 'poli', name: 'poli' },
            { data: 'nama_pasien', name: 'nama_pasien' },
            { data: 'rencana_tindakan', name: 'rencana_tindakan' },
            // { data: 'rencana_paket', name: 'rencana_paket' },
            { data: 'tenaga_medis', name: 'tenaga_medis' },
            { data: 'tipe_bayar', name: 'tipe_bayar' },
            // { data: 'rujuk_bpjs', name: 'rujuk_bpjs' },
        ],
        dom: '<"flex flex-wrap items-center justify-between mb-2"' +
             '<"flex items-center"l><"flex-grow text-center"f>>' +
             'rt' +
             '<"flex flex-wrap items-center justify-between mt-2"' +
             '<"flex items-center"i><"flex-grow text-center"p>>',
        language: {
            search: "",
            searchPlaceholder: "Cari...",
            lengthMenu: "Tampilkan _MENU_ data",
            info: "Menampilkan _START_ sampai _END_ dari _TOTAL_ data",
            paginate: {
                first: "Awal",
                last: "Akhir",
                next: "Berikutnya",
                previous: "Sebelumnya"
            },
            processing: '<div class="spinner">Loading...</div>'
        }
    });

      // 🔹 fungsi reset filter
    function resetFilter() {
        $('#filter_tgl_dari_rjp, #filter_tgl_hingga_rjp, #filter_tenaga_medis_rjp, #filter_pembayaran_rjp, #filter_poli_rjp, #filter_pasien_rjp')
            .val('');
        table.ajax.reload();
    }

    // 🔹 tombol reset filter
    $('#reset_filter_rjp').on('click', function () {
        resetFilter();
    });

    // 🔹 reload saat filter dropdown / date berubah
    $('#filter_tgl_dari_rjp, #filter_tgl_hingga_rjp, #filter_tenaga_medis_rjp, #filter_pembayaran_rjp, #filter_poli_rjp')
        .on('change', function () {
            table.ajax.reload();
        });

    // 🔹 reload saat ketik enter di input pasien/MR
    $('#filter_pasien_rjp').on('keyup', function (e) {
        if (e.key === 'Enter') {
            table.ajax.reload();
        } else if ($(this).val().length === 0) {
            table.ajax.reload();
        }
    });

    // 🔹 apply filter saat klik tombol cari (Tombol Search)
    $('#btn_search').on('click', function () { 
        table.ajax.reload(); 
    });
    
});



// antri cepat
$(document).ready(function() {
    
    const $tabel = $('#antriCepat');
    const dataUrl = $tabel.data('url');
    let table = $tabel.DataTable({
        processing: true,
        serverSide: true, 
        searching:false,
        ajax: {
            url: dataUrl,
            data: function (d) {
                // Semua data filter diambil dari input dan dikirim ke server
                d.tanggal_dari         = $('#filter_tgl_dari_ac').val();
                d.tanggal_hingga       = $('#filter_tgl_hingga_ac').val();
                d.poli_id              = $('#filter_poli_ac').val();
            }
        },
        order: [[0, 'asc']],
        columns: [
            { data: 'tanggal_kunjungan', name: 'tanggal_kunjungan' },
            { data: 'no', name: 'no' },
            { data: 'poli', name: 'poli' },
            { data: 'nama_pasien', name: 'nama_pasien' },
            { data: 'rencana_tindakan', name: 'rencana_tindakan' },
            // { data: 'rencana_paket', name: 'rencana_paket' },
            { data: 'tipe_bayar', name: 'tipe_bayar' },
            { data: 'tenaga_medis', name: 'tenaga_medis' },
            { data: 'status', name: 'status' },
        ],
        dom: '<"flex flex-wrap items-center justify-between mb-2"' +
             '<"flex items-center"l><"flex-grow text-center"f>>' +
             'rt' +
             '<"flex flex-wrap items-center justify-between mt-2"' +
             '<"flex items-center"i><"flex-grow text-center"p>>',
        language: {
            search: "",
            searchPlaceholder: "Cari...",
            lengthMenu: "Tampilkan _MENU_ data",
            info: "Menampilkan _START_ sampai _END_ dari _TOTAL_ data",
            paginate: {
                first: "Awal",
                last: "Akhir",
                next: "Berikutnya",
                previous: "Sebelumnya"
            },
            processing: '<div class="spinner">Loading...</div>'
        }
    });

      // 🔹 fungsi reset filter
    function resetFilter() {
        $('#filter_tgl_dari_ac, #filter_tgl_hingga_ac, #filter_poli_ac')
            .val('');
        table.ajax.reload();
    }

    // 🔹 tombol reset filter
    $('#reset_filter_rjp').on('click', function () {
        resetFilter();
    });

    // 🔹 reload saat filter dropdown / date berubah
    $('#filter_tgl_dari_ac, #filter_tgl_hingga_ac, #filter_poli_ac')
        .on('change', function () {
            table.ajax.reload();
        });
    
});


