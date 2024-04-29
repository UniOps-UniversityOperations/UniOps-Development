const edit = document.querySelector('#edit-timetable');

edit.addEventListener('click', () => {

    var form = document.createElement("form");
    form.setAttribute("method", "POST");
    form.setAttribute("action", "editTimetable");
    // Create an input element for the action parameter
    var timetable_id = document.createElement("input");
    timetable_id.setAttribute("type", "hidden");
    timetable_id.setAttribute("name", "id");
    timetable_id.setAttribute("value", edit.id);

    form.appendChild(timetable_id);
    //   form.appendChild(academic_year);

    document.body.appendChild(form);
    form.submit();

})
