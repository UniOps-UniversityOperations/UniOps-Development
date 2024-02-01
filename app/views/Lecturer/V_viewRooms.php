<?php $style = "lecturecss/viewRooms"; 
$data_json = json_encode($data);
?> 


<?php require APPROOT . '/views/includes/LecturerHeader.php'; ?>

<div class="sidebar"  id="room">
    <div class="sidebar-content">
        <h2 id="roomIdHeader">Room Details </h2>
        <p class = "item-title">Number of Boards <span class = "item-value" id="boards"></span></p>
        <p class = "item-title">Number of Computers <span class = "item-value" id="computers"></span></p>
        <p class = "item-title">Is_AC <span class = "item-value" id="AC"></span></p>
        <p class = "item-title">Is_WIFI <span class = "item-value" id="WI-FI"></span></p>
        <p class = "item-title">Number of Projectors <span id="projectors"></span> </p>
        <p class = "item-title">Is_Media <span class = "item-value" id="media"></span></p>
        <p class = "item-title">Is_Lecture <span class = "item-value" id="lecture"></span></p>
        <p class = "item-title">Is_Lab <span class = "item-value" id="lab"></span></p>
        <p class = "item-title">Is_Tutorial <span class = "item-value" id="tutorial"></span></p>
        <p class = "item-title">Is_Meeting <span class = "item-value" id="meeting"></span></p>
        <p class = "item-title">Is_Seminar <span class = "item-value" id="seminar"></span></p>
        <p class = "item-title">Is_Exam <span class = "item-value" id="exam"></span></p>
    </div>

    <button class = "view" id="view">View</button>

</div>

<h1>View Rooms</h1>

<div class="content">
    <!--Tabs Section -->
    <div class="tabs-section">
        <div class="tab" onclick="showTabContent('lecture-halls')">Lecture Rooms</div>
        <div class="tab" onclick="showTabContent('laboratories')">Laboratories</div>
        <div class="tab" onclick="showTabContent('meeting-rooms')">Meeting Rooms</div>
        <div class="tab" onclick="showTabContent('exam-halls')">Other</div>
    </div>
    <div class="search-bar">
        <input type="text" placeholder="Type the Room Id" onkeyup="search(event)">
        <img src= "<?php echo URLROOT;?>/images/magnifyingglass.svg" class="search-icon" id="Search-Input" alt="Magnifying Glass">
    </div>
</div>

<div class="rooms">

    <table class="styled-table">
        <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Type</th>
                <th>Capacity</th>
                <th>No_Of_Tables</th>
                <th>No_Of_Chairs</th>
            </tr>
        </thead>
        <tbody id="tbody" data="<?php echo htmlspecialchars($data_json, ENT_QUOTES, 'UTF-8'); ?>">

            <?php
            foreach ($data as $row) {
                echo '<tr id="'.$row->id.'">';
                echo '<td>'.$row->id.'</td>';
                echo '<td>'.$row->name.'</td>';
                echo '<td>'.$row->type.'</td>';
                echo '<td>'.$row->capacity.'</td>';
                echo '<td>'.$row->no_of_tables.'</td>';
                echo '<td>'.$row->no_of_chairs.'</td>';
                echo '</tr>';
            } ?>
        </tbody>
    </table>

</div>

</div>

<script src="<?php echo URLROOT;?>/js/sidebar.js"></script>


<?php require APPROOT . '/views/includes/lecturerFooter.php'; ?>
