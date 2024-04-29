<?php $style = "lecturecss/viewBookingGrid"; ?> 

<?php require APPROOT . '/views/includes/studentHeader.php'; ?>
<h1>Room Booking Grid</h1>

<!-- This is the Code to get the date from the url -->
<?php 
$currentURI = $_SERVER['REQUEST_URI'];
$uriSegments = explode('/', trim($currentURI, '/'));
$dateString = end($uriSegments);
$date = new dateTime($dateString);
?>

<!-- This is a code to determine tha date one month ahead of now to restric users from selecting dates more than one month ahead. -->
<?php
// Calculate the maximum allowable date (current date + 1 month)
$maxDate = (new DateTime())->add(new DateInterval('P1M'))->format('Y-m-d');
?>

<form class="date-selection-form" action = "<?php echo URLROOT."/Student/viewBookingGridDateSubmitted"; ?>" method="post" class = "date-selection-form">
    <label for="dateInput">Select Date:</label>
    <input type="date" id="dateInput" name="selectedDate" value="<?php echo $date->format('Y-m-d'); ?>" min="<?php echo date('Y-m-d'); ?>" max = "<?php echo $maxDate; ?>" required>
    <button type="submit">Show Schedule</button>
</form>



<div id="scheduleGrid">

    <!--Existing room labels and time slots will be dynamically generated here -->
    <div></div><!-- Blank div in the top left corner -->
    <?php

    /* Generate Time Slots */
        for($i=7;$i<=11;$i++){
            echo "<div class='time'>{$i}</div>";
        }
        for($i=12;$i<=19;$i++){
            echo "<div class='time'>{$i}</div>";
        }
        
        $previous = '7:00:00';
        // Iterate through bookings
        foreach ($data as $i => $booking) {
            // Check if this is not the first object retrieved
            if($i!=0){
                // Check if the room ID has changed
                if($data[$i]->id!==$data[$i-1]->id){
                    
                    /* Check if the last items booking up until  7pm has been recorded.If not make free slot*/
                    if($previous !== '19:00:00') {
                        $startTime = new DateTime($previous);
                        $previousTime = new DateTime('19:00:00');

                        // Calculate the difference(Free slot)
                        $timeDifference = $previousTime->diff($startTime)->h;
                        for($diff=1;$diff<=$timeDifference;$diff++){
                            echo "<div class='free_slot' min='{$startTime->format('H:i:s')}' max='{$previousTime->format('H:i:s')}' room_Id='{$data[$i-1]->id}'>Free</div>";
                        }
                        echo '<div></div>';/* The empty Div at the end of each row */
                    }

                    $previous = '7:00:00';

                    //New room row
                    echo "<div class='room-id'>{$data[$i]->id}</div>";
                    /* Checking whether start time is not null is for checking whether there are bookings for the room */
                    if($data[$i]->start_time !== NULL && $data[$i]->start_time !== $previous) {
                        $startTime = new DateTime($data[$i]->start_time);
                        $previousTime = new DateTime($previous);

                        $previous = $data[$i]->start_time;

                        // Calculate the difference(Free slot)
                        $timeDifference = $previousTime->diff($startTime)->h;
                        for($diff=1;$diff<=$timeDifference;$diff++){
                            echo "<div class='free_slot' min='{$previousTime->format('H:i:s')}' max='{$startTime->format('H:i:s')}' room_Id='{$data[$i]->id}'>Free</div>";
                        }

                        //
                    }

                    //This is executed if no bookings for a particular room and that room is not the first item retrieved
                    if($data[$i]->start_time==NULL) {
                        $startTime = new DateTime($previous);
                        $endTime = new DateTime('19:00:00');

                        $previous = '19:00:00';

                        // Calculate the difference(Free slot)
                        $timeDifference = $endTime->diff($startTime)->h;
                        for($diff=1;$diff<=$timeDifference;$diff++){
                            echo "<div class='free_slot' min='{$startTime->format('H:i:s')}' max='{$endTime->format('H:i:s')}' room_Id='{$data[$i]->id}'>Free</div>";
                        }

                        //The last empty div
                        echo "<div></div>";
                    }

                    if($data[$i]->start_time == $previous){
                        $startTime = new DateTime($data[$i]->start_time);
                        $endTime = new DateTime($data[$i]->end_time);

                        $previous = $data[$i]->end_time;

                        // Calculate the difference(Event/Lecture slot)
                        $timeDifference = $endTime->diff($startTime)->h;
                        for($diff=1;$diff<=$timeDifference;$diff++){
                            if($data[$i]->booking_type==='event'){
                                echo "<div class='booked' title = 'Booked By {$data[$i]->booked_by}' >{$data[$i]->booking_name}</div>";
                            } else {
                                echo "<div class='booked' title = '{$data[$i]->booked_by}' >{$data[$i]->booking_name}</div>";
                            }
                            
                        }
                    }

                }
                /* If the room id hasn't been changed */
                else{
                    if($data[$i]->start_time !==NULL && $data[$i]->start_time !== $previous) {
                        $startTime = new DateTime($data[$i]->start_time);
                        $previousTime = new DateTime($previous);

                        $previous = $data[$i]->start_time;

                        // Calculate the difference(Free slot)
                        $timeDifference = $previousTime->diff($startTime)->h;
                        for($diff=1;$diff<=$timeDifference;$diff++){
                            echo "<div class='free_slot' min='{$previousTime->format('H:i:s')}' max = '{$startTime->format('H:i:s')}' room_Id='{$data[$i]->id}'>Free</div>";
                        }

                        //
                    }
                    if($data[$i]->start_time == $previous){
                        $startTime = new DateTime($data[$i]->start_time);
                        $endTime = new DateTime($data[$i]->end_time);
                        $previous = $data[$i]->end_time;

                        // Calculate the difference(Event/Lecture slot)
                        $timeDifference = $endTime->diff($startTime)->h;
                        for($diff=1;$diff<=$timeDifference;$diff++){
                            if($data[$i]->booking_type==='event'){
                                echo "<div class='booked' title = 'Booked By {$data[$i]->booked_by}' >{$data[$i]->booking_name}</div>";
                            } else {
                                echo "<div class='booked' title = '{$data[$i]->booked_by}' >{$data[$i]->booking_name}</div>";
                            }
                        }
                    }
                }
            }
            /* If $i = 0(If this is the first item retrieved) */
            else {
                echo "<div class='room-id'>{$data[$i]->id}</div>";
                $previous = '7:00:00';
                if($data[$i]->start_time!==NULL && $data[$i]->start_time !== $previous) {
                    $startTime = new DateTime($data[$i]->start_time);
                    $previousTime = new DateTime($previous);

                    $previous = $data[$i]->start_time;

                    // Calculate the difference(Free slot)
                    $timeDifference = $previousTime->diff($startTime)->h;
                    for($diff=1;$diff<=$timeDifference;$diff++){
                        echo "<div class='free_slot' min='{$previousTime->format('H:i:s')}' max='{$startTime->format('H:i:s')}' room_Id='{$data[$i]->id}'>Free</div>";
                    }
                }

                //This is executed if no bookings for a particular room and that room is the first item retrieved
                if($data[$i]->start_time==NULL) {
                    $startTime = new DateTime($previous);
                    $endTime = new DateTime('19:00:00');

                    $previous = '19:00:00';

                    // Calculate the difference(Free slot)
                    $timeDifference = $endTime->diff($startTime)->h;
                    for($diff=1;$diff<=$timeDifference;$diff++){
                        echo "<div class='free_slot' min='{$startTime->format('H:i:s')}' max='{$endTime->format('H:i:s')}' room_Id='{$data[$i]->id}'>Free</div>";
                    }

                    //The last empty div
                    echo "<div></div>";
                }

                if($data[$i]->start_time == $previous){
                    $startTime = new DateTime($data[$i]->start_time);
                    $endTime = new DateTime($data[$i]->end_time);

                    $previous = $data[$i]->end_time;
                    // Calculate the difference(Event/Lecture slot)
                    $timeDifference = $endTime->diff($startTime)->h;
                    for($diff=1;$diff<=$timeDifference;$diff++){
                        if($data[$i]->booking_type==='event'){
                            echo "<div class='booked' title = 'Booked By {$data[$i]->booked_by}' >{$data[$i]->booking_name}</div>";
                        } else {
                            echo "<div class='booked' title = '{$data[$i]->booked_by}' >{$data[$i]->booking_name}</div>";
                        }
                    }
                }


            }
        }
        /* Check If there are free slot in last container */
        if($previous !== '19:00:00') {
            $startTime = new DateTime($previous);
            $previousTime = new DateTime('19:00:00');
            // Calculate the difference(Free slot)
            $timeDifference = $previousTime->diff($startTime)->h;
            for($diff=1;$diff<=$timeDifference;$diff++){
                echo "<div class='free_slot' min='{$startTime->format('H:i:s')}' max='{$previousTime->format('H:i:s')}' room_Id='{$data[count($data)-1]->id}'>Free</div>";
            }
            echo '<div></div>';/* The empty Div at the end of each row */
        }

        echo "</div>"; // Close the last room container
     ?>

    <div id='allocation_RequestForm'>
        
        <form action='<?php echo URLROOT."/Student/roomBookingRequest"; ?>' method='POST' id='reservation_form'>
            <h1>Fill the Below Form for Reservations<span id='close-btn'>X</span></h1>
            <input type="hidden" name='is_Grid' id='is_grid' value = 1>
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
            <label for='purpose' class='reservation_label'>Purpose:</label>
            <textarea id='purpose' name='purpose' rows='4' required></textarea>
            <button id='reservation_submit'>Submit</submit>
        </form>
    </div>

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


    <?php

