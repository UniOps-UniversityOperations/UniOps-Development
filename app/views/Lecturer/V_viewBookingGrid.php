<?php $style = "lecturecss/viewBookingGrid"; ?> 

<?php require APPROOT . '/views/includes/LecturerHeader.php'; ?>
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

<form class="date-selection-form" action = "<?php echo URLROOT."/Lecturer/viewBookingGridDateSubmitted"; ?>" method="post" class = "date-selection-form">
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
            echo "<div class='time'>{$i}am</div>";
        }
        for($i=12;$i<=19;$i++){
            echo "<div class='time'>{$i}pm</div>";
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
                            echo "<div class='free_slot'>Free</div>";
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
                            echo "<div class='free_slot'>Free</div>";
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
                            echo "<div class='free_slot'>Free</div>";
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
                            echo "<div class='free_slot'>Free</div>";
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
                            echo "<div class='booked'>{$data[$i]->booking_name}</div>";
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
                        echo "<div class='free_slot'>Free</div>";
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
                        echo "<div class='free_slot'>Free</div>";
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
                        echo "<div class='booked'>{$data[$i]->booking_name}</div>";
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
                echo "<div class='free_slot'>Free</div>";
            }
            echo '<div></div>';/* The empty Div at the end of each row */
        }

        echo "</div>"; // Close the last room container
     ?>
</div>

<?php require APPROOT . '/views/includes/LecturerFooter.php'; ?>
