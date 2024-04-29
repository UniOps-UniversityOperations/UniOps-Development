// Get all elements with class name 'free_slot'
var freeSlots = document.querySelectorAll('.free_slot');
var allocationRequestForm = document.getElementById('allocation_RequestForm');
var close_btn = document.getElementById('close-btn')
var startTimeSelect = document.getElementById('startTime');
var endTimeSelect = document.getElementById('endTime');
var reservation_form = document.getElementById('allocation_RequestForm');
var booking_Date = document.getElementById('booking_date');
 
// Add click event listener to each element
freeSlots.forEach(function(slot) {
    slot.addEventListener('click', function() {
        // Handle click event for each free slot
        var minTime = slot.getAttribute('min');
        var maxTime = slot.getAttribute('max');
        // Clear existing options
        startTimeSelect.innerHTML = '';
        endTimeSelect.innerHTML = '';
        for(var i = new Date("2000-01-01 "+minTime).getHours(); i<new Date("2000-01-01 "+maxTime).getHours(); i++){
            var option = document.createElement('option');
            option.value = i;
            option.text = i;
            startTimeSelect.add(option);
            var endOption = document.createElement('option');
            endOption.value = i+1;
            endOption.text = i+1;
            endTimeSelect.add(endOption);
        }

        var r_id = slot.getAttribute('room_Id');
        document.getElementById('r_id').value = r_id;
        document.getElementById('room_name').innerHTML = "Room Id :- "+r_id;
        document.getElementById('date_of_request_form').innerHTML = "Date :- " + document.getElementById('dateInput').value

        allocationRequestForm.style.display = 'block';

    });
});

close_btn.addEventListener('click',()=>{
    allocationRequestForm.style.display = 'none';
});

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
    booking_Date.value = document.getElementById('dateInput').value;
    document.getElementById('reservation_form').submit();
  }
  
  