// Check if the session variable is set
if (isset($_SESSION['booking_result'])) {
    // Display the message based on the session variable
    $resultMessage = $_SESSION['booking_result'] ? 'Booking Request Successful' : 'Booking Request Failed';
    
    // Create a pop-up modal using HTML and CSS
    echo '<div id="myModal" class="modal">
            <div class="modal-content">
              <p>' . $resultMessage . '</p>
              <span class="close">&times;</span>
            </div>
          </div>';
    
    // Include JavaScript to show the modal
    echo '<script>
            // Get the modal
            var modal = document.getElementById("myModal");

            // Get the <span> element that closes the modal
            var span = document.getElementsByClassName("close")[0];

            // When the page is loaded, show the modal
            window.onload = function() {
              modal.style.display = "block";
            }

            // When the user clicks on <span> (x), close the modal
            span.onclick = function() {
              modal.style.display = "none";
            }
            
            // When the user clicks anywhere outside of the modal, close it
            window.onclick = function(event) {
              if (event.target == modal) {
                modal.style.display = "none";
              }
            }
          </script>';

    // Unset the session variable to clear it
    unset($_SESSION['booking_result']);
}

?>

</div>



<script src="<?php echo URLROOT;?>/js/studentjs/viewBookingGrid.js"></script>

<?php require APPROOT . '/views/includes/studentFooter.php'; ?>