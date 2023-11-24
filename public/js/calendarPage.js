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
  const calendarEvents = await response.json();
  calendarEvents.map((calendarEvent) => {
    const categoryName = calendarEvent.categoryName
      .toLowerCase()
      .split(" ")
      .join("");
    calendarEvent.className = categoryName;
    calendar.addEvent(calendarEvent);
  });
  calendar.render();
})();
