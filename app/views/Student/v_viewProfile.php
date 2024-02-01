<!-- this variable is used to set the css file for this view -->
<?php $style = "viewProfile"; ?> 

<?php require APPROOT . '/views/includes/studentHeader.php'; ?>

<div class="leftsection">

    <img src="<?php echo URLROOT;?>/images/default.jpeg" id="profilepicture">

    <div><h2><?php echo $data->s_fullName ?></h2></div>

    <div id="rank"><h3><?php echo $data->s_indexNumber ?></h3></div>

    
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
                    <?php echo $data->s_fullName ?>
                    <p>Name with Initials : </p>
                    <?php echo $data->s_nameWithInitial ?>
                </div>
                <div class="subright">
                    <p>Date of Birth :</p>
                    <?php echo $data->s_dob ?>
                    <p>Registration Number : </p>
                    <?php echo $data->s_regNumber ?>
                </div>
            </div>

        </div>

        <div class="subsection2">
            <h3 class="subsectiontitle">Contact Details</h3>
            <hr>
            <div class="subsectioncontent">
                <div class="subleft">
                    <p>Email :</p>
                    <?php echo $data->s_email ?>
                </div>
                <div class="subright">
                    <p>Contact Number :</p>
                    <?php echo $data->s_contactNumber ?>
                </div>
            </div>
        </div>

        <div class="subsection3">
            <h3 class="subsectiontitle">Workspace Details</h3>
            <hr>
            <div class="subsectioncontent">
                <div class="subleft">
                    <p>Year :</p>
                    <?php echo $data->s_year ?>
                    <p>Designation : </p>
                    <?php echo $data->s_nameWithInitial ?>
                </div>
                <div class="subright">
                    <p>Student Code :</p>
                    <?php echo $data->s_code ?>
                    <p>Stream : </p>
                    <?php echo $data->s_stream ?>
                </div>
            </div>
        </div>

    </div>
    
</div>

<?php require APPROOT . '/views/includes/studentFooter.php'; ?>