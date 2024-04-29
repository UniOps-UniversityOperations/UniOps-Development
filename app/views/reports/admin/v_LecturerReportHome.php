<?php $style = "reportsDashboardHome"; ?>

<?php require APPROOT . '/views/includes/adminHeader.php'; ?>

<h1>Reports &#10145; Lecturers</h1>

<?php
    $lecturer_count = count($data['lecturers']);
    $year_project_count = 0;
    $research_project_count = 0;
    $department_count = $data['department_count']->department_count;
    $assigned_lec_count = $data['assigned_lec_count']->assigned_lec_count;
    $total_subjects_count = $data['total_subjects_count']->total_subjects_count;
    $assigned_subjects_count = $data['assigned_subjects_count']->assigned_subjects_count;

?>

<div class='page'>
    <div class='col1'>
        <h2 class="lecturer_list">Lecturer List</h2>

        <div class="search-container">
            <input type="text" id="search" placeholder="Search by Lecturer name..." >
            <span class="clear-icon" id="clear-search">&#10006;</span>
        </div>

        <!-- A table to display the list of lecturers -->
        <!-- Name, initials, Department, and a button to view the lecturer's report -->
        <div class="lecturer_table">
            <table class="styled-table">
                <thead>
                    <th>Name</th>
                    <th>Initials</th>
                    <th>Department</th>
                    <th>View Report</th>
                </thead>

                <tbody>
                    <?php $i = 0;
                        foreach ($data['lecturers'] as $lecturer) :
                            if($i % 2 == 0){ ?>
                            <tr>
                                <td><?php echo $lecturer->l_nameWithInitials; ?></td>
                                <td><?php echo $lecturer->l_code; ?></td>
                                <td><?php echo $lecturer->l_department; ?></td>
                                <td><a class="report_btn" href="<?php echo URLROOT; ?>/Reports/viewLecturerReport/<?php echo $lecturer->l_code; ?>" class="btn">View Report</a></td>
                            </tr>

                            <?php } else { ?>
                                <tr class="active-row">
                                    <td><?php echo $lecturer->l_nameWithInitials; ?></td>
                                    <td><?php echo $lecturer->l_code; ?></td>
                                    <td><?php echo $lecturer->l_department; ?></td>
                                    <td><a class="report_btn" href="<?php echo URLROOT; ?>/Reports/viewLecturerReport/<?php echo $lecturer->l_code; ?>" class="btn">View Report</a></td>
                                </tr>
                            <?php }  
                            $i++;
                            $year_project_count += $lecturer->l_n2yrProjects + $lecturer->l_n3yrProjects + $lecturer->l_n4yrProjects;
                            $research_project_count += $lecturer->l_nResearch;
                        endforeach;
                    ?>
                </tbody>
            </table>
        </div>
    </div>

    <div class='col2'>
        <div class="top_bar">
            <!-- Lecturer Count -->
            <div class='cell'>
                <h2>Lecurer Count</h2>
                <h1><?php echo $lecturer_count; ?></h1>
            </div>

            <!-- total 2nd year projects -->
            <div class='cell'>
                <h2>2,3,4 Year Projects</h2>
                <h1><?php echo $year_project_count; ?></h1>
            </div>

            <!-- total research projects -->
            <div class='cell'>
                <h2>Research Projects</h2>
                <h1><?php echo $research_project_count; ?></h1>
            </div>

            <!-- total  departments -->
            <div class='cell'>
                <h2>Departments</h2>
                <h1><?php echo $department_count; ?></h1>
            </div>

        </div>

        <div class="bottom_bar">
            <div class="pie_chart">                
                <div class="pieID--micro-skills pie-chart--wrapper">
                    <h2 class="chart_name">Assigned Lecturers</h2>
                    <div class="pie-chart">
                        <div class="pie-chart__pie"></div>
                        <ul class="pie-chart__legend">
                        <li>
                            <!-- assigned_subjects_credits_precentage -->
                            <em>Assigned Number of Lecturers</em>
                            <span><?php echo $assigned_lec_count; ?></span>
                        </li>
                        <li>
                            <!-- 100 - assigned_subjects_credits_precentage -->
                            <em>Unassigned Number of Lecturers</em>
                            <span><?php echo $lecturer_count - $assigned_lec_count; ?></span>
                        </li>
                        </ul>
                    </div>
                </div>

                <div class="pieID--categories pie-chart--wrapper">
                    <h2 class="chart_name">Assigned Subjects</h2>
                    <div class="pie-chart">
                        <div class="pie-chart__pie"></div>
                        <ul class="pie-chart__legend">
                        <li>
                            <!-- assigned_subjects_credits_precentage -->
                            <em>Assigned Number of Subjects</em>
                            <span><?php echo $assigned_subjects_count; ?></span>
                        </li>
                        <li>
                            <!-- 100 - assigned_subjects_credits_precentage -->
                            <em>Unassigned Number of Subjects</em>
                            <span><?php echo $total_subjects_count - $assigned_subjects_count; ?></span>
                        </li>
                        </ul>

                    </div>
                </div>
            </div>
            
            <div class="botttom">
                <h2 class="bottom_topic">System Lecturer Variables</h2>
                <div class='details1'>
                    <p><b>Max Lecture Hours per Lecturer &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;: <?php echo $data['variables'][0]->v_value;?></b></p>
                    <p><b>Number of Lecture Hours per Credit &nbsp; : <?php echo $data['variables'][1]->v_value;?></b></p>
                    <p><b>Max Students per Lecturer &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; : <?php echo $data['variables'][6]->v_value;?></b></p>
                </div>
                <div class='details2'>
                    
                </div>
                
            </div>
        </div>
    </div>

