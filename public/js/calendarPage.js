document.addEventListener("DOMContentLoaded", function () {
  var calendarEl = document.getElementById("calendar");
  var calendar = new FullCalendar.Calendar(calendarEl, {
    initialView: "dayGridMonth",
    eventTimeFormat: {
      hour: "2-digit",
      minute: "2-digit",
      meridiem: true,
    },
  });

  const extractResponseData = (response) => {
    let data = response.json();
    return data;
  };

  async function addCalendarEvents() {
    const response = await fetch("./api/calendar");
    const events = await extractResponseData(response);
    events.map((event) => {
      console.log(event);
    });
    events.map((event) => {
      calendar.addEvent(event);
    });
  }

  addCalendarEvents();
  calendar.render();
});
