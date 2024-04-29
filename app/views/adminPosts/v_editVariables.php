<?php $style = "addUser"; ?>

<?php require APPROOT . '/views/includes/admin/adminHeader.php'; ?>

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

            <!-- 11 -->
            <label class="lable" for="n_1_yr_cs">Number of students in 1st year Computer Science:
            <input type="text" name="n_1_yr_cs" id="n_1_yr_cs" value="<?php echo $data['n_1_yr_cs']; ?>" required>
            </label>

            <!-- 12 -->
            <label class="lable" for="n_2_yr_cs">Number of students in 2nd year Computer Science:
            <input type="text" name="n_2_yr_cs" id="n_2_yr_cs" value="<?php echo $data['n_2_yr_cs']; ?>" required>
            </label>

            <!-- 13 -->
            <label class="lable" for="n_3_yr_cs">Number of students in 3rd year Computer Science:
            <input type="text" name="n_3_yr_cs" id="n_3_yr_cs" value="<?php echo $data['n_3_yr_cs']; ?>" required>
            </label>

            <!-- 14 -->
            <label class="lable" for="n_4_yr_cs">Number of students in 4th year Computer Science:
            <input type="text" name="n_4_yr_cs" id="n_4_yr_cs" value="<?php echo $data['n_4_yr_cs']; ?>" required>
            </label>

            <!-- 15 -->
            <label class="lable" for="n_1_yr_is">Number of students in 1st year Information Systems:
            <input type="text" name="n_1_yr_is" id="n_1_yr_is" value="<?php echo $data['n_1_yr_is']; ?>" required>
            </label>

            <!-- 16 -->
            <label class="lable" for="n_2_yr_is">Number of students in 2nd year Information Systems:
            <input type="text" name="n_2_yr_is" id="n_2_yr_is" value="<?php echo $data['n_2_yr_is']; ?>" required>
            </label>

            <!-- 17 -->
            <label class="lable" for="n_3_yr_is">Number of students in 3rd year Information Systems:
            <input type="text" name="n_3_yr_is" id="n_3_yr_is" value="<?php echo $data['n_3_yr_is']; ?>" required>
            </label>

            <!-- 18 -->
            <label class="lable" for="n_4_yr_is">Number of students in 4th year Information Systems:
            <input type="text" name="n_4_yr_is" id="n_4_yr_is" value="<?php echo $data['n_4_yr_is']; ?>" required>
            </label>
           
            
        </fieldset>
        <button type="submit" class="create_button">Update</button>
    </form>
</div>



<!-- Footer Section -->
<?php require APPROOT . '/views/includes/adminFooter.php'; ?>



<!-- 
'lecturer_max_lec_hrs' => $vars[0]->v_value,
'lec_hrs_per_credit' => $vars[1]->v_value,
'practcal_hrs_per_credit' => $vars[2]->v_value,
'tutorial_hrs_per_credit' => $vars[3]->v_value,
'instructor_max_practical_hrs' => $vars[4]->v_value,
'instructor_max_tutorial_hrs' => $vars[5]->v_value,
'max_students_per_lecturer' => $vars[6]->v_value,
'instructor_max_students_lecturer' => $vars[7]->v_value,
'instructor_max_students_practical' => $vars[8]->v_value,
'instructor_max_students_tutorial' => $vars[9]->v_value,
'n_1_yr_cs' => $vars[10]->v_value,
'n_2_yr_cs' => $vars[11]->v_value,
'n_3_yr_cs' => $vars[12]->v_value,
'n_4_yr_cs' => $vars[13]->v_value,
'n_1_yr_is' => $vars[14]->v_value,
'n_2_yr_is' => $vars[15]->v_value,
'n_3_yr_is' => $vars[16]->v_value,
'n_4_yr_is' => $vars[17]->v_value,
-->