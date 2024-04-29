<?php $style = "logReport"; ?>

<?php require APPROOT . '/views/includes/adminHeader.php'; ?>

<h1>Reports &#10145; LOG REPORT</h1>

<div class="container">
    <div>
        <label for="start_date">Start Date:</label>
        <input type="date" id="start_date">
    </div>
    <div>
        <label for="end_date">End Date:</label>
        <input type="date" id="end_date">
    </div>
    <div>
        <label for="start_time">Start Time:</label>
        <input type="time" id="start_time">
    </div>
    <div>
        <label for="end_time">End Time:</label>
        <input type="time" id="end_time">
    </div>
    <button onclick="filterLogs()">Apply Filters</button>
</div>

<div class="table-container">
    <table class="table" id="log_table">
        <thead>
            <tr>
                <th>Log ID</th>
                <th>User ID</th>
                <th>User Role</th>
                <th>Log Description</th>
                <th>Timestamp</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach($data['logs'] as $log) : 

                $role = "Unknown";

                switch($log->user_role) {
                    case 'A':
                        $role = 'Administrator';
                        break;
                    case 'L':
                        $role = 'Lecturer';
                        break;
                    case 'I':
                        $role = 'Instructor';
                        break;
                    case 'S':
                        $role = 'Student';
                        break;
                }

                ?>

                <tr>
                    <td><?php echo $log->id; ?></td>
                    <td><?php echo $log->user_id; ?></td>
                    <td><?php echo $role; ?></td>
                    <td><?php echo $log->data; ?></td>
                    <td><?php echo $log->timestamp; ?></td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>

<script>
    function filterLogs() {
        var startDate = document.getElementById("start_date").value;
        var endDate = document.getElementById("end_date").value;
        var startTime = document.getElementById("start_time").value;
        var endTime = document.getElementById("end_time").value;

        var logTable = document.getElementById("log_table");
        var logRows = logTable.getElementsByTagName("tr");

        for (var i = 1; i < logRows.length; i++) {
            var logRow = logRows[i];
            var logTimestamp = logRow.cells[4].textContent; // Assuming timestamp is in the fifth cell

            // Split timestamp to date and time
            var logDate = logTimestamp.split(" ")[0];
            var logTime = logTimestamp.split(" ")[1];

            // Check if log entry falls within the specified range
            if ((startDate === "" || logDate >= startDate) &&
                (endDate === "" || logDate <= endDate) &&
                (startTime === "" || logTime >= startTime) &&
                (endTime === "" || logTime <= endTime)) {
                logRow.style.display = "";
            } else {
                logRow.style.display = "none";
            }
        }
    }
</script>

</script>

<!-- Footer Section -->
<?php require APPROOT . '/views/includes/adminFooter.php'; ?>