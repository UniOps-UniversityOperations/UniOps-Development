
<?php $style = "viewRooms"; ?> 

<?php require APPROOT . '/views/includes/LecturerHeader.php'; ?>

<h1>View Rooms</h1>

<div class="create_room_button">
    <a href="<?php echo URLROOT;?>/AdminPosts/createLecturer">
        <button class="create_button">Request Resources</button>
    </a>
</div>

    <div class="lecture_room">
        <div class="lecture_room_header">
            <h1>E401 (Lecture Room) </h1>


        </div>
        <div class="lecture_room_body_left">
            <p>ID / Code: 1</p>
            <p>Type: Lecture</p>
            <p>Capacity: 200</p>
            <p>Current Availability: 1</p>
            <p>No of Chairs: 100</p>
            <p>No of Boards: 2</p>
            <p>No of Projectors: 2</p>
    
        </div>

        <div class="lecture_room_header">
            <h1>E208 (Mini Auditorium) </h1>


        </div>
        <div class="lecture_room_body_left">
            <p>ID / Code: 2</p>
            <p>Type: Lecture</p>
            <p>Capacity: 100</p>
            <p>Current Availability: 0</p>
            <p>No of Chairs: 50</p>
            <p>No of Boards: 2</p>
            <p>No of Projectors: 2</p>
    
        </div>
    </div>


<?php require APPROOT . '/views/includes/lecturerFooter.php'; ?>