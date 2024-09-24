const calendarEl = document.getElementById("calendar");
const calendar = new FullCalendar.Calendar(calendarEl, {
  eventClick: function(info) {
    var eventObj = info.event;
    console.log(eventObj)
    if (eventObj.url) {
      alert(
          'Clicked ' + eventObj.title + '.\n' +
          'Will open ' + eventObj.url + ' in a new tab'
      );

      window.open(eventObj.url);

      info.jsEvent.preventDefault(); // prevents browser from following link in current tab.
    } else {
      alert('Clicked ' + eventObj.title);
    }
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

