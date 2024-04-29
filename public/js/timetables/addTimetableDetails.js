
const form4 = document.querySelector("#form4");
const btn4 = document.querySelector("#btn4");


// btn4.addEventListener("click", (e) => {

//   // const year = document.querySelector("#year");
//   // const year = document.querySelector("#year");

//   e.preventDefault();

//   const inputs = form4.querySelectorAll("input, select");

//   var array = [];

//   inputs.forEach((input) => {
//     var obj = {
//       key: input.name,
//       value: input.value
//     };

//     array.push(obj);
//   });

//   // console.log(array)

//   var request = new XMLHttpRequest();
//   request.open(
//     "POST",
//     "http://localhost/UniOps/public/timetable/timetable/add/2",
//     true
//   );
//   request.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
//   request.onreadystatechange = function () {
//     if (request.readyState === 4 && request.status === 200) {
//     }
//   };
//   request.send("submitLectureTimetableDetails=" + JSON.stringify(array));
// });




document.getElementById("degree_name").onchange = function () {

  const degreeNameId = this.value;
  const setElement = document.getElementById("year");
  const yearValue = setElement.value;
  var yearName = "Year";

  var request = new XMLHttpRequest();
  request.open(
    "POST",
    "http://localhost/UniOps/public/timetable/timetable/add/2",
    true
  );
  request.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
  request.onreadystatechange = function () {
    if (request.readyState === 4 && request.status === 200) {
      const response = JSON.parse(request.responseText);

      const selectElement = document.querySelector("#year");

      response.forEach((element) => {
        if (element.length >= 2 && element[0] == yearValue) {
          yearName = element[1];
        }
      });


      if(yearValue != undefined || yearValue != "") {
        setElement.innerHTML = `<option value="${yearValue}" hidden >${yearName}</option>`
      }
      else {
        setElement.innerHTML = `<option hidden>Year</option>`
      }
      

      response.forEach((element) => {
        var option = document.createElement("option");
        option.value = element[0];
        option.innerHTML = element[1];

        selectElement.appendChild(option);
      });
    }
  };
  request.send("degreeNameId=" + degreeNameId);
}



document.getElementById("year").onchange = function () {

  const yearId = this.value;
  const setElement = document.getElementById("degree_name");
  const degreeNameValue = setElement.value;
  var degreeNameName = "Degree Name";

  var request = new XMLHttpRequest();
  request.open(
    "POST",
    "http://localhost/UniOps/public/timetable/timetable/add/2",
    true
  );
  request.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
  request.onreadystatechange = function () {
    if (request.readyState === 4 && request.status === 200) {
      const response = JSON.parse(request.responseText);

      const selectElement = document.querySelector("#degree_name");

      response.forEach((element) => {
        if (element.length >= 2 && element[0] == degreeNameValue) {
          degreeNameName = element[1];
        }
      });


      if (degreeNameValue != undefined || degreeNameValue != "") {
        setElement.innerHTML = `<option value="${degreeNameValue}" hidden >${degreeNameName}</option>`;
      } else {
        setElement.innerHTML = `<option hidden>Degree Name</option>`;
      }


      response.forEach((element) => {

        var option = document.createElement("option");
        option.value = element[0];
        option.innerHTML = element[1];

        
        selectElement.appendChild(option);
      });
       
    }
  };
  request.send("yearId=" + yearId);
};

