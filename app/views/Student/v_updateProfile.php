<!-- this variable is used to set the css file for this view -->
<?php $style = "updateProfile"; ?>

<?php require APPROOT . '/views/includes/studentHeader.php'; ?>

<div class="content">
    <h1>Update Your Profile</h1>
    <form action="<?php echo URLROOT;?>/lecturer/updateRoom/>" method="POST">

        <!-- input feilds -->
        <fieldset>

        <label class="lable" for="id">ID / Code :
        <input type="text" id="id" name="id" placeholder="id" value="001" required>
        </label>

        <label class="lable" for="fname">First Name :
        <input type="text" id="fname" name="fname" placeholder="fname" value="Kamal" required>
        </label>

        <label class="lable" for="lname">Last Name:
        <input type="text" id="lname" name="lname" placeholder="lname" value="Perera" required>
        </label>

        <label class="lable" for="expertise">Expertise :
        <input type="text" id="expertise" name="expertise" placeholder="expertise" value="Networking" required>
        </label>

        <label class="lable" for="Subjects Willing to teach">Subjects Willing to teach :
        <input type="text" id="Subjects Willing to teach" name="Subjects Willing to teach" placeholder="Subjects Willing to teach" value="DSA" required>
        </label>

        </fieldset>
    </form>
</div>
<button class="update_button">Update</button>
    <!-- Footer Section -->
<?php require APPROOT . '/views/includes/studentFooter.php'; ?>
