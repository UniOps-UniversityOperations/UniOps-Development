<?php $style = "viewRooms"; ?> 

<?php require APPROOT . '/views/includes/LecturerHeader.php'; ?>

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
    <div class="timeslots">
    <p>Hellow</p>
    </div>

</div>

<script src="<?php echo URLROOT;?>/js/generaterounds.js"></script>


<?php require APPROOT . '/views/includes/lecturerFooter.php'; ?>