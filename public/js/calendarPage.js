const calendarEl = document.getElementById("calendar");
const calendar = new FullCalendar.Calendar(calendarEl, {
  eventClick: function(info) {
    var eventObj = info.event;
    eventObj.extendedProps = undefined;
    console.log(eventObj)
    const calendarEventModal= document.getElementById("myModal")
    calendarEventModal.showModal()
    const closeModal = document.getElementById('close')

    closeModal.addEventListener("click", () => {
      calendarEventModal.close()
    })

    const eventName = document.getElementById('eventName')
    const eventLocation = document.getElementById('eventLocation')
    const eventDate = document.getElementById('eventDate')
    const eventStart = document.getElementById('eventStart')
    const eventEnd = document.getElementById('eventEnd')






    eventName.innerText = 'Event: ' + eventObj.title
    eventLocation.innerText = 'Location: ' + eventObj.extendedProps.location
    eventDate.innerText = 'Date: ' + eventObj.date
    eventStart.innerText = 'Start: ' + eventObj.start
    eventEnd.innerText = 'End: ' + eventObj.end



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

