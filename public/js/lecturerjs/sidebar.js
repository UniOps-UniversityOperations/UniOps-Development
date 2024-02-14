let data = JSON.parse(document.getElementById('tbody').getAttribute('data'));

const sidebar = document.querySelector('.sidebar');
const main = document.querySelector('.main');

function toggleSidebar() {
    sidebar.classList.toggle('sidebar-open');
    main.classList.toggle('content-shifted');
    nav.classList.toggle("navclose");
  }


// Function to find an object by id
function findObjectById(id) {
  return data.find(obj => obj.id === id);
}

function viewMore(id) {
  var clickedObject = findObjectById(id);
  document.getElementById("roomIdHeader").innerHTML = clickedObject.id;
  document.getElementById("boards").innerHTML = clickedObject.no_of_boards;
  document.getElementById("projectors").innerHTML = clickedObject.no_of_projectors;
  document.getElementById("computers").innerHTML = clickedObject.no_of_computers;
  document.getElementById("AC").innerHTML = clickedObject.is_ac;
  document.getElementById("WI-FI").innerHTML = clickedObject.is_wifi;
  document.getElementById("media").innerHTML = clickedObject.is_media;
  document.getElementById("lecture").innerHTML = clickedObject.is_lecture;
  document.getElementById("lab").innerHTML = clickedObject.is_lab;
  document.getElementById("tutorial").innerHTML = clickedObject.is_tutorial;
  document.getElementById("meeting").innerHTML = clickedObject.is_meeting;
  document.getElementById("seminar").innerHTML = clickedObject.is_seminar;
  document.getElementById("exam").innerHTML = clickedObject.is_exam;
}

const toggleButtons = document.querySelectorAll('tbody > tr');

toggleButtons.forEach(toggleButton => {
    toggleButton.addEventListener('click',function()
    {

      if(!sidebar.classList.contains('sidebar-open')) {
        viewMore(toggleButton.id);
      }

      toggleSidebar();

      toggleButtons.forEach(toggleButton => {
        toggleButton.classList.remove('row-selected');
      })

      if(sidebar.classList.contains('sidebar-open')) {
        toggleButton.classList.toggle('row-selected');
        console.log("ROW CLICKED");
      }
      
    })
})

document.getElementById("view").addEventListener("click",()=>{
  let roomId = document.getElementById("roomIdHeader").innerText;
  let currentDate = new Date().toISOString().split('T')[0];
  window.location.href = urlroot + "/Lecturer/viewroombookings/"+currentDate+"/"+roomId;
})

document.getElementById('tab').addEventListener('click',()=>{
  window.location.href = urlroot + "/Lecturer/viewBookingGrid/";
})