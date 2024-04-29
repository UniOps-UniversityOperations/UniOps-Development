<?php $style = "reportsDashboard"; ?>

<?php require APPROOT . '/views/includes/adminHeader.php'; ?>

<h1>Reports Dashboard</h1>


  <div class="center">
    <div class="row">
        <a href="<?php echo URLROOT;?>/Reports/viewOverallReport" class="btn1 btn"><h2>Overall Report</h2></a>
        <a href="<?php echo URLROOT;?>/Reports/viewLogReport" class="btn2 btn"><h2>Log<br>Report</h2></a>
    </div>
    <div class="row">
        <a href="<?php echo URLROOT;?>/Reports/viewLecturerReportHome/" class="btn3 btn"><h2>Lecturer Report</h2></a>
        <a href="<?php echo URLROOT;?>/Reports/viewInstructorReportHome/" class="btn4 btn"><h2>Instructor Report</h2></a>
    </div>
  </div>


<!-- Footer Section -->
<?php require APPROOT . '/views/includes/adminFooter.php'; ?>