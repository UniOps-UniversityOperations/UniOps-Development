<?php $style = "createSubject"; ?>

<?php require APPROOT . '/views/includes/admin/adminHeader.php'; ?>

<h1>Add New Subject</h1><br>

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
        left: 78%; 
        transform: 
        translate(50%, -25%); 
        background-color: white; 
        padding: 20px 20px 20px 20px;
        margin-right: 20px;
        border: 1px red solid; 
        transition: top 0.5s ease;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.5);">
        <!-- if popup = 1 Request Email Sent | if popup = 2 Status Email Sent -->
        <p>Subject ID already exists! </p>
        
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

<div class="content">
    <form action="<?php echo URLROOT;?>/adminPosts/createSubject" method="post">

    <fieldset>
        <!-- input feilds -->

        <label class="lable" for="sub_code">Code:
        <input type="text" id="sub_code" name="sub_code" placeholder="sub_code" value="<?php $data["sub_code"];?>" oninput="this.value = this.value.toUpperCase();" required>
        </label>

        <label class="lable" for="sub_name">Name:
        <input type="text" id="sub_name" name="sub_name" placeholder="sub_name" value="<?php $data["sub_name"];?>" oninput="this.value = this.value.toUpperCase();" required>
        </label>

        <label class="label" for="credit_type">Credit:
            <select id="sub_credits" name="sub_credits" required>
                <option value="1">1</option>
                <option value="2">2</option>
                <option value="3">3</option>
                <option value="4">4</option>
                <option value="8">8</option>

            </select>
        </label>


        <label class="lable" for="sub_year">Year:
            <select id="sub_year" name="sub_year" required>
                <option value="1">1</option>
                <option value="2">2</option>
                <option value="3">3</option>
                <option value="4">4</option>
            </select>
        </label>

        <label class="lable" for="sub_semester">Semester:
            <select id="sub_semester" name="sub_semester" required>
                <option value="0">1 / 2</option>
                <option value="1">1</option>
                <option value="2">2</option>
            </select>
        </label>

        <label class="lable" for="sub_stream">Stream:
            <select id="sub_stream" name="sub_stream" required>
                <option value="CS">CS</option>
                <option value="IS">IS</option>
            </select>
        </label>

        <label class="label" for="sub_nStudents">Number of Students:
        <input type="number" id="sub_nStudents" name="sub_nStudents" placeholder="Type or select" value="<?php echo $data["sub_nStudents"]; ?>" >

        <!-- Pre-defined values as clickable labels in two rows -->
        <div class="button-container">
            <label for="btn1" onclick="setNumberOfStudents(<?php echo $data['variables'][10]->v_value; ?>)">1 yr CS (<?php echo $data['variables'][10]->v_value; ?>)</label>
            <label for="btn2" onclick="setNumberOfStudents(<?php echo $data['variables'][11]->v_value; ?>)">2 yr CS (<?php echo $data['variables'][11]->v_value; ?>)</label>
            <label for="btn3" onclick="setNumberOfStudents(<?php echo $data['variables'][12]->v_value; ?>)">3 yr CS (<?php echo $data['variables'][12]->v_value; ?>)</label>
            <label for="btn4" onclick="setNumberOfStudents(<?php echo $data['variables'][13]->v_value; ?>)">4 yr CS (<?php echo $data['variables'][13]->v_value; ?>)</label>
            
        </div>
        <div class="button-container">
            <label for="btn5" onclick="setNumberOfStudents(<?php echo $data['variables'][14]->v_value; ?>)">1 yr IS (<?php echo $data['variables'][14]->v_value; ?>)</label>
            <label for="btn6" onclick="setNumberOfStudents(<?php echo $data['variables'][15]->v_value; ?>)">2 yr IS (<?php echo $data['variables'][15]->v_value; ?>)</label>
            <label for="btn7" onclick="setNumberOfStudents(<?php echo $data['variables'][16]->v_value; ?>)">3 yr IS (<?php echo $data['variables'][16]->v_value; ?>)</label>
            <label for="btn8" onclick="setNumberOfStudents(<?php echo $data['variables'][17]->v_value; ?>)">4 yr IS (<?php echo $data['variables'][17]->v_value; ?>)</label>
        </div>
        </label>

        <script>
            // Function to set the number of students when a label is clicked
            function setNumberOfStudents(value) {
                document.getElementById('sub_nStudents').value = value;
            }
        </script>
                
    </fieldset>
        <!-- Checkeck boxes -->

        <fieldset>

        <label>
        <input type="checkbox" class="inline"  id="is_ac" name="sub_isCore" value="true">
        Is a Core Subject</label>

        <label>
        <input type="checkbox" class="inline"  id="is_al" name="sub_isHaveLecture" value="true">
        Has a Lecture</label>

        <label>
        <input type="checkbox" class="inline"  id="is_al" name="sub_isHaveTutorial" value="true">
        Has a Tutorial</label>

        <label>
        <input type="checkbox" class="inline"  id="is_al" name="sub_isHavePractical" value="true">
        Has a Practical</label>
        
        </fieldset>

        <button type="submit" class="create_button">Create Subject</button>
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
        sub_nStudents
        sub_isCore
        sub_isHaveLecture
        sub_isHaveTutorial
        sub_isHavePractical
        sub_isDeleted -->