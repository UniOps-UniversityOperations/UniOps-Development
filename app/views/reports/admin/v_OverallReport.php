<?php $style = "OverallReport"; ?>

<?php require APPROOT . '/views/includes/adminHeader.php'; ?>

<h1>Reports &#10145; Overall</h1>

<?php
    $lecturer_count = count($data['lecturers']);
    $assigned_lec_count = $data['assigned_lec_count']->assigned_lec_count;

?>

<div class="main_page">
    <div class='main_page_left'></div>

    <div class='main_page_right'>
        <div class='mpr_top'>
            
            <div class="mpr_top_left">

                <?php
                    $count_professor = 0;
                    $count_department_head = 0;
                    $count_senior_lecturer = 0;
                    $count_senior_lecturer_on_contract = 0;
                    $count_lecturer = 0;
                    $count_lecturer_on_contract = 0;
                    $count_lecturer_probationary = 0;

                    foreach($data['lecturers'] as $lecturer){
                        if($lecturer->l_positionRank == 'Professor'){
                            $count_professor++;
                        }else if($lecturer->l_positionRank == 'Department Head'){
                            $count_department_head++;
                        }else if($lecturer->l_positionRank == 'Senior Lecturer'){
                            $count_senior_lecturer++;
                        }else if($lecturer->l_positionRank == 'Senior Lecturer (On Contract)'){
                            $count_senior_lecturer_on_contract++;
                        }else if($lecturer->l_positionRank == 'Lecturer'){
                            $count_lecturer++;
                        }else if($lecturer->l_positionRank == 'Lecturer (On Contract)'){
                            $count_lecturer_on_contract++;
                        }else if($lecturer->l_positionRank == 'Lecturers (Probationary)'){
                            $count_lecturer_probationary++;
                        }
                    }

                ?>

                <h2>Lecturers</h2>
                <div class='progress_bars_container'>
                    <h3 class="bar_name">Number of Total Lecturers : <?php echo $lecturer_count; ?></h3>
                    <div class="p_bar">
                        <h3 class="progress_title">Professors: <?php echo $count_professor; ?> / <?php echo $lecturer_count; ?></h3>
                        <progress class="progress" value="<?php echo $count_professor; ?>" max="<?php echo $lecturer_count; ?>"></progress>
                    </div>
    
                    <div class="p_bar">
                        <h3 class="progress_title">Department Heads: <?php echo $count_department_head; ?> / <?php echo $lecturer_count; ?></h3>
                        <progress class="progress" value="<?php echo $count_department_head; ?>" max="<?php echo $lecturer_count; ?>"></progress>
                    </div>
    
                    <div class="p_bar">
                        <h3 class="progress_title">Senior Lecturers: <?php echo $count_senior_lecturer; ?> / <?php echo $lecturer_count; ?></h3>
                        <progress class="progress" value="<?php echo $count_senior_lecturer; ?>" max="<?php echo $lecturer_count; ?>"></progress>
                    </div>
    
                    <div class="p_bar">
                        <h3 class="progress_title">Senior Lecturers (On Contract): <?php echo $count_senior_lecturer_on_contract; ?> / <?php echo $lecturer_count; ?></h3>
                        <progress class="progress" value="<?php echo $count_senior_lecturer_on_contract; ?>" max="<?php echo $lecturer_count; ?>"></progress>
                    </div>
    
                    <div class="p_bar">
                        <h3 class="progress_title">Lecturers: <?php echo $count_lecturer; ?> / <?php echo $lecturer_count; ?></h3>
                        <progress class="progress" value="<?php echo $count_lecturer; ?>" max="<?php echo $lecturer_count; ?>"></progress>
                    </div>
    
                    <div class="p_bar">
                        <h3 class="progress_title">Lecturers (On Contract): <?php echo $count_lecturer_on_contract; ?> / <?php echo $lecturer_count; ?></h3>
                        <progress class="progress" value="<?php echo $count_lecturer_on_contract; ?>" max="<?php echo $lecturer_count; ?>"></progress>
                    </div>
    
                    <div class="p_bar">
                        <h3 class="progress_title">Lecturers (Probationary): <?php echo $count_lecturer_probationary; ?> / <?php echo $lecturer_count; ?></h3>
                        <progress class="progress" value="<?php echo $count_lecturer_probationary; ?>" max="<?php echo $lecturer_count; ?>"></progress>
                    </div>
    
                </div>

                <a href="">
                    <button class="more_btn">MORE</button>
                </a>
            </div>

            <div class='mpr_top_right'>
                <div class='pie_chart'>
                    <div class="pieID--micro-skills pie-chart--wrapper">
                        <h3 class="chart_name">Assigned Lecturers</h3>
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
                </div>

            </div>


        </div>

        <div class='mpr_bottom'>

        </div>
    </div>


</div>

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
        // createPie('.pieID--categories');
        // createPie('.pieID--operations');
    }

    createPieCharts();
</script>

<!-- Footer Section -->
<?php require APPROOT . '/views/includes/adminFooter.php'; ?>


<!-- Lecturer types
    <option value="Professor">Professor</option>
    <option value="Department Head">Department Head</option>
    <option value="Senior Lecturer">Senior Lecturer</option>
    <option value="Senior Lecturer (On Contract)" >Senior Lecturer (On Contract)</option>
    <option value="Lecturer">Lecturer</option>
    <option value="Lecturer (On Contract)">Lecturer (On Contract)</option>
    <option value="Lecturers (Probationary)">Lecturers (Probationary)</option> -->

