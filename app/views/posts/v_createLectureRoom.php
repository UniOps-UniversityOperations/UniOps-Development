<!-- this variable is used to set the css file for this view -->
<?php $style = "createLectureRoom"; ?> 

<?php require APPROOT . '/views/includes/header.php'; ?>

<div class="content">
    <h2>Lecture Room Information</h2>
    <form action="<?php echo URLROOT;?>/Posts/createLectureRoom" method="post">

        <!-- input feilds -->

        <label class="lable" for="LR_ID">Room ID:</label>
        <input type="text" id="LR_ID" name="LR_ID" placeholder="LR_ID" value="<?php $data["LR_ID"];?>" required><br>
        <span class="invalidFeedback">value = "<?php echo $data['LR_IDError'];?>"</span><br><br>

        <label class="lable" for="LR_Name">Room Name:</label>
        <input type="text" id="LR_Name" name="LR_Name" placeholder="LR_Name" value="<?php $data["LR_Name"];?>" required><br><br>

        <label class="lable" for="LR_Capacity">Capacity:</label>
        <input type="number" id="LR_Capacity" name="LR_Capacity" placeholder="LR_Capacity" value="<?php $data["LR_Capacity"];?>" required><br><br>

        <label class="lable" for="LR_Current_Avaliability">Current Avaliability:</label>
        <input type="text" id="LR_Current_Avaliability" name="LR_Current_Avaliability" placeholder="LR_Current_Avaliability" value="<?php $data["LR_Current_Avaliability"];?>" required><br><br>

        <label class="lable" for="LR_No_of_Chairs">No of Chairs:</label>
        <input type="number" id="LR_No_of_Chairs" name="LR_No_of_Chairs" placeholder="LR_No_of_Chairs" value="<?php $data["LR_No_of_Chairs"];?>" required><br><br>

        <label class="lable" for="LR_No_of_Tables">No of Tables:</label>
        <input type="number" id="LR_No_of_Tables" name="LR_No_of_Tables" placeholder="LR_No_of_Tables" value="<?php $data["LR_No_of_Tables"];?>" required><br><br>

        <label class="lable" for="LR_No_of_Bords">No of Bords:</label> 
        <input type="number" id="LR_No_of_Bords" name="LR_No_of_Bords" placeholder="LR_No_of_Bords" value="<?php $data["LR_No_of_Bords"];?>" required><br><br>

        <label class="lable" for="LR_No_of_Projectors">No of Projectors:</label>
        <input type="number" id="LR_No_of_Projectors" name="LR_No_of_Projectors" placeholder="LR_No_of_Projectors" value="<?php $data["LR_No_of_Projectors"];?>" required><br><br>

        <!-- Checkeck boxes -->

        <label class="lable" for="LR_is_AC">A/C or Non A/C:</label>
        <input type="checkbox" id="LR_is_AC" name="LR_is_AC" value="true"><br><br>

        <label class="lable" for="LR_is_Media">Media or Non Media:</label>
        <input type="checkbox" id="LR_is_Media" name="LR_is_Media" value="true"><br><br>

        <label class="lable" for="LR_is_Wifi">Wifi or Non Wifi:</label>
        <input type="checkbox" id="LR_is_Wifi" name="LR_is_Wifi" value="true"><br><br>

        <label class="lable" for="LR_is_Lecture">is available for lectures or not:</label>
        <input type="checkbox" id="LR_is_Lecture" name="LR_is_Lecture" value="true"><br><br>

        <label class="lable" for="LR_is_Lab">is available for labs or not:</label>
        <input type="checkbox" id="LR_is_Lab" name="LR_is_Lab" value="true"><br><br>

        <label class="lable" for="LR_is_Tutorial">is available for tutorials or not:</label>
        <input type="checkbox" id="LR_is_Tutorial" name="LR_is_Tutorial" value="true"><br><br>

        <label class="lable" for="LR_is_Seminar">is available for seminars or not:</label>
        <input type="checkbox" id="LR_is_Seminar" name="LR_is_Seminar" value="true"><br><br>

        <label class="lable" for="LR_is_Exam">is available for exams or not:</label>
        <input type="checkbox" id="LR_is_Exam" name="LR_is_Exam" value="true"><br><br>

        <label class="lable" for="LR_is_Meeeting">is available for meetings or not:</label>
        <input type="checkbox" id="LR_is_Meeeting" name="LR_is_Meeeting" value="true"><br><br>

        <button type="submit">Create Room</button>
    </form>
</div>

    <!-- Footer Section -->
<?php require APPROOT . '/views/includes/footer.php'; ?>

<!-- 
    The attributes of Lecture Room are:
        - LR_ID
        - LR_Name
        - LR_Capacity
        - LR_Current_Avaliability
        - LR_No_of_Chairs
        - LR_No_of_Tables
        - LR_No_of_Bords
        - LR_No_of_Projectors
        - LR_is_AC (A/C or Non A/C)
        - LR_is_Media (Media or Non Media)
        - LR_is_Wifi (Wifi or Non Wifi)
        - LR_is_Lecture (is available for lectures or not)
        - LR_is_Tutorial (is available for tutorials or not)
        - LR_is_Lab (is available for labs or not)
        - LR_is_Seminar (is available for seminars or not)
        - LR_is_Exam (is available for exams or not)
        - LR_is_Meeeting (is available for meetings or not)
 -->