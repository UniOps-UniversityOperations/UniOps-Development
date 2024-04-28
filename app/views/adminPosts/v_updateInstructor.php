<?php $style = "createInstructor"; ?>

<?php require APPROOT . '/views/includes/adminHeader.php'; ?>

<?php if($data['popup']){ ?>
    
    <div id="popup" 
        style="
        display: none; 
        position: fixed; 
        border-radius: 10px;
        font-size: 19px;
        font-weight: bold;
        color: red;
        top: 10%; 
        left: 73%; 
        transform: 
        translate(50%, -25%); 
        background-color: white; 
        padding: 20px 20px 20px 20px;
        margin-right: 20px;
        border: 1px red solid; 
        transition: top 0.5s ease;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.5);">
        <!-- if popup = 1 Lecturer initial is already exists | popup = 2 Lecturer email is already exists | popup = 3 Lecturer initial and email is already exists -->
        <?php if($data['popup'] == 1){ 
            echo "<p>initials is already exists</p>";
        }elseif($data['popup'] == 2){
            echo "<p>email is already exists</p>";
        }elseif($data['popup'] == 3){
            echo "<p>Initials and<br> email are already exists</p>";
        } ?>
        
    </div>
    
    <script>
        // Function to show the popup message
        function showPopup() {
            var popup = document.getElementById('popup');
            popup.style.display = 'block';
    
            // Hide the popup after 5 seconds
            setTimeout(function() {
                popup.style.display = 'none';
            }, 3000);
        }
    
        // Call the showPopup function when the page loads
        window.onload = showPopup;
    </script>
    
    <?php } ?>

<h1>Update Instructor / Assistant Lecturer</h1>

