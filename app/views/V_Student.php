<?php require APPROOT.'\views\includes\StudentHeader.php'?>
<link rel="stylesheet" href="<?php echo URLROOT;?>/css/table.css">
<link rel="stylesheet" href="<?php echo URLROOT;?>/css/student_home_page.css">

<main>

    <div class="left-section">

        <div class="date-container">
            <?php
                // Set the timezone to Asia/Colombo (Sri Lanka timezone)
                date_default_timezone_set('Asia/Colombo');

                // Get the current date and day in the desired format
                $currentDate = date('d-F-Y'); // Outputs something like: Date : 20-September-2023 Monday
                echo $currentDate."<br>".date('l');
            ?>
        </div>


        <div class="timetable-container">
            <table>
                <tr class="title">
                    <th>Time</th>
                    <th>Event Type</th>
                    <th>Year</th>
                    <th>Lecture</th>
                    <th>Place</th>
                </tr>
                <tr>
                    <td>9.00-10.00</td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                </tr>
                <tr>
                    <td>10.00-12.00</td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                </tr>
                <tr>
                <td>12.00-1.00</td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                </tr>
                <tr>
                    <td>1.00-3.00</td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                </tr>
                <tr>
                    <td>3.00-5.00</td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                </tr>
            </table>

        </div>

    </div>

</main>

<?php require APPROOT.'\views\includes\studentFooter.php'?>


