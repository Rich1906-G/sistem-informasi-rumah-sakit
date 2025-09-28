<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Jadwal</title>
    <!-- Tailwind CSS CDN -->
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Inter:wght@400;600;700&display=swap');

        body {
            font-family: 'Inter', sans-serif;
            background-color: #f3f4f6;
        }

        /* Styling untuk modal pop-up */
        .modal {
            display: none;
            position: fixed;
            z-index: 100;
            left: 0;
            top: 0;
            width: 100%;
            height: 100%;
            overflow: auto;
            background-color: rgb(0, 0, 0);
            background-color: rgba(0, 0, 0, 0.4);
            justify-content: center;
            align-items: center;
        }

        .modal-content {
            background-color: #fefefe;
            padding: 24px;
            border-radius: 12px;
            text-align: center;
            max-width: 400px;
            width: 90%;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }

        .close-button {
            color: #aaa;
            float: right;
            font-size: 28px;
            font-weight: bold;
        }

        .close-button:hover,
        .close-button:focus {
            color: black;
            text-decoration: none;
            cursor: pointer;
        }
    </style>
</head>

<body class="p-4 sm:p-8 md:p-12">
    <div class="max-w-7xl mx-auto bg-white rounded-xl shadow-lg overflow-hidden">
        <!-- Header Jadwal -->
        <div class="grid grid-cols-4 md:grid-cols-4 text-center text-white bg-blue-600 rounded-t-xl overflow-hidden">
            <div class="py-4 px-2 font-semibold text-sm sm:text-base md:text-lg border-r border-blue-500">
                <span class="block">NOW</span>
            </div>
            <div class="py-4 px-2 font-semibold text-sm sm:text-base md:text-lg border-r border-blue-500">
                <span class="block">SELASA</span>
                <span class="block text-xs sm:text-sm font-normal">01 OKTOBER</span>
            </div>
            <div class="py-4 px-2 font-semibold text-sm sm:text-base md:text-lg border-r border-blue-500">
                <span class="block">RABU</span>
                <span class="block text-xs sm:text-sm font-normal">02 OKTOBER</span>
            </div>
            <div class="py-4 px-2 font-semibold text-sm sm:text-base md:text-lg">
                <span class="block">KAMIS</span>
                <span class="block text-xs sm:text-sm font-normal">03 OKTOBER</span>
            </div>
        </div>

        <!-- Tabel Jadwal -->
        <div class="grid grid-cols-4 divide-x divide-y divide-gray-200">
            <!-- Baris 1 -->
            <div class="py-4 px-2 text-center text-sm md:text-base font-medium text-gray-700">13:45 WIB</div>
            <div class="py-4 px-2 cell"></div>
            <div class="py-4 px-2 cell"></div>
            <div class="py-4 px-2 cell"></div>
            <!-- Baris 2 -->
            <div class="py-4 px-2 text-center text-sm md:text-base font-medium text-gray-700">14:00 WIB</div>
            <div class="py-4 px-2 cell"></div>
            <div class="py-4 px-2 cell"></div>
            <div class="py-4 px-2 cell"></div>
            <!-- Baris 3 -->
            <div class="py-4 px-2 text-center text-sm md:text-base font-medium text-gray-700">14:15 WIB</div>
            <div class="py-4 px-2 cell"></div>
            <div class="py-4 px-2 cell"></div>
            <div class="py-4 px-2 cell"></div>
            <!-- Baris 4 -->
            <div class="py-4 px-2 text-center text-sm md:text-base font-medium text-gray-700">14:30 WIB</div>
            <div class="py-4 px-2 cell"></div>
            <div class="py-4 px-2 cell"></div>
            <div class="py-4 px-2 cell"></div>
            <!-- Baris 5 -->
            <div class="py-4 px-2 text-center text-sm md:text-base font-medium text-gray-700">14:45 WIB</div>
            <div class="py-4 px-2 cell"></div>
            <div class="py-4 px-2 cell"></div>
            <div class="py-4 px-2 cell"></div>
            <!-- Baris 6 -->
            <div class="py-4 px-2 text-center text-sm md:text-base font-medium text-gray-700">15:00 WIB</div>
            <div class="py-4 px-2 cell"></div>
            <div class="py-4 px-2 cell"></div>
            <div class="py-4 px-2 cell"></div>
            <!-- Baris 7 -->
            <div class="py-4 px-2 text-center text-sm md:text-base font-medium text-gray-700">15:15 WIB</div>
            <div class="py-4 px-2 cell"></div>
            <div class="py-4 px-2 cell"></div>
            <div class="py-4 px-2 cell"></div>
        </div>
    </div>

    <!-- Modal Pop-up -->
    <div id="infoModal" class="modal">
        <div class="modal-content">
            <span class="close-button">&times;</span>
            <p id="modalMessage" class="text-lg font-semibold">Kolom telah diklik.</p>
        </div>
    </div>

    <script>
        document.addEventListener("DOMContentLoaded", () => {
            const cells = document.querySelectorAll(".cell");
            const modal = document.getElementById("infoModal");
            const closeButton = document.querySelector(".close-button");
            const modalMessage = document.getElementById("modalMessage");

            cells.forEach(cell => {
                cell.addEventListener("click", (event) => {
                    modal.style.display = "flex";
                });
            });

            closeButton.addEventListener("click", () => {
                modal.style.display = "none";
            });

            window.addEventListener("click", (event) => {
                if (event.target === modal) {
                    modal.style.display = "none";
                }
            });
        });
    </script>
</body>

</html>
