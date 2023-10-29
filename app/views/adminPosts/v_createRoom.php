<!-- this variable is used to set the css file for this view -->
<?php $style = "createRoom"; ?>

<?php require APPROOT . '/views/includes/header.php'; ?>

<div class="content">
    <h2>Room Information</h2>
    <form action="<?php echo URLROOT;?>/adminPosts/createRoom" method="post">

        <!-- input feilds -->

        <label class="lable" for="id">Room ID:</label>
        <input type="text" id="id" name="id" placeholder="id" value="<?php $data["id"];?>" required><br><br>

        <label class="lable" for="name">Room Name:</label>
        <input type="text" id="name" name="name" placeholder="name" value="<?php $data["name"];?>" required><br><br>

        <label class="lable" for="type">Room Type (lecture, lab, meeting):</label>
        <input type="text" id="type" name="type" placeholder="type" value="<?php $data["type"];?>" required><br><br>

        <label class="lable" for="capacity">Capacity:</label>
        <input type="number" id="capacity" name="capacity" placeholder="capacity" value="<?php $data["capacity"];?>" required><br><br>

        <label class="lable" for="current_availability">Current Avaliability:</label>
        <input type="text" id="current_availability" name="current_availability" placeholder="current_availability" value="<?php $data["current_availability"];?>" required><br><br>

        <label class="lable" for="no_of_tables">No of Tables:</label>
        <input type="number" id="no_of_tables" name="no_of_tables" placeholder="no_of_tables" value="<?php $data["no_of_tables"];?>" required><br><br>

        <label class="lable" for="no_of_chairs">No of Chairs:</label>
        <input type="number" id="no_of_chairs" name="no_of_chairs" placeholder="no_of_chairs" value="<?php $data["no_of_chairs"];?>" required><br><br>

        <label class="lable" for="no_of_boards">No of Boards:</label>
        <input type="number" id="no_of_boards" name="no_of_boards" placeholder="no_of_boards" value="<?php $data["no_of_boards"];?>" required><br><br>

        <label class="lable" for="no_of_projectors">No of Projectors:</label>
        <input type="number" id="no_of_projectors" name="no_of_projectors" placeholder="no_of_projectors" value="<?php $data["no_of_projectors"];?>" required><br><br>

        <label class="lable" for="no_of_computers">No of Computers:</label>
        <input type="number" id="no_of_computers" name="no_of_computers" placeholder="no_of_computers" value="<?php $data["no_of_computers"];?>" required><br><br>

        <!-- Checkeck boxes -->

        <label class="lable" for="is_ac">A/C or Non A/C:</label>
        <input type="checkbox" id="is_ac" name="is_ac" value="true"><br><br>

        <label class="lable" for="is_wifi">Wifi or Non Wifi:</label>
        <input type="checkbox" id="is_wifi" name="is_wifi" value="true"><br><br>

        <label class="lable" for="is_media">Media or Non Media:</label>
        <input type="checkbox" id="is_media" name="is_media" value="true"><br><br>

        <label class="lable" for="is_lecture">is available for lectures or not:</label>
        <input type="checkbox" id="is_lecture" name="is_lecture" value="true"><br><br>

        <label class="lable" for="is_lab">is available for labs or not:</label>
        <input type="checkbox" id="is_lab" name="is_lab" value="true"><br><br>

        <label class="lable" for="is_tutorial">is available for tutorials or not:</label>
        <input type="checkbox" id="is_tutorial" name="is_tutorial" value="true"><br><br>

        <label class="lable" for="is_meeting">is available for meetings or not:</label>
        <input type="checkbox" id="is_meeting" name="is_meeting" value="true"><br><br>

        <label class="lable" for="is_seminar">is available for seminars or not:</label>
        <input type="checkbox" id="is_seminar" name="is_seminar" value="true"><br><br>

        <label class="lable" for="is_exam">is available for exams or not:</label>
        <input type="checkbox" id="is_exam" name="is_exam" value="true"><br><br>


        <button type="submit">Create Room</button>
    </form>
</div>

    <!-- Footer Section -->
<?php require APPROOT . '/views/includes/footer.php'; ?>
