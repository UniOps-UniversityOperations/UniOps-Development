<?php $style = "student/viewStudent"; ?> 

<?php require APPROOT . '/views/includes/studentHeader.php'; ?>

<div class="leftsection">

    <!-- Display user's profile picture -->
    <?php if (!empty($data->profile_picture)) : ?>
        <img src="<?php echo $data->profile_picture; ?>" id="profilepicture">
    <?php else : ?>
        <!-- If user's profile picture is not available, display a default image -->
        <img src="<?php echo URLROOT; ?>/images/profile-user.png" id="profilepicture">
    <?php endif; ?>

    <!-- Form to upload a new profile picture -->
    <form action="<?php echo URLROOT; ?>/Student/uploadProfilePicture" method="post" enctype="multipart/form-data">
        <input type="file" name="profile_picture" id="profile_picture">
        <input type="submit" value="Upload Profile Picture">
    </form>

    <div><h2><?php echo $data->s_nameWithInitial ?></h2></div>

    <div id="rank"><h3><?php echo $data->s_indexNumber ?></h3></div>
    
    <div class="create_room_button">
        <a href="<?php echo URLROOT;?>/Student/updateProfile/<?php echo $data->s_id ?>">


        
        <button class="updatebutton">Edit Details</button>
        </a>
    </div>

</div>

<div class="rightsection">
    <div class="title">
        <h1>Profile</h1></br></br>
    </div>

    <div class="content">

        <p>Full name</p>
        <div class="student_room"><?php echo $data->s_fullName ?>
        </div>
        
        <p>E mail</p>
        <div class="student_room"><?php echo $data->s_email ?>
        </div>

        <p>Registration Number</p>
        <div class="student_room"><?php echo $data->s_regNumber ?>
        </div>

        <p>Stream</p>
        <div class="student_room"><?php echo $data->s_stream ?>
        </div>

        <p>Contact Nmber</p>
        <div class="student_room"><?php echo $data->s_contactNumber ?>
        </div>
        
    </div>
</div>

<?php require APPROOT . '/views/includes/studentFooter.php'; ?>