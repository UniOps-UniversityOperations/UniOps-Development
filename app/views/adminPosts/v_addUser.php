<?php $style = "addUser"; ?>

<?php require APPROOT . '/views/includes/adminHeader.php'; ?>

<h1>Add New User</h1>

<div class="content">
    <form action="<?php echo URLROOT;?>/adminPosts/addUser/" method="post">

        <!-- input feilds -->
        <fieldset>
            <label class="lable" for="user_id ">User ID:
            <input type="text" name="user_id" id="user_id" placeholder="user_id" value="<?php $data['user_id']; ?>" required>
            </label>

            <label class="lable" for="username">User Name:
            <input type="text" name="username" id="username" placeholder="username" value="<?php $data['username']; ?>" required>
            </label>

            <label class="lable" for="pwd">pwd:
            <input type="pwd" name="pwd" id="pwd" placeholder="pwd" value="<?php $data['pwd']; ?>" required>
            </label>

            <label class="label" for="role">Role:
                <select id="role" name="role" required>
                    <option value="a">Administator</option>
                    <option value="l">Lecturer</option>
                    <option value="i">Instructor</option>
                    <option value="s">Student</option>
                </select>
            </label>
           
            
        </fieldset>
        <button type="submit" class="create_button">Add User</button>
    </form>
</div>



<!-- Footer Section -->
<?php require APPROOT . '/views/includes/adminFooter.php'; ?>



