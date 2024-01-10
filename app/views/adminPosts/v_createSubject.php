<?php $style = "createSubject"; ?>
<?php require_once '../../config/config.php' ?>

<?php require APPROOT . '/views/includes/adminHeader.php'; ?>

<h1>Create New Subject</h1><br>

<div class="content">
    <form action="<?php echo URLROOT;?>/adminPosts/createSubject" method="post">

    <fieldset>
        <!-- input feilds -->

        <label class="lable" for="sub_code">Subject Code:
        <input type="text" id="sub_code" name="sub_code" placeholder="sub_code" value="<?php $data["sub_code"];?>" required>
        </label>

        <label class="lable" for="sub_name">Subject Name:
        <input type="text" id="sub_name" name="sub_name" placeholder="sub_name" value="<?php $data["sub_name"];?>" required>
        </label>

        <label class="lable" for="sub_credits">Subject Credits:
        <input type="text" id="sub_credits" name="sub_credits" placeholder="sub_credits" value="<?php $data["sub_credits"];?>" required>
        </label>

        <label class="lable" for="sub_year">Subject Year:
        <input type="text" id="sub_year" name="sub_year" placeholder="sub_year" value="<?php $data["sub_year"];?>" required>
        </label>

        <label class="lable" for="sub_semester">Subject Semester:
        <input type="text" id="sub_semester" name="sub_semester" placeholder="sub_semester" value="<?php $data["sub_semester"];?>" required>
        </label>

        <label class="lable" for="sub_stream">Subject Stream:
        <input type="text" id="sub_stream" name="sub_stream" placeholder="sub_stream" value="<?php $data["sub_stream"];?>" required>
        </label>
        
    </fieldset>
        <!-- Checkeck boxes -->

        <fieldset>

        <label>
        <input type="checkbox" class="inline"  id="is_ac" name="sub_isCore" value="true">
        Is a Core Subject</label>

        <label>
        <input type="checkbox" class="inline"  id="is_al" name="sub_isHaveLecture" value="true">
        Has a Lecture</label>

        <label>
        <input type="checkbox" class="inline"  id="is_al" name="sub_isHaveTutorial" value="true">
        Has a Tutorial</label>

        <label>
        <input type="checkbox" class="inline"  id="is_al" name="sub_isHavePractical" value="true">
        Has a Practical</label>
        
        </fieldset>

        <button type="submit" class="create_button">Create Room</button>
    </form>
</div>



    <!-- Footer Section -->
    <?php require APPROOT . '/views/includes/adminFooter.php'; ?>


    <!-- Structure of the database table:
        sub_id
        sub_code
        sub_name
        sub_credits
        sub_year
        sub_semester
        sub_stream
        sub_isCore
        sub_isHaveLecture
        sub_isHaveTutorial
        sub_isHavePractical
        sub_isDeleted -->
