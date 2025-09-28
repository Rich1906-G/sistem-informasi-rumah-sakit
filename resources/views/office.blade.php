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

        <div class="grid grid-row-1">
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
                    <div class="bg-white px-6 py-4 rounded-md">
                        <h2 class="text-2xl font-semibold mb-4 text-blue-600">Antri Cepat</h2>

                        <div x-data="{ showRange: false, startDate: '', endDate: '' }" x-init="startDate = new Date().toISOString().split('T')[0];
                        endDate = startDate"
                            class="flex items-start justify-between w-full">

                            <!-- Jika belum klik + -->
                            <div x-show="!showRange" class="flex flex-row gap-4">
                                <div>
                                    <label class="text-sm text-gray-600">Tanggal Kunjungan</label>
                                    <input type="date" x-model="startDate"
                                        class="w-full mt-1 border rounded p-2" />
                                </div>

                                <button @click="showRange = true"
                                    class="text-2xl px-2 text-gray-600 hover:text-blue-600 flex items-center">
                                    +
                                </button>
                            </div>

                            <!-- Jika sudah klik + -->
                            <div x-show="showRange" class="flex flex-row gap-4 items-center">
                                <div>
                                    <label class="text-sm text-gray-600">Dari tanggal</label>
                                    <input type="date" x-model="startDate"
                                        class="w-full mt-1 border rounded p-2" />
                                </div>

                                <span class="">-</span>

                                <div>
                                    <label class="text-sm text-gray-600">Hingga tanggal</label>
                                    <input type="date" x-model="endDate" class="w-full mt-1 border rounded p-2" />
                                </div>

                                <button @click="showRange = false"
                                    class="text-2xl px-2 text-gray-600 hover:text-red-600 flex items-center">
                                    ✕
                                </button>
                            </div>

                            <div class="w-40">
                                <label class="block text-sm text-gray-600">Poli</label>
                                <select class="w-full mt-1 border rounded-md p-2 items-center">
                                    <option selected>Semua Poli</option>
                                    <option value="umum">Umum</option>
                                    <option value="kecantikan">Kecantikan</option>
                                </select>
                            </div>
                        </div>

                        <!-- Table -->
                        <div class="bg-white shadow rounded overflow-x-auto my-5">
                            <table class="min-w-full text-sm">
                                <thead class="bg-blue-100">
                                    <tr>
                                        <th class="px-4 py-2 text-left">Tanggal Kunjungan</th>
                                        <th class="px-4 py-2 text-left">No</th>
                                        <th class="px-4 py-2 text-left">Poli</th>
                                        <th class="px-4 py-2 text-left">Nama Pasien</th>
                                        <th class="px-4 py-2 text-left">Rencana Tindakan</th>
                                        <th class="px-4 py-2 text-left">Rencana Paket</th>
                                        <th class="px-4 py-2 text-left">Tenaga Medis</th>
                                        <th class="px-4 py-2 text-left">Tipe Bayar</th>
                                        <th class="px-4 py-2 text-left">Status</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr class="border-t">
                                        <td class="px-4 py-2">-</td>
                                        <td class="px-4 py-2">-</td>
                                        <td class="px-4 py-2">-</td>
                                        <td class="px-4 py-2">-</td>
                                        <td class="px-4 py-2">-</td>
                                        <td class="px-4 py-2">-</td>
                                        <td class="px-4 py-2">-</td>
                                        <td class="px-4 py-2">-</td>
                                        <td class="px-4 py-2">-</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>


                </div>

                <!-- Content Pasien -->
                <div x-cloak x-show="tabAktivitas === 'pasien' " class="w-full">
                    <div class="bg-white px-6 py-4 rounded-md">
                        <h2 class="text-2xl font-semibold mb-4 text-blue-600">Rawat Jalan UGD</h2>

                        <div x-data="{ showRange: false, startDate: '', endDate: '' }" x-init="startDate = new Date().toISOString().split('T')[0];
                        endDate = startDate"
                            class="flex items-start justify-between w-full">

                            <!-- Jika belum klik + -->
                            <div x-show="!showRange" class="flex flex-row gap-4">
                                <div>
                                    <label class="text-sm text-gray-600">Tanggal Kunjungan</label>
                                    <input type="date" x-model="startDate"
                                        class="w-full mt-1 border rounded p-2" />
                                </div>

                                <button @click="showRange = true"
                                    class="text-2xl px-2 text-gray-600 hover:text-blue-600 flex items-center">
                                    +
                                </button>
                            </div>

                            <!-- Jika sudah klik + -->
                            <div x-show="showRange" class="flex flex-row gap-4 items-center">
                                <div>
                                    <label class="text-sm text-gray-600">Dari tanggal</label>
                                    <input type="date" x-model="startDate"
                                        class="w-full mt-1 border rounded p-2" />
                                </div>

                                <span class="">-</span>

                                <div>
                                    <label class="text-sm text-gray-600">Hingga tanggal</label>
                                    <input type="date" x-model="endDate" class="w-full mt-1 border rounded p-2" />
                                </div>

                                <button @click="showRange = false"
                                    class="text-2xl px-2 text-gray-600 hover:text-red-600 flex items-center">
                                    ✕
                                </button>
                            </div>
                        </div>

                        <!-- Table -->
                        <div class="bg-white shadow rounded overflow-x-auto my-5">
                            <table class="min-w-full text-sm">
                                <thead class="bg-blue-100">
                                    <tr>
                                        <th class="px-4 py-2 text-left">Tanggal</th>
                                        <th class="px-4 py-2 text-left">Nama Pasien</th>
                                        <th class="px-4 py-2 text-left">Traise</th>
                                        <th class="px-4 py-2 text-left">Tanggal Pulang</th>
                                        <th class="px-4 py-2 text-left">Status</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr class="border-t">
                                        <td class="px-4 py-2">-</td>
                                        <td class="px-4 py-2">-</td>
                                        <td class="px-4 py-2">-</td>
                                        <td class="px-4 py-2">-</td>
                                        <td class="px-4 py-2">-</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>


                </div>

                <!-- Content Akun -->
                <div x-cloak x-show="tabAktivitas === 'akun' " class="w-full">
                    <div class="bg-white px-6 py-4 rounded-md">
                        <h2 class="text-2xl font-semibold mb-4 text-blue-600">Kunjungan Sehat</h2>

                        <div x-data="{ showRange: false, startDate: '', endDate: '' }" x-init="startDate = new Date().toISOString().split('T')[0];
                        endDate = startDate"
                            class="flex items-start justify-between w-full">

                            <!-- Jika belum klik + -->
                            <div x-show="!showRange" class="flex flex-row gap-4">
                                <div>
                                    <label class="text-sm text-gray-600">Tanggal Kunjungan</label>
                                    <input type="date" x-model="startDate"
                                        class="w-full mt-1 border rounded p-2" />
                                </div>

                                <button @click="showRange = true"
                                    class="text-2xl px-2 text-gray-600 hover:text-blue-600 flex items-center">
                                    +
                                </button>
                            </div>

                            <!-- Jika sudah klik + -->
                            <div x-show="showRange" class="flex flex-row gap-4 items-center">
                                <div>
                                    <label class="text-sm text-gray-600">Dari tanggal</label>
                                    <input type="date" x-model="startDate"
                                        class="w-full mt-1 border rounded p-2" />
                                </div>

                                <span class="">-</span>

                                <div>
                                    <label class="text-sm text-gray-600">Hingga tanggal</label>
                                    <input type="date" x-model="endDate" class="w-full mt-1 border rounded p-2" />
                                </div>

                                <button @click="showRange = false"
                                    class="text-2xl px-2 text-gray-600 hover:text-red-600 flex items-center">
                                    ✕
                                </button>
                            </div>
                        </div>

                        <!-- Table -->
                        <div class="bg-white shadow rounded overflow-x-auto my-5">
                            <table class="min-w-full text-sm">
                                <thead class="bg-blue-100">
                                    <tr>
                                        <th class="px-4 py-2 text-left">Tanggal</th>
                                        <th class="px-4 py-2 text-left">Nama Pasien</th>
                                        <th class="px-4 py-2 text-left">Aktivitas</th>
                                        <th class="px-4 py-2 text-left">Tipe Bayar</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr class="border-t">
                                        <td class="px-4 py-2">-</td>
                                        <td class="px-4 py-2">-</td>
                                        <td class="px-4 py-2">-</td>
                                        <td class="px-4 py-2">-</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>


                </div>

                <!-- Content Warning -->
                <div x-cloak x-show="tabAktivitas === 'warning' " class="w-full">
                    <div class="bg-white px-6 py-4 rounded-md">
                        <h2 class="text-2xl font-semibold mb-4 text-blue-600">Promotif Preventif</h2>

                        <div x-data="{ showRange: false, startDate: '', endDate: '' }" x-init="startDate = new Date().toISOString().split('T')[0];
                        endDate = startDate"
                            class="flex items-start justify-between w-full">

                            <!-- Jika belum klik + -->
                            <div x-show="!showRange" class="flex flex-row gap-4">
                                <div>
                                    <label class="text-sm text-gray-600">Tanggal Kunjungan</label>
                                    <input type="date" x-model="startDate"
                                        class="w-full mt-1 border rounded p-2" />
                                </div>

                                <button @click="showRange = true"
                                    class="text-2xl px-2 text-gray-600 hover:text-blue-600 flex items-center">
                                    +
                                </button>
                            </div>

                            <!-- Jika sudah klik + -->
                            <div x-show="showRange" class="flex flex-row gap-4 items-center">
                                <div>
                                    <label class="text-sm text-gray-600">Dari tanggal</label>
                                    <input type="date" x-model="startDate"
                                        class="w-full mt-1 border rounded p-2" />
                                </div>

                                <span class="">-</span>

                                <div>
                                    <label class="text-sm text-gray-600">Hingga tanggal</label>
                                    <input type="date" x-model="endDate" class="w-full mt-1 border rounded p-2" />
                                </div>

                                <button @click="showRange = false"
                                    class="text-2xl px-2 text-gray-600 hover:text-red-600 flex items-center">
                                    ✕
                                </button>
                            </div>
                        </div>

                        <!-- Table -->
                        <div class="bg-white shadow rounded overflow-x-auto my-5">
                            <table class="min-w-full text-sm">
                                <thead class="bg-blue-100">
                                    <tr>
                                        <th class="px-4 py-2 text-left">Tanggal</th>
                                        <th class="px-4 py-2 text-left">Nama Pasien</th>
                                        <th class="px-4 py-2 text-left">Tipe Bayar</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr class="border-t">
                                        <td class="px-4 py-2">-</td>
                                        <td class="px-4 py-2">-</td>
                                        <td class="px-4 py-2">-</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>

                <!-- Content Merge Rekam Medis -->
                <div x-cloak x-show="tabAktivitas === 'mergeRekamMedis' " class="w-full">
                    <div class="bg-white px-6 py-4 rounded-md">
                        <h2 class="text-2xl font-semibold mb-4 text-blue-600">Kegiatan Kelompok</h2>

                        <div x-data="{ showRange: false, startDate: '', endDate: '' }" x-init="startDate = new Date().toISOString().split('T')[0];
                        endDate = startDate"
                            class="flex items-start justify-between w-full">

                            <!-- Jika belum klik + -->
                            <div x-show="!showRange" class="flex flex-row gap-4">
                                <div>
                                    <label class="text-sm text-gray-600">Tanggal Kunjungan</label>
                                    <input type="date" x-model="startDate"
                                        class="w-full mt-1 border rounded p-2" />
                                </div>

                                <button @click="showRange = true"
                                    class="text-2xl px-2 text-gray-600 hover:text-blue-600 flex items-center">
                                    +
                                </button>
                            </div>

                            <!-- Jika sudah klik + -->
                            <div x-show="showRange" class="flex flex-row gap-4 items-center">
                                <div>
                                    <label class="text-sm text-gray-600">Dari tanggal</label>
                                    <input type="date" x-model="startDate"
                                        class="w-full mt-1 border rounded p-2" />
                                </div>

                                <span class="">-</span>

                                <div>
                                    <label class="text-sm text-gray-600">Hingga tanggal</label>
                                    <input type="date" x-model="endDate" class="w-full mt-1 border rounded p-2" />
                                </div>

                                <button @click="showRange = false"
                                    class="text-2xl px-2 text-gray-600 hover:text-red-600 flex items-center">
                                    ✕
                                </button>
                            </div>

                            <div>
                                <button
                                    class="px-2 py-4 bg-green-700 hover:bg-green-500 text-white rounded-md font-semibold text-md">
                                    <span>+ TAMBAH KEGIATAN BARU</span>
                                </button>
                            </div>
                        </div>

                        <!-- Table -->
                        <div class="bg-white shadow rounded overflow-x-auto my-5">
                            <table class="min-w-full text-sm">
                                <thead class="bg-blue-100">
                                    <tr>
                                        <th class="px-4 py-2 text-left">Tanggal Dibuat</th>
                                        <th class="px-4 py-2 text-left">Tanggal Pelaksaan</th>
                                        <th class="px-4 py-2 text-left">Nama Club</th>
                                        <th class="px-4 py-2 text-left">Pembicara</th>
                                        <th class="px-4 py-2 text-left">Biaya</th>
                                        <th class="px-4 py-2 text-left">Jumlah Peserta</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr class="border-t">
                                        <td class="px-4 py-2">-</td>
                                        <td class="px-4 py-2">-</td>
                                        <td class="px-4 py-2">-</td>
                                        <td class="px-4 py-2">-</td>
                                        <td class="px-4 py-2">-</td>
                                        <td class="px-4 py-2">-</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
