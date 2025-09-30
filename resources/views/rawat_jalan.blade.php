<x-app-layout>
    <div class="p-4 sm:ml-64 lg:p-0 " x-data="{ tabAktivitas: '' }">
        {{-- Start Header --}}
        <div class="w-full sm:px-6 lg:px-0 shadow-md">
            <div class="bg-white dark:bg-gray-800 shadow-sm sm:rounded-lg lg:rounded-none">

                <div class="flex items-center justify-between p-6 w-full">
                    <div class="flex w-full max-w-3xl space-x-4">
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

                        <div x-data="{ openDropdown: false, selected: 'Pendaftaran Baru', openModal: null }" class="inline-flex relative">
                            <!-- Tombol Utama -->
                            <button @click="openModal = selected"
                                class="bg-orange-400 hover:bg-orange-500 text-white font-bold py-2 px-4 rounded-l">
                                <span x-text="selected"></span>
                            </button>

                            <!-- Tombol Panah -->
                            <button @click="openDropdown = !openDropdown"
                                class="bg-orange-400 hover:bg-orange-500 text-white px-3 rounded-r">
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" stroke-width="2"
                                    viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M19 9l-7 7-7-7" />
                                </svg>
                            </button>

                            <!-- Dropdown -->
                            <div x-show="openDropdown" @click.away="openDropdown = false" x-cloak x-transition
                                class="absolute right-0 mt-2 w-40 bg-white border rounded shadow-lg z-10">
                                <a href="#" @click.prevent="selected = 'Pendaftaran Baru'; openDropdown = false"
                                    class="block px-4 py-2 hover:bg-gray-100">Pendaftaran Baru</a>
                                <a href="#" @click.prevent="selected = 'Pasien Baru'; openDropdown = false"
                                    class="block px-4 py-2 hover:bg-gray-100">Pasien Baru</a>
                                <a href="#" @click.prevent="selected = 'Blok Kalender'; openDropdown = false"
                                    class="block px-4 py-2 hover:bg-gray-100">Blok Kalender</a>
                            </div>

                            <!-- Modal Pendaftaran Baru -->
                            <div x-show="openModal === 'Pendaftaran Baru'" x-cloak x-transition
                                class="fixed inset-0 z-50 flex items-center justify-center bg-black bg-opacity-50"
                                x-transition>
                                <div
                                    class="bg-white w-full max-w-6xl rounded-lg shadow-lg overflow-y-auto max-h-[90vh]">
                                    <!-- Header -->
                                    <div class="flex justify-between items-center px-6 pt-6 pb-3 w-full">
                                        <h2 class="text-xl font-semibold text-blue-700">Daftar Kunjungan</h2>
                                        <h2 class="text-lg font-semibold text-yellow-500">Tanda * wajib diisi!</h2>
                                        <button @click="openModal = false"
                                            class="text-red-500 hover:text-red-700 text-xl">&times;</button>
                                    </div>

                                    <div class="px-6 py-3 grid grid-cols-2 col-span-2 gap-4 w-full">
                                        <div class="relative z-0 w-full group">
                                            <input type="email" name="floating_email" id="floating_email"
                                                class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-400 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer"
                                                placeholder=" " required />
                                            <label for="floating_email"
                                                class="peer-focus:font-medium absolute text-md text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 rtl:peer-focus:translate-x-1/4 rtl:peer-focus:left-auto peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Cari
                                                Data Pasien </label>
                                        </div>

                                        <div>
                                            <button class="px-2 py-3 bg-blue-600 rounded-md text-white text-md">Adv.
                                                Search</button>
                                        </div>
                                    </div>

                                    <div class="px-6 py-3 w-full">
                                        <div class="flex flex-col gap-2">
                                            <label class="text-blue-600 text-md">Tipe Pasien</label>
                                            <select class="p-2 rounded-md border-blue-600">
                                                <option selected>Pasien Non Rujuk</option>
                                                <option>Pasien Rujukan</option>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="p-6 grid grid-cols-2 gap-4">
                                        <div class="flex flex-col gap-2">
                                            <label class="text-blue-600 text-md">Penjamin</label>
                                            <select class="p-2 rounded-md border-blue-600 w-full">
                                                <option selected>Penjamin</option>
                                            </select>
                                        </div>

                                        <div class="flex flex-col gap-2">
                                            <label class="text-blue-600 text-md">Metode Pembayaran</label>
                                            <select class="p-2 rounded-md border-blue-600 w-full">
                                                <option selected>Tunai</option>
                                            </select>
                                        </div>

                                        <div class="flex flex-col gap-2">
                                            <label class="text-blue-600 text-md">Jenis Kunjungan</label>
                                            <select class="p-2 rounded-md border-blue-600 w-full">
                                                <option selected>Kunjungan Sakit</option>
                                                <option>Perawatan</option>
                                            </select>
                                        </div>

                                        <div class="flex flex-col gap-2">
                                            <label class="text-blue-600 text-md">Jenis Perawatan</label>
                                            <select class="p-2 rounded-md border-blue-600 w-full">
                                                <option selected>Rawat Jalan</option>
                                            </select>
                                        </div>

                                        <div class="py-3">
                                            <div class="relative z-0 w-full group">
                                                <input
                                                    class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-400 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer"
                                                    placeholder=" " required />
                                                <label for="floating_email"
                                                    class="peer-focus:font-medium absolute text-md text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 rtl:peer-focus:translate-x-1/4 rtl:peer-focus:left-auto peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Nomor
                                                    HP </label>
                                            </div>
                                        </div>

                                        <div class="py-3">
                                            <div class="relative z-0 w-full group">
                                                <input
                                                    class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-400 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer"
                                                    placeholder=" " required />
                                                <label for="floating_email"
                                                    class="peer-focus:font-medium absolute text-md text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 rtl:peer-focus:translate-x-1/4 rtl:peer-focus:left-auto peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Alamat
                                                    Email</label>

                                                <div class="flex items-center mt-4">
                                                    <input disabled
                                                        class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded-sm focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                                                    <label for="default-checkbox"
                                                        class="ms-2 text-sm font-medium text-gray-200">Nontifikasi
                                                        Email</label>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="flex flex-col gap-2">
                                            <label class="text-blue-600 text-md">Poli</label>
                                            <select class="p-2 rounded-md border-blue-600 w-full">
                                                <option selected>Umum</option>
                                                <option>Gawat Darurat</option>
                                                <option>Kecantikan</option>
                                            </select>
                                        </div>

                                        <div class="flex flex-col gap-2">
                                            <label class="text-red-600 text-md">Tenaga Medis</label>
                                            <select class="p-2 rounded-md border-red-600 w-full">
                                                <option selected></option>
                                            </select>
                                            <label class="text-red-600 text-sm">Anda belum memiliki Dokter, silahkan
                                                lengkapi Informasi Tenaga Medis di Settings</label>
                                        </div>
                                    </div>

                                    <div class="px-6 flex items-center mb-6">
                                        <input id="default-checkbox" type="checkbox" value=""
                                            class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded-sm focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                                        <label for="default-checkbox"
                                            class="ms-2 text-sm font-medium text-gray-900 dark:text-gray-300">Nomor
                                            Antrean</label>
                                    </div>

                                    <div class="px-6 grid grid-cols-2 gap-4">
                                        <div class="flex flex-col gap-2 text-gray-400">
                                            <label class="text-md">Tanggal</label>
                                            <input type="date" class="p-2 rounded-md border-b w-full"></input>
                                            <label>Dokter praktek hari ini</label>
                                        </div>

                                        <div class="flex flex-col gap-2 text-gray-400">
                                            <label class="text-md">Slot</label>
                                            <select disabled class="p-2 rounded-md border-blue-600 w-full">
                                                <option selected></option>
                                            </select>
                                            <label>Pilih slot jadwal dokter</label>
                                        </div>

                                        <div class="flex flex-col gap-2 text-gray-400">
                                            <label class="text-md">Jam</label>
                                            <input type="time" class="p-2 rounded-md border-b w-full"></input>
                                            <label>Harus diisi</label>
                                        </div>

                                        <div class="flex flex-col gap-2 text-gray-400 pb-3">
                                            <label class="text-md">Lama Diskusi</label>
                                            <!-- Input dengan satuan -->
                                            <div
                                                class="flex items-center border-b border-gray-300 focus-within:border-blue-500">
                                                <input disabled type="number" value="0"
                                                    class="flex-1 appearance-none bg-transparent border-none focus:outline-none text-gray-700 py-2 text-sm">
                                                <span class="text-gray-600 text-sm">menit</span>
                                            </div>
                                            <!-- Keterangan -->
                                            <p class="text-xs text-gray-400 mt-1">Maks. Menit</p>
                                        </div>

                                        <div class="pb-8">
                                            <button class="text-blue-500 hover:text-blue-400 text-md">+ Rencana
                                                Tindakan</button>
                                        </div>
                                    </div>

                                    <div class="py-4 px-6">
                                        <div class="relative z-0 w-full group">
                                            <input type="email" name="floating_email" id="floating_email"
                                                class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-400 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer"
                                                placeholder=" " required />
                                            <label for="floating_email"
                                                class="peer-focus:font-medium absolute text-md text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 rtl:peer-focus:translate-x-1/4 rtl:peer-focus:left-auto peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Keluhan</label>
                                        </div>
                                    </div>

                                    <div class="py-4 px-6">
                                        <div class="relative z-0 w-full group">
                                            <input type="email" name="floating_email" id="floating_email"
                                                class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-400 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer"
                                                placeholder=" " required />
                                            <label for="floating_email"
                                                class="peer-focus:font-medium absolute text-md text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 rtl:peer-focus:translate-x-1/4 rtl:peer-focus:left-auto peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Prosedur
                                                Rencana</label>
                                        </div>
                                    </div>

                                    <div class="py-4 px-6">
                                        <div class="relative z-0 w-full group">
                                            <input type="email" name="floating_email" id="floating_email"
                                                class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-400 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer"
                                                placeholder=" " required />
                                            <label for="floating_email"
                                                class="peer-focus:font-medium absolute text-md text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 rtl:peer-focus:translate-x-1/4 rtl:peer-focus:left-auto peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Informasi
                                                Kondisi Pasien</label>
                                        </div>
                                    </div>

                                    <!-- Accordion Wrapper -->
                                    <div class="mt-2 space-y-3 px-6">

                                        <!-- Vital Sign -->
                                        <div x-data="{ open: false }" class="border border-blue-600 rounded-lg">
                                            <button @click="open = !open"
                                                class="flex justify-between w-full px-4 py-2 text-left text-blue-600 font-medium">
                                                Vital Sign
                                                <span x-text="open ? '-' : '+'"></span>
                                            </button>
                                            <div x-show="open" x-cloak x-transition
                                                class="px-4 py-3 border-t grid grid-cols-3 gap-4 text-sm">
                                                <div class="flex flex-col gap-2 text-gray-400 py-3">
                                                    <!-- Input dengan satuan -->
                                                    <div
                                                        class="flex items-center border-b border-gray-300 focus-within:border-blue-500">
                                                        <input disabled type="number" value="0"
                                                            class="flex-1 appearance-none bg-transparent border-none focus:outline-none text-gray-700 py-2 text-sm">
                                                        <span class="text-gray-600 text-sm">cm</span>
                                                    </div>
                                                    <!-- Keterangan -->
                                                    <p class="text-xs text-gray-400 mt-1">Tinggi Badan</p>
                                                </div>

                                                <div class="flex flex-col gap-2 text-gray-400 py-3">
                                                    <!-- Input dengan satuan -->
                                                    <div
                                                        class="flex items-center border-b border-gray-300 focus-within:border-blue-500">
                                                        <input disabled type="number" value="0"
                                                            class="flex-1 appearance-none bg-transparent border-none focus:outline-none text-gray-700 py-2 text-sm">
                                                        <span class="text-gray-600 text-sm">kg</span>
                                                    </div>
                                                    <!-- Keterangan -->
                                                    <p class="text-xs text-gray-400 mt-1">Berat Badan</p>
                                                </div>

                                                <div class="flex flex-col gap-2 text-gray-400 py-3">
                                                    <!-- Input dengan satuan -->
                                                    <div
                                                        class="flex items-center border-b border-gray-300 focus-within:border-blue-500">
                                                        <input disabled type="number" value="0"
                                                            class="flex-1 appearance-none bg-transparent border-none focus:outline-none text-gray-700 py-2 text-sm">
                                                        <span class="text-gray-600 text-sm">°C</span>
                                                    </div>
                                                    <!-- Keterangan -->
                                                    <p class="text-xs text-gray-400 mt-1">Suhu</p>
                                                </div>

                                                <div class="flex flex-col gap-2 text-gray-400 py-3">
                                                    <!-- Input dengan satuan -->
                                                    <div
                                                        class="flex items-center border-b border-gray-300 focus-within:border-blue-500">
                                                        <input disabled type="number" value="0"
                                                            class="flex-1 appearance-none bg-transparent border-none focus:outline-none text-gray-700 py-2 text-sm">
                                                        <span class="text-gray-600 text-sm">bpm</span>
                                                    </div>
                                                    <!-- Keterangan -->
                                                    <p class="text-xs text-gray-400 mt-1">Denyut Jantung</p>
                                                </div>

                                                <div class="flex flex-col gap-2 text-gray-400 py-3">
                                                    <!-- Input dengan satuan -->
                                                    <div
                                                        class="flex items-center border-b border-gray-300 focus-within:border-blue-500">
                                                        <input disabled type="number" value="0"
                                                            class="flex-1 appearance-none bg-transparent border-none focus:outline-none text-gray-700 py-2 text-sm">
                                                        <span class="text-gray-600 text-sm">rpm</span>
                                                    </div>
                                                    <!-- Keterangan -->
                                                    <p class="text-xs text-gray-400 mt-1">Frekuensi Pernapasan</p>
                                                </div>

                                                <div class="flex flex-col gap-2 text-gray-400 py-3">
                                                    <!-- Input dengan satuan -->
                                                    <div
                                                        class="flex items-center border-b border-gray-300 focus-within:border-blue-500">
                                                        <input disabled type="number" value="0"
                                                            class="flex-1 appearance-none bg-transparent border-none focus:outline-none text-gray-700 py-2 text-sm">
                                                        <span class="text-gray-600 text-sm">mmHg</span>
                                                    </div>
                                                    <!-- Keterangan -->
                                                    <p class="text-xs text-gray-400 mt-1">Sistolik</p>
                                                </div>

                                                <div class="flex flex-col gap-2 text-gray-400 py-3">
                                                    <!-- Input dengan satuan -->
                                                    <div
                                                        class="flex items-center border-b border-gray-300 focus-within:border-blue-500">
                                                        <input disabled type="number" value="0"
                                                            class="flex-1 appearance-none bg-transparent border-none focus:outline-none text-gray-700 py-2 text-sm">
                                                        <span class="text-gray-600 text-sm">mmHg</span>
                                                    </div>
                                                    <!-- Keterangan -->
                                                    <p class="text-xs text-gray-400 mt-1">Diastolik</p>
                                                </div>

                                                <div class="flex flex-col gap-2 text-gray-400 py-3">
                                                    <!-- Input dengan satuan -->
                                                    <div
                                                        class="flex items-center border-b border-gray-300 focus-within:border-blue-500">
                                                        <input disabled type="number" value="0"
                                                            class="flex-1 appearance-none bg-transparent border-none focus:outline-none text-gray-700 py-2 text-sm">
                                                        <span class="text-gray-600 text-sm">cm</span>
                                                    </div>
                                                    <!-- Keterangan -->
                                                    <p class="text-xs text-gray-400 mt-1">Lingkar Perut</p>
                                                </div>

                                                <div class="flex flex-col gap-2 text-gray-400 py-3">
                                                    <!-- Input dengan satuan -->
                                                    <div
                                                        class="flex items-center border-b border-gray-300 focus-within:border-blue-500">
                                                        <input disabled type="number" value="0"
                                                            class="flex-1 appearance-none bg-transparent border-none focus:outline-none text-gray-700 py-2 text-sm">
                                                        <span class="text-gray-600 text-sm">mg/dL</span>
                                                    </div>
                                                    <!-- Keterangan -->
                                                    <p class="text-xs text-gray-400 mt-1">Gula Darah</p>
                                                </div>

                                                <div class="flex flex-col gap-2 text-gray-400 py-3">
                                                    <!-- Input dengan satuan -->
                                                    <div
                                                        class="flex items-center border-b border-gray-300 focus-within:border-blue-500">
                                                        <input disabled type="number" value="0"
                                                            class="flex-1 appearance-none bg-transparent border-none focus:outline-none text-gray-700 py-2 text-sm">
                                                        <span class="text-gray-600 text-sm">SPO2</span>
                                                    </div>
                                                    <!-- Keterangan -->
                                                    <p class="text-xs text-gray-400 mt-1">Saturasi Oksigen</p>
                                                </div>

                                            </div>
                                        </div>

                                        <!-- Identitas Pengantar -->
                                        <div x-data="{ open: false }" class="border border-blue-600 rounded-lg">
                                            <button @click="open = !open"
                                                class="flex justify-between w-full px-4 py-2 text-left text-blue-600 font-medium">
                                                Identitas Pengantar
                                                <span x-text="open ? '-' : '+'"></span>
                                            </button>
                                            <div x-show="open" x-cloak x-transition
                                                class="px-4 py-3 border-t grid grid-cols-2 gap-4 text-sm">
                                                <div class="pt-4">
                                                    <div class="relative z-0 w-full group">
                                                        <input type="email" name="floating_email"
                                                            id="floating_email"
                                                            class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-400 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer"
                                                            placeholder=" " required />
                                                        <label for="floating_email"
                                                            class="peer-focus:font-medium absolute text-md text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 rtl:peer-focus:translate-x-1/4 rtl:peer-focus:left-auto peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Nama
                                                            Lengkap</label>
                                                    </div>
                                                </div>

                                                <div class="pt-4">
                                                    <div class="relative z-0 w-full group">
                                                        <input type="email" name="floating_email"
                                                            id="floating_email"
                                                            class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-400 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer"
                                                            placeholder=" " required />
                                                        <label for="floating_email"
                                                            class="peer-focus:font-medium absolute text-md text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 rtl:peer-focus:translate-x-1/4 rtl:peer-focus:left-auto peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Hubungan
                                                            Antar Pasien</label>
                                                    </div>
                                                </div>

                                                <div class="py-4">
                                                    <div class="relative z-0 w-full group">
                                                        <input type="email" name="floating_email"
                                                            id="floating_email"
                                                            class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-400 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer"
                                                            placeholder=" " required />
                                                        <label for="floating_email"
                                                            class="peer-focus:font-medium absolute text-md text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 rtl:peer-focus:translate-x-1/4 rtl:peer-focus:left-auto peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Alamat</label>
                                                    </div>
                                                </div>

                                                <div class="py-4">
                                                    <div class="relative z-0 w-full group">
                                                        <input type="email" name="floating_email"
                                                            id="floating_email"
                                                            class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-400 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer"
                                                            placeholder=" " required />
                                                        <label for="floating_email"
                                                            class="peer-focus:font-medium absolute text-md text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 rtl:peer-focus:translate-x-1/4 rtl:peer-focus:left-auto peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">No
                                                            Hp</label>
                                                    </div>
                                                </div>

                                            </div>
                                        </div>

                                        <!-- Riwayat Alergi -->
                                        <div x-data="alergiApp()" class="border border-blue-600 rounded-lg">
                                            <button @click="open = !open"
                                                class="flex justify-between w-full px-4 py-2 text-left text-blue-600 font-medium">
                                                Riwayat Alergi
                                                <span x-text="open ? '-' : '+'"></span>
                                            </button>

                                            <div x-show="open" x-cloak x-transition
                                                class="px-4 py-3 border-t space-y-3 text-sm">

                                                <!-- Input pencarian alergi -->
                                                <div class="w-full">
                                                    <label class="block text-sm text-blue-600 mb-1">
                                                        Riwayat Alergi
                                                    </label>

                                                    <div class="relative">
                                                        <!-- Icon Search -->
                                                        <span
                                                            class="absolute inset-y-0 left-0 flex items-center pl-2 text-gray-500">
                                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5"
                                                                fill="none" viewBox="0 0 24 24"
                                                                stroke="currentColor">
                                                                <path stroke-linecap="round" stroke-linejoin="round"
                                                                    stroke-width="2"
                                                                    d="M21 21l-4.35-4.35M10 18a8 8 0 100-16 8 8 0 000 16z" />
                                                            </svg>
                                                        </span>

                                                        <!-- Input Cari -->
                                                        <input type="text" x-model="search"
                                                            placeholder="Cari nama alergi"
                                                            class="w-full border-b border-gray-400 pl-8 pr-2 py-1 text-gray-700 focus:outline-none focus:border-blue-500 rounded-md" />

                                                        <!-- Dropdown hasil pencarian -->
                                                        <div class="absolute w-full bg-white border border-gray-200 mt-1 rounded-lg shadow z-10"
                                                            x-show="filteredList().length > 0 && search.length > 0"
                                                            @click.away="search=''">
                                                            <template x-for="item in filteredList()"
                                                                :key="item">
                                                                <div class="px-3 py-2 hover:bg-gray-100 cursor-pointer"
                                                                    @click="selectAlergi(item)">
                                                                    <span x-text="item"></span>
                                                                </div>
                                                            </template>
                                                        </div>
                                                    </div>

                                                    <p class="mt-1 text-xs text-gray-500">Cari nama alergi</p>
                                                </div>

                                                <!-- Chips -->
                                                <div class="flex items-center flex-wrap gap-2">
                                                    <template x-for="(item, index) in selected" :key="index">
                                                        <div
                                                            class="flex items-center bg-gray-200 px-3 py-1 rounded-full text-sm">
                                                            <span x-text="item"></span>
                                                            <button class="ml-2 text-gray-600 hover:text-red-500"
                                                                @click="remove(index)">✕</button>
                                                        </div>
                                                    </template>
                                                    <button
                                                        class="bg-gray-200 px-3 py-1 rounded-full text-sm text-gray-600 hover:bg-gray-300 ">+
                                                        Add</button>
                                                </div>
                                                <label class="block text-sm text-gray-600 mb-1">Ketik nama
                                                    alergi</label>

                                                <div class="pt-4">
                                                    <div class="relative z-0 w-full group">
                                                        <input type="email" name="floating_email"
                                                            id="floating_email"
                                                            class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-400 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer"
                                                            placeholder=" " required />
                                                        <label for="floating_email"
                                                            class="peer-focus:font-medium absolute text-md text-blue-600 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 rtl:peer-focus:translate-x-1/4 rtl:peer-focus:left-auto peer-focus:text-blue-800 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Riwayat
                                                            Penyakit Pasien</label>
                                                    </div>
                                                    <!-- Keterangan -->
                                                    <p class="text-xs text-gray-400 mt-1">Masukkan nilai yang
                                                        dipisahkan koma. Contoh pengisian dua penyakit: Diabetes, Asma
                                                    </p>
                                                </div>

                                                <div class="pt-4">
                                                    <div class="relative z-0 w-full group">
                                                        <input type="email" name="floating_email"
                                                            id="floating_email"
                                                            class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-400 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer"
                                                            placeholder=" " required />
                                                        <label for="floating_email"
                                                            class="peer-focus:font-medium absolute text-md text-blue-600 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 rtl:peer-focus:translate-x-1/4 rtl:peer-focus:left-auto peer-focus:text-blue-800 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Riwayat
                                                            Penyakit Keluarga</label>
                                                    </div>
                                                    <!-- Keterangan -->
                                                    <p class="text-xs text-gray-400 mt-1">Masukkan nilai yang
                                                        dipisahkan koma. Contoh pengisian dua penyakit: Diabetes, Asma
                                                    </p>
                                                </div>

                                                <div class="py-4">
                                                    <div class="relative z-0 w-full group">
                                                        <input type="email" name="floating_email"
                                                            id="floating_email"
                                                            class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-400 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer"
                                                            placeholder=" " required />
                                                        <label for="floating_email"
                                                            class="peer-focus:font-medium absolute text-md text-blue-600 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 rtl:peer-focus:translate-x-1/4 rtl:peer-focus:left-auto peer-focus:text-blue-800 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Riwayat
                                                            Penggunaan Obat</label>
                                                    </div>
                                                    <!-- Keterangan -->
                                                    <p class="text-xs text-gray-400 mt-1">Masukkan nilai yang
                                                        dipisahkan koma. Contoh pengisian dua penyakit: Diabetes, Asma
                                                    </p>
                                                </div>
                                            </div>
                                        </div>

                                        <script>
                                            function alergiApp() {
                                                return {
                                                    open: false,
                                                    search: '',
                                                    alergiList: ["Rumput bermuda", "Debu", "Susu sapi", "Kacang tanah", "Udang"],
                                                    selected: [],
                                                    inputAlergi: '',

                                                    filteredList() {
                                                        return this.alergiList.filter(a =>
                                                            a.toLowerCase().includes(this.search.toLowerCase())
                                                        );
                                                    },

                                                    selectAlergi(item) {
                                                        if (!this.selected.includes(item)) {
                                                            this.selected.push(item);
                                                        }
                                                        this.inputAlergi = item; // isi input bawah
                                                        this.search = '';
                                                    },

                                                    remove(index) {
                                                        this.selected.splice(index, 1);
                                                    }
                                                }
                                            }
                                        </script>

                                        <!-- Psikososial - Spiritual -->
                                        <div x-data="{ open: false }" class="border border-blue-600 rounded-lg">
                                            <button @click="open = !open"
                                                class="flex justify-between w-full px-4 py-2 text-left text-blue-600 font-medium">
                                                Psikososial - Spiritual
                                                <span x-text="open ? '-' : '+'"></span>
                                            </button>
                                            <div x-show="open" x-cloak x-transition
                                                class="px-4 py-3 border-t space-y-5 text-sm">

                                                <!-- Kondisi Psikologis -->
                                                <div>
                                                    <div class="grid grid-cols-[1fr_3fr] gap-2">
                                                        <!-- Label -->
                                                        <span
                                                            class="whitespace-nowrap font-medium text-blue-400">Kondisi
                                                            Psikologis
                                                            :</span>

                                                        <!-- Opsi + Helper -->
                                                        <div>
                                                            <!-- Checkbox list -->
                                                            <div class="flex flex-wrap gap-4">
                                                                <label class="flex items-center gap-1"><input
                                                                        type="checkbox"> Normal</label>
                                                                <label class="flex items-center gap-1"><input
                                                                        type="checkbox"> Tidak Semangat</label>
                                                                <label class="flex items-center gap-1"><input
                                                                        type="checkbox"> Merasa Bersalah</label>
                                                                <label class="flex items-center gap-1"><input
                                                                        type="checkbox"> Sulit Konsentrasi</label>
                                                                <label class="flex items-center gap-1"><input
                                                                        type="checkbox"> Sulit Tidur</label>
                                                                <label class="flex items-center gap-1"><input
                                                                        type="checkbox"> Cemas</label>
                                                                <label class="flex items-center gap-1"><input
                                                                        type="checkbox"> Sulit Berbicara</label>
                                                                <label class="flex items-center gap-1"><input
                                                                        type="checkbox"> Cepat Lelah</label>
                                                                <label class="flex items-center gap-1"><input
                                                                        type="checkbox"> Depresi</label>
                                                                <label class="flex items-center gap-1"><input
                                                                        type="checkbox"> Rasa Tertekan</label>
                                                            </div>

                                                            <!-- Helper text -->
                                                            <p class="text-xs text-gray-500 mt-3">Bisa Memilih Lebih
                                                                dari Satu Opsi</p>
                                                        </div>
                                                    </div>
                                                </div>


                                                <!-- Status Menikah -->
                                                <div>
                                                    <div class="grid grid-cols-[1fr_3fr] gap-2">
                                                        <!-- Label -->
                                                        <span
                                                            class="whitespace-nowrap font-medium text-blue-400">Kondisi
                                                            Sosial & Ekonomi Status Menikah :</span>

                                                        <!-- Opsi + Helper -->
                                                        <div>
                                                            <!-- Checkbox list -->
                                                            <div class="flex flex-wrap gap-4">
                                                                <label class="flex items-center gap-1"><input
                                                                        type="checkbox"> Menikah</label>
                                                                <label class="flex items-center gap-1"><input
                                                                        type="checkbox"> Belum Menikah</label>
                                                                <label class="flex items-center gap-1"><input
                                                                        type="checkbox"> Janda/Duda</label>
                                                            </div>

                                                            <!-- Helper text -->
                                                            <p class="text-xs text-gray-500 mt-3">Pilih Satu Opsi</p>
                                                        </div>
                                                    </div>
                                                </div>

                                                <!-- Tinggal Dengan -->
                                                <div>
                                                    <div class="grid grid-cols-[1fr_3fr] gap-2">
                                                        <!-- Label -->
                                                        <span
                                                            class="whitespace-nowrap font-medium text-blue-400">Tinggal
                                                            Dengan :</span>

                                                        <!-- Opsi + Helper -->
                                                        <div>
                                                            <!-- Checkbox list -->
                                                            <div class="flex flex-wrap gap-4">
                                                                <label class="flex items-center gap-1"><input
                                                                        type="checkbox"> Sendiri</label>
                                                                <label class="flex items-center gap-1"><input
                                                                        type="checkbox"> Orang Tua</label>
                                                                <label class="flex items-center gap-1"><input
                                                                        type="checkbox"> Suami/Istri</label>
                                                                <label class="flex items-center gap-1"><input
                                                                        type="checkbox"> Lainnya</label>
                                                            </div>

                                                            <!-- Helper text -->
                                                            <p class="text-xs text-gray-500 mt-3">Pilih Satu Opsi</p>
                                                        </div>
                                                    </div>
                                                </div>

                                                <!-- Pekerjaan -->
                                                <div>
                                                    <div class="grid grid-cols-[1fr_3fr] gap-2">
                                                        <!-- Label -->
                                                        <span
                                                            class="whitespace-nowrap font-medium text-blue-400">Pekerjaan
                                                            :</span>

                                                        <!-- Opsi + Helper -->
                                                        <div>
                                                            <!-- Checkbox list -->
                                                            <div class="flex flex-wrap gap-4">
                                                                <label class="flex items-center gap-1"><input
                                                                        type="checkbox"> Wiraswasta</label>
                                                                <label class="flex items-center gap-1"><input
                                                                        type="checkbox"> Swasta</label>
                                                                <label class="flex items-center gap-1"><input
                                                                        type="checkbox"> PNS/TNI/POLRI</label>
                                                                <label class="flex items-center gap-1"><input
                                                                        type="checkbox"> Lainnya</label>
                                                            </div>

                                                            <!-- Helper text -->
                                                            <p class="text-xs text-gray-500 mt-3">Pilih Satu Opsi</p>
                                                        </div>
                                                    </div>
                                                </div>

                                                <!-- Status Spiritual -->
                                                <div>
                                                    <label class="block font-medium mb-1 text-blue-400">Status
                                                        Spiritual</label>
                                                </div>

                                                <!-- Kegiatan Keagamaan -->
                                                <div class="pt-4">
                                                    <div class="relative z-0 w-full group">
                                                        <input type="email" name="floating_email"
                                                            id="floating_email"
                                                            class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-400 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer"
                                                            placeholder=" " required />
                                                        <label for="floating_email"
                                                            class="peer-focus:font-medium absolute text-md text-blue-600 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 rtl:peer-focus:translate-x-1/4 rtl:peer-focus:left-auto peer-focus:text-blue-800 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Kegiatan
                                                            Keagamaan yang Biasa Dilakukan</label>
                                                    </div>
                                                </div>

                                                <!-- Kegiatan Spiritual Selama Perawatan -->
                                                <div class="py-4">
                                                    <div class="relative z-0 w-full group">
                                                        <input type="email" name="floating_email"
                                                            id="floating_email"
                                                            class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-400 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer"
                                                            placeholder=" " required />
                                                        <label for="floating_email"
                                                            class="peer-focus:font-medium absolute text-md text-blue-600 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 rtl:peer-focus:translate-x-1/4 rtl:peer-focus:left-auto peer-focus:text-blue-800 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Kegiatan
                                                            Spiritual yang Dibutuhkan Selama Perawatan</label>
                                                    </div>
                                                </div>

                                            </div>
                                        </div>
                                    </div>

                                    <!-- Action Buttons -->
                                    <div class="flex justify-end gap-3 p-6">
                                        <button @click="openModal = false"
                                            class="px-4 py-2 bg-gray-200 rounded hover:bg-gray-300">BATAL</button>
                                        <button
                                            class="px-4 py-2 bg-red-500 text-white rounded hover:bg-red-600">SIMPAN</button>
                                    </div>
                                </div>
                            </div>

                            <!-- Modal Pasien Baru -->
                            <div x-show="openModal === 'Pasien Baru'" x-cloak x-transition
                                class="fixed inset-0 z-50 flex items-center justify-center bg-black bg-opacity-50"
                                x-transition>

                                <div
                                    class="bg-white w-full max-w-7xl rounded-lg shadow-lg overflow-y-auto max-h-[90vh]">
                                    <form action="#" method="POST" enctype="multipart/form-data">
                                        @csrf
                                        <!-- Header -->
                                        <div
                                            class="relative flex items-center justify-center px-6 py-3 w-full border-b">
                                            <!-- Judul -->
                                            <h2 class="text-3xl font-semibold text-blue-700">Tambah Pasien Baru</h2>

                                            <!-- Tombol X -->
                                            <button @click="openModal = false"
                                                class="absolute right-6 text-red-500 hover:text-red-700 text-2xl">
                                                &times;
                                            </button>
                                        </div>

                                        <div class="max-w-5xl mx-auto px-4 py-2 my-2">
                                            <div class="w-full bg-blue-500 flex items-start px-4">
                                                <label class="text-white text-2xl">Informasi Dasar</label>
                                            </div>

                                            <div x-data="imageUploader()"
                                                class="my-4 grid grid-cols-3 items-center gap-8">
                                                <!-- Upload / Preview Foto -->
                                                <div class="flex items-center justify-center w-full">
                                                    <template x-if="!preview">
                                                        <!-- Tampilan Awal (sebelum upload) -->
                                                        <label for="dropzone-file"
                                                            class="flex flex-col items-center justify-center w-full h-64 border-2 border-gray-300 border-dashed 
                       rounded-lg cursor-pointer bg-gray-50 dark:hover:bg-gray-800 dark:bg-gray-700 
                       hover:bg-gray-100 dark:border-gray-600 dark:hover:border-gray-500">
                                                            <div
                                                                class="flex flex-col items-center justify-center pt-5 pb-6">
                                                                <svg class="w-8 h-8 mb-4 text-gray-500 dark:text-gray-400"
                                                                    aria-hidden="true"
                                                                    xmlns="http://www.w3.org/2000/svg" fill="none"
                                                                    viewBox="0 0 20 16">
                                                                    <path stroke="currentColor" stroke-linecap="round"
                                                                        stroke-linejoin="round" stroke-width="2" d="M13 13h3a3 3 0 0 0 0-6h-.025A5.56 5.56 0 0 0 16 6.5
                               5.5 5.5 0 0 0 5.207 5.021C5.137 5.017
                               5.071 5 5 5a4 4 0 0 0 0 8h2.167M10 15V6m0
                               0L8 8m2-2 2 2" />
                                                                </svg>
                                                                <p
                                                                    class="mb-2 text-sm text-gray-500 dark:text-gray-400">
                                                                    <span class="font-semibold">Click to upload</span>
                                                                    or drag and drop
                                                                </p>
                                                                <p class="text-xs text-gray-500 dark:text-gray-400">
                                                                    SVG, PNG, JPG or GIF (MAX. 800x400px)</p>
                                                            </div>
                                                            <input id="dropzone-file" type="file" class="hidden"
                                                                name="foto_pasien" @change="previewImage"
                                                                accept="image/*" />
                                                        </label>
                                                    </template>

                                                    <!-- Preview Foto setelah upload -->
                                                    <template x-if="preview">
                                                        <div class="relative w-full h-64">
                                                            <img :src="preview" alt="Uploaded Image"
                                                                class="w-full h-full rounded-lg border object-cover object-center" />

                                                            <!-- Tombol hapus -->
                                                            <button type="button" @click="removeImage"
                                                                class="absolute top-2 right-2 bg-red-500 hover:bg-red-600 
                       text-white text-xs px-3 py-1 rounded shadow">
                                                                Hapus
                                                            </button>
                                                        </div>
                                                    </template>
                                                </div>

                                                <!-- Info tambahan -->
                                                <h2 class="text-lg font-semibold text-yellow-500">Tanda * wajib diisi!
                                                </h2>
                                                <h2 class="text-lg font-semibold text-gray-500">Nomor RM terakhir yang
                                                    dimasukan 12345</h2>
                                            </div>

                                            <script>
                                                function imageUploader() {
                                                    return {
                                                        preview: null,
                                                        previewImage(event) {
                                                            const file = event.target.files[0];
                                                            if (file) {
                                                                const reader = new FileReader();
                                                                reader.onload = e => {
                                                                    this.preview = e.target.result;
                                                                };
                                                                reader.readAsDataURL(file);
                                                            }
                                                        },
                                                        removeImage() {
                                                            this.preview = null;
                                                            document.getElementById('dropzone-file').value = "";
                                                        }
                                                    }
                                                }
                                            </script>


                                            <div class="grid grid-cols-2 gap-8 my-6">
                                                <div class="relative z-0 w-full group">
                                                    <input type="text" name="nama_lengkap"
                                                        class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-400 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer"
                                                        placeholder=" " required />
                                                    <label
                                                        class="peer-focus:font-medium absolute text-md text-blue-600 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 rtl:peer-focus:translate-x-1/4 rtl:peer-focus:left-auto peer-focus:text-blue-800 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Nama
                                                        Lengkap</label>
                                                </div>

                                                <div class="relative z-0 w-full group">
                                                    <input type="text" name="nomor_medical_record"
                                                        class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-400 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer"
                                                        placeholder=" " required />
                                                    <label
                                                        class="peer-focus:font-medium absolute text-md text-blue-600 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 rtl:peer-focus:translate-x-1/4 rtl:peer-focus:left-auto peer-focus:text-blue-800 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Nomor
                                                        Medical Record</label>
                                                </div>
                                            </div>

                                            <div class="grid grid-cols-3 gap-x-8 gap-y-4 my-6">
                                                <!-- Kota Tempat Lahir -->
                                                <div class="relative z-0 w-full group">
                                                    <input type="text" name="kota_tempat_lahir"
                                                        class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 
                   border-gray-300 appearance-none dark:text-white dark:border-gray-400 
                   dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer"
                                                        placeholder=" " required />
                                                    <label
                                                        class="peer-focus:font-medium absolute text-md text-blue-600 dark:text-gray-400 duration-300 
                   transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] 
                   peer-focus:start-0 peer-focus:text-blue-800 peer-focus:dark:text-blue-500 
                   peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 
                   peer-focus:scale-75 peer-focus:-translate-y-6">
                                                        Kota Tempat Lahir
                                                    </label>
                                                </div>

                                                <!-- Tanggal Lahir -->
                                                <div class="relative z-0 w-full group">
                                                    <input type="date" name="tanggal_lahir"
                                                        class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 
                   border-gray-300 appearance-none dark:text-white dark:border-gray-400 
                   dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer"
                                                        placeholder=" " required />
                                                    <label
                                                        class="peer-focus:font-medium absolute text-md text-blue-600 dark:text-gray-400 duration-300 
                   transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] 
                   peer-focus:start-0 peer-focus:text-blue-800 peer-focus:dark:text-blue-500 
                   peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 
                   peer-focus:scale-75 peer-focus:-translate-y-6">
                                                        Tanggal Lahir
                                                    </label>
                                                </div>

                                                <!-- Nomor KTP -->
                                                <div class="relative z-0 w-full group">
                                                    <input type="text" name="nomor_ktp"
                                                        class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 
                   border-gray-300 appearance-none dark:text-white dark:border-gray-400 
                   dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer"
                                                        placeholder=" " required />
                                                    <label
                                                        class="peer-focus:font-medium absolute text-md text-blue-600 dark:text-gray-400 duration-300 
                   transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] 
                   peer-focus:start-0 peer-focus:text-blue-800 peer-focus:dark:text-blue-500 
                   peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 
                   peer-focus:scale-75 peer-focus:-translate-y-6">
                                                        Nomor KTP
                                                    </label>
                                                </div>

                                                <!-- Jenis Kelamin -->
                                                <div class="flex flex-col gap-1">
                                                    <label
                                                        class="text-sm font-medium text-blue-600 dark:text-white">Jenis
                                                        Kelamin</label>
                                                    <select name="jenis_kelamin"
                                                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg 
                   focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 
                   dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white 
                   dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                                        <option selected>Laki-laki</option>
                                                        <option>Perempuan</option>
                                                    </select>
                                                </div>

                                                <!-- Agama -->
                                                <div class="flex flex-col gap-1">
                                                    <label
                                                        class="text-sm font-medium text-blue-600 dark:text-white">Agama</label>
                                                    <select name="agama"
                                                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg 
                   focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 
                   dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white 
                   dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                                        <option selected>Tidak Tahu</option>
                                                        <option>Islam</option>
                                                        <option>Katholik</option>
                                                        <option>Protestan</option>
                                                        <option>Kristen</option>
                                                        <option>Hindu</option>
                                                        <option>Buddha</option>
                                                        <option>Konghucu</option>
                                                    </select>
                                                </div>

                                                <!-- Status -->
                                                <div class="flex flex-col gap-1">
                                                    <label
                                                        class="text-sm font-medium text-blue-600 dark:text-white">Status</label>
                                                    <select name="status"
                                                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg 
                   focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 
                   dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white 
                   dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                                        <option>Menikah</option>
                                                        <option>Belum Menikah</option>
                                                        <option>Cerai Hidup</option>
                                                        <option>Cerai Mati</option>
                                                        <option selected>Lainnya</option>
                                                    </select>
                                                </div>

                                                <!-- Golongan Darah -->
                                                <div class="flex flex-col gap-1">
                                                    <label
                                                        class="text-sm font-medium text-blue-600 dark:text-white">Golongan
                                                        Darah</label>
                                                    <select name="golongan_darah"
                                                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg 
                   focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 
                   dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white 
                   dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                                        <option selected>A</option>
                                                        <option>B</option>
                                                        <option>AB</option>
                                                        <option>O</option>
                                                    </select>
                                                </div>

                                                <!-- Pendidikan Terakhir -->
                                                <div class="flex flex-col gap-1">
                                                    <label
                                                        class="text-sm font-medium text-blue-600 dark:text-white">Pendidikan
                                                        Terakhir</label>
                                                    <select name="pendidikan_terakhir"
                                                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg 
                   focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 
                   dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white 
                   dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                                        <option selected>SD</option>
                                                        <option>SMP</option>
                                                        <option>SMA/SMK</option>
                                                        <option>D3</option>
                                                        <option>S1</option>
                                                        <option>S2</option>
                                                        <option>S3</option>
                                                    </select>
                                                </div>

                                                <!-- Pekerjaan (duplikat, kalau memang ada 2) -->
                                                <div class="flex flex-col gap-1">
                                                    <label
                                                        class="text-sm font-medium text-blue-600 dark:text-white">Pekerjaan</label>
                                                    <select name="pekerjaan"
                                                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg 
                   focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 
                   dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white 
                   dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                                        <option>Guru</option>
                                                        <option>PNS</option>
                                                        <option selected>Lainnya</option>
                                                    </select>
                                                </div>
                                            </div>


                                            <div class="grid grid-cols-2 gap-6 my-6">
                                                <!-- Nomor Telepon -->
                                                <div class="relative z-0 w-full group">
                                                    <input type="tel" name="nomor_hp" id="phone"
                                                        pattern="[0-9]{10,15}" maxlength="15"
                                                        class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent 
                      border-0 border-b-2 border-gray-300 appearance-none 
                      dark:text-white dark:border-gray-400 dark:focus:border-blue-500 
                      focus:outline-none focus:ring-0 focus:border-blue-600 peer"
                                                        placeholder=" " required />
                                                    <label for="phone"
                                                        class="peer-focus:font-medium absolute text-md text-blue-600 dark:text-gray-400 
                      duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] 
                      peer-focus:start-0 rtl:peer-focus:translate-x-1/4 rtl:peer-focus:left-auto 
                      peer-focus:text-blue-800 peer-focus:dark:text-blue-500 
                      peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 
                      peer-focus:scale-75 peer-focus:-translate-y-6">
                                                        Nomor Telepon
                                                    </label>
                                                    <p class="mt-1 text-xs text-gray-500">Contoh: 081234567890</p>
                                                </div>

                                                <!-- Email -->
                                                <div class="relative z-0 w-full group">
                                                    <input type="email" name="email" id="email"
                                                        class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent 
                      border-0 border-b-2 border-gray-300 appearance-none 
                      dark:text-white dark:border-gray-400 dark:focus:border-blue-500 
                      focus:outline-none focus:ring-0 focus:border-blue-600 peer"
                                                        placeholder=" " required />
                                                    <label for="email"
                                                        class="peer-focus:font-medium absolute text-md text-blue-600 dark:text-gray-400 
                      duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] 
                      peer-focus:start-0 rtl:peer-focus:translate-x-1/4 rtl:peer-focus:left-auto 
                      peer-focus:text-blue-800 peer-focus:dark:text-blue-500 
                      peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 
                      peer-focus:scale-75 peer-focus:-translate-y-6">
                                                        Email
                                                    </label>
                                                    <p class="mt-1 text-xs text-gray-500">Gunakan email yang aktif</p>
                                                </div>

                                                <!-- Tanggal Pertama Obat -->
                                                <div class="relative z-0 w-full group">
                                                    <input type="date" name="tanggal_pertama_chat"
                                                        id="first_medicine_date"
                                                        class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent 
                      border-0 border-b-2 border-gray-300 appearance-none 
                      dark:text-white dark:border-gray-400 dark:focus:border-blue-500 
                      focus:outline-none focus:ring-0 focus:border-blue-600 peer"
                                                        placeholder=" " required />
                                                    <label for="first_medicine_date"
                                                        class="peer-focus:font-medium absolute text-md text-blue-600 dark:text-gray-400 
                      duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] 
                      peer-focus:start-0 rtl:peer-focus:translate-x-1/4 rtl:peer-focus:left-auto 
                      peer-focus:text-blue-800 peer-focus:dark:text-blue-500 
                      peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 
                      peer-focus:scale-75 peer-focus:-translate-y-6">
                                                        Tanggal Pertama Chat
                                                    </label>
                                                    <p class="mt-1 text-xs text-gray-500">Pilih tanggal mulai obat
                                                        diberikan</p>
                                                </div>
                                            </div>

                                            <div class="mb-6">
                                                <button class="text-2xl text-blue-600 flex items-center gap-2">
                                                    <svg xmlns="http://www.w3.org/2000/svg" height="24px"
                                                        viewBox="0 -960 960 960" width="24px" fill="#0000F5">
                                                        <path
                                                            d="M440-440H200v-80h240v-240h80v240h240v80H520v240h-80v-240Z" />
                                                    </svg>
                                                    <span>TAMBAHKAN TAG</span>
                                                </button>
                                            </div>

                                            <div class="bg-blue-500 px-2 py-3 flex items-center justify-start mb-6">
                                                <label class="text-white text-xl">Metode Pembayaran</label>
                                            </div>

                                            <div class="flex flex-col gap-1 w-1/2">
                                                <label class="text-sm font-medium text-blue-600 dark:text-white">Metode
                                                    Pembayaran</label>
                                                <select name="metode_pembayaran"
                                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg 
                   focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 
                   dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white 
                   dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                                    <option>BPJS Kesehatan</option>
                                                    <option>Cash</option>
                                                    <option>Asuransi</option>
                                                    <option>Perusahaan</option>
                                                    <option selected>Lainnya</option>
                                                </select>
                                            </div>

                                            <div class="my-6">
                                                <button class="text-2xl text-blue-600 flex items-center gap-2">
                                                    <svg xmlns="http://www.w3.org/2000/svg" height="24px"
                                                        viewBox="0 -960 960 960" width="24px" fill="#0000F5">
                                                        <path
                                                            d="M440-440H200v-80h240v-240h80v240h240v80H520v240h-80v-240Z" />
                                                    </svg>
                                                    <span>TAMBAHKAN METODE</span>
                                                </button>
                                            </div>

                                            <div class="bg-blue-500 px-2 py-3 flex items-center justify-start mb-6">
                                                <label class="text-white text-xl">Tempat Tinggal</label>
                                            </div>

                                            <div class="grid grid-cols-[2fr_1fr] gap-6 my-6">
                                                <!-- Alamat Rumah -->
                                                <div class="relative z-0 w-full group">
                                                    <input type="text" name="alamat_rumah"
                                                        class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent 
                      border-0 border-b-2 border-gray-300 appearance-none 
                      dark:text-white dark:border-gray-400 dark:focus:border-blue-500 
                      focus:outline-none focus:ring-0 focus:border-blue-600 peer"
                                                        placeholder=" " required />
                                                    <label
                                                        class="peer-focus:font-medium absolute text-md text-blue-600 dark:text-gray-400 
                      duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] 
                      peer-focus:start-0 peer-focus:text-blue-800 peer-focus:dark:text-blue-500 
                      peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 
                      peer-focus:scale-75 peer-focus:-translate-y-6">
                                                        Alamat Rumah
                                                    </label>
                                                </div>

                                                <!-- Metode Provinsi -->
                                                <div class="relative z-0 w-full group">
                                                    <select name="provinsi"
                                                        class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent 
                       border-0 border-b-2 border-gray-300 appearance-none 
                       dark:text-white dark:border-gray-400 dark:focus:border-blue-500 
                       focus:outline-none focus:ring-0 focus:border-blue-600 peer"
                                                        required>
                                                        <option value="" disabled selected></option>
                                                        <option>BPJS Kesehatan</option>
                                                        <option>Cash</option>
                                                        <option>Asuransi</option>
                                                        <option>Perusahaan</option>
                                                        <option>Lainnya</option>
                                                    </select>
                                                    <label
                                                        class="peer-focus:font-medium absolute text-md text-blue-600 dark:text-gray-400 
                      duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] 
                      peer-focus:start-0 peer-focus:text-blue-800 peer-focus:dark:text-blue-500 
                      peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 
                      peer-focus:scale-75 peer-focus:-translate-y-6">
                                                        Provinsi
                                                    </label>
                                                </div>
                                            </div>

                                            <div class="grid grid-cols-3 gap-6 my-6">
                                                <!-- Kota / Kabupaten -->
                                                <div class="relative z-0 w-full group">
                                                    <input type="text" name="kota_kabupaten"
                                                        class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent 
                      border-0 border-b-2 border-gray-300 appearance-none 
                      dark:text-white dark:border-gray-400 dark:focus:border-blue-500 
                      focus:outline-none focus:ring-0 focus:border-blue-600 peer"
                                                        placeholder=" " required />
                                                    <label
                                                        class="peer-focus:font-medium absolute text-md text-blue-600 dark:text-gray-400 
                      duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] 
                      peer-focus:start-0 peer-focus:text-blue-800 peer-focus:dark:text-blue-500 
                      peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 
                      peer-focus:scale-75 peer-focus:-translate-y-6">
                                                        Kota / Kabupaten
                                                    </label>
                                                </div>

                                                <!-- Metode Kecamatan -->
                                                <div class="relative z-0 w-full group">
                                                    <select name="kecamatan"
                                                        class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent 
                       border-0 border-b-2 border-gray-300 appearance-none 
                       dark:text-white dark:border-gray-400 dark:focus:border-blue-500 
                       focus:outline-none focus:ring-0 focus:border-blue-600 peer"
                                                        required>
                                                        <option value="" disabled selected></option>
                                                        <option>BPJS Kesehatan</option>
                                                        <option>Cash</option>
                                                        <option>Asuransi</option>
                                                        <option>Perusahaan</option>
                                                        <option>Lainnya</option>
                                                    </select>
                                                    <label
                                                        class="peer-focus:font-medium absolute text-md text-blue-600 dark:text-gray-400 
                      duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] 
                      peer-focus:start-0 peer-focus:text-blue-800 peer-focus:dark:text-blue-500 
                      peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 
                      peer-focus:scale-75 peer-focus:-translate-y-6">
                                                        Kecamatan
                                                    </label>
                                                </div>

                                                <!-- Metode Keluaran -->
                                                <div class="relative z-0 w-full group">
                                                    <select name="kelurahan"
                                                        class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent 
                       border-0 border-b-2 border-gray-300 appearance-none 
                       dark:text-white dark:border-gray-400 dark:focus:border-blue-500 
                       focus:outline-none focus:ring-0 focus:border-blue-600 peer"
                                                        required>
                                                        <option value="" disabled selected></option>
                                                        <option>BPJS Kesehatan</option>
                                                        <option>Cash</option>
                                                        <option>Asuransi</option>
                                                        <option>Perusahaan</option>
                                                        <option>Lainnya</option>
                                                    </select>
                                                    <label for="payment_method"
                                                        class="peer-focus:font-medium absolute text-md text-blue-600 dark:text-gray-400 
                      duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] 
                      peer-focus:start-0 peer-focus:text-blue-800 peer-focus:dark:text-blue-500 
                      peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 
                      peer-focus:scale-75 peer-focus:-translate-y-6">
                                                        Keluaran
                                                    </label>
                                                </div>

                                                <div class="relative z-0 w-full group">
                                                    <input type="text" name="kode_pos"
                                                        class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent 
                      border-0 border-b-2 border-gray-300 appearance-none 
                      dark:text-white dark:border-gray-400 dark:focus:border-blue-500 
                      focus:outline-none focus:ring-0 focus:border-blue-600 peer"
                                                        placeholder=" " required />
                                                    <label
                                                        class="peer-focus:font-medium absolute text-md text-blue-600 dark:text-gray-400 
                      duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] 
                      peer-focus:start-0 peer-focus:text-blue-800 peer-focus:dark:text-blue-500 
                      peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 
                      peer-focus:scale-75 peer-focus:-translate-y-6">
                                                        Kode Pos
                                                    </label>
                                                </div>
                                            </div>

                                            <div class="bg-blue-500 px-2 py-3 flex items-center justify-start mb-6">
                                                <label class="text-white text-xl">Anggota Keluarga / Penanggung
                                                    Jawab</label>
                                            </div>

                                            <div class="my-6">
                                                <button class="text-2xl text-blue-600 flex items-center gap-2">
                                                    <svg xmlns="http://www.w3.org/2000/svg" height="24px"
                                                        viewBox="0 -960 960 960" width="24px" fill="#0000F5">
                                                        <path
                                                            d="M440-440H200v-80h240v-240h80v240h240v80H520v240h-80v-240Z" />
                                                    </svg>
                                                    <span>TAMBAHKAN</span>
                                                </button>
                                            </div>

                                            <div class="flex items-center justify-end">
                                                <button class="bg-red-400 p-2 text-white rounded-md">
                                                    Simpan
                                                </button>
                                            </div>
                                        </div>
                                    </form>
                                </div>

                            </div>

                            <!-- Modal Blok Kalender -->
                            <div x-show="openModal === 'Blok Kalender'" x-cloak x-transition
                                class="fixed inset-0 z-50 flex items-center justify-center bg-black bg-opacity-50"
                                x-transition>
                                <div
                                    class="bg-white w-full max-w-6xl rounded-lg shadow-lg overflow-y-auto max-h-[90vh]">
                                    <!-- Header -->
                                    <div class="flex justify-between items-center px-6 py-3 w-full">
                                        <h2 class="text-xl font-semibold text-blue-700">Blok Kalender</h2>
                                        <h2 class="text-xl font-semibold text-yellow-500">Tanda * wajib diisi!</h2>
                                        <button @click="openModal = false"
                                            class="text-red-500 hover:text-red-700 text-xl">&times;</button>
                                    </div>

                                    <div class="px-6 py-3 grid grid-cols-2 col-span-2 gap-4 w-full">
                                        <div class="relative z-0 w-full group">
                                            <input type="email" name="floating_email" id="floating_email"
                                                class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-400 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer"
                                                placeholder=" " required />
                                            <label for="floating_email"
                                                class="peer-focus:font-medium absolute text-md text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 rtl:peer-focus:translate-x-1/4 rtl:peer-focus:left-auto peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Cari
                                                Data Pasien </label>
                                        </div>

                                        <div>
                                            <button class="px-2 py-3 bg-blue-600 rounded-md text-white text-md">Adv.
                                                Search</button>
                                        </div>
                                    </div>

                                    <div class="px-6 py-3 w-full">
                                        <div class="flex flex-col gap-2">
                                            <label class="text-blue-600 text-md">Tipe Pasien</label>
                                            <select class="p-2 rounded-md border-blue-600">
                                                <option selected>Pasien Non Rujuk</option>
                                                <option>Pasien Rujukan</option>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="p-6 grid grid-cols-2 gap-4">
                                        <div class="flex flex-col gap-2">
                                            <label class="text-blue-600 text-md">Penjamin</label>
                                            <select class="p-2 rounded-md border-blue-600 w-full">
                                                <option selected>Penjamin</option>
                                            </select>
                                        </div>

                                        <div class="flex flex-col gap-2">
                                            <label class="text-blue-600 text-md">Metode Pembayaran</label>
                                            <select class="p-2 rounded-md border-blue-600 w-full">
                                                <option selected>Tunai</option>
                                            </select>
                                        </div>

                                        <div class="flex flex-col gap-2">
                                            <label class="text-blue-600 text-md">Jenis Kunjungan</label>
                                            <select class="p-2 rounded-md border-blue-600 w-full">
                                                <option selected>Kunjungan Sakit</option>
                                                <option>Perawatan</option>
                                            </select>
                                        </div>

                                        <div class="flex flex-col gap-2">
                                            <label class="text-blue-600 text-md">Jenis Perawatan</label>
                                            <select class="p-2 rounded-md border-blue-600 w-full">
                                                <option selected>Rawat Jalan</option>
                                            </select>
                                        </div>

                                        <div class="py-3">
                                            <div class="relative z-0 w-full group">
                                                <input
                                                    class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-400 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer"
                                                    placeholder=" " required />
                                                <label for="floating_email"
                                                    class="peer-focus:font-medium absolute text-md text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 rtl:peer-focus:translate-x-1/4 rtl:peer-focus:left-auto peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Nomor
                                                    HP </label>
                                            </div>
                                        </div>

                                        <div class="py-3">
                                            <div class="relative z-0 w-full group">
                                                <input
                                                    class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-400 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer"
                                                    placeholder=" " required />
                                                <label for="floating_email"
                                                    class="peer-focus:font-medium absolute text-md text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 rtl:peer-focus:translate-x-1/4 rtl:peer-focus:left-auto peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Alamat
                                                    Email</label>

                                                <div class="flex items-center mt-4">
                                                    <input disabled
                                                        class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded-sm focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                                                    <label for="default-checkbox"
                                                        class="ms-2 text-sm font-medium text-gray-200">Nontifikasi
                                                        Email</label>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="flex flex-col gap-2">
                                            <label class="text-blue-600 text-md">Poli</label>
                                            <select class="p-2 rounded-md border-blue-600 w-full">
                                                <option selected>Umum</option>
                                                <option>Gawat Darurat</option>
                                                <option>Kecantikan</option>
                                            </select>
                                        </div>

                                        <div class="flex flex-col gap-2">
                                            <label class="text-red-600 text-md">Tenaga Medis</label>
                                            <select class="p-2 rounded-md border-red-600 w-full">
                                                <option selected></option>
                                            </select>
                                            <label class="text-red-600 text-sm">Anda belum memiliki Dokter, silahkan
                                                lengkapi Informasi Tenaga Medis di Settings</label>
                                        </div>
                                    </div>

                                    <div class="px-6 flex items-center mb-6">
                                        <input id="default-checkbox" type="checkbox" value=""
                                            class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded-sm focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                                        <label for="default-checkbox"
                                            class="ms-2 text-sm font-medium text-gray-900 dark:text-gray-300">Nomor
                                            Antrean</label>
                                    </div>

                                    <div class="px-6 grid grid-cols-2 gap-4">
                                        <div class="flex flex-col gap-2 text-gray-400">
                                            <label class="text-md">Tanggal</label>
                                            <input type="date" class="p-2 rounded-md border-b w-full"></input>
                                            <label>Dokter praktek hari ini</label>
                                        </div>

                                        <div class="flex flex-col gap-2 text-gray-400">
                                            <label class="text-md">Slot</label>
                                            <select disabled class="p-2 rounded-md border-blue-600 w-full">
                                                <option selected></option>
                                            </select>
                                            <label>Pilih slot jadwal dokter</label>
                                        </div>

                                        <div class="flex flex-col gap-2 text-gray-400">
                                            <label class="text-md">Jam</label>
                                            <input type="time" class="p-2 rounded-md border-b w-full"></input>
                                            <label>Harus diisi</label>
                                        </div>

                                        <div class="flex flex-col gap-2 text-gray-400 pb-3">
                                            <label class="text-md">Lama Diskusi</label>
                                            <!-- Input dengan satuan -->
                                            <div
                                                class="flex items-center border-b border-gray-300 focus-within:border-blue-500">
                                                <input disabled type="number" value="0"
                                                    class="flex-1 appearance-none bg-transparent border-none focus:outline-none text-gray-700 py-2 text-sm">
                                                <span class="text-gray-600 text-sm">menit</span>
                                            </div>
                                            <!-- Keterangan -->
                                            <p class="text-xs text-gray-400 mt-1">Maks. Menit</p>
                                        </div>

                                        <div class="pb-8">
                                            <button class="text-blue-500 hover:text-blue-400 text-md">+ Rencana
                                                Tindakan</button>
                                        </div>
                                    </div>

                                    <div class="py-4 px-6">
                                        <div class="relative z-0 w-full group">
                                            <input type="email" name="floating_email" id="floating_email"
                                                class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-400 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer"
                                                placeholder=" " required />
                                            <label for="floating_email"
                                                class="peer-focus:font-medium absolute text-md text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 rtl:peer-focus:translate-x-1/4 rtl:peer-focus:left-auto peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Keluhan</label>
                                        </div>
                                    </div>

                                    <div class="py-4 px-6">
                                        <div class="relative z-0 w-full group">
                                            <input type="email" name="floating_email" id="floating_email"
                                                class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-400 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer"
                                                placeholder=" " required />
                                            <label for="floating_email"
                                                class="peer-focus:font-medium absolute text-md text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 rtl:peer-focus:translate-x-1/4 rtl:peer-focus:left-auto peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Prosedur
                                                Rencana</label>
                                        </div>
                                    </div>

                                    <div class="py-4 px-6">
                                        <div class="relative z-0 w-full group">
                                            <input type="email" name="floating_email" id="floating_email"
                                                class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-400 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer"
                                                placeholder=" " required />
                                            <label for="floating_email"
                                                class="peer-focus:font-medium absolute text-md text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 rtl:peer-focus:translate-x-1/4 rtl:peer-focus:left-auto peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Informasi
                                                Kondisi Pasien</label>
                                        </div>
                                    </div>

                                    <!-- Accordion Wrapper -->
                                    <div class="mt-2 space-y-3 px-6">

                                        <!-- Vital Sign -->
                                        <div x-data="{ open: false }" class="border border-blue-600 rounded-lg">
                                            <button @click="open = !open"
                                                class="flex justify-between w-full px-4 py-2 text-left text-blue-600 font-medium">
                                                Vital Sign
                                                <span x-text="open ? '-' : '+'"></span>
                                            </button>
                                            <div x-show="open" x-cloak x-transition
                                                class="px-4 py-3 border-t grid grid-cols-3 gap-4 text-sm">
                                                <div class="flex flex-col gap-2 text-gray-400 py-3">
                                                    <!-- Input dengan satuan -->
                                                    <div
                                                        class="flex items-center border-b border-gray-300 focus-within:border-blue-500">
                                                        <input disabled type="number" value="0"
                                                            class="flex-1 appearance-none bg-transparent border-none focus:outline-none text-gray-700 py-2 text-sm">
                                                        <span class="text-gray-600 text-sm">cm</span>
                                                    </div>
                                                    <!-- Keterangan -->
                                                    <p class="text-xs text-gray-400 mt-1">Tinggi Badan</p>
                                                </div>

                                                <div class="flex flex-col gap-2 text-gray-400 py-3">
                                                    <!-- Input dengan satuan -->
                                                    <div
                                                        class="flex items-center border-b border-gray-300 focus-within:border-blue-500">
                                                        <input disabled type="number" value="0"
                                                            class="flex-1 appearance-none bg-transparent border-none focus:outline-none text-gray-700 py-2 text-sm">
                                                        <span class="text-gray-600 text-sm">kg</span>
                                                    </div>
                                                    <!-- Keterangan -->
                                                    <p class="text-xs text-gray-400 mt-1">Berat Badan</p>
                                                </div>

                                                <div class="flex flex-col gap-2 text-gray-400 py-3">
                                                    <!-- Input dengan satuan -->
                                                    <div
                                                        class="flex items-center border-b border-gray-300 focus-within:border-blue-500">
                                                        <input disabled type="number" value="0"
                                                            class="flex-1 appearance-none bg-transparent border-none focus:outline-none text-gray-700 py-2 text-sm">
                                                        <span class="text-gray-600 text-sm">°C</span>
                                                    </div>
                                                    <!-- Keterangan -->
                                                    <p class="text-xs text-gray-400 mt-1">Suhu</p>
                                                </div>

                                                <div class="flex flex-col gap-2 text-gray-400 py-3">
                                                    <!-- Input dengan satuan -->
                                                    <div
                                                        class="flex items-center border-b border-gray-300 focus-within:border-blue-500">
                                                        <input disabled type="number" value="0"
                                                            class="flex-1 appearance-none bg-transparent border-none focus:outline-none text-gray-700 py-2 text-sm">
                                                        <span class="text-gray-600 text-sm">bpm</span>
                                                    </div>
                                                    <!-- Keterangan -->
                                                    <p class="text-xs text-gray-400 mt-1">Denyut Jantung</p>
                                                </div>

                                                <div class="flex flex-col gap-2 text-gray-400 py-3">
                                                    <!-- Input dengan satuan -->
                                                    <div
                                                        class="flex items-center border-b border-gray-300 focus-within:border-blue-500">
                                                        <input disabled type="number" value="0"
                                                            class="flex-1 appearance-none bg-transparent border-none focus:outline-none text-gray-700 py-2 text-sm">
                                                        <span class="text-gray-600 text-sm">rpm</span>
                                                    </div>
                                                    <!-- Keterangan -->
                                                    <p class="text-xs text-gray-400 mt-1">Frekuensi Pernapasan</p>
                                                </div>

                                                <div class="flex flex-col gap-2 text-gray-400 py-3">
                                                    <!-- Input dengan satuan -->
                                                    <div
                                                        class="flex items-center border-b border-gray-300 focus-within:border-blue-500">
                                                        <input disabled type="number" value="0"
                                                            class="flex-1 appearance-none bg-transparent border-none focus:outline-none text-gray-700 py-2 text-sm">
                                                        <span class="text-gray-600 text-sm">mmHg</span>
                                                    </div>
                                                    <!-- Keterangan -->
                                                    <p class="text-xs text-gray-400 mt-1">Sistolik</p>
                                                </div>

                                                <div class="flex flex-col gap-2 text-gray-400 py-3">
                                                    <!-- Input dengan satuan -->
                                                    <div
                                                        class="flex items-center border-b border-gray-300 focus-within:border-blue-500">
                                                        <input disabled type="number" value="0"
                                                            class="flex-1 appearance-none bg-transparent border-none focus:outline-none text-gray-700 py-2 text-sm">
                                                        <span class="text-gray-600 text-sm">mmHg</span>
                                                    </div>
                                                    <!-- Keterangan -->
                                                    <p class="text-xs text-gray-400 mt-1">Diastolik</p>
                                                </div>

                                                <div class="flex flex-col gap-2 text-gray-400 py-3">
                                                    <!-- Input dengan satuan -->
                                                    <div
                                                        class="flex items-center border-b border-gray-300 focus-within:border-blue-500">
                                                        <input disabled type="number" value="0"
                                                            class="flex-1 appearance-none bg-transparent border-none focus:outline-none text-gray-700 py-2 text-sm">
                                                        <span class="text-gray-600 text-sm">cm</span>
                                                    </div>
                                                    <!-- Keterangan -->
                                                    <p class="text-xs text-gray-400 mt-1">Lingkar Perut</p>
                                                </div>

                                                <div class="flex flex-col gap-2 text-gray-400 py-3">
                                                    <!-- Input dengan satuan -->
                                                    <div
                                                        class="flex items-center border-b border-gray-300 focus-within:border-blue-500">
                                                        <input disabled type="number" value="0"
                                                            class="flex-1 appearance-none bg-transparent border-none focus:outline-none text-gray-700 py-2 text-sm">
                                                        <span class="text-gray-600 text-sm">mg/dL</span>
                                                    </div>
                                                    <!-- Keterangan -->
                                                    <p class="text-xs text-gray-400 mt-1">Gula Darah</p>
                                                </div>

                                                <div class="flex flex-col gap-2 text-gray-400 py-3">
                                                    <!-- Input dengan satuan -->
                                                    <div
                                                        class="flex items-center border-b border-gray-300 focus-within:border-blue-500">
                                                        <input disabled type="number" value="0"
                                                            class="flex-1 appearance-none bg-transparent border-none focus:outline-none text-gray-700 py-2 text-sm">
                                                        <span class="text-gray-600 text-sm">SPO2</span>
                                                    </div>
                                                    <!-- Keterangan -->
                                                    <p class="text-xs text-gray-400 mt-1">Saturasi Oksigen</p>
                                                </div>

                                            </div>
                                        </div>

                                        <!-- Identitas Pengantar -->
                                        <div x-data="{ open: false }" class="border border-blue-600 rounded-lg">
                                            <button @click="open = !open"
                                                class="flex justify-between w-full px-4 py-2 text-left text-blue-600 font-medium">
                                                Identitas Pengantar
                                                <span x-text="open ? '-' : '+'"></span>
                                            </button>
                                            <div x-show="open" x-cloak x-transition
                                                class="px-4 py-3 border-t grid grid-cols-2 gap-4 text-sm">
                                                <div class="pt-4">
                                                    <div class="relative z-0 w-full group">
                                                        <input type="email" name="floating_email"
                                                            id="floating_email"
                                                            class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-400 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer"
                                                            placeholder=" " required />
                                                        <label for="floating_email"
                                                            class="peer-focus:font-medium absolute text-md text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 rtl:peer-focus:translate-x-1/4 rtl:peer-focus:left-auto peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Nama
                                                            Lengkap</label>
                                                    </div>
                                                </div>

                                                <div class="pt-4">
                                                    <div class="relative z-0 w-full group">
                                                        <input type="email" name="floating_email"
                                                            id="floating_email"
                                                            class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-400 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer"
                                                            placeholder=" " required />
                                                        <label for="floating_email"
                                                            class="peer-focus:font-medium absolute text-md text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 rtl:peer-focus:translate-x-1/4 rtl:peer-focus:left-auto peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Hubungan
                                                            Antar Pasien</label>
                                                    </div>
                                                </div>

                                                <div class="py-4">
                                                    <div class="relative z-0 w-full group">
                                                        <input type="email" name="floating_email"
                                                            id="floating_email"
                                                            class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-400 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer"
                                                            placeholder=" " required />
                                                        <label for="floating_email"
                                                            class="peer-focus:font-medium absolute text-md text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 rtl:peer-focus:translate-x-1/4 rtl:peer-focus:left-auto peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Alamat</label>
                                                    </div>
                                                </div>

                                                <div class="py-4">
                                                    <div class="relative z-0 w-full group">
                                                        <input type="email" name="floating_email"
                                                            id="floating_email"
                                                            class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-400 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer"
                                                            placeholder=" " required />
                                                        <label for="floating_email"
                                                            class="peer-focus:font-medium absolute text-md text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 rtl:peer-focus:translate-x-1/4 rtl:peer-focus:left-auto peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">No
                                                            Hp</label>
                                                    </div>
                                                </div>

                                            </div>
                                        </div>

                                        <!-- Riwayat Alergi -->
                                        <div x-data="alergiApp()" class="border border-blue-600 rounded-lg">
                                            <button @click="open = !open"
                                                class="flex justify-between w-full px-4 py-2 text-left text-blue-600 font-medium">
                                                Riwayat Alergi
                                                <span x-text="open ? '-' : '+'"></span>
                                            </button>

                                            <div x-show="open" x-cloak x-transition
                                                class="px-4 py-3 border-t space-y-3 text-sm">

                                                <!-- Input pencarian alergi -->
                                                <div class="w-full">
                                                    <label class="block text-sm text-blue-600 mb-1">
                                                        Riwayat Alergi
                                                    </label>

                                                    <div class="relative">
                                                        <!-- Icon Search -->
                                                        <span
                                                            class="absolute inset-y-0 left-0 flex items-center pl-2 text-gray-500">
                                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5"
                                                                fill="none" viewBox="0 0 24 24"
                                                                stroke="currentColor">
                                                                <path stroke-linecap="round" stroke-linejoin="round"
                                                                    stroke-width="2"
                                                                    d="M21 21l-4.35-4.35M10 18a8 8 0 100-16 8 8 0 000 16z" />
                                                            </svg>
                                                        </span>

                                                        <!-- Input Cari -->
                                                        <input type="text" x-model="search"
                                                            placeholder="Cari nama alergi"
                                                            class="w-full border-b border-gray-400 pl-8 pr-2 py-1 text-gray-700 focus:outline-none focus:border-blue-500 rounded-md" />

                                                        <!-- Dropdown hasil pencarian -->
                                                        <div class="absolute w-full bg-white border border-gray-200 mt-1 rounded-lg shadow z-10"
                                                            x-show="filteredList().length > 0 && search.length > 0"
                                                            @click.away="search=''">
                                                            <template x-for="item in filteredList()"
                                                                :key="item">
                                                                <div class="px-3 py-2 hover:bg-gray-100 cursor-pointer"
                                                                    @click="selectAlergi(item)">
                                                                    <span x-text="item"></span>
                                                                </div>
                                                            </template>
                                                        </div>
                                                    </div>

                                                    <p class="mt-1 text-xs text-gray-500">Cari nama alergi</p>
                                                </div>

                                                <!-- Chips -->
                                                <div class="flex items-center flex-wrap gap-2">
                                                    <template x-for="(item, index) in selected" :key="index">
                                                        <div
                                                            class="flex items-center bg-gray-200 px-3 py-1 rounded-full text-sm">
                                                            <span x-text="item"></span>
                                                            <button class="ml-2 text-gray-600 hover:text-red-500"
                                                                @click="remove(index)">✕</button>
                                                        </div>
                                                    </template>
                                                    <button
                                                        class="bg-gray-200 px-3 py-1 rounded-full text-sm text-gray-600 hover:bg-gray-300 ">+
                                                        Add</button>
                                                </div>
                                                <label class="block text-sm text-gray-600 mb-1">Ketik nama
                                                    alergi</label>

                                                <div class="pt-4">
                                                    <div class="relative z-0 w-full group">
                                                        <input type="email" name="floating_email"
                                                            id="floating_email"
                                                            class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-400 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer"
                                                            placeholder=" " required />
                                                        <label for="floating_email"
                                                            class="peer-focus:font-medium absolute text-md text-blue-600 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 rtl:peer-focus:translate-x-1/4 rtl:peer-focus:left-auto peer-focus:text-blue-800 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Riwayat
                                                            Penyakit Pasien</label>
                                                    </div>
                                                    <!-- Keterangan -->
                                                    <p class="text-xs text-gray-400 mt-1">Masukkan nilai yang
                                                        dipisahkan koma. Contoh pengisian dua penyakit: Diabetes, Asma
                                                    </p>
                                                </div>

                                                <div class="pt-4">
                                                    <div class="relative z-0 w-full group">
                                                        <input type="email" name="floating_email"
                                                            id="floating_email"
                                                            class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-400 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer"
                                                            placeholder=" " required />
                                                        <label for="floating_email"
                                                            class="peer-focus:font-medium absolute text-md text-blue-600 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 rtl:peer-focus:translate-x-1/4 rtl:peer-focus:left-auto peer-focus:text-blue-800 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Riwayat
                                                            Penyakit Keluarga</label>
                                                    </div>
                                                    <!-- Keterangan -->
                                                    <p class="text-xs text-gray-400 mt-1">Masukkan nilai yang
                                                        dipisahkan koma. Contoh pengisian dua penyakit: Diabetes, Asma
                                                    </p>
                                                </div>

                                                <div class="py-4">
                                                    <div class="relative z-0 w-full group">
                                                        <input type="email" name="floating_email"
                                                            id="floating_email"
                                                            class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-400 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer"
                                                            placeholder=" " required />
                                                        <label for="floating_email"
                                                            class="peer-focus:font-medium absolute text-md text-blue-600 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 rtl:peer-focus:translate-x-1/4 rtl:peer-focus:left-auto peer-focus:text-blue-800 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Riwayat
                                                            Penggunaan Obat</label>
                                                    </div>
                                                    <!-- Keterangan -->
                                                    <p class="text-xs text-gray-400 mt-1">Masukkan nilai yang
                                                        dipisahkan koma. Contoh pengisian dua penyakit: Diabetes, Asma
                                                    </p>
                                                </div>
                                            </div>
                                        </div>

                                        <script>
                                            function alergiApp() {
                                                return {
                                                    open: false,
                                                    search: '',
                                                    alergiList: ["Rumput bermuda", "Debu", "Susu sapi", "Kacang tanah", "Udang"],
                                                    selected: [],
                                                    inputAlergi: '',

                                                    filteredList() {
                                                        return this.alergiList.filter(a =>
                                                            a.toLowerCase().includes(this.search.toLowerCase())
                                                        );
                                                    },

                                                    selectAlergi(item) {
                                                        if (!this.selected.includes(item)) {
                                                            this.selected.push(item);
                                                        }
                                                        this.inputAlergi = item; // isi input bawah
                                                        this.search = '';
                                                    },

                                                    remove(index) {
                                                        this.selected.splice(index, 1);
                                                    }
                                                }
                                            }
                                        </script>

                                        <!-- Psikososial - Spiritual -->
                                        <div x-data="{ open: false }" class="border border-blue-600 rounded-lg">
                                            <button @click="open = !open"
                                                class="flex justify-between w-full px-4 py-2 text-left text-blue-600 font-medium">
                                                Psikososial - Spiritual
                                                <span x-text="open ? '-' : '+'"></span>
                                            </button>
                                            <div x-show="open" x-cloak x-transition
                                                class="px-4 py-3 border-t space-y-5 text-sm">

                                                <!-- Kondisi Psikologis -->
                                                <div>
                                                    <div class="grid grid-cols-[1fr_3fr] gap-2">
                                                        <!-- Label -->
                                                        <span
                                                            class="whitespace-nowrap font-medium text-blue-400">Kondisi
                                                            Psikologis
                                                            :</span>

                                                        <!-- Opsi + Helper -->
                                                        <div>
                                                            <!-- Checkbox list -->
                                                            <div class="flex flex-wrap gap-4">
                                                                <label class="flex items-center gap-1"><input
                                                                        type="checkbox"> Normal</label>
                                                                <label class="flex items-center gap-1"><input
                                                                        type="checkbox"> Tidak Semangat</label>
                                                                <label class="flex items-center gap-1"><input
                                                                        type="checkbox"> Merasa Bersalah</label>
                                                                <label class="flex items-center gap-1"><input
                                                                        type="checkbox"> Sulit Konsentrasi</label>
                                                                <label class="flex items-center gap-1"><input
                                                                        type="checkbox"> Sulit Tidur</label>
                                                                <label class="flex items-center gap-1"><input
                                                                        type="checkbox"> Cemas</label>
                                                                <label class="flex items-center gap-1"><input
                                                                        type="checkbox"> Sulit Berbicara</label>
                                                                <label class="flex items-center gap-1"><input
                                                                        type="checkbox"> Cepat Lelah</label>
                                                                <label class="flex items-center gap-1"><input
                                                                        type="checkbox"> Depresi</label>
                                                                <label class="flex items-center gap-1"><input
                                                                        type="checkbox"> Rasa Tertekan</label>
                                                            </div>

                                                            <!-- Helper text -->
                                                            <p class="text-xs text-gray-500 mt-3">Bisa Memilih Lebih
                                                                dari Satu Opsi</p>
                                                        </div>
                                                    </div>
                                                </div>


                                                <!-- Status Menikah -->
                                                <div>
                                                    <div class="grid grid-cols-[1fr_3fr] gap-2">
                                                        <!-- Label -->
                                                        <span
                                                            class="whitespace-nowrap font-medium text-blue-400">Kondisi
                                                            Sosial & Ekonomi Status Menikah :</span>

                                                        <!-- Opsi + Helper -->
                                                        <div>
                                                            <!-- Checkbox list -->
                                                            <div class="flex flex-wrap gap-4">
                                                                <label class="flex items-center gap-1"><input
                                                                        type="checkbox"> Menikah</label>
                                                                <label class="flex items-center gap-1"><input
                                                                        type="checkbox"> Belum Menikah</label>
                                                                <label class="flex items-center gap-1"><input
                                                                        type="checkbox"> Janda/Duda</label>
                                                            </div>

                                                            <!-- Helper text -->
                                                            <p class="text-xs text-gray-500 mt-3">Pilih Satu Opsi</p>
                                                        </div>
                                                    </div>
                                                </div>

                                                <!-- Tinggal Dengan -->
                                                <div>
                                                    <div class="grid grid-cols-[1fr_3fr] gap-2">
                                                        <!-- Label -->
                                                        <span
                                                            class="whitespace-nowrap font-medium text-blue-400">Tinggal
                                                            Dengan :</span>

                                                        <!-- Opsi + Helper -->
                                                        <div>
                                                            <!-- Checkbox list -->
                                                            <div class="flex flex-wrap gap-4">
                                                                <label class="flex items-center gap-1"><input
                                                                        type="checkbox"> Sendiri</label>
                                                                <label class="flex items-center gap-1"><input
                                                                        type="checkbox"> Orang Tua</label>
                                                                <label class="flex items-center gap-1"><input
                                                                        type="checkbox"> Suami/Istri</label>
                                                                <label class="flex items-center gap-1"><input
                                                                        type="checkbox"> Lainnya</label>
                                                            </div>

                                                            <!-- Helper text -->
                                                            <p class="text-xs text-gray-500 mt-3">Pilih Satu Opsi</p>
                                                        </div>
                                                    </div>
                                                </div>

                                                <!-- Pekerjaan -->
                                                <div>
                                                    <div class="grid grid-cols-[1fr_3fr] gap-2">
                                                        <!-- Label -->
                                                        <span
                                                            class="whitespace-nowrap font-medium text-blue-400">Pekerjaan
                                                            :</span>

                                                        <!-- Opsi + Helper -->
                                                        <div>
                                                            <!-- Checkbox list -->
                                                            <div class="flex flex-wrap gap-4">
                                                                <label class="flex items-center gap-1"><input
                                                                        type="checkbox"> Wiraswasta</label>
                                                                <label class="flex items-center gap-1"><input
                                                                        type="checkbox"> Swasta</label>
                                                                <label class="flex items-center gap-1"><input
                                                                        type="checkbox"> PNS/TNI/POLRI</label>
                                                                <label class="flex items-center gap-1"><input
                                                                        type="checkbox"> Lainnya</label>
                                                            </div>

                                                            <!-- Helper text -->
                                                            <p class="text-xs text-gray-500 mt-3">Pilih Satu Opsi</p>
                                                        </div>
                                                    </div>
                                                </div>

                                                <!-- Status Spiritual -->
                                                <div>
                                                    <label class="block font-medium mb-1 text-blue-400">Status
                                                        Spiritual</label>
                                                </div>

                                                <!-- Kegiatan Keagamaan -->
                                                <div class="pt-4">
                                                    <div class="relative z-0 w-full group">
                                                        <input type="email" name="floating_email"
                                                            id="floating_email"
                                                            class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-400 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer"
                                                            placeholder=" " required />
                                                        <label for="floating_email"
                                                            class="peer-focus:font-medium absolute text-md text-blue-600 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 rtl:peer-focus:translate-x-1/4 rtl:peer-focus:left-auto peer-focus:text-blue-800 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Kegiatan
                                                            Keagamaan yang Biasa Dilakukan</label>
                                                    </div>
                                                </div>

                                                <!-- Kegiatan Spiritual Selama Perawatan -->
                                                <div class="py-4">
                                                    <div class="relative z-0 w-full group">
                                                        <input type="email" name="floating_email"
                                                            id="floating_email"
                                                            class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-400 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer"
                                                            placeholder=" " required />
                                                        <label for="floating_email"
                                                            class="peer-focus:font-medium absolute text-md text-blue-600 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 rtl:peer-focus:translate-x-1/4 rtl:peer-focus:left-auto peer-focus:text-blue-800 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Kegiatan
                                                            Spiritual yang Dibutuhkan Selama Perawatan</label>
                                                    </div>
                                                </div>

                                            </div>
                                        </div>
                                    </div>

                                    <!-- Action Buttons -->
                                    <div class="flex justify-end gap-3 p-6">
                                        <button @click="open = false"
                                            class="px-4 py-2 bg-gray-200 rounded hover:bg-gray-300">BATAL</button>
                                        <button
                                            class="px-4 py-2 bg-red-500 text-white rounded hover:bg-red-600">SIMPAN</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="flex items-center">
                        <div class="flex flex-row gap-x-3 mx-4 items-center">
                            <img class="rounded-md h-[70px] w-auto"
                                src="{{ asset('storage/assets/royal_klinik.png') }}" alt="foto_bang">
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
                                    <button
                                        @click="tabAktivitas = (tabAktivitas === 'antriCepat') ? '' : 'antriCepat' "
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
</x-app-layout>
