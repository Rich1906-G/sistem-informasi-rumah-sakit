// diagram kunjungan
const ctx = document.getElementById("chartKunjungan").getContext("2d");
let chart;

function loadChart() {
    const jenis = document.getElementById("jenisKunjungan").value;
    const tipe = document.getElementById("tipePasien").value;
    const periode = document.getElementById("periodeFilter").value;
    const tahun = document.getElementById("tahunFilter").value;

    fetch(
        `/dashboard/chart-kunjungan?jenis_kunjungan=${jenis}&tipe_pasien=${tipe}&periode=${periode}&tahun=${tahun}`
    )
        .then((res) => res.json())
        .then((res) => {
            console.log(res);

            const ctx = document
                .getElementById("chartKunjungan")
                .getContext("2d");
            if (chart) chart.destroy();

            chart = new Chart(ctx, {
                type: "line",
                data: {
                    labels: res.labels,
                    datasets: [
                        {
                            label: "Jumlah Kunjungan",
                            data: res.data,
                            borderColor: "blue",
                            backgroundColor: "rgba(0,0,255,0.1)",
                            tension: 0.3,
                        },
                    ],
                },
                options: {
                    responsive: true,
                    plugins: {
                        legend: {
                            display: false,
                        },
                    },
                    scales: {
                        y: {
                            beginAtZero: true,
                            ticks: {
                                stepSize: 1,
                            },
                        },
                    },
                },
            });

            // === Update Summary ===
            document.getElementById("totalKunjungan").textContent =
                res.summary.total;
            document.getElementById("persenKunjungan").textContent =
                res.summary.percentage + "%";
            document.getElementById("teksPerbandingan").textContent =
                res.summary.compare_text;

            const persenWrapper = document.getElementById("persenWrapper");
            const arrowIcon = document.querySelector("#persenWrapper svg path");

            if (res.summary.percentage >= 0) {
                persenWrapper.classList.remove("text-red-500");
                persenWrapper.classList.add("text-green-500");
                arrowIcon.setAttribute("d", "M5 15l7-7 7 7"); // panah ke atas
            } else {
                persenWrapper.classList.remove("text-green-500");
                persenWrapper.classList.add("text-red-500");
                arrowIcon.setAttribute("d", "M19 9l-7 7-7-7"); // panah ke bawah
            }
        });
}
document.getElementById("jenisKunjungan").addEventListener("change", loadChart);
document.getElementById("tipePasien").addEventListener("change", loadChart);
document.getElementById("periodeFilter").addEventListener("change", loadChart);
loadChart();

//  Ratata Waktu Konsultasi
function loadAverageConsultationTime() {
    fetch(`/dashboard/average-waktukonsultasi`)
        .then((res) => {
            if (!res.ok) {
                throw new Error("Network response was not ok");
            }
            return res.json();
        })
        .then((res) => {
            // Perbarui elemen HTML dengan data dari server
            document.getElementById("avgTimeDisplay").textContent =
                res.average_time;
            document.getElementById("avgPercentage").textContent =
                res.percentage + "%";
            document.getElementById("avgCompareText").textContent =
                res.compare_text;

            // Perbarui warna dan ikon panah berdasarkan persentase
            const avgPersenWrapper =
                document.getElementById("avgPersenWrapper");
            const avgArrowIcon = document.getElementById("avgArrowIcon");

            // Atur ulang kelas warna
            avgPersenWrapper.classList.remove("bg-green-300", "bg-red-300");

            if (res.percentage >= 0) {
                // Jika persentase naik atau stabil (>= 0)
                avgPersenWrapper.classList.remove("bg-red-300");
                avgPersenWrapper.classList.add("bg-green-300");

                // Panah ke atas (untuk kondisi naik)
                avgArrowIcon.setAttribute(
                    "d",
                    "M640-720v80h104L536-434 376-594 80-296l56 56 240-240 160 160 264-264v104h80v-240H640Z"
                );
                avgArrowIcon.setAttribute("fill", "#008000"); // Warna hijau

                // Tambahan: logika khusus untuk persentase 0 agar panah datar
                if (res.percentage === 0) {
                    avgArrowIcon.setAttribute("d", "M80-480h800v-80H80v80Z"); // Panah mendatar
                    avgArrowIcon.setAttribute("fill", "#008000"); // Warna hijau
                }
            } else {
                // Jika persentase turun (< 0)
                avgPersenWrapper.classList.remove("bg-green-300");
                avgPersenWrapper.classList.add("bg-red-300");

                // Panah ke bawah
                avgArrowIcon.setAttribute(
                    "d",
                    "M640-240v-80h104L536-526 376-366 80-664l56-56 240 240 160-160 264 264v-104h80v240H640Z"
                );
                avgArrowIcon.setAttribute("fill", "#EA3323"); // Warna merah
            }

            // Opsional: memperbarui panah dan warna untuk nilai 0
            if (res.percentage === 0) {
                avgArrowIcon.setAttribute("d", "M80-480h800v-80H80v80Z"); // Panah mendatar
            }
        })
        .catch((err) => {
            console.error("Error fetching average consultation time:", err);
        });
}
loadAverageConsultationTime();

