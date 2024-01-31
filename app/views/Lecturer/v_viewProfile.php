<!-- this variable is used to set the css file for this view -->
<?php $style = "viewProfile"; ?> 

<?php require APPROOT . '/views/includes/LecturerHeader.php'; ?>

<div class="leftsection">

    <img src="<?php echo URLROOT;?>/images/default.jpeg" id="profilepicture">

    <div><h2><?php echo $data->l_fullName ?></h2></div>

    <div id="rank"><h3><?php echo $data->l_positionRank ?></h3></div>

    <button class="updatebutton">Edit Details</button>

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

    </div>
    
</div>

<?php require APPROOT . '/views/includes/LecturerFooter.php'; ?>