const calendarEl = document.getElementById("calendar");
const calendar = new FullCalendar.Calendar(calendarEl, {
  initialView: "dayGridMonth",
  eventTimeFormat: {
    hour: "2-digit",
    minute: "2-digit",
    meridiem: true,
    eventColor: "#3b003a",
  },
});

(async () => {
  const response = await fetch("./api/getCalendarEvents");
  const events = await response.json();
  events.map((event) => {
    if (event.categoryId == 1) {
      event.className = "hiringevent";
    } else if (event.categoryId == 2) {
      event.className = "sprintreview";
    } else if (event.categoryId == 3) {
      event.className = "tastersession";
    } else if (event.categoryId == 4) {
      event.className = "assessment";
      event.allDay = true;
    } else if (event.categoryId == 5) {
      event.className = "graduation";
    } else if (event.categoryId == 6) {
      event.className = "other";
    }
    calendar.addEvent(event);
  });
  calendar.render();
})();
