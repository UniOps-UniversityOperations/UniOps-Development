let data = JSON.parse(document.getElementById('bookings').getAttribute('data'));

const sidebar = document.querySelector('.sidebar');
const main = document.querySelector('.main');

function toggleSidebar() {
    sidebar.classList.toggle('sidebar-open');
    main.classList.toggle('content-shifted');
    nav.classList.toggle("navclose");
  }

function viewEvent(clickedObject) {
  sidebar.innerHTML = "<div id='sidebar-header'><div id='datetime'> "+
  document.querySelector('.room-name p').textContent+ "<br>" +
  clickedObject.start_time+" - " + clickedObject.end_time +
  "</div><h2><span id='close-btn'>X</span></h2></div>"+
  "<div id = 'otherdetails'>"+
  "<p>Event   :- "+clickedObject.event+"</P>"+
  "<p>Booked By :- "+clickedObject.booked_by+"</p>"+
  "</div>";
}

function viewSubject(clickedObject) {
  sidebar.innerHTML = "<div id='sidebar-header'><div id='datetime'> "+
  document.querySelector('.room-name p').textContent+ "<br>" +
  clickedObject.start_time+" - " + clickedObject.end_time +
  "</div><h2><span id='close-btn'>X</span></h2></div>"+
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

function reserve(start_time,end_time) {
  var sidebar = document.getElementById('eventdetailspanel');
  sidebar.innerHTML = `
  <form action='${urlroot}/Lecturer/roomBookingRequest' method='POST' id='reservation_form'>
  <div id ='sidebar-header'><h2 id='requestformh2'>Reservations <span id='close-btn' class='clsbtnres'>X</span></h2></div>
  <p><h3 id="room_name"></h3></p>
  <p><h3 id="date_of_request_form"></h3></p>
  
  <input type="hidden" name='is_Grid' id='is_grid' value=0>

  <input type="hidden" name = 'request_date' id= 'booking_date' value = "">
  <input type="hidden" name = 'r_id' id = 'r_id' value = "">

  <label for='startTime' class='reservation_label'>Start Time:</label>
  <select id='startTime' name='startTime' required>
      <!-- Add options for each hour -->
  </select>

  <label for='endTime' class='reservation_label'>End Time:</label>
  <select id='endTime' name='endTime' required>
      <!-- Add options for each hour -->
  </select>

  <label for="droplistpurpose" class='reservation_label'>Purpose :</label>
  <select name="droplistpurpose" id="droplistpurpose">
    <option value="Lecture">Lecture</option>
    <option value="Tutorial">Tutorial</option>
    <option value="Lab">Lab Practical</option>
    <option value="Other">Other</option>
  </select>


  <label for='purpose' class='reservation_label'>Description:</label>
  <textarea id='purpose' name='purpose' rows='4' required></textarea>
  <button id='reservation_submit'>Submit</button>
</form>

<!-- Following pop Up would apear upon clicking the reservation form submit button asking the confirmation from user -->
<div id="reservationPopup" class="popup">
  <div class="popup-content">
      <p>Are you sure you want to submit the request?</p>

      <div id="button_Container">
          <button class = "yes-btn" onclick="confirmSubmission()">Yes</button>
          <button class = "no-btn" onclick="closeConfirmationPopup()">No</button>
      </div>
  </div>
</div>
  `
  document.getElementById('room_name').innerHTML = "Room Id : " + document.getElementById('roomid').textContent;
  document.getElementById('date_of_request_form').innerHTML = "Date : " + document.getElementById('dateInput').value;
  var startTimeSelect = document.getElementById('startTime');
  var endTimeSelect = document.getElementById('endTime');
  // Clear existing options
  startTimeSelect.innerHTML = '';
  endTimeSelect.innerHTML = '';
  for(var i = new Date("2000-01-01 "+start_time).getHours(); i<new Date("2000-01-01 "+end_time).getHours(); i++){
      var option = document.createElement('option');
      option.value = i;
      option.text = i;
      startTimeSelect.add(option);
      var endOption = document.createElement('option');
      endOption.value = i+1;
      endOption.text = i+1;
      endTimeSelect.add(endOption);
  }
}



const toggleButtons = document.querySelectorAll('.event');

toggleButtons.forEach(toggleButton => {
    toggleButton.addEventListener('click',function()
    {

      if(!sidebar.classList.contains('sidebar-open')) {
        if(toggleButton.id){
            viewMore(toggleButton.id);
        }else {
          reserve(toggleButton.getAttribute('start_time'),toggleButton.getAttribute('end_time'));

          /* The below is the logic to check whether the start time less than end time */
          var reservation_form = document.getElementById('reservation_form');
          var startTimeSelect = document.getElementById('startTime');
          var endTimeSelect = document.getElementById('endTime');

          reservation_form.addEventListener('submit',(event)=>{
            // Get selected start and end times
            var selectedStartTime = startTimeSelect.value;
            var selectedEndTime = endTimeSelect.value;
            if (parseInt(selectedStartTime) >= parseInt(selectedEndTime)) {
                // Display an error message (you can customize this part)
                alert("End time must be later than start time. Please select valid times.");
                
                // Prevent form submission
                event.preventDefault();
            } else {
                //If Times are valid open confirmation popup
                openConfirmationPopup();

                //Prevent Form Submission untill Confirmation
                event.preventDefault();
            }
          

          });
        }  
      }
      const close_btn = document.getElementById('close-btn');

      close_btn.addEventListener('click',() => {
        toggleSidebar();
        toggleButtons.forEach(toggleButton => {
          toggleButton.classList.remove('row-selected');
        });
      });

      toggleSidebar();

      toggleButtons.forEach(toggleButton => {
        toggleButton.classList.remove('row-selected');
      });

      if(sidebar.classList.contains('sidebar-open')) {
        toggleButton.classList.toggle('row-selected');
      }
      
    });
})



// Function to open the confirmation popup
function openConfirmationPopup() {
  document.getElementById('reservationPopup').style.display = 'block';
}

// Function to close the confirmation popup
function closeConfirmationPopup() {
  document.getElementById('reservationPopup').style.display = 'none';
}

// Function to confirm the submission and submit the form
function confirmSubmission() {

  document.getElementById('booking_date').value = document.getElementById('dateInput').value;
  document.getElementById('r_id').value = document.getElementById('roomid').textContent;
  document.getElementById('reservation_form').submit();
}

