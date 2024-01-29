<?php $style = "addUser"; ?>

<?php require APPROOT . '/views/includes/adminHeader.php'; ?>

<h1>Update User</h1>

<div class="content">
    <form action="<?php echo URLROOT;?>/adminPosts/updateUser/<?php echo $data['user_id']; ?>" method="post">

        <!-- input feilds -->
        <fieldset>
            <label class="lable" for="user_id ">User ID:
            <input type="text" name="user_id" id="user_id" value="<?php echo $data['user_id']; ?>" required>
            </label>

            <label class="lable" for="username">User Name:
            <input type="text" name="username" id="username" value="<?php echo $data['username']; ?>" required>
            </label>

            <label class="lable" for="pwd">pwd:
            <input type="pwd" name="pwd" id="pwd" value="<?php echo $data['pwd']; ?>" required>
            </label>

            <label class="lable" for="role">Role:
            <input type="number" name="role" id="role" value="<?php echo $data['role']; ?>" required>
            </label>
           
            
        </fieldset>
        <button type="submit" class="create_button">Update</button>
    </form>
</div>



<!-- Footer Section -->
<?php require APPROOT . '/views/includes/adminFooter.php'; ?>