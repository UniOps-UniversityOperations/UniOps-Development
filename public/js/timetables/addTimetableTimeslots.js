
const days = document.querySelectorAll('.day');
days_array = [];

days.forEach(day => {
    days_array.push(day.id);
})

for(let i = 1; i <= days_array.length; i++) {

    document.querySelector('#'+days_array[i-1]).addEventListener("click", () => {
      const container = document.querySelector("#container"+i);

      if (container.style.display !== "flex") {
        container.style.display = "flex";
      } else if (container.style.display == "flex") {
        container.style.display = "none";
      }
    });
}


const timeslots = document.querySelectorAll(".timeslot-details");
timeslots_array = [];

timeslots.forEach((timeslot) => {
  timeslots_array.push(timeslot.id);
});

for (let i = 1; i <= days_array.length; i++) {
  document
    .querySelector("#" + days_array[i - 1])
    .addEventListener("click", () => {
      const container = document.querySelector("#timeslot-inner");

      if (container.style.display !== "flex") {
        container.style.display = "flex";
      } else if (container.style.display == "flex") {
        container.style.display = "none";
      }
    });
}


const lecture = document.getElementById('lecture');
const practical = document.getElementById('practical');
const tutorial = document.getElementById("tutorial");

let selectedLectureType = '';

lecture.addEventListener('change', function() {
    selectedLectureType = lecture.value;

    const room = document.getElementById("room");

    var request = new XMLHttpRequest();
    request.open(
      "POST",
      "http://localhost/UniOps/public/timetable/timetable/add/2",
      true
    );
    request.setRequestHeader(
      "Content-Type",
      "application/x-www-form-urlencoded"
    );
    request.onreadystatechange = function () {
      if (request.readyState === 4 && request.status === 200) {
        const response = JSON.parse(request.responseText);

        console.log(response);
        room.innerHTML += `<option>${response.value}</option>`;

        if (response != undefined || response != "") {
          setElement.innerHTML = `<option value="${response}" hidden >${degreeNameName}</option>`;
        } else {
          setElement.innerHTML = `<option hidden>Rooms</option>`;
        }
      }
    };
    request.send("lectureType=" + selectedLectureType);
});


practical.addEventListener('change', function() {
    selectedLectureType = practical.value;

    const room = document.getElementById("room").value;

    var request = new XMLHttpRequest();
    request.open(
      "POST",
      "http://localhost/UniOps/public/timetable/timetable/add/2",
      true
    );
    request.setRequestHeader(
      "Content-Type",
      "application/x-www-form-urlencoded"
    );
    request.onreadystatechange = function () {
      if (request.readyState === 4 && request.status === 200) {
        const response = JSON.parse(request.responseText);

        console.log(response);
        room.innerHTML = `<option value="${room}">${response}</option>`;
      }
    };
    request.send("lectureType=" + selectedLectureType);
});


tutorial.addEventListener("change", function () {
  selectedLectureType = tutorial.value;

  const room = document.getElementById('room').value;

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
      room.innerHTML = `<option value="${room}">${response}</option>`;
    }
  };
  request.send("lectureType=" + selectedLectureType);
});


