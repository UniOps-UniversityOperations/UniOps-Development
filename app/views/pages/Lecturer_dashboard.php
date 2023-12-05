<?php $style = "Lecturer_dashboard"; ?>

<?php require APPROOT . '/views/includes/LecturerHeader.php'; ?>

<h1>Lecturer Dashboard </h1>

<div class="date-container">
    <?php 
        echo date('l, F jS Y');
    ?>
</div>
<div class="styled-table">
            <table>
                <tr>
                    <th>Time</th>
                    <th>Event Type</th>
                    <th>Year</th>
                    <th>Lecture</th>
                    <th>Place</th>
                </tr>

            </table>

    </div>

<?php require APPROOT . '/views/includes/LecturerFooter.php'; ?>