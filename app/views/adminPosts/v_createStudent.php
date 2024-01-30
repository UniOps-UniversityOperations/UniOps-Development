<?php $style = "createStudent"; ?>

<?php require APPROOT . '/views/includes/adminHeader.php'; ?>

<h1>Create New Student</h1>

<div class="content">
    <form action="<?php echo URLROOT;?>/AdminPosts/createStudent/" method="post">

        <!-- input feilds -->

        <fieldset>
        <!-- <label class="lable" for="s_id">Student ID:
        <input type="text" id="s_id" name="s_id" placeholder="s_id" value="<?php echo $data["s_id"];?>" required>
        </label> -->
        
        <label class="lable" for="s_code">Student Code:
        <input type="text" id="s_code" name="s_code" placeholder="s_code" value="<?php $data["s_code"];?>" required>
        </label>

        <label class="lable" for="s_email">Student Email:
        <input type="email" id="s_email" name="s_email" placeholder="s_email" value="<?php echo $data["s_email"];?>" required>
        </label>

        <label class="lable" for="s_fullName">Student Full Name:
        <input type="text" id="s_fullName" name="s_fullName" placeholder="s_fullName" value="<?php echo $data["s_fullName"];?>" required>
        </label>

        <label class="lable" for="s_nameWithInitial">Student Name With Initials:
        <input type="text" id="s_nameWithInitial" name="s_nameWithInitial" placeholder="s_nameWithInitial" value="<?php echo $data["s_nameWithInitial"];?>" required>
        </label>

        <label class="lable" for="s_regNumber">Student Registration Number:
        <input type="text" id="s_regNumber" name="s_regNumber" placeholder="s_regNumber" value="<?php echo $data["s_regNumber"];?>" required>
        </label>

        <label class="lable" for="s_indexNumber">Student Index Number:
        <input type="text" id="s_indexNumber" name="s_indexNumber" placeholder="s_indexNumber" value="<?php echo $data["s_indexNumber"];?>" required>
        </label>

        <label class="lable" for="s_dob">Student Date Of Birth:
        <input type="date" id="s_dob" name="s_dob" placeholder="s_dob" value="<?php echo $data["s_dob"];?>" required>
        </label>

        <label class="lable" for="s_contactNumber">Student Contact Number:
        <input type="text" id="s_contactNumber" name="s_contactNumber" placeholder="s_contactNumber" value="<?php echo $data["s_contactNumber"];?>" required>
        </label>

        <label class="lable" for="s_stream">Subject Stream:
        <input type="text" id="s_stream" name="s_stream" placeholder="s_stream" value="<?php echo $data["s_stream"];?>" required>
        </label>

        <label class="lable" for="s_year">Year:
        <input type="text" id="s_year" name="s_year" placeholder="s_year" value="<?php echo $data["s_year"];?>" required>
        </label>

        <label class="lable" for="s_semester">Semester:
        <input type="text" id="s_semester" name="s_semester" placeholder="s_semester" value="<?php echo $data["s_semester"];?>" required>
        </label>
        
    </fieldset>


        <!-- Buttons -->
        <button type="submit" class="create_button">Create Student</button>


    </form>
</div>



<!-- Footer Section -->
<?php require APPROOT . '/views/includes/adminFooter.php'; ?>