<div class="content">
    <form action="<?php echo URLROOT;?>/AdminPosts/updateInstructor/<?php echo $data["i_id"];?>" method="POST">

    <fieldset>
        <!-- importent message  (Initials and Email must be unique) -->
        <p style="color:red">Important: <b>Initials</b> and <b>Email</b> must be unique.</p>

        <label class="lable" for="i_code">Initials (Must be unique) :
        <input type="text" id="i_code" name="i_code" placeholder="i_code" value="<?php echo $data["i_code"];?>" oninput="this.value = this.value.toUpperCase();" required>
        </label>

        
        <label class="lable" for="i_fullName">Full Name:
            <input type="text" id="i_fullName" name="i_fullName" placeholder="i_fullName" value="<?php echo $data["i_fullName"];?>" oninput="this.value = this.value.toUpperCase();" required>
        </label>
        
        <label class="lable" for="i_nameWithInitials">Name With Initials:
            <input type="text" id="i_nameWithInitials" name="i_nameWithInitials" placeholder="i_nameWithInitials" value="<?php echo $data["i_nameWithInitials"];?>" oninput="this.value = this.value.toUpperCase();" required>
        </label>
        
        <label class="lable" for="i_email">Email (Must be unique) :
        <input type="email" id="i_email" name="i_email" placeholder="i_email" value="<?php echo $data["i_email"];?>" required>
        </label>

        <!-- <label class="lable" for="i_gender">Instructor Gender:
        <input type="text" id="i_gender" name="i_gender" placeholder="i_gender" value="<?php echo $data["i_gender"];?>" required>
        </label> -->

        <label class="label">Gender:
            <div class="gender">
                <label>
                <input class="inline" type="radio" id="i_gender" name="i_gender" value="M" <?php echo ($data['i_gender'] === 'M') ? 'checked' : ''; ?> required>
                Male</label>

                <label>
                <input class="inline" type="radio" id="i_gender" name="i_gender" value="F" <?php echo ($data['i_gender'] === 'F') ? 'checked' : ''; ?>required>
                Female</label>
            </div>
        </label>

        <label class="lable" for="i_dob">Instructor Date Of Birth:
        <input type="date" id="i_dob" name="i_dob" placeholder="i_dob" value="<?php echo $data["i_dob"];?>" required>
        </label>

        <!-- <label class="lable" for="i_contactNumber">Instructor Contact Number:
        <input type="text" id="i_contactNumber" name="i_contactNumber" placeholder="i_contactNumber" value="<?php echo $data["i_contactNumber"];?>" required>
        </label> -->

        <label class="label" for="i_contactNumber">Contact Number:
                <input type="text" id="i_contactNumber" name="i_contactNumber" placeholder="i_contactNumber" value="<?php echo $data["i_contactNumber"];?>" required>
            </label>
            <span style="color:red" id="i_contactNumber_error" class="error"></span>

            <script>
                document.getElementById("i_contactNumber").addEventListener("input", function() {
                    var contactNumber = this.value.trim();
                    var errorSpan = document.getElementById("i_contactNumber_error");
                    if (!/^\d+$/.test(contactNumber) || contactNumber.length < 10) {
                        errorSpan.textContent = "''Contact Number'' must be numeric and longer than 10 characters";
                    } else {
                        errorSpan.textContent = "";
                    }
                });
            </script>

        <label class="lable" for="i_address">Address:
        <input type="text" id="i_address" name="i_address" placeholder="i_address" value="<?php echo $data["i_address"];?>" oninput="this.value = this.value.toUpperCase();" required>
        </label>

        <!-- <label class="lable" for="i_department">Instructor Department:
        <input type="text" id="i_department" name="i_department" placeholder="i_department" value="<?php echo $data["i_department"];?>" required>
        </label> -->

        <label class="label" for="i_department">Department:
            <select id="i_department" name="i_department" required>
                <option value="UCSC" <?php echo strtoupper($data["i_department"]) == 'UCSC' ? 'selected' : ''; ?>>UCSC</option>
                <option value="Sicece - Mathemetics" <?php echo strtoupper($data["i_department"]) == 'SICECE - MATHEMETICS' ? 'selected' : ''; ?>>Sicece - Mathemetics</option>
                <option value="Sicece - Chemistry" <?php echo strtoupper($data["i_department"]) == 'SICECE - CHEMISTRY' ? 'selected' : ''; ?>>Sicece - Chemistry</option>
                <option value="Sicece - Physics" <?php echo strtoupper($data["i_department"]) == 'SICECE - PHYSICS' ? 'selected' : ''; ?>>Sicece - Physics</option>
                <option value="Medicine" <?php echo strtoupper($data["i_department"]) == 'MEDICINE' ? 'selected' : ''; ?>>Medicine</option>
                <option value="Statistics" <?php echo strtoupper($data["i_department"]) == 'STATISTICS' ? 'selected' : ''; ?>>Statistics</option>

            </select>
        </label>

        <!-- <label class="lable" for="i_positionRank">Instructor Position Rank:
        <input type="text" id="i_positionRank" name="i_positionRank" placeholder="i_positionRank" value="<?php echo $data["i_positionRank"];?>" required>
        </label> -->

        <label class="label" for="i_positionRank">Position Rank:
            <select id="l_positionRank" name="i_positionRank" required>
                <option value="Instructor" <?php echo $data["i_positionRank"] == 'Instructor' ? 'selected' : ''; ?>>Instructor</option>
                <option value="Assistant Lecturer" <?php echo $data["i_positionRank"] == 'Assistant Lecturer' ? 'selected' : ''; ?>>Assistant Lecturer</option>
            </select>
        </label>

        <label class="lable" for="i_dateOfJoin">Date Of Join:
        <input type="date" id="i_dateOfJoin" name="i_dateOfJoin" placeholder="i_dateOfJoin" value="<?php echo $data["i_dateOfJoin"];?>" required>
        </label>

        <!-- <label class="lable" for="i_qualifications">Instructor Qualifications:
        <input type="text" id="i_qualifications" name="i_qualifications" placeholder="i_qualifications" value="<?php echo $data["i_qualifications"];?>" required>
        </label> -->

        <label class="label" for="i_qualifications">Qualifications:
            
            <input type="text" id="i_qualifications" name="i_qualifications" placeholder="i_qualifications" value="<?php echo strtoupper($data["i_qualifications"]);?>" oninput="this.value = this.value.toUpperCase();" required>
            <span id="qualifications_error" class="error"></span>
            </label>
    
            
            <div class='qualifications'>
    
                <label>
                <input class="inline" type="checkbox" id="BSC" name="BSC" value="BSC">
                BSC</label>
    
                <label>
                <input class="inline" type="checkbox" id="MSC" name="MSC" value="MSC">
                MSC</label>
    
                <label>
                <input class="inline" type="checkbox" id="Mphil" name="Mphil" value="Mphil">
                Mphil</label>
    
                <label>
                <input class="inline" type="checkbox" id="PHD" name="PHD" value="PHD">
                PHD</label>
    
    
            </div>
    
            <script>
                var checkboxes = document.querySelectorAll('input[type="checkbox"]');
                var qualificationsInput = document.getElementById("i_qualifications");
    
                checkboxes.forEach(function(checkbox) {
                    checkbox.addEventListener('change', function() {
                        var selectedQualifications = [];
                        checkboxes.forEach(function(checkbox) {
                            if (checkbox.checked) {
                                selectedQualifications.push(checkbox.value);
                            }
                        });
                        qualificationsInput.value = selectedQualifications.join(', ');
                    });
                });
            </script>


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
