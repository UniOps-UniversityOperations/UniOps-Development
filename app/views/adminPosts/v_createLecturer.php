<?php $style = "createLecturers"; ?>

<?php require APPROOT . '/views/includes/adminHeader.php'; ?>

<h1>Create New Lecturer</h1>

<div class="content">
    <form action="<?php echo URLROOT;?>/adminPosts/createLecturer/" method="post">

        <!-- input feilds -->

        <fieldset>
            <label class="lable" for="l_name">Lecturer Name:
            <input type="text" id="l_name" name="l_name" placeholder="l_name" value="<?php $data["l_name"];?>" required>
            </label>

            <label class="lable" for="l_email">Lecturer Email:
            <input type="text" id="l_email" name="l_email" placeholder="l_email" value="<?php $data["l_email"];?>" required>
            </label>

            <label class="lable" for="l_sub1_code">Lecturer Assigned Subject 1 Code:
            <input type="text" id="l_sub1_code" name="l_sub1_code" placeholder="l_sub1_code" value="<?php $data["l_sub1_code"];?>">
            </label>
            
            <label class="lable" for="l_sub2_code">Lecturer Assigned Subject 2 Code:
            <input type="text" id="l_sub2_code" name="l_sub2_code" placeholder="l_sub2_code" value="<?php $data["l_sub2_code"];?>">
            </label>

            <label class="lable" for="l_sub3_code">Lecturer Assigned Subject 3 Code:
            <input type="text" id="l_sub3_code" name="l_sub3_code" placeholder="l_sub3_code" value="<?php $data["l_sub3_code"];?>">
            </label>

            <label class="lable" for="l_exp1_code">Lecturer Expertise Subject 1 Code:
            <input type="text" id="l_exp1_code" name="l_exp1_code" placeholder="l_exp1_code" value="<?php $data["l_exp1_code"];?>">
            </label>

            <label class="lable" for="l_exp2_code">Lecturer Expertise Subject 2 Code:
            <input type="text" id="l_exp2_code" name="l_exp2_code" placeholder="l_exp2_code" value="<?php $data["l_exp2_code"];?>">
            </label>

            <label class="lable" for="l_exp3_code">Lecturer Expertise Subject 3 Code:
            <input type="text" id="l_exp3_code" name="l_exp3_code" placeholder="l_exp3_code" value="<?php $data["l_exp3_code"];?>">
            </label>

            <label class="lable" for="l_second_examinar_s_code">Lecturer Second Examinar Subject Code:
            <input type="text" id="l_second_examinar_s_code" name="l_second_examinar_s_code" placeholder="l_second_examinar_s_code" value="<?php $data["l_second_examinar_s_code"];?>">
            </label>
        </fieldset>

        <!-- Checkeck boxes -->

        <fieldset>
            <label>
            <input type="checkbox" class="inline"  id="l_is_exam_supervisor" name="l_is_exam_supervisor" value="true">
            <span class="inline">Is an Exam Supervisor</span>
        </fieldset>

        <!-- Buttons -->
        <button type="submit" class="create_button">Create Lecturer</button>


    </form>
</div>



<!-- Footer Section -->
<?php require APPROOT . '/views/includes/adminFooter.php'; ?>