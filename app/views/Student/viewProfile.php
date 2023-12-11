<!-- this variable is used to set the css file for this view -->
<?php $style = "viewStudent"; ?> 

<?php require APPROOT . '/views/includes/studentHeader.php'; ?>

<h1>Profile</h1>

    <div class="student_profile">
        <div class="student_profile_header">
            <h1>W.A.K.Perera</h1>

            <div class="action_buttons">
                <a href="<?php echo URLROOT;?>/Student/updateprofile/"><button class="update_button">Update</button></a>
            </div>

            <div class="action_buttons">
                <a href="<?php echo URLROOT;?>/Student/deleteprofile/"><button class="update_button">Delete</button></a>
            </div>

        </div>
        <div class="student_profile_body">
            <div class="student_profile_body_left">
                <p>ID: </p>
                <p>Full Name: </p>
                <p>Name With Initia: </p>
                <p>Index Number: </p>
                <p>Registration Number: </p>
                <p>Index Number: </p>
            </div>
            <div class="student_profile_body_right">
                <p>Course details: </p>
            </div>
        </div>
    </div>


<?php require APPROOT . '/views/includes/studentFooter.php'; ?>