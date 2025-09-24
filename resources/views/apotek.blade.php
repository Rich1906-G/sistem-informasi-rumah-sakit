<x-app-layout>
    <div x-data="{ tabAktivitas: '' }" class="p-4 sm:ml-64 lg:p-0 ">

        {{-- Start Header --}}
        <div class="w-full sm:px-6 lg:px-0 shadow-md">
            <div class="bg-white dark:bg-gray-800 shadow-sm sm:rounded-lg lg:rounded-none">

                <div class="flex items-center justify-end px-6 py-4 w-full">
                    <div class="flex items-center gap-10">
                        <div class="flex flex-row gap-5 items-center">
                            <img class="rounded-md h-[70px] w-auto" src="{{ asset('storage/assets/royal_klinik.png') }}"
                                alt="foto_bang">
                            <button class="p-4 bg-blue-600 text-white rounded-md">Royal Prima</button>
                        </div>

                        <div class="grid grid-cols-3 gap-3">
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
                            {{ __('Apotek') }}
                        </div>

                        <h2 class="font-light text-lg text-sky-500 dark:text-gray-200 leading-tight">
                            {{ __('Royal Prima Medan') }}
                        </h2>
                    </div>
                </div>
            </div>
        </div>
        {{-- End Header --}}

        {{-- Start Content --}}
        <div class="grid grid-row-1 h-full">

            <!-- Main Content -->
            <div class="flex p-6 gap-4">
                <!-- Kiri: Menu Table -->
                <div class="grid gap-4">
                    <div class="w-64 bg-white shadow rounded">
                        <ul class="divide-y divide-gray-200">
                            <li>
                                <button
                                    @click="tabAktivitas = (tabAktivitas === 'antrianHariIni') ? '' : 'antrianHariIni'"
                                    :class="tabAktivitas === 'antrianHariIni'
                                        ?
                                        'w-full text-start px-4 py-3 bg-blue-600 text-white font-medium' :
                                        'w-full text-start px-4 py-3 bg-white text-gray-800 font-medium '">Antrian
                                    Hari Ini
                                </button>
                            </li>
                            <li>
                                <button @click="tabAktivitas = (tabAktivitas === 'obat') ? '' : 'obat' "
                                    :class="tabAktivitas === 'obat'
                                        ?
                                        'w-full text-start px-4 py-3 bg-blue-600 text-white font-medium' :
                                        'w-full text-start px-4 py-3 bg-white text-gray-800 font-medium '">
                                    Obat
                                </button>
                            </li>
                            <li>
                                <button
                                    @click="tabAktivitas = (tabAktivitas === 'penggunaanObat') ? '' : 'penggunaanObat' "
                                    :class="tabAktivitas === 'penggunaanObat'
                                        ?
                                        'w-full text-start px-4 py-3 bg-blue-600 text-white font-medium' :
                                        'w-full text-start px-4 py-3 bg-white text-gray-800 font-medium '">
                                    Penggunaan Obat
                                </button>
                            </li>
                            <li>
                                <button
                                    @click="tabAktivitas = (tabAktivitas === 'kadaluarsaObat') ? '' : 'kadaluarsaObat' "
                                    :class="tabAktivitas === 'kadaluarsaObat'
                                        ?
                                        'w-full text-start px-4 py-3 bg-blue-600 text-white font-medium' :
                                        'w-full text-start px-4 py-3 bg-white text-gray-800 font-medium '">
                                    Kadaluarsa Obat
                                </button>
                            </li>
                            <li>
                                <button
                                    @click="tabAktivitas = (tabAktivitas === 'bahanHabisPakai') ? '' : 'bahanHabisPakai' "
                                    :class="tabAktivitas === 'bahanHabisPakai'
                                        ?
                                        'w-full text-start px-4 py-3 bg-blue-600 text-white font-medium' :
                                        'w-full text-start px-4 py-3 bg-white text-gray-800 font-medium '">
                                    Bahan Habis Pakai
                                </button>
                            </li>
                            <li>
                                <button
                                    @click="tabAktivitas = (tabAktivitas === 'penggunaanBPH') ? '' : 'penggunaanBPH' "
                                    :class="tabAktivitas === 'penggunaanBPH'
                                        ?
                                        'w-full text-start px-4 py-3 bg-blue-600 text-white font-medium' :
                                        'w-full text-start px-4 py-3 bg-white text-gray-800 font-medium '">
                                    Penggunaan BPH
                                </button>
                            </li>
                            <li>
                                <button
                                    @click="tabAktivitas = (tabAktivitas === 'kadaluarsaBahanHabisPakai') ? '' : 'kadaluarsaBahanHabisPakai' "
                                    :class="tabAktivitas === 'kadaluarsaBahanHabisPakai'
                                        ?
                                        'w-full text-start px-4 py-3 bg-blue-600 text-white font-medium' :
                                        'w-full text-start px-4 py-3 bg-white text-gray-800 font-medium '">
                                    Kadaluarsa Bahan Habis Pakai
                                </button>
                            </li>
                            <li>
                                <button @click="tabAktivitas = (tabAktivitas === 'resepObat') ? '' : 'resepObat' "
                                    :class="tabAktivitas === 'resepObat'
                                        ?
                                        'w-full text-start px-4 py-3 bg-blue-600 text-white font-medium' :
                                        'w-full text-start px-4 py-3 bg-white text-gray-800 font-medium '">
                                    Resep Obat
                                </button>
                            </li>
                            <li>
                                <button @click="tabAktivitas = (tabAktivitas === 'reStock') ? '' : 'reStock' "
                                    :class="tabAktivitas === 'reStock'
                                        ?
                                        'w-full text-start px-4 py-3 bg-blue-600 text-white font-medium' :
                                        'w-full text-start px-4 py-3 bg-white text-gray-800 font-medium '">
                                    Restock / Return
                                </button>
                            </li>
                            <li>
                                <button @click="tabAktivitas = (tabAktivitas === 'depot') ? '' : 'depot' "
                                    :class="tabAktivitas === 'depot'
                                        ?
                                        'w-full text-start px-4 py-3 bg-blue-600 text-white font-medium' :
                                        'w-full text-start px-4 py-3 bg-white text-gray-800 font-medium '">
                                    Depot
                                </button>
                            </li>
                            <li>
                                <button
                                    @click="tabAktivitas = (tabAktivitas === 'pesananStokMasuk') ? '' : 'pesananStokMasuk' "
                                    :class="tabAktivitas === 'pesananStokMasuk'
                                        ?
                                        'w-full text-start px-4 py-3 bg-blue-600 text-white font-medium' :
                                        'w-full text-start px-4 py-3 bg-white text-gray-800 font-medium '">
                                    Pesanan & Stok Masuk
                                </button>
                            </li>
                        </ul>
                    </div>

                    <div class="w-64 bg-white shadow rounded">
                        <div class="grid p-4">
                            <div class="flex items-center justify-between">
                                <label>0</label>
                                <label>
                                    <svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 -960 960 960"
                                        width="24px" fill="#434343">
                                        <path
                                            d="M40-160v-112q0-34 17.5-62.5T104-378q62-31 126-46.5T360-440q66 0 130 15.5T616-378q29 15 46.5 43.5T680-272v112H40Zm720 0v-120q0-44-24.5-84.5T666-434q51 6 96 20.5t84 35.5q36 20 55 44.5t19 53.5v120H760ZM360-480q-66 0-113-47t-47-113q0-66 47-113t113-47q66 0 113 47t47 113q0 66-47 113t-113 47Zm400-160q0 66-47 113t-113 47q-11 0-28-2.5t-28-5.5q27-32 41.5-71t14.5-81q0-42-14.5-81T544-792q14-5 28-6.5t28-1.5q66 0 113 47t47 113ZM120-240h480v-32q0-11-5.5-20T580-306q-54-27-109-40.5T360-360q-56 0-111 13.5T140-306q-9 5-14.5 14t-5.5 20v32Zm240-320q33 0 56.5-23.5T440-640q0-33-23.5-56.5T360-720q-33 0-56.5 23.5T280-640q0 33 23.5 56.5T360-560Zm0 320Zm0-400Z" />
                                    </svg>
                                </label>
                            </div>

                            <div class="flex flex-col items-center justify-center gap-4">
                                <label>Total Antrian Hari Ini {{ $totalAntrian }}</label>
                                <label>{{ $sudahDitangani }} Sudah Ditangani</label>
                                <!-- Progress bar -->
                                <div class="w-full bg-gray-200 rounded-full h-3 mt-3">
                                    <div class="bg-blue-500 h-3 rounded-full" style="width: {{ $progress }}%"></div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="w-64 bg-white shadow rounded">
                        <div class="bg-slate-300 p-4">
                            <div class="flex items-center justify-center w-full ">
                                <label>Peringatan Stok</label>
                            </div>
                        </div>

                        <div class="flex items-start justify-start p-4">
                            <a href="#" class="text-blue-500 hover:text-orange-300 hover:underline">Restok</a>
                        </div>
                    </div>
                </div>

                <style>
                    [x-cloak] {
                        display: none
                    }
                </style>

                <!-- Content Antrian Hari Ini-->
                <div x-show="tabAktivitas === 'antrianHariIni' " class="w-full" x-cloak>
                    <div class="bg-white px-6 py-4 rounded-md">
                        <h2 class="text-2xl font-semibold mb-4 text-blue-600">Antrian Hari Ini</h2>

                        <div class="flex items-center justify-between gap-4">
                            <!-- Tombol status -->
                            <div class="flex">
                                <button class="p-4 hover:bg-slate-100 border-b-2 border-blue-500">BELUM SELESAI</button>
                                <button class="p-4 hover:bg-slate-100 border-blue-500">SELESAI</button>
                            </div>

                            <!-- Bagian Kuning (icon + search) -->
                            <div class="flex items-center flex-1 mx-4 px-4 py-2 rounded-md gap-4">
                                <button class="hover:bg-slate-200 hover:rounded-full p-4 mr-2">
                                    <svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 -960 960 960"
                                        width="24px" fill="#434343">
                                        <path
                                            d="M320-120v-80H160q-33 0-56.5-23.5T80-280v-480q0-33 23.5-56.5T160-840h640q33 0 56.5 23.5T880-760v480q0 33-23.5 56.5T800-200H640v80H320ZM160-280h640v-480H160v480Zm0 0v-480 480Z" />
                                    </svg>
                                </button>

                                <!-- Search bar -->
                                <form class="flex-1">
                                    <div class="relative">
                                        <input type="search" id="default-search"
                                            class="block w-full p-2 text-sm text-gray-900 border border-gray-300 rounded-lg focus:ring-blue-500 focus:border-blue-500"
                                            placeholder="Cari nama pasien" required />
                                        <button type="submit"
                                            class="text-white absolute right-1 bottom-1 bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-md text-sm px-4 py-1.5">
                                            Search
                                        </button>
                                    </div>
                                </form>

                                <button
                                    class="flex items-center justify-center bg-green-700 p-4 text-white rounded-md hover:bg-green-600">
                                    <span>Tambah Resep</span>
                                </button>
                            </div>
                        </div>

                        <div class="mx-6 my-6">
                            <label>Tidak Ada </label>
                        </div>
                    </div>
                </div>

                <!-- Content Obat -->
                <div x-show="tabAktivitas === 'obat' " class="w-full" x-cloak>
                    <div class="bg-white px-6 py-4 rounded-md">
                        <div class="flex flex-col md:flex-row md:items-center md:justify-between gap-4 p-4 ">
                            <!-- Bagian Judul dan Last Update -->
                            <div class="flex flex-col">
                                <h1 class="text-blue-600 font-semibold text-lg md:text-xl">Data Stok Obat</h1>
                                <span class="text-gray-500 text-sm">Last Update</span>
                            </div>

                            <!-- Bagian Search Bar -->
                            <div class="flex flex-1 md:max-w-md relative">
                                <input type="text" placeholder="Cari kode, nama obat atau kategori"
                                    class="w-full border border-gray-300 rounded-md py-2 pl-4 pr-10 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500" />
                                <svg xmlns="http://www.w3.org/2000/svg"
                                    class="h-5 w-5 absolute right-3 top-1/2 transform -translate-y-1/2 text-gray-400"
                                    fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M21 21l-4.35-4.35M16 10a6 6 0 11-12 0 6 6 0 0112 0z" />
                                </svg>
                            </div>

                            <!-- Bagian Tombol -->
                            <div class="flex gap-2">
                                <button
                                    class="bg-green-700 hover:bg-green-800 text-white font-medium rounded-md px-4 py-2">+
                                    Tambah Data Obat</button>
                                <button
                                    class="bg-green-700 hover:bg-green-800 text-white font-medium rounded-md px-4 py-2 flex items-center gap-1">
                                    Export Excel
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none"
                                        viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M4 16v2a2 2 0 002 2h12a2 2 0 002-2v-2M12 12v6m0 0l-3-3m3 3l3-3M8 6h8M8 6a4 4 0 018 0" />
                                    </svg>
                                </button>
                            </div>
                        </div>



                        <!-- Table -->
                        <div class="bg-white shadow rounded overflow-x-auto my-5">
                            <table class="min-w-full text-sm">
                                <thead class="bg-blue-100">
                                    <tr>
                                        <th class="px-4 py-2 text-left">Kode</th>
                                        <th class="px-4 py-2 text-left">Nama Obat</th>
                                        <th class="px-4 py-2 text-left">Farmasi</th>
                                        <th class="px-4 py-2 text-left">Jenis Kategori</th>
                                        <th class="px-4 py-2 text-left">Stok</th>
                                        <th class="px-4 py-2 text-left">
                                            <div class="flex items-center">
                                                <label class="">Harga Umum</label>
                                                <button class="hover:bg-slate-200 hover:rounded-full p-1">
                                                    <svg xmlns="http://www.w3.org/2000/svg" height="24px"
                                                        viewBox="0 -960 960 960" width="24px" fill="#000000">
                                                        <path
                                                            d="M440-280h80v-240h-80v240Zm40-320q17 0 28.5-11.5T520-640q0-17-11.5-28.5T480-680q-17 0-28.5 11.5T440-640q0 17 11.5 28.5T480-600Zm0 520q-83 0-156-31.5T197-197q-54-54-85.5-127T80-480q0-83 31.5-156T197-763q54-54 127-85.5T480-880q83 0 156 31.5T763-763q54 54 85.5 127T880-480q0 83-31.5 156T763-197q-54 54-127 85.5T480-80Zm0-80q134 0 227-93t93-227q0-134-93-227t-227-93q-134 0-227 93t-93 227q0 134 93 227t227 93Zm0-320Z" />
                                                    </svg>
                                                </button>
                                            </div>
                                        </th>
                                        <th class="px-4 py-2 text-left ">
                                            <div class="flex items-center">
                                                <label>Harga Beli</label>
                                                <button class="hover:bg-slate-200 hover:rounded-full p-1">
                                                    <svg xmlns="http://www.w3.org/2000/svg" height="24px"
                                                        viewBox="0 -960 960 960" width="24px" fill="#000000">
                                                        <path
                                                            d="M440-280h80v-240h-80v240Zm40-320q17 0 28.5-11.5T520-640q0-17-11.5-28.5T480-680q-17 0-28.5 11.5T440-640q0 17 11.5 28.5T480-600Zm0 520q-83 0-156-31.5T197-197q-54-54-85.5-127T80-480q0-83 31.5-156T197-763q54-54 127-85.5T480-880q83 0 156 31.5T763-763q54 54 85.5 127T880-480q0 83-31.5 156T763-197q-54 54-127 85.5T480-80Zm0-80q134 0 227-93t93-227q0-134-93-227t-227-93q-134 0-227 93t-93 227q0 134 93 227t227 93Zm0-320Z" />
                                                    </svg>
                                                </button>
                                            </div>
                                        </th>
                                        <th class="px-4 py-2 text-left">Avg HPP</th>
                                        <th class="px-4 py-2 text-left">Harga OTC</th>
                                        <th class="px-4 py-2 text-left">Margin Profit</th>
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
                                        <td class="px-4 py-2">-</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>

                <!-- Content Penggunaan Obat -->
                <div x-show="tabAktivitas === 'penggunaanObat' " class="w-full" x-cloak>
                    <div class="bg-white px-6 py-4 rounded-md">
                        {{-- Judul Kontent --}}
                        <h2 class="text-2xl font-semibold mb-4 text-blue-600">Penggunaan Obat</h2>

                        <div class="flex gap-8">
                            {{-- Tanggal --}}
                            <div x-data="{ startDate: '', endDate: '' }" x-init="startDate = new Date().toISOString().split('T')[0];
                            endDate = startDate"
                                class="flex items-start justify-between w-full">

                                <!-- Jika sudah klik + -->
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
                            </div>

                            <div class="flex gap-4 items-center">
                                <input type="text" class="px-5 py-2.5 rounded-md text-slate-700"
                                    placeholder="Cari Nama Obat ">
                                <button class="px-3 py-5 text-white bg-green-500 rounded-md">
                                    Filter
                                </button>
                                <button class="px-3 py-5 text-white bg-green-500 rounded-md">
                                    Export
                                </button>
                                <button class="px-3 py-5 text-white bg-green-500 rounded-md">
                                    <svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 -960 960 960"
                                        width="24px" fill="#FFFFFF">
                                        <path
                                            d="M640-640v-120H320v120h-80v-200h480v200h-80Zm-480 80h640-640Zm560 100q17 0 28.5-11.5T760-500q0-17-11.5-28.5T720-540q-17 0-28.5 11.5T680-500q0 17 11.5 28.5T720-460Zm-80 260v-160H320v160h320Zm80 80H240v-160H80v-240q0-51 35-85.5t85-34.5h560q51 0 85.5 34.5T880-520v240H720v160Zm80-240v-160q0-17-11.5-28.5T760-560H200q-17 0-28.5 11.5T160-520v160h80v-80h480v80h80Z" />
                                    </svg>
                                </button>
                            </div>
                        </div>

                        <div class="py-3">
                            <label class="">Last Update: Loading...</label>
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

                <!-- Content Kadaluarsa Obat -->
                <div x-show="tabAktivitas === 'kadaluarsaObat' " class="w-full" x-cloak>
                    <div class="bg-white px-6 py-4 rounded-md">
                        <div class="grid gap-4">
                            <div>
                                <h2 class="text-2xl font-semibold mb-4 text-blue-600">Warning Kadaluarsa Obat</h2>

                                <!-- Table -->
                                <div class="bg-white shadow rounded overflow-x-auto my-5">
                                    <table class="min-w-full text-sm table-fixed">
                                        <thead class="bg-blue-100">
                                            <tr>
                                                <th class="px-4 py-2 text-left w-1/3">Nama Obat</th>
                                                <th class="px-4 py-2 text-left w-1/3">Tanggal Kadaluarsa</th>
                                                <th class="px-4 py-2 text-left w-1/3">Stok Obat</th>
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

                            <div class="w-full">
                                <div class="grid grid-cols-2 items-center justify-center">
                                    <div class="grid">
                                        <h2 class="text-2xl font-semibold mb-4 text-blue-600">Data Kadaluarsa
                                            Obat</h2>
                                        <label>Last Update</label>
                                    </div>
                                    <form class="w-auto">
                                        <label for="default-search"
                                            class="mb-2 text-sm font-medium text-gray-900 sr-only dark:text-white">Search</label>
                                        <div class="relative">
                                            <div
                                                class="absolute inset-y-0 start-0 flex items-center ps-3 pointer-events-none">
                                                <svg class="w-4 h-4 text-gray-500 dark:text-gray-400"
                                                    aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                                    fill="none" viewBox="0 0 20 20">
                                                    <path stroke="currentColor" stroke-linecap="round"
                                                        stroke-linejoin="round" stroke-width="2"
                                                        d="m19 19-4-4m0-7A7 7 0 1 1 1 8a7 7 0 0 1 14 0Z" />
                                                </svg>
                                            </div>
                                            <input type="search" id="default-search"
                                                class="block w-full p-4 ps-10 text-sm text-gray-900 border border-gray-300 rounded-lg bg-gray-50 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                                placeholder="Cari kode atau nama obat" required />
                                            <button type="submit"
                                                class="text-white absolute end-2.5 bottom-2.5 bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-4 py-2 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Search</button>
                                        </div>
                                    </form>

                                </div>

                                <!-- Table -->
                                <div class="bg-white shadow rounded overflow-x-auto my-5">
                                    <table class="min-w-full text-sm table-fixed">
                                        <thead class="bg-blue-100">
                                            <tr>
                                                <th class="px-4 py-2 text-left w-1/3">Kode</th>
                                                <th class="px-4 py-2 text-left w-1/3 truncate">Nama Obat (klik nama
                                                    obat untuk detail kadaluarsa obat)</th>
                                                <th class="px-4 py-2 text-left w-1/3">Pembelian Obat Terakhir</th>
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
                    </div>
                </div>

                <!-- Content Data Stok Bahan Habis Pakai -->
                <div x-show="tabAktivitas === 'bahanHabisPakai' " class="w-full" x-cloak>
                    <div class="bg-white px-6 py-4 rounded-md">
                        <div class="flex flex-col md:flex-row md:items-center md:justify-between gap-4 p-4 ">
                            <!-- Bagian Judul dan Last Update -->
                            <div class="flex flex-col">
                                <h1 class="text-blue-600 font-semibold text-lg md:text-xl">Data Stok Bahan Habis Pakai
                                </h1>
                                <span class="text-gray-500 text-sm">Last Update</span>
                            </div>

                            <!-- Bagian Search Bar -->
                            <div class="flex flex-1 md:max-w-md relative">
                                <input type="text" placeholder="Cari kode, nama obat atau kategori"
                                    class="w-full border border-gray-300 rounded-md py-2 pl-4 pr-10 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500" />
                                <svg xmlns="http://www.w3.org/2000/svg"
                                    class="h-5 w-5 absolute right-3 top-1/2 transform -translate-y-1/2 text-gray-400"
                                    fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M21 21l-4.35-4.35M16 10a6 6 0 11-12 0 6 6 0 0112 0z" />
                                </svg>
                            </div>

                            <!-- Bagian Tombol -->
                            <div class="flex gap-2">
                                <button
                                    class="bg-green-700 hover:bg-green-800 text-white font-medium rounded-md px-4 py-2">+
                                    Tambah Data Obat</button>
                                <button
                                    class="bg-green-700 hover:bg-green-800 text-white font-medium rounded-md px-4 py-2 flex items-center gap-1">
                                    Export Excel
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none"
                                        viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M4 16v2a2 2 0 002 2h12a2 2 0 002-2v-2M12 12v6m0 0l-3-3m3 3l3-3M8 6h8M8 6a4 4 0 018 0" />
                                    </svg>
                                </button>
                            </div>
                        </div>

                        <!-- Table -->
                        <div class="bg-white shadow rounded overflow-x-auto my-5">
                            <table class="min-w-full text-sm">
                                <thead class="bg-blue-100">
                                    <tr class="text-center">
                                        <th class="px-4 py-2">
                                            <input type="checkbox">
                                            </input>
                                        </th>
                                        <th class="px-4 py-2">Kode</th>
                                        <th class="px-4 py-2">Nama Barang</th>
                                        <th class="px-4 py-2">Brand</th>
                                        <th class="px-4 py-2">Stok</th>
                                        <th class="px-4 py-2">
                                            <div class="flex items-center">
                                                <label class="">Harga Umum</label>
                                                <button class="hover:bg-slate-200 hover:rounded-full p-1">
                                                    <svg xmlns="http://www.w3.org/2000/svg" height="24px"
                                                        viewBox="0 -960 960 960" width="24px" fill="#000000">
                                                        <path
                                                            d="M440-280h80v-240h-80v240Zm40-320q17 0 28.5-11.5T520-640q0-17-11.5-28.5T480-680q-17 0-28.5 11.5T440-640q0 17 11.5 28.5T480-600Zm0 520q-83 0-156-31.5T197-197q-54-54-85.5-127T80-480q0-83 31.5-156T197-763q54-54 127-85.5T480-880q83 0 156 31.5T763-763q54 54 85.5 127T880-480q0 83-31.5 156T763-197q-54 54-127 85.5T480-80Zm0-80q134 0 227-93t93-227q0-134-93-227t-227-93q-134 0-227 93t-93 227q0 134 93 227t227 93Zm0-320Z" />
                                                    </svg>
                                                </button>
                                            </div>
                                        </th>
                                        <th class="px-4 py-2 text-left ">
                                            <div class="flex items-center">
                                                <label>Harga Beli</label>
                                                <button class="hover:bg-slate-200 hover:rounded-full p-1">
                                                    <svg xmlns="http://www.w3.org/2000/svg" height="24px"
                                                        viewBox="0 -960 960 960" width="24px" fill="#000000">
                                                        <path
                                                            d="M440-280h80v-240h-80v240Zm40-320q17 0 28.5-11.5T520-640q0-17-11.5-28.5T480-680q-17 0-28.5 11.5T440-640q0 17 11.5 28.5T480-600Zm0 520q-83 0-156-31.5T197-197q-54-54-85.5-127T80-480q0-83 31.5-156T197-763q54-54 127-85.5T480-880q83 0 156 31.5T763-763q54 54 85.5 127T880-480q0 83-31.5 156T763-197q-54 54-127 85.5T480-80Zm0-80q134 0 227-93t93-227q0-134-93-227t-227-93q-134 0-227 93t-93 227q0 134 93 227t227 93Zm0-320Z" />
                                                    </svg>
                                                </button>
                                            </div>
                                        </th>
                                        <th class="px-4 py-2">Avg HPP</th>
                                        <th class="px-4 py-2">Harga OTC</th>
                                        <th class="px-4 py-2">Margin Profit</th>
                                        <th class="px-4 py-2">Action</th>
                                    </tr>
                                </thead>
                            </table>
                        </div>
                    </div>
                </div>

                <!-- Content Penggunaan BHP-->
                <div x-show="tabAktivitas === 'penggunaanBPH' " class="w-full" x-cloak>
                    <div class="bg-white px-6 py-4 rounded-md">
                        <h2 class="text-2xl font-semibold mb-4 text-blue-600">Penggunaan BHP</h2>

                        <div class="flex gap-8">
                            {{-- Tanggal --}}
                            <div x-data="{ startDate: '', endDate: '' }" x-init="startDate = new Date().toISOString().split('T')[0];
                            endDate = startDate"
                                class="flex items-start justify-between w-full">

                                <!-- Jika sudah klik + -->
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
                            </div>

                            <div class="flex gap-4 items-center">
                                <input type="text" class="px-5 py-2.5 rounded-md text-slate-700"
                                    placeholder="Cari Nama BHP">
                                <button class="px-3 py-5 text-white bg-green-500 rounded-md">
                                    Filter
                                </button>
                                <button class="px-3 py-5 text-white bg-green-500 rounded-md">
                                    Export
                                </button>
                                <button class="px-3 py-5 text-white bg-green-500 rounded-md">
                                    <svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 -960 960 960"
                                        width="24px" fill="#FFFFFF">
                                        <path
                                            d="M640-640v-120H320v120h-80v-200h480v200h-80Zm-480 80h640-640Zm560 100q17 0 28.5-11.5T760-500q0-17-11.5-28.5T720-540q-17 0-28.5 11.5T680-500q0 17 11.5 28.5T720-460Zm-80 260v-160H320v160h320Zm80 80H240v-160H80v-240q0-51 35-85.5t85-34.5h560q51 0 85.5 34.5T880-520v240H720v160Zm80-240v-160q0-17-11.5-28.5T760-560H200q-17 0-28.5 11.5T160-520v160h80v-80h480v80h80Z" />
                                    </svg>
                                </button>
                            </div>
                        </div>

                        <!-- Table -->
                        <div class="bg-white shadow rounded overflow-x-auto my-5">
                            <table class="min-w-full text-sm">
                                <thead class="bg-blue-100">
                                    <tr>
                                        <th class="px-4 py-2 text-left">Nama BHP</th>
                                        <th class="px-4 py-2 text-left">Penggunaan Umum</th>
                                        <th class="px-4 py-2 text-left">Nominal BHP Umum</th>
                                        <th class="px-4 py-2 text-left">Penggunaan BPJS</th>
                                        <th class="px-4 py-2 text-left">Nominal BHP BPJS</th>
                                        <th class="px-4 py-2 text-left">Sisa BHP</th>
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

                <!-- Content Kadaluarsa Bahan Habis Pakai-->
                <div x-show="tabAktivitas === 'kadaluarsaBahanHabisPakai' " class="w-full" x-cloak>
                    <div class="bg-white px-6 py-4 rounded-md">
                        <div class="grid gap-4">
                            <div>
                                <h2 class="text-2xl font-semibold mb-4 text-blue-600">Warning Kadaluarsa Bahan Habis
                                    Pakai</h2>

                                <!-- Table -->
                                <div class="bg-white shadow rounded overflow-x-auto my-5">
                                    <table class="min-w-full text-sm table-fixed">
                                        <thead class="bg-blue-100">
                                            <tr>
                                                <th class="px-4 py-2 text-left w-1/3">Nama Bahan Habis Pakai</th>
                                                <th class="px-4 py-2 text-left w-1/3">Tanggal Kadaluarsa</th>
                                                <th class="px-4 py-2 text-left w-1/3">Stok Bahan Habis Pakai</th>
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

                            <div class="w-full">
                                <div class="grid grid-cols-2 items-center justify-center">
                                    <div class="grid">
                                        <h2 class="text-2xl font-semibold mb-4 text-blue-600">Data Kadaluarsa
                                            Habis Pakai</h2>
                                        <label>Last Update</label>
                                    </div>
                                    <form class="w-auto">
                                        <label for="default-search"
                                            class="mb-2 text-sm font-medium text-gray-900 sr-only dark:text-white">Search</label>
                                        <div class="relative">
                                            <div
                                                class="absolute inset-y-0 start-0 flex items-center ps-3 pointer-events-none">
                                                <svg class="w-4 h-4 text-gray-500 dark:text-gray-400"
                                                    aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                                    fill="none" viewBox="0 0 20 20">
                                                    <path stroke="currentColor" stroke-linecap="round"
                                                        stroke-linejoin="round" stroke-width="2"
                                                        d="m19 19-4-4m0-7A7 7 0 1 1 1 8a7 7 0 0 1 14 0Z" />
                                                </svg>
                                            </div>
                                            <input type="search" id="default-search"
                                                class="block w-full p-4 ps-10 text-sm text-gray-900 border border-gray-300 rounded-lg bg-gray-50 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                                placeholder="Cari kode atau nama obat" required />
                                            <button type="submit"
                                                class="text-white absolute end-2.5 bottom-2.5 bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-4 py-2 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Search</button>
                                        </div>
                                    </form>

                                </div>

                                <!-- Table -->
                                <div class="bg-white shadow rounded overflow-x-auto my-5">
                                    <table class="min-w-full text-sm table-fixed">
                                        <thead class="bg-blue-100">
                                            <tr>
                                                <th class="px-4 py-2 text-left w-1/3">Kode</th>
                                                <th class="px-4 py-2 text-left w-1/3 truncate">Nama Bahan Habis Pakai
                                                    (klik nama
                                                    obat untuk detail kadaluarsa obat)</th>
                                                <th class="px-4 py-2 text-left w-1/3">Pembelian Bahan Habis Pakai
                                                    Terakhir</th>
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
                    </div>
                </div>

                <!-- Content Resep Obat -->
                <div x-show="tabAktivitas === 'resepObat' " class="w-full" x-cloak>
                    <div class="bg-white px-6 py-4 rounded-md">
                        <h2 class="text-2xl font-semibold mb-4 text-blue-600">Cetak Resep Obat</h2>

                        <form action="#">
                            {{-- Tanggal --}}
                            <div x-data="{ startDate: '', endDate: '' }" x-init="startDate = new Date().toISOString().split('T')[0];
                            endDate = startDate"
                                class="flex items-start justify-between w-full">

                                <!-- Jika sudah klik + -->
                                <div class="flex flex-row gap-4 items-center">
                                    <div>
                                        <label class="text-sm text-gray-600">Tanggal Resep</label>
                                        <input type="date" x-model="startDate"
                                            class="w-full mt-1 border rounded p-2" />
                                    </div>
                                </div>
                            </div>

                            {{-- <div class="my-6 grid grid-cols-2 gap-4">
                                <div class="bg-red-200">
                                    <label for="underline_select" class="sr-only">Pilih Dokter</label>
                                    <select id="underline_select"
                                        class="py-2.5 px-0 w-full text-sm text-gray-500 bg-transparent border-0 border-b-2 border-gray-200 appearance-none dark:text-gray-400 dark:border-gray-700 focus:outline-none focus:ring-0 focus:border-gray-200 peer">
                                        <option selected>Choose a country</option>
                                        <option value="US">United States</option>
                                        <option value="CA">Canada</option>
                                        <option value="FR">France</option>
                                        <option value="DE">Germany</option>
                                    </select>
                                </div>

                                <div class="bg-blue-700">
                                    <label for="email-address-icon"
                                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Your
                                        Email</label>
                                    <div class="relative">
                                        <div
                                            class="absolute inset-y-0 start-0 flex items-center ps-3.5 pointer-events-none">
                                            <svg class="w-4 h-4 text-gray-500 dark:text-gray-400" aria-hidden="true"
                                                xmlns="http://www.w3.org/2000/svg" fill="currentColor"
                                                viewBox="0 0 20 16">
                                                <path
                                                    d="m10.036 8.278 9.258-7.79A1.979 1.979 0 0 0 18 0H2A1.987 1.987 0 0 0 .641.541l9.395 7.737Z" />
                                                <path
                                                    d="M11.241 9.817c-.36.275-.801.425-1.255.427-.428 0-.845-.138-1.187-.395L0 2.6V14a2 2 0 0 0 2 2h16a2 2 0 0 0 2-2V2.5l-8.759 7.317Z" />
                                            </svg>
                                        </div>
                                        <input type="text" id="email-address-icon"
                                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full ps-10 p-2.5  dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                            placeholder="name@flowbite.com">
                                    </div>
                                </div>
                            </div> --}}

                            {{-- <div class="flex gap-4 w-full my-6">
                                <!-- Dropdown Pilih Dokter -->
                                <select
                                    class="w-1/2 border border-gray-300 rounded-md px-3 py-2 text-gray-700 focus:outline-none focus:ring-1 focus:ring-blue-500 focus:border-blue-500">
                                    <option>Pilih Dokter</option>
                                    <option>Dr. A</option>
                                    <option>Dr. B</option>
                                    <option>Dr. C</option>
                                </select>

                                <!-- Input Search Cari Pasien -->
                                <div class="relative w-1/2">
                                    <input type="text" placeholder="Cari Pasien"
                                        class="w-full border border-gray-300 rounded-md px-10 py-2 text-gray-700 focus:outline-none focus:ring-1 focus:ring-blue-500 focus:border-blue-500" />
                                    <!-- Icon Search -->
                                    <svg xmlns="http://www.w3.org/2000/svg"
                                        class="absolute left-3 top-1/2 transform -translate-y-1/2 h-5 w-5 text-gray-400"
                                        fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M21 21l-4.35-4.35m0 0A7.5 7.5 0 1110.5 3a7.5 7.5 0 016.15 13.65z" />
                                    </svg>
                                </div>
                            </div> --}}

                            <div class="flex gap-4 w-full my-6">
                                <!-- Dropdown Pilih Dokter (Underline Select) -->
                                <div class="w-1/2">
                                    <label for="dokter_select" class="sr-only">Pilih Dokter</label>
                                    <select id="dokter_select"
                                        class="block py-2.5 px-0 w-full text-sm text-gray-500 bg-transparent border-0 border-b-2 
                   border-gray-200 appearance-none focus:outline-none focus:ring-0 focus:border-blue-500 peer">
                                        <option selected>Pilih Dokter</option>
                                        <option value="A">Dr. A</option>
                                        <option value="B">Dr. B</option>
                                        <option value="C">Dr. C</option>
                                    </select>
                                </div>

                                <!-- Input Search Cari Pasien -->
                                <div class="relative w-1/2">
                                    <input type="text" placeholder="Cari Pasien"
                                        class="w-full border border-gray-300 rounded-md px-10 py-2 text-gray-700  focus:outline-none focus:ring-1 focus:ring-blue-500 focus:border-blue-500" />
                                    <!-- Icon Search -->
                                    <svg xmlns="http://www.w3.org/2000/svg"
                                        class="absolute left-3 top-1/2 transform -translate-y-1/2 h-5 w-5 text-gray-400"
                                        fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M21 21l-4.35-4.35m0 0A7.5 7.5 0 1110.5 3a7.5 7.5 0 016.15 13.65z" />
                                    </svg>
                                </div>
                            </div>

                            <div class="flex gap-4 w-full my-6">
                                <!-- Dropdown Pilih Resep -->
                                <div class="w-1/3">
                                    <label for="dokter_select" class="sr-only">Tipe Resep</label>
                                    <select id="dokter_select"
                                        class="block py-2.5 px-0 w-full text-sm text-gray-500 bg-transparent border-0 border-b-2 
                   border-gray-200 appearance-none focus:outline-none focus:ring-0 focus:border-blue-500 peer">
                                        <option selected>Pilih Resep</option>
                                        <option value="resep_a">Resep A</option>
                                        <option value="resep_b">Resep B</option>
                                        <option value="resep_c">Resep C</option>
                                    </select>
                                </div>

                                <!-- Input Umur -->
                                <div class="relative z-0 w-1/6 group">
                                    <input name="umur" id="umur"
                                        class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 
                   border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 
                   dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer"
                                        placeholder=" " required />
                                    <label for="umur"
                                        class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 
                   duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] 
                   peer-focus:start-0 rtl:peer-focus:translate-x-1/4 rtl:peer-focus:left-auto 
                   peer-focus:text-blue-600 peer-focus:dark:text-blue-500 
                   peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 
                   peer-focus:scale-75 peer-focus:-translate-y-6">
                                        Umur
                                    </label>
                                </div>

                                <!-- Input Search Cari Pasien -->
                                <div class="relative w-1/2">
                                    <input type="text" placeholder="Cari Pasien"
                                        class="w-full border border-gray-300 rounded-md px-10 py-2 text-gray-700 
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

                            <div class="relative z-0 w-full mb-5 group">
                                <input type="email" name="floating_email" id="floating_email"
                                    class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer"
                                    placeholder=" " required />
                                <label for="floating_email"
                                    class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 rtl:peer-focus:translate-x-1/4 rtl:peer-focus:left-auto peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Alamat</label>
                            </div>

                            <!-- Input Search Cari Pasien -->
                            <div class="w-full grid grid-cols-3 gap-4">
                                <!-- Search Pasien -->
                                <div class="relative">
                                    <input type="text" placeholder="Cari Pasien"
                                        class="w-full border border-gray-300 rounded-md px-10 py-2 text-gray-700 focus:outline-none focus:ring-1 focus:ring-blue-500 focus:border-blue-500" />
                                    <!-- Icon Search -->
                                    <svg xmlns="http://www.w3.org/2000/svg"
                                        class="absolute left-3 top-1/2 transform -translate-y-1/2 h-5 w-5 text-gray-400"
                                        fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M21 21l-4.35-4.35m0 0A7.5 7.5 0 1110.5 3a7.5 7.5 0 016.15 13.65z" />
                                    </svg>
                                </div>

                                <!-- Input Singatura -->
                                <div class="relative z-0 group">
                                    <input type="text" name="singatura" id="singatura"
                                        class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 
                   border-gray-300 appearance-none focus:outline-none focus:ring-0 
                   focus:border-blue-600 peer"
                                        placeholder=" " required />
                                    <label for="singatura"
                                        class="peer-focus:font-medium absolute text-sm text-gray-500 duration-300 transform 
                   -translate-y-6 scale-75 top-3 -z-10 origin-[0] 
                   peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 
                   peer-focus:scale-75 peer-focus:-translate-y-6">Singatura</label>
                                </div>

                                <!-- Input Detur -->
                                <div class="relative z-0 group">
                                    <input type="text" name="detur" id="detur"
                                        class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 
                   border-gray-300 appearance-none focus:outline-none focus:ring-0 
                   focus:border-blue-600 peer"
                                        placeholder=" " required />
                                    <label for="detur"
                                        class="peer-focus:font-medium absolute text-sm text-gray-500 duration-300 transform 
                   -translate-y-6 scale-75 top-3 -z-10 origin-[0] 
                   peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 
                   peer-focus:scale-75 peer-focus:-translate-y-6">Detur</label>
                                </div>
                            </div>

                            <div class="my-4 flex items-center justify-between">
                                <button class="px-5 py-2.5 rounded-md text-center text-primary-500">
                                    + Tambah Obat
                                </button>

                                <button class="px-5 py-2.5 bg-red-400 text-white rounded-md">PRINT</button>
                            </div>
                        </form>
                    </div>
                </div>

                <!-- Content Restock & Return -->
                <div x-show="tabAktivitas === 'reStock' " class="w-full" x-cloak>
                    <div class="bg-white px-6 py-4 rounded-md">
                        <div class="flex flex-col md:flex-row md:items-center md:justify-between gap-4 p-4 ">
                            <!-- Bagian Judul dan Last Update -->
                            <div class="flex flex-col">
                                <h1 class="text-blue-600 font-semibold text-lg md:text-xl">Restok Dan Return
                                </h1>
                                <span class="text-gray-500 text-sm">Last Create</span>
                            </div>

                            <!-- Bagian Search Bar -->
                            <div class="flex flex-1 md:max-w-md relative">
                                <input type="text" placeholder="Cari kode, nama obat atau kategori"
                                    class="w-full border border-gray-300 rounded-md py-2 pl-4 pr-10 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500" />
                                <svg xmlns="http://www.w3.org/2000/svg"
                                    class="h-5 w-5 absolute right-3 top-1/2 transform -translate-y-1/2 text-gray-400"
                                    fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M21 21l-4.35-4.35M16 10a6 6 0 11-12 0 6 6 0 0112 0z" />
                                </svg>
                            </div>

                            <!-- Bagian Tombol -->
                            <div class="flex gap-4">
                                <button
                                    class="bg-green-700 hover:bg-green-800 text-white font-medium rounded-md px-4 py-2 flex items-center justify-center gap-2"><svg
                                        xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 -960 960 960"
                                        width="24px" fill="#FFFFFF">
                                        <path d="M440-440H200v-80h240v-240h80v240h240v80H520v240h-80v-240Z" />
                                    </svg>
                                    Resep Dan Return Obat / Barang</button>
                                <button
                                    class="bg-green-700 hover:bg-green-800 text-white font-medium rounded-md px-4 py-2 flex items-center gap-1">
                                    <svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 -960 960 960"
                                        width="24px" fill="#FFFFFF">
                                        <path
                                            d="M640-640v-120H320v120h-80v-200h480v200h-80Zm-480 80h640-640Zm560 100q17 0 28.5-11.5T760-500q0-17-11.5-28.5T720-540q-17 0-28.5 11.5T680-500q0 17 11.5 28.5T720-460Zm-80 260v-160H320v160h320Zm80 80H240v-160H80v-240q0-51 35-85.5t85-34.5h560q51 0 85.5 34.5T880-520v240H720v160Zm80-240v-160q0-17-11.5-28.5T760-560H200q-17 0-28.5 11.5T160-520v160h80v-80h480v80h80Z" />
                                    </svg>
                                </button>
                            </div>
                        </div>

                        <!-- Table -->
                        <div class="bg-white shadow rounded overflow-x-auto my-5">
                            <table class="min-w-full text-sm">
                                <thead class="bg-blue-100">
                                    <tr>
                                        <th class="px-4 py-2 text-left">Kode</th>
                                        <th class="px-4 py-2 text-left">No Faktur</th>
                                        <th class="px-4 py-2 text-left">Jenis Pemesanan</th>
                                        <th class="px-4 py-2 text-left">Tanggal Pengiriman</th>
                                        <th class="px-4 py-2 text-left">Tanggal Pembuatan</th>
                                        <th class="px-4 py-2 text-left">Suplier</th>
                                        <th class="px-4 py-2 text-left">Nama Obat</th>
                                        <th class="px-4 py-2 text-left">Jumlah</th>
                                        <th class="px-4 py-2 text-left">Diaprove Oleh</th>
                                        <th class="px-4 py-2 text-left">Total Harga</th>
                                        <th class="px-4 py-2 text-left">Tempo Pembayaran</th>
                                        <th class="px-4 py-2 text-left">Action</th>
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
                                        <td class="px-4 py-2">-</td>
                                        <td class="px-4 py-2">-</td>
                                        <td class="px-4 py-2">-</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>

                <!-- Content Depot -->
                <div x-show="tabAktivitas === 'depot' " class="w-full" x-cloak>
                    <div class="bg-white px-6 py-4 rounded-md">
                        <div class="grid items-center justify-between">
                            <h2 class="text-2xl font-semibold mb-4 text-blue-600">Depot</h2>
                            <label class="text-justify">Depot merupakan fitur untuk maintenance jumlah obat yang
                                tersebar di Klinik.

                                Pemilik Klinik atau Apoteker bisa mengetahui jumlah obat yang terdapat di Apotek, Ruang
                                Dokter, Gudang, dan lain-lain.
                            </label>
                        </div>


                        <!-- Table -->
                        <div class="bg-white shadow rounded overflow-x-auto my-5">
                            <table class="min-w-full text-sm">
                                <thead class="bg-blue-100">
                                    <tr>
                                        <th class="px-4 py-2 text-left">Nama Depot</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr class="border-t">
                                        <td class="px-4 py-2 grid grid-cols-2 gap-10 text-lg font-medium items-center">
                                            <div class="flex items-center justify-between text-center">
                                                <span class="text-gray-400 font-normal w-auto">Apotek (Apotek)</span>

                                                <button
                                                    class="px-5 py-2.5 bg-green-500 rounded-md text-white hover:bg-green-600 ww-auto">
                                                    Show Obat
                                                </button>
                                            </div>

                                            <div class="flex gap-10">
                                                <button
                                                    class="px-5 py-2.5 bg-green-500 rounded-md text-white hover:bg-green-600 ww-auto">
                                                    Stok Opname Obat
                                                </button>

                                                <button
                                                    class="px-5 py-2.5 bg-green-500 rounded-md text-white hover:bg-green-600 ww-auto">
                                                    Stok Opname BHP
                                                </button>
                                            </div>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>

                <!-- Content Pesanan & Stok Masuk -->
                <div x-show="tabAktivitas === 'pesananStokMasuk' " class="w-full" x-cloak>
                    <div class="bg-white px-6 py-4 rounded-md">
                        <div class="flex items-center justify-between">
                            <h2 class="text-2xl font-semibold mb-4 text-blue-600">Pesanan & Stok Masuk</h2>

                            <div class="flex flex-1 md:max-w-md relative">
                                <input type="text" placeholder="Cari nama obat, kode transaksi atau jenis transaksi"
                                    class="w-full border border-gray-300 rounded-md py-2 pl-4 pr-10 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500" />
                                <svg xmlns="http://www.w3.org/2000/svg"
                                    class="h-5 w-5 absolute right-3 top-1/2 transform -translate-y-1/2 text-gray-400"
                                    fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M21 21l-4.35-4.35M16 10a6 6 0 11-12 0 6 6 0 0112 0z" />
                                </svg>
                            </div>
                        </div>


                        <!-- Table -->
                        <div class="bg-white shadow rounded overflow-x-auto my-5">
                            <table class="min-w-full text-sm">
                                <thead class="bg-blue-100">
                                    <tr>
                                        <th class="px-4 py-2 text-left">Kode Transaksi</th>
                                        <th class="px-4 py-2 text-left"> Tanggal Purchase Order</th>
                                        <th class="px-4 py-2 text-left">Supplier</th>
                                        <th class="px-4 py-2 text-left">PIC</th>
                                        <th class="px-4 py-2 text-left">Telepon</th>
                                        <th class="px-4 py-2 text-left">Nama Obat / Bahan Habis Pakai</th>
                                        <th class="px-4 py-2 text-left">Jumlah</th>
                                        <th class="px-4 py-2 text-left">Action</th>
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
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    {{-- End Content --}}

    <div class="fixed bottom-10 right-10">
        <button class="bg-blue-700 flex items-center px-4 py-2 rounded-md shadow-lg">
            <svg xmlns="http://www.w3.org/2000/svg" height="30px" viewBox="0 -960 960 960" width="30px"
                fill="#FFFFFF">
                <path
                    d="m480-320 56-56-64-64h168v-80H472l64-64-56-56-160 160 160 160Zm0 240q-83 0-156-31.5T197-197q-54-54-85.5-127T80-480q0-83 31.5-156T197-763q54-54 127-85.5T480-880q83 0 156 31.5T763-763q54 54 85.5 127T880-480q0 83-31.5 156T763-197q-54 54-127 85.5T480-80Zm0-80q134 0 227-93t93-227q0-134-93-227t-227-93q-134 0-227 93t-93 227q0 134 93 227t227 93Zm0-320Z" />
            </svg>
        </button>
    </div>
</x-app-layout>
