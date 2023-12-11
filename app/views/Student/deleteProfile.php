<!-- this variable is used to set the css file for this view -->
<?php $style = "updateProfile"; ?>

<?php require APPROOT . '/views/includes/studentHeader.php'; ?>

<div class="content">
    <h1>Update Your Profile</h1>
    <form action="<?php echo URLROOT;?>/Student/deleteProfile/>" method="POST">

        <!-- input feilds -->
        <fieldset>

        <label class="lable" for="id">ID / Code :
        <input type="text" id="id" name="id" placeholder="id" value="001" required>
        </label>

        <label class="lable" for="fname">First Name :
        <input type="text" id="fname" name="fname" placeholder="fname" value="Sunil" required>
        </label>

        <label class="lable" for="lname">Last Name:
        <input type="text" id="lname" name="lname" placeholder="lname" value="Perera" required>
        </label>

        <label class="lable" for="email">Email address :
        <input type="text" id="email" name="email" placeholder="email" value="sunil123@gmaik]l.com" required>
        </label>

        <label class="lable" for="city">City/town:
        <input type="text" id="city" name="city" placeholder="city" value="Colombo" required>
        </label>

        </fieldset>
    </form>
</div>
<button class="update_button">Delete</button>
    <!-- Footer Section -->
<?php require APPROOT . '/views/includes/studentFooter.php'; ?>