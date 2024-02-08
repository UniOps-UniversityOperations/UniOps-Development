<head>
    <link rel="stylesheet" href="/public/css/add.css">
</head>

<?php require_once '../../config/config.php' ?>
<?php require APPROOT . '/views/includes/adminHeader.php'; ?>

<div class="title">
    <h1>Add Timetable</h1>
</div>

<div class="form-div">
    <div class="add-div">
        <form method="post" class="add">
            <div class="enter-details">
                <label for="timetable_type">Type</label>
                <select id="timetable_type" name="timetable_type">
                    <option value="exam">Exam</option>
                    <option value="lecture">Lecture</option>
                </select>
            </div>
            <div class="enter-details">
                <label for="degree">Degree</label>
                <select id="degree" name="degree">
                    <option value="CS">CS</option>
                    <option value="IS">IS</option>
                </select>
            </div>
            <div class="enter-details">
                <label for="student_year">Year</label>
                <select id="student_year" name="student_year">
                    <option value="first-year">First Year</option>
                    <option value="second-year">Second Year</option>
                    <option value="third-year">Third Year</option>
                    <option value="fourth-year">Fourth Year</option>
                </select>
            </div>
            <div class="enter-details">
                <label for="semester">Semester</label>
                <select id="semester" name="semester">
                    <option value="first-semester">First Semester</option>
                    <option value="second-semester">Second Semester</option>
                </select>
            </div>
            <div class="enter-details">
                <label for="academic-year">Academic Year</label>
                <select id="academic-year" name="academic-year">
                    <option value="year-1">2020/2021</option>
                    <option value="year-2">2021/2022</option>
                </select>
            </div>

            

        </form>
    </div>

    <div class="add-div">
        <form action=""  class="add">
            <div class="enter-details">
                <label for="course-code">Course Code</label>
                <select id="course-code" name="course-code">
                    <option value="scs1205">SCS 1205</option>
                </select>
            </div>
            <div class="enter-details">
                <label for="semester">Course Name</label>
                <select name="semester">
                    <option value="first-semester">First Semester</option>
                    <option value="second-semester">Second Semester</option>
                </select>
            </div>
            <div class="enter-details">
                <label for="semester">Lecturer Code</label>
                <select name="semester">
                    <option value="first-semester">First Semester</option>
                    <option value="second-semester">Second Semester</option>
                </select>
            </div>
            <div class="enter-details">
                <label for="semester">Lecturer Name</label>
                <select name="semester">
                    <option value="first-semester">First Semester</option>
                    <option value="second-semester">Second Semester</option>
                </select>
            </div>
            <div class="enter-details">
                <label for="semester">Lecture Room</label>
                <select name="semester">
                    <option value="first-semester">First Semester</option>
                    <option value="second-semester">Second Semester</option>
                </select>
            </div>
        </form>
        <input type="submit" class="btn" value="Update Time Slot">
    </div>
</div>

<div class="table-div">
    <table>
        <tr>
            <th>Time</th>
            <th>Monday</th>
            <th>Tuesday</th>
            <th>Wednesday</th>
            <th>Thursday</th>
            <th>Friday</th>
        </tr>
        <tr>
            <td>8.00am - 10.00am</td>
            <?php
                for ($i = 1; $i <= 5; $i++) {
                    echo "<td>+</td>";
                }
            ?>
        </tr>
        <tr>
            <td>10.00am - 12.00pm</td>
            <?php
                for ($i = 1; $i <= 5; $i++) {
                    echo "<td>+</td>";
                }
            ?>
        </tr>
        <tr>
            <td>12.00pm - 1.00pm</td>
            <td colspan="5">Break</td>
        </tr>
        <tr>
            <td>1.00pm - 3.00pm</td>
            <?php
                for ($i = 1; $i <= 5; $i++) {
                    echo "<td>+</td>";
                }
            ?>
        </tr>
        <tr>
            <td>3.00pm - 5.00pm</td>
            <?php
                for ($i = 1; $i <= 5; $i++) {
                    echo "<td>+</td>";
                }
            ?>
        </tr>
        <tr>
            <td>5.00pm - 7.00pm</td>
            <?php
                for ($i = 1; $i <= 5; $i++) {
                    echo "<td>+</td>";
                }
            ?>
        </tr>
    </table>
    <input type="submit" value="Add Timetable" class="btn">
</div>

