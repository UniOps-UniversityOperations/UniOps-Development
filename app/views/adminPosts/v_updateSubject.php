<?php $style = "createRoom"; ?>

<?php require APPROOT . '/views/includes/adminHeader.php'; ?>

<!-- Body -->
    <div class="content">
        <h1>Update Subject Information</h1>

        <form action="<?php echo URLROOT;?>/AdminPosts/updateSubject/<?php echo $data["s_id"];?>" method="POST">

            <fieldset>

            <label class="lable" for="s_id">Subject ID:
            <input type="text" id="s_id" name="s_id" placeholder="s_id" value="<?php echo $data["s_id"];?>" required>
            </label>

            <label class="lable" for="s_code">Subject Code:
            <input type="text" id="s_code" name="s_code" placeholder="s_code" value="<?php echo $data["s_code"];?>" required>
            </label>

            <label class="lable" for="s_name">Subject Name:
            <input type="text" id="s_name" name="s_name" placeholder="s_name" value="<?php echo $data["s_name"];?>" required>
            </label>

            <label class="lable" for="s_credits">Subject Credits:
            <input type="number" id="s_credits" name="s_credits" placeholder="s_credits" value="<?php echo $data["s_credits"];?>" required>
            </label>

            <label class="lable" for="s_year">Subject Year:
            <input type="number" id="s_year" name="s_year" placeholder="s_year" value="<?php echo $data["s_year"];?>" required>
            </label>

            <label class="lable" for="s_semester">Subject Semester:
            <input type="number" id="s_semester" name="s_semester" placeholder="s_semester" value="<?php echo $data["s_semester"];?>" required>
            </label>

            <label class="lable" for="s_type">Subject Type (is, cs):
            <input type="text" id="s_type" name="s_type" placeholder="s_type" value="<?php echo $data["s_type"];?>" required>
            </label>

            <button type="submit" class="create_button" >UPDATE</button>
            </fieldset>
        </form>



    </div>


    <!-- Footer Section -->
<?php require APPROOT . '/views/includes/adminFooter.php'; ?>