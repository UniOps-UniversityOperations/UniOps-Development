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
            echo "<p>Lecturer initial is already exists</p>";
        }elseif($data['popup'] == 2){
            echo "<p>Lecturer email is already exists</p>";
        }elseif($data['popup'] == 3){
            echo "<p>Lecturer initial and<br> email are already exists</p>";
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

<h1>Add New Lecturer</h1>

<div class="content">
    <form action="<?php echo URLROOT;?>/adminPosts/createLecturer/" method="post">

        <!-- input feilds -->

        <fieldset>
            <h3>Lecturer Details:</h3> 
            
            <!-- importent message  (Initials and Email must be unique) -->
            <p style="color:red">Important: <b>Initials</b> and <b>Email</b> must be unique.</p>

            <label class="lable" for="l_code">Initials:
            <input type="text" id="l_code" name="l_code" placeholder="l_code" value="<?php $data["l_code"];?>" oninput="this.value = this.value.toUpperCase();" required>
            </label>

            
            <label class="lable" for="l_fullName">Full Name:
                <input type="text" id="l_fullName" name="l_fullName" placeholder="l_fullName" value="<?php $data["l_fullName"];?>" oninput="this.value = this.value.toUpperCase();" required>
            </label>
            
            <label class="lable" for="l_nameWithInitials">Name With Initials:
                <input type="text" id="l_nameWithInitials" name="l_nameWithInitials" placeholder="l_nameWithInitials" value="<?php $data["l_nameWithInitials"];?>" oninput="this.value = this.value.toUpperCase();" required>
            </label>
            
            <label class="lable" for="l_email">Email:
            <input type="text" id="l_email" name="l_email" placeholder="l_email" value="<?php $data["l_email"];?>" required>
            </label>
            
            <label class="label">Gender:
                <div class="gender">
                    <label>
                    <input class="inline" type="radio" id="l_gender" name="l_gender" value="M" required>
                    Male</label>

                    <label>
                    <input class="inline" type="radio" id="l_gender" name="l_gender" value="F"required>
                    Female</label>
                </div>
            </label>

            <label class="lable" for="l_dob">Date Of Birth:
            <input type="date" id="l_dob" name="l_dob" placeholder="l_dob" value="<?php $data["l_dob"];?>" required>
            </label>

            <label class="label" for="l_contactNumber">Contact Number:
                <input type="text" id="l_contactNumber" name="l_contactNumber" placeholder="l_contactNumber" required>
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
            <input type="text" id="l_address" name="l_address" placeholder="l_address" value="<?php $data["l_address"];?>" oninput="this.value = this.value.toUpperCase();" required>
            </label>


            <label class="label" for="l_department">Department:
                <select id="l_department" name="l_department" required>
                    <option value="UCSC">UCSC</option>
                    <option value="Sicece - Mathemetics">Sicece - Mathemetics</option>
                    <option value="Sicece - Chemistry">Sicece - Chemistry</option>
                    <option value="Sicece - Physics">Sicece - Physics</option>
                    <option value="Medicine">Medicine</option>
                    <option value="Statistics">Statistics</option>

                </select>
            </label>

            <label class="label" for="l_positionRank">Credit:
                <select id="l_positionRank" name="l_positionRank" required>
                    <option value="Professor">Professor</option>
                    <option value="Senior Lecturer">Senior Lecturer</option>
                    <option value="Lecturer">Lecturer</option>
                </select>
            </label>

            <label class="lable" for="l_dateOfJoin">Date Of Join:
            <input type="date" id="l_dateOfJoin" name="l_dateOfJoin" placeholder="l_dateOfJoin" value="<?php $data["l_dateOfJoin"];?>" required>
            </label>

            <!-- <label class="lable" for="l_qualifications">Qualifications:
            <input type="text" id="l_qualifications" name="l_qualifications" placeholder="l_qualifications" value="<?php $data["l_qualifications"];?>" oninput="this.value = this.value.toUpperCase();" required>
            </label> -->

            <label class="label" for="l_qualifications">Qualifications:
            
            <input type="text" id="l_qualifications" name="l_qualifications" placeholder="l_qualifications" required>
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

        <!-- Checkeck boxes -->

        <fieldset>
            
            <label>
            <input type="checkbox" class="inline"  id="l_isExamSupervisor" name="l_isExamSupervisor" value="true">
            Exam Supervisor</label>

            <label>
            <input type="checkbox" class="inline"  id="l_isSecondExaminar" name="l_isSecondExaminar" value="true">
            Second Examinar</label>
            

        </fieldset>


        <fieldset>
            <!-- Add this Lecturer as a user of the system -->
            <h3>Add as a System User:</h3>

            <label class="lable" for="user_id ">User ID: Lecturer Email </label>

            <label class="lable" for="username">User Name: Lecturer Name With Initials</label>

            <label class="label" for="role">Role: Lecturer </label>

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