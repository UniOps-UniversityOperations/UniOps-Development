<?php $style = "createSubject"; ?>

<?php require APPROOT . '/views/includes/adminHeader.php'; ?>

<h1>Add New Subject</h1><br>

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
            <label for="btn1" onclick="setNumberOfStudents(230)">1<sup>st</sup> year CS</label>
            <label for="btn2" onclick="setNumberOfStudents(230)">2<sup>nd</sup> year CS</label>
            <label for="btn3" onclick="setNumberOfStudents(170)">3<sup>rd</sup> year CS</label>
            <label for="btn4" onclick="setNumberOfStudents(60)">4<sup>th</sup> year CS</label>
        </div>
        <div class="button-container">
            <label for="btn5" onclick="setNumberOfStudents(50)">50 Students</label>
            <label for="btn6" onclick="setNumberOfStudents(60)">60 Students</label>
            <label for="btn7" onclick="setNumberOfStudents(70)">70 Students</label>
            <label for="btn8" onclick="setNumberOfStudents(80)">80 Students</label>
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

        <button type="submit" class="create_button">Create Room</button>
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