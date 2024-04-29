<!-- this variable is used to set the css file for this view -->
<?php $style = "student/updateStudent"; ?>

<?php require APPROOT . '/views/includes/studentHeader.php'; ?>

<div class="content">
    <h1>Update Your Profile</h1>
    <form action="<?php echo URLROOT;?>/Student/updateProfile/<?php echo $data["s_id"];?>" method="POST">
    

    <!-- <div class="title">
        <h1>Profile</h1></br></br>
    </div> -->

    <fieldset>

        <label class="lable" for="s_email">Student Email:
        <input type="email" id="s_email" name="s_email" placeholder="s_email" value="<?php echo $data["s_email"];?>" required>
        </label></br>

        <label class="lable" for="s_fullName">Full Name:
        <input type="text" id="s_fullName" name="s_fullName" placeholder="s_fullName" value="<?php echo $data["s_fullName"];?>" required>
        </label></br>

        <label class="lable" for="s_nameWithInitial">Name With Initials:
        <input type="text" id="s_nameWithInitial" name="s_nameWithInitial" placeholder="s_nameWithInitial" value="<?php echo $data["s_nameWithInitial"];?>" required>
        </label></br>

        <label class="lable" for="s_contactNumber">Contact Number:
        <input type="text" id="s_contactNumber" name="s_contactNumber" placeholder="s_contactNumber" 
           value="<?php echo $data["s_contactNumber"];?>" 
           pattern="[0-9]{10}" 
           title="Please enter a 10-digit contact number" 
           required>
        </label>
               
    </fieldset>
    
    <button type="submit" class="update_button">UPDATE</button>

    </form>
</div>

<!-- <button class="update_button">Update</button> -->
    <!-- Footer Section -->
<?php require APPROOT . '/views/includes/studentFooter.php'; ?>
