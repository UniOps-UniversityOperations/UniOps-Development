<?php $style = "reportsDashboard"; ?>

<?php require APPROOT . '/views/includes/adminHeader.php'; ?>

<h1>Reports Dashboard</h1>


  <div class="center">
    <div class="row">
        <a href="" class="btn1 btn"><h2>Overall Report</h2></a>
        <a href="" class="btn2 btn"><h2>Timetable Report</h2></a>
    </div>
    <div class="row">
        <a href="<?php echo URLROOT;?>/Reports/viewLecturerReportHome/" class="btn3 btn"><h2>Lecturer Report</h2></a>
        <a href="" class="btn4 btn"><h2>Instructor Report</h2></a>
    </div>
  </div>


<!-- Footer Section -->
<?php require APPROOT . '/views/includes/adminFooter.php'; ?>