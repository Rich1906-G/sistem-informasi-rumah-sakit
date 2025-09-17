<x-app-layout>
    <div class="p-4 sm:ml-64 lg:p-0">

        {{-- Start Header --}}
        <div class="w-full sm:px-6 lg:px-0 shadow-md">
            <div class="bg-white dark:bg-gray-800 shadow-sm sm:rounded-lg lg:rounded-none">
                <div class="flex items-center justify-between">
                    <div class="p-6">
                        <div class="font-normal text-2xl text-sky-700 dark:text-gray-200 leading-tight">
                            {{ __('Dashboard') }}
                        </div>

                        <h2 class="font-light text-lg text-sky-500 dark:text-gray-200 leading-tight">
                            {{ __('Royal Klinik Tj. Priok') }}
                        </h2>
                    </div>

                    <div class="flex items-center p-6">
                        <div class="grid grid-cols-3 gap-x-3 mx-4 items-center">
                            <img class="rounded-md h-[70px] w-auto" src="{{ asset('storage/assets/logo_unpri.png') }}"
                                alt="foto_bang">
                            <button class="px-2 py-4 bg-blue-600 text-white rounded-md">Royal Prima</button>
                            <button class="px-2 py-4 bg-blue-600 text-white rounded-md">Royal Prima</button>
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
            </div>
        </div>
        {{-- End Header --}}

        {{-- Start Content --}}
        <div class="w-full grid grid-cols-1 lg:grid-cols-[2fr_2fr] gap-6 mt-10">
            <div class="grid grid-rows-2 gap-6 ml-6">
                {{-- Card Kunjungan Pasien --}} {{-- Ini Rows Pertama --}}
                <div class="rounded-lg shadow bg-white p-4">
                    {{-- Dropdown Filter --}}
                    <div class="grid grid-cols-1 md:grid-cols-3 gap-2 mb-4">
                        <select class="rounded-md border-gray-300 text-sm">
                            <option value="">Kunjungan Sakit</option>
                            <option value="">Kunjungan Sehat</option>
                            <option value="">Perawat</option>
                        </select>
                        <select class="rounded-md border-gray-300 text-sm">
                            <option value="">Umum</option>
                            <option value="">Spesialis</option>
                        </select>
                        <select class="rounded-md border-gray-300 text-sm">
                            <option value="">Bulan</option>
                            <option value="">Tahun</option>
                        </select>
                    </div>

                    {{-- Angka & Info --}}
                    <div class="flex items-center space-x-4 mb-4">
                        <h1 class="text-4xl font-bold text-gray-800">0</h1>
                        <div>
                            <p class="text-green-500 text-sm flex items-center">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-1" fill="none"
                                    viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M5 15l7-7 7 7" />
                                </svg>
                                0%
                            </p>
                            <p class="text-gray-500 text-xs">dari Bulan lalu</p>
                        </div>
                    </div>

                    {{-- Chart Placeholder --}}
                    <div class="h-auto border rounded-md flex items-center justify-center text-gray-400">
                        <canvas id="chartKunjungan"></canvas>
                    </div>
                </div>

                {{-- Ini Rows Kedua --}}
                <div class="grid grid-cols-[3fr_1fr] gap-4 py-5">
                    {{-- Card Total Pasien Klinik --}}
                    <div class="rounded-lg shadow bg-white p-4">
                        {{-- Header Dari Card Total Pasien Klinik --}}
                        <div class="flex items-center justify-between mb-5">
                            <div class="flex items-center space-x-1">
                                <label class="font-semibold">Total Pasien Klinik</label>
                                <button class="hover:bg-slate-200 hover:rounded-full p-1">
                                    <svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 -960 960 960"
                                        width="24px" fill="#000000">
                                        <path
                                            d="M440-280h80v-240h-80v240Zm40-320q17 0 28.5-11.5T520-640q0-17-11.5-28.5T480-680q-17 0-28.5 11.5T440-640q0 17 11.5 28.5T480-600Zm0 520q-83 0-156-31.5T197-197q-54-54-85.5-127T80-480q0-83 31.5-156T197-763q54-54 127-85.5T480-880q83 0 156 31.5T763-763q54 54 85.5 127T880-480q0 83-31.5 156T763-197q-54 54-127 85.5T480-80Zm0-80q134 0 227-93t93-227q0-134-93-227t-227-93q-134 0-227 93t-93 227q0 134 93 227t227 93Zm0-320Z" />
                                    </svg>
                                </button>
                            </div>

                            <div class="flex items-center">
                                <label class="px-2 bg-blue-600 text-white rounded-md">Tidak Terhubung BPJS</label>
                            </div>
                        </div>

                        {{-- Content Dari Card Total Pasien Klinik --}}
                        <div class="flex flex-row items-center justify-center h-full space-x-32">
                            <div class="flex flex-col gap-1 items-center">
                                <label class="text-4xl font-bold">0</label>
                                <label class="text-gray-600 mb-4">Pasien</label>
                            </div>


                            <div class="space-y-2">
                                <div class="flex items-center justify-between w-40">
                                    <span class="flex items-center">
                                        <span class="w-3 h-3 rounded-full bg-blue-900 mr-2"></span> Rawat Jalan
                                    </span>
                                    <span>0</span>
                                </div>

                                <div class="flex items-center justify-between w-40">
                                    <span class="flex items-center">
                                        <span class="w-3 h-3 rounded-full bg-blue-700 mr-2"></span> Rawat Inap
                                    </span>
                                    <span>0</span>
                                </div>

                                <div class="flex items-center justify-between w-40">
                                    <span class="flex items-center">
                                        <span class="w-3 h-3 rounded-full bg-blue-400 mr-2"></span> Kunjungan Sehat
                                    </span>
                                    <span>0</span>
                                </div>

                                <div class="flex items-center justify-between w-40">
                                    <span class="flex items-center">
                                        <span class="w-3 h-3 rounded-full bg-blue-200 mr-2"></span> Apotek
                                    </span>
                                    <span>0</span>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="grid grid-rows-2 gap-4">
                        {{-- Card Pendapatan Bulan Ini --}}
                        <div class="rounded-lg shadow bg-white p-4">
                            {{-- Header Pendapatan Bulan Ini --}}
                            <label class="font-semibold">Pendapatan Bulan Ini</label>

                            {{-- Content Pendapatan Bulan Ini --}}
                            <div class="flex flex-col items-start justify-center h-full">
                                <div class="flex flex-row space-x-8 items-center">
                                    <label class="text-4xl font-bold">Rp0</label>
                                    <div class="">
                                        <label class="flex space-x-2 items-center px-2 bg-green-300 rounded-lg w-20">
                                            <svg xmlns="http://www.w3.org/2000/svg" height="24px"
                                                viewBox="0 -960 960 960" width="24px" fill="#EA3323"
                                                class="">
                                                <path
                                                    d="M640-240v-80h104L536-526 376-366 80-664l56-56 240 240 160-160 264 264v-104h80v240H640Z" />
                                            </svg>
                                            <span>0%</span>
                                        </label>
                                        <label class="text-gray-400 text-md w-full">dari bulan September</label>
                                    </div>
                                </div>
                            </div>
                        </div>

                        {{-- Card Pengeluaran Bulan Ini --}}
                        <div class="rounded-lg shadow bg-white p-4">
                            {{-- Header Pengeluaran Bulan Ini --}}
                            <label class="font-semibold">Pengeluaran Bulan Ini</label>

                            {{-- Content Pengeluaran Bulan Ini --}}
                            <div class="flex flex-col items-start justify-center h-full">
                                <div class="flex flex-row space-x-8 items-center">
                                    <label class="text-4xl font-bold">Rp0</label>
                                    <div class="">
                                        <label class="flex space-x-2 items-center px-2 bg-green-300 rounded-lg w-20">
                                            <svg xmlns="http://www.w3.org/2000/svg" height="24px"
                                                viewBox="0 -960 960 960" width="24px" fill="#EA3323"
                                                class="">
                                                <path
                                                    d="M640-240v-80h104L536-526 376-366 80-664l56-56 240 240 160-160 264 264v-104h80v240H640Z" />
                                            </svg>
                                            <span>0%</span>
                                        </label>
                                        <label class="text-gray-400 text-md w-full">dari bulan September</label>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>

            {{-- Card Tambahan (misalnya Pasien Baru) --}}
            <div class="mx-6">
                <div class="grid grid-cols-2 gap-4">
                    <div class="w-full  shadow-sm bg-white rounded-lg p-4">
                        <div class="grid grid-cols-1 gap-1">
                            <div class="flex space-x-2 items-center">
                                <svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 -960 960 960"
                                    width="24px" fill="#5985E1">
                                    <path
                                        d="m612-292 56-56-148-148v-184h-80v216l172 172ZM480-80q-83 0-156-31.5T197-197q-54-54-85.5-127T80-480q0-83 31.5-156T197-763q54-54 127-85.5T480-880q83 0 156 31.5T763-763q54 54 85.5 127T880-480q0 83-31.5 156T763-197q-54 54-127 85.5T480-80Zm0-400Zm0 320q133 0 226.5-93.5T800-480q0-133-93.5-226.5T480-800q-133 0-226.5 93.5T160-480q0 133 93.5 226.5T480-160Z" />
                                </svg>

                                <button class="hover:bg-slate-200 hover:rounded-full p-1">
                                    <svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 -960 960 960"
                                        width="24px" fill="#000000">
                                        <path
                                            d="M440-280h80v-240h-80v240Zm40-320q17 0 28.5-11.5T520-640q0-17-11.5-28.5T480-680q-17 0-28.5 11.5T440-640q0 17 11.5 28.5T480-600Zm0 520q-83 0-156-31.5T197-197q-54-54-85.5-127T80-480q0-83 31.5-156T197-763q54-54 127-85.5T480-880q83 0 156 31.5T763-763q54 54 85.5 127T880-480q0 83-31.5 156T763-197q-54 54-127 85.5T480-80Zm0-80q134 0 227-93t93-227q0-134-93-227t-227-93q-134 0-227 93t-93 227q0 134 93 227t227 93Zm0-320Z" />
                                    </svg>
                                </button>
                            </div>
                            <div class="flex flex-col gap-1 items-center justify-center font-semibold">
                                <label>Rata-Rata Waktu Konsultasi</label>
                                <label>0 m 0 s</label>
                                <label class="flex items-center px-2 bg-green-300 rounded-lg space-x-2">
                                    <svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 -960 960 960"
                                        width="24px" fill="#EA3323" class="">
                                        <path
                                            d="M640-240v-80h104L536-526 376-366 80-664l56-56 240 240 160-160 264 264v-104h80v240H640Z" />
                                    </svg>
                                    <span>0%</span>
                                </label>
                                <label class="text-gray-400">dari bulan September</label>
                            </div>
                        </div>
                    </div>

                    <div class="w-full shadow-sm bg-white rounded-lg p-4">
                        <div class="grid grid-cols-1 gap-1">
                            <div class="flex space-x-2 items-center">
                                <svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 -960 960 960"
                                    width="24px" fill="#5985E1">
                                    <path
                                        d="m612-292 56-56-148-148v-184h-80v216l172 172ZM480-80q-83 0-156-31.5T197-197q-54-54-85.5-127T80-480q0-83 31.5-156T197-763q54-54 127-85.5T480-880q83 0 156 31.5T763-763q54 54 85.5 127T880-480q0 83-31.5 156T763-197q-54 54-127 85.5T480-80Zm0-400Zm0 320q133 0 226.5-93.5T800-480q0-133-93.5-226.5T480-800q-133 0-226.5 93.5T160-480q0 133 93.5 226.5T480-160Z" />
                                </svg>

                                <button class="hover:bg-slate-200 hover:rounded-full p-1">
                                    <svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 -960 960 960"
                                        width="24px" fill="#000000">
                                        <path
                                            d="M440-280h80v-240h-80v240Zm40-320q17 0 28.5-11.5T520-640q0-17-11.5-28.5T480-680q-17 0-28.5 11.5T440-640q0 17 11.5 28.5T480-600Zm0 520q-83 0-156-31.5T197-197q-54-54-85.5-127T80-480q0-83 31.5-156T197-763q54-54 127-85.5T480-880q83 0 156 31.5T763-763q54 54 85.5 127T880-480q0 83-31.5 156T763-197q-54 54-127 85.5T480-80Zm0-80q134 0 227-93t93-227q0-134-93-227t-227-93q-134 0-227 93t-93 227q0 134 93 227t227 93Zm0-320Z" />
                                    </svg>
                                </button>
                            </div>
                            <div class="flex flex-col gap-1 items-center justify-center font-semibold">
                                <label>Rata-Rata Waktu Konsultasi</label>
                                <label>0 m 0 s</label>
                                <label class="flex items-center px-2 bg-green-300 rounded-lg space-x-2">
                                    <svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 -960 960 960"
                                        width="24px" fill="#EA3323" class="">
                                        <path
                                            d="M640-240v-80h104L536-526 376-366 80-664l56-56 240 240 160-160 264 264v-104h80v240H640Z" />
                                    </svg>
                                    <span>0%</span>
                                </label>
                                <label class="text-gray-400">dari bulan September</label>
                            </div>
                        </div>
                    </div>

                    <div class="w-full  shadow-sm bg-white rounded-lg p-4">
                        <div class="grid grid-cols-1 gap-1">
                            <div class="flex space-x-2 items-center">
                                <svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 -960 960 960"
                                    width="24px" fill="#5985E1">
                                    <path
                                        d="m612-292 56-56-148-148v-184h-80v216l172 172ZM480-80q-83 0-156-31.5T197-197q-54-54-85.5-127T80-480q0-83 31.5-156T197-763q54-54 127-85.5T480-880q83 0 156 31.5T763-763q54 54 85.5 127T880-480q0 83-31.5 156T763-197q-54 54-127 85.5T480-80Zm0-400Zm0 320q133 0 226.5-93.5T800-480q0-133-93.5-226.5T480-800q-133 0-226.5 93.5T160-480q0 133 93.5 226.5T480-160Z" />
                                </svg>

                                <button class="hover:bg-slate-200 hover:rounded-full p-1">
                                    <svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 -960 960 960"
                                        width="24px" fill="#000000">
                                        <path
                                            d="M440-280h80v-240h-80v240Zm40-320q17 0 28.5-11.5T520-640q0-17-11.5-28.5T480-680q-17 0-28.5 11.5T440-640q0 17 11.5 28.5T480-600Zm0 520q-83 0-156-31.5T197-197q-54-54-85.5-127T80-480q0-83 31.5-156T197-763q54-54 127-85.5T480-880q83 0 156 31.5T763-763q54 54 85.5 127T880-480q0 83-31.5 156T763-197q-54 54-127 85.5T480-80Zm0-80q134 0 227-93t93-227q0-134-93-227t-227-93q-134 0-227 93t-93 227q0 134 93 227t227 93Zm0-320Z" />
                                    </svg>
                                </button>
                            </div>
                            <div class="flex flex-col gap-1 items-center justify-center font-semibold">
                                <label>Rata-Rata Waktu Konsultasi</label>
                                <label>0 m 0 s</label>
                                <label class="flex items-center px-2 bg-green-300 rounded-lg space-x-2">
                                    <svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 -960 960 960"
                                        width="24px" fill="#EA3323" class="">
                                        <path
                                            d="M640-240v-80h104L536-526 376-366 80-664l56-56 240 240 160-160 264 264v-104h80v240H640Z" />
                                    </svg>
                                    <span>0%</span>
                                </label>
                                <label class="text-gray-400">dari bulan September</label>
                            </div>
                        </div>
                    </div>

                    <div class="w-full shadow-sm bg-white rounded-lg p-4">
                        <div class="grid grid-cols-1 gap-1">
                            <div class="flex space-x-2 items-center">
                                <svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 -960 960 960"
                                    width="24px" fill="#5985E1">
                                    <path
                                        d="m612-292 56-56-148-148v-184h-80v216l172 172ZM480-80q-83 0-156-31.5T197-197q-54-54-85.5-127T80-480q0-83 31.5-156T197-763q54-54 127-85.5T480-880q83 0 156 31.5T763-763q54 54 85.5 127T880-480q0 83-31.5 156T763-197q-54 54-127 85.5T480-80Zm0-400Zm0 320q133 0 226.5-93.5T800-480q0-133-93.5-226.5T480-800q-133 0-226.5 93.5T160-480q0 133 93.5 226.5T480-160Z" />
                                </svg>

                                <button class="hover:bg-slate-200 hover:rounded-full p-1">
                                    <svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 -960 960 960"
                                        width="24px" fill="#000000">
                                        <path
                                            d="M440-280h80v-240h-80v240Zm40-320q17 0 28.5-11.5T520-640q0-17-11.5-28.5T480-680q-17 0-28.5 11.5T440-640q0 17 11.5 28.5T480-600Zm0 520q-83 0-156-31.5T197-197q-54-54-85.5-127T80-480q0-83 31.5-156T197-763q54-54 127-85.5T480-880q83 0 156 31.5T763-763q54 54 85.5 127T880-480q0 83-31.5 156T763-197q-54 54-127 85.5T480-80Zm0-80q134 0 227-93t93-227q0-134-93-227t-227-93q-134 0-227 93t-93 227q0 134 93 227t227 93Zm0-320Z" />
                                    </svg>
                                </button>
                            </div>
                            <div class="flex flex-col gap-1 items-center justify-center font-semibold">
                                <label>Rata-Rata Waktu Konsultasi</label>
                                <label>0 m 0 s</label>
                                <label class="flex items-center px-2 bg-green-300 rounded-lg space-x-2">
                                    <svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 -960 960 960"
                                        width="24px" fill="#EA3323" class="">
                                        <path
                                            d="M640-240v-80h104L536-526 376-366 80-664l56-56 240 240 160-160 264 264v-104h80v240H640Z" />
                                    </svg>
                                    <span>0%</span>
                                </label>
                                <label class="text-gray-400">dari bulan September</label>
                            </div>
                        </div>
                    </div>

                    <div class="w-full  shadow-sm bg-white rounded-lg p-4">
                        <div class="grid grid-cols-1 gap-1">
                            <div class="flex space-x-2 items-center">
                                <svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 -960 960 960"
                                    width="24px" fill="#5985E1">
                                    <path
                                        d="m612-292 56-56-148-148v-184h-80v216l172 172ZM480-80q-83 0-156-31.5T197-197q-54-54-85.5-127T80-480q0-83 31.5-156T197-763q54-54 127-85.5T480-880q83 0 156 31.5T763-763q54 54 85.5 127T880-480q0 83-31.5 156T763-197q-54 54-127 85.5T480-80Zm0-400Zm0 320q133 0 226.5-93.5T800-480q0-133-93.5-226.5T480-800q-133 0-226.5 93.5T160-480q0 133 93.5 226.5T480-160Z" />
                                </svg>

                                <button class="hover:bg-slate-200 hover:rounded-full p-1">
                                    <svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 -960 960 960"
                                        width="24px" fill="#000000">
                                        <path
                                            d="M440-280h80v-240h-80v240Zm40-320q17 0 28.5-11.5T520-640q0-17-11.5-28.5T480-680q-17 0-28.5 11.5T440-640q0 17 11.5 28.5T480-600Zm0 520q-83 0-156-31.5T197-197q-54-54-85.5-127T80-480q0-83 31.5-156T197-763q54-54 127-85.5T480-880q83 0 156 31.5T763-763q54 54 85.5 127T880-480q0 83-31.5 156T763-197q-54 54-127 85.5T480-80Zm0-80q134 0 227-93t93-227q0-134-93-227t-227-93q-134 0-227 93t-93 227q0 134 93 227t227 93Zm0-320Z" />
                                    </svg>
                                </button>
                            </div>
                            <div class="flex flex-col gap-1 items-center justify-center font-semibold">
                                <label>Rata-Rata Waktu Konsultasi</label>
                                <label>0 m 0 s</label>
                                <label class="flex items-center px-2 bg-green-300 rounded-lg space-x-2">
                                    <svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 -960 960 960"
                                        width="24px" fill="#EA3323" class="">
                                        <path
                                            d="M640-240v-80h104L536-526 376-366 80-664l56-56 240 240 160-160 264 264v-104h80v240H640Z" />
                                    </svg>
                                    <span>0%</span>
                                </label>
                                <label class="text-gray-400">dari bulan September</label>
                            </div>
                        </div>
                    </div>

                    <div class="w-full shadow-sm bg-white rounded-lg p-4">
                        <div class="grid grid-cols-1 gap-1">
                            <div class="flex space-x-2 items-center">
                                <svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 -960 960 960"
                                    width="24px" fill="#5985E1">
                                    <path
                                        d="m612-292 56-56-148-148v-184h-80v216l172 172ZM480-80q-83 0-156-31.5T197-197q-54-54-85.5-127T80-480q0-83 31.5-156T197-763q54-54 127-85.5T480-880q83 0 156 31.5T763-763q54 54 85.5 127T880-480q0 83-31.5 156T763-197q-54 54-127 85.5T480-80Zm0-400Zm0 320q133 0 226.5-93.5T800-480q0-133-93.5-226.5T480-800q-133 0-226.5 93.5T160-480q0 133 93.5 226.5T480-160Z" />
                                </svg>

                                <button class="hover:bg-slate-200 hover:rounded-full p-1">
                                    <svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 -960 960 960"
                                        width="24px" fill="#000000">
                                        <path
                                            d="M440-280h80v-240h-80v240Zm40-320q17 0 28.5-11.5T520-640q0-17-11.5-28.5T480-680q-17 0-28.5 11.5T440-640q0 17 11.5 28.5T480-600Zm0 520q-83 0-156-31.5T197-197q-54-54-85.5-127T80-480q0-83 31.5-156T197-763q54-54 127-85.5T480-880q83 0 156 31.5T763-763q54 54 85.5 127T880-480q0 83-31.5 156T763-197q-54 54-127 85.5T480-80Zm0-80q134 0 227-93t93-227q0-134-93-227t-227-93q-134 0-227 93t-93 227q0 134 93 227t227 93Zm0-320Z" />
                                    </svg>
                                </button>
                            </div>
                            <div class="flex flex-col gap-1 items-center justify-center font-semibold">
                                <label>Rata-Rata Waktu Konsultasi</label>
                                <label>0 m 0 s</label>
                                <label class="flex items-center px-2 bg-green-300 rounded-lg space-x-2">
                                    <svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 -960 960 960"
                                        width="24px" fill="#EA3323" class="">
                                        <path
                                            d="M640-240v-80h104L536-526 376-366 80-664l56-56 240 240 160-160 264 264v-104h80v240H640Z" />
                                    </svg>
                                    <span>0%</span>
                                </label>
                                <label class="text-gray-400">dari bulan September</label>
                            </div>
                        </div>
                    </div>
                </div>

                {{-- Card Pasien Antri Cepat --}}
                <div class="mt-5 rounded-lg p-4 flex bg-white">
                    {{-- Header --}}
                    <div class="flex flex-col items-start">
                        <label class="font-bold text-xl">Pasien Antri Cepat</label>
                        <label class="font-light text-md text-gray-400">Last Update</label>
                    </div>

                </div>
                {{-- <h2 class="text-lg font-semibold mb-2">Pasien Baru</h2>
                <p class="text-2xl font-bold">1</p>
                <p class="text-green-500 text-sm">+100% dari bulan lalu</p> --}}
            </div>

        </div>
        {{-- End Content --}}
    </div>

    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script>
        const ctx = document.getElementById('chartKunjungan').getContext('2d');
        new Chart(ctx, {
            type: 'line',
            data: {
                labels: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'],
                datasets: [{
                    label: 'Kunjungan Pasien',
                    data: [0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0],
                    borderColor: 'rgb(59,130,246)',
                    backgroundColor: 'rgba(59,130,246,0.1)',
                    fill: true,
                    tension: 0.3
                }]
            }
        });
    </script>


</x-app-layout>


{{-- <x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    {{ __("You're logged in!") }}
                </div>
            </div>
        </div>
    </div>
</x-app-layout> --}}
