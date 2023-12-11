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
            <h1><?php echo $post->sub_name; ?> (<?php echo $post->sub_code; ?>)</h1>

            <div class="action_buttons">
                <a href="<?php echo URLROOT;?>/AdminPosts/updateSubject/<?php echo $post->sub_id ?>"><button class="update_button">Update</button></a>
                <a href="<?php echo URLROOT;?>/AdminPosts/deleteSubject/<?php echo $post->sub_id ?>"><button class="delete_button">Delete</button></a>
            </div>

        </div>
        <div class="lecture_room_body_left">
            <p>Subject Code: <?php echo $post->sub_code; ?></p>
            <p>Subject Name: <?php echo $post->sub_name; ?></p>
            <p>Subject Credits: <?php echo $post->sub_credits; ?></p>
            <p>Subject Year: <?php echo $post->sub_year; ?></p>
            <p>Subject Semester: <?php echo $post->sub_semester; ?></p>
            <p>Subject Stream: <?php echo $post->sub_stream; ?></p>
            <p>Subject isCore: <?php echo $post->sub_isCore; ?></p>
            <p>Subject isHaveLecture: <?php echo $post->sub_isHaveLecture; ?></p>
            <p>Subject isHaveTutorial: <?php echo $post->sub_isHaveTutorial; ?></p>
            <p>Subject isHavePractical: <?php echo $post->sub_isHavePractical; ?></p>
            
        </div>
    </div>
<?php endforeach; ?>



<?php require APPROOT . '/views/includes/adminFooter.php'; ?>



<!-- Structure of the database table:
        sub_id
        sub_code
        sub_name
        sub_credits
        sub_year
        sub_semester
        sub_stream
        sub__isCore
        sub_isHaveLecture
        sub_isHaveTutorial
        sub_isHavePractical
        sub_isDeleted -->