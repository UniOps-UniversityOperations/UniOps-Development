<!-- this variable is used to set the css file for this view -->
<?php $style = "lecturecss/viewProfile"; ?> 

<?php require APPROOT . '/views/includes/LecturerHeader.php'; ?>

<div id="headings">
    <div class="section" id="details">Details</div>
    <div class="section" id="subjects">Subjects</div>
    <div class="section" id="timetable">Timetable</div>
</div>

<div id="body">
    

<div class="leftsection">

    <img src="<?php echo URLROOT;?>/images/profilePictures/<?php echo $_SESSION['profilePicture']; ?>" id="profilepicture">

    <div><h2><?php echo $data->l_fullName ?></h2></div>

    <div id="rank"><h3><?php echo $data->l_positionRank ?></h3></div>

    <form action="<?php echo URLROOT;?>/lecturer/uploadProfilePicture" method='POST' enctype='multipart/form-data'>
        <input type="file" name='profilePic' id='profilePicInput'>
        <button type='submit' name = 'submit'>Update</button>
    </form> 

    <button id='clearProfilePic'>Clear Profile Picture</button>

</div>

<div class="rightsection">
    <div class="title">
        <h2>User Details</h2>
    </div>

    <div class="content">

        <div class="subsection1">
            <h3 class="subsectiontitle">Personal Details</h3>
            <hr>
            <div class="subsectioncontent">
                <div class="subleft">
                    <p>Full Name :</p>
                    <?php echo $data->l_fullName ?>
                    <p>Name with Initials : </p>
                    <?php echo $data->l_nameWithInitials ?>
                </div>
                <div class="subright">
                    <p>Date of Birth :</p>
                    <?php echo $data->l_dob ?>
                    <p>Address : </p>
                    <?php echo $data->l_address ?>
                </div>
            </div>

        </div>

        <div class="subsection2">
            <h3 class="subsectiontitle">Contact Details</h3>
            <hr>
            <div class="subsectioncontent">
                <div class="subleft">
                    <p>Email :</p>
                    <?php echo $data->l_email ?>
                </div>
                <div class="subright">
                    <p>Contact Number :</p>
                    <?php echo $data->l_contactNumber ?>
                </div>
            </div>
        </div>

        <div class="subsection3">
            <h3 class="subsectiontitle">Workspace Details</h3>
            <hr>
            <div class="subsectioncontent">
                <div class="subleft">
                    <p>Rank :</p>
                    <?php echo $data->l_positionRank ?>
                    <p>Designation : </p>
                    <?php echo $data->l_nameWithInitials ?>
                </div>
                <div class="subright">
                    <p>Lecturer Code :</p>
                    <?php echo $data->l_code ?>
                    <p>Date Joined : </p>
                    <?php echo $data->l_dateOfJoin ?>
                </div>
            </div>
        </div>

        <button class="updatebutton" onclick="editProfile('<?php echo URLROOT; ?>')">Edit Details</button>  

    </div>
    
</div>

</div>

<script src="<?php echo URLROOT;?>/js/lecturerjs/viewProfile.js"></script>
<?php require APPROOT . '/views/includes/LecturerFooter.php'; ?>
