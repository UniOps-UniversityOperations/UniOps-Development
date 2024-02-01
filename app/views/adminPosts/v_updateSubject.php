<?php $style = "createSubject"; ?>

<?php require APPROOT . '/views/includes/adminHeader.php'; ?>

<!-- Body -->
    <div class="content">
        <h1>Update Subject Information</h1>

        <form action="<?php echo URLROOT;?>/AdminPosts/updateSubject/<?php echo $data["sub_id"];?>" method="POST">

            <fieldset>

                <label class="lable" for="sub_id">Subject ID:
                <input type="text" id="sub_id" name="sub_id" placeholder="sub_id" value="<?php echo $data["sub_id"];?>" required>
                </label>

                <label class="lable" for="sub_code">Code:
                <input type="text" id="sub_code" name="sub_code" placeholder="sub_code" value="<?php echo $data["sub_code"];?>" required>
                </label>

                <label class="lable" for="sub_name">Name:
                <input type="text" id="sub_name" name="sub_name" placeholder="sub_name" value="<?php echo $data["sub_name"];?>" required>
                </label>

                <label class="lable" for="sub_credits">Credits:
                <select id="sub_credits" name="sub_credits" required>
                    <option value="1" <?php echo ($data["sub_credits"] == '1') ? 'selected' : ''; ?>>1</option>
                    <option value="2" <?php echo ($data["sub_credits"] == '2') ? 'selected' : ''; ?>>2</option>
                    <option value="3" <?php echo ($data["sub_credits"] == '3') ? 'selected' : ''; ?>>3</option>
                    <option value="4" <?php echo ($data["sub_credits"] == '4') ? 'selected' : ''; ?>>4</option>
                </select>
                </label>

                <label class="lable" for="sub_year">Year:
                <select id="sub_year" name="sub_year" required>
                    <option value="1" <?php echo ($data["sub_year"] == '1') ? 'selected' : ''; ?>>1</option>
                    <option value="2" <?php echo ($data["sub_year"] == '2') ? 'selected' : ''; ?>>2</option>
                    <option value="3" <?php echo ($data["sub_year"] == '3') ? 'selected' : ''; ?>>3</option>
                    <option value="4" <?php echo ($data["sub_year"] == '4') ? 'selected' : ''; ?>>4</option>
                </select>
                </label>

                <label class="lable" for="sub_semester">Subject Semester:
                <select id="sub_semester" name="sub_semester" required>
                    <option value="1" <?php echo ($data["sub_semester"] == '1') ? 'selected' : ''; ?>>1</option>
                    <option value="2" <?php echo ($data["sub_semester"] == '2') ? 'selected' : ''; ?>>2</option>
                </select>
                </label>

                <label class="lable" for="sub_stream">Subject Stream:
                <select id="sub_stream" name="sub_stream" required>
                    <option value="CS" <?php echo ($data["sub_stream"] == 'CS') ? 'selected' : ''; ?>>CS</option>
                    <option value="IS" <?php echo ($data["sub_stream"] == 'IS') ? 'selected' : ''; ?>>IS</option>
                </select>
                </label>

            </fieldset>

            <fieldset>
                
                <label class="lable" for="sub_isCore">
                <input type="checkbox" class="inline" id="sub_isCore" name="sub_isCore" value="1" <?php echo $data["sub_isCore"] == 1 ? 'checked' : '';?>>
                Is a Core Subject</label>

                <label class="lable" for="sub_isHaveLecture">
                <input type="checkbox" class="inline" id="sub_isHaveLecture" name="sub_isHaveLecture" value="1" <?php echo $data["sub_isHaveLecture"] == 1 ? 'checked' : '';?>>
                Has a Lecture</label>

                <label class="lable" for="sub_isHaveTutorial">
                <input type="checkbox" class="inline" id="sub_isHaveTutorial" name="sub_isHaveTutorial" value="1" <?php echo $data["sub_isHaveTutorial"] == 1 ? 'checked' : '';?>>
                Has a Tutorial</label>

                <label class="lable" for="sub_isHavePractical">
                <input type="checkbox" class="inline" id="sub_isHavePractical" name="sub_isHavePractical" value="1" <?php echo $data["sub_isHavePractical"] == 1 ? 'checked' : '';?>>
                Has a Practical</label>

            </fieldset>

            <button type="submit" class="create_button" >UPDATE</button>
            
        </form>



    </div>


    <!-- Footer Section -->
<?php require APPROOT . '/views/includes/adminFooter.php'; ?>

<!-- Structure of the database table:
        sub_id
        sub_code
        sub_name
        sub_credits
        sub_year
        sub_semester
        sub_stream
        sub_isCore
        sub_isHaveLecture
        sub_isHaveTutorial
        sub_isHavePractical
        sub_isDeleted -->
