<?php $style = "createLecturers"; ?>

<?php require APPROOT . '/views/includes/adminHeader.php'; ?>

<h1>Update Lecturer</h1>

<div class="content">
    <form action="<?php echo URLROOT;?>/AdminPosts/updateLecturer/<?php echo $data["l_id"];?>" method="POST">

    <fieldset>
        <label class="lable" for="l_id">Lecturer ID:
        <input type="text" id="l_id" name="l_id" placeholder="l_id" value="<?php echo $data["l_id"];?>" required>
        </label>

        <label class="lable" for="l_name">Lecturer Name:
        <input type="text" id="l_name" name="l_name" placeholder="l_name" value="<?php echo $data["l_name"];?>" required>
        </label>

        <label class="lable" for="l_email">Lecturer Email:
        <input type="text" id="l_email" name="l_email" placeholder="l_email" value="<?php echo $data["l_email"];?>" required>
        </label>

        <label class="lable" for="l_sub1_code">Lecturer Assigned Subject 1 Code:
        <input type="text" id="l_sub1_code" name="l_sub1_code" placeholder="l_sub1_code" value="<?php echo $data["l_sub1_code"];?>">
        </label>

        <label class="lable" for="l_sub2_code">Lecturer Assigned Subject 2 Code:
        <input type="text" id="l_sub2_code" name="l_sub2_code" placeholder="l_sub2_code" value="<?php echo $data["l_sub2_code"];?>">
        </label>

        <label class="lable" for="l_sub3_code">Lecturer Assigned Subject 3 Code:
        <input type="text" id="l_sub3_code" name="l_sub3_code" placeholder="l_sub3_code" value="<?php echo $data["l_sub3_code"];?>">
        </label>

        <label class="lable" for="l_exp1_code">Lecturer Expertise Subject 1 Code:
        <input type="text" id="l_exp1_code" name="l_exp1_code" placeholder="l_exp1_code" value="<?php echo $data["l_exp1_code"];?>">
        </label>

        <label class="lable" for="l_exp2_code">Lecturer Expertise Subject 2 Code:
        <input type="text" id="l_exp2_code" name="l_exp2_code" placeholder="l_exp2_code" value="<?php echo $data["l_exp2_code"];?>">
        </label>

        <label class="lable" for="l_exp3_code">Lecturer Expertise Subject 3 Code:
        <input type="text" id="l_exp3_code" name="l_exp3_code" placeholder="l_exp3_code" value="<?php echo $data["l_exp3_code"];?>">
        </label>

        <label class="lable" for="l_second_examinar_s_code">Lecturer Second Examinar Subject Code:
        <input type="text" id="l_second_examinar_s_code" name="l_second_examinar_s_code" placeholder="l_second_examinar_s_code" value="<?php echo $data["l_second_examinar_s_code"];?>">
        </label>
    </fieldset>

    <fieldset>
        <label class="lable" for="l_is_exam_supervisor">
        <input type="checkbox" class="inline" id="l_is_exam_supervisor" name="l_is_exam_supervisor" value="1" <?php echo $data["l_is_exam_supervisor"] == 1 ? 'checked' : '';?>>
        Is An Exam Supervisor</label>
    </fieldset>

    <button type="submit" class="create_button">UPDATE</button>

    </form>
</div>

<!-- Footer Section -->
<?php require APPROOT . '/views/includes/adminFooter.php'; ?>