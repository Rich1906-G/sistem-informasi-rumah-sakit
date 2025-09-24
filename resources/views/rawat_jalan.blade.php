<x-app-layout>
    <div class="p-4 sm:ml-64 lg:p-0 " x-data="{ tabAktivitas: '' }">
        {{-- Start Header --}}
        <div class="w-full sm:px-6 lg:px-0 shadow-md">
            <div class="bg-white dark:bg-gray-800 shadow-sm sm:rounded-lg lg:rounded-none">

                <div class="flex items-center justify-between p-6 w-full">
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

                        <div class="relative">
                            <button class="bg-orange-400 text-white px-4 py-2 w-full rounded-md font-semibold">
                                <span class="flex items-center hover:bg-opacity-5">Pendaftar
                                    Baru</span>
                            </button>

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
                    <div class="p-6">
                        <div class="font-normal text-2xl text-sky-700 dark:text-gray-200 leading-tight">
                            {{ __('Rawat Jalan') }}
                        </div>

                        <h2 class="font-light text-lg text-sky-500 dark:text-gray-200 leading-tight">
                            {{ __('Royal Prima Medan') }}
                        </h2>
                    </div>

                    <div class="flex gap-4">
                        {{-- Pending --}}
                        <div class="flex items-center gap-1">
                            <span class="w-3 h-3 rounded-full bg-red-400"></span>
                            <label class="text-red-500 font-medium">Pending</label>
                        </div>
                        <div class="flex items-center gap-1">
                            <span class="w-3 h-3 rounded-full bg-yellow-400"></span>
                            <label class="text-yellow-500 font-medium">Confirmed</label>
                        </div>
                        <div class="flex items-center gap-1">
                            <span class="w-3 h-3 rounded-full bg-purple-400"></span>
                            <label class="text-purple-500 font-medium">Waiting</label>
                        </div>
                        <div class="flex items-center gap-1">
                            <span class="w-3 h-3 rounded-full bg-cyan-400"></span>
                            <label class="text-cyan-500 font-medium">Engaged</label>
                        </div>
                        <div class="flex items-center gap-1">
                            <span class="w-3 h-3 rounded-full bg-green-400"></span>
                            <label class="text-green-500 font-medium">Succeed</label>
                        </div>
                    </div>


                    <div class="p-6" x-data="calendar()">
                        <div class="flex items-center space-x-4">
                            <!-- Tombol Ke Kiri -->
                            <button class="px-2 py-1 bg-white rounded hover:bg-blue-100 text-blue-500 border"
                                @click="prevDay">
                                &#60;
                            </button>

                            <!-- Tampilan Hari & Tanggal -->
                            <div class="flex flex-col text-center">
                                <span class="text-md font-semibold text-blue-600" x-text="dayName"></span>
                                <span class="text-lg font-bold text-blue-700" x-text="fullDate"></span>
                            </div>

                            <!-- Tombol Ke Kanan -->
                            <button class="px-2 py-1 bg-white rounded hover:bg-blue-100 text-blue-500 border"
                                @click="nextDay">
                                &#62;
                            </button>

                            <!-- Tombol Hari Ini -->
                            <button class="ml-2 px-3 py-1 bg-blue-500 text-white rounded hover:bg-blue-600 font-bold"
                                @click="goToday">
                                HARI INI
                            </button>
                        </div>
                    </div>

                    <script>
                        function calendar() {
                            return {
                                currentDate: new Date(),

                                get dayName() {
                                    return this.currentDate.toLocaleDateString('id-ID', {
                                        weekday: 'long'
                                    });
                                },

                                get fullDate() {
                                    return this.currentDate.toLocaleDateString('id-ID', {
                                        day: 'numeric',
                                        month: 'long',
                                        year: 'numeric'
                                    });
                                },

                                prevDay() {
                                    this.currentDate.setDate(this.currentDate.getDate() - 1);
                                    this.currentDate = new Date(this.currentDate);
                                },

                                nextDay() {
                                    this.currentDate.setDate(this.currentDate.getDate() + 1);
                                    this.currentDate = new Date(this.currentDate);
                                },

                                goToday() {
                                    this.currentDate = new Date();
                                }
                            }
                        }
                    </script>
                </div>
            </div>
        </div>
        {{-- End Header --}}

        @if ($dataDokter)
            {{-- Start Content --}}
            <div class="grid grid-row-1 h-full">

                <!-- Main Content -->
                <div class="flex p-6 gap-4">
                    <!-- Kiri: Menu Table -->
                    <div class="w-64 bg-white shadow rounded">
                        <ul class="divide-y divide-gray-200">
                            <li>
                                <button class="w-full text-start px-4 py-3 bg-white text-gray-800 font-bold text-xl">
                                    All Doctor
                                </button>
                            </li>
                            @foreach ($dataDokter as $dokter)
                                <li>
                                    <button @click="tabAktivitas = (tabAktivitas === 'antriCepat') ? '' : 'antriCepat' "
                                        class="w-full text-start px-4 py-3"
                                        :class="tabAktivitas === 'antriCepat' && {{ $dokter->nama_lengkap }} ?
                                            'w-full text-start px-4 py-3 bg-blue-600 text-white font-medium' :
                                            'w-full text-start px-4 py-3 bg-white text-gray-800 font-medium '">
                                        {{ $dokter->nama_lengkap }}
                                    </button>
                                </li>
                            @endforeach

                            {{-- <li>
                                <button @click="tabAktivitas = (tabAktivitas === 'gawatDarurat') ? '' : 'gawatDarurat' "
                                    :class="tabAktivitas === 'gawatDarurat'
                                        ?
                                        'w-full text-start px-4 py-3 bg-blue-600 text-white font-medium' :
                                        'w-full text-start px-4 py-3 bg-white text-gray-800 font-medium '">
                                    Gawat Darurat
                                </button>
                            </li>
                            <li>
                                <button
                                    @click="tabAktivitas = (tabAktivitas === 'kunjunganSehat') ? '' : 'kunjunganSehat' "
                                    :class="tabAktivitas === 'kunjunganSehat'
                                        ?
                                        'w-full text-start px-4 py-3 bg-blue-600 text-white font-medium' :
                                        'w-full text-start px-4 py-3 bg-white text-gray-800 font-medium '">
                                    Kunjungan Sehat
                                </button>
                            </li>
                            <li>
                                <button
                                    @click="tabAktivitas = (tabAktivitas === 'promotifPreventif') ? '' : 'promotifPreventif' "
                                    :class="tabAktivitas === 'promotifPreventif'
                                        ?
                                        'w-full text-start px-4 py-3 bg-blue-600 text-white font-medium' :
                                        'w-full text-start px-4 py-3 bg-white text-gray-800 font-medium '">
                                    Promotif Preventif
                                </button>
                            </li>
                            <li>
                                <button
                                    @click="tabAktivitas = (tabAktivitas === 'kegiatanKelompok') ? '' : 'kegiatanKelompok' "
                                    :class="tabAktivitas === 'kegiatanKelompok'
                                        ?
                                        'w-full text-start px-4 py-3 bg-blue-600 text-white font-medium' :
                                        'w-full text-start px-4 py-3 bg-white text-gray-800 font-medium '">
                                    Kegiatan Kelompok
                                </button>
                            </li>
                            <li>
                                <button @click="tabAktivitas = (tabAktivitas === 'antrianAwal') ? '' : 'antrianAwal' "
                                    :class="tabAktivitas === 'antrianAwal'
                                        ?
                                        'w-full text-start px-4 py-3 bg-blue-600 text-white font-medium' :
                                        'w-full text-start px-4 py-3 bg-white text-gray-800 font-medium '">
                                    Antrian Awal
                                </button>
                            </li>
                            <li>
                                <button
                                    @click="tabAktivitas = (tabAktivitas === 'screenAntrian') ? '' : 'screenAntrian' "
                                    :class="tabAktivitas === 'screenAntrian'
                                        ?
                                        'w-full text-start px-4 py-3 bg-blue-600 text-white font-medium' :
                                        'w-full text-start px-4 py-3 bg-white text-gray-800 font-medium '">
                                    Screen Antrian
                                </button>
                            </li> --}}
                        </ul>
                    </div>

                    <!-- Content Rawat Jalan Poli-->
                    <div x-cloak x-show="tabAktivitas === 'rawatJalanPoli' " class="w-full">
                        <div class="bg-white px-6 py-4 rounded-md">
                            <h2 class="text-2xl font-semibold mb-4 text-blue-600">Rawat Jalan Poli</h2>

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
                                        <input type="date" x-model="endDate"
                                            class="w-full mt-1 border rounded p-2" />
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

                            <div class="flex items-center justify-between w-full">
                                <div class="grid grid-cols-2 gap-4 my-4">
                                    <div class="w-60">
                                        <label for="default"
                                            class="block mb-2 text-sm font-medium text-gray-600 dark:text-white">Tenaga
                                            Medis</label>
                                        <select id="default"
                                            class="bg-gray-50 border border-gray-300 text-gray-900 mb-6 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                            <option selected>Semua Tenaga Medis</option>
                                            <option value="US">United States</option>
                                            <option value="CA">Canada</option>
                                            <option value="FR">France</option>
                                            <option value="DE">Germany</option>
                                        </select>
                                    </div>

                                    <div class="w-60">
                                        <label for="default"
                                            class="block mb-2 text-sm font-medium text-gray-600 dark:text-white">Metode
                                            Pembayaran</label>
                                        <select id="default"
                                            class="bg-gray-50 border border-gray-300 text-gray-900 mb-6 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                            <option selected>Semua Metode Pembayaran</option>
                                            <option value="US">United States</option>
                                            <option value="CA">Canada</option>
                                            <option value="FR">France</option>
                                            <option value="DE">Germany</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="w-96">
                                    <form class="max-w-md mx-auto">
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
                                                placeholder="Search Mockups, Logos..." required />
                                            <button type="submit"
                                                class="text-white absolute end-2.5 bottom-2.5 bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-4 py-2 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Search</button>
                                        </div>
                                    </form>
                                </div>
                            </div>

                            <!-- Table -->
                            <div class="bg-white shadow rounded overflow-x-auto">
                                <table class="min-w-full text-sm">
                                    <thead class="bg-blue-100">
                                        <tr>
                                            <th class="px-4 py-2 text-left">Status</th>
                                            <th class="px-4 py-2 text-left">Tanggal Kunjungan</th>
                                            <th class="px-4 py-2 text-left">Tanggal Dibuat</th>
                                            <th class="px-4 py-2 text-left">No</th>
                                            <th class="px-4 py-2 text-left">Poli</th>
                                            <th class="px-4 py-2 text-left">Nama Pasien</th>
                                            <th class="px-4 py-2 text-left">Rencana Tindakan</th>
                                            <th class="px-4 py-2 text-left">Rencana Paket</th>
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

                    <!-- Content Antri Cepat-->
                    <div x-cloak x-show="tabAktivitas === 'antriCepat' " class="w-full">
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
                                        <input type="date" x-model="endDate"
                                            class="w-full mt-1 border rounded p-2" />
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

                    <!-- Content Gawat Darurat-->
                    <div x-cloak x-show="tabAktivitas === 'gawatDarurat' " class="w-full">
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
                                        <input type="date" x-model="endDate"
                                            class="w-full mt-1 border rounded p-2" />
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

                    <!-- Content Kunjungan Sehat-->
                    <div x-cloak x-show="tabAktivitas === 'kunjunganSehat' " class="w-full">
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
                                        <input type="date" x-model="endDate"
                                            class="w-full mt-1 border rounded p-2" />
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

                    <!-- Content Promotif Preventif-->
                    <div x-cloak x-show="tabAktivitas === 'promotifPreventif' " class="w-full">
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
                                        <input type="date" x-model="endDate"
                                            class="w-full mt-1 border rounded p-2" />
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

                    <!-- Content Kegiatan Kelompok-->
                    <div x-cloak x-show="tabAktivitas === 'kegiatanKelompok' " class="w-full">
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
                                        <input type="date" x-model="endDate"
                                            class="w-full mt-1 border rounded p-2" />
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

                    <!-- Content Antrian Awal-->
                    <div x-cloak x-show="tabAktivitas === 'antrianAwal' " class="w-full">
                        <div class="bg-white px-6 py-4 rounded-md">
                            <div class="flex items-center justify-between">
                                <h2 class="text-2xl font-semibold mb-4 text-blue-600">Antrian Awal</h2>

                                <div class="flex gap-4 items-center">
                                    <button class="hover:bg-slate-200 hover:rounded-full p-1">
                                        <svg xmlns="http://www.w3.org/2000/svg" height="24px"
                                            viewBox="0 -960 960 960" width="24px" fill="#000000">
                                            <path
                                                d="M480-160q-134 0-227-93t-93-227q0-134 93-227t227-93q69 0 132 28.5T720-690v-110h80v280H520v-80h168q-32-56-87.5-88T480-720q-100 0-170 70t-70 170q0 100 70 170t170 70q77 0 139-44t87-116h84q-28 106-114 173t-196 67Z" />
                                        </svg>
                                    </button>

                                    <button
                                        class="px-2 py-4 bg-green-700 hover:bg-green-600 text-white rounded-md font-semibold text-md">
                                        <span>+ ANTRIAN</span>
                                    </button>
                                </div>
                            </div>


                            <!-- Table -->
                            <div class="bg-white shadow rounded overflow-x-auto my-5">
                                <table class="min-w-full text-sm">
                                    <thead class="bg-blue-100">
                                        <tr>
                                            <th class="px-4 py-2 text-left">No</th>
                                            <th class="px-4 py-2 text-left">Generated</th>
                                            <th class="px-4 py-2 text-left">Last Handled</th>
                                            <th class="px-4 py-2 text-left">Last Counter</th>
                                            <th class="px-4 py-2 text-left">Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr class="border-t">
                                            <td class="px-4 py-2">Pasien Baru</td>
                                            <td class="px-4 py-2">-</td>
                                            <td class="px-4 py-2">-</td>
                                            <td class="px-4 py-2">-</td>
                                            <td class="px-4 py-2 flex items-center gap-4">
                                                <button class="p-2 bg-green-700 text-white rounded-md">
                                                    <span>TERIMA</span>
                                                </button>

                                                <svg xmlns="http://www.w3.org/2000/svg" height="24px"
                                                    viewBox="0 -960 960 960" width="24px" fill="#000000">
                                                    <path
                                                        d="M560-131v-82q90-26 145-100t55-168q0-94-55-168T560-749v-82q124 28 202 125.5T840-481q0 127-78 224.5T560-131ZM120-360v-240h160l200-200v640L280-360H120Zm440 40v-322q47 22 73.5 66t26.5 96q0 51-26.5 94.5T560-320ZM400-606l-86 86H200v80h114l86 86v-252ZM300-480Z" />
                                                </svg>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>

                    <!-- Content Screen Antrian-->
                    <div x-cloak x-show="tabAktivitas === 'screenAntrian' " class="w-full">
                        <div class="bg-white px-6 py-4 rounded-md">
                            <div class="flex items-center justify-between">
                                <h2 class="text-2xl font-semibold mb-4 text-blue-600">Screen Antrian</h2>

                                <div class="flex gap-4 items-center">
                                    <button class="hover:bg-slate-200 hover:rounded-full p-1">
                                        <svg xmlns="http://www.w3.org/2000/svg" height="24px"
                                            viewBox="0 -960 960 960" width="24px" fill="#000000">
                                            <path
                                                d="M480-160q-134 0-227-93t-93-227q0-134 93-227t227-93q69 0 132 28.5T720-690v-110h80v280H520v-80h168q-32-56-87.5-88T480-720q-100 0-170 70t-70 170q0 100 70 170t170 70q77 0 139-44t87-116h84q-28 106-114 173t-196 67Z" />
                                        </svg>
                                    </button>

                                    <button
                                        class="px-2 py-4 bg-green-700 hover:bg-green-600 text-white rounded-md font-semibold text-md">
                                        <span>TAMBAH SCREEN ANTRIAN</span>
                                    </button>
                                </div>
                            </div>


                            <!-- Table -->
                            <div class="bg-white shadow rounded overflow-x-auto my-5">
                                <table class="min-w-full text-sm">
                                    <thead class="bg-blue-100">
                                        <tr>
                                            <th class="px-4 py-2 text-left">No</th>
                                            <th class="px-4 py-2 text-left">Nama Screen Antrian</th>
                                            <th class="px-4 py-2 text-left">Jenis Antrian</th>
                                            <th class="px-4 py-2 text-left">Poli/loket</th>
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

                </div>
            </div>
            {{-- End Content --}}
        @else
            <div class="w-full h-full flex items-center justify-center mt-10 xl:flex xl:flex-col xl:w-full xl:px-4">
                <img src="https://public-medicaboo.s3-ap-southeast-1.amazonaws.com/noPractice.png">
                <div class="my-4 flex flex-col items-center">
                    <label class="text-blue-700 font-bold text-xl">Data Praktek Dokter Belum Lengkap</label>
                    <label class="text-gray-700 font-light text-md">Silahkan lengkapi dan tenaga medis terlebih
                        dahulu</label>
                </div>
                <button class="bg-blue-700 px-2 py-4 text-white rounded-md hover:bg-blue-800 font-semibold text-lg">+
                    TAMBAH
                    DATA TENAGA
                    MEDIS</button>
            </div>
        @endif

    </div>

    <div class="fixed bottom-10 right-10">
        <button class="bg-blue-700 flex items-center px-4 py-2 rounded-md shadow-lg">
            <svg xmlns="http://www.w3.org/2000/svg" height="30px" viewBox="0 -960 960 960" width="30px"
                fill="#FFFFFF">
                <path
                    d="m480-320 56-56-64-64h168v-80H472l64-64-56-56-160 160 160 160Zm0 240q-83 0-156-31.5T197-197q-54-54-85.5-127T80-480q0-83 31.5-156T197-763q54-54 127-85.5T480-880q83 0 156 31.5T763-763q54 54 85.5 127T880-480q0 83-31.5 156T763-197q-54 54-127 85.5T480-80Zm0-80q134 0 227-93t93-227q0-134-93-227t-227-93q-134 0-227 93t-93 227q0 134 93 227t227 93Zm0-320Z" />
            </svg>
        </button>
    </div>

    @push('scripts')
        @vite('resources/js/Admin/rawat_jalan.js')
    @endpush
</x-app-layout>
