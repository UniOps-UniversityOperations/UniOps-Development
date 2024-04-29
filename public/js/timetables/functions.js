const element1 = "degree_name";  // dropdown to select from
const element2 = "year";         // dropdown that change elements
const name1 = "Degree Name";    // select dropdown selected value before select another value
const name2 = "Year"             // change dropdown selected value before select another value

// setDropDown(element1, element2, name2);


// function setDropDown(element1, element2, name2) {

//     const thisElement = document.getElementById(element1);
//     console.log(thisElement);
//     const thisElementId = thisElement.value;
//     const setElement = document.getElementById(element2);
//     const setElementValue = setElement.value;
//     var setElementName = name2;

//     var request = new XMLHttpRequest();
//     request.open(
//         "POST",
//         "http://localhost/URMS/public/admin/timetable/add/2",
//         true
//     );
//     request.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
//     request.onreadystatechange = function () {
//         if (request.readyState === 4 && request.status === 200) {
//         const response = JSON.parse(request.responseText);

//         const selectElement = document.querySelector("#" + element2);

//         response.forEach((element) => {
//             if (element.length >= 2 && element[0] == setElementValue) {
//             setElementName = element[1];
//             }
//         });

//         if (setElementValue != undefined || setElementValue != "") {
//             setElement.innerHTML = `<option value="${setElementValue}" hidden >${setElementName}</option>`;
//         } else {
//             setElement.innerHTML = `<option hidden>${name2}</option>`;
//         }

//         response.forEach((element) => {
//             var option = document.createElement("option");
//             option.value = element[0];
//             option.innerHTML = element[1];

//             selectElement.appendChild(option);
//         });
//         }
//     };
//     request.send(thisElementId+"=" + thisElementId);
    
// }





// document.getElementById("year").onchange = function () {
//   const yearId = this.value;
//   const setElement = document.getElementById("degree_name");
//   const degreeNameValue = setElement.value;
//   var degreeNameName = "Degree Name";

//   var request = new XMLHttpRequest();
//   request.open(
//     "POST",
//     "http://localhost/URMS/public/admin/timetable/add/2",
//     true
//   );
//   request.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
//   request.onreadystatechange = function () {
//     if (request.readyState === 4 && request.status === 200) {
//       const response = JSON.parse(request.responseText);

//       const selectElement = document.querySelector("#degree_name");

//       response.forEach((element) => {
//         if (element.length >= 2 && element[0] == degreeNameValue) {
//           degreeNameName = element[1];
//         }
//       });

//       if (degreeNameValue != undefined || degreeNameValue != "") {
//         setElement.innerHTML = `<option value="${degreeNameValue}" hidden >${degreeNameName}</option>`;
//       } else {
//         setElement.innerHTML = `<option hidden>Degree Name</option>`;
//       }

//       response.forEach((element) => {
//         var option = document.createElement("option");
//         option.value = element[0];
//         option.innerHTML = element[1];

//         selectElement.appendChild(option);
//       });
//     }
//   };
//   request.send("yearId=" + yearId);
// };
