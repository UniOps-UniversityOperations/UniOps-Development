<?php $style = "assignSubjects"; ?> 

<?php require APPROOT . '/views/includes/adminHeader.php'; ?>

<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

<div class="main">
    <div class="top">
            <h1 class="topic">Adminitsrator / Lecturer / Assign Subjects </h1>
            <h2 class="topic2">Lcturer: <?php echo $data['lecturerName']->l_nameWithInitials; ?> (<?php echo $data['postId']; ?>)</h2>
            <!-- dispay email -->
            <h2 class="topic2">Email: <?php echo $data['email']->l_email; ?></h2>
    </div> 
    
    <!-- print popup value in the console -->
    <script>console.log(<?php echo $data['popup']; ?>);</script>
    
    <?php if($data['popup']){ ?>

        <div id="popup" 
        style="
        display: none; 
        position: fixed; 
        border-radius: 10px;
        font-size: 19px;
        font-weight: bold;
        color: green;
        top: 10%; 
        left: 80%; 
        transform: 
        translate(50%, -25%); 
        background-color: white; 
        padding: 20px; border: 1px green solid; 
        transition: top 0.5s ease;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.5);">
        <!-- if popup = 1 Request Email Sent | if popup = 2 Status Email Sent -->
            <?php if($data['popup'] == 1){ ?>
                <p>Request Email Sent</p>
            <?php }else if($data['popup'] == 2){ ?>
                <p>Status Email Sent</p>
            <?php } ?>
        </div>

        <script>
            // Function to show the popup message
            function showPopup() {
                var popup = document.getElementById('popup');
                popup.style.display = 'block';

                // Hide the popup after 5 seconds
                setTimeout(function() {
                    popup.style.display = 'none';
                }, 3000);
            }

            // Call the showPopup function when the page loads
            window.onload = showPopup;
        </script>

    <?php } ?>

    <div class="container">
        <div class="column">
            <!-- Content for the first column -->
            <h2 style='color: #010127'>Requeted Subjects by the lecturer</h2>

            <div class="title_bar">
                <p style="padding-left: 20px;" class="title_item"><b>Subject</b></p>
                <p class="title_item"><b>Credits</b></p>
                <p class="title_item"><b>Year-Sem</b></p>
                <p class="title_item"><b>Stream</b></p>
                <p class="title_item"><b>S_Count</b></p>
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
                        <p class="header_title"><?php echo $post->sub_year; ?> - <?php echo $post->sub_semester; ?></p>
                        <p class="header_title"><?php echo $post->sub_stream; ?></p>
                        <p class="header_title"><?php echo $post->sub_nStudents; ?></p>
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
                <p class="title_item"><b>Year-Sem</b></p>
                <p class="title_item"><b>Stream</b></p>
                <p style="padding-right: 60px;" class="title_item"><b>S_Count</b></p>
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
                        <p class="header_title"><?php echo $post->sub_year; ?> - <?php echo $post->sub_semester; ?></p>
                        <p class="header_title"><?php echo $post->sub_stream; ?></p>
                        <p class="header_title"><?php echo $post->sub_nStudents; ?></p>

                        <a href="<?php echo URLROOT; ?>/AdminPosts/sendDeleteRequestEmail/<?php echo $data['email']->l_email; ?>/<?php echo $post->subject_code; ?>/<?php echo $data['postId']; ?>" title="Send Request Email" style="padding-right: 10px;">
                            <button class="email_button">
                                <img src="<?php echo URLROOT;?>/images/email_icon.svg" alt="Email Icon" class="email_icon">
                            </button>
                        </a>

                        <a href="<?php echo URLROOT; ?>/AdminPosts/deleteRowAS/<?php echo $data['postId']; ?>/<?php echo $post->subject_code; ?>" title="Delete">
                            <button class="delete_button">
                                <img src="<?php echo URLROOT;?>/images/minus_icon.svg" alt="Delete Icon" class="delete_icon">
                            </button>
                        </a>

                    </div>
                </div>
            <?php endforeach; ?>
            </div>
            
            <div class='btns'>
                <a href="" title="Add Row">
                    <button class="add_button">
                        <img src="<?php echo URLROOT;?>/images/plus_icon.svg" alt="Add Icon" class="add_icon">
                    </button>
                </a>
    
                <a href="<?php echo URLROOT; ?>/AdminPosts/send_AS_status_email/<?php echo $data['email']->l_email; ?>/<?php echo $data['postId']; ?>" title="Send Status Email" style="padding-right: 10px;">
                    <button class="status_email_button">Send Status Email</button>
                </a>  
            </div>

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
                    $max_students_per_lecturer = $data['variables'][2]->v_value;

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
                    
                    <div class='details'>
                    <p><b>Assigned Number of Credits &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;: <?php echo $assigned_subjects_credits; ?></b></p>
                    <p><b>Assigned Number of Lecture Hours &nbsp; : <?php echo $assigned_subjects_lec_hrs; ?></b></p>
                    <p><b>Assigned Number of Students &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; : <?php echo $assigned_nStudents; ?></b></p>
                    </div>

                </div>
                <!-- print lecturer_max_lec_hrs -->
                <p>lecturer_max_lec_hrs: <?php echo $data['variables'][0]->v_value; ?></p>
                <!-- print lec_hrs_per_credit -->
                <p>lec_hrs_per_credit: <?php echo $data['variables'][1]->v_value; ?></p>
                <!-- print max_students_per_lecturer -->
                <p>max_students_per_lecturer: <?php echo $data['variables'][2]->v_value; ?></p>
                <!-- print assigned_subjects -->
                <p>assigned_subjects_credits: <?php echo $assigned_subjects_credits; ?></p>
                <!-- print assigned_subjects_credits_precentage -->
                <p>assigned_subjects_credits_precentage: <?php echo $assigned_subjects_credits_precentage; ?></p>
                <!-- print assigned_subjects_lec_hrs -->
                <p>assigned_subjects_lec_hrs: <?php echo $assigned_subjects_lec_hrs; ?></p>
                <!-- print assigned_nStudents -->
                <p>assigned_nStudents: <?php echo $assigned_nStudents; ?></p>

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
                <!-- <?php foreach ($data['years'] as $year) : ?>
                    <option value="<?php echo $year; ?>"><?php echo $year; ?></option>
                <?php endforeach; ?> -->
            </select>

            <label for="semesterFilter">Semester:</label>
            <select id="semesterFilter">
                <option value="">All</option>
                <option value="0">1 / 2</option>
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
                        <th>Student Count</th>
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
                            <?php if ($subject->subject_code && $subject->lecturer_code != $data['postId']){?>
                                    <td><?php echo $subject->sub_code; ?></td>
                                    <td><?php echo $subject->sub_name; ?></td>
                                    <td><?php echo $subject->sub_year; ?></td>
                                    <td><?php echo $subject->sub_semester; ?></td>
                                    <td><?php echo $subject->sub_credits; ?></td>
                                    <td><?php echo $subject->sub_stream; ?></td>
                                    <td><?php echo $subject->sub_nStudents; ?></td>
                                    <td><span style='color: red;'><b>Assigned</b></span></td>
                                    <td>
                                        <form action="<?php echo URLROOT;?>/AdminPosts/forceAssignLecturers/<?php echo $subject->sub_code; ?>/<?php echo $data['postId']; ?>" method="POST">
                                            <input class="force" type="submit" value="FORCE">
                                        </form>
                                    </td>
                                    <td>
                                        <div class='btns1'>
                                            <p><?php echo $subject->lecturer_code; ?></p>
                                            <a href="<?php echo URLROOT; ?>/AdminPosts/sendForceEmail/<?php echo $subject->lecturer_code; ?>/<?php echo $post->subject_code; ?>/<?php echo $data['postId']; ?>" title="Send Request Email" style="padding-right: 10px;">
                                                <button class="email_button">
                                                    <img src="<?php echo URLROOT;?>/images/email_icon.svg" alt="Email Icon" class="email_icon">
                                                </button>
                                            </a>
                                        </div>
                                    </td>
                                
                                    
                                
                            <?php }else if(!$subject->subject_code){ ?>
                                <td><?php echo $subject->sub_code; ?></td>
                                <td><?php echo $subject->sub_name; ?></td>
                                <td><?php echo $subject->sub_year; ?></td>
                                <td><?php echo $subject->sub_semester; ?></td>
                                <td><?php echo $subject->sub_credits; ?></td>
                                <td><?php echo $subject->sub_stream; ?></td>
                                <td><?php echo $subject->sub_nStudents; ?></td>
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
        <!--  inform thar by clickeng the mail icon, an email will be sent to the lecturer -->
        <p><b>Mail Icon</b> - Send an email to the lecturer (Assigned To), requesting to remove the subject to assign to this lecturer.</p>
    </div>
    
    </div>

</div>

<script src="<?php echo URLROOT;?>/js/administrator/assignSubjects.js"></script>

<?php require APPROOT . '/views/includes/adminFooter.php'; ?>