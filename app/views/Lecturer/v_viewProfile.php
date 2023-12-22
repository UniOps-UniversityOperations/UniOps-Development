<!-- this variable is used to set the css file for this view -->
<?php $style = "viewProfile"; ?> 

<?php require APPROOT . '/views/includes/LecturerHeader.php'; ?>

    <h1>Your Profile</h1>

    <div class="general-info">

        <div class="general-info-header">
            <h1>User Info</h1>
        </div>

        <div class="general-info-body">

            <div class="upper-section">

                <div class="upper-left">

                    <img src="<?php echo URLROOT;?>/profilepictures/profile.jpeg" alt="profile pic" id="profile_picture">

                </div>

                <div class="upper-right">

                    <p class="item">Lecturer Code
                        <span class="detail"><?php echo $data->l_code ?></span>
                    </p>

                    <p class="item">Full Name 
                        <span class="detail"><?php echo $data->l_fullName ?></span>
                    </p>

                </div>

            </div>

            <div class="lower-section">

                <div class="lower-left">

                    <p class="item">Email 
                        <span class="detail"><?php echo $data->l_email ?></span>
                    </p>

                    <p class="item">Contact Number 
                        <span class="detail"><?php echo $data->l_contactNumber ?></span>
                    </p>

                    <p class="item">Adress 
                        <span class="detail"><?php echo $data->l_address ?></span>
                    </p>

                    <p class="item">Date of Birth
                        <span class="detail"><?php echo $data->l_dob ?></span>
                    </p>

                    <p class="item">Gender
                        <span class="detail"><?php echo $data->l_gender ?></span>
                    </p>

                </div>

                <div class="lower-right">

                    <p class="item">Name With Intials 
                        <span class="detail"><?php echo $data->l_nameWithInitials ?></span>
                    </p>

                    <p class="item">Departement
                        <span class="detail"><?php echo $data->l_departement ?></span>
                    </p>

                    <p class="item">Rank
                        <span class="detail"><?php echo $data->l_positionRank ?></span>
                    </p>

                    <p class="item">Date of Join
                        <span class="detail"><?php echo $data->l_dateOfJoin ?></span>
                    </p>

                    <p class="item">Qualifications
                        <span class="detail"><?php echo $data->l_qualifications ?></span>
                    </p>

                </div>

            </div>
              
        </div>
    
    </div>

<?php require APPROOT . '/views/includes/LecturerFooter.php'; ?>