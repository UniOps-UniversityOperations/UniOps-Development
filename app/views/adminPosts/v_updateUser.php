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

            <!-- <label class="label" for="role">Role:
                <select id="role" name="role" required>
                    <option value="a">Administator</option>
                    <option value="l">Lecturer</option>
                    <option value="i">Instructor</option>
                    <option value="s">Student</option>
                </select>
            </label> -->

            <label class="lable" for="role">Role:
            <select id="role" name="role" required>
                <option value="a" <?php echo ($data["role"] == 'a') ? 'selected' : ''; ?>>Administator</option>
                <option value="l" <?php echo ($data["role"] == 'l') ? 'selected' : ''; ?>>Lecturer</option>
                <option value="i" <?php echo ($data["role"] == 'i') ? 'selected' : ''; ?>>Instructor</option>
                <option value="s" <?php echo ($data["role"] == 's') ? 'selected' : ''; ?>>Student</option>
            </select>
            </label>
           
            
        </fieldset>
        <button type="submit" class="create_button">Update</button>
    </form>
</div>



<!-- Footer Section -->
<?php require APPROOT . '/views/includes/adminFooter.php'; ?>