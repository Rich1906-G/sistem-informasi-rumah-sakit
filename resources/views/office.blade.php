<x-app-layout>
    <div x-data="{ tabAktivitas: '' }" class="p-4 sm:ml-64 lg:p-0 ">

        {{-- Start Header --}}
        <div class="w-full sm:px-6 lg:px-0 shadow-md">
            <div class="bg-white dark:bg-gray-800 shadow-sm sm:rounded-lg lg:rounded-none">

                <div class="flex items-center justify-between px-6 py-4 w-full">
                    <div class="flex w-full max-w-2xl space-x-4">
                        <div class="relative w-full max-w-md">
                            <input type="serach" placeholder="Cari Pasien / No MR / NO Ktp / No Asuransi . . . "
                                class="w-full pl-4 pr-10 py-2 border border-slate-300 rounded-full focus:outline-none focus:ring-2 focus:ring-blue-400 focus:border-blue-400">
                            <span class="absolute inset-y-0 right-4 flex items-center text-blue-400">
                                <svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 -960 960 960"
                                    width="24px" fill="#666666">
                                    <path
                                        d="M480-480q-66 0-113-47t-47-113q0-66 47-113t113-47q66 0 113 47t47 113q0 66-47 113t-113 47ZM160-160v-112q0-34 17.5-62.5T224-378q62-31 126-46.5T480-440q66 0 130 15.5T736-378q29 15 46.5 43.5T800-272v112H160Z" />
                                </svg>
                            </span>
                        </div>
                    </div>

                    <div class="flex items-center">
                        <div class="flex flex-row gap-x-3 mx-4 items-center">
                            <img class="rounded-md h-[70px] w-auto" src="{{ asset('storage/assets/royal_klinik.png') }}"
                                alt="foto_bang">
                            <button class="p-4 bg-blue-600 text-white rounded-md">Royal Prima</button>
                        </div>

                        <div class="grid grid-cols-3 gap-x-3">
                            <button class="bg-white hover:bg-slate-300 rounded-full">
                                <svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 -960 960 960"
                                    width="24px" fill="#1f1f1f">
                                    <path
                                        d="M478-240q21 0 35.5-14.5T528-290q0-21-14.5-35.5T478-340q-21 0-35.5 14.5T428-290q0 21 14.5 35.5T478-240Zm-36-154h74q0-33 7.5-52t42.5-52q26-26 41-49.5t15-56.5q0-56-41-86t-97-30q-57 0-92.5 30T342-618l66 26q5-18 22.5-39t53.5-21q32 0 48 17.5t16 38.5q0 20-12 37.5T506-526q-44 39-54 59t-10 73Zm38 314q-83 0-156-31.5T197-197q-54-54-85.5-127T80-480q0-83 31.5-156T197-763q54-54 127-85.5T480-880q83 0 156 31.5T763-763q54 54 85.5 127T880-480q0 83-31.5 156T763-197q-54 54-127 85.5T480-80Z" />
                                </svg>
                            </button>

                            <button class="bg-white hover:bg-slate-300 rounded-full">
                                <svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 -960 960 960"
                                    width="24px" fill="#1f1f1f">
                                    <path
                                        d="M160-200v-80h80v-280q0-33 8.5-65t25.5-61l126 126H288L56-792l56-56 736 736-56 56-146-144H160Zm560-154L328-746q20-16 43-28t49-18v-28q0-25 17.5-42.5T480-880q25 0 42.5 17.5T540-820v28q80 20 130 84.5T720-560v206ZM480-80q-33 0-56.5-23.5T400-160h160q0 33-23.5 56.5T480-80Z" />
                                </svg>
                            </button>

                            <button class="bg-white hover:bg-slate-300 rounded-full">
                                <svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 -960 960 960"
                                    width="24px" fill="#1f1f1f">
                                    <path
                                        d="M234-276q51-39 114-61.5T480-360q69 0 132 22.5T726-276q35-41 54.5-93T800-480q0-133-93.5-226.5T480-800q-133 0-226.5 93.5T160-480q0 59 19.5 111t54.5 93Zm246-164q-59 0-99.5-40.5T340-580q0-59 40.5-99.5T480-720q59 0 99.5 40.5T620-580q0 59-40.5 99.5T480-440Zm0 360q-83 0-156-31.5T197-197q-54-54-85.5-127T80-480q0-83 31.5-156T197-763q54-54 127-85.5T480-880q83 0 156 31.5T763-763q54 54 85.5 127T880-480q0 83-31.5 156T763-197q-54 54-127 85.5T480-80Z" />
                                </svg>
                            </button>
                        </div>
                    </div>
                </div>

                <div class="flex items-center justify-between">
                    <div class="mx-6 mb-6">
                        <div class="font-normal text-2xl text-sky-700 dark:text-gray-200 leading-tight">
                            {{ __('Office') }}
                        </div>

                        <h2 class="font-light text-lg text-sky-500 dark:text-gray-200 leading-tight">
                            {{ __('Royal Prima Medan') }}
                        </h2>
                    </div>
                </div>
            </div>
        </div>
        {{-- End Header --}}

        <div class="p-6">
            <section class="min-h-screen flex items-center justify-center bg-white text-gray-900 ">
                <div class="text-center">
                    <h1 class="text-5xl font-bold mb-4 animate-pulse">🚀 Coming Soon</h1>
                    <p class="text-lg mb-6">Fitur ini sedang dalam tahap pengembangan. Nantikan update
                        berikutnya!</p>
                </div>
            </section>
        </div>

        {{-- <div class="grid grid-row-1">
            <div class="flex p-6 gap-4 items-start">
                <!-- Kiri: Menu Table -->
                <div class="w-64 bg-white shadow rounded">
                    <ul class="divide-y divide-gray-200">
                        <li>
                            <button @click="tabAktivitas = (tabAktivitas === 'keuangan') ? '' : 'keuangan'"
                                :class="tabAktivitas === 'keuangan'
                                    ?
                                    'w-full text-start px-4 py-3 bg-blue-600 text-white font-medium' :
                                    'w-full text-start px-4 py-3 bg-white text-gray-800 font-medium '">Keuangan
                            </button>
                        </li>
                        <li>
                            <button @click="tabAktivitas = (tabAktivitas === 'laporan') ? '' : 'laporan' "
                                :class="tabAktivitas === 'laporan'
                                    ?
                                    'w-full text-start px-4 py-3 bg-blue-600 text-white font-medium' :
                                    'w-full text-start px-4 py-3 bg-white text-gray-800 font-medium '">
                                Laporan
                            </button>
                        </li>
                        <li>
                            <button @click="tabAktivitas = (tabAktivitas === 'pasien') ? '' : 'pasien' "
                                :class="tabAktivitas === 'pasien'
                                    ?
                                    'w-full text-start px-4 py-3 bg-blue-600 text-white font-medium' :
                                    'w-full text-start px-4 py-3 bg-white text-gray-800 font-medium '">
                                Pasien
                            </button>
                        </li>
                        <li>
                            <button @click="tabAktivitas = (tabAktivitas === 'akun') ? '' : 'akun' "
                                :class="tabAktivitas === 'akun'
                                    ?
                                    'w-full text-start px-4 py-3 bg-blue-600 text-white font-medium' :
                                    'w-full text-start px-4 py-3 bg-white text-gray-800 font-medium '">
                                Akun
                            </button>
                        </li>
                        <li>
                            <button @click="tabAktivitas = (tabAktivitas === 'warning') ? '' : 'warning' "
                                :class="tabAktivitas === 'warning'
                                    ?
                                    'w-full text-start px-4 py-3 bg-blue-600 text-white font-medium' :
                                    'w-full text-start px-4 py-3 bg-white text-gray-800 font-medium '">
                                Warning
                            </button>
                        </li>
                        <li>
                            <button
                                @click="tabAktivitas = (tabAktivitas === 'mergeRekamMedis') ? '' : 'mergeRekamMedis' "
                                :class="tabAktivitas === 'mergeRekamMedis'
                                    ?
                                    'w-full text-start px-4 py-3 bg-blue-600 text-white font-medium' :
                                    'w-full text-start px-4 py-3 bg-white text-gray-800 font-medium '">
                                Merge Rekam Medis
                            </button>
                        </li>
                    </ul>
                </div>

                <style>
                    [x-cloak] {
                        display: none
                    }
                </style>

                <!-- Content Keuangan -->
                <div x-cloak x-show="tabAktivitas === 'keuangan' " class="w-full">
                    <div class="bg-white p-4 rounded-md w-full" x-data="{ activeTab: 'ikhtisar' }">
                        <!-- Tabs -->
                        <div class="flex space-x-2 mb-4 border-b">
                            <button @click="activeTab = 'ikhtisar'"
                                :class="activeTab === 'ikhtisar' ? 'text-blue-600 border-blue-600' :
                                    'text-gray-600 border-transparent'"
                                class="px-4 py-2 text-sm font-medium border-b-2">
                                Ikhtisar
                            </button>
                            <button @click="activeTab = 'pemasukan'"
                                :class="activeTab === 'pemasukan' ? 'text-blue-600 border-blue-600' :
                                    'text-gray-600 border-transparent'"
                                class="px-4 py-2 text-sm font-medium border-b-2">
                                Pemasukan
                            </button>
                            <button @click="activeTab = 'pengeluaran'"
                                :class="activeTab === 'pengeluaran' ? 'text-blue-600 border-blue-600' :
                                    'text-gray-600 border-transparent'"
                                class="px-4 py-2 text-sm font-medium border-b-2">
                                Pengeluaran
                            </button>
                        </div>


                        <!-- Filter -->
                        <div class="flex flex-wrap items-center justify-between mb-4 gap-2">
                            <div class="flex items-center space-x-2">
                                <input type="date" value="2025-09-01"
                                    class="rounded border border-gray-300 py-2 px-3 text-sm focus:ring-2 focus:ring-blue-500 focus:outline-none" />
                                <span>-</span>
                                <input type="date" value="2025-09-28"
                                    class="rounded border border-gray-300 py-2 px-3 text-sm focus:ring-2 focus:ring-blue-500 focus:outline-none" />
                            </div>
                            <div class="flex space-x-2">
                                <button
                                    class="px-4 py-2 bg-blue-500 hover:bg-blue-600 text-white rounded shadow">FILTER</button>
                                <button
                                    class="px-4 py-2 bg-gray-200 hover:bg-gray-300 text-gray-700 rounded shadow">EXPORT</button>
                            </div>
                        </div>



                        <!-- Content: Ikhtisar -->
                        <div x-show="activeTab === 'ikhtisar'" class="space-y-6">
                            <!-- Operational -->
                            <div>
                                <h2 class="font-semibold border-b pb-1 mb-2">Operational</h2>
                                <div class="grid grid-cols-1 md:grid-cols-4 gap-4">
                                    <div class="bg-white border rounded p-4 text-center">Pemasukan <p
                                            class="text-green-600">+ Rp0</p>
                                    </div>
                                    <div class="bg-white border rounded p-4 text-center">Pengeluaran <p
                                            class="text-red-600">- Rp0</p>
                                    </div>
                                    <div class="bg-white border rounded p-4 text-center">Piutang <p
                                            class="text-green-600">+ Rp0</p>
                                    </div>
                                    <div class="bg-white border rounded p-4 text-center">Hutang <p class="text-red-600">
                                            - Rp0</p>
                                    </div>
                                    <div class="bg-white border rounded p-4 text-center">Margin <p
                                            class="text-green-600">+ Rp0</p>
                                    </div>
                                    <div class="bg-white border rounded p-4 text-center">Margin Murni <p
                                            class="text-green-600">+ Rp0</p>
                                    </div>
                                    <div class="bg-white border rounded p-4 text-center">Show More →</div>
                                </div>
                            </div>

                            <!-- Cover & Total -->
                            <div>
                                <h2 class="font-semibold border-b pb-1 mb-2">Cover</h2>
                                <h2 class="font-semibold border-b pb-1 mb-2">Total</h2>
                                <div class="grid grid-cols-1 md:grid-cols-4 gap-4">
                                    <div class="bg-white border rounded p-4 text-center">Kas <p
                                            class="text-green-600">+ Rp0</p>
                                    </div>
                                    <div class="bg-white border rounded p-4 text-center">Cover BPJS <p
                                            class="text-green-600">+ Rp0</p>
                                    </div>
                                    <div class="bg-white border rounded p-4 text-center">Hutang <p
                                            class="text-red-600">- Rp0</p>
                                    </div>
                                    <div class="bg-white border rounded p-4 text-center">Piutang <p
                                            class="text-green-600">+ Rp0</p>
                                    </div>
                                    <div class="bg-white border rounded p-4 text-center">Total Saldo <p
                                            class="text-green-600">+ Rp0</p>
                                    </div>
                                    <div class="bg-white border rounded p-4 text-center">Total Balance <p
                                            class="text-green-600">+ Rp0</p>
                                        <p class="text-xs text-gray-500">Semua akun - hutang + piutang</p>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Content: Ikhtisar -->
                        <div x-show="activeTab === 'pemasukan'" class="space-y-6">
                            <!-- Cards -->
                            <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mb-4">
                                <div class="bg-white rounded border p-4 shadow-sm text-center">
                                    <p class="text-sm text-gray-500">01 Sep '25 - 28 Sep '25</p>
                                    <p class="text-green-600 text-lg font-semibold">Rp0</p>
                                </div>
                                <div class="bg-white rounded border p-4 shadow-sm text-center">
                                    <p class="text-sm text-gray-500">Tipe Pembayaran</p>
                                </div>
                            </div>

                            <!-- Table -->
                            <div class="overflow-x-auto bg-white rounded border shadow-sm">
                                <table class="w-full text-sm text-left border-collapse">
                                    <thead class="bg-gray-100 text-gray-600">
                                        <tr>
                                            <th class="px-4 py-2 border">Tanggal Invoice</th>
                                            <th class="px-4 py-2 border">No. Invoice</th>
                                            <th class="px-4 py-2 border">Nama Pasien</th>
                                            <th class="px-4 py-2 border">Kategori</th>
                                            <th class="px-4 py-2 border">Tanggal Dibayar</th>
                                            <th class="px-4 py-2 border">Metode Pembayaran</th>
                                            <th class="px-4 py-2 border">Deskripsi</th>
                                            <th class="px-4 py-2 border">Nominal</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td colspan="8" class="px-4 py-4 text-center text-gray-500">Tidak ada
                                                data</td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>

                        <!-- Content: Pengeluaran -->
                        <div x-show="activeTab === 'pengeluaran'" class="space-y-6">
                            <!-- Cards -->
                            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                                <div class="bg-white border rounded p-4 text-center">
                                    <p class="text-sm text-gray-500">01 Sep '25 - 28 Sep '25</p>
                                    <p class="text-red-600 text-lg font-semibold">Rp0</p>
                                </div>
                                <div class="bg-white border rounded p-4 text-center">
                                    <p class="text-sm text-gray-500">Tipe Pembayaran</p>
                                </div>
                            </div>

                            <!-- Table -->
                            <div class="overflow-x-auto bg-white rounded border shadow-sm">
                                <table class="w-full text-sm text-left border-collapse">
                                    <thead class="bg-gray-100 text-gray-600">
                                        <tr>
                                            <th class="px-4 py-2 border">Tanggal Invoice</th>
                                            <th class="px-4 py-2 border">No. Invoice</th>
                                            <th class="px-4 py-2 border">Kategori</th>
                                            <th class="px-4 py-2 border">Tanggal Dibayar</th>
                                            <th class="px-4 py-2 border">Metode Pembayaran</th>
                                            <th class="px-4 py-2 border">Deskripsi</th>
                                            <th class="px-4 py-2 border">Nominal</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td colspan="7" class="px-4 py-4 text-center text-gray-500">Tidak ada
                                                data</td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>

                    </div>
                </div>

                <!-- Content Laporan -->
                <div x-cloak x-show="tabAktivitas === 'laporan' " class="w-full">
                    <div class="bg-white p-4 rounded-md w-full" x-data="{ activeTab: 'operasional' }">
                        <!-- Tabs -->
                        <div class="flex space-x-2 mb-4 border-b">
                            <button @click="activeTab = 'operasional'"
                                :class="activeTab === 'operasional' ? 'text-blue-600 border-blue-600' :
                                    'text-gray-600 border-transparent'"
                                class="px-4 py-2 text-sm font-medium border-b-2">
                                Operasional
                            </button>
                            <button @click="activeTab = 'keuangan'"
                                :class="activeTab === 'keuangan' ? 'text-blue-600 border-blue-600' :
                                    'text-gray-600 border-transparent'"
                                class="px-4 py-2 text-sm font-medium border-b-2">
                                Keuangan
                            </button>
                            <button @click="activeTab = 'bpjs'"
                                :class="activeTab === 'bpjs' ? 'text-blue-600 border-blue-600' :
                                    'text-gray-600 border-transparent'"
                                class="px-4 py-2 text-sm font-medium border-b-2">
                                BPJS
                            </button>
                            <button @click="activeTab = 'grafik'"
                                :class="activeTab === 'grafik' ? 'text-blue-600 border-blue-600' :
                                    'text-gray-600 border-transparent'"
                                class="px-4 py-2 text-sm font-medium border-b-2">
                                Grafik
                            </button>
                        </div>

                        <!-- Content: Operasional -->
                        <div x-show="activeTab === 'operasional'" class="p-6">
                            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">

                                <!-- Item Daftar Appointment Pasien -->
                                <div
                                    class="border-b border-cyan-600 pb-2 grid grid-cols-2 justify-between items-center">
                                    <div>
                                        <button class="text-cyan-700 font-semibold hover:underline cursor-pointer">
                                            Daftar Appointment Pasien
                                        </button>
                                        <p class="text-sm text-gray-600">Data semua pasien rawat jalan di klinik ini.
                                        </p>
                                    </div>
                                    <div class="text-cyan-700 flex justify-end ">
                                        <button type="button">&gt;</button>
                                    </div>
                                </div>

                                <!-- Item Daftar Pasien -->
                                <div class="border-b border-cyan-600 pb-2 flex justify-between items-center">
                                    <div>
                                        <button class="text-cyan-700 font-semibold hover:underline cursor-pointer">
                                            Daftar Pasien
                                        </button>
                                        <p class="text-sm text-gray-600">Data semua pasien rawat jalan di klinik ini.
                                        </p>
                                    </div>
                                    <div class="text-cyan-700 flex justify-end ">
                                        <button type="button">&gt;</button>
                                    </div>
                                </div>

                                <!-- Item Laporan Diagnosa Pasien -->
                                <div class="border-b border-cyan-600 pb-2 flex justify-between items-center">
                                    <div>
                                        <button class="text-cyan-700 font-semibold hover:underline cursor-pointer">
                                            Laporan Diagnosa Pasien
                                        </button>
                                        <p class="text-sm text-gray-600">Jumlah diagnosa dari semua pasien.</p>
                                    </div>
                                    <div class="text-cyan-700 flex justify-end ">
                                        <button type="button">&gt;</button>
                                    </div>
                                </div>

                                <!-- Item Laporan Prosedur Pasien -->
                                <div class="border-b border-cyan-600 pb-2 flex justify-between items-center">
                                    <div>
                                        <button class="text-cyan-700 font-semibold hover:underline cursor-pointer">
                                            Laporan Prosedur Pasien
                                        </button>
                                        <p class="text-sm text-gray-600">Jumlah tindakan yang dilakukan pada tiap
                                            pasien.</p>
                                    </div>
                                    <div class="text-cyan-700 flex justify-end ">
                                        <button type="button">&gt;</button>
                                    </div>
                                </div>

                                <!-- Item Laporan Peresepan Obat -->
                                <div class="border-b border-cyan-600 pb-2 flex justify-between items-center">
                                    <div>
                                        <button class="text-cyan-700 font-semibold hover:underline cursor-pointer">
                                            Laporan Peresepan Obat
                                        </button>
                                        <p class="text-sm text-gray-600">Jumlah resep yang diberikan pada tiap pasien.
                                        </p>
                                    </div>
                                    <div class="text-cyan-700 flex justify-end ">
                                        <button type="button">&gt;</button>
                                    </div>
                                </div>

                                <!-- Item Laporan Penjualan Obat -->
                                <div class="border-b border-cyan-600 pb-2 flex justify-between items-center">
                                    <div>
                                        <button class="text-cyan-700 font-semibold hover:underline cursor-pointer">
                                            Laporan Penjualan Obat
                                        </button>
                                        <p class="text-sm text-gray-600">Penjualan obat langsung dari apotek.</p>
                                    </div>
                                    <div class="text-cyan-700 flex justify-end ">
                                        <button type="button">&gt;</button>
                                    </div>
                                </div>

                                <!-- Item Laporan Coret Tindakan -->
                                <div class="border-b border-cyan-600 pb-2 flex justify-between items-center">
                                    <div>
                                        <button class="text-cyan-700 font-semibold hover:underline cursor-pointer">
                                            Laporan Coret Tindakan
                                        </button>
                                        <p class="text-sm text-gray-600">Laporan tindakan yang dicoret.</p>
                                    </div>
                                    <div class="text-cyan-700 flex justify-end ">
                                        <button type="button">&gt;</button>
                                    </div>
                                </div>

                                <!-- Item Laporan Kunjungan Pasien -->
                                <div class="border-b border-cyan-600 pb-2 flex justify-between items-center">
                                    <div>
                                        <button class="text-cyan-700 font-semibold hover:underline cursor-pointer">
                                            Laporan Kunjungan Pasien
                                        </button>
                                        <p class="text-sm text-gray-600">Laporan Kunjungan Pasien Baru dan Lama Setiap
                                            Bulan</p>
                                    </div>
                                    <div class="text-cyan-700 flex justify-end ">
                                        <button type="button">&gt;</button>
                                    </div>
                                </div>

                                <!-- Item Laporan Pasien Rujukan -->
                                <div class="border-b border-cyan-600 pb-2 flex justify-between items-center">
                                    <div>
                                        <button class="text-cyan-700 font-semibold hover:underline cursor-pointer">
                                            Laporan Pasien Rujukan
                                        </button>
                                        <p class="text-sm text-gray-600">Laporan pasien yang dirujukkan ke klinik lain
                                        </p>
                                    </div>
                                    <div class="text-cyan-700 flex justify-end ">
                                        <button type="button">&gt;</button>
                                    </div>
                                </div>

                                <!-- Item Laporan Pasien Dirujuk -->
                                <div class="border-b border-cyan-600 pb-2 flex justify-between items-center">
                                    <div>
                                        <button class="text-cyan-700 font-semibold hover:underline cursor-pointer">
                                            Laporan Pasien Dirujuk
                                        </button>
                                        <p class="text-sm text-gray-600">Laporan pasien yang dirujukkan ke klinik anda
                                        </p>
                                    </div>
                                    <div class="text-cyan-700 flex justify-end ">
                                        <button type="button">&gt;</button>
                                    </div>
                                </div>

                                <!-- Item Laporan Kunjungan Sehat -->
                                <div class="border-b border-cyan-600 pb-2 flex justify-between items-center">
                                    <div>
                                        <button class="text-cyan-700 font-semibold hover:underline cursor-pointer">
                                            Laporan Kunjungan Sehat
                                        </button>
                                        <p class="text-sm text-gray-600">Laporan kunjungan sehat pasien</p>
                                    </div>
                                    <div class="text-cyan-700 flex justify-end ">
                                        <button type="button">&gt;</button>
                                    </div>
                                </div>

                                <!-- Item Laporan Promotif Preventif -->
                                <div class="border-b border-cyan-600 pb-2 flex justify-between items-center">
                                    <div>
                                        <button class="text-cyan-700 font-semibold hover:underline cursor-pointer">
                                            Laporan Promotif Preventif
                                        </button>
                                        <p class="text-sm text-gray-600">Laporan promotif preventif pasien</p>
                                    </div>
                                    <div class="text-cyan-700 flex justify-end ">
                                        <button type="button">&gt;</button>
                                    </div>
                                </div>

                                <!-- Item Laporan Kegiatan Kelompok -->
                                <div class="border-b border-cyan-600 pb-2 flex justify-between items-center">
                                    <div>
                                        <button class="text-cyan-700 font-semibold hover:underline cursor-pointer">
                                            Laporan Kegiatan Kelompok
                                        </button>
                                        <p class="text-sm text-gray-600">Laporan Kegiatan Kelompok
                                        </p>
                                    </div>
                                    <div class="text-cyan-700 flex justify-end ">
                                        <button type="button">&gt;</button>
                                    </div>
                                </div>

                                <!-- Item Laporan Stock Adjustment -->
                                <div class="border-b border-cyan-600 pb-2 flex justify-between items-center">
                                    <div>
                                        <button class="text-cyan-700 font-semibold hover:underline cursor-pointer">
                                            Laporan Stock Adjustment
                                        </button>
                                        <p class="text-sm text-gray-600">Laporan Stock Adjustment</p>
                                    </div>
                                    <div class="text-cyan-700 flex justify-end ">
                                        <button type="button">&gt;</button>
                                    </div>
                                </div>

                                <!-- Item Laporan Hasil Survei -->
                                <div class="border-b border-cyan-600 pb-2 flex justify-between items-center">
                                    <div>
                                        <button class="text-cyan-700 font-semibold hover:underline cursor-pointer">
                                            Laporan Hasil Survei
                                        </button>
                                        <p class="text-sm text-gray-600">Laporan Hasil Survei</p>
                                    </div>
                                    <div class="text-cyan-700 flex justify-end ">
                                        <button type="button">&gt;</button>
                                    </div>
                                </div>

                                <!-- Item Laporan Rata-Rata Waktu Tunggu Apotek -->
                                <div class="border-b border-cyan-600 pb-2 flex justify-between items-center">
                                    <div>
                                        <button class="text-cyan-700 font-semibold hover:underline cursor-pointer">
                                            Laporan Rata-Rata Waktu Tunggu Apotek
                                        </button>
                                        <p class="text-sm text-gray-600">Data laporan waktu tunggu apotek</p>
                                    </div>
                                    <div class="text-cyan-700 flex justify-end ">
                                        <button type="button">&gt;</button>
                                    </div>
                                </div>

                                <!-- Item Laporan Rekap EMR -->
                                <div class="border-b border-cyan-600 pb-2 flex justify-between items-center">
                                    <div>
                                        <button class="text-cyan-700 font-semibold hover:underline cursor-pointer">
                                            Laporan Rekap EMR
                                        </button>
                                        <p class="text-sm text-gray-600">Laporan Rekap EMR yang mencatat data rekam
                                            medis pasien per kunjungan
                                        </p>
                                    </div>
                                    <div class="text-cyan-700 flex justify-end ">
                                        <button type="button">&gt;</button>
                                    </div>
                                </div>

                                <!-- Item Laporan Mutasi Obat -->
                                <div class="border-b border-cyan-600 pb-2 flex justify-between items-center">
                                    <div>
                                        <button class="text-cyan-700 font-semibold hover:underline cursor-pointer">
                                            Laporan Mutasi Obat
                                        </button>
                                        <p class="text-sm text-gray-600">Laporan Mutasi Obat
                                        </p>
                                    </div>
                                    <div class="text-cyan-700 flex justify-end ">
                                        <button type="button">&gt;</button>
                                    </div>
                                </div>

                                <!-- Item Laporan Mutasi BHP -->
                                <div class="border-b border-cyan-600 pb-2 flex justify-between items-center">
                                    <div>
                                        <button class="text-cyan-700 font-semibold hover:underline cursor-pointer">
                                            Laporan Mutasi BHP
                                        </button>
                                        <p class="text-sm text-gray-600">Laporan Mutasi BHP</p>
                                    </div>
                                    <div class="text-cyan-700 flex justify-end ">
                                        <button type="button">&gt;</button>
                                    </div>
                                </div>

                                <!-- Item Laporan Survei Keputusan Masyarakat -->
                                <div class="border-b border-cyan-600 pb-2 flex justify-between items-center">
                                    <div>
                                        <button class="text-cyan-700 font-semibold hover:underline cursor-pointer">
                                            Laporan Survei Keputusan Masyarakat
                                        </button>
                                        <p class="text-sm text-gray-600">JLaporan Survei Kepuasan Masyarakat</p>
                                    </div>
                                    <div class="text-cyan-700 flex justify-end ">
                                        <button type="button">&gt;</button>
                                    </div>
                                </div>

                                <!-- Item Laporan Waktu Pendaftaran -->
                                <div class="border-b border-cyan-600 pb-2 flex justify-between items-center">
                                    <div>
                                        <button class="text-cyan-700 font-semibold hover:underline cursor-pointer">
                                            Laporan Waktu Pendaftaran
                                        </button>
                                        <p class="text-sm text-gray-600">Laporan Waktu Pendaftaran
                                        </p>
                                    </div>
                                    <div class="text-cyan-700 flex justify-end ">
                                        <button type="button">&gt;</button>
                                    </div>
                                </div>

                                <!-- Item Laporan Stok Opname Obat -->
                                <div class="border-b border-cyan-600 pb-2 flex justify-between items-center">
                                    <div>
                                        <button class="text-cyan-700 font-semibold hover:underline cursor-pointer">
                                            Laporan Stok Opname Obat
                                        </button>
                                        <p class="text-sm text-gray-600">Laporan Detail Stock Opname Obat</p>
                                    </div>
                                    <div class="text-cyan-700 flex justify-end ">
                                        <button type="button">&gt;</button>
                                    </div>
                                </div>

                                <!-- Item Laporan OHI-S -->
                                <div class="border-b border-cyan-600 pb-2 flex justify-between items-center">
                                    <div>
                                        <button class="text-cyan-700 font-semibold hover:underline cursor-pointer">
                                            Laporan OHI-S
                                        </button>
                                        <p class="text-sm text-gray-600">Laporan OHI-S</p>
                                    </div>
                                    <div class="text-cyan-700 flex justify-end ">
                                        <button type="button">&gt;</button>
                                    </div>
                                </div>

                                <!-- Item Laporan Global Stok Obat -->
                                <div class="border-b border-cyan-600 pb-2 flex justify-between items-center">
                                    <div>
                                        <button class="text-cyan-700 font-semibold hover:underline cursor-pointer">
                                            Laporan Global Stok Obat
                                        </button>
                                        <p class="text-sm text-gray-600">Laporan Global Stock Obat</p>
                                    </div>
                                    <div class="text-cyan-700 flex justify-end ">
                                        <button type="button">&gt;</button>
                                    </div>
                                </div>

                                <!-- Item Laporan Stok Opname BHP -->
                                <div class="border-b border-cyan-600 pb-2 flex justify-between items-center">
                                    <div>
                                        <button class="text-cyan-700 font-semibold hover:underline cursor-pointer">
                                            Laporan Stok Opname BHP
                                        </button>
                                        <p class="text-sm text-gray-600">Laporan Detail Stock Opname BHP</p>
                                    </div>
                                    <div class="text-cyan-700 flex justify-end ">
                                        <button type="button">&gt;</button>
                                    </div>
                                </div>

                                <!-- Item Laporan KB -->
                                <div class="border-b border-cyan-600 pb-2 flex justify-between items-center">
                                    <div>
                                        <button class="text-cyan-700 font-semibold hover:underline cursor-pointer">
                                            Laporan KB
                                        </button>
                                        <p class="text-sm text-gray-600">Laporan Pencatatan KB</p>
                                    </div>
                                    <div class="text-cyan-700 flex justify-end ">
                                        <button type="button">&gt;</button>
                                    </div>
                                </div>

                                <!-- Item Laporan Ibu Hamil -->
                                <div class="border-b border-cyan-600 pb-2 flex justify-between items-center">
                                    <div>
                                        <button class="text-cyan-700 font-semibold hover:underline cursor-pointer">
                                            Laporan Ibu Hamil
                                        </button>
                                        <p class="text-sm text-gray-600">Laporan Ibu Hamil</p>
                                    </div>
                                    <div class="text-cyan-700 flex justify-end ">
                                        <button type="button">&gt;</button>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Content: Keuangan -->
                        <div x-show="activeTab === 'keuangan'" class="p-6">
                            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                                <!-- Item Total Transaksi per Dokter -->
                                <div class="border-b border-cyan-600 pb-2 flex justify-between items-center">
                                    <div>
                                        <button class="text-cyan-700 font-semibold hover:underline cursor-pointer">
                                            Total Transaksi per Dokter
                                        </button>
                                        <p class="text-sm text-gray-600">Total transaksi obat dan tindakan per dokter.
                                        </p>
                                    </div>
                                    <div class="text-cyan-700 flex justify-end ">
                                        <button type="button">&gt;</button>
                                    </div>
                                </div>

                                <!-- Item Detail Transaksi per Dokter -->
                                <div class="border-b border-cyan-600 pb-2 flex justify-between items-center">
                                    <div>
                                        <button class="text-cyan-700 font-semibold hover:underline cursor-pointer">
                                            Detail Transaksi per Dokter
                                        </button>
                                        <p class="text-sm text-gray-600">Detail transaksi obat dan tindakan per dokter.
                                        </p>
                                    </div>
                                    <div class="text-cyan-700 flex justify-end ">
                                        <button type="button">&gt;</button>
                                    </div>
                                </div>

                                <!-- Item Laporan Tindakan Dokter -->
                                <div class="border-b border-cyan-600 pb-2 flex justify-between items-center">
                                    <div>
                                        <button class="text-cyan-700 font-semibold hover:underline cursor-pointer">
                                            Laporan Tindakan Dokter
                                        </button>
                                        <p class="text-sm text-gray-600">Data tindakan yang dilakukan dokter.</p>
                                    </div>
                                    <div class="text-cyan-700 flex justify-end ">
                                        <button type="button">&gt;</button>
                                    </div>
                                </div>

                                <!-- Item Laporan Obat Dokter -->
                                <div class="border-b border-cyan-600 pb-2 flex justify-between items-center">
                                    <div>
                                        <button class="text-cyan-700 font-semibold hover:underline cursor-pointer">
                                            Laporan Obat Dokter
                                        </button>
                                        <p class="text-sm text-gray-600">Data obat keluar dari dokter.</p>
                                    </div>
                                    <div class="text-cyan-700 flex justify-end ">
                                        <button type="button">&gt;</button>
                                    </div>
                                </div>
                            </div>

                            <hr class="my-10 h-[2px] bg-black">

                            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                                <!-- Item Data Transaksi EMR -->
                                <div class="border-b border-cyan-600 pb-2 flex justify-between items-center">
                                    <div>
                                        <button class="text-cyan-700 font-semibold hover:underline cursor-pointer">
                                            Data Transaksi EMR
                                        </button>
                                        <p class="text-sm text-gray-600">Data transaksi pasien.</p>
                                    </div>
                                    <div class="text-cyan-700 flex justify-end ">
                                        <button type="button">&gt;</button>
                                    </div>
                                </div>

                                <!-- Item Penjualan Obat Langsung -->
                                <div class="border-b border-cyan-600 pb-2 flex justify-between items-center">
                                    <div>
                                        <button class="text-cyan-700 font-semibold hover:underline cursor-pointer">
                                            Penjualan Obat Langsung
                                        </button>
                                        <p class="text-sm text-gray-600">Transaksi penjualan obat langsung dari apotek.
                                        </p>
                                    </div>
                                    <div class="text-cyan-700 flex justify-end ">
                                        <button type="button">&gt;</button>
                                    </div>
                                </div>

                                <!-- Item Laporan Pembelian Obat -->
                                <div class="border-b border-cyan-600 pb-2 flex justify-between items-center">
                                    <div>
                                        <button class="text-cyan-700 font-semibold hover:underline cursor-pointer">
                                            Laporan Pembelian Obat
                                        </button>
                                        <p class="text-sm text-gray-600">Transaksi pembelian obat kepada supplier.</p>
                                    </div>
                                    <div class="text-cyan-700 flex justify-end ">
                                        <button type="button">&gt;</button>
                                    </div>
                                </div>

                                <!-- Item Pendapatan Hutang Piutang -->
                                <div class="border-b border-cyan-600 pb-2 flex justify-between items-center">
                                    <div>
                                        <button class="text-cyan-700 font-semibold hover:underline cursor-pointer">
                                            Pendapatan Hutang Piutang
                                        </button>
                                        <p class="text-sm text-gray-600">Data pendapatan dari hutang piutang</p>
                                    </div>
                                    <div class="text-cyan-700 flex justify-end ">
                                        <button type="button">&gt;</button>
                                    </div>
                                </div>

                                <!-- Item Biaya Penggunaan Obat -->
                                <div class="border-b border-cyan-600 pb-2 flex justify-between items-center">
                                    <div>
                                        <button class="text-cyan-700 font-semibold hover:underline cursor-pointer">
                                            Biaya Penggunaan Obat
                                        </button>
                                        <p class="text-sm text-gray-600">Total Biaya Penggunaan Obat per bulan
                                        </p>
                                    </div>
                                    <div class="text-cyan-700 flex justify-end ">
                                        <button type="button">&gt;</button>
                                    </div>
                                </div>

                                <!-- Item Biaya Penggunaan BHP -->
                                <div class="border-b border-cyan-600 pb-2 flex justify-between items-center">
                                    <div>
                                        <button class="text-cyan-700 font-semibold hover:underline cursor-pointer">
                                            Biaya Penggunaan BHP
                                        </button>
                                        <p class="text-sm text-gray-600">Total Biaya Penggunaan BHP per bulan</p>
                                    </div>
                                    <div class="text-cyan-700 flex justify-end ">
                                        <button type="button">&gt;</button>
                                    </div>
                                </div>

                                <!-- Item Laporan Penjualan Jenis Obat -->
                                <div class="border-b border-cyan-600 pb-2 flex justify-between items-center">
                                    <div>
                                        <button class="text-cyan-700 font-semibold hover:underline cursor-pointer">
                                            Laporan Penjualan Jenis Obat
                                        </button>
                                        <p class="text-sm text-gray-600">Laporan penjualan obat berdasarkan jenis obat
                                        </p>
                                    </div>
                                    <div class="text-cyan-700 flex justify-end ">
                                        <button type="button">&gt;</button>
                                    </div>
                                </div>

                                <!-- Item Tuslah Embalase -->
                                <div class="border-b border-cyan-600 pb-2 flex justify-between items-center">
                                    <div>
                                        <button class="text-cyan-700 font-semibold hover:underline cursor-pointer">
                                            Tuslah Embalase
                                        </button>
                                        <p class="text-sm text-gray-600">Data transaksi tuslah & embalase.</p>
                                    </div>
                                    <div class="text-cyan-700 flex justify-end ">
                                        <button type="button">&gt;</button>
                                    </div>
                                </div>

                                <!-- Item Laporan Persediaan Obat -->
                                <div class="border-b border-cyan-600 pb-2 flex justify-between items-center">
                                    <div>
                                        <button class="text-cyan-700 font-semibold hover:underline cursor-pointer">
                                            Laporan Persediaan Obat
                                        </button>
                                        <p class="text-sm text-gray-600">Laporan Jumlah Obat yang tersedia di depot
                                        </p>
                                    </div>
                                    <div class="text-cyan-700 flex justify-end ">
                                        <button type="button">&gt;</button>
                                    </div>
                                </div>

                                <!-- Item Laporan Persediaan BHP -->
                                <div class="border-b border-cyan-600 pb-2 flex justify-between items-center">
                                    <div>
                                        <button class="text-cyan-700 font-semibold hover:underline cursor-pointer">
                                            Laporan Persediaan BHP
                                        </button>
                                        <p class="text-sm text-gray-600">Laporan Jumlah BHP yang tersedia di depot</p>
                                    </div>
                                    <div class="text-cyan-700 flex justify-end ">
                                        <button type="button">&gt;</button>
                                    </div>
                                </div>

                                <!-- Item Laporan Pendapatan per Perawatan -->
                                <div class="border-b border-cyan-600 pb-2 flex justify-between items-center">
                                    <div>
                                        <button class="text-cyan-700 font-semibold hover:underline cursor-pointer">
                                            Laporan Pendapatan per Perawatan
                                        </button>
                                        <p class="text-sm text-gray-600">Pendapatan per perawatan.</p>
                                    </div>
                                    <div class="text-cyan-700 flex justify-end ">
                                        <button type="button">&gt;</button>
                                    </div>
                                </div>

                            </div>
                        </div>

                        <!-- Content: BPJS -->
                        <div x-show="activeTab === 'bpjs'" class="p-6">
                            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                                <!-- Item Laporan Penggunaan Obat BPJS -->
                                <div class="border-b border-cyan-600 pb-2 flex justify-between items-center">
                                    <div>
                                        <button class="text-cyan-700 font-semibold hover:underline cursor-pointer">
                                            Laporan Penggunaan Obat BPJS
                                        </button>
                                        <p class="text-sm text-gray-600">Data Laporan Penggunaan Obat BPJS di klinik
                                            ini
                                        </p>
                                    </div>
                                    <div class="text-cyan-700 flex justify-end ">
                                        <button type="button">&gt;</button>
                                    </div>
                                </div>

                                <!-- Item Laporan Rujukan BPJS -->
                                <div class="border-b border-cyan-600 pb-2 flex justify-between items-center">
                                    <div>
                                        <button class="text-cyan-700 font-semibold hover:underline cursor-pointer">
                                            Laporan Rujukan BPJS
                                        </button>
                                        <p class="text-sm text-gray-600">Data Laporan Rujukan BPJS di klinik ini
                                        </p>
                                    </div>
                                    <div class="text-cyan-700 flex justify-end ">
                                        <button type="button">&gt;</button>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Content: Grafik -->
                        <div x-show="activeTab === 'grafik'" class="p-6">
                            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                                <!-- Item Rata-Rata Waktu Tunggu Pasien -->
                                <div class="border-b border-cyan-600 pb-2 flex justify-between items-center">
                                    <div>
                                        <button class="text-cyan-700 font-semibold hover:underline cursor-pointer">
                                            Rata-Rata Waktu Tunggu Pasien
                                        </button>
                                        <p class="text-sm text-gray-600">Laporan rata-rata waktu tunggu pasien di ruang
                                            tunggu</p>
                                    </div>
                                    <div class="text-cyan-700 flex justify-end ">
                                        <button type="button">&gt;</button>
                                    </div>
                                </div>

                                <!-- Item Rata-Rata Waktu Konsultasi -->
                                <div class="border-b border-cyan-600 pb-2 flex justify-between items-center">
                                    <div>
                                        <button class="text-cyan-700 font-semibold hover:underline cursor-pointer">
                                            Rata-Rata Waktu Konsultasi
                                        </button>
                                        <p class="text-sm text-gray-600">Laporan rata-rata waktu pasien konsultasi
                                        </p>
                                    </div>
                                    <div class="text-cyan-700 flex justify-end ">
                                        <button type="button">&gt;</button>
                                    </div>
                                </div>

                                <!-- Item Rata-Rata Waktu Tunggu Apotek -->
                                <div class="border-b border-cyan-600 pb-2 flex justify-between items-center">
                                    <div>
                                        <button class="text-cyan-700 font-semibold hover:underline cursor-pointer">
                                            Rata-Rata Waktu Tunggu Apotek
                                        </button>
                                        <p class="text-sm text-gray-600">Laporan rata-rata waktu pasien menunggu obat
                                        </p>
                                    </div>
                                    <div class="text-cyan-700 flex justify-end ">
                                        <button type="button">&gt;</button>
                                    </div>
                                </div>

                                <!-- Item Laporan Kunjungan Pasien -->
                                <div class="border-b border-cyan-600 pb-2 flex justify-between items-center">
                                    <div>
                                        <button class="text-cyan-700 font-semibold hover:underline cursor-pointer">
                                            Laporan Kunjungan Pasien
                                        </button>
                                        <p class="text-sm text-gray-600">Laporan Kunjungan Pasien Baru dan Lama Setiap
                                            Bulan
                                        </p>
                                    </div>
                                    <div class="text-cyan-700 flex justify-end ">
                                        <button type="button">&gt;</button>
                                    </div>
                                </div>

                                <!-- Item Grafik Tipe Pasien Kunjungan Klinik -->
                                <div class="border-b border-cyan-600 pb-2 flex justify-between items-center">
                                    <div>
                                        <button class="text-cyan-700 font-semibold hover:underline cursor-pointer">
                                            Grafik Tipe Pasien Kunjungan Klinik
                                        </button>
                                        <p class="text-sm text-gray-600">Laporan Tipe Metode bayar yang dipakai pasien
                                            selama rentang waktu tertentu, selama pasien tersebut sudah bayar
                                        </p>
                                    </div>
                                    <div class="text-cyan-700 flex justify-end ">
                                        <button type="button">&gt;</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Content Pasien -->
                <div x-cloak x-show="tabAktivitas === 'pasien' " class="w-full">
                    <div class="bg-white p-4 rounded-md w-full" x-data="{ activeTab: 'summary' }">
                        <!-- Tabs -->
                        <div class="flex space-x-2 mb-4 border-b">
                            <button @click="activeTab = 'summary'"
                                :class="activeTab === 'summary' ? 'text-blue-600 border-blue-600' :
                                    'text-gray-600 border-transparent'"
                                class="px-4 py-2 text-sm font-medium border-b-2">
                                Summary
                            </button>
                            <button @click="activeTab = 'dataPasien'"
                                :class="activeTab === 'dataPasien' ? 'text-blue-600 border-blue-600' :
                                    'text-gray-600 border-transparent'"
                                class="px-4 py-2 text-sm font-medium border-b-2">
                                Data Pasien
                            </button>
                        </div>

                        <!-- Content: Ikhtisar -->
                        <div x-show="activeTab === 'summary'" class="space-y-6">
                            <!-- Statistic Cards -->
                            <div class="grid grid-cols-1 md:grid-cols-3 gap-4 mb-6">
                                <div class="border rounded-md shadow p-4 text-center bg-white">
                                    <h3 class="text-sm font-medium text-gray-600">Pasien Terdaftar</h3>
                                    <p class="text-xl font-bold text-blue-600">1 Pasien</p>
                                </div>
                                <div class="border rounded-md shadow p-4 text-center bg-white">
                                    <h3 class="text-sm font-medium text-gray-600">Pasien Baru Bulan Ini</h3>
                                    <p class="text-xl font-bold text-blue-600">1 Pasien</p>
                                </div>
                                <div class="border rounded-md shadow p-4 text-center bg-white">
                                    <h3 class="text-sm font-medium text-gray-600">Pasien Walk In Hari Ini</h3>
                                    <p class="text-xl font-bold text-blue-600">0 Pasien</p>
                                </div>
                            </div>

                            <!-- Charts Grid -->
                            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">

                                <!-- Chart 1 -->
                                <div class="border rounded-md shadow p-4 bg-white">
                                    <h4 class="text-sm font-semibold text-gray-700 mb-2">Agama</h4>
                                    <canvas id="chartAgama" class="h-48"></canvas>
                                </div>

                                <!-- Chart 2 -->
                                <div class="border rounded-md shadow p-4 bg-white">
                                    <h4 class="text-sm font-semibold text-gray-700 mb-2">Golongan Darah</h4>
                                    <canvas id="chartDarah" class="h-48"></canvas>
                                </div>

                                <!-- Chart 3 -->
                                <div class="border rounded-md shadow p-4 bg-white">
                                    <h4 class="text-sm font-semibold text-gray-700 mb-2">Pendidikan Terakhir</h4>
                                    <canvas id="chartPendidikan" class="h-48"></canvas>
                                </div>

                                <!-- Chart 4 -->
                                <div class="border rounded-md shadow p-4 bg-white">
                                    <h4 class="text-sm font-semibold text-gray-700 mb-2">Pekerjaan</h4>
                                    <canvas id="chartPekerjaan" class="h-48"></canvas>
                                </div>

                                <!-- Chart 4 -->
                                <div class="border rounded-md shadow p-4 bg-white">
                                    <h4 class="text-sm font-semibold text-gray-700 mb-2">Pekerjaan</h4>
                                    <canvas id="chartPekerjaan" class="h-48"></canvas>
                                </div>

                            </div>
                        </div>

                        <!-- Content: Ikhtisar -->
                        <div x-show="activeTab === 'dataPasien'" class="space-y-6">
                            <!-- Search + Button -->
                            <div class="flex justify-between items-center mb-4">
                                <div class="relative w-1/2">
                                    <input type="text" placeholder="Search"
                                        class="w-full border rounded px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-400">
                                    <i class="fas fa-search absolute right-3 top-3 text-gray-400"></i>
                                </div>
                                <button class="bg-green-600 text-white px-4 py-2 rounded hover:bg-green-700">
                                    + Pasien Baru
                                </button>
                            </div>

                            <div class="overflow-x-auto bg-white rounded shadow">
                                <table class="w-full border-collapse text-sm">
                                    <thead>
                                        <tr class="bg-gray-100 text-left text-gray-600">
                                            <th class="p-3 border"><input type="checkbox"></th>
                                            <th class="p-3 border">Nama Pasien</th>
                                            <th class="p-3 border">Nomor RM</th>
                                            <th class="p-3 border">Tanggal Lahir</th>
                                            <th class="p-3 border">No. HP</th>
                                            <th class="p-3 border">Alamat</th>
                                            <th class="p-3 border text-center">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr class="hover:bg-gray-50">
                                            <td class="p-3 border text-center"><input type="checkbox"></td>
                                            <td class="p-3 border">Tn. Contoh</td>
                                            <td class="p-3 border text-blue-600 font-medium">12345</td>
                                            <td class="p-3 border">01 Sep 2000</td>
                                            <td class="p-3 border">********7890</td>
                                            <td class="p-3 border">*******************************</td>
                                            <td class="p-3 border text-center space-x-3">
                                                <button class="text-blue-500 hover:text-blue-700">
                                                    <svg xmlns="http://www.w3.org/2000/svg" height="24px"
                                                        viewBox="0 -960 960 960" width="24px" fill="#000000">
                                                        <path
                                                            d="M120-120v-170l528-527q12-11 26.5-17t30.5-6q16 0 31 6t26 18l55 56q12 11 17.5 26t5.5 30q0 16-5.5 30.5T817-647L290-120H120Zm584-528 56-56-56-56-56 56 56 56Z" />
                                                    </svg>
                                                </button>
                                                <button class="text-gray-500 hover:text-gray-700">
                                                    <svg xmlns="http://www.w3.org/2000/svg" height="24px"
                                                        viewBox="0 -960 960 960" width="24px" fill="#000000">
                                                        <path
                                                            d="M720-680H240v-160h480v160Zm0 220q17 0 28.5-11.5T760-500q0-17-11.5-28.5T720-540q-17 0-28.5 11.5T680-500q0 17 11.5 28.5T720-460Zm-80 260v-160H320v160h320Zm80 80H240v-160H80v-240q0-51 35-85.5t85-34.5h560q51 0 85.5 34.5T880-520v240H720v160Z" />
                                                    </svg>
                                                </button>
                                                <button class="text-red-500 hover:text-red-700">
                                                    <svg xmlns="http://www.w3.org/2000/svg" height="24px"
                                                        viewBox="0 -960 960 960" width="24px" fill="#ff0000">
                                                        <path
                                                            d="M280-120q-33 0-56.5-23.5T200-200v-520h-40v-80h200v-40h240v40h200v80h-40v520q0 33-23.5 56.5T680-120H280Zm80-160h80v-360h-80v360Zm160 0h80v-360h-80v360Z" />
                                                    </svg>
                                                </button>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Content Akun -->
                <div x-cloak x-show="tabAktivitas === 'akun' " class="w-full">
                    <div class="bg-white p-4 rounded-md">
                        <!-- Header -->
                        <div class="flex justify-between items-center mb-4">
                            <button class="p-3 bg-gray-200 rounded hover:bg-gray-300 text-sm">
                                EDIT AKUN
                            </button>
                            <div class="flex items-center gap-2">
                                <input type="date" value="2025-09-01" class="border rounded px-2 py-1 text-sm">
                                <span>-</span>
                                <input type="date" value="2025-09-30" class="border rounded px-2 py-1 text-sm">
                                <button class="p-1 rounded hover:bg-gray-100">
                                    🔄
                                </button>
                            </div>
                        </div>

                        <!-- Card Wrapper -->
                        <div class="flex gap-4">
                            <!-- Card Kas -->
                            <div class="flex-1 bg-white rounded shadow p-4 text-center">
                                <h3 class="text-green-500 font-semibold">Kas</h3>
                                <p class="text-red-500">Rp0</p>
                                <p><span class="text-green-600">+Rp0</span> / <span class="text-red-500">-Rp0</span>
                                </p>
                            </div>

                            <!-- Card Cover BPJS -->
                            <div class="flex-1 bg-white rounded shadow p-4 text-center">
                                <h3 class="text-blue-500 font-semibold">Cover BPJS</h3>
                                <p class="text-red-500">Rp0</p>
                                <p><span class="text-green-600">+Rp0</span> / <span class="text-red-500">-Rp0</span>
                                </p>
                            </div>
                        </div>

                        <!-- Info bawah -->
                        <div class="text-center text-gray-500 mt-6">
                            Tidak ada data grafik
                        </div>
                    </div>
                </div>

                <!-- Content Warning -->
                <div x-cloak x-show="tabAktivitas === 'warning' " class="w-full">
                    <div class="bg-white p-4 rounded-md w-full" x-data="{ activeTab: 'pembayaranRestokObat' }">
                        <!-- Tabs -->
                        <div class="flex space-x-2 mb-4 border-b">
                            <button @click="activeTab = 'pembayaranRestokObat'"
                                :class="activeTab === 'pembayaranRestokObat' ? 'text-blue-600 border-blue-600' :
                                    'text-gray-600 border-transparent'"
                                class="px-4 py-2 text-sm font-medium border-b-2">
                                Pembayaran Restok Obat
                            </button>
                            <button @click="activeTab = 'sipDanSTRTenagaMedis'"
                                :class="activeTab === 'sipDanSTRTenagaMedis' ? 'text-blue-600 border-blue-600' :
                                    'text-gray-600 border-transparent'"
                                class="px-4 py-2 text-sm font-medium border-b-2">
                                Sip Dan STR Tenaga Medis
                            </button>
                        </div>

                        <!-- Content: Ikhtisar -->
                        <div x-show="activeTab === 'pembayaranRestokObat'" class="space-y-6">
                            <div class="overflow-x-auto bg-white rounded shadow">
                                <table class="w-full border-collapse text-sm">
                                    <thead>
                                        <tr class="bg-gray-100 text-left text-gray-600">
                                            <th class="p-3 border">Kode</th>
                                            <th class="p-3 border">Supplier</th>
                                            <th class="p-3 border">Detail Item</th>
                                            <th class="p-3 border">Jumlah</th>
                                            <th class="p-3 border">Total Harga</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr class="hover:bg-gray-50">
                                            <td class="p-3 border">-</td>
                                            <td class="p-3 border ">-</td>
                                            <td class="p-3 border">-</td>
                                            <td class="p-3 border">-</td>
                                            <td class="p-3 border">-</td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>

                        <!-- Content: Ikhtisar -->
                        <div x-show="activeTab === 'sipDanSTRTenagaMedis'" class="space-y-6">
                            <div class="overflow-x-auto bg-white rounded shadow">
                                <table class="w-full border-collapse text-sm">
                                    <thead>
                                        <tr class="bg-gray-100 text-left text-gray-600">
                                            <th class="p-3 border">Dokter</th>
                                            <th class="p-3 border">STR</th>
                                            <th class="p-3 border">SIP</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr class="hover:bg-gray-50">
                                            <td class="p-3 border">-</td>
                                            <td class="p-3 border">-</td>
                                            <td class="p-3 border">-</td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Content Merge Rekam Medis -->
                <div x-cloak x-show="tabAktivitas === 'mergeRekamMedis' " class="w-full">
                    <div class="bg-white px-6 py-4 rounded-md" x-data="{ pasien: [1] }">
                        <h2 class="text-2xl font-semibold mb-4 text-blue-600">Merge Rekam Medis</h2>

                        <!-- Pasien Tujuan Merge -->
                        <div class="mb-6">
                            <label class="block text-sm font-medium text-blue-600 mb-1">
                                Pasien Tujuan Merge
                            </label>
                            <div class="flex items-center border-b border-gray-300">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-gray-400 mr-2"
                                    fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M21 21l-4.35-4.35m0 0A7.5 7.5 0 1110.5 3a7.5 7.5 0 016.15 13.65z" />
                                </svg>
                                <input type="text" placeholder="Cari Pasien"
                                    class="w-full focus:outline-none py-2 text-sm">
                            </div>
                        </div>

                        <!-- Pasien Yang Ingin Dimerge (dinamis) -->
                        <template x-for="(item, index) in pasien" :key="index">
                            <div class="mb-6 relative">
                                <label class="block text-sm font-medium text-blue-600 mb-1">
                                    Pasien Yang Ingin Dimerge
                                </label>
                                <div class="flex items-center border-b border-gray-300">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-gray-400 mr-2"
                                        fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M21 21l-4.35-4.35m0 0A7.5 7.5 0 1110.5 3a7.5 7.5 0 016.15 13.65z" />
                                    </svg>
                                    <input type="text" placeholder="Cari Pasien"
                                        class="w-full focus:outline-none py-2 text-sm">
                                </div>
                                <!-- Tombol X hanya muncul di kolom tambahan -->
                                <template x-if="index > 0">
                                    <button @click="pasien.splice(index, 1)"
                                        class="absolute top-0 right-0 text-red-500 hover:text-red-700 text-sm font-bold">
                                        ❌
                                    </button>
                                </template>
                            </div>
                        </template>

                        <!-- Tambah Pasien -->
                        <button @click="pasien.push(pasien.length + 1)"
                            class="text-blue-600 text-sm cursor-pointer mb-8">
                            + Tambah Pasien Yang Ingin Dimerge
                        </button>

                        <!-- Tombol Merge -->
                        <div class="flex justify-end">
                            <button
                                class="bg-yellow-500 hover:bg-yellow-600 text-white text-sm font-bold px-4 py-2 rounded">
                                MERGE
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div> --}}
</x-app-layout>
