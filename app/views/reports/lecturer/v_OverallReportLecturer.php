<?php $style = "OverallReport"; ?>
<?php require APPROOT . '/views/includes/LecturerHeader.php'; ?>


<h1>Reports &#10145; Overall</h1>

<?php
    $lecturer_count = count($data['lecturers']);
    $assigned_lec_count = $data['assigned_lec_count']->assigned_lec_count;
    $instr_count = count($data['instructors']);
    $assigned_instr_count = $data['assigned_instr_count']->assigned_lec_count;
    $student_count = $data['student_count']->student_count;

?>

<div class="main_page">
    <div class='main_page_left'>
        <div class='mpl_top'>

            <h2>Subjects</h2>

            <div class='subject_bar'>
                <div class='sub_cell'>
                    <p>1<sup>st</sup> YEAR CS</p>
                    <p><?php echo $data['cs_1yr_sub_count']; ?></p>
                </div>
                <div class='sub_cell'>
                    <p>2<sup>nd</sup> YEAR CS</p>
                    <p><?php echo $data['cs_2yr_sub_count']; ?></p>
                </div>
                <div class='sub_cell'>
                    <p>3<sup>rd</sup> YEAR CS</p>
                    <p><?php echo $data['cs_3yr_sub_count']; ?></p>
                </div>
                <div class='sub_cell'>
                    <p>4<sup>th</sup> YEAR CS</p>
                    <p><?php echo $data['cs_4yr_sub_count']; ?></p>
                </div>
            </div>

            <div class='subject_bar'>
                <div class='sub_cell'>
                    <p>1<sup>st</sup> YEAR IS</p>
                    <p><?php echo $data['is_1yr_sub_count']; ?></p>
                </div>
                <div class='sub_cell'>
                    <p>2<sup>nd</sup> YEAR IS</p>
                    <p><?php echo $data['is_2yr_sub_count']; ?></p>
                </div>
                <div class='sub_cell'>
                    <p>3<sup>rd</sup> YEAR IS</p>
                    <p><?php echo $data['is_3yr_sub_count']; ?></p>
                </div>
                <div class='sub_cell'>
                    <p>4<sup>th</sup> YEAR IS</p>
                    <p><?php echo $data['is_4yr_sub_count']; ?></p>
                </div>
            </div>

            <div class='prog_bars'>
                
                <!--By Semester -->
                <h3>By Semester:</h3>
                <?php
                    $sem1 = $data['sem1_sub_count'];
                    $sem2 = $data['sem2_sub_count'];
                    $p_sem1 = ($sem1 / ($sem1 + $sem2)) * 100;
                    $p_sem2 = ($sem2 / ($sem1 + $sem2)) * 100;
                ?>

                <div class="bar">
                    <div class="p_sem1">
                        <p class="in_bar">Semester 1 : <?php echo $sem1; ?></p>
                    </div>
                    <div class="p_sem2">
                        <p class="in_bar">Semester 2 : <?php echo $sem2; ?></p>
                    </div>
                </div>
                <style>          
                        .p_sem1 {
                            width: <?php echo $p_sem1; ?>%;
                            height: 100%;
                            background-color: navy;
                            float: left;
                            border-top-left-radius: 10px;
                            border-bottom-left-radius: 10px;
                        }

                        .p_sem2 {
                            width: <?php echo $p_sem2; ?>%;
                            height: 100%;
                            background-color: cornflowerblue;
                            float: left;
                            border-top-right-radius: 10px;
                            border-bottom-right-radius: 10px;
                        }
                </style>


                <!--By Core Subjects -->
                <h3>By Core Subjects:</h3>
                <?php
                    $core  = $data['core_sub_count'];
                    $ncore = $data['total_subjects_count'] - $core;
                    $p_core = ($core / $data['total_subjects_count']) * 100;
                    $p_ncore = ($ncore / $data['total_subjects_count']) * 100;
                ?>

                <div class="bar">
                    <div class="p_core">
                        <p class="in_bar">Core Subjects : <?php echo $core; ?></p>
                    </div>
                    <div class="p_ncore">
                        <p class="in_bar">Non-Core Subjects : <?php echo $ncore; ?></p>
                    </div>
                </div>
                <style>          
                        .p_core {
                            width: <?php echo $p_core; ?>%;
                            height: 100%;
                            background-color: navy;
                            float: left;
                            border-top-left-radius: 10px;
                            border-bottom-left-radius: 10px;
                        }

                        .p_ncore {
                            width: <?php echo $p_ncore; ?>%;
                            height: 100%;
                            background-color: cornflowerblue;
                            float: left;
                            border-top-right-radius: 10px;
                            border-bottom-right-radius: 10px;
                        }
                </style>

                <!--By Year  -->
                <h3>By Year:</h3>
                <?php
                    $yr1 = $data['cs_1yr_sub_count'] + $data['is_1yr_sub_count'];
                    $yr2 = $data['cs_2yr_sub_count'] + $data['is_2yr_sub_count'];
                    $yr3 = $data['cs_3yr_sub_count'] + $data['is_3yr_sub_count'];
                    $yr4 = $data['cs_4yr_sub_count'] + $data['is_4yr_sub_count'];
                    $total = $yr1 + $yr2 + $yr3 + $yr4;

                    $p_yr1 = ($yr1 / $total) * 100;
                    $p_yr2 = ($yr2 / $total) * 100;
                    $p_yr3 = ($yr3 / $total) * 100;
                    $p_yr4 = ($yr4 / $total) * 100;
                ?>

                <div class="bar">
                    <div class="p_yr1">
                        <p class="in_bar">Year 1 : <?php echo $yr1; ?></p>
                    </div>
                    <div class="p_yr2">
                        <p class="in_bar">Year 2 : <?php echo $yr2; ?></p>
                    </div>
                    <div class="p_yr3">
                        <p class="in_bar">Year 3 : <?php echo $yr3; ?></p>
                    </div>
                    <div class="p_yr4">
                        <p class="in_bar">Year 4 : <?php echo $yr4; ?></p>
                    </div>
                </div>
                <style>          
                        .p_yr1 {
                            width: <?php echo $p_yr1; ?>%;
                            height: 100%;
                            background-color: navy;
                            float: left;
                            border-top-left-radius: 10px;
                            border-bottom-left-radius: 10px;
                        }

                        .p_yr2 {
                            width: <?php echo $p_yr2; ?>%;
                            height: 100%;
                            background-color: blue;
                            float: left;
                        }

                        .p_yr3 {
                            width: <?php echo $p_yr3; ?>%;
                            height: 100%;
                            background-color: royalblue;
                            float: left;
                        }

                        .p_yr4 {
                            width: <?php echo $p_yr4; ?>%;
                            height: 100%;
                            background-color: cornflowerblue;
                            float: left;
                            border-top-right-radius: 10px;
                            border-bottom-right-radius: 10px;
                        }
                </style>

                <!--By Credits -->
                <h3>By Credits:</h3>
                <?php
                    $credit1 = $data['credit1_sub_count'];
                    $credit2 = $data['credit2_sub_count'];
                    $credit3 = $data['credit3_sub_count'];
                    $credit4 = $data['credit4_sub_count'];
                    $credit8 = $data['credit8_sub_count'];

                    $total_credits = $credit1 + $credit2 + $credit3 + $credit4 + $credit8;

                    $p_credit1 = ($credit1 / $total_credits) * 100;
                    $p_credit2 = ($credit2 / $total_credits) * 100;
                    $p_credit3 = ($credit3 / $total_credits) * 100;
                    $p_credit4 = ($credit4 / $total_credits) * 100;
                    $p_credit8 = ($credit8 / $total_credits) * 100;
                ?>

                <div class="bar">
                    <div class="p_credit1">
                    </div>
                    <div class="p_credit2">
                    </div>
                    <div class="p_credit3">
                    </div>
                    <div class="p_credit4">
                    </div>
                    <div class="p_credit8">
                    </div>
                </div>
                <style>          
                        .p_credit1 {
                            width: <?php echo $p_credit1; ?>%;
                            height: 100%;
                            background-color: navy;
                            float: left;
                            border-top-left-radius: 10px;
                            border-bottom-left-radius: 10px;
                        }

                        .p_credit2 {
                            width: <?php echo $p_credit2; ?>%;
                            height: 100%;
                            background-color: blue;
                            float: left;
                        }

                        .p_credit3 {
                            width: <?php echo $p_credit3; ?>%;
                            height: 100%;
                            background-color: royalblue;
                            float: left;
                        }

                        .p_credit4 {
                            width: <?php echo $p_credit4; ?>%;
                            height: 100%;
                            background-color: cornflowerblue;
                            float: left;
                        }

                        .p_credit8 {
                            width: <?php echo $p_credit8; ?>%;
                            height: 100%;
                            background-color: lightblue;
                            float: left;
                            border-top-right-radius: 10px;
                            border-bottom-right-radius: 10px;
                        }
                </style>

                <div class='discription'>

                    <div class="d_set">
                        <div class="color_box" style="background-color: navy;"></div>
                        <p>1 Credits : <?php echo $credit1; ?></p>
                    </div>

                    <div class="d_set">
                        <div class="color_box" style="background-color: blue;"></div>
                        <p>2 Credits : <?php echo $credit2; ?></p>
                    </div>

                    <div class="d_set">
                        <div class="color_box" style="background-color: royalblue;"></div>
                        <p>3 Credits : <?php echo $credit3; ?></p>
                    </div>

                    <div class="d_set">
                        <div class="color_box" style="background-color: cornflowerblue;"></div>
                        <p>4 Credits : <?php echo $credit4; ?></p>
                    </div>

                    <div class="d_set">
                        <div class="color_box" style="background-color: lightblue;"></div>
                        <p>8 Credits : <?php echo $credit8; ?></p>
                    </div>
                </div>                

            </div>



        </div>

        <div class='mpl_bottom'>
                <div class="mpr_top_left">

                    <?php
                        $total_rooms = 0;
                        $available_for_lectures = 0;
                        $available_for_labs = 0;
                        $available_for_tutorial = 0;
                        $available_for_meeting = 0;
                        $available_for_seminar = 0;
                        $available_for_examination = 0;
                        $lecture_rooms = 0;
                        $lab_rooms = 0;
                        $meeting_rooms = 0;
                        $common_rooms = 0;
                        $other_rooms = 0;

                        foreach($data['rooms'] as $room){

                            $total_rooms++;

                            if($room->is_lecture == 1){
                                $available_for_lectures++;
                            }

                            if($room->is_lab == 1){
                                $available_for_labs++;
                            }

                            if($room->is_tutorial == 1){
                                $available_for_tutorial++;
                            }

                            if($room->is_meeting == 1){
                                $available_for_meeting++;
                            }

                            if($room->is_seminar == 1){
                                $available_for_seminar++;
                            }

                            if($room->is_exam == 1){
                                $available_for_examination++;
                            }

                            if($room->type == 'LECTURE'){
                                $lecture_rooms++;
                            }

                            if($room->type == 'LAB'){
                                $lab_rooms++;
                            }

                            if($room->type == 'MEETING'){
                                $meeting_rooms++;
                            }

                            if($room->type == 'COMMON'){
                                $common_rooms++;
                            }

                            if($room->type == 'OTHER'){
                                $other_rooms++;
                            }

                        }

                    ?>

                    <h2>Rooms</h2>
                    <div class='progress_bars_container'>
                        <h3 class="bar_name">Number of Total Rooms : <?php echo $total_rooms; ?></h3>
                        
                        <div class="p_bar">
                            <h3 class="progress_title"> Available for Lectures: <?php echo $available_for_lectures; ?> / <?php echo $total_rooms; ?></h3>
                            <progress class="progress" value="<?php echo $available_for_lectures; ?>" max="<?php echo $total_rooms; ?>"></progress>
                        </div>

                        <div class="p_bar">
                            <h3 class="progress_title"> Available for Labs: <?php echo $available_for_labs; ?> / <?php echo $total_rooms; ?></h3>
                            <progress class="progress" value="<?php echo $available_for_labs; ?>" max="<?php echo $total_rooms; ?>"></progress>
                        </div>

                        <div class="p_bar">
                            <h3 class="progress_title"> Available for Tutorial: <?php echo $available_for_tutorial; ?> / <?php echo $total_rooms; ?></h3>
                            <progress class="progress" value="<?php echo $available_for_tutorial; ?>" max="<?php echo $total_rooms; ?>"></progress>
                        </div> 

                        <div class="p_bar">
                            <h3 class="progress_title"> Available for Meeting: <?php echo $available_for_meeting; ?> / <?php echo $total_rooms; ?></h3>
                            <progress class="progress" value="<?php echo $available_for_meeting; ?>" max="<?php echo $total_rooms; ?>"></progress>
                        </div>

                        <div class="p_bar">
                            <h3 class="progress_title"> Available for Seminar: <?php echo $available_for_seminar; ?> / <?php echo $total_rooms; ?></h3>
                            <progress class="progress" value="<?php echo $available_for_seminar; ?>" max="<?php echo $total_rooms; ?>"></progress>
                        </div>

                        <div class="p_bar">
                            <h3 class="progress_title"> Available for Examination: <?php echo $available_for_examination; ?> / <?php echo $total_rooms; ?></h3>
                            <progress class="progress" value="<?php echo $available_for_examination; ?>" max="<?php echo $total_rooms; ?>"></progress>
                        </div>  
        
                    </div>
                </div>

                <div class='mpr_top_right'>
                
                    <div class="top_bar" style="justify-content: flex-end; z-index: 1;">
                        <a href="">
                            <button class="more_btn1">MORE</button>
                        </a>
                    </div>

                    <div class='pie_chart' style="margin-top: -48px;">
                        <div class="pieID--categories pie-chart--wrapper">
                            <h3 class="chart_name">Room Types</h3>
                            <div class="pie-chart" style="scale: 1; margin: -5px auto;">
                                <div class="pie-chart__pie"></div>
                                <ul class="pie-chart__legend">

                                    <li>
                                        <em>Lecture</em>
                                        <span><?php echo $lecture_rooms; ?></span>
                                    </li>

                                    <li>
                                        <em>Lab</em>
                                        <span><?php echo $lab_rooms; ?></span>
                                    </li>

                                    <li>
                                        <em>Meeting</em>
                                        <span><?php echo $meeting_rooms; ?></span>
                                    </li>

                                    <li>
                                        <em>Common</em>
                                        <span><?php echo $common_rooms; ?></span>
                                    </li>

                                    <li>
                                        <em>Other</em>
                                        <span><?php echo $other_rooms; ?></span>
                                    </li>


                                </ul>
                            </div>
                        </div>
                    </div>

                </div>

        </div>

    </div>

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
            </div>

            <div class='mpr_top_right'>
            
                <div class="top_bar" style="justify-content: flex-end;">
                    <a href="">
                        <button class="more_btn1">MORE</button>
                    </a>
                </div>


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

        <div class='mpr_middle'>

            <?php
                $count_instructors = 0;
                $count_assistant_lecturers = 0;

                foreach($data['instructors'] as $instructor){
                    if($instructor->i_positionRank == 'Instructor'){
                        $count_instructors++;
                    }else if($instructor->i_positionRank == 'Assistant Lecturer'){
                        $count_assistant_lecturers++;
                    }
                }

            ?>

            <div class="top_bar">
                <h2>Instructors & Assistant Lecturers</h2>
    
                <a href="">
                    <button class="more_btn1">MORE</button>
                </a>
            </div>

            <div class='progress_bars_container'>
                <h3 class="bar_name">Number of Total Instructors & Assistant Lecturers : <?php echo $instr_count; ?></h3>

                <div class="p_bar">
                    <h3 class="progress_title">Instructors: <?php echo $count_instructors; ?> / <?php echo $instr_count; ?></h3>
                    <progress class="progress" value="<?php echo $count_instructors; ?>" max="<?php echo $instr_count; ?>"></progress>
                </div>

                <div class="p_bar">
                    <h3 class="progress_title">Assistant Lecturers: <?php echo $count_assistant_lecturers; ?> / <?php echo $instr_count; ?></h3>
                    <progress class="progress" value="<?php echo $count_assistant_lecturers; ?>" max="<?php echo $instr_count; ?>"></progress>
                </div>

                <div class="p_bar">
                    <h3 class="progress_title">Assigned Instructors & Assistant Lecturers: <?php echo $assigned_instr_count; ?> / <?php echo $instr_count; ?></h3>
                    <progress class="progress" value="<?php echo $assigned_instr_count; ?>" max="<?php echo $instr_count; ?>"></progress>
                </div>

            </div>

        </div>

        <div class='mpr_bottom'>
                <h2>Students</h2>
                <h3 class="bar_name1">Number of Students : <?php echo $student_count; ?></h3>
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
            'cornflowerblue',
            'blue',
            'royalblue',
            'lightblue',
            'red'
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
<?php require APPROOT . '/views/includes/LecturerFooter.php'; ?>



<!-- Lecturer types
    <option value="Professor">Professor</option>
    <option value="Department Head">Department Head</option>
    <option value="Senior Lecturer">Senior Lecturer</option>
    <option value="Senior Lecturer (On Contract)" >Senior Lecturer (On Contract)</option>
    <option value="Lecturer">Lecturer</option>
    <option value="Lecturer (On Contract)">Lecturer (On Contract)</option>
    <option value="Lecturers (Probationary)">Lecturers (Probationary)</option> -->

