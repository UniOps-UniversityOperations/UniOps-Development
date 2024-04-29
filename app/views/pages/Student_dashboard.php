<?php $style = "Student_dashboard"; ?>

<?php require APPROOT . '/views/includes/studentHeader.php'; ?>

<div class="imagecontainer">
    <img src="<?php echo URLROOT;?>/images/Welcome-img.svg" class="welcome-img" alt="Welcome Image">
</div>
<br>
<br>
<h1>Student Time Table</h1>
<br>
<div class="date-container">
    <h3><?php echo date('l, F jS Y'); ?></h3>
</div>
<br>

<form action="<?php echo URLROOT;?>/Pages/student_dashboard1" method="post">
    <label for="day">Select day:</label>
    <select name="day" id="day">
    <option value="">Select</option>

        <option value="Monday">Monday</option>
        <option value="Tuesday">Tuesday</option>
        <option value="Wednesday">Wednesday</option>
        <option value="Thursday">Thursday</option>
        <option value="Friday">Friday</option>



        <!-- <option value="Friday"></option> -->

        <!-- Add more options for other days -->
    </select>
    <button type="submit">Enter</button>
</form>

<div class="dashboard-content">
    <?php
    if (!empty($data)) {
        echo "<div class='styled-table'>
                <table>
                    <thead>
                        <tr>
                            <th>Start Time</th>
                            <th>End Time</th>
                            <th>Course Code</th>
                            <th>Course Name</th>
                            <th>Location</th>
                            <th>Course Type</th>
                        </tr>
                    </thead>
                    <tbody>";

        foreach ($data as $row) {
            echo '<tr>';
            echo '<td>' . $row->start_time . '</td>';
            echo '<td>' . $row->end_time . '</td>';
            echo '<td>' . $row->course_code . '</td>';
            echo '<td>' . $row->course_name . '</td>';
            echo '<td>' . $row->location . '</td>';
            echo '<td>' . $row->course_type . '</td>';
            echo '</tr>';
        }

        echo "</tbody></table></div>";
    } else {
        echo "<div class='holiday'>
                <p>No Scheduled Work today. Maybe it's a Holiday!</p>
            </div>";
    }
    ?>
</div>

<?php require APPROOT . '/views/includes/StudentFooter.php'; ?>
