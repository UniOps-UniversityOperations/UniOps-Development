<?php $style = "lecturerReport"; ?>

<?php require APPROOT . '/views/includes/admin/adminHeader.php'; ?>

<!-- convert l_nameWithInitials ri Camel case -->
<?php $l_nameWithInitials = ucwords(strtolower($data['lecturer']->l_nameWithInitials)); ?>
<h1>Reports &#10145; Lecturers &#10145; <?php echo $l_nameWithInitials; ?> (<?php echo $data['lecturer']->l_code; ?>)</h1>



<div class='page'>
    <div class='page_left'>
        <h2>Lecturer Details</h2>

        <p><b>Initials &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; :</b> <?php echo $data['lecturer']->l_code; ?></p>
        <p><b>Name with Initials &nbsp; :</b> <?php echo $l_nameWithInitials; ?></p>
        <?php $l_fullName = ucwords(strtolower($data['lecturer']->l_fullName)); ?>
        <p><b>Full Name &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; :</b> <?php echo $l_fullName; ?></p>
        <p><b>Email &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; :</b> <?php echo $data['lecturer']->l_email; ?></p>
        <p><b>Gender &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; :</b> <?php echo $data['lecturer']->l_gender == "M" ? "Male" : "Female"; ?></p>
        <p><b>Date of Birth &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; :</b> <?php echo $data['lecturer']->l_dob; ?></p>
        <p><b>Contact No &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; :</b> <?php echo $data['lecturer']->l_contactNumber; ?></p>
        <p><b>Address &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; :</b>
        <?php 
            $text = $data['lecturer']->l_address;
            $chunks = str_split($text, 20);

            foreach ($chunks as $key => $chunk):
                echo $key === 0 ? "" : '&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;'; 
        ?>
            <?= $chunk ?><br>
        <?php endforeach; ?> </p>
        <p><b>Department &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; :</b> <?php echo $data['lecturer']->l_department; ?></p>
        <p><b>Position Rank &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; :</b> <?php echo $data['lecturer']->l_positionRank; ?></p>
        <p><b>Date of Join &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; :</b> <?php echo $data['lecturer']->l_dateOfJoin; ?></p>
        <p><b>Qualifications &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; :</b> <?php echo $data['lecturer']->l_qualifications; ?></p>
        <p><b>2<sup>nd</sup> Year Projects &nbsp;&nbsp;&nbsp; :</b> <?php echo $data['lecturer']->l_n2yrProjects; ?></p>
        <p><b>3<sup>rd</sup> Year Projects &nbsp;&nbsp;&nbsp;&nbsp; :</b> <?php echo $data['lecturer']->l_n3yrProjects; ?></p>
        <p><b>4<sup>th</sup> Year Projects &nbsp;&nbsp;&nbsp;&nbsp; :</b> <?php echo $data['lecturer']->l_n4yrProjects; ?></p>
        <p><b>Researches &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; :</b> <?php echo $data['lecturer']->l_nResearch; ?></p>
        <p><b>Exam Supervisor &nbsp;&nbsp;&nbsp; :</b> <?php echo $data['lecturer']->l_isExamSupervisor ? "<span style='color: green;'>&#10004;</span>" : "<span style='color: red;'>&#10008;</span>"; ?></p>
        <p><b>Second Examiner &nbsp;&nbsp; :</b> <?php echo $data['lecturer']->l_isSecondExaminar ? "<span style='color: green;'>&#10004;</span>" : "<span style='color: red;'>&#10008;</span>"; ?></p>

    </div>

    <div class='page_right'>
        <div class="top">
            <div class='top_left'>
                <h2 class='ttt'>General Timetable</h2>
            </div>


            <div class='top_right'>
                <div class="pie_chart">
                    <?php
                        $lecturer_max_lec_hrs = $data['variables'][0]->v_value;
                        $lec_hrs_per_credit = $data['variables'][1]->v_value;
                        $max_students_per_lecturer = $data['variables'][6]->v_value;

                        //CALCLATE ASSIGNED SUBJECTS_CREDITS AND ASSIGNED STUDENTS
                        $assigned_subjects_credits = 0;
                        $assigned_nStudents = 0;
                        foreach($data['postsAS'] as $post) {
                            $assigned_subjects_credits += $post->sub_credits;
                            $assigned_nStudents += $post->sub_nStudents;
                        }

                        //number of assigned lecture hours
                        $assigned_subjects_lec_hrs = $assigned_subjects_credits * $lec_hrs_per_credit;

                        //precentage of assigned_subjects_lec_hrs
                        $assigned_subjects_credits_precentage = ($assigned_subjects_lec_hrs / $lecturer_max_lec_hrs) * 100;

                        //Precentage of assigned_nStudents
                        $assigned_nStudents_precentage = ($assigned_nStudents / $max_students_per_lecturer) * 100;
                    ?>
                    
        
                    <!-- <p class="chart_name"><b>Work Load</b></p> -->
                        <div class="Row">
                            <div class="pieID--micro-skills pie-chart--wrapper">
                                <h2 class="chart_name">Lecture Hours</h2>
                                <div class="pie-chart">
                                    <div class="pie-chart__pie"></div>
                                    <ul class="pie-chart__legend">
                                    <li>
                                        <!-- assigned_subjects_credits_precentage -->
                                        <em>Assigned Lecture Hours (%)</em>
                                        <span><?php echo $assigned_subjects_credits_precentage; ?></span>
                                    </li>
                                    <li>
                                        <!-- 100 - assigned_subjects_credits_precentage -->
                                        <em>Remaining Lecture Hours (%)</em>
                                        <span><?php echo 100 - $assigned_subjects_credits_precentage; ?></span>
                                    </li>
                                    </ul>
                                </div>
                            </div>
                        
                            <div class="pieID--categories pie-chart--wrapper">
                                <h2 class="chart_name">Students</h2>
                                
                                <div class="pie-chart">
                                    <div class="pie-chart__pie"></div>
                                    
                                    <ul class="pie-chart__legend">
                                    <li>
                                        <em>Assigned Students (%)</em>
                                        <span><?php echo $assigned_nStudents_precentage; ?></span>
                                    </li>
                                    <li>
                                        <em>Remaining Students (%)</em>
                                        <span><?php echo 100 - $assigned_nStudents_precentage; ?></span>
                                    </li>
                                    </ul>
                                </div>
                            </div>
                        </div>

                </div>
            </div>

        </div>

        <div class="bottom">
            <div class='bottom_left'>
                <H2 class='ttt'>Lecturer Stats and System Variables</H2>

                <div class='details'>
                    <p><b>Assigned Number of Credits &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;: <?php echo $assigned_subjects_credits; ?></b></p>
                    <p><b>Assigned Number of Lecture Hours &nbsp; : <?php echo $assigned_subjects_lec_hrs; ?></b></p>
                    <p><b>Assigned Number of Students &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; : <?php echo $assigned_nStudents; ?></b></p>
                    <p><b>Maximum Number of Lecture Hours &nbsp; : <?php echo $lecturer_max_lec_hrs; ?></b></p>
                    <p><b>Lecture Hours per Credit &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;  : <?php echo $lec_hrs_per_credit; ?></b></p>
                    <p><b>Maximum Number of Students &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; : <?php echo $max_students_per_lecturer; ?></b></p>
                </div>
                
            </div>
                
                
            <div class='bottom_right'>
                    
                    <H2 class='ttt'>Subject Assignment</H2>
                    <div class='subject_assignment'>
                        <div class='assigned_subjects'>
                            <h2 class='t'>Assigned Subjects</h2>
                            <table class="styled-table">
                                <thead>
                                    <th>Subject Code</th>
                                    <th>Subject Name</th>
                                </thead>
                                <tbody>
                                    <?php
                                    if($data['postsAS'] == "null"){
                                        echo "<p>No assigned subjects</p>";
                                    }
                                    else{ foreach($data['postsAS'] as $post): ?>
                                        <tr
                                            <?php if($data['postsRS'] != "null"){
                                                foreach($data['postsRS'] as $postRS) {
                                                    if($postRS->subject_code == $post->sub_code){
                                                        echo "style='background-color: lightgreen;'";
                                                        //terminate the loop
                                                        break;
                                                    }
                                                }
                                            }
                                            ?>
                                        >
                                            <td><?php echo $post->sub_code; ?></td>
                                            <td><?php echo $post->sub_name; ?></td>
                                        </tr>
                                    <?php endforeach; }?>
                                </tbody>
                            </table>
                        </div>
    
                        <div class='requested_subjects'>
                        <h2 class='t'>Requested Subjects</h2>
                            <table class="styled-table">
                                <thead>
                                    <th>Subject Code</th>
                                    <th>Subject Name</th>
                                </thead>
                                <tbody>
                                    <?php
                                    if($data['postsRS'] == "null"){
                                        echo "<p>No requested subjects</p>";
                                    }
                                    else{ foreach($data['postsRS'] as $post): ?>
                                        <tr
                                            <?php if($data['postsAS'] != "null"){
                                                foreach($data['postsAS'] as $postAS) {
                                                    if($postAS->sub_code == $post->subject_code){
                                                        echo "style='background-color: lightgreen;'";
                                                        //terminate the loop
                                                        break;
                                                    }
                                                }
                                            }
                                            ?>
                                        >
                                            <td><?php echo $post->subject_code; ?></td>
                                            <td><?php echo $post->sub_name; ?></td>
                                        </tr>
                                    <?php endforeach; }?>
                                </tbody>
                            </table>
    
                        </div>
                    </div>
                    <p class='note'>Matching subjects are highlighted in light green.</p>
                
            </div>

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
        createPie('.pieID--categories');
        // createPie('.pieID--operations');
    }

    createPieCharts();
</script>


<!-- Footer Section -->
<?php require APPROOT . '/views/includes/adminFooter.php'; ?>