<?php $style = "createSubject"; ?>

<?php require APPROOT . '/views/includes/adminHeader.php'; ?>

<h1>Create New Subject</h1><br>

<div class="content">
    <form action="<?php echo URLROOT;?>/adminPosts/createSubject/" method="post">

        <!-- input feilds -->

        <label class="lable" for="s_code">Subject Code:
        <input type="text" id="s_code" name="s_code" placeholder="s_code" value="<?php $data["s_code"];?>" required>
        </label>

        <label class="lable" for="s_name">Subject Name:
        <input type="text" id="s_name" name="s_name" placeholder="s_name" value="<?php $data["s_name"];?>" required>
        </label>

        <label class="lable" for="s_credits">Subject Credits:
        <input type="number" id="s_credits" name="s_credits" placeholder="s_credits" value="<?php $data["s_credits"];?>" required>
        </label>

        <label class="lable" for="s_year">Subject Year:
        <input type="number" id="s_year" name="s_year" placeholder="s_year" value="<?php $data["s_year"];?>" required>
        </label>

        <label class="lable" for="s_semester">Subject Semester:
        <input type="number" id="s_semester" name="s_semester" placeholder="s_semester" value="<?php $data["s_semester"];?>" required>
        </label>

        <label class="lable" for="s_type">Subject Type (is, cs):
        <input type="text" id="s_type" name="s_type" placeholder="s_type" value="<?php $data["s_type"];?>" required>
        </label>

        <button type="submit" class="create_button">Create Subject</button>

    </form>
</div>


    <!-- Footer Section -->
    <?php require APPROOT . '/views/includes/adminFooter.php'; ?>
