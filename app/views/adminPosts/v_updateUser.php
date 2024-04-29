<?php $style = "addUser"; ?>

<?php require APPROOT . '/views/includes/admin/adminHeader.php'; ?>

<h1>Update Adminidtrator</h1>

<div class="content">
    <form action="<?php echo URLROOT;?>/adminPosts/updateUser/<?php echo $data['user_id']; ?>" method="post">

        <!-- input feilds -->
        <fieldset>
            <label style="color : #D2042D" class="lable" for="user_id ">User ID (cannot be changed!): <?php echo $data['user_id']?></label>


            <label class="lable" for="username">User Name:
            <input type="text" name="username" id="username" value="<?php echo $data['username']; ?>" required>
            </label>

            <label class="lable" for="pwd">Password:
            <input type="password" name="pwd" id="pwd" value="<?php echo $data['pwd']; ?>" required>
            </label>

            <b><label class="lable" for="role">Role: Administator</label></b>
           
            
        </fieldset>
        <button type="submit" class="create_button">Update</button>
    </form>
</div>



<!-- Footer Section -->
<?php require APPROOT . '/views/includes/adminFooter.php'; ?>