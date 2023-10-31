<?php $style = "viewInstructors"; ?> 

<?php require APPROOT . '/views/includes/adminHeader.php'; ?>

<h1>View Instructors</h1>

<div class="create_room_button">
    <a href="<?php echo URLROOT;?>/AdminPosts/createInstructor">
        <button class="create_button">Create Instructor</button>
    </a>
</div>

<?php foreach($data['posts'] as $post) : ?>
    <div class="lecture_room">
        <div class="lecture_room_header">
            <h1><?php echo $post->i_name; ?></h1>

            <div class="action_buttons">
                <a href="<?php echo URLROOT;?>/AdminPosts/updateInstructor/<?php echo $post->i_id ?>"><button class="update_button">Update</button></a>
                <a href="<?php echo URLROOT;?>/AdminPosts/deleteInstructor/<?php echo $post->i_id ?>"><button class="delete_button">Delete</button></a>
            </div>

        </div>
        <div class="lecture_room_body_left">
            <p><b>Email: </b><?php echo $post->i_email; ?></p>
            <p><b>Assigned Subject 1 Code: </b><?php echo $post->i_sub1_code; ?></p>
            <p><b>Assigned Subject 2 Code: </b><?php echo $post->i_sub2_code; ?></p>
            <p><b>Assigned Subject 3 Code: </b><?php echo $post->i_sub3_code; ?></p>
            <p><b>Expertise Subject 1 Code: </b><?php echo $post->i_exp1_code; ?></p>
            <p><b>Expertise Subject 2 Code: </b><?php echo $post->i_exp2_code; ?></p>
            <p><b>Expertise Subject 3 Code: </b><?php echo $post->i_exp3_code; ?></p>
        </div>
    </div>
<?php endforeach; ?>



<!-- Footer Section -->
<?php require APPROOT . '/views/includes/adminFooter.php'; ?>