</div>

<script>
    // Function to handle search
    function search() {
        // Get input element and filter value
        var input = document.getElementById('search');
        var filter = input.value.toUpperCase();
        
        // Get table rows
        var rows = document.querySelectorAll('.styled-table tbody tr');

        // Loop through all table rows, and hide those that don't match the search query
        for (var i = 0; i < rows.length; i++) {
            var cells = rows[i].getElementsByTagName('td');
            var found = false;
            for (var j = 0; j < cells.length && !found; j++) {
                var cell = cells[j];
                if (cell) {
                    var txtValue = cell.textContent || cell.innerText;
                    if (txtValue.toUpperCase().indexOf(filter) > -1) {
                        found = true;
                    }
                }
            }
            if (found) {
                rows[i].style.display = '';
            } else {
                rows[i].style.display = 'none';
            }
        }
    }

    // Function to clear search
    function clearSearch() {
        var input = document.getElementById('search');
        input.value = '';
        search(); // Trigger search to reset filtering
    }

    // Add event listener to search input
    document.getElementById('search').addEventListener('keyup', search);

    // Add event listener to clear search icon
    document.getElementById('clear-search').addEventListener('click', clearSearch);
</script>

<script>

    function sliceSize(dataNum, dataTotal) {
        return (dataNum / dataTotal) * 360;
    }

    function addSlice(id, sliceSize, pieElement, offset, sliceID, color) {
        var slice = document.createElement('div');
        slice.className = 'slice ' + sliceID;
        slice.innerHTML = '<span></span>';
        pieElement.appendChild(slice);

        offset = offset - 1;
        var sizeRotation = -179 + sliceSize;

        slice.style.transform = 'rotate(' + offset + 'deg) translate3d(0,0,0)';
        slice.querySelector('span').style.cssText = 'transform: rotate(' + sizeRotation + 'deg) translate3d(0,0,0); background-color: ' + color;
    }

    function iterateSlices(id, sliceSize, pieElement, offset, dataCount, sliceCount, color) {
        var maxSize = 179;
        var sliceID = 's' + dataCount + '-' + sliceCount;

        if (sliceSize <= maxSize) {
            addSlice(id, sliceSize, pieElement, offset, sliceID, color);
        } else {
            addSlice(id, maxSize, pieElement, offset, sliceID, color);
            iterateSlices(id, sliceSize - maxSize, pieElement, offset + maxSize, dataCount, sliceCount + 1, color);
        }
    }

    function createPie(id) {
        var listData = [];
        var listTotal = 0;
        var offset = 0;
        var i = 0;
        var pieElement = document.querySelector(id + ' .pie-chart__pie');
        var dataElement = document.querySelector(id + ' .pie-chart__legend');

        var color = [
            'navy',
            'cornflowerblue'
        ];

        dataElement.querySelectorAll('span').forEach(function (span) {
            listData.push(Number(span.innerHTML));
        });

        for (i = 0; i < listData.length; i++) {
            listTotal += listData[i];
        }

        for (i = 0; i < listData.length; i++) {
            var size = sliceSize(listData[i], listTotal);
            iterateSlices(id, size, pieElement, offset, i, 0, color[i]);
            dataElement.querySelector('li:nth-child(' + (i + 1) + ')').style.borderColor = color[i];
            offset += size;
        }
    }

    function createPieCharts() {
        createPie('.pieID--micro-skills');
        createPie('.pieID--categories');
        // createPie('.pieID--operations');
    }

    createPieCharts();
</script>



<!-- Footer Section -->
<?php require APPROOT . '/views/includes/adminFooter.php'; ?>