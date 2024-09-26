const calendarEl = document.getElementById("calendar");
const calendar = new FullCalendar.Calendar(calendarEl, {
  eventClick: function(info) {
    const eventObj = info.event;
    document.querySelector('#eventName').textContent = eventObj.title;
    document.querySelector('#eventLocation').textContent = eventObj.extendedProps.location;
    document.querySelector('#eventStart').textContent = eventObj.start;
    document.querySelector('#eventEnd').textContent = eventObj.end;
    //Bootstrap Modals require this line of jQuery to open.
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

