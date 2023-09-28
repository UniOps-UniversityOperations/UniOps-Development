<!-- this variable is used to set the css file for this view -->
<?php $style = "viewLectureRooms"; ?> 

<?php require APPROOT . '/views/includes/header.php'; ?>

<?php foreach($data['posts'] as $post) : ?>
    <div class="lecture_room">
        <div class="lecture_room_header">
            <h1><?php echo $post->LR_Name; ?></h1>

            <div class="action_buttons">
                <a href="<?php echo URLROOT;?>/Posts/updateLectureRoom/<?php echo $post->LR_ID ?>"><button class="update_button">Update</button></a>
                <a href=""><button class="delete_button">Delete</button></a>
            </div>

        </div>
        <div class="lecture_room_body">
            <div class="lecture_room_body_left">
                <p>Capacity: <?php echo $post->LR_Capacity; ?></p>
                <p>Current Avaliability: <?php echo $post->LR_Current_Avaliability; ?></p>
                <p>No of Chairs: <?php echo $post->LR_No_of_Chairs; ?></p>
                <p>No of Tables: <?php echo $post->LR_No_of_Tables; ?></p>
                <p>No of Bords: <?php echo $post->LR_No_of_Bords; ?></p>
                <p>No of Projectors: <?php echo $post->LR_No_of_Projectors; ?></p>
                <p>Is AC: <?php echo $post->LR_is_AC; ?></p>
                <p>Is Media: <?php echo $post->LR_is_Media; ?></p>
                <p>Is Wifi: <?php echo $post->LR_is_Wifi; ?></p>
            </div>
            <div class="lecture_room_body_right">
                <p>Is Lecture: <?php echo $post->LR_is_Lecture; ?></p>
                <p>Is Tutorial: <?php echo $post->LR_is_Tutorial; ?></p>
                <p>Is Lab: <?php echo $post->LR_is_Lab; ?></p>
                <p>Is Seminar: <?php echo $post->LR_is_Seminar; ?></p>
                <p>Is Exam: <?php echo $post->LR_is_Exam; ?></p>
                <p>Is Meeeting: <?php echo $post->LR_is_Meeeting; ?></p>
            </div>
        </div>
    </div>
<?php endforeach; ?>


<?php require APPROOT . '/views/includes/footer.php'; ?>