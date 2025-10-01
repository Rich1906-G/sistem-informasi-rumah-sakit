<x-app-layout>
    <div x-data="{ tabAktivitas: '', dataRawatJalan: [], }" class="p-4 sm:ml-64 lg:p-0 ">

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
                    <div class="mx-6 mb-6">
                        <div class="font-normal text-2xl text-sky-700 dark:text-gray-200 leading-tight">
                            {{ __('Registrasi') }}
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
            <div class="flex p-6 gap-4" x-data="{ tabAktivitas: 'rawatJalanPoli' }">
                <!-- Kiri: Menu Table -->
                <div class="w-64 bg-white shadow rounded">
                    <ul class="divide-y divide-gray-200">
                        <li>
                            <button id="btnRawatJalanPoli"
                                @click="tabAktivitas = (tabAktivitas === 'rawatJalanPoli') ? '' : 'rawatJalanPoli';"
                                :class="tabAktivitas === 'rawatJalanPoli'
                                    ?
                                    'w-full text-start px-4 py-3 bg-blue-600 text-white font-medium' :
                                    'w-full text-start px-4 py-3 bg-white text-gray-800 font-medium '">Rawat
                                Jalan Poli
                            </button>
                        </li>
                        <li>
                            <button id="btnAntriCepat"
                                @click="tabAktivitas = (tabAktivitas === 'antriCepat') ? '' : 'antriCepat' "
                                :class="tabAktivitas === 'antriCepat'
                                    ?
                                    'w-full text-start px-4 py-3 bg-blue-600 text-white font-medium' :
                                    'w-full text-start px-4 py-3 bg-white text-gray-800 font-medium '">
                                Antri Cepat
                            </button>
                        </li>
                        <li>
                            <button @click="tabAktivitas = (tabAktivitas === 'gawatDarurat') ? '' : 'gawatDarurat' "
                                :class="tabAktivitas === 'gawatDarurat'
                                    ?
                                    'w-full text-start px-4 py-3 bg-blue-600 text-white font-medium' :
                                    'w-full text-start px-4 py-3 bg-white text-gray-800 font-medium '">
                                Gawat Darurat
                            </button>
                        </li>
                        <li>
                            <button @click="tabAktivitas = (tabAktivitas === 'kunjunganSehat') ? '' : 'kunjunganSehat' "
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
                            <button @click="tabAktivitas = (tabAktivitas === 'screenAntrian') ? '' : 'screenAntrian' "
                                :class="tabAktivitas === 'screenAntrian'
                                    ?
                                    'w-full text-start px-4 py-3 bg-blue-600 text-white font-medium' :
                                    'w-full text-start px-4 py-3 bg-white text-gray-800 font-medium '">
                                Screen Antrian
                            </button>
                        </li>
                    </ul>
                </div>

                {{-- Rawat jalan poli --}}
                <div x-cloak x-show="tabAktivitas === 'rawatJalanPoli' " class="w-full">
                    <div class="grid grid-cols-1 mt-2 rounded-lg p-2 bg-white w-full ">

                        <div class="p-4">
                            {{-- Header dan Tombol Aksi --}}
                            <div class="flex justify-between items-start mb-4">
                                <h2 class="text-xl font-semibold text-blue-700">Rawat Jalan Poli</h2>
                            </div>

                            <div class="filter-controls p-4 bg-gray-50 rounded-lg mb-4">
                                <div class="grid grid-cols-6 gap-4">

                                    <div>
                                        <label class="block text-sm font-medium text-gray-700">Dari tanggal</label>
                                        <input type="date" id="filter_tgl_dari_rjp"
                                            class="form-input mt-1 block w-full rounded-md border-gray-300 shadow-sm">
                                    </div>
                                    <div>
                                        <label class="block text-sm font-medium text-gray-700">Hingga tanggal</label>
                                        <input type="date" id="filter_tgl_hingga_rjp"
                                            class="form-input mt-1 block w-full rounded-md border-gray-300 shadow-sm">
                                    </div>

                                    <div>
                                        <label class="block text-sm font-medium text-gray-700">Tenaga Medis</label>
                                        <select id="filter_tenaga_medis_rjp"
                                            class="form-select mt-1 block w-full rounded-md border-gray-300 shadow-sm">
                                            <option value="">Semua Tenaga Medis</option>
                                            @foreach ($tenagaMedis as $tm)
                                                <option value="{{ $tm->id_tenaga_medis }}">{{ $tm->nama_lengkap }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>

                                    <div>
                                        <label class="block text-sm font-medium text-gray-700">Metode Pembayaran</label>
                                        <select id="filter_pembayaran_rjp"
                                            class="form-select mt-1 block w-full rounded-md border-gray-300 shadow-sm">
                                            <option value="">Semua Metode Pembayaran</option>
                                            @foreach ($penjamin as $pj)
                                                <option value="{{ $pj->id_penjamin }}">{{ $pj->nama_penjamin }}</option>
                                            @endforeach
                                        </select>
                                    </div>

                                    <div>
                                        <label class="block text-sm font-medium text-gray-700">Poli</label>
                                        <select id="filter_poli_rjp"
                                            class="form-select mt-1 block w-full rounded-md border-gray-300 shadow-sm">
                                            <option value="">Semua Poli</option>
                                            @foreach ($poli as $pl)
                                                <option value="{{ $pl->id_poli }}">{{ $pl->nama_poli }}</option>
                                            @endforeach
                                        </select>
                                    </div>

                                    <div>
                                        <label class="block text-sm font-medium text-gray-700">Nama Pasien, Nomor
                                            MR</label>
                                        <div class="flex">
                                            <input type="text" id="filter_pasien_rjp"
                                                class="form-input block w-full rounded-l-md border-gray-300 shadow-sm"
                                                placeholder="Cari...">
                                            <button type="button" id="btn_search"
                                                class="bg-indigo-600 text-white p-2 rounded-r-md hover:bg-indigo-700">
                                                <i class="fa fa-search"></i>
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="p-4">
                                <table id="rawatJalanPoli" class="table table-bordered"
                                    data-url="{{ route('registrasi.getdatarawatjalanpoli') }}">
                                    <thead>
                                        <tr class="border-b">
                                            <th>Status</th>
                                            <th>Tanggal Kunjungan</th>
                                            <th>Tanggal Dibuat</th>
                                            <th>NO</th>
                                            <th>Poli</th>
                                            <th>Nama Pasien</th>
                                            <th>Rencana Tindakan</th>
                                            {{-- <th>Rencana Paket</th> --}}
                                            <th>Tenaga Medis</th>
                                            <th>Tipe Bayar</th>
                                            {{-- <th>Rujuk BPJS</th> --}}
                                        </tr>
                                    </thead>
                                    <tbody></tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Content Antri Cepat-->
                <div x-cloak x-show="tabAktivitas === 'antriCepat' " class="w-full">
                    <div class="grid grid-cols-1 mt-2 rounded-lg p-2 bg-white w-full">

                        <div class="p-4">
                            {{-- Header dan Tombol Aksi --}}
                            <div class="flex justify-between items-start mb-4">
                                <h2 class="text-xl font-semibold text-blue-700">Antri Cepat</h2>
                            </div>

                            <div class="filter-controls p-4 bg-gray-50 rounded-lg mb-4">
                                <div class="grid grid-cols-6 gap-4">

                                    <div>
                                        <label class="block text-sm font-medium text-gray-700">Dari tanggal</label>
                                        <input type="date" id="filter_tgl_dari_ac"
                                            class="form-input mt-1 block w-full rounded-md border-gray-300 shadow-sm">
                                    </div>
                                    <div>
                                        <label class="block text-sm font-medium text-gray-700">Hingga tanggal</label>
                                        <input type="date" id="filter_tgl_hingga_ac"
                                            class="form-input mt-1 block w-full rounded-md border-gray-300 shadow-sm">
                                    </div>

                                    <div>
                                        <label class="block text-sm font-medium text-gray-700">Poli</label>
                                        <select id="filter_poli_ac"
                                            class="form-select mt-1 block w-full rounded-md border-gray-300 shadow-sm">
                                            <option value="">Semua Poli</option>
                                            @foreach ($poli as $pl)
                                                <option value="{{ $pl->id_poli }}">{{ $pl->nama_poli }}</option>
                                            @endforeach
                                        </select>
                                    </div>

                                </div>
                            </div>

                            <div class="p-4">
                                <table id="antriCepat" class="table table-bordered"
                                    data-url="{{ route('registrasi.getdataantricepat') }}">
                                    <thead>
                                        <tr class="border-b">
                                            <th>Tanggal Kunjungan</th>
                                            <th>NO</th>
                                            <th>Poli</th>
                                            <th>Nama Pasien</th>
                                            <th>Rencana Tindakan</th>
                                            {{-- <th>Rencana Paket</th> --}}
                                            <th>Tipe Bayar</th>
                                            <th>Tenaga Medis</th>
                                            <th>Status</th>
                                        </tr>
                                    </thead>
                                    <tbody></tbody>
                                </table>
                            </div>
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

                <!-- Content Antrian Awal-->
                <div x-cloak x-show="tabAktivitas === 'antrianAwal' " class="w-full">
                    <div class="bg-white px-6 py-4 rounded-md">
                        <div class="flex items-center justify-between">
                            <h2 class="text-2xl font-semibold mb-4 text-blue-600">Antrian Awal</h2>

                            <div class="flex gap-4 items-center">
                                <button class="hover:bg-slate-200 hover:rounded-full p-1">
                                    <svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 -960 960 960"
                                        width="24px" fill="#000000">
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
                                    <svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 -960 960 960"
                                        width="24px" fill="#000000">
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
        @vite(['resources/js/Admin/registrasi.js'])
    @endpush
</x-app-layout>
