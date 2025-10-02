import axios from "axios";

let dataPasien = [];

axios
    .get("rawat_jalan/getDataPasien")
    .then((res) => {
        dataPasien = res.data; // Simpan data sebenarnya dari response
        console.log(dataPasien);
    })
    .catch((error) => {
        console.error("Error fetching data pasien:", error);
    });

$(document).ready(function () {
    $(document).on("input", "#inputSearch", function () {
        const input = $(this).val().toLowerCase();
        let hasilSearch = $("#hasilSearch");
        hasilSearch.empty();

        if (input.length === 0) {
            return; // Tidak ada input, kosongkan hasil
        }

        // Filter dataPasien berdasarkan nama_lengkap dan nomor_rm
        let fiturFilter = dataPasien.filter(
            (item) =>
                item.nama_lengkap.toLowerCase().includes(input) ||
                item.nomor_rm.toLowerCase().includes(input)
        );

        if (fiturFilter.length > 0) {
            fiturFilter.forEach((item) => {
                hasilSearch.append(`
                    <div>
                        <h3>${item.nama_lengkap}</h3>
                        <p>Nomor RM: ${item.nomor_rm}</p>
                    </div>
                `);
            });
        } else {
            hasilSearch.html("<p>No results found.</p>");
        }
    });
});
