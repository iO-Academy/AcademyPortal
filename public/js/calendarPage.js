const calendarEl = document.getElementById("calendar");
const calendar = new FullCalendar.Calendar(calendarEl, {
  initialView: "dayGridMonth",
  eventTimeFormat: {
    hour: "2-digit",
    minute: "2-digit",
    meridiem: true,
  },
});

(async () => {
  const response = await fetch("./api/calendar");
  const events = await response.json();
  events.map((event) => {
    if (event.categoryId == 1) {
      event.color = "#4eab1a";
    } else if (event.categoryId == 2) {
      event.color = "#002aff";
    } else if (event.categoryId == 3) {
      event.color = "#b5b601";
    } else if (event.categoryId == 4) {
      event.color = "#c03d3d";
      event.allDay = true;
    } else if (event.categoryId == 5) {
      event.color = "#fa5c03";
    } else if (event.categoryId == 6) {
      event.color = "#f48cff";
    } else {
      event.color = "#3b003a";
    }

    calendar.addEvent(event);
  });
  calendar.render();
})();
