const calendarEl = document.getElementById("calendar");
const calendar = new FullCalendar.Calendar(calendarEl, {
  eventClick: function(info) {
    var eventObj = info.event;
    $('#modalTitle').html('Event Details');
    $('#modalBody').html(event.description);
    $('#eventName').html('Event: ' + eventObj.title);
    $('#eventLocation').html('Location: ' + eventObj.extendedProps.location)
    $('#eventStart').html('Start: ' + eventObj.start)
    if (eventObj.end) {
      $('#eventEnd').html('End: ' + eventObj.end)
    } else {
      $('#eventEnd').html('')
    }
    $('#calendarModal').modal();
  },
  initialView: "dayGridMonth",
  businessHours: {'daysOfWeek': [1,2,3,4,5], 'startTime': '09:00', 'endTime': '17:00' },
  eventTimeFormat: {
    hour: "2-digit",
    minute: "2-digit",
    meridiem: true,
    eventColor: "#3b003a",
  },
});

const calendarConverter= ($calendarItem) => {
  $calendarItem.className = $calendarItem.categoryName
      .toLowerCase()
      .split(" ")
      .join("");
  calendar.addEvent($calendarItem);
}

(async () => {
  const response = await fetch("/api/getAllCalendarData");
  const calendarEvents = await response.json();

  calendarEvents['eventData'].map(calendarConverter);

  calendarEvents['courseData'].map((calendarEvent) => {
    calendarEvent.map(calendarConverter)
  });

  calendar.render();
})();

