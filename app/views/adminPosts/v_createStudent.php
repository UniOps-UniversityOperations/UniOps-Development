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

        <label class="lable" for="s_stream">Subject Stream: 
            <select id ="s_stream" name="s_stream" required>
                <option value="CS" <?php if ($data["s_stream"]== 'cs') echo 'selected'  ; ?>>CS</option>
                <option value="IS" <?php if ($data["s_stream"]== 'is') echo 'selected'  ; ?>>IS</option>
            </select>    
        </label>

        <!-- <label class="lable" for="s_regNumber">Student Registration Number:
        <input type="text" id="s_regNumber" name="s_regNumber" placeholder="s_regNumber" value="<?php echo $data["s_regNumber"];?>" required>
        </label> -->

        <label class="label" for="s_regNumber">Student Registration Number:
        <input type="text" id="s_regNumber" name="s_regNumber" placeholder="s_regNumber" value="<?php echo $data["s_regNumber"];?>" required pattern="^(\d{4})/(\w+)/(\d{3})$" title="Format: 4 digits/s_stream/3 digits">
        </label>

        <label class="lable" for="s_indexNumber">Student Index Number:
        <input type="text" id="s_indexNumber" name="s_indexNumber" placeholder="s_indexNumber" value="<?php echo $data["s_indexNumber"];?>" required>
        </label>

        <label class="lable" for="s_dob">Student Date Of Birth:
        <input type="date" id="s_dob" name="s_dob" placeholder="s_dob" value="<?php echo $data["s_dob"];?>" required>
        </label>

        <!-- <label class="lable" for="s_contactNumber">Student Contact Number:
        <input type="text" id="s_contactNumber" name="s_contactNumber" placeholder="s_contactNumber"  value="<?php echo $data["s_contactNumber"];?>" required>
        </label> -->
        <label class="lable" for="s_contactNumber">Student Contact Number:
        <input type="text" id="s_contactNumber" name="s_contactNumber" placeholder="s_contactNumber" 
           value="<?php echo $data["s_contactNumber"];?>" 
           pattern="[0-9]{10}" 
           title="Please enter a 10-digit contact number" 
           required>
        </label>

        <label class="lable" for="s_year">Year:
            <select name="year" id="s_year" required>
                <option value="1"<?php if ($data["s_year"]=="1")echo " selected";?>>1</option>
                <option value="2"<?php if ($data["s_year"]=="2")echo " selected";?>>2</option>
                <option value="3"<?php if ($data["s_year"]=="3")echo " selected";?>>3</option>
                <option value="4"<?php if ($data["s_year"]=="4")echo " selected";?>>4</option>
            </select>
        </label>
        
    </fieldset>


        <!-- Buttons -->
        <button type="submit" class="create_button">Create Student</button>


    </form>
</div>



<!-- Footer Section -->
<?php require APPROOT . '/views/includes/adminFooter.php'; ?>

