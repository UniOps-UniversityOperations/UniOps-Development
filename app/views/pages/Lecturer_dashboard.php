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
                <tr>
                    <td>8.00-10.00</td>
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

<?php require APPROOT . '/views/includes/LecturerFooter.php'; ?>