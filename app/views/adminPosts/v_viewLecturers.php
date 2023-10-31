<?php $style = "viewLecturers"; ?> 

<?php require APPROOT . '/views/includes/adminHeader.php'; ?>

<h1>View Lecturers</h1>

<div class="create_room_button">
    <a href="<?php echo URLROOT;?>/AdminPosts/createLecturer">
        <button class="create_button">Create Lecturer</button>
    </a>
</div>

<?php foreach($data['posts'] as $post) : ?>
    <div class="lecture_room">
        <div class="lecture_room_header">
            <h1><?php echo $post->l_name; ?></h1>

            <div class="action_buttons">
                <a href="<?php echo URLROOT;?>/AdminPosts/updateLecturer/<?php echo $post->l_id ?>"><button class="update_button">Update</button></a>
                <a href="<?php echo URLROOT;?>/AdminPosts/deleteLecturer/<?php echo $post->l_id ?>"><button class="delete_button">Delete</button></a>
            </div>

        </div>
        <div class="lecture_room_body_left">
            <p><b>Email: </b><?php echo $post->l_email; ?></p>
            <p><b>Assigned Subject 1 Code: </b><?php echo $post->l_sub1_code; ?></p>
            <p><b>Assigned Subject 2 Code: </b><?php echo $post->l_sub2_code; ?></p>
            <p><b>Assigned Subject 3 Code: </b><?php echo $post->l_sub3_code; ?></p>
            <p><b>Expertise Subject 1 Code: </b><?php echo $post->l_exp1_code; ?></p>
            <p><b>Expertise Subject 2 Code: </b><?php echo $post->l_exp2_code; ?></p>
            <p><b>Expertise Subject 3 Code: </b><?php echo $post->l_exp3_code; ?></p>
            <p><b>Second Examinar Subject Code: </b><?php echo $post->l_second_examinar_s_code; ?></p>
            <p><b>Is An Exam Supervisor: </b><?php echo $post->l_is_exam_supervisor; ?></p>
        </div>
    </div>
<?php endforeach; ?>


<?php require APPROOT . '/views/includes/adminFooter.php'; ?>