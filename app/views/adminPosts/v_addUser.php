<?php $style = "addUser"; ?>

<?php require APPROOT . '/views/includes/adminHeader.php'; ?>

<h1>Add New User</h1>

<div class="content">
    <form action="<?php echo URLROOT;?>/adminPosts/addUser/" method="post">

        <!-- input feilds -->
        <fieldset>
            <label class="lable" for="user_id ">User ID:
            <input type="text" name="user_id" id="user_id" value="<?php echo $data['user_id']; ?>" required>
            </label>

            <label class="lable" for="username">User Name:
            <input type="text" name="username" id="username" value="<?php echo $data['username']; ?>" required>
            </label>

            <label class="lable" for="password">Password:
            <input type="password" name="password" id="password" value="<?php echo $data['password']; ?>" required>
            </label>

            <label class="lable" for="role">Role:
            <input type="number" name="role" id="role" value="<?php echo $data['role']; ?>" required>
            </label>
           
            
        </fieldset>
        <button type="submit" class="create_button">Add User</button>
    </form>
</div>



<!-- Footer Section -->
<?php require APPROOT . '/views/includes/adminFooter.php'; ?>