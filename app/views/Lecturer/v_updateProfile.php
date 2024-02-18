<!-- this variable is used to set the css file for this view -->
<?php $style = "lecturecss/updateProfile"; ?>

<?php require APPROOT . '/views/includes/lecturerHeader.php'; ?>

<h1>Update Your Profile</h1>

<form action="<?php echo URLROOT;?>/lecturer/updateProfile/>" method="POST">

    <!-- input feilds -->
    <fieldset>

        <label class="lable" for="fullname">Full Name :
        <input type="text" id="fullname" name="fullname" value ="" >
        </label>

        <label class="lable" for="namewithinitials">Name With Initials :
        <input type="text" id="namewithinitials" name="namewithinitials" value="">
        </label>

        <label class="lable" for="male">Male
        <input type="radio" id="male" name="gender" value="male">
        </label>

        <label class="lable" for="female">Female
        <input type="radio" id="female" name="gender" value="female">
        </label>

        <label class="lable" for="other">Other
        <input type="radio" id="other" name="gender" value="other">
        </label>

        <label class="lable" for="birthday">Birthday : 
        <input type="date" id="birthday" name="birthday" value="">
        </label>

        <label class="lable" for="contactnumber">Contact Number : 
        <input type="tel" id="contactnumber" name="contactnumber" value="">
        </label>
        
        <label class="lable" for="address">Address : 
        <input type="text" id="address" name="address" value="">
        </label>

    </fieldset>
</form>

<button type="submit" class="create_button">UPDATE</button>

    <!-- Footer Section -->
<?php require APPROOT . '/views/includes/lecturerFooter.php'; ?>

