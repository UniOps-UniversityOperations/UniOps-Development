<?php $style = "lecturecss/viewBookingGrid"; ?> 

<?php require APPROOT . '/views/includes/LecturerHeader.php'; ?>
<h1>Room Booking Grid</h1>

<form id="dateSelectionForm" action = "<?php echo URLROOT."/Lecturer/viewBookingGrid"; ?>" method="post" class = "date-selection-form">
    <label for="dateInput">Select Date:</label>
    <input type="date" id="dateInput" name="selectedDate">
    <button type="submit">Show Schedule</button>
</form>

<div id="scheduleGrid">
    <!-- Your existing room labels and time slots will be dynamically generated here -->
    <!-- <div class="grid-container"> -->
    <div></div><!-- Blank div in the top left corner -->
    <?php
    for($i=1;$i<18;$i++){
        echo "<div>{$i}</div>";
    }
    $previous = '8:00:00';
    foreach ($data as $i => $booking) {
        if($i!=0){
            if($data[$i]->id!=$data[$i-1]->id){
                echo "<div class='room-id'>{$data[$i]->id}";
            }
        }
    }
     ?>
</div>

<?php require APPROOT . '/views/includes/LecturerFooter.php'; ?>
