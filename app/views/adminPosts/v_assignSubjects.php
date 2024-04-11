<?php $style = "assignSubjects"; ?> 

<?php require APPROOT . '/views/includes/adminHeader.php'; ?>

<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

<div class="main">
    <div class="top">
            <h1 class="topic">Adminitsrator / Lecturer / Assign Subjects </h1>
            <h2 class="topic2">Lcturer: <?php echo $data['lecturerName']->l_nameWithInitials; ?> (<?php echo $data['postId']; ?>)</h2>
    </div>        

    <div class="container">
        <div class="column">
            <!-- Content for the first column -->
            <h2 style='color: #010127'>Requeted Subjects by the lecturer</h2>

            <div class="title_bar">
                <p style="padding-left: 20px;" class="title_item"><b>Subject</b></p>
                <p class="title_item"><b>Credits</b></p>
                <p class="title_item"><b>Year</b></p>
                <p class="title_item"><b>Semester</b></p>
                <p class="title_item"><b>Stream</b></p>
            </div>

            <div class="list">
            <?php 
            $i = 1;

            if($data['postsRS'] == "null"){
                echo "<p>No requested subjects</p>";
            }
            else{
            foreach($data['postsRS'] as $post) : ?>
                <div class="lecture_room">
                    <div class="lecture_room_header">
                        <p class="row_num"><?php echo $i++; ?></p>
                        <p class="header_title"><?php echo $post->subject_code; ?></p>
                        <p class="header_title"><?php echo $post->sub_credits; ?></p>
                        <p class="header_title"><?php echo $post->sub_year; ?></p>
                        <p class="header_title"><?php echo $post->sub_semester; ?></p>
                        <p class="header_title"><?php echo $post->sub_stream; ?></p>
                    </div>
                </div>
            <?php endforeach;} ?>
            </div>

            <!-- horizontal line -->
            <hr class="hr">

            <h2 style='color: #010127'>Assign Subjects</h2>

            <div class="title_bar">
                <p style="padding-left: 20px;" class="title_item"><b>Subject</b></p>
                <p class="title_item"><b>Credits</b></p>
                <p class="title_item"><b>Year</b></p>
                <p class="title_item"><b>Semester</b></p>
                <p style="padding-right: 60px;" class="title_item"><b>Stream</b></p>
            </div>

            <div class="list">
            <?php 
            $i = 1;
            foreach($data['postsAS'] as $post) : ?>
                <div class="lecture_room">
                    <div class="lecture_room_header">
                        <p class="row_num"><?php echo $i++; ?></p>
                        <p class="header_title"><?php echo $post->subject_code; ?></p>
                        <p class="header_title"><?php echo $post->sub_credits; ?></p>
                        <p class="header_title"><?php echo $post->sub_year; ?></p>
                        <p class="header_title"><?php echo $post->sub_semester; ?></p>
                        <p class="header_title"><?php echo $post->sub_stream; ?></p>

                        <a href="<?php echo URLROOT; ?>/AdminPosts/deleteRowAS/<?php echo $data['postId']; ?>/<?php echo $post->subject_code; ?>" title="Delete">
                            <button class="delete_button">
                                <img src="<?php echo URLROOT;?>/images/minus_icon.svg" alt="Delete Icon" class="delete_icon">
                            </button>
                        </a>
                    </div>
                </div>
            <?php endforeach; ?>
            </div>

            <a href="" title="Add Row">
                <button class="add_button">
                    <img src="<?php echo URLROOT;?>/images/plus_icon.svg" alt="Add Icon" class="add_icon">
                </button>
            </a>

        </div>

        <div class="column">
            <div class="room_type_counts">
                <div class="count_tile">
                    <p># Total Credits</p>
                    <p id="num_credits"> num_credits </p>
                </div>

                <div class="count_tile">
                    <p># Lecture Hours</p>
                    <p id="lec_hrs"> lec_hrs </p>
                </div>
            </div>

            <div class="pie_chart">
                <?php
                    $lecturer_max_lec_hrs = $data['variables'][0]->v_value;
                    $lec_hrs_per_credit = $data['variables'][1]->v_value;

                    //CALCLATE ASSIGNED SUBJECTS_CREDITS
                    $assigned_subjects_credits = 0;
                    foreach($data['postsAS'] as $post) {
                        $assigned_subjects_credits += $post->sub_credits;
                    }

                    //number of assigned lecture hours
                    $assigned_subjects_lec_hrs = $assigned_subjects_credits * $lec_hrs_per_credit;

                    //precentage of assigned_subjects_lec_hrs
                    $assigned_subjects_credits_precentage = ($assigned_subjects_lec_hrs / $lecturer_max_lec_hrs) * 100;
                ?>

                <script>document.getElementById("num_credits").innerHTML = <?php echo $assigned_subjects_credits ?>;</script>
                <script>document.getElementById("lec_hrs").innerHTML = <?php echo $assigned_subjects_lec_hrs ?>;</script>
                
    
                <p class="chart_name"><b>Work Load</b></p>
                    <div class="Row">
                        <div class="pieID--micro-skills pie-chart--wrapper">
                            <h2 class="chart_name">Lecture Hours</h2>
                            <div class="pie-chart">
                                <div class="pie-chart__pie"></div>
                                <ul class="pie-chart__legend">
                                <li>
                                    <!-- assigned_subjects_credits_precentage -->
                                    <em>Assigned (%)</em>
                                    <span><?php echo $assigned_subjects_credits_precentage; ?></span>
                                </li>
                                <li>
                                    <!-- 100 - assigned_subjects_credits_precentage -->
                                    <em>Remaining (%)</em>
                                    <span><?php echo 100 - $assigned_subjects_credits_precentage; ?></span>
                                </li>
                                </ul>
                            </div>
                        </div>
                    

                        <div class="pieID--categories pie-chart--wrapper">
                            <h2 class="chart_name">Lecture Hours</h2>
                            
                            <div class="pie-chart">
                                <div class="pie-chart__pie"></div>
                                
                                <ul class="pie-chart__legend">
                                <li>
                                    <em>Assigned (%)</em>
                                    <span>40</span>
                                </li>
                                <li>
                                    <em>Remaining (%)</em>
                                    <span>60</span>
                                </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- print lecturer_max_lec_hrs -->
                <p>lecturer_max_lec_hrs: <?php echo $data['variables'][0]->v_value; ?></p>
                <!-- print lec_hrs_per_credit -->
                <p>lec_hrs_per_credit: <?php echo $data['variables'][1]->v_value; ?></p>
                <!-- print assigned_subjects -->
                <p>assigned_subjects_credits: <?php echo $assigned_subjects_credits; ?></p>
                <!-- print assigned_subjects_credits_precentage -->
                <p>assigned_subjects_credits_precentage: <?php echo $assigned_subjects_credits_precentage; ?></p>
                <!-- print assigned_subjects_lec_hrs -->
                <p>assigned_subjects_lec_hrs: <?php echo $assigned_subjects_lec_hrs; ?></p>

            </div>
  </div>

    <div class="popup-form">


        <div class="filters filter-container">
            <label for="streamFilter">Stream:</label>
            <select id="streamFilter">
                <option value="">All</option>
                <option value="CS">CS</option>
                <option value="IS">IS</option>
                <?php foreach ($data['streams'] as $stream) : ?>
                    <option value="<?php echo $stream; ?>"><?php echo $stream; ?></option>
                <?php endforeach; ?>
            </select>

            <label for="yearFilter">Year:</label>
            <select id="yearFilter">
                <option value="">All</option>
                <option value="1">1</option>
                <option value="2">2</option>
                <option value="3">3</option>
                <option value="4">4</option>
                <?php foreach ($data['years'] as $year) : ?>
                    <option value="<?php echo $year; ?>"><?php echo $year; ?></option>
                <?php endforeach; ?>
            </select>

            <label for="semesterFilter">Semester:</label>
            <select id="semesterFilter">
                <option value="">All</option>
                <option value="1">1</option>
                <option value="2">2</option>
                <?php foreach ($data['semesters'] as $semester) : ?>
                    <option value="<?php echo $semester; ?>"><?php echo $semester; ?></option>
                <?php endforeach; ?>
            </select>
        </div>

        <a href="" id="clear-search" class="clear-icon">&#10006;</a>
        
        <div class="table-wrapper">
            <table class="styled-table">
                <thead>
                    <tr>
                        <th>Code</th>
                        <th>Name</th>
                        <th>Year</th>
                        <th>Semester</th>
                        <th>Credits</th>
                        <th>Stream</th>
                        <th></th>
                        <th> Can Assign </th>
                        <th> Assigned To </th>
                    </tr>
                </thead>
                <!-- Code	Name	Year	Semester	Credits	Stream -->
                <tbody>        
                    <?php $i = 0;
                    foreach($data['subjects'] as $subject) : ?>
                        <tr>
                            <?php if ($subject->subject_code){ 
                                if($subject->lecturer_code != $data['postId']){ ?>
                                    <td><?php echo $subject->sub_code; ?></td>
                                    <td><?php echo $subject->sub_name; ?></td>
                                    <td><?php echo $subject->sub_year; ?></td>
                                    <td><?php echo $subject->sub_semester; ?></td>
                                    <td><?php echo $subject->sub_credits; ?></td>
                                    <td><?php echo $subject->sub_stream; ?></td>
                                    <td><span style='color: red;'><b>Assigned</b></span></td>
                                    <td>
                                        <form action="<?php echo URLROOT;?>/AdminPosts/forceAssignLecturers/<?php echo $subject->sub_code; ?>/<?php echo $data['postId']; ?>" method="POST">
                                            <input class="force" type="submit" value="FORCE">
                                        </form>
                                    </td>
                                    <td><?php echo $subject->lecturer_code; ?></td>
                                <?php } ?>
                            
                                
                            <?php }else{ ?>
                                <td><?php echo $subject->sub_code; ?></td>
                                <td><?php echo $subject->sub_name; ?></td>
                                <td><?php echo $subject->sub_year; ?></td>
                                <td><?php echo $subject->sub_semester; ?></td>
                                <td><?php echo $subject->sub_credits; ?></td>
                                <td><?php echo $subject->sub_stream; ?></td>
                                <td style="color: green;"><b>Available</b></td>
                                <td>
                                    <!-- send 2 prameters (sub_code, lecturer_code) -->
                                    <form action="<?php echo URLROOT;?>/AdminPosts/addToAssignSubjects/<?php echo $subject->sub_code; ?>/<?php echo $data['postId']; ?>" method="POST">
                                        <input class="update_button" type="submit" value="SELECT">
                                    </form> 
                                </td>
                                <td>-</td>
                            <?php }?>
                            
                        </tr>
                    <?php endforeach; ?>
            </table> 
        </div>
    <!-- submitbutton toa url -->
    <form action="">
        <input class="create_button" type="submit" value="EXIT">
    </form>
    
    <div class="legend">
        <p><b><span style='color: green;'>Available</span></b> - can be assigned.</p>
        <p><b><span style='color: red;'>Assigned</span></b> - can't be assigned to this lecturer but can be forced (remove the current lecturer and assign to this lecturer).</p>
    </div>
    
    </div>

</div>

<script src="<?php echo URLROOT;?>/js/administrator/assignSubjects.js"></script>

<?php require APPROOT . '/views/includes/adminFooter.php'; ?>