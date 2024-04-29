// const courseCode = document.querySelector("#course_code");

// courseCode.addEventListener('click', () => {

    
// })

// const lectureType = document.querySelector('#lecture_type');

// lectureType.addEventListener('change', () => {

//     var form = document.createElement("form");
//     form.setAttribute("method", "POST");
//     form.setAttribute("action", "addLectureType");

//     // Create an input element for the action parameter
//     var lectureTypeInput = document.createElement("input");
//     lectureTypeInput.setAttribute("type", "hidden");
//     lectureTypeInput.setAttribute("name", "lecture_type");
//     lectureTypeInput.setAttribute("value", lectureType.value);

//     // Append the input elements to the form
//     form.appendChild(lectureTypeInput);

//     // Append the form to the body and submit it
//     document.body.appendChild(form);
//     form.submit();
// })


const lectureType = document.querySelector("#lecture_type");

lectureType.addEventListener("change", () => {

    let lecture_type = lectureType.value;

  var request = new XMLHttpRequest();
  request.open(
    "POST",
    "http://localhost/UniOps/public/timetable/addLectureType",
    true
  );
  request.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");

  request.onreadystatechange = function () {
    if (request.readyState === 4 && request.status === 200) {
      const response = JSON.parse(request.responseText);

    //   console.log(response);

      // Assuming response is an array of options (e.g., ['Option 1', 'Option 2', 'Option 3'])
      const selectElement = document.querySelector("#course_code");

      // Clear existing options
      selectElement.innerHTML = `<option hidden>Course Code</option>`;

      // Add new options based on the response
      response.forEach((optionText) => {
        const option = document.createElement("option");
        option.textContent = optionText.sub_code;
        option.value = optionText.sub_code; // You can set value if needed
        selectElement.appendChild(option);
      });
    }
  };

  request.send("lectureType=" + lecture_type);
});

