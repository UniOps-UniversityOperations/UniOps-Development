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
            <h1><?php echo $post->l_nameWithInitials; ?></h1>

            <div class="action_buttons">
                <a href="<?php echo URLROOT;?>/AdminPosts/updateLecturer/<?php echo $post->l_id ?>"><button class="update_button">Update</button></a>
                <a href="<?php echo URLROOT;?>/AdminPosts/deleteLecturer/<?php echo $post->l_id ?>"><button class="delete_button">Delete</button></a>
            </div>

        </div>
        <div class="lecture_room_body_left">
            <p><b>Lecturer Code: </b><?php echo $post->l_code; ?></p>
            <p><b>Email: </b><?php echo $post->l_email; ?></p>
            <p><b>Full Name: </b><?php echo $post->l_fullName; ?></p>

        </div>
    </div>
<?php endforeach; ?>


<?php require APPROOT . '/views/includes/adminFooter.php'; ?>


<!--
    Structure of the database table:

    table name: lecturers

    l_id (INT AUTO INCRIMENT)
    l_code (VARCHAR 50)
    l_email (VARCHAR 50)
    l_fullName (VARCHAR 50)
    l_nameWithInitials (VARCHAR 50)
    l_gender (CHAR)
    l_dob (DATE)
    l_contactNumber (VARCHAR 20)
    l_address (VARCHAR 255)
    l_department (VARCHAR 50)
    l_positionRank (VARCHAR 50)
    l_dateOfJoin (DATE)
    l_qualifications (TEXT)
    l_isExamSupervisor (BOOLEAN)
    l_isSecondExaminar (BOOLEAN)

-->
