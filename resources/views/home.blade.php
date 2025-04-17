<!DOCTYPE html>
<html lang='en'>
  <head>
    <meta charset='utf-8' />
    <script src='https://cdn.jsdelivr.net/npm/fullcalendar@6.1.17/index.global.min.js'></script>
    <script src='https://cdn.jsdelivr.net/npm/fullcalendar@6.1.17/daygrid@6.1.17/index.global.min.js'></script>
    <script scr='https://cdn.jsdelivr.net/npm/fullcalendar@6.1.17/timegrid@6.1.17/index.global.min.js'></script>
    <script src='https://cdn.jsdelivr.net/npm/fullcalendar@6.1.17/list@6.1.17/index.global.min.js'></script>
    <script src='https://cdn.jsdelivr.net/npm/fullcalendar@6.1.17/multimonth@6.1.17/index.global.min.js'></script>
    <script src='https://cdn.jsdelivr.net/npm/fullcalendar@6.1.17/list@6.1.17/index.global.min.js'></script>
    <script src='https://cdn.jsdelivr.net/npm/fullcalendar@6.1.17/interaction@6.1.17/index.global.min.js'></script>
    <script>

      document.addEventListener('DOMContentLoaded', function() {
        var calendarEl = document.getElementById('calendar');
        var calendar = new FullCalendar.Calendar(calendarEl, {
          initialView: 'interaction',
          initialView: 'multiMonthYear'        
        });
        calendar.render();
      });
     
    </script>
  </head>
  <body>
    <div id='calendar'></div>
  </body>
</html>

