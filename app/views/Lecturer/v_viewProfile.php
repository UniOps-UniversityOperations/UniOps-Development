<!-- this variable is used to set the css file for this view -->
<?php $style = "viewProfile"; ?> 

<?php require APPROOT . '/views/includes/LecturerHeader.php'; ?>

<h1>Profile</h1>

    <div class="lecture_profile">
        <div class="lecture_profile_header">
            <h1>Mr. Kamal Perera</h1>

            <div class="action_buttons">
                <a href="<?php echo URLROOT;?>/Lecturer/updateprofile/"><button class="update_button">Update</button></a>
            </div>

        </div>
        <div class="lecture_profile_body">
            <div class="lecture_profile_body_left">
                <p>ID / Code: 001</p>
                <p>First Name: Kamal</p>
                <p>Last Name: Perera</p>
                <p>Expertise: Networking</p>
                <p>Subjects Willing to teach: DSA</p>
            </div>
            <div class="lecture_profile_body_right">
                <p>Total Number of subjects Assigned: 3 </p>
                <p>Number of hours of lectures per week: 20</p>
            </div>
        </div>
    </div>


<?php require APPROOT . '/views/includes/LecturerFooter.php'; ?>