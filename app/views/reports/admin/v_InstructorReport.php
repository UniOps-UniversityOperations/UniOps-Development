<?php $style = "instructorReport"; ?>

<?php require APPROOT . '/views/includes/admin/adminHeader.php'; ?>

<?php $i_nameWithInitials = ucwords(strtolower($data['instructor']->i_nameWithInitials)); ?>
<h1>Reports &#10145; Instructors &#10145; <?php echo $i_nameWithInitials; ?> (<?php echo $data['instructor']->i_code; ?>)</h1>



<div class='page'>
    <div class='page_left'>
        <h2>Instructor Details</h2>

        <p><b>Initials &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; :</b> <?php echo $data['instructor']->i_code; ?></p>
        <p><b>Name with Initials &nbsp; :</b> <?php echo $i_nameWithInitials; ?></p>
        <?php $i_fullName = ucwords(strtolower($data['instructor']->i_fullName)); ?>
        <p><b>Full Name &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; :</b> <?php echo $i_fullName; ?></p>
        <p><b>Email &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; :</b> <?php echo $data['instructor']->i_email; ?></p>
        <p><b>Gender &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; :</b> <?php echo $data['instructor']->i_gender == "M" ? "Male" : "Female"; ?></p>
        <p><b>Date of Birth &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; :</b> <?php echo $data['instructor']->i_dob; ?></p>
        <p><b>Contact No &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; :</b> <?php echo $data['instructor']->i_contactNumber; ?></p>
        <p><b>Address &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; :</b>
        <?php 
            $text = $data['instructor']->i_address;
            $chunks = str_split($text, 15);

            foreach ($chunks as $key => $chunk):
                echo $key === 0 ? "" : '&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;'; 
        ?>
            <?= $chunk ?><br>
        <?php endforeach; ?> </p>
        <p><b>Department &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; :</b> <?php echo $data['instructor']->i_department; ?></p>
        <p><b>Position Rank &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; :</b> <?php echo $data['instructor']->i_positionRank; ?></p>
        <p><b>Date of Join &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; :</b> <?php echo $data['instructor']->i_dateOfJoin; ?></p>
        <p><b>Qualifications &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; :</b> <?php echo $data['instructor']->i_qualifications; ?></p>
        <p><b>2<sup>nd</sup> Year Projects &nbsp;&nbsp;&nbsp; :</b> <?php echo $data['instructor']->i_n2yrProjects; ?></p>
        <p><b>3<sup>rd</sup> Year Projects &nbsp;&nbsp;&nbsp;&nbsp; :</b> <?php echo $data['instructor']->i_n3yrProjects; ?></p>
        <p><b>4<sup>th</sup> Year Projects &nbsp;&nbsp;&nbsp;&nbsp; :</b> <?php echo $data['instructor']->i_n4yrProjects; ?></p>
        <p><b>Researches &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; :</b> <?php echo $data['instructor']->i_nResearch; ?></p>
        <p><b>Exam Invigilator &nbsp;&nbsp;&nbsp; :</b> <?php echo $data['instructor']->i_isExamInvigilator ? "<span style='color: green;'>&#10004;</span>" : "<span style='color: red;'>&#10008;</span>"; ?></p>

    </div>

    <div class='page_right'>
        <div class="top">
            <div class='top_left'>
                <h2 class='ttt'>General Timetable</h2>
            </div>


            <div class='top_right'>
                <div class="pie_chart">                    
        
                    <div class="Row">                            
                    
                        <!-- Logic for pie chart 01 -->

                        <?php
                            $lecturer_max_lec_hrs = $data['variables'][0]->v_value;
                            $lec_hrs_per_credit = $data['variables'][1]->v_value;

                            //CALCLATE ASSIGNED SUBJECTS_CREDITS and number of Students in the lecture
                            $assigned_subjects_credits = 0;
                            $assigned_lecture_students = 0;
                            foreach($data['postsASI'] as $post) {
                                if($post->lecturer_code == $data['instructor']->i_code){
                                    $assigned_subjects_credits += $post->sub_credits;
                                    $assigned_lecture_students += $post->sub_nStudents;
                                }
                            }

                            //number of assigned lecture hours
                            $assigned_subjects_lec_hrs = $assigned_subjects_credits * $lec_hrs_per_credit;

                            //precentage of assigned_subjects_lec_hrs
                            $assigned_subjects_credits_precentage = ($assigned_subjects_lec_hrs / $lecturer_max_lec_hrs) * 100;
                        ?>

                            <div class="pieID--micro-skills pie-chart--wrapper">
                            <h3 class="chart_name">Lecture Hours</h3>
                            
                                <div class="pie-chart">
                                    <div class="pie-chart__pie"></div>
                                    
                                    <ul class="pie-chart__legend">
                                    <li>
                                        <em>Assigned (%)</em>
                                        <span><?php echo $assigned_subjects_credits_precentage ?></span>
                                    </li>
                                    <li>
                                        <em>Remaining (%)</em>
                                        <span><?php echo 100 - $assigned_subjects_credits_precentage ?></span>
                                    </li>
                                    </ul>
                                </div>
                            </div>
                        

                            <!-- Logic for pie chart 02 -->

                            <?php
                                $instructor_max_practical_hrs = $data['variables'][4]->v_value;
                                $practcal_hrs_per_credit = $data['variables'][2]->v_value;

                                //CALCLATE ASSIGNED SUBJECTS_CREDITS and number of Students in the practical
                                $assigned_practical_credits = 0;
                                $assigned_practical_students = 0;
                                foreach($data['postsASI'] as $post) {
                                    if($post->p_instructor_code == $data['instructor']->i_code){
                                        $assigned_practical_credits += $post->sub_credits;
                                        $assigned_practical_students += $post->sub_nStudents;
                                    }
                                }

                                //number of assigned lecture hours
                                $assigned_practical_hrs = $assigned_practical_credits * $practcal_hrs_per_credit;

                                //precentage of assigned_subjects_lec_hrs
                                $assigned_practical_credits_precentage = ($assigned_practical_hrs / $instructor_max_practical_hrs) * 100;
                            ?>

                            <div class="pieID--categories pie-chart--wrapper">
                            <h3 class="chart_name">Practicals Hours</h3>
                            
                            <div class="pie-chart">
                                <div class="pie-chart__pie"></div>
                                
                                <ul class="pie-chart__legend">
                                <li>
                                    <em>Assigned (%)</em>
                                    <span><?php echo $assigned_practical_credits_precentage ?></span>
                                </li>
                                <li>
                                    <em>Remaining (%)</em>
                                    <span><?php echo 100 - $assigned_practical_credits_precentage ?></span>
                                </li>
                                </ul>
                            </div>
                            </div>
                        


                        <!-- Logic for pie chart 03 -->

                        <?php
                            $instructor_max_tutorial_hrs = $data['variables'][5]->v_value;
                            $tutorial_hrs_per_credit = $data['variables'][3]->v_value;

                            //CALCLATE ASSIGNED SUBJECTS_CREDITS and number of Students in the tutorial
                            $assigned_tutorial_credits = 0;
                            $assigned_tutorial_students = 0;
                            foreach($data['postsASI'] as $post) {
                                if($post->t_instructor_code == $data['instructor']->i_code){
                                    $assigned_tutorial_credits += $post->sub_credits;
                                    $assigned_tutorial_students += $post->sub_nStudents;
                                }
                            }

                            //number of assigned lecture hours
                            $assigned_tutorial_hrs = $assigned_tutorial_credits * $tutorial_hrs_per_credit;

                            //precentage of assigned_subjects_lec_hrs
                            $assigned_tutorial_credits_precentage = ($assigned_tutorial_hrs / $instructor_max_tutorial_hrs) * 100;
                        ?>

                        <div class="pieID--operations pie-chart--wrapper">
                        <h3 class="chart_name">Tutorials Hours</h3>
                        
                        <div class="pie-chart">
                            <div class="pie-chart__pie"></div>
                            
                            <ul class="pie-chart__legend">
                            <li>
                                <em>Assigned (%)</em>
                                <span><?php echo $assigned_tutorial_credits_precentage ?></span>
                            </li>
                            <li>
                                <em>Remaining (%)</em>
                                <span><?php echo 100 - $assigned_tutorial_credits_precentage ?></span>
                            </li>
                            </ul>
                        </div>
                        </div>


                    </div>

                </div>
                
                <!-- Logic for progress bars -->
                <?php
                    $total_assigned__lec_hrs = $assigned_subjects_lec_hrs + $assigned_practical_hrs + $assigned_tutorial_hrs;
                    $total_max_hrs = $lecturer_max_lec_hrs + $instructor_max_practical_hrs + $instructor_max_tutorial_hrs;
                ?>
                
                <div class='progress_bars'>
                    <h3>Total Lecture Hours: <?php echo $total_assigned__lec_hrs; ?> / <?php echo $total_max_hrs; ?></h3>
                        <progress class="progress0 progress" value="<?php echo $total_assigned__lec_hrs; ?>" max="<?php echo $total_max_hrs; ?>">
                        </progress>
                </div>

                <!-- progress bars -->
                <div class='progress_bars_container'>

                    <!-- Logic for progress bars -->
                    <?php
                        $instructor_max_students_lecturer = $data['variables'][7]->v_value;
                        $instructor_max_students_practical = $data['variables'][8]->v_value;
                        $instructor_max_students_tutorial = $data['variables'][9]->v_value;
                        $instructor_total_students = $instructor_max_students_lecturer + $instructor_max_students_practical + $instructor_max_students_tutorial;
                        $assigned_total_students = $assigned_lecture_students + $assigned_practical_students + $assigned_tutorial_students;
                    ?>

                    <h2 class="bar_name">Student Counts</h2>

                    <div class="p_bar">
                        <h3 class="progress_title">Lectures: <?php echo $assigned_lecture_students; ?> / <?php echo $instructor_max_students_lecturer; ?></h3>
                        <progress class="progress" value="<?php echo $assigned_lecture_students; ?>" max="<?php echo $instructor_max_students_lecturer; ?>"></progress>
                    </div>

                    <div class="p_bar">                        
                        <h3 class="progress_title">Practicals: <?php echo $assigned_practical_students; ?> / <?php echo $instructor_max_students_practical; ?></h3>
                        <progress class="progress" value="<?php echo $assigned_practical_students; ?>" max="<?php echo $instructor_max_students_practical; ?>"></progress>
                    </div>

                    <div class="p_bar">                        
                        <h3 class="progress_title">Tutorials: <?php echo $assigned_tutorial_students; ?> / <?php echo $instructor_max_students_tutorial; ?></h3>
                        <progress class="progress" value="<?php echo $assigned_tutorial_students; ?>" max="<?php echo $instructor_max_students_tutorial; ?>"></progress>
                    </div>

                    <div class="p_bar" style="padding-bottom: 20px;">                        
                        <h3 class="progress_title">Total: <?php echo $assigned_total_students; ?> / <?php echo $instructor_total_students; ?></h3>
                        <progress class="progress" value="<?php echo $assigned_total_students; ?>" max="<?php echo $instructor_total_students; ?>"></progress>
                    </div>
                </div>
            </div>

        </div>

        <div class="bottom">

            <div class='bottom_right'>
                    
                    <H2 class='ttt'>Subject Assignment</H2>
                    <div class='subject_assignment'>
                        <div class='assigned_subjects'>
                            <h2 class='t'>Assigned Subjects</h2>
                            <table class="styled-table">
                                <thead>
                                    <th>Subject Code</th>
                                    <th>Subject Name</th>
                                    <th>Lecture</th>
                                    <th>Practical</th>
                                    <th>Tutorial</th>
                                </thead>
                                <tbody>
                                    <?php
                                    if($data['postsASI'] == "null"){
                                        echo "<p>No assigned subjects</p>";
                                    }
                                    else{ foreach($data['postsASI'] as $post): ?>
                                        <tr
                                            <?php if($data['postsRSI'] != "null"){
                                                foreach($data['postsRSI'] as $postRS) {
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

                                            <?php 
                                                if($post->lecturer_code == $data['instructor']->i_code){
                                                    echo "<td><p><span style='color: green;'>&#10004;</span></p></td>";
                                                }
                                                else{
                                                    echo "<td><p><span style='color: red;'>&#10008;</span></p></td>";
                                                }

                                                if($post->p_instructor_code == $data['instructor']->i_code){
                                                    echo "<td><p><span style='color: green;'>&#10004;</span></p></td>";
                                                }
                                                else{
                                                    echo "<td><p><span style='color: red;'>&#10008;</span></p></td>";
                                                }

                                                if($post->t_instructor_code == $data['instructor']->i_code){
                                                    echo "<td><p><span style='color: green;'>&#10004;</span></p></td>";
                                                }
                                                else{
                                                    echo "<td><p><span style='color: red;'>&#10008;</span></p></td>";
                                                }
                                            ?>


                                        </tr>
                                    <?php endforeach; }?>
                                </tbody>
                            </table>
                        </div>
    
                        <div class='requested_subjects'>
                        <h2 class='t'>Prefered Subjects</h2>
                            <table class="styled-table">
                                <thead>
                                    <th>Subject Code</th>
                                    <th>Subject Name</th>
                                    <th>Lecture</th>
                                    <th>Practical</th>
                                    <th>Tutorial</th>
                                </thead>
                                <tbody>
                                    <?php
                                    if($data['postsRSI'] == "null"){
                                        echo "<p>No requested subjects</p>";
                                    }
                                    else{ foreach($data['postsRSI'] as $post): ?>
                                        <tr
                                            <?php if($data['postsASI'] != "null"){
                                                foreach($data['postsASI'] as $postAS) {
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
                                            <td><p><?php echo $post->lecture ? "<span style='color: green;'>&#10004;</span>" : "<span style='color: red;'>&#10008;</span>"; ?></p></td>
                                            <td><p><?php echo $post->practical ? "<span style='color: green;'>&#10004;</span>" : "<span style='color: red;'>&#10008;</span>"; ?></p></td>
                                            <td><p><?php echo $post->tutorial ? "<span style='color: green;'>&#10004;</span>" : "<span style='color: red;'>&#10008;</span>"; ?></p></td>
                                        </tr>
                                    <?php endforeach; }?>
                                </tbody>
                            </table>
    
                        </div>
                    </div>
                    <p class='note'>Matching subjects are highlighted in light green.</p>
                
            </div>


            <div class='bottom_left'>
                <H2 class='ttt'>Lecturer Stats and System Variables</H2>

                <div class="details">
                <div class='details1'>
                    <p><b>Max Lecture Hours per Instructor &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;: <?php echo $data['variables'][0]->v_value;?></b></p>
                    <p><b>Max Practical Hours per Instructor &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;: <?php echo $data['variables'][4]->v_value;?></b></p>
                    <p><b>Max Tutorial Hours per Instructor &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;: <?php echo $data['variables'][5]->v_value;?></b></p>
                    <p><b>Number Lecture of Hours per Credit &nbsp;&nbsp;&nbsp; : <?php echo $data['variables'][1]->v_value;?></b></p>
                    <p><b>Number Practical of Hours per Credit &nbsp; : <?php echo $data['variables'][2]->v_value;?></b></p>

                </div>
                <div class='details2'>
                    <p><b>Number Tutorial of Hours per Credit &nbsp; : <?php echo $data['variables'][3]->v_value;?></b></p>
                    <p><b>Max Students per Lecturer &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; : <?php echo $data['variables'][7]->v_value;?></b></p>
                    <p><b>Max Students per Practical &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; : <?php echo $data['variables'][8]->v_value;?></b></p>
                    <p><b>Max Students per Tutorial &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; : <?php echo $data['variables'][9]->v_value;?></b></p>
                </div>
                </div>
                
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
        createPie('.pieID--operations');
    }

    createPieCharts();
</script>


<!-- Footer Section -->
<?php require APPROOT . '/views/includes/adminFooter.php'; ?>