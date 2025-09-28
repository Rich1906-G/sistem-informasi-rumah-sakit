<x-app-layout>
    <div x-data="{ tabAktivitas: '' }" class="p-4 sm:ml-64 lg:p-0">
        {{-- Start Header --}}
        <div class="w-full sm:px-6 lg:px-0 shadow-md">
            <div class="bg-white dark:bg-gray-800 shadow-sm sm:rounded-lg lg:rounded-none">
                <div class="flex items-center justify-end p-6">
                    <div class="flex items-center justify-end w-1/2 gap-4">
                        <div class="flex flex-row gap-8 mx-4 items-center">
                            <img class="rounded-md h-[70px] w-auto" src="{{ asset('storage/assets/royal_klinik.png') }}"
                                alt="foto_bang">
                            <button class="p-4 bg-blue-600 text-white rounded-md">Royal Prima</button>
                            </div>

                        <div class="grid grid-cols-3 gap-10">
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

                <div class="flex items-center justify-between ">
                    <div class="p-6">
                        <div class="font-normal text-2xl text-sky-700 dark:text-gray-200 leading-tight">
                            {{ __('Kasir') }}
                        </div>

                        <h2 class="font-light text-lg text-sky-500 dark:text-gray-200 leading-tight">
                            {{ __('Royal Prima Medan') }}
                        </h2>
                    </div>
                    <div class="p-6 flex items-center gap-4">
                        <button
                            class="px-3 py-3 rounded-lg bg-blue-500 hover:bg-blue-600 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                            <svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 -960 960 960"
                                width="24px" fill="#FFFFFF">
                                <path
                                    d="M480-160q-134 0-227-93t-93-227q0-134 93-227t227-93q69 0 132 28.5T720-690v-110h80v280H520v-80h168q-32-56-87.5-88T480-720q-100 0-170 70t-70 170q0 100 70 170t170 70q77 0 139-44t87-116h84q-28 106-114 173t-196 67Z" />
                            </svg>
                        </button>

                        {{-- <button
                            class="px-3 py-3 rounded-md bg-blue-500 hover:bg-blue-600 flex w-auto items-center justify-center gap-2">
                            <span class="text-white ml-4">All</span>
                            <svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 -960 960 960"
                                width="24px" fill="#FFFFFF">
                                <path d="M480-344 240-584l56-56 184 184 184-184 56 56-240 240Z" />
                            </svg>
                        </button> --}}

                        <button
                            class="text-white bg-blue-500 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 rounded-lg text-sm px-3 py-3 text-center inline-flex items-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800"
                            type="button">All <svg xmlns="http://www.w3.org/2000/svg" height="24px"
                                viewBox="0 -960 960 960" width="24px" fill="#FFFFFF">
                                <path d="M480-344 240-584l56-56 184 184 184-184 56 56-240 240Z" />
                            </svg>
                        </button>
                    </div>
                </div>

            </div>
        </div>
        {{-- End Header --}}

        {{-- Start Content --}}
        <div class="grid grid-row-1">

            <!-- Main Content -->
            <div class="flex p-6 gap-4 items-start">
                <!-- Kiri: Menu Table -->
                <div class="grid gap-4 h-auto self-start">
                    <div class="w-64 bg-white shadow rounded">
                        <ul class="divide-y divide-gray-200">
                            <li>
                                <button @click="tabAktivitas = (tabAktivitas === 'pembayaran') ? '' : 'pembayaran'"
                                    :class="tabAktivitas === 'pembayaran'
                                        ?
                                        'w-full text-start px-4 py-3 bg-blue-600 text-white font-medium' :
                                        'w-full text-start px-4 py-3 bg-white text-gray-800 font-medium '">Pembayaran
                                </button>
                            </li>
                            <li>
                                <button
                                    @click="tabAktivitas = (tabAktivitas === 'hitangDanPiutang') ? '' : 'hitangDanPiutang' "
                                    :class="tabAktivitas === 'hitangDanPiutang'
                                        ?
                                        'w-full text-start px-4 py-3 bg-blue-600 text-white font-medium' :
                                        'w-full text-start px-4 py-3 bg-white text-gray-800 font-medium '">
                                    Hutang Dan Piutang
                                </button>
                            </li>
                            <li>
                                <button @click="tabAktivitas = (tabAktivitas === 'biayaBooking') ? '' : 'biayaBooking' "
                                    :class="tabAktivitas === 'biayaBooking'
                                        ?
                                        'w-full text-start px-4 py-3 bg-blue-600 text-white font-medium' :
                                        'w-full text-start px-4 py-3 bg-white text-gray-800 font-medium '">
                                    Biaya Booking
                                </button>
                            </li>
                        </ul>
                    </div>
                </div>

                <style>
                    [x-cloak] {
                        display: none
                    }
                </style>

                <!-- Content Antrian Hari Ini-->
                <div x-show="tabAktivitas === 'pembayaran' " class="w-full" x-cloak>
                    <div class="bg-white px-6 py-4 rounded-md">
                        <div class="w-full flex flex-nowrap gap-4">
                            <div class="relative w-1/2">
                                <div
                                    class="absolute inset-y-0 end-0 top-0 flex items-center pe-3.5 pointer-events-none">
                                    <svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 -960 960 960"
                                        width="24px" fill="#000000">
                                        <path
                                            d="M784-120 532-372q-30 24-69 38t-83 14q-109 0-184.5-75.5T120-580q0-109 75.5-184.5T380-840q109 0 184.5 75.5T640-580q0 44-14 83t-38 69l252 252-56 56ZM380-400q75 0 127.5-52.5T560-580q0-75-52.5-127.5T380-760q-75 0-127.5 52.5T200-580q0 75 52.5 127.5T380-400Z" />
                                    </svg>
                                </div>
                                <input type="text" name="search_pembayaran"
                                    aria-describedby="helper-text-explanation"
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full pe-10 p-2.5  dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                    pattern="[0-9]{3}-[0-9]{3}-[0-9]{4}"
                                    placeholder="Cari nama pasien, dokter, atau invoice" required />
                            </div>

                            <button
                                class="bg-green-600 hover:bg-green-500 focus:ring-4 focus:outline-none focus:ring-green-300 rounded-lg inline-flex flex-1 text-center items-center text-white px-5 py-2.5">
                                + Pembayaran
                            </button>

                            <button
                                class="bg-green-600 hover:bg-green-500 focus:ring-4 focus:outline-none focus:ring-green-300 rounded-lg inline-flex flex-1 text-center items-center text-white px-5 py-2.5">
                                EXPORT
                            </button>
                        </div>

                        <div x-data="{ startDate: '', endDate: '' }" x-init="startDate = new Date().toISOString().split('T')[0];
                        endDate = startDate" class="flex items-start w-full my-5 ">
                            <form class="flex gap-4">
                                <div class="flex flex-row gap-4 items-center">
                                    <div>
                                        <label class="text-sm text-gray-600">Dari tanggal</label>
                                        <input type="date" x-model="startDate"
                                            class="w-full mt-1 border rounded p-2" />
                                    </div>

                                    <span class="justify-center">-</span>

                                    <div>
                                        <label class="text-sm text-gray-600">Hingga tanggal</label>
                                        <input type="date" x-model="endDate"
                                            class="w-full mt-1 border rounded p-2" />
                                    </div>
                                </div>

                                <div class="flex items-end">
                                    <button type="submit"
                                        class="bg-slate-500 hover:bg-slate-600 focus:ring-4 focus:ring-outline-none focus:bg-slate-800 rounded-lg text-center px-3 py-3 text-white">
                                        FILTER
                                    </button>
                                </div>

                            </form>
                        </div>

                        <!-- Table -->
                        <div class="bg-white shadow rounded overflow-x-auto my-5">
                            <table class="min-w-full text-sm">
                                <thead class="bg-blue-100">
                                    <tr>
                                        <th class="px-4 py-2 text-left">Invoice</th>
                                        <th class="px-4 py-2 text-left">Nama Lengkap Pasien</th>
                                        <th class="px-4 py-2 text-left">Keterangan</th>
                                        <th class="px-4 py-2 text-left">Actions</th>
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

                <!-- Content Obat -->
                <div x-show="tabAktivitas === 'hitangDanPiutang' " class="w-full" x-cloak>
                    <div class="bg-white px-6 py-4 rounded-md">
                        <div class="flex flex-col md:flex-row md:items-center md:justify-between p-3 gap-4 ">
                            <div class="flex flex-row gap-4 items-center">
                                <div class="w-40  ">
                                    <label class="text-sm text-gray-600">Dari tanggal</label>
                                    <input type="date" x-model="startDate"
                                        class="w-full mt-1 border rounded p-2" />
                                </div>

                                <div class="w-40  ">
                                    <label class="text-sm text-gray-600">Hingga tanggal</label>
                                    <input type="date" x-model="endDate" class="w-full mt-1 border rounded p-2" />
                                </div>

                                <div class="">
                                    <label class="text-sm text-gray-600">Tipe</label>
                                    <select id="dokter_select"
                                        class="py-2.5 px-0 w-full text-sm text-gray-500 bg-transparent border-0 border-b-2 
                   border-gray-200 appearance-none focus:outline-none focus:ring-0 focus:border-blue-500 peer">
                                        <option selected>Pilih Resep</option>
                                        <option value="resep_a">Resep A</option>
                                        <option value="resep_b">Resep B</option>
                                        <option value="resep_c">Resep C</option>
                                    </select>
                                </div>

                                <!-- Input Search Cari Pasien -->
                                <div class="flex gap-4   w-auto">
                                    <div class="relative">
                                        <input type="text" placeholder="Cari Pasien"
                                            class="w-[450px] border border-gray-300 rounded-md px-10 py-5 text-gray-700 
                   focus:outline-none focus:ring-1 focus:ring-blue-500 focus:border-blue-500" />
                                        <!-- Icon Search -->
                                        <svg xmlns="http://www.w3.org/2000/svg"
                                            class="absolute left-2 top-1/2 transform -translate-y-1/2 h-5 w-5 text-gray-400"
                                            fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M21 21l-4.35-4.35m0 0A7.5 7.5 0 1110.5 3a7.5 7.5 0 016.15 13.65z" />
                                        </svg>
                                    </div>
                                </div>

                                <button type="submit"
                                    class="bg-slate-500 hover:bg-slate-600 focus:ring-4 focus:ring-outline-none focus:bg-slate-800 rounded-lg text-center p-4 text-white">
                                    FILTER
                                </button>

                            </div>
                        </div>

                        <!-- Table -->
                        <div class="bg-white shadow rounded overflow-x-auto my-5">
                            <table class="min-w-full text-sm">
                                <thead class="bg-blue-100">
                                    <tr>
                                        <th class="px-4 py-2 text-left">Tanggal</th>
                                        <th class="px-4 py-2 text-left">Status</th>
                                        <th class="px-4 py-2 text-left">Keterangan</th>
                                        <th class="px-4 py-2 text-left">Jumlah</th>
                                        <th class="px-4 py-2 text-left">Actions</th>
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

                <!-- Content Penggunaan Obat -->
                <div x-show="tabAktivitas === 'biayaBooking' " class="w-full" x-cloak>
                    <div class="bg-white px-6 py-4 rounded-md">
                        {{-- Judul Kontent --}}
                        <h2 class="text-2xl font-semibold text-blue-600">Pembayaran Biaya Booking</h2>

                        <div class="flex items-center justify-end mb-6">
                            <button
                                class="bg-green-500 hover:bg-green-600 focus:ring-4 focus:ring-green-400 p-4 text-white rounded-lg font-semibold">
                                + Tambah Admin Booking
                            </button>
                        </div>

                        <div class="flex flex-wrap items-center gap-4 p-4 bg-white shadow rounded-lg">
                            <!-- Search Pasien -->
                            <div class="flex items-center border-b border-gray-300 focus-within:border-green-500">
                                <input type="text" placeholder="Cari nama pasien"
                                    class="outline-none px-2 py-1 w-48 text-sm" />
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-gray-500" fill="none"
                                    viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M21 21l-4.35-4.35M11 19a8 8 0 100-16 8 8 0 000 16z" />
                                </svg>
                            </div>

                            <!-- Dropdown Dokter -->
                            <div class="flex flex-col">
                                <label class="text-xs text-gray-600">Dokter *</label>
                                <select
                                    class="border-b border-gray-300 focus:border-green-500 outline-none text-sm py-1">
                                    <option>Pilih Dokter</option>
                                    <option>Dr. Andi</option>
                                    <option>Dr. Sinta</option>
                                </select>
                            </div>

                            <!-- Dropdown Keterangan -->
                            <div class="flex flex-col">
                                <label class="text-xs text-gray-600">Keterangan *</label>
                                <select
                                    class="border-b border-gray-300 focus:border-green-500 outline-none text-sm py-1 w-40">
                                    <option>Schedule</option>
                                    <option>Checkup</option>
                                    <option>Operasi</option>
                                </select>
                            </div>

                            <!-- Dari Tanggal -->
                            <div class="flex flex-col">
                                <label class="text-xs text-gray-600">Dari Tanggal</label>
                                <input type="date"
                                    class="border-b border-gray-300 focus:border-green-500 outline-none text-sm py-1" />
                            </div>

                            <!-- Sampai Tanggal -->
                            <div class="flex flex-col">
                                <label class="text-xs text-gray-600">Sampai Tanggal</label>
                                <input type="date"
                                    class="border-b border-gray-300 focus:border-green-500 outline-none text-sm py-1" />
                            </div>

                            <!-- Dropdown Status -->
                            <div class="flex flex-col">
                                <label class="text-xs text-gray-600">Status *</label>
                                <select
                                    class="border-b border-gray-300 focus:border-green-500 outline-none text-sm py-1 w-32">
                                    <option>Pilih Status</option>
                                    <option>Aktif</option>
                                    <option>Selesai</option>
                                    <option>Dibatalkan</option>
                                </select>
                            </div>
                        </div>


                        <!-- Table -->
                        <div class="bg-white shadow rounded overflow-x-auto mb-5">
                            <table class="min-w-full text-sm">
                                <thead class="bg-blue-100">
                                    <tr>
                                        <th class="px-4 py-2 text-left">Nama Obat</th>
                                        <th class="px-4 py-2 text-left">Penggunaan Obat Umum</th>
                                        <th class="px-4 py-2 text-left">Nominal Obat Umum</th>
                                        <th class="px-4 py-2 text-left">Penggunaan Obat BPJS</th>
                                        <th class="px-4 py-2 text-left">Nominal Obat BPJS</th>
                                        <th class="px-4 py-2 text-left">Sisa Obat</th>
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
            {{-- End Content --}}
        </div>
</x-app-layout>
