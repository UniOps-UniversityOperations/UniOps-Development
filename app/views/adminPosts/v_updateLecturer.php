<?php $style = "createLecturers"; ?>

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
            echo "<p>Iinitial is already exists</p>";
        }elseif($data['popup'] == 2){
            echo "<p>Email is already exists</p>";
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


<h1>Update Lecturer</h1>

<div class="content">
    <form action="<?php echo URLROOT;?>/AdminPosts/updateLecturer/<?php echo $data["l_id"];?>" method="POST">

    <fieldset>
        <!-- importent message  (Initials and Email must be unique) -->
        <p style="color:red">Important: <b>Initials</b> and <b>Email</b> must be unique.</p>


        <label class="label" for="l_code">Initials (Must be unique) :
            <input type="text" id="l_code" name="l_code" placeholder="l_code" value="<?php echo strtoupper($data["l_code"]); ?>" oninput="this.value = this.value.toUpperCase();" required>
        </label>

        <label class="lable" for="l_fullName">Full Name:
            <input type="text" id="l_fullName" name="l_fullName" placeholder="l_fullName" value="<?php echo strtoupper($data["l_fullName"]);?>" oninput="this.value = this.value.toUpperCase();" required>
        </label>
        
        <label class="lable" for="l_nameWithInitials">Name With Initials:
            <input type="text" id="l_nameWithInitials" name="l_nameWithInitials" placeholder="l_nameWithInitials" value="<?php echo strtoupper($data["l_nameWithInitials"]);?>" oninput="this.value = this.value.toUpperCase();" required>
        </label>
        
        <label class="lable" for="l_email">Email (Must be unique) :
        <input type="email" id="l_email" name="l_email" placeholder="l_email" value="<?php echo $data["l_email"];?>" required>
        </label>

        <label class="label">Gender:
                <div class="gender">
                    <label>
                    <input class="inline" type="radio" id="l_gender" name="l_gender" value="M" <?php echo ($data['l_gender'] === 'M') ? 'checked' : ''; ?> required>
                    Male</label>

                    <label>
                    <input class="inline" type="radio" id="l_gender" name="l_gender" value="F" <?php echo ($data['l_gender'] === 'F') ? 'checked' : ''; ?>required>
                    Female</label>
                </div>
            </label>

        <label class="lable" for="l_dob">Date Of Birth:
        <input type="date" id="l_dob" name="l_dob" placeholder="l_dob" value="<?php echo $data["l_dob"];?>" required>
        </label>

        <!-- <label class="lable" for="l_contactNumber">Contact Number:
        <input type="text" id="l_contactNumber" name="l_contactNumber" placeholder="l_contactNumber" value="<?php echo $data["l_contactNumber"];?>" required>
        </label> -->

        <label class="label" for="l_contactNumber">Contact Number:
                <input type="text" id="l_contactNumber" name="l_contactNumber" placeholder="l_contactNumber" value="<?php echo $data["l_contactNumber"];?>" required>
            </label>
            <span style="color:red" id="l_contactNumber_error" class="error"></span>

            <script>
                document.getElementById("l_contactNumber").addEventListener("input", function() {
                    var contactNumber = this.value.trim();
                    var errorSpan = document.getElementById("l_contactNumber_error");
                    if (!/^\d+$/.test(contactNumber) || contactNumber.length < 10) {
                        errorSpan.textContent = "''Contact Number'' must be numeric and longer than 10 characters";
                    } else {
                        errorSpan.textContent = "";
                    }
                });
            </script>

        <label class="lable" for="l_address">Address:
        <input type="text" id="l_address" name="l_address" placeholder="l_address" value="<?php echo $data["l_address"];?>" required>
        </label>

        <label class="label" for="l_department">Department:
            <select id="l_department" name="l_department" required>
                <option value="UCSC" <?php echo strtoupper($data["l_department"]) == 'UCSC' ? 'selected' : ''; ?>>UCSC</option>
                <option value="Sicece - Mathemetics" <?php echo strtoupper($data["l_department"]) == 'SICECE - MATHEMETICS' ? 'selected' : ''; ?>>Sicece - Mathemetics</option>
                <option value="Sicece - Chemistry" <?php echo strtoupper($data["l_department"]) == 'SICECE - CHEMISTRY' ? 'selected' : ''; ?>>Sicece - Chemistry</option>
                <option value="Sicece - Physics" <?php echo strtoupper($data["l_department"]) == 'SICECE - PHYSICS' ? 'selected' : ''; ?>>Sicece - Physics</option>
                <option value="Medicine" <?php echo strtoupper($data["l_department"]) == 'MEDICINE' ? 'selected' : ''; ?>>Medicine</option>
                <option value="Statistics" <?php echo strtoupper($data["l_department"]) == 'STATISTICS' ? 'selected' : ''; ?>>Statistics</option>

            </select>
        </label>

        <label class="label" for="l_positionRank">Position Rank:
            <select id="l_positionRank" name="l_positionRank" required>
                <option value="Professor" <?php echo $data["l_positionRank"] == 'Professor' ? 'selected' : ''; ?>>Professor</option>
                <option value="Department Head" <?php echo $data["l_positionRank"] == 'Department Head' ? 'selected' : ''; ?>>Department Head</option>
                <option value="Senior Lecturer" <?php echo $data["l_positionRank"] == 'Senior Lecturer' ? 'selected' : ''; ?>>Senior Lecturer</option>
                <option value="Senior Lecturer (On Contract)" <?php echo $data["l_positionRank"] == 'Senior Lecturer (On Contract)' ? 'selected' : ''; ?>>Senior Lecturer (On Contract)</option>
                <option value="Lecturer" <?php echo $data["l_positionRank"] == 'Lecturer' ? 'selected' : ''; ?>>Lecturer</option>
                <option value="Lecturer (On Contract)" <?php echo $data["l_positionRank"] == 'Lecturer (On Contract)' ? 'selected' : ''; ?>>Lecturer (On Contract)</option>
                <option value="Lecturers (Probationary)" <?php echo $data["l_positionRank"] == 'Lecturers (Probationary)' ? 'selected' : ''; ?>>Lecturers (Probationary)</option>
            </select>
        </label>

        <label class="lable" for="l_dateOfJoin">Date Of Join:
        <input type="date" id="l_dateOfJoin" name="l_dateOfJoin" placeholder="l_dateOfJoin" value="<?php echo $data["l_dateOfJoin"];?>" required>
        </label>

        <!-- <label class="lable" for="l_qualifications">Qualifications:
        <input type="text" id="l_qualifications" name="l_qualifications" placeholder="l_qualifications" value="<?php echo strtoupper($data["l_qualifications"]);?>" oninput="this.value = this.value.toUpperCase();" required>
        </label> -->

        <label class="label" for="l_qualifications">Qualifications:
            
        <input type="text" id="l_qualifications" name="l_qualifications" placeholder="l_qualifications" value="<?php echo strtoupper($data["l_qualifications"]);?>" required>
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
            var qualificationsInput = document.getElementById("l_qualifications");

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