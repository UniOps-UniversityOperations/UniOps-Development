<?php $style = "lecturecss/viewBookingGrid"; ?> 

<?php require APPROOT . '/views/includes/LecturerHeader.php'; ?>
<h1>Room Booking Grid</h1>

<form class="date-selection-form" action = "<?php echo URLROOT."/Lecturer/viewBookingGrid"; ?>" method="post" class = "date-selection-form">
    <label for="dateInput">Select Date:</label>
    <input type="date" id="dateInput" name="selectedDate">
    <button type="submit">Show Schedule</button>
</form>
<div id="scheduleGrid">
    
    <!-- Your existing room labels and time slots will be dynamically generated here -->
    <!-- <div class="grid-container"> -->
    <div></div><!-- Blank div in the top left corner -->
    <?php
    /* Generate Time Slots */
    for($i=7;$i<=19;$i++){
        echo "<div class='time'>{$i}</div>";
    }

    // Iterate through bookings
    foreach ($data as $i => $booking) {
        // Check if this is not the first object retrieved
        if($i!=0){
            // Check if the room ID has changed
            if($data[$i]->id!=$data[$i-1]->id){
                if($previous != '19:00:00') {
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
                echo "<div class='room-id'>{$data[$i]->id}</div>";
                if($data[$i]->start_time != $previous) {
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
            /* If the room id hasn't been changed */
            else{
                if($data[$i]->start_time != $previous) {
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
            if($data[$i]->start_time != $previous) {
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
    /* Check If there are free slot in last container */
    if($previous != '19:00:00') {
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