// jumlah pasien baru
function loadNewPatientsSummary() {
    fetch(`/dashboard/getnewpatients`)
        .then((res) => res.json())
        .then((res) => {
            document.getElementById("newPatientsTotal").textContent = res.total;
            document.getElementById("newPatientsPercentage").textContent =
                res.percentage + "%";
            document.getElementById("newPatientsCompareText").textContent =
                res.compare_text;

            const wrapper = document.getElementById("newPatientsWrapper");
            const arrow = document.getElementById("newPatientsArrow");

            // Atur ulang kelas warna
            wrapper.classList.remove("bg-green-300", "bg-red-300");

            if (res.percentage >= 0) {
                wrapper.classList.add("bg-green-300");
                arrow.setAttribute(
                    "d",
                    "M640-720v80h104L536-434 376-594 80-296l56 56 240-240 160 160 264-264v104h80v-240H640Z"
                ); // Panah ke atas
                arrow.setAttribute("fill", "#008000"); // Warna hijau
            } else {
                wrapper.classList.add("bg-red-300");
                arrow.setAttribute(
                    "d",
                    "M640-240v-80h104L536-526 376-366 80-664l56-56 240 240 160-160 264 264v-104h80v240H640Z"
                ); // Panah ke bawah
                arrow.setAttribute("fill", "#EA3323"); // Warna merah
            }

            // Tambahan: jika persentase 0, panah mendatar
            if (res.percentage === 0) {
                arrow.setAttribute("d", "M80-480h800v-80H80v80Z");
            }
        })
        .catch((err) => {
            console.error("Error fetching new patients summary:", err);
        });
}
loadNewPatientsSummary();

// jumlah pasien terdaftar
function loadRegisteredPatientsSummary() {
    fetch(`/dashboard/getregisteredpatients`)
        .then((res) => res.json())
        .then((res) => {
            document.getElementById("registeredPatientsTotal").textContent =
                res.total;
            document.getElementById(
                "registeredPatientsPercentage"
            ).textContent = res.percentage + "%";
            document.getElementById(
                "registeredPatientsCompareText"
            ).textContent = res.compare_text;

            const wrapper = document.getElementById("waitTimeWrapper");
            const arrow = document.getElementById("registeredPatientsArrow");

            wrapper.classList.remove("bg-green-300", "bg-red-300");

            if (res.percentage >= 0) {
                wrapper.classList.add("bg-green-300");
                arrow.setAttribute(
                    "d",
                    "M640-720v80h104L536-434 376-594 80-296l56 56 240-240 160 160 264-264v104h80v-240H640Z"
                ); //top arrow
                arrow.setAttribute("fill", "#008000");
            } else {
                wrapper.classList.add("bg-red-300");
                arrow.setAttribute(
                    "d",
                    "M640-240v-80h104L536-526 376-366 80-664l56-56 240 240 160-160 264 264v-104h80v240H640Z"
                ); //down arrow
                arrow.setAttribute("fill", "#EA3323");
            }

            if (res.percentage === 0) {
                arrow.setAttribute("d", "M80-480h800v-80H80v80Z");
            }
        })
        .catch((err) => {
            console.error("Error fetching registered patients summary:", err);
        });
}
loadRegisteredPatientsSummary();

