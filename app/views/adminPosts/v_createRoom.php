<!-- this variable is used to set the css file for this view -->
<?php $style = "createRoom"; ?>

<?php require APPROOT . '/views/includes/adminHeader.php'; ?>

<h1>Add New Room</h1><br>

<div class="content">
    <form action="<?php echo URLROOT;?>/adminPosts/createRoom" method="post">

    <fieldset>
        <!-- input feilds -->

        <!-- <label class="lable" for="id">ID:
        <input type="text" id="id" name="id" placeholder="id" value="<?php $data["id"];?>" required>
        </label> -->

        <label class="lable" for="name">Name / Code:
        <input type="text" id="name" name="name" placeholder="name" value="<?php $data["name"];?>" oninput="this.value = this.value.toUpperCase();" required>
        </label>

        <label class="label" for="room_type">Credit:
            <select id="type" name="type" required>
                <option value="LECTUER">LECTUER</option>
                <option value="LAB">LAB</option>
                <option value="MEEING">MEEING</option>
                <option value="COMMON">COMMON</option>
                <option value="OTHER">OTHER</option>
            </select>
        </label>

        <label class="lable" for="capacity">Capacity:
        <input type="number" id="capacity" name="capacity" placeholder="capacity" value="<?php $data["capacity"];?>" required>
        </label>

        <label class="lable" for="current_availability">Current Avaliability:
        <input type="text" id="current_availability" name="current_availability" placeholder="current_availability" value="<?php $data["current_availability"];?>" required>
        </label>

        <label class="lable" for="no_of_tables">No of Tables:
        <input type="number" id="no_of_tables" name="no_of_tables" placeholder="no_of_tables" value="<?php $data["no_of_tables"];?>" required>
        </label>

        <label class="lable" for="no_of_chairs">No of Chairs:
        <input type="number" id="no_of_chairs" name="no_of_chairs" placeholder="no_of_chairs" value="<?php $data["no_of_chairs"];?>" required>
        </label>

        <label class="lable" for="no_of_boards">No of Boards:
        <input type="number" id="no_of_boards" name="no_of_boards" placeholder="no_of_boards" value="<?php $data["no_of_boards"];?>" required>
        </label>

        <label class="lable" for="no_of_projectors">No of Projectors:
        <input type="number" id="no_of_projectors" name="no_of_projectors" placeholder="no_of_projectors" value="<?php $data["no_of_projectors"];?>" required>
        </label>

        <label class="lable" for="no_of_computers">No of Computers:
        <input type="number" id="no_of_computers" name="no_of_computers" placeholder="no_of_computers" value="<?php $data["no_of_computers"];?>" required>
        </label>

    </fieldset>
        <!-- Checkeck boxes -->

        <fieldset>

        <label>
        <input type="checkbox" class="inline"  id="is_ac" name="is_ac" value="true">
        A/C or Non A/C</label>

        <label>
        <input type="checkbox" class="inline"  id="is_wifi" name="is_wifi" value="true">
        Wifi or Non Wifi</label>

        <label>
        <input type="checkbox" class="inline"  id="is_media" name="is_media" value="true">
        Media or Non Media</label>

        <label>
        <input type="checkbox" class="inline"  id="is_lecture" name="is_lecture" value="true">
        Is available for Lecture</label>

        <label>
        <input type="checkbox" class="inline"  id="is_lab" name="is_lab" value="true">
        Is available for Lab</label>

        <label>
        <input type="checkbox" class="inline"  id="is_tutorial" name="is_tutorial" value="true">
        Is available for Tutorial</label>

        <label>
        <input type="checkbox" class="inline"  id="is_meeting" name="is_meeting" value="true">
        Is a Meeting</label>

        <label>
        <input type="checkbox" class="inline"  id="is_seminar" name="is_seminar" value="true">
        Is available for Seminar</label>

        <label>
        <input type="checkbox" class="inline"  id="is_exam" name="is_exam" value="true">
        Is available for Exam</label>


        
        </fieldset>

        <button type="submit" class="create_button">Create Room</button>
    </form>
</div>

    <!-- Footer Section -->
<?php require APPROOT . '/views/includes/adminFooter.php'; ?>
