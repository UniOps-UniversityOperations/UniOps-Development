<?php $style = "addUser"; ?>

<?php require APPROOT . '/views/includes/adminHeader.php'; ?>

<h1>Edit Variables</h1>

<div class="content">
    <form action="<?php echo URLROOT;?>/AdminPosts/editVariables" method="post">

        <!-- input feilds -->
        <fieldset>

            <!-- 1 -->
            <label class="lable" for="lecturer_max_lec_hrs">Maximum number of lecture hours for a lecturer:
            <input type="text" name="lecturer_max_lec_hrs" id="lecturer_max_lec_hrs" value="<?php echo $data['lecturer_max_lec_hrs']; ?>" required>
            </label>

            <!-- 2 -->
            <label class="lable" for="lec_hrs_per_credit">Number of lecture hours per credit:
            <input type="text" name="lec_hrs_per_credit" id="lec_hrs_per_credit" value="<?php echo $data['lec_hrs_per_credit']; ?>" required>
            </label>

            <!-- 3 -->
            <label class="lable" for="practcal_hrs_per_credit">Number of practical hours per credit:
            <input type="text" name="practcal_hrs_per_credit" id="practcal_hrs_per_credit" value="<?php echo $data['practcal_hrs_per_credit']; ?>" required>
            </label>

            <!-- 4 -->
            <label class="lable" for="tutorial_hrs_per_credit">Number of tutorial hours per credit:
            <input type="text" name="tutorial_hrs_per_credit" id="tutorial_hrs_per_credit" value="<?php echo $data['tutorial_hrs_per_credit']; ?>" required>
            </label>

            <!-- 5 -->
            <label class="lable" for="instructor_max_practical_hrs">Maximum number of practical hours for an instructor:
            <input type="text" name="instructor_max_practical_hrs" id="instructor_max_practical_hrs" value="<?php echo $data['instructor_max_practical_hrs']; ?>" required>
            </label>

            <!-- 6 -->
            <label class="lable" for="instructor_max_tutorial_hrs">Maximum number of tutorial hours for an instructor:
            <input type="text" name="instructor_max_tutorial_hrs" id="instructor_max_tutorial_hrs" value="<?php echo $data['instructor_max_tutorial_hrs']; ?>" required>
            </label>

            <!-- 7 -->
            <label class="lable" for="max_students_per_lecturer">Maximum number of students per lecturer:
            <input type="text" name="max_students_per_lecturer" id="max_students_per_lecturer" value="<?php echo $data['max_students_per_lecturer']; ?>" required>
            </label>

            <!-- 8 -->
            <label class="lable" for="instructor_max_students_lecturer">Maximum number of students per lecturer for an instructor:
            <input type="text" name="instructor_max_students_lecturer" id="instructor_max_students_lecturer" value="<?php echo $data['instructor_max_students_lecturer']; ?>" required>
            </label>

            <!-- 9 -->
            <label class="lable" for="instructor_max_students_practical">Maximum number of students per practical for an instructor:
            <input type="text" name="instructor_max_students_practical" id="instructor_max_students_practical" value="<?php echo $data['instructor_max_students_practical']; ?>" required>
            </label>

            <!-- 10 -->
            <label class="lable" for="instructor_max_students_tutorial">Maximum number of students per tutorial for an instructor:
            <input type="text" name="instructor_max_students_tutorial" id="instructor_max_students_tutorial" value="<?php echo $data['instructor_max_students_tutorial']; ?>" required>
            </label>
           
            
        </fieldset>
        <button type="submit" class="create_button">Update</button>
    </form>
</div>



<!-- Footer Section -->
<?php require APPROOT . '/views/includes/adminFooter.php'; ?>



<!-- 
'lecturer_max_lec_hrs' => trim($_POST['lecturer_max_lec_hrs']),
'lec_hrs_per_credit' => trim($_POST['lec_hrs_per_credit']),
'practcal_hrs_per_credit' => trim($_POST['practcal_hrs_per_credit']),
'tutorial_hrs_per_credit' => trim($_POST['tutorial_hrs_per_credit']),
'instructor_max_practical_hrs' => trim($_POST['instructor_max_practical_hrs']),
'instructor_max_tutorial_hrs' => trim($_POST['instructor_max_tutorial_hrs']),
'max_students_per_lecturer' => trim($_POST['max_students_per_lecturer']),
'instructor_max_students_lecturer' => trim($_POST['instructor_max_students_lecturer']),
'instructor_max_students_practical' => trim($_POST['instructor_max_students_practical']),
'instructor_max_students_tutorial' => trim($_POST['instructor_max_students_tutorial'])  
-->