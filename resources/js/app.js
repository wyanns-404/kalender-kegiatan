import { Calendar } from '@fullcalendar/core';
import dayGridPlugin from '@fullcalendar/daygrid';
import timeGridPlugin from '@fullcalendar/timegrid';
import interactionPlugin from '@fullcalendar/interaction';

document.addEventListener('DOMContentLoaded', function() {
  const calendarEl = document.getElementById('calendar');

  const calendar = new Calendar(calendarEl, {
    plugins: [dayGridPlugin, timeGridPlugin, interactionPlugin],
    initialDate: '2025-05-01',
    initialView: 'dayGridMonth',
    selectable: true,
    events: '/api/events',
    headerToolbar: {
      left: 'prev,next today',
      center: 'title',
      right: 'dayGridMonth,timeGridWeek,timeGridDay'
    },
    // events: [
    //   {
    //     title: 'Contoh Kegiatan',
    //     start: new Date().toISOString().slice(0, 10),
    //     tempat: 'Ruang Aula',
    //     pendamping: 'Pak Budi'
    //   }
    // ],

    eventClick: function(info) {
      alert(
        `Kegiatan: ${info.event.title}\n` +
        `Tempat: ${info.event.extendedProps?.tempat ?? '-'}\n` +
        `Pendamping: ${info.event.extendedProps?.pendamping ?? '-'}`
      );
    }
  });

  calendar.render();
});