// rata tata waktu tunggu
function loadAverageWaitTime() {
    fetch(`/dashboard/getaveragewaittime`)
        .then((res) => res.json())
        .then((res) => {
            document.getElementById("waitTimeDisplay").textContent =
                res.average_time;
            document.getElementById("waitTimePercentage").textContent =
                res.percentage + "%";
            document.getElementById("waitTimeCompareText").textContent =
                res.compare_text;

            const wrapper = document.getElementById("waitTimeWrapper");
            const arrow = document.getElementById("waitTimeArrow");

            // Hapus semua kelas warna yang mungkin ada
            wrapper.classList.remove(
                "bg-green-300",
                "bg-red-300",
                "bg-gray-300"
            );

            if (res.percentage < 0) {
                // Rata-rata waktu tunggu menurun (BAIK)
                wrapper.classList.add("bg-green-300");

                arrow.setAttribute(
                    "d",
                    "M640-720v80h104L536-434 376-594 80-296l56 56 240-240 160 160 264-264v104h80v-240H640Z"
                ); // Panah ke atas
                arrow.setAttribute("fill", "#008000"); // Hijau
            } else if (res.percentage > 0) {
                // Rata-rata waktu tunggu meningkat (BURUK)
                wrapper.classList.add("bg-red-300");
                arrow.setAttribute(
                    "d",
                    "M640-240v-80h104L536-526 376-366 80-664l56-56 240 240 160-160 264 264v-104h80v240H640Z"
                ); // Panah ke bawah
                arrow.setAttribute("fill", "#EA3323"); // Merah
            } else {
                // Persentase 0 (tidak ada perubahan)
                wrapper.classList.add("bg-gray-300");
                arrow.setAttribute("d", "M80-480h800v-80H80v80Z"); // Panah mendatar
                arrow.setAttribute("fill", "#6B7280"); // Abu-abu
            }
        })
        .catch((err) => {
            console.error("Error fetching average wait time:", err);
        });
}
loadAverageWaitTime();

// jumlah obat habis
function getObatHabisCount() {
    fetch(`/dashboard/getobathabiscount`)
        .then((res) => res.json())
        .then((res) => {
            document.getElementById("countObatHabis").textContent =
                res.total_obat_habis;
        })
        .catch((err) => {
            console.error("Error fetching new patients summary:", err);
        });
}
getObatHabisCount();

// rata tata waktu tunggu apotek
function getAverageApotekWaitTime() {
    fetch(`/dashboard/getaverageapotekwaittime`)
        .then((res) => res.json())
        .then((res) => {
            document.getElementById("waitApotekTimeDisplay").textContent =
                res.average_time;
            document.getElementById("waitApotekTimePercentage").textContent =
                res.percentage + "%";
            document.getElementById("waitApotekTimeCompareText").textContent =
                res.compare_text;

            const wrapper = document.getElementById("waitApotekTimeWrapper");
            const arrow = document.getElementById("waitApotekTimeArrow");

            // Hapus semua kelas warna yang mungkin ada
            wrapper.classList.remove(
                "bg-green-300",
                "bg-red-300",
                "bg-gray-300"
            );

            if (res.percentage < 0) {
                // Rata-rata waktu tunggu menurun (BAIK)
                wrapper.classList.add("bg-green-300");

                arrow.setAttribute(
                    "d",
                    "M640-720v80h104L536-434 376-594 80-296l56 56 240-240 160 160 264-264v104h80v-240H640Z"
                ); // Panah ke atas
                arrow.setAttribute("fill", "#008000"); // Hijau
            } else if (res.percentage > 0) {
                // Rata-rata waktu tunggu meningkat (BURUK)
                wrapper.classList.add("bg-red-300");
                arrow.setAttribute(
                    "d",
                    "M640-240v-80h104L536-526 376-366 80-664l56-56 240 240 160-160 264 264v-104h80v240H640Z"
                ); // Panah ke bawah
                arrow.setAttribute("fill", "#EA3323"); // Merah
            } else {
                // Persentase 0 (tidak ada perubahan)
                wrapper.classList.add("bg-gray-300");
                arrow.setAttribute("d", "M80-480h800v-80H80v80Z"); // Panah mendatar
                arrow.setAttribute("fill", "#6B7280"); // Abu-abu
            }
        })
        .catch((err) => {
            console.error("Error fetching average wait time:", err);
        });
}
getAverageApotekWaitTime();

