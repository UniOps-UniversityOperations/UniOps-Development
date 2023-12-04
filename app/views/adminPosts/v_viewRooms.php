<!-- this variable is used to set the css file for this view -->
<?php $style = "viewRooms"; ?> 

<?php require APPROOT . '/views/includes/adminHeader.php'; ?>

<h1>View Lecture Rooms / Laboratories / Meeting Rooms</h1>

<div class="create_room_button">
    <a href="<?php echo URLROOT;?>/AdminPosts/createRoom">
        <button class="create_button">Create Room</button>
    </a>
</div>


    <?php
    // Count the number of rooms for each type
    $roomTypes = [];
    foreach ($data['posts'] as $post) {
        $type = $post->type;
        if (!isset($roomTypes[$type])) {
            $roomTypes[$type] = 1;
        } else {
            $roomTypes[$type]++;
        }
    }
    ?>

    <div class="centered_container">
        <div class="room_type_counts">
            <?php
            // Display the count for each type
            foreach ($roomTypes as $type => $count) {
                echo "<div class='count_tile'>";
                echo "<div class='count_row'>";
                echo "<div class='count_column'><p>Number of \"$type rooms\":</p></div>";
                echo "<div class='count_column'><p>$count</p></div>";
                echo "</div>";
                echo "</div>";
            }
            ?>
        </div>
    </div>

<div class="search-container">
    <input type="text" id="search" placeholder="Search by room name..." >
    <span class="clear-icon" id="clear-search">&#10006;</span>
</div>

<?php foreach($data['posts'] as $post) : ?>

    <div class="lecture_room" data-room-name="<?php echo $post->name; ?>">
        <div class="lecture_room_header">
            <h2><?php echo $post->name; ?> (<?php echo $post->type; ?> room)</h2>

            <div class="action_buttons">
                <button class="view_button">View</button>
                <a href="<?php echo URLROOT; ?>/AdminPosts/updateRoom/<?php echo $post->id ?>"><button class="update_button">Update</button></a>
                <a href="<?php echo URLROOT; ?>/AdminPosts/deleteRoom/<?php echo $post->id ?>"><button class="delete_button">Delete</button></a>
            </div>
        </div>    

        <!-- Idle view -->
        <div class="idle-view">
            <div class="lecture_room_body_single_row">
            <p><b>ID / Code:</b> <?php echo $post->id; ?></p>
            <p><b>Type:</b> <?php echo $post->type; ?></p>
            <p><b>Capacity:</b> <?php echo $post->capacity; ?></p>
            <p><b>Availability:</b> <?php echo $post->current_availability; ?></p>
            </div>
        </div>

        <!-- Detailed view -->
        <div class="detailed-view" style="display: none;">
            
            <div class="lecture_room_body_single_row">
                <p><b>ID / Code:</b> <?php echo $post->id; ?></p>
                <p><b>Type:</b> <?php echo $post->type; ?></p>
                <p><b>Capacity:</b> <?php echo $post->capacity; ?></p>
                <p><b>Availability:</b> <?php echo $post->current_availability; ?></p>
                <!-- Add more details as needed -->
            </div>

            <div class="lecture_room_body">
            <div class="lecture_room_body_left">
                <p>No of Tables: <?php echo $post->no_of_tables; ?></p>
                <p>No of Chairs: <?php echo $post->no_of_chairs; ?></p>
                <p>No of Boards: <?php echo $post->no_of_boards; ?></p>
                <p>No of Projectors: <?php echo $post->no_of_projectors; ?></p>
                <p>No of Computers: <?php echo $post->no_of_computers; ?></p>
                <p>Is AC: <?php echo $post->is_ac; ?></p>
                <p>Is Wifi: <?php echo $post->is_wifi; ?></p>
                <p>Is Media: <?php echo $post->is_media; ?></p>
            </div>

            <div class="lecture_room_body_right">
                <p>Is Lecture: <?php echo $post->is_lecture; ?></p>
                <p>Is Lab: <?php echo $post->is_lab; ?></p>
                <p>Is Tutorial: <?php echo $post->is_tutorial; ?></p>
                <p>Is Meeting: <?php echo $post->is_meeting; ?></p>
                <p>Is Seminar: <?php echo $post->is_seminar; ?></p>
                <p>Is Exam: <?php echo $post->is_exam; ?></p>
            </div>
            </div>
        </div>
    </div>

    
<?php endforeach; ?>


<script>
document.addEventListener('DOMContentLoaded', function () {
    var viewButtons = document.querySelectorAll('.view_button');
    var searchInput = document.getElementById('search');
    var clearSearch = document.getElementById('clear-search');

    viewButtons.forEach(function (viewButton) {
        viewButton.addEventListener('click', function () {
            var lectureRoom = this.closest('.lecture_room');
            var idleView = lectureRoom.querySelector('.idle-view');
            var detailedView = lectureRoom.querySelector('.detailed-view');

            // Toggle the visibility of idle and detailed views
            idleView.style.display = idleView.style.display === 'none' ? 'block' : 'none';
            detailedView.style.display = detailedView.style.display === 'none' ? 'block' : 'none';
        });
    });

    searchInput.addEventListener('input', function () {
        var searchTerm = searchInput.value.toLowerCase();

        document.querySelectorAll('.lecture_room').forEach(function (lectureRoom) {
            var roomName = lectureRoom.dataset.roomName.toLowerCase();

            // Toggle the visibility based on the search term
            lectureRoom.style.display = roomName.includes(searchTerm) ? 'block' : 'none';
        });
    });

    // Clear search input when the "X" is clicked
    clearSearch.addEventListener('click', function () {
        searchInput.value = '';
        document.querySelectorAll('.lecture_room').forEach(function (lectureRoom) {
            lectureRoom.style.display = 'block'; // Show all rooms
        });
    });
});
</script>


<?php require APPROOT . '/views/includes/adminFooter.php'; ?>