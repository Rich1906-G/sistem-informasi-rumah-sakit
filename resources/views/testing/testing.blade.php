<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Booking Calendar</title>
    <link href="https://cdn.jsdelivr.net/npm/fullcalendar-scheduler@6.1.8/index.global.min.css" rel="stylesheet" />
    <script src="https://cdn.jsdelivr.net/npm/fullcalendar-scheduler@6.1.8/index.global.min.js"></script>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="p-6" x-data="{
    openForm: false,
    formData: { doctor_id: '', start: '', end: '', patient_name: '' },
    dataDokter: @js($dataDokter)
}" {{-- Tangkap event FullCalendar di level window/body --}}
    @open-booking-form.window="openForm = true;
                                formData.doctor_id = $event.detail.doctor_id ?? '';
                                formData.start = $event.detail.start ?? '';
                                formData.end = $event.detail.end ?? ''">

    <!-- NOTE: jangan pakai @click di calendar (itu bikin modal buka sembarangan) -->
    <div id="calendar"></div>

    <!-- Modal Form -->
    <div x-show="openForm" x-cloak class="fixed inset-0 flex items-center justify-center bg-black bg-opacity-50 z-50">
        <div class="bg-white p-6 rounded-lg shadow-lg w-96">
            <h2 class="text-xl font-semibold mb-4">Buat Kunjungan Baru</h2>

            <form
                @submit.prevent="
                    fetch('{{ route('kunjungan.store') }}', {
                        method: 'POST',
                        headers: {
                            'Content-Type': 'application/json',
                            'X-CSRF-TOKEN': '{{ csrf_token() }}'
                        },
                        body: JSON.stringify(formData)
                    }).then(() => {
                        openForm = false;
                        calendar.refetchEvents();
                    })
                ">
                <div class="mb-3">
                    <label class="block mb-1">Nama Pasien</label>
                    <input type="text" x-model="formData.patient_name" class="w-full border rounded p-2" required>
                </div>

                <div class="mb-3">
                    <label class="block mb-1">Nama Dokter</label>
                    <select x-model="formData.doctor_id"
                        class="py-2.5 px-0 w-full text-sm text-gray-700 bg-transparent border-b-2 border-gray-300 focus:outline-none focus:ring-0 focus:border-green-500">
                        <option value="">-- Pilih Dokter --</option>

                        <!-- pakai <template x-for> supaya Alpine bisa clone option dengan benar -->
                        <template x-for="dokter in dataDokter" :key="dokter.id">
                            <option :value="dokter.id" x-text="dokter.nama"></option>
                        </template>
                    </select>
                </div>

                <div class="mb-3">
                    <label class="block mb-1">Tanggal Mulai</label>
                    <input type="text" x-model="formData.start" class="w-full border rounded p-2" readonly>
                </div>

                <div class="mb-3">
                    <label class="block mb-1">Tanggal Selesai</label>
                    <input type="text" x-model="formData.end" class="w-full border rounded p-2" readonly>
                </div>

                <div class="flex justify-end gap-2">
                    <button type="button" @click="openForm=false" class="px-4 py-2 bg-gray-300 rounded">Batal</button>
                    <button type="submit" class="px-4 py-2 bg-green-600 text-white rounded">Simpan</button>
                </div>
            </form>
        </div>
    </div>

    <script>
        let calendar;

        document.addEventListener('DOMContentLoaded', function() {
            let calendarEl = document.getElementById('calendar');

            calendar = new FullCalendar.Calendar(calendarEl, {
                schedulerLicenseKey: 'GPL-My-Project-Is-Open-Source',
                initialView: 'resourceTimeGridDay',
                resources: '{{ route('data.dokter') }}',
                events: '{{ route('kunjungan') }}',
                selectable: true,

                // ketika user seleksi slot di kalender
                select: function(info) {
                    // guard kalau resource mungkin undefined (mis. bukan view resource)
                    const doctorId = info.resource ? info.resource.id : (info.resourceId ?? '');
                    window.dispatchEvent(new CustomEvent('open-booking-form', {
                        detail: {
                            doctor_id: doctorId,
                            start: info.startStr,
                            end: info.endStr
                        }
                    }));
                },

                eventDidMount: function(info) {
                    let status = info.event.extendedProps.status;
                    if (status === 'Pending') {
                        info.el.style.backgroundColor = 'orange';
                    } else if (status === 'Confirmed') {
                        info.el.style.backgroundColor = 'green';
                    } else if (status === 'Cancelled') {
                        info.el.style.backgroundColor = 'red';
                    }
                }
            });

            calendar.render();
        });
    </script>
</body>

</html>
