
function viewTimeslot(row) {

      var form = document.createElement("form");
      form.setAttribute("method", "POST");
      form.setAttribute("action", "viewTimetable");
      // Create an input element for the action parameter
      var timetable_id = document.createElement("input");
      timetable_id.setAttribute("type", "hidden");
      timetable_id.setAttribute("name", "id");
      timetable_id.setAttribute("value", row.id);

    //   var academic_year = document.createElement("input");
    //   academic_year.setAttribute("type", "hidden");
    //   academic_year.setAttribute("name", "academic_year");
    //   academic_year.setAttribute(
    //     "value",
    //     row.querySelector(".first-column").textContent
    //   );


      form.appendChild(timetable_id);
    //   form.appendChild(academic_year);

      document.body.appendChild(form);
      form.submit();
}

function editTimetable(row) {
    console.log(row);
}
