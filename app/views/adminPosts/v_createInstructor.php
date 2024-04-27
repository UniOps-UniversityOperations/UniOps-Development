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


<h1>Add New Instructor / Assistant Lecturer</h1>

<div class="content">
    <form action="<?php echo URLROOT;?>/adminPosts/createInstructor/" method="post">

        <!-- input feilds -->

        <fieldset>
        <h3>Instructor / Assistant Lecturer Details:</h3>

            <!-- importent message  (Initials and Email must be unique) -->
            <p style="color:red">Important: <b>Initials</b> and <b>Email</b> must be unique.</p>

            <label class="lable" for="i_code">Initials (Must be unique) :
            <input type="text" id="i_code" name="i_code" placeholder="i_code" value="<?php $data["i_code"];?>" required>
            </label>
  
            <label class="lable" for="i_fullName">Full Name:
                <input type="text" id="i_fullName" name="i_fullName" placeholder="i_fullName" value="<?php $data["i_fullName"];?>" required>
            </label>
            
            <label class="lable" for="i_nameWithInitials">Name With Initials:
                <input type="text" id="i_nameWithInitials" name="i_nameWithInitials" placeholder="i_nameWithInitials" value="<?php $data["i_nameWithInitials"];?>" required>
            </label>
            
            <label class="lable" for="i_email">Email (Must be unique) :
            <input type="text" id="i_email" name="i_email" placeholder="i_email" value="<?php $data["i_email"];?>" required>
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

            <!-- <label class="lable" for="i_contactNumber">Contact Number:
            <input type="text" id="i_contactNumber" name="i_contactNumber" placeholder="i_contactNumber" value="<?php $data["i_contactNumber"];?>" required>
            </label> -->

            <label class="label" for="i_contactNumber">Contact Number:
                <input type="text" id="i_contactNumber" name="i_contactNumber" placeholder="i_contactNumber" required>
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
            <input type="text" id="i_address" name="i_address" placeholder="i_address" value="<?php $data["i_address"];?>" required>
            </label>

            <!-- <label class="lable" for="i_department">Department:
            <input type="text" id="i_department" name="i_department" placeholder="i_department" value="<?php $data["i_department"];?>" required>
            </label> -->

            <label class="label" for="i_department">Department:
                <select id="i_department" name="i_department" required>
                    <option value="UCSC">UCSC</option>
                    <option value="Sicece - Mathemetics">Sicece - Mathemetics</option>
                    <option value="Sicece - Chemistry">Sicece - Chemistry</option>
                    <option value="Sicece - Physics">Sicece - Physics</option>
                    <option value="Medicine">Medicine</option>
                    <option value="Statistics">Statistics</option>

                </select>
            </label>

            <!-- <label class="lable" for="i_positionRank">Position Rank:
            <input type="text" id="i_positionRank" name="i_positionRank" placeholder="i_positionRank" value="<?php $data["i_positionRank"];?>" required>
            </label> -->

            <label class="label" for="i_positionRank">Credit:
                <select id="i_positionRank" name="i_positionRank" required>
                    <option value="Assistant Lecturer">Assistant Lecturer</option>
                    <option value="Instructor">Instructor</option>
                </select>
            </label>

            <label class="lable" for="i_dateOfJoin">Date Of Join:
            <input type="date" id="i_dateOfJoin" name="i_dateOfJoin" placeholder="i_dateOfJoin" value="<?php $data["i_dateOfJoin"];?>" required>
            </label>

            <!-- <label class="lable" for="i_qualifications">Qualifications:
            <input type="text" id="i_qualifications" name="i_qualifications" placeholder="i_qualifications" value="<?php $data["i_qualifications"];?>" required>
            </label> -->

            <label class="label" for="i_qualifications">Qualifications:
            
            <input type="text" id="i_qualifications" name="i_qualifications" placeholder="i_qualifications" required>
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
        <button type="submit" class="create_button">Create Instructor / Assistant Lecturer</button>


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

    
