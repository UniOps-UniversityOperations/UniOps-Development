<?php $style = "viewSubjects"; ?> 

<?php require APPROOT . '/views/includes/adminHeader.php'; ?>

<h1>View Subjects</h1>

<div class="create_room_button">
    <a href="<?php echo URLROOT;?>/AdminPosts/createSubject">
        <button class="create_button">Create Subject</button>
    </a>
</div>

<?php foreach($data['posts'] as $post) : ?>
    <div class="lecture_room">
        <div class="lecture_room_header">
            <h1><?php echo $post->s_name; ?> (<?php echo $post->s_code; ?>)</h1>

            <div class="action_buttons">
                <a href="<?php echo URLROOT;?>/AdminPosts/updateSubject/<?php echo $post->s_id ?>"><button class="update_button">Update</button></a>
                <a href="<?php echo URLROOT;?>/AdminPosts/deleteSubject/<?php echo $post->s_id ?>"><button class="delete_button">Delete</button></a>
            </div>

        </div>
        <div class="lecture_room_body_left">
            <p>Subject Code: <?php echo $post->s_code; ?></p><br>
            <p>Subject Name: <?php echo $post->s_name; ?></p><br>
            <p>Subject Credits: <?php echo $post->s_credits; ?></p><br>
            <p>Subject Year: <?php echo $post->s_year; ?></p><br>
            <p>Subject Semester: <?php echo $post->s_semester; ?></p><br>
            <p>Subject Type: <?php echo $post->s_type; ?></p>
        </div>
    </div>
<?php endforeach; ?>



<?php require APPROOT . '/views/includes/adminFooter.php'; ?>