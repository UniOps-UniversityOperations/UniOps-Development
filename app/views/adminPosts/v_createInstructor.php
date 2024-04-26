<?php $style = "createInstructor"; ?>


<?php require APPROOT . '/views/includes/adminHeader.php'; ?>

<h1>Add New Instructor</h1>

<div class="content">
    <form action="<?php echo URLROOT;?>/adminPosts/createInstructor/" method="post">

        <!-- input feilds -->

        <fieldset>
        <h3>Instructor Details:</h3>

            <label class="lable" for="i_code">Code:
            <input type="text" id="i_code" name="i_code" placeholder="i_code" value="<?php $data["i_code"];?>" required>
            </label>

            <label class="lable" for="i_email">Email:
            <input type="text" id="i_email" name="i_email" placeholder="i_email" value="<?php $data["i_email"];?>" required>
            </label>

            <label class="lable" for="i_fullName">Full Name:
            <input type="text" id="i_fullName" name="i_fullName" placeholder="i_fullName" value="<?php $data["i_fullName"];?>" required>
            </label>

            <label class="lable" for="i_nameWithInitials">Name With Initials:
            <input type="text" id="i_nameWithInitials" name="i_nameWithInitials" placeholder="i_nameWithInitials" value="<?php $data["i_nameWithInitials"];?>" required>
            </label>

            <label class="label">Gender:
                <div class="gender">
                    <label>
                    <input class="inline" type="radio" id="i_gender" name="i_gender" value="M" required>
                    Male</label>

                    <label>
                    <input class="inline" type="radio" id="i_gender" name="i_gender" value="F"required>
                    Female</label>
                </div>
            </label>

            <label class="lable" for="i_dob">Date Of Birth:
            <input type="date" id="i_dob" name="i_dob" placeholder="i_dob" value="<?php $data["i_dob"];?>" required>
            </label>

            <label class="lable" for="i_contactNumber">Contact Number:
            <input type="text" id="i_contactNumber" name="i_contactNumber" placeholder="i_contactNumber" value="<?php $data["i_contactNumber"];?>" required>
            </label>

            <label class="lable" for="i_address">Address:
            <input type="text" id="i_address" name="i_address" placeholder="i_address" value="<?php $data["i_address"];?>" required>
            </label>

            <label class="lable" for="i_department">Department:
            <input type="text" id="i_department" name="i_department" placeholder="i_department" value="<?php $data["i_department"];?>" required>
            </label>

            <label class="lable" for="i_positionRank">Position Rank:
            <input type="text" id="i_positionRank" name="i_positionRank" placeholder="i_positionRank" value="<?php $data["i_positionRank"];?>" required>
            </label>

            <label class="lable" for="i_dateOfJoin">Date Of Join:
            <input type="date" id="i_dateOfJoin" name="i_dateOfJoin" placeholder="i_dateOfJoin" value="<?php $data["i_dateOfJoin"];?>" required>
            </label>

            <label class="lable" for="i_qualifications">Qualifications:
            <input type="text" id="i_qualifications" name="i_qualifications" placeholder="i_qualifications" value="<?php $data["i_qualifications"];?>" required>
            </label>

        </fieldset>

        <!-- Checkeck boxes -->

        <fieldset>
            <label>
            <input type="checkbox" class="inline"  id="i_isExamInvigilator" name="i_isExamInvigilator" value="true">
            i_isExamInvigilator</label>
        </fieldset>

        <fieldset>
            <!-- Add this Lecturer as a user of the system -->
            <h3>Add as a System User:</h3>

            <label class="lable" for="user_id ">User ID: Instructor Email </label>

            <label class="lable" for="username">User Name: Instructor Name With Initials</label>

            <label class="label" for="role">Role: Instructor </label>

            <label class="lable" for="pwd">password:
            <input type="pwd" name="pwd" id="pwd" placeholder="pwd" value="<?php $data['pwd']; ?>" required>
            </label>

            <!-- tick for send email -->
            <label>
            <input type="checkbox" class="inline"  id="sendEmail" name="sendEmail" value="true">
            Send Email</label>

        </fieldset>



        <!-- Buttons -->
        <button type="submit" class="create_button">Create Lecturer</button>


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
	15	i_isDeleted	tinyint(4)			 -->

    
