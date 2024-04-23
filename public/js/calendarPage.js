const calendarEl = document.getElementById("calendar");
const calendar = new FullCalendar.Calendar(calendarEl, {
  initialView: "dayGridMonth",
  businessHours: {'daysOfWeek': [1,2,3,4,5], 'startTime': '09:00', 'endTime': '17:00' },
  eventTimeFormat: {
    hour: "2-digit",
    minute: "2-digit",
    meridiem: true,
    eventColor: "#3b003a",
  },
});

(async () => {
  const response = await fetch("/api/getAllCalendarData");
  const calendarEvents = await response.json();

  calendarEvents['eventData'].map((calendarEvent) => {
    calendarEvent.className = calendarEvent.categoryName
        .toLowerCase()
        .split(" ")
        .join("");
    calendar.addEvent(calendarEvent);
  });

  calendarEvents['courseData'].map((calendarEvent) => {
    calendarEvent.map((course) => {
      course.className = course.categoryName
        .toLowerCase()
        .split(" ")
        .join("");
      calendar.addEvent(course)
    })
  });

  calendar.render();
})();
