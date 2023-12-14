<?php $style = "createLecturers"; ?>

<?php require APPROOT . '/views/includes/adminHeader.php'; ?>

<h1>Create New Lecturer</h1>

<div class="content">
    <form action="<?php echo URLROOT;?>/adminPosts/createLecturer/" method="post">

        <!-- input feilds -->

        <fieldset>
            <label class="lable" for="l_code">Lecturer Code:
            <input type="text" id="l_code" name="l_code" placeholder="l_code" value="<?php $data["l_code"];?>" required>
            </label>

            <label class="lable" for="l_email">Lecturer Email:
            <input type="text" id="l_email" name="l_email" placeholder="l_email" value="<?php $data["l_email"];?>" required>
            </label>

            <label class="lable" for="l_fullName">Lecturer Full Name:
            <input type="text" id="l_fullName" name="l_fullName" placeholder="l_fullName" value="<?php $data["l_fullName"];?>" required>
            </label>

            <label class="lable" for="l_nameWithInitials">Lecturer Name With Initials:
            <input type="text" id="l_nameWithInitials" name="l_nameWithInitials" placeholder="l_nameWithInitials" value="<?php $data["l_nameWithInitials"];?>" required>
            </label>

            <label class="lable" for="l_gender">Lecturer Gender:
            <input type="text" id="l_gender" name="l_gender" placeholder="l_gender" value="<?php $data["l_gender"];?>" required>
            </label>

            <label class="lable" for="l_dob">Lecturer Date Of Birth:
            <input type="date" id="l_dob" name="l_dob" placeholder="l_dob" value="<?php $data["l_dob"];?>" required>
            </label>

            <label class="lable" for="l_contactNumber">Lecturer Contact Number:
            <input type="text" id="l_contactNumber" name="l_contactNumber" placeholder="l_contactNumber" value="<?php $data["l_contactNumber"];?>" required>
            </label>

            <label class="lable" for="l_address">Lecturer Address:
            <input type="text" id="l_address" name="l_address" placeholder="l_address" value="<?php $data["l_address"];?>" required>
            </label>

            <label class="lable" for="l_department">Lecturer Department:
            <input type="text" id="l_department" name="l_department" placeholder="l_department" value="<?php $data["l_department"];?>" required>
            </label>

            <label class="lable" for="l_positionRank">Lecturer Position Rank:
            <input type="text" id="l_positionRank" name="l_positionRank" placeholder="l_positionRank" value="<?php $data["l_positionRank"];?>" required>
            </label>

            <label class="lable" for="l_dateOfJoin">Lecturer Date Of Join:
            <input type="date" id="l_dateOfJoin" name="l_dateOfJoin" placeholder="l_dateOfJoin" value="<?php $data["l_dateOfJoin"];?>" required>
            </label>

            <label class="lable" for="l_qualifications">Lecturer Qualifications:
            <input type="text" id="l_qualifications" name="l_qualifications" placeholder="l_qualifications" value="<?php $data["l_qualifications"];?>" required>
            </label>

        </fieldset>

        <!-- Checkeck boxes -->

        <fieldset>
            
            <label>
            <input type="checkbox" class="inline"  id="l_isExamSupervisor" name="l_isExamSupervisor" value="true">
            l_isExamSupervisor</label>

            <label>
            <input type="checkbox" class="inline"  id="l_isSecondExaminar" name="l_isSecondExaminar" value="true">
            l_isSecondExaminar</label>

        </fieldset>

        <!-- Buttons -->
        <button type="submit" class="create_button">Create Lecturer</button>


    </form>
</div>



<!-- Footer Section -->
<?php require APPROOT . '/views/includes/adminFooter.php'; ?>


<!--
    Structure of the database table:

    table name: lecturers

    l_id (INT AUTO INCRIMENT)
    l_code (VARCHAR 50)
    l_email (VARCHAR 50)
    l_fullName (VARCHAR 50)
    l_nameWithInitials (VARCHAR 50)
    l_gender (CHAR)
    l_dob (DATE)
    l_contactNumber (VARCHAR 20)
    l_address (VARCHAR 255)
    l_department (VARCHAR 50)
    l_positionRank (VARCHAR 50)
    l_dateOfJoin (DATE)
    l_qualifications (TEXT)
    l_isExamSupervisor (BOOLEAN)
    l_isSecondExaminar (BOOLEAN)

-->