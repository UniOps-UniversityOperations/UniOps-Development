<?php $style = "Lecturer_dashboard"; ?>

<?php require APPROOT . '/views/includes/LecturerHeader.php'; ?>

<h1>Lecturer Dashboard </h1>

<div class="date-container">
    <?php 
        echo date('l, F jS Y');
    ?>
</div>

<?php require APPROOT . '/views/includes/LecturerFooter.php'; ?>