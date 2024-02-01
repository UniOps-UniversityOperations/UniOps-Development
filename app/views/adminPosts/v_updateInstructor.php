<?php $style = "createInstructor"; ?>

<?php require APPROOT . '/views/includes/adminHeader.php'; ?>

<h1>Update Instructor</h1>

<div class="content">
    <form action="<?php echo URLROOT;?>/AdminPosts/updateInstructor/<?php echo $data["i_id"];?>" method="POST">

    <fieldset>

        <label class="lable" for="i_id">Instructor ID:
        <input type="text" id="i_id" name="i_id" placeholder="i_id" value="<?php echo $data["i_id"];?>" required>
        </label>

        <label class="lable" for="i_code">Instructor Code:
        <input type="text" id="i_code" name="i_code" placeholder="i_code" value="<?php echo $data["i_code"];?>" required>
        </label>

        <label class="lable" for="i_email">Instructor Email:
        <input type="email" id="i_email" name="i_email" placeholder="i_email" value="<?php echo $data["i_email"];?>" required>
        </label>

        <label class="lable" for="i_fullName">Instructor Full Name:
        <input type="text" id="i_fullName" name="i_fullName" placeholder="i_fullName" value="<?php echo $data["i_fullName"];?>" required>
        </label>

        <label class="lable" for="i_nameWithInitials">Instructor Name With Initials:
        <input type="text" id="i_nameWithInitials" name="i_nameWithInitials" placeholder="i_nameWithInitials" value="<?php echo $data["i_nameWithInitials"];?>" required>
        </label>

        <label class="lable" for="i_gender">Instructor Gender:
        <input type="text" id="i_gender" name="i_gender" placeholder="i_gender" value="<?php echo $data["i_gender"];?>" required>
        </label>

        <label class="lable" for="i_dob">Instructor Date Of Birth:
        <input type="date" id="i_dob" name="i_dob" placeholder="i_dob" value="<?php echo $data["i_dob"];?>" required>
        </label>

        <label class="lable" for="i_contactNumber">Instructor Contact Number:
        <input type="text" id="i_contactNumber" name="i_contactNumber" placeholder="i_contactNumber" value="<?php echo $data["i_contactNumber"];?>" required>
        </label>

        <label class="lable" for="i_address">Instructor Address:
        <input type="text" id="i_address" name="i_address" placeholder="i_address" value="<?php echo $data["i_address"];?>" required>
        </label>

        <label class="lable" for="i_department">Instructor Department:
        <input type="text" id="i_department" name="i_department" placeholder="i_department" value="<?php echo $data["i_department"];?>" required>
        </label>

        <label class="lable" for="i_positionRank">Instructor Position Rank:
        <input type="text" id="i_positionRank" name="i_positionRank" placeholder="i_positionRank" value="<?php echo $data["i_positionRank"];?>" required>
        </label>

        <label class="lable" for="i_dateOfJoin">Instructor Date Of Join:
        <input type="date" id="i_dateOfJoin" name="i_dateOfJoin" placeholder="i_dateOfJoin" value="<?php echo $data["i_dateOfJoin"];?>" required>
        </label>

        <label class="lable" for="i_qualifications">Instructor Qualifications:
        <input type="text" id="i_qualifications" name="i_qualifications" placeholder="i_qualifications" value="<?php echo $data["i_qualifications"];?>" required>
        </label>


    </fieldset>

    <fieldset>
        <label class="lable" for="i_isExamInvigilator">
        <input type="checkbox" class="inline" id="i_isExamInvigilator" name="i_isExamInvigilator" value="1" <?php echo $data["i_isExamInvigilator"] == 1 ? 'checked' : '';?>>
        Is An Exam Invigilator</label>
    </fieldset>

    <button type="submit" class="create_button">UPDATE</button>

    </form>
</div>

<!-- Footer Section -->
<?php require APPROOT . '/views/includes/adminFooter.php'; ?>


<!-- Structure of the database table:
    1	i_id Primary	int(11)				
	2	i_code	varchar(50)		
	3	i_email	varchar(50)		
	4	i_fullName	varchar(50)		
	5	i_nameWithInitials	varchar(50)	
	6	i_gender	char(1)
	7	i_dob	date		
	8	i_contactNumber	varchar(20)	
	9	i_address	varchar(255)		
	10	i_department	varchar(50)		
	11	i_positionRank	varchar(50)		
	12	i_dateOfJoin	date	
	13	i_qualifications	text	
	14	i_isExamInvigilator	tinyint(4)	
	15	i_isDeleted	tinyint(4)	 -->