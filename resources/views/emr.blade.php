<x-app-layout>
    <div class="p-4 sm:ml-64 lg:p-0 ">

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
                            <button class="bg-blue-700 text-white px-4 py-2 w-full rounded-md font-semibold">
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
                            {{ __('Electronic Medical Record') }}
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

                    <div class="flex gap-8 px-8">
                        <button class="border-2 border-indigo-600 rounded-md px-2 py-1">
                            <svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 -960 960 960"
                                width="24px" fill="#0000F5">
                                <path
                                    d="M640-640v-120H320v120h-80v-200h480v200h-80Zm-480 80h640-640Zm560 100q17 0 28.5-11.5T760-500q0-17-11.5-28.5T720-540q-17 0-28.5 11.5T680-500q0 17 11.5 28.5T720-460Zm-80 260v-160H320v160h320Zm80 80H240v-160H80v-240q0-51 35-85.5t85-34.5h560q51 0 85.5 34.5T880-520v240H720v160Zm80-240v-160q0-17-11.5-28.5T760-560H200q-17 0-28.5 11.5T160-520v160h80v-80h480v80h80Z" />
                            </svg>
                        </button>
                        <button class="border-2 border-indigo-600 rounded-md px-2 py-1">
                            <svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 -960 960 960"
                                width="24px" fill="#0000F5">
                                <path
                                    d="M160-160v-80h110l-16-14q-52-46-73-105t-21-119q0-111 66.5-197.5T400-790v84q-72 26-116 88.5T240-478q0 45 17 87.5t53 78.5l10 10v-98h80v240H160Zm400-10v-84q72-26 116-88.5T720-482q0-45-17-87.5T650-648l-10-10v98h-80v-240h240v80H690l16 14q49 49 71.5 106.5T800-482q0 111-66.5 197.5T560-170Z" />
                            </svg>
                        </button>
                    </div>
                </div>
            </div>
        </div>
        {{-- End Header --}}

        <!-- sembunyikan elemen sebelum Alpine inisialisasi -->
        <style>
            [x-cloak] {
                display: none
            }
        </style>

        <div class="" x-data="{ tombolHariIni: false }">
            <section class="min-h-screen flex items-center justify-center bg-white text-gray-900">
                <div class="text-center">
                    <h1 class="text-5xl font-bold mb-4 animate-pulse">🚀 Coming Soon</h1>
                    <p class="text-lg mb-6">Fitur ini sedang dalam tahap pengembangan. Nantikan update
                        berikutnya!</p>
                </div>
            </section>
            {{-- <div class="w-64 mx-6"> --}}
            <!-- wrapper tombol + dropdown -->
            {{-- <div class="relative" @click.outside="tombolHariIni = false">
                    <button @click="tombolHariIni = !tombolHariIni" :aria-expanded="tombolHariIni.toString()"
                        class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-4 text-center inline-flex items-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800 justify-between w-full"
                        type="button">Hari ini
                        <svg class="w-3 h-3 ml-3 transition-transform duration-200"
                            :class="{ 'rotate-180': tombolHariIni }" xmlns="http://www.w3.org/2000/svg" fill="none"
                            viewBox="0 0 10 6">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                stroke-width="2" d="m1 1 4 4 4-4" />
                        </svg>
                    </button>

                    <div x-cloak x-show="tombolHariIni" x-transition
                        class="z-10 bg-white divide-y divide-gray-100 rounded-lg shadow-sm w-full dark:bg-gray-700 absolute left-0 mt-2">
                        <ul class="py-2 text-sm text-gray-700 dark:text-gray-200"
                            aria-labelledby="dropdownDefaultButton">
                            <li>
                                <a href="#"
                                    class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Hari
                                    ini</a>
                            </li>
                            <li>
                                <a href="#"
                                    class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Semua</a>
                            </li>
                        </ul>
                    </div>
                </div> --}}

            <!-- tombol paling bawah yang kamu maksud (tetap ada, bukan dropdown) -->
            {{-- <button
                    class="flex items-center justify-between w-full p-4 border border-slate-600 rounded-lg mt-4 bg-white text-red-500"
                    type="button">
                    Tidak ada antrian pasien
                </button> --}}
            {{-- </div> --}}

            {{-- <div class="flex items-center justify-center w-full">
                <div class="flex flex-col gap-8 items-center">
                    <img src="https://public-medicaboo.s3-ap-southeast-1.amazonaws.com/noPatient.png" alt="">
                    <label class="text-blue-600 text-3xl font-semibold">Tidak ada antrian pasien hari ini</label>
                    <label class="text-xl font-normal">Gunakan search bar atau advance search pada
                        pojok kiri atas untuk mencari pasien.</label>
                </div>
            </div> --}}
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

    </div>
</x-app-layout>
