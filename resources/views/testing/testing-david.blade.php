<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Booking Calendar</title>
    @vite(['resources/js/app.js', 'resources/css/app.css']) <!-- Load JS & CSS -->
</head>

<body>
    <div id="calendar" class="mx-w-7xl mx-auto my-10"></div>

    <script>
        // Inisialisasi calendar
        document.addEventListener('DOMContentLoaded', function() {
            const calendar = new tui.Calendar('#calendar', {
                defaultView: 'week',
                taskView: false,
                scheduleView: true,
                useCreationPopup: true,
                useDetailPopup: true
            });
        });

        // Load bookings dari backend
        const dataDokter = @json($dataDokter);

        dataDokter.forEach(event => {
            calendar.createSchedules([{
                id: event.id,
                calendarId: '1',
                title: event.title,
                category: 'time',
                start: event.start,
                end: event.end,
            }]);
        });

        //    // Event create
        //    calendar.on('beforeCreateSchedule', (event) => {
        //        const { start, end, title } = event.schedule;

        //        fetch('/bookings', {
        //            method: 'POST',
        //            headers: { 'Content-Type': 'application/json', 'X-CSRF-TOKEN': '{{ csrf_token() }}' },
        //            body: JSON.stringify({ title: title || 'New Booking', start, end })
        //        })
        //        .then(res => res.json())
        //        .then(data => {
        //            calendar.createSchedules([{
        //                id: data.id,
        //                calendarId: '1',
        //                title: data.title,
        //                category: 'time',
        //                start: data.start,
        //                end: data.end,
        //            }]);
        //        });
        //    });

        //    // Event update
        //    calendar.on('beforeUpdateSchedule', (event) => {
        //        const { schedule } = event;

        //        fetch(`/bookings/${schedule.id}`, {
        //            method: 'PUT',
        //            headers: { 'Content-Type': 'application/json', 'X-CSRF-TOKEN': '{{ csrf_token() }}' },
        //            body: JSON.stringify({
        //                title: schedule.title,
        //                start: schedule.start,
        //                end: schedule.end
        //            })
        //        });
        //    });

        //    // Event delete
        //    calendar.on('beforeDeleteSchedule', (event) => {
        //        const { schedule } = event;

        //        fetch(`/bookings/${schedule.id}`, {
        //            method: 'DELETE',
        //            headers: { 'X-CSRF-TOKEN': '{{ csrf_token() }}' },
        //        });
        //    });
    </script>
</body>

</html>
