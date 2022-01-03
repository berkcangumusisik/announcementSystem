<?php include("data/vt.php") ?>
<!DOCTYPE html>
<html>

<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <link rel="stylesheet" href="plugins/fullcalendar/main.min.css">
    <link rel="stylesheet" href="plugins/fullcalendar-daygrid/main.min.css">
    <link rel="stylesheet" href="plugins/fullcalendar-timegrid/main.min.css">
    <link rel="stylesheet" href="plugins/fullcalendar-bootstrap/main.min.css">
    <link rel="stylesheet" href="dist/css/adminlte.min.css">
    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
</head>

<body>
    <div id="calendar">

    </div>

    <div class="container">

        <div id='calendar'>

        </div>
    </div>

    <script src="plugins/jquery/jquery.min.js"></script>
    <script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="plugins/jquery-ui/jquery-ui.min.js"></script>
    <script src="dist/js/adminlte.min.js"></script>
    <script src="dist/js/demo.js"></script>
    <script src="plugins/moment/moment.min.js"></script>
    <script src="plugins/fullcalendar/main.min.js"></script>
    <script src="plugins/fullcalendar-daygrid/main.min.js"></script>
    <script src="plugins/fullcalendar-timegrid/main.min.js"></script>
    <script src="plugins/fullcalendar-interaction/main.min.js"></script>
    <script src="plugins/fullcalendar-bootstrap/main.min.js"></script>
    <script>
        $(function() {

            function ini_events(ele) {
                ele.each(function() {
                    $(this).data('eventObject', eventObject)
                })
            }
            ini_events($('#external-events div.external-event'))
            var date = new Date()
            var d = date.getDate(),
                m = date.getMonth(),
                y = date.getFullYear()
            var Calendar = FullCalendar.Calendar;
            var calendarEl = document.getElementById('calendar');
            var calendar = new Calendar(calendarEl, {
                selectable: true,
                plugins: ['bootstrap', 'interaction', 'dayGrid', 'timeGrid'],
                header: {
                    left: 'prev,next today',
                    center: 'title',
                    right: 'dayGridMonth,timeGridWeek,timeGridDay'
                },
                events: "events.php",
                eventRender: function(event, element, view) {
                    if (event.allDay === 'true') {
                        event.allDay = true;
                    } else {
                        event.allDay = false;
                    }
                },
                'themeSystem': 'bootstrap',
            });

            calendar.render();

        })
    </script>
</body>

</html>