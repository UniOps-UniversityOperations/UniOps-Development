var time_slots = document.querySelectorAll('.div9');

time_slots.forEach((timeslot) => {

  timeslot.addEventListener('click', () => {

    var day_of_week = timeslot.getAttribute('day_of_week');
    var start_time = timeslot.getAttribute('start_time');
    var slot_id = timeslot.getAttribute('id');

    // console.log(day_of_week);
    // console.log(start_time);
    // console.log(slot_id);

    var form = document.createElement("form");
    form.setAttribute("method", "POST");
    form.setAttribute("action", "addTimeslot");

    // Create an input element for the action parameter
    var dayInput = document.createElement("input");
    dayInput.setAttribute("type", "hidden");
    dayInput.setAttribute("name", 'day_of_week');
    dayInput.setAttribute("value", day_of_week);

    // Create an input element for the timeslot parameter
    var timeslotInput = document.createElement("input");
    timeslotInput.setAttribute("type", "hidden");
    timeslotInput.setAttribute("name", "start_time");
    timeslotInput.setAttribute("value", start_time);

    // Append the input elements to the form
    form.appendChild(dayInput);
    form.appendChild(timeslotInput);

    // Append the form to the body and submit it
    document.body.appendChild(form);
    form.submit();

  });

});

