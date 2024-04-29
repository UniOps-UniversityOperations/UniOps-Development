// const addBtn = document.querySelector(".plus-btn");
// const cardContainer = document.querySelector(".card-container");
// var cardCount = 0;

// // ----------------- Add Courses --------------------------

// function addCard(e) {

//   // Create a card

//   cardCount = cardCount + 1;

//   const numOfCards = document.querySelector('.amount-container');
//   numOfCards.innerHTML = 'Number of Courses ' + cardCount;

//   e.preventDefault();

//   const card = document.createElement('div');
//   card.classList.add('card');
//   card.id = 'card'+cardCount;

//   const labels = document.createElement('div');
//   labels.classList.add('labels');

//   labels.innerHTML = '<label for="lecturer_code">Course Code</label>';
//   labels.innerHTML += '<label for="lecturer_name">Course Name</label>';

//   const inputField = document.createElement('div');
//   inputField.classList.add('input-field');

//   // Course Code select options

//   const courseCode = document.createElement('select');
//   courseCode.name = 'course_code'+ cardCount;
//   courseCode.id = 'course_code'+ cardCount;
//   courseCode.classList.add('course_code');

//   courseCode.innerHTML = '<option hidden value="" selected="">Course Code</option>'

//   const request = new XMLHttpRequest();
//   request.onreadystatechange = function () {
//     if (request.readyState === 4 && request.status === 200) {
//       const options = JSON.parse(request.responseText);

//       options.forEach((option) => {
//         courseCode.innerHTML += `<option value="${option.id}">${option.course_code}</option>`;
//       });
//     }
//   };

//   request.open(
//     "GET",
//     "http://localhost/UniOps/public/timetable/timetable/add?type=fetchCourseCodes",
//     true
//   );
//   request.send();

//     // Course Name select options

//   const courseName = document.createElement('select');
//   courseName.name = 'course_name'+ cardCount;
//   courseName.id = 'course_name'+ cardCount;

//   courseName.innerHTML = '<option hidden value="" selected="">Course Name</option>';

//   const request2 = new XMLHttpRequest();
//   request2.onreadystatechange = function () {
//     if (request2.readyState === 4 && request2.status === 200) {
//       const options2 = JSON.parse(request2.responseText);
//       options2.forEach((option) => {
//         courseName.innerHTML += `<option value="${option.id}">${option.course_name}</option>`;
//       });
//     }
//   };

//   request2.open(
//     "GET",
//     "http://localhost/UniOps/public/timetable/timetable/add?type=fetchCourseNames",
//     true
//   );
//   request2.send();

//   // Append the select options to the card

//   inputField.append(courseCode);
//   inputField.append(courseName);

//   const deleteBtn = document.createElement('div');
//   deleteBtn.classList.add('delete-lecturer');
//   deleteBtn.id = cardCount;
//   deleteBtn.type = 'button';
//   deleteBtn.innerHTML = '<button type="button">Delete</button>';

//   card.append(labels);
//   card.append(inputField);
//   card.append(deleteBtn);
//   cardContainer.append(card);

//   const deleteCard = deleteBtn.querySelector("button");

//   deleteCard.addEventListener("click", () => {
//     deleteCard.id = deleteCard.parentElement.id;
//     const cardToRemove = document.getElementById("card" + deleteCard.id);
//     if (cardToRemove) {
//       cardContainer.removeChild(cardToRemove);
//       cardCount--;
//       numOfCards.innerHTML = "Number of Courses " + cardCount;
//     }
//   });

//   document.querySelectorAll('.course_code').forEach(function(element){
//     const id = element.id;
//     console.log(id);
//     element.onchange = function(){
//       getCourseName(id);
//     }
//   });

//   // window.addEventListener('beforeunload', () => {

//   // })

// }

// --------------------------------------------------------


// -------------- Save Courses ----------------------------

const btn5 = document.querySelector('#btn5');

btn5.addEventListener('click', (e) => {

    e.preventDefault();

    var array = [];

    for(let i = 1; i <= cardCount; i++) {

      const getCard = document.querySelector('#card'+i)

      var obj = {
        key: getCard.id,
        value: [
          {
            key: getCard.querySelector("#course_code").name,
            value: getCard.querySelector("#course_code").value,
          },
          {
            key: getCard.querySelector("#course_name").name,
            value: getCard.querySelector("#course_name").value,
          },
        ],
      };

        array.push(obj);
    }

    const request = new XMLHttpRequest();

    

    request.onreadystatechange = function () {
      if (request.readyState === 4 && request.status === 200) {
        const response = JSON.parse(request.responseText);
        console.log(response)
      }
    };

    request.open(
      "POST",
      "http://localhost/UniOps/public/timetable/timetable/add/2",
      true
    );

    request.setRequestHeader(
      "Content-Type",
      "application/x-www-form-urlencoded"
    );

    request.send('submitLectureTimetableCourses=' + JSON.stringify(array));

})

// --------------------------------------------------------


// ----------------------- Get Course Code and Course Name ----------------------------


function getCourseName(element_id) {

  const courseId = document.getElementById(element_id).value;
  console.log(courseId);

  const courseName = document.getElementById('course_name'+element_id[element_id.length-1]);
  
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

      console.log(response);
      courseName.innerHTML = `<option value="${courseId}">${response}</option>`;
    }
  };
  request.send("courseId=" + courseId);
}
