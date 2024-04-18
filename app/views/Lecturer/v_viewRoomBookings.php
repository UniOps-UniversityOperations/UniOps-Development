<?php $style = "lecturecss/viewRoomBookings";
$data_json = json_encode($data);
/*This is a variable use to calculate all the slots that is gonna be displayed on the website(The total Number of 
room bookings,lecture bookings and free slots)*/
$count = 0;
$rightsectionexist = false;//BOOLEAN value to keep track of whether a right section exist and based on the existence to echo the closing div tag.
?> 

<?php require APPROOT . '/views/includes/LecturerHeader.php'; ?>

<div class="sidebar sidebar-content"  id="eventdetailspanel">

</div>

<h1>View Room Bookings</h1>

<?php
    $urlPath = $_SERVER['REQUEST_URI'];
    $segments = explode('/', trim($urlPath, '/'));
    $dateString = $segments[count($segments) - 2];
    $date = new dateTime($dateString);

// This is a code to determine tha date one month ahead of now to restric users from selecting dates more than one month ahead. -->
// Calculate the maximum allowable date (current date + 1 month)
$maxDate = (new DateTime())->add(new DateInterval('P1M'))->format('Y-m-d');
?>

<div class="room-name">
    <h2><?php echo basename($urlPath) ;?></h2>
    <p><?php echo $date->format('d, F Y'); ?></p>
</div>

<div class="room-schedule">
    <div class="navigatedays">
        <p class="day"><?php echo $date->format('l'); ?></p>
        <form action="<?php echo URLROOT."/Lecturer/bookingDateSubmitted"; ?>" method="post" class = "date-selection-form">
            <input type="hidden" name="room_id" value="<?php echo basename($urlPath) ; ?>">
            <label for="dateInput">Select a Date: </label>
            <input type="date" id="dateInput" name="selectedDate" value="<?php echo $date->format('Y-m-d'); ?>" min="<?php echo date('Y-m-d'); ?>" max = "<?php echo $maxDate; ?>" required>
            <button type="submit">Submit</button>
        </form>


    </div>
    <hr>
    <div id="bookings" data="<?php echo htmlspecialchars($data_json, ENT_QUOTES, 'UTF-8'); ?>">
    <?php
    $previousEnd = '08:00:00';
    if(!is_array($data)){
        //echo $data;
        echo "<div class='left-section'> 
        <div class='timeslot'>".
        $previousEnd." - 19:00:00
        <span class='event' start_time = '".$previousEnd."' end_time = '19:00:00'>Free Slot</span>
        </div>
    ";
    }

    //The logic to calculate the total number of slots starts here.
    else{
        $previous = '08:00:00';
        foreach($data as $booking){
            $count++;
            if($booking->start_time != $previous){
                $count++;
            }
            $previous = $booking->end_time;
        }
        if($previous != '19:00:00' ) {
            $count++;
        }
        //The logic to calculate the total number of slots Ends here.

        //echo $count;
        //$halfwaypoints decide how many items go to left section and how many go to right section
        $halfwayPoint = ceil($count/2); 
        $count = -1;
        foreach($data as $key => $booking ){
            if($count == -1){//The item from 0 through to the halfwaypoint go to left side
                echo "<div class='left-section'>";
            }

            //This creates a free time slots if there's time between previous event's end and this event's start times
            if($booking->start_time != $previousEnd){
                $count++;
                if($count==$halfwayPoint){ //Once the halfway point reaches we need to create the div for right hand side
                    //div closing tag for closing the leftside div and starting the right side
                    $rightsectionexist = true;
                    echo "</div>
                        <div class = 'right-section'>
                    ";
                }

                echo "
                    <div class='timeslot'>".
                    $previousEnd." - ".
                    $booking->start_time."
                    <span class='event' start_time = '".$previousEnd."' end_time = '".$booking->start_time."'>Free Slot</span>
                    </div>
                ";
            }

            //Showing the booked event along with the time slot
            $count++;
            if($count==$halfwayPoint){ //Once the halfway point reaches we need to create the div for right hand side
                //div closing tag for closing the leftside div and starting the right side
                $rightsectionexist = true;
                echo "</div>
                    <div class = 'right-section'>
                ";
            }
            echo "
                <div class='timeslot'>".
                $booking->start_time." - ".
                $booking->end_time."
                <span class='event' id='".$key."'>".$booking->event."</span>
                </div>
            ";
            $previousEnd = $booking->end_time;
        }

        //Our websites shows the time slots untill 7pm
        if($previousEnd != '19:00:00'){
            $count++;
            if($count==$halfwayPoint){ //Once the halfway point reaches we need to create the div for right hand side
                //div closing tag for closing the leftside div and starting the right side
                $rightsectionexist = true;
                echo "</div>
                    <div class = 'right-section'>
                ";
            }
            echo "
                <div class='timeslot'>".
                $previousEnd." - 19:00:00
                <span class='event' start_time = '".$previousEnd."' end_time = '19:00:00'>Free Slot</span>
                </div>
            ";
        }
    }

    if($rightsectionexist){
        echo "</div>";//<!--Closing div for the right section -->
    }

        ?>
         
    </div><!--Closing div for the bookings--> 

</div><!--Closing div for the room schedules --> 

<script src="<?php echo URLROOT;?>/js/lecturerjs/viewRoomBookingsSidebar.js"></script>


<?php require APPROOT . '/views/includes/LecturerFooter.php'; ?>