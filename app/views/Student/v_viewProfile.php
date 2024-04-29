<?php $style = "student/viewStudent"; ?> 

<?php require APPROOT . '/views/includes/studentHeader.php'; ?>

<div class="leftsection">

    <img src="<?php echo URLROOT;?>/images/profilePictures/<?php echo $_SESSION['profilePicture']; ?>" id="profilepicture">

    <form action="<?php echo URLROOT;?>/student/uploadProfilePicture" method='POST' enctype='multipart/form-data'>
        <input type="file" name='profilePic' id='profilePicInput'>
        <button type='submit' name = 'submit'>Update</button>
    </form> 

    <button id='clearProfilePic'>Clear Profile Picture</button>
    <br>
    <div><h2><?php echo $data -> s_nameWithInitial ?></h2></div>
    <div id="rank"><h3><?php echo $data -> s_indexNumber ?></h3></div>
    <br>
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

<script src="<?php echo URLROOT;?>/js/studentjs/viewProfile.js"></script>
<?php require APPROOT . '/views/includes/studentFooter.php'; ?>