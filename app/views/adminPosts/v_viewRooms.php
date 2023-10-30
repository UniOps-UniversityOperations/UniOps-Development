<!-- this variable is used to set the css file for this view -->
<?php $style = "viewRooms"; ?> 

<?php require APPROOT . '/views/includes/adminHeader.php'; ?>

<h1>View Lecture Rooms / Laboratories / Meeting Rooms</h1>

<div class="create_room_button">
    <a href="<?php echo URLROOT;?>/AdminPosts/createRoom">
        <button class="create_button">Create Room</button>
    </a>
</div>


<?php foreach($data['posts'] as $post) : ?>
    <div class="lecture_room">
        <div class="lecture_room_header">
            <h1><?php echo $post->name; ?> (<?php echo $post->type; ?> room)</h1>

            <div class="action_buttons">
                <a href="<?php echo URLROOT;?>/AdminPosts/updateRoom/<?php echo $post->id ?>"><button class="update_button">Update</button></a>
                <a href="<?php echo URLROOT;?>/AdminPosts/deleteRoom/<?php echo $post->id ?>"><button class="delete_button">Delete</button></a>
            </div>

        </div>
        <div class="lecture_room_body">
            <div class="lecture_room_body_left">
                <p>ID / Code: <?php echo $post->id; ?></p>
                <p>Type: <?php echo $post->type; ?></p>
                <p>Capacity: <?php echo $post->capacity; ?></p>
                <p>Current Availability: <?php echo $post->current_availability; ?></p>
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
<?php endforeach; ?>


<?php require APPROOT . '/views/includes/adminFooter.php'; ?>