let data = JSON.parse(document.getElementById('bookings').getAttribute('data'));

const sidebar = document.querySelector('.sidebar');
const main = document.querySelector('.main');

function toggleSidebar() {
    sidebar.classList.toggle('sidebar-open');
    main.classList.toggle('content-shifted');
    nav.classList.toggle("navclose");
  }

function viewEvent(clickedObject) {
  sidebar.innerHTML = "<div id='datetime'> "+
  document.querySelector('.room-name p').textContent+ "<br>" +
  clickedObject.start_time+" - " + clickedObject.end_time +
  "</div>"+
  "<div id = 'otherdetails'>"+
  "<p>Event   :- "+clickedObject.event+"</P>"+
  "<p>Booked By :- "+clickedObject.booked_by+"</p>"+
  "</div>";
}

function viewSubject(clickedObject) {
  sidebar.innerHTML = "<div id='datetime'> "+
  document.querySelector('.room-name p').textContent+ "<br>" +
  clickedObject.start_time+" - " + clickedObject.end_time +
  "</div>"+
  "<div id = 'otherdetails'>"+
  "<p>Event   :- "+clickedObject.event+"</P>"+
  "<p>Subject :- "+clickedObject.subject+"</p>"+
  "</div>";
}

function viewMore(key) {
  var clickedObject = data[key];
  if (clickedObject.subject === null) {
    console.log("ViewEvent");
    viewEvent(clickedObject);
  } else {
    viewSubject(clickedObject);
  }
}

function reserve() {
  sidebar.innerHTML = "<h1>Fill the Below Form for Reservations</h1>"+
  "<form action='' method='POST' id='reservation_form'>"+
  "<label for='startTime' class='reservation_label'>Start Time:</label>"+
  "<input type='time' id='startTime' name='startTime' required></input>"+
  "<label for='endTime' class='reservation_label'>End Time:</label>"+
  "<input type='time' id='endTime' name='endTime' required>"+
  "<label for='purpose' class='reservation_label'>Purpose:</label>"+
  "<textarea id='purpose' name='purpose' rows='4' required></textarea>"+
  "<button id='reservation_submit'>Submit</submit>"
  "</form>";
}


const toggleButtons = document.querySelectorAll('.event');

toggleButtons.forEach(toggleButton => {
    toggleButton.addEventListener('click',function()
    {

      if(!sidebar.classList.contains('sidebar-open')) {
        if(toggleButton.id){
            viewMore(toggleButton.id);
        }else {
          reserve();
        }  
      }

      toggleSidebar();

      toggleButtons.forEach(toggleButton => {
        toggleButton.classList.remove('row-selected')
      })

      if(sidebar.classList.contains('sidebar-open')) {
        toggleButton.classList.toggle('row-selected');
      }
      
    })
})

