<!-- this variable is used to set the css file for this view -->
<?php $style = "createLectureRoom"; ?> 

<?php require APPROOT . '/views/includes/header.php'; ?>

<div class="content">
    <h2>Update Lecture Room Information</h2>
    <form action="<?php echo URLROOT;?>/AdminPosts/updateRoom/<?php echo $data['id'];?>" method="POST">

        <!-- input feilds -->

        <label class="lable" for="id">Room ID:</label>
        <input type="text" id="id" name="id" placeholder="id" value="<?php echo $data["id"];?>" required><br><br>

        <label class="lable" for="name">Room Name:</label>
        <input type="text" id="name" name="name" placeholder="name" value="<?php echo $data["name"];?>" required><br><br>

        <label class="lable" for="type">Room Type:</label>
        <input type="text" id="type" name="type" placeholder="type" value="<?php echo $data["type"];?>" required><br><br>

        <label class="lable" for="capacity">Room Capacity:</label>
        <input type="text" id="capacity" name="capacity" placeholder="capacity" value="<?php echo $data["capacity"];?>" required><br><br>

        <label class="lable" for="current_availability">Current Availability:</label>
        <input type="text" id="current_availability" name="current_availability" placeholder="current_availability" value="<?php echo $data["current_availability"];?>" required><br><br>

        <label class="lable" for="no_of_tables">Number of Tables:</label>
        <input type="number" id="no_of_tables" name="no_of_tables" placeholder="no_of_tables" value="<?php echo $data["no_of_tables"];?>" required><br><br>

        <label class="lable" for="no_of_chairs">Number of Chairs:</label>
        <input type="number" id="no_of_chairs" name="no_of_chairs" placeholder="no_of_chairs" value="<?php echo $data["no_of_chairs"];?>" required><br><br>

        <label class="lable" for="no_of_boards">Number of Boards:</label>
        <input type="number" id="no_of_boards" name="no_of_boards" placeholder="no_of_boards" value="<?php echo $data["no_of_boards"];?>" required><br><br>

        <label class="lable" for="no_of_projectors">Number of Projectors:</label>
        <input type="number" id="no_of_projectors" name="no_of_projectors" placeholder="no_of_projectors" value="<?php echo $data["no_of_projectors"];?>" required><br><br>

        <label class="lable" for="no_of_computers">Number of Computers:</label>
        <input type="number" id="no_of_computers" name="no_of_computers" placeholder="no_of_computers" value="<?php echo $data["no_of_computers"];?>" required><br><br>

        <!-- Checkeck boxes -->

        <label class="lable" for="is_ac">Air Conditioned:</label>
        <input type="checkbox" id="is_ac" name="is_ac" value="1" <?php echo $data["is_ac"] == 1 ? 'checked' : '';?>><br><br>

        <label class="lable" for="is_wifi">Wifi:</label>
        <input type="checkbox" id="is_wifi" name="is_wifi" value="1" <?php echo $data["is_wifi"] == 1 ? 'checked' : '';?>><br><br>

        <label class="lable" for="is_media">Media:</label>
        <input type="checkbox" id="is_media" name="is_media" value="1" <?php echo $data["is_media"] == 1 ? 'checked' : '';?>><br><br>

        <label class="lable" for="is_lecture">Lecture:</label>
        <input type="checkbox" id="is_lecture" name="is_lecture" value="1" <?php echo $data["is_lecture"] == 1 ? 'checked' : '';?>><br><br>

        <label class="lable" for="is_lab">Lab:</label>
        <input type="checkbox" id="is_lab" name="is_lab" value="1" <?php echo $data["is_lab"] == 1 ? 'checked' : '';?>><br><br>

        <label class="lable" for="is_tutorial">Tutorial:</label>
        <input type="checkbox" id="is_tutorial" name="is_tutorial" value="1" <?php echo $data["is_tutorial"] == 1 ? 'checked' : '';?>><br><br>

        <label class="lable" for="is_meeting">Meeting:</label>
        <input type="checkbox" id="is_meeting" name="is_meeting" value="1" <?php echo $data["is_meeting"] == 1 ? 'checked' : '';?>><br><br>

        <label class="lable" for="is_seminar">Seminar:</label>
        <input type="checkbox" id="is_seminar" name="is_seminar" value="1" <?php echo $data["is_seminar"] == 1 ? 'checked' : '';?>><br><br>

        <label class="lable" for="is_exam">Exam:</label>
        <input type="checkbox" id="is_exam" name="is_exam" value="1" <?php echo $data["is_exam"] == 1 ? 'checked' : '';?>><br><br>

        <button type="submit">Create Room</button>
    </form>
</div>

    <!-- Footer Section -->
<?php require APPROOT . '/views/includes/footer.php'; ?>

