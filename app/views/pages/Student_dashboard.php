<?php $style = "Student_dashboard"; ?>

<?php require APPROOT . '/views/includes/studentHeader.php';?>

<div class="imagecontainer">
<img src="<?php echo URLROOT;?>/images/Welcome-img.svg" class="welcome-img" alt="Welcome Image">
</div>
<br>

<div class="date-container">
    <h3>
    <?php 
        echo date('l, F jS Y');
    ?>
    </h3>
</div>


<?php
    if(!empty($data)){
        echo "
            <div class='styled-table'>
            <table>
                <thead>
                    <tr>
                        <th>Start Time</th>
                        <th>End Time</th>
                        <th>Course Code</th>
                        <th>Course Name</th>
                        <th>Location</th>
                    </tr>
                </thead>

                <tbody>";

                foreach ($data as $row) {
                    echo '<tr>';
                    echo '<td>'.$row->start_time.'</td>';
                    echo '<td>'.$row->end_time.'</td>';
                    echo '<td>'.$row->course_code.'</td>';
                    echo '<td>'.$row->course_name.'</td>';
                    echo '<td>'.$row->location.'</td>';
                    echo '</tr>';
                }

                "</tbody>

            </table>";
}
else {
    echo "
    <div class='holiday'>
        <p>No Scheduled Work today. Maybe it's a Holiday!</p>
    </div>
    ";
}

?>


    </div>

<?php require APPROOT . '/views/includes/StudentFooter.php'; ?>