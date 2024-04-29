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
  return data.find(obj => obj.name === id);
}

function viewMore(id) {
  var clickedObject = findObjectById(id);
  document.getElementById("roomIdHeader").innerHTML = clickedObject.name;
  document.getElementById("boards").innerHTML = clickedObject.no_of_boards;
  document.getElementById("projectors").innerHTML = clickedObject.no_of_projectors;
  document.getElementById("computers").innerHTML = clickedObject.no_of_computers;

  document.getElementById("AC").innerHTML = clickedObject.is_ac? '✓' : '✘';
  document.getElementById("AC").classList.add(clickedObject.is_ac? 'greenCheck' : 'redCross');

  document.getElementById("WI-FI").innerHTML = clickedObject.is_wifi ? '✓' : '✘';
  document.getElementById("WI-FI").classList.add(clickedObject.is_wifi? 'greenCheck' : 'redCross');

  document.getElementById("media").innerHTML = clickedObject.is_media ? '✓' : '✘';
  document.getElementById("media").classList.add(clickedObject.is_media? 'greenCheck' : 'redCross');

  document.getElementById("lecture").innerHTML = clickedObject.is_lecture ? '✓' : '✘';
  document.getElementById("lecture").classList.add(clickedObject.is_lecture? 'greenCheck' : 'redCross');

  document.getElementById("lab").innerHTML = clickedObject.is_lab ? '✓' : '✘';
  document.getElementById("lab").classList.add(clickedObject.is_lab? 'greenCheck' : 'redCross');

  document.getElementById("tutorial").innerHTML = clickedObject.is_tutorial ? '✓' : '✘';
  document.getElementById("tutorial").classList.add(clickedObject.is_tutorial? 'greenCheck' : 'redCross');

  document.getElementById("meeting").innerHTML = clickedObject.is_meeting ? '✓' : '✘';
  document.getElementById("meeting").classList.add(clickedObject.is_meeting? 'greenCheck' : 'redCross');

  document.getElementById("seminar").innerHTML = clickedObject.is_seminar ? '✓' : '✘';
  document.getElementById("seminar").classList.add(clickedObject.is_seminar? 'greenCheck' : 'redCross');

  document.getElementById("exam").innerHTML = clickedObject.is_exam ? '✓' : '✘';
  document.getElementById("exam").classList.add(clickedObject.is_exam? 'greenCheck' : 'redCross');
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
      }
      
    })
})

document.getElementById("view").addEventListener("click",()=>{
  let roomId = document.getElementById("roomIdHeader").innerText;
  let currentDate = new Date().toISOString().split('T')[0];
  window.location.href = urlroot + "/Lecturer/viewroombookings/"+currentDate+"/"+roomId;
})

document.getElementById('tab').addEventListener('click',()=>{
  window.location.href = urlroot + "/Lecturer/viewBookingGridDateSubmitted/";
})


//Filter Function
function searchRooms() {
  var filter,tbody,tr,td,i,txtvalue;
  filter = document.getElementById('searchInput').value.toUpperCase();
  tbody = document.getElementById('tbody');
  tr = tbody.getElementsByTagName('tr');

  for(i=0; i< tr.length; i++) {
    id = tr[i].getElementsByClassName('id')[0];
    if(id){
      txtvalue = id.textContent || id.innerText;
      if(txtvalue.toUpperCase().indexOf(filter) > -1) {
        tr[i].style.display = '';
      }else {
        tr[i].style.display = 'none';
      }
    }
  }

}

/* Filter Function */

document.getElementById('filter').addEventListener('change', function() {
  var filterValue = this.value.toUpperCase();
  var tbody = document.getElementById('tbody');
  var tr = tbody.getElementsByTagName('tr');

  for (var i = 0; i < tr.length; i++) {
    var td = tr[i].getElementsByTagName('td')[1]; // Assuming the second TD contains the type
    if (td) {
      if (filterValue === 'ALL' || td.textContent.toUpperCase() === filterValue) {
        tr[i].style.display = '';
      } else {
        tr[i].style.display = 'none';
      }
    }
  }
});
