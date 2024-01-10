<?php $style = "createLecturers"; ?>

<?php require APPROOT . '/views/includes/adminHeader.php'; ?>

<h1>Update Lecturer</h1>

<div class="content">
    <form action="<?php echo URLROOT;?>/AdminPosts/updateLecturer/<?php echo $data["l_id"];?>" method="POST">

    <fieldset>
        <label class="lable" for="l_id">Lecturer ID:
        <input type="text" id="l_id" name="l_id" placeholder="l_id" value="<?php echo $data["l_id"];?>" required>
        </label>

        <label class="lable" for="l_code">Lecturer Code:
        <input type="text" id="l_code" name="l_code" placeholder="l_code" value="<?php echo $data["l_code"];?>" required>
        </label>

        <label class="lable" for="l_email">Lecturer Email:
        <input type="email" id="l_email" name="l_email" placeholder="l_email" value="<?php echo $data["l_email"];?>" required>
        </label>

        <label class="lable" for="l_fullName">Lecturer Full Name:
        <input type="text" id="l_fullName" name="l_fullName" placeholder="l_fullName" value="<?php echo $data["l_fullName"];?>" required>
        </label>

        <label class="lable" for="l_nameWithInitials">Lecturer Name With Initials:
        <input type="text" id="l_nameWithInitials" name="l_nameWithInitials" placeholder="l_nameWithInitials" value="<?php echo $data["l_nameWithInitials"];?>" required>
        </label>

        <label class="lable" for="l_gender">Lecturer Gender:
        <input type="text" id="l_gender" name="l_gender" placeholder="l_gender" value="<?php echo $data["l_gender"];?>" required>
        </label>

        <label class="lable" for="l_dob">Lecturer Date Of Birth:
        <input type="date" id="l_dob" name="l_dob" placeholder="l_dob" value="<?php echo $data["l_dob"];?>" required>
        </label>

        <label class="lable" for="l_contactNumber">Lecturer Contact Number:
        <input type="text" id="l_contactNumber" name="l_contactNumber" placeholder="l_contactNumber" value="<?php echo $data["l_contactNumber"];?>" required>
        </label>

        <label class="lable" for="l_address">Lecturer Address:
        <input type="text" id="l_address" name="l_address" placeholder="l_address" value="<?php echo $data["l_address"];?>" required>
        </label>

        <label class="lable" for="l_department">Lecturer Department:
        <input type="text" id="l_department" name="l_department" placeholder="l_department" value="<?php echo $data["l_department"];?>" required>
        </label>

        <label class="lable" for="l_positionRank">Lecturer Position Rank:
        <input type="text" id="l_positionRank" name="l_positionRank" placeholder="l_positionRank" value="<?php echo $data["l_positionRank"];?>" required>
        </label>

        <label class="lable" for="l_dateOfJoin">Lecturer Date Of Join:
        <input type="date" id="l_dateOfJoin" name="l_dateOfJoin" placeholder="l_dateOfJoin" value="<?php echo $data["l_dateOfJoin"];?>" required>
        </label>

        <label class="lable" for="l_qualifications">Lecturer Qualifications:
        <input type="text" id="l_qualifications" name="l_qualifications" placeholder="l_qualifications" value="<?php echo $data["l_qualifications"];?>" required>
        </label>


    </fieldset>

    <fieldset>
        <label class="lable" for="l_isExamSupervisor">
        <input type="checkbox" class="inline" id="l_isExamSupervisor" name="l_isExamSupervisor" value="1" <?php echo $data["l_isExamSupervisor"] == 1 ? 'checked' : '';?>>
        Is An Exam Supervisor</label>

        <label class="lable" for="l_isSecondExaminar">
        <input type="checkbox" class="inline" id="l_isSecondExaminar" name="l_isSecondExaminar" value="1" <?php echo $data["l_isSecondExaminar"] == 1 ? 'checked' : '';?>>
        Is A Second Examinar</label>
    </fieldset>

    <button type="submit" class="create_button">UPDATE</button>

    </form>
</div>

<!-- Footer Section -->
<?php require APPROOT . '/views/includes/adminFooter.php'; ?>


<!-- Structure of the database table:

    table name: lecturers

    l_id 
    l_code 
    l_email 
    l_fullName 
    l_nameWithInitials 
    l_gender 
    l_dob 
    l_contactNumber 
    l_address 
    l_department 
    l_positionRank 
    l_dateOfJoin 
    l_qualifications
    l_isExamSupervisor 
    l_isSecondExaminar  -->