// DataTable Antri Cepat
function getDataKunjunganAntriCepat() {
    fetch(`/dashboard/getdatakunjunganantricepat`)
        .then((res) => res.json())
        .then((data) => {
            // console.log("Fetched Data:", response);
            //       console.log("Fetched Data:", data); // lihat di console browser
            // if (!Array.isArray(data)) {
            //     console.error("Data bukan array! Format harus array of objects");
            //     return;
            // }

            const rows = data.data ? data.data : data;
            // const rows = response.data || [];
            $("#antriCepatTable").DataTable({
                data: rows,
                columns: [
                    { data: "nama_pasien" },
                    { data: "nama_tenaga_medis" },
                    { data: "waktu_mulai_pemeriksaan" },
                    { data: "status" },
                ],
                pageLength: 5,
                lengthChange: false,
                searching: true,
                ordering: true,
                destroy: true,
                // responsive: true,
                language: {
                    emptyTable: "Tidak ada data kunjungan antri cepat",
                },
            });
        })
        .catch((error) => {
            console.error("Error fetch data:", error);
        });
}
getDataKunjunganAntriCepat();

// Pendapatan Bulanan

const rupiahFormat = new Intl.NumberFormat("id-ID", {
    style: "currency",
    currency: "IDR",
    minimumFractionDigits: 0,
});
function getPendapatanBulanan() {
    fetch(`/dashboard/getpendapatanbulanan`)
        .then((res) => res.json())
        .then((res) => {
            // console.log(res);
            document.getElementById("totalpendapatan").textContent =
                rupiahFormat.format(res.total);
            document.getElementById("pesentasePendapatan").textContent =
                res.percentage + "%";
            document.getElementById("pendapatandiBulanSekarang").textContent =
                res.compare_text;

            const wrapper = document.getElementById(
                "tandapanahVisualPendapatan"
            );
            const arrow = document.getElementById("indikatorGrafikPendapatan");

            // Atur ulang kelas warna
            wrapper.classList.remove("bg-green-300", "bg-red-300");

            if (res.percentage > 0) {
                wrapper.classList.add("bg-green-300");
                arrow.setAttribute(
                    "d",
                    "M640-720v80h104L536-434 376-594 80-296l56 56 240-240 160 160 264-264v104h80v-240H640Z"
                ); // Panah ke atas
                arrow.setAttribute("fill", "#008000"); // Warna hijau
            } else {
                wrapper.classList.add("bg-red-300");
                arrow.setAttribute(
                    "d",
                    "M640-240v-80h104L536-526 376-366 80-664l56-56 240 240 160-160 264 264v-104h80v240H640Z"
                ); // Panah ke bawah
                arrow.setAttribute("fill", "#EA3323"); // Warna merah
            }

            // Tambahan: jika persentase 0, panah mendatar
            if (res.percentage === 0) {
                arrow.setAttribute("d", "M80-480h800v-80H80v80Z");
            }
        })
        .catch((err) => {
            console.error("Error fetching average consultation time:", err);
        });
}
getPendapatanBulanan();

// Pendapatan Bulanan
function getPengeluaranBulanan() {
    fetch(`/dashboard/getpengeluaranbulanan`)
        .then((res) => res.json())
        .then((res) => {
            // console.log(res);
            document.getElementById("totalPengeluaran").textContent =
                rupiahFormat.format(res.total);
            document.getElementById("presantasePengeluaran").textContent =
                res.percentage + "%";
            document.getElementById("pengeluarandiBulanSekarang").textContent =
                res.compare_text;

            const wrapper = document.getElementById(
                "tandapanahVisualPengeluaran"
            );
            const arrow = document.getElementById("indikatorGrafikPengeluaran");

            // Atur ulang kelas warna
            wrapper.classList.remove("bg-green-300", "bg-red-300");

            if (res.percentage > 0) {
                wrapper.classList.add("bg-green-300");
                arrow.setAttribute(
                    "d",
                    "M640-720v80h104L536-434 376-594 80-296l56 56 240-240 160 160 264-264v104h80v-240H640Z"
                ); // Panah ke atas
                arrow.setAttribute("fill", "#008000"); // Warna hijau
            } else {
                wrapper.classList.add("bg-red-300");
                arrow.setAttribute(
                    "d",
                    "M640-240v-80h104L536-526 376-366 80-664l56-56 240 240 160-160 264 264v-104h80v240H640Z"
                ); // Panah ke bawah
                arrow.setAttribute("fill", "#EA3323"); // Warna merah
            }

            // Tambahan: jika persentase 0, panah mendatar
            if (res.percentage === 0) {
                arrow.setAttribute("d", "M80-480h800v-80H80v80Z");
            }
        })
        .catch((err) => {
            console.error("Error fetching average consultation time:", err);
        });
}
getPengeluaranBulanan();
