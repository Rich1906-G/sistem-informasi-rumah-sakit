// Rawat Jalan Poli
$(function() {
    
    const $tabel = $('#rawatJalanPoli');
    const dataUrl = $tabel.data('url');
    let dataTable;
    

    if(dataUrl) {
        dataTable = $tabel.DataTable({
            processing: true,
            responsive: true,
            // PENTING: Untuk mode Client-Side (karena ada ->get() di Controller)
            serverSide: false, 
            dom: '<"flex justify-between items-center mb-4"lf>rtip',
            ajax: dataUrl,
             columns: [
                // {data: 'DT_RowIndex', name: 'DT_RowIndex', orderable: false, searchable: false}, 
                {data: 'status', name: 'status'},
                {data: 'tanggal_kunjungan', name: 'tanggal_kunjungan'},
                {data: 'tanggal_dibuat', name: 'tanggal_dibuat'},
                {data: 'no', name: 'no'}, 
                {data: 'poli', name: 'poli'}, 
                {data: 'nama_pasien', name: 'nama_pasien'}, 
                {data: 'rencana_tindakan', name: 'rencana_tindakan'}, 
                // {data: 'rencana_paket', name: 'rencana_paket'}, 
                {data: 'tenaga_medis', name: 'tenaga_medis'}, 
                {data: 'tipe_bayar', name: 'tenaga_medis'}, 
                // {data: 'rujuk_bpjs', name: 'tenaga_medis'}, 
            ],
            // Panggil fungsi untuk mengisi dropdown setelah data dimuat
            initComplete: function () {
                populateDropdownFilters(dataTable);
            }
        });
         initCustomFilters(dataTable);
    }else{
        console.error("DataTables Error: Pastikan elemen tabel memiliki atribut 'data-url' dengan route Blade.");
    }
    // FUNGSI UNTUK MENGISI DROPDOWN FILTER SECARA DINAMIS
       function populateDropdownFilters(dataTable) {
        const data = dataTable.rows().data().toArray();
        const tmSet = new Set();
        const poliSet = new Set();
        const penjaminSet = new Set();

        data.forEach(function(row) {
            if (row.tenaga_medis) tmSet.add(row.tenaga_medis);
            if (row.poli) poliSet.add(row.poli);
            if (row.tipe_bayar) penjaminSet.add(row.tipe_bayar);
        });

        // Contoh: Isi Dropdown Tenaga Medis
        $('#filter_tenaga_medis').append(Array.from(tmSet).sort().map(val => 
            `<option value="${val}">${val}</option>`
        ).join(''));
        
        // Contoh: Isi Dropdown Poli
        $('#filter_poli').append(Array.from(poliSet).sort().map(val => 
            `<option value="${val}">${val}</option>`
        ).join(''));
        
        // Contoh: Isi Dropdown Metode Pembayaran
        $('#filter_pembayaran').append(Array.from(penjaminSet).sort().map(val => 
            `<option value="${val}">${val}</option>`
        ).join(''));
    }

    // LOGIKA CUSTOM FILTER DATATABLES
      function initCustomFilters(table) {
        
        // 1. Fungsi Hook untuk filtering
        $.fn.dataTable.ext.search.push(
            function(settings, searchData, dataIndex) {
                // searchData adalah array kolom data yang sudah diformat DataTables
                // Gunakan table.row(dataIndex).data() untuk mendapatkan objek data lengkap dari Controller (LEBIH AMAN)
                const rowData = table.row(dataIndex).data(); 

                // --- Filter Tenaga Medis ---
                const selectedTM = $('#filter_tenaga_medis').val();
                if (selectedTM && selectedTM !== '' && rowData.tenaga_medis !== selectedTM) {
                    return false;
                }

                // --- Filter Metode Pembayaran (Tipe Bayar) ---
                const selectedBayar = $('#filter_pembayaran').val();
                if (selectedBayar && selectedBayar !== '' && rowData.tipe_bayar !== selectedBayar) {
                    return false;
                }
                
                // --- Filter Poli ---
                const selectedPoli = $('#filter_poli').val();
                if (selectedPoli && selectedPoli !== '' && rowData.poli !== selectedPoli) {
                    return false;
                }
                
                // --- Filter Tanggal Kunjungan (Asumsi format YYYY-MM-DD dari DB) ---
                const tglDari = $('#filter_tgl_dari').val();
                const tglHingga = $('#filter_tgl_hingga').val();
                const tglKunjungan = rowData.tanggal_kunjungan; 
                
                if (tglKunjungan) {
                    const dateFrom = tglDari ? new Date(tglDari) : null;
                    const dateTo = tglHingga ? new Date(tglHingga) : null;
                    const dateKunjungan = new Date(tglKunjungan);
                    
                    if (dateFrom && dateKunjungan < dateFrom) return false;
                    
                    if (dateTo) {
                        // Tambah 1 hari agar tanggal akhir inklusif
                        const dateToAdjusted = new Date(dateTo);
                        dateToAdjusted.setDate(dateToAdjusted.getDate() + 1);
                        if (dateKunjungan >= dateToAdjusted) return false;
                    }
                }


                // --- Pencarian Nama Pasien/Nomor MR (Menggunakan Pencarian Global DataTables) ---
                // Jika Anda ingin menggunakan input terpisah, Anda bisa lakukan seperti ini:
                const searchPasien = $('#filter_pasien').val().toLowerCase().trim();
                const rowNamaPasien = rowData.nama_pasien.toLowerCase();
                
                if (searchPasien.length > 0 && rowNamaPasien.indexOf(searchPasien) === -1) {
                    // Anda bisa menambahkan Nomor MR di sini juga
                    return false;
                }
                
                // Jika semua filter lolos
                return true;
            }
        );
        
        // 2. Event Listeners untuk Memicu Filtering
        $('#filter_tenaga_medis, #filter_pembayaran, #filter_poli, #filter_tgl_dari, #filter_tgl_hingga').on('change', function () {
            table.draw();
        });

        $('#btn_search').on('click', function () {
            table.draw();
        });
        
        $('#filter_pasien').on('keyup', function (e) {
            // Panggil table.draw() saat Enter atau input dikosongkan
            if (e.key === 'Enter' || $(this).val().length === 0) {
                table.draw();
            }
        });
    }

});

