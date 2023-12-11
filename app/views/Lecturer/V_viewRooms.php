<?php $style = "viewRooms"; ?> 

<?php require APPROOT . '/views/includes/LecturerHeader.php'; ?>

<div class="sidebar"  id="eventdetailspanel">
    <div class="sidebar-content">
        <h2>Event Details</h2>
        <p id="event-details">Some Data</p>
    </div>

</div>

<h1>View Rooms</h1>

<div class="content">
    <!--Tabs Section -->
    <div class="tabs-section">
        <div class="tab" onclick="showTabContent('lecture-halls')">Lecture Halls</div>
        <div class="tab" onclick="showTabContent('laboratories')">Laboratories</div>
        <div class="tab" onclick="showTabContent('meeting-rooms')">Meeting Rooms</div>
        <div class="tab" onclick="showTabContent('exam-halls')">Exam Halls</div>
        <div class="tab" onclick="showTabContent('auditorium')">Auditorium</div>
    </div>
    <div class="search-bar">
        <input type="text" placeholder="Type the Room Id" onkeyup="search(event)">
        <img src= "<?php echo URLROOT;?>/images/magnifyingglass.svg" class="search-icon" id="Search-Input" alt="Magnifying Glass">
    </div>
</div>

<div class="room-name">
    <h2>E401</h2>
    <p><?php echo date("d, F y")?></p>
</div>

<div class="room-schedule">
    <div class="navigatedays">
        <p class="day"><?php echo date('l')?></p>
        <div class="left-arrow">
            <img src= "<?php echo URLROOT;?>/images/leftarrow.svg" alt="Lefi Arrow">
        </div>
        <div class="rounds-container">

        </div>
        <div class="right-arrow">
            <img src= "<?php echo URLROOT;?>/images/rightarrow.svg" alt="Right Arrow">
        </div>

    </div>
    <div class="bookings">
    <?php
    $previousEnd = '08:00:00';
    if(!is_array($data)){
        echo $data;
    }
    else{
        //$halfwaypoints decide how many items go to left section and how many go to right section
        $halfwayPoint = ceil(count($data)/2); 
        foreach($data as $key => $booking ){
            if($key == 0){//The item from 0 through to the halfwaypoint go to left side
                echo "<div class='left-section'>";
            }
            else if($key==$halfwayPoint){ //Once the halfway point reaches we need to create the div for right hand side
                //div closing tag for closing the leftside div and starting the right side
                echo "</div>
                    <div class = 'right-section'>
                ";
            }
            
            //This creates a free time slots if there's time between previous event's end and this event's start times
            if($booking->start_time != $previousEnd){
                echo "
                    <div class='timeslot'>".
                    $previousEnd." - ".
                    $booking->start_time."
                    <span class='event'>Free Slot</span>
                    </div>
                ";
            }

            //Showing the booked event along with the time slot
            echo "
                <div class='timeslot'>".
                $booking->start_time." - ".
                $booking->end_time."
                <span class='event'>".$booking->event."</span>
                </div>
            ";
            $previousEnd = $booking->end_time;
        }

        //Our websites shows the time slots untill 7pm
        if($previousEnd != '17:00:00'){
            echo "
                <div class='timeslot'>".
                $previousEnd." - 19:00:00
                <span class='event'>Free Slot</span>
                </div>
            ";
        }
    }
        ?>
        </div><!--Closing div for the right section --> 
</div><!--Closing div for the bookings--> 

</div><!--Closing div for the room schedules --> 

<script src="<?php echo URLROOT;?>/js/generaterounds.js"></script>
<script src="<?php echo URLROOT;?>/js/sidebar.js"></script>


<?php require APPROOT . '/views/includes/lecturerFooter.php'; ?>