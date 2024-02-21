<?php $style = "assignSubjectsInstructor"; ?> 

<?php require APPROOT . '/views/includes/adminHeader.php'; ?>

<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

<div class="main">
    <div class="top">
            <h1 class="topic">Adminitsrator / Instructors / Assign Subjects </h1>
            <h2 class="topic2">Instructor: <?php echo $data['instructorName']->i_nameWithInitials; ?> (<?php echo $data['postId']; ?>)</h2>
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
                <p class="title_item"><b>Lecture</b></p>
                <p class="title_item"><b>Practical</b></p>
                <p class="title_item"><b>Tutorial</b></p>
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
                        <p class="header_title"><?php echo $post->lecture ? "<span style='color: green;'>&#10004;</span>" : "<span style='color: red;'>&#10008;</span>"; ?></p>
                        <p class="header_title"><?php echo $post->practical ? "<span style='color: green;'>&#10004;</span>" : "<span style='color: red;'>&#10008;</span>"; ?></p>
                        <p class="header_title"><?php echo $post->tutorial  ? "<span style='color: green;'>&#10004;</span>" : "<span style='color: red;'>&#10008;</span>"; ?></p>
                    </div>
                </div>
            <?php endforeach;} ?>
            </div>

            <!-- horizontal line -->
            <hr class="hr">

            <h2 style='color: #010127'>Assigned Subjects</h2>

            <div class="title_bar">
                <p style="padding-left: 20px;" class="title_item"><b>Subject</b></p>
                <p class="title_item"><b>Credits</b></p>
                <p class="title_item"><b>Year</b></p>
                <p class="title_item"><b>Semester</b></p>
                <p class="title_item"><b>Stream</b></p>
                <p style="padding-right: 25px;" class="title_item"><b>Lecture</b></p>
                <p style="padding-right: 25px;" class="title_item"><b>Practical</b></p>
                <p style="padding-right: 40px;" class="title_item"><b>Tutorial</b></p>
            </div>

            <div class="list">
            <?php 
            $i = 1;
            foreach($data['postsASI'] as $post) : ?>
                <div class="lecture_room">
                    <div class="lecture_room_header">
                        <p class="row_num"><?php echo $i++; ?></p>
                        <p class="header_title"><?php echo $post->sub_code; ?></p>
                        <p class="header_title"><?php echo $post->sub_credits; ?></p>
                        <p class="header_title"><?php echo $post->sub_year; ?></p>
                        <p class="header_title"><?php echo $post->sub_semester; ?></p>
                        <p class="header_title"><?php echo $post->sub_stream; ?></p>
                        
                        <div class="combined_delete header_title">
                            <?php if($post->lecturer_code == $data['postId']){ ?>
                                <p class="header_title"> <span style='color: green;'>&#10004;</span> </p>
                                <a href="<?php echo URLROOT; ?>/AdminPosts/i_deleteRowAS/<?php echo $data['postId']; ?>/<?php echo $post->sub_code; ?>" title="Delete">
                                    <button class="delete_button">
                                        <img src="<?php echo URLROOT;?>/images/minus_icon.svg" alt="Delete Icon" class="delete_icon">
                                    </button>
                                </a>
                             <?php } else { ?>
                                <p class="header_title"> <span style='color: red;'>&#10008;</span> </p>
                                <a href="" title="Delete">
                                    <button class="delete_button_disabled">
                                        <img src="<?php echo URLROOT;?>/images/minus_icon.svg" alt="Delete Icon" class="delete_icon">
                                    </button>
                                </a>
                            <?php } ?>
                        </div>

                        <div class="combined_delete header_title">
                            <?php if($post->p_instructor_code == $data['postId']){ ?>
                                <p class="header_title"> <span style='color: green;'>&#10004;</span> </p>
                                <a href="<?php echo URLROOT; ?>/AdminPosts/i_deleteRow_p/<?php echo $data['postId']; ?>/<?php echo $post->sub_code; ?>" title="Delete">
                                    <button class="delete_button">
                                        <img src="<?php echo URLROOT;?>/images/minus_icon.svg" alt="Delete Icon" class="delete_icon">
                                    </button>
                                </a>
                             <?php } else { ?>
                                <p class="header_title"> <span style='color: red;'>&#10008;</span> </p>
                                <a href="" title="Delete">
                                    <button class="delete_button_disabled">
                                        <img src="<?php echo URLROOT;?>/images/minus_icon.svg" alt="Delete Icon" class="delete_icon">
                                    </button>
                                </a>
                            <?php } ?>
                        </div>

                        <div class="combined_delete header_title">
                            <?php if($post->t_instructor_code == $data['postId']){ ?>
                                <p class="header_title"> <span style='color: green;'>&#10004;</span> </p>
                                <a href="<?php echo URLROOT; ?>/AdminPosts/i_deleteRow_t/<?php echo $data['postId']; ?>/<?php echo $post->sub_code; ?>" title="Delete">
                                    <button class="delete_button">
                                        <img src="<?php echo URLROOT;?>/images/minus_icon.svg" alt="Delete Icon" class="delete_icon">
                                    </button>
                                </a>
                             <?php } else { ?>
                                <p class="header_title"> <span style='color: red;'>&#10008;</span> </p>
                                <a href="" title="Delete">
                                    <button class="delete_button_disabled">
                                        <img src="<?php echo URLROOT;?>/images/minus_icon.svg" alt="Delete Icon" class="delete_icon">
                                    </button>
                                </a>
                            <?php } ?>
                        </div>

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
            <!-- <div class="room_type_counts">
                <div class="count_tile">
                    <p># Total Credits</p>
                    <p id="num_credits"> num_credits </p>
                </div>

                <div class="count_tile">
                    <p># Lecture Hours</p>
                    <p id="lec_hrs"> lec_hrs </p>
                </div>
            </div> -->
            

            <div class="pie_chart list2">
            
                <div class="wrapper">
                <h1>Instructor Work Load</h1>
                
                    <div class="pie-charts1">

                        <!-- Logic for pie chart 01 -->

                        <?php
                            $lecturer_max_lec_hrs = $data['variables'][0]->v_value;
                            $lec_hrs_per_credit = $data['variables'][1]->v_value;

                            //CALCLATE ASSIGNED SUBJECTS_CREDITS
                            $assigned_subjects_credits = 0;
                            foreach($data['postsASI'] as $post) {
                                if($post->lecturer_code == $data['postId']){
                                    $assigned_subjects_credits += $post->sub_credits;
                                }
                            }

                            //number of assigned lecture hours
                            $assigned_subjects_lec_hrs = $assigned_subjects_credits * $lec_hrs_per_credit;

                            //precentage of assigned_subjects_lec_hrs
                            $assigned_subjects_credits_precentage = ($assigned_subjects_lec_hrs / $lecturer_max_lec_hrs) * 100;
                        ?>

                        <div class=pie_row1>
                            <div class="pieID--micro-skills pie-chart--wrapper">
                                <h2 class="chart_name">Lectures</h2>
                            
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

                                //CALCLATE ASSIGNED SUBJECTS_CREDITS
                                $assigned_practical_credits = 0;
                                foreach($data['postsASI'] as $post) {
                                    if($post->p_instructor_code == $data['postId']){
                                        $assigned_practical_credits += $post->sub_credits;
                                    }
                                }

                                //number of assigned lecture hours
                                $assigned_practical_hrs = $assigned_practical_credits * $practcal_hrs_per_credit;

                                //precentage of assigned_subjects_lec_hrs
                                $assigned_practical_credits_precentage = ($assigned_practical_hrs / $instructor_max_practical_hrs) * 100;
                            ?>

                            <div class="pieID--categories pie-chart--wrapper">
                                <h2 class="chart_name">Practicals</h2>
                                
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
                        </div>

                        <div class=pie_row2>

                        <!-- Logic for pie chart 03 -->

                        <?php
                            $instructor_max_tutorial_hrs = $data['variables'][5]->v_value;
                            $tutorial_hrs_per_credit = $data['variables'][3]->v_value;

                            //CALCLATE ASSIGNED SUBJECTS_CREDITS
                            $assigned_tutorial_credits = 0;
                            foreach($data['postsASI'] as $post) {
                                if($post->t_instructor_code == $data['postId']){
                                    $assigned_tutorial_credits += $post->sub_credits;
                                }
                            }

                            //number of assigned lecture hours
                            $assigned_tutorial_hrs = $assigned_tutorial_credits * $tutorial_hrs_per_credit;

                            //precentage of assigned_subjects_lec_hrs
                            $assigned_tutorial_credits_precentage = ($assigned_tutorial_hrs / $instructor_max_tutorial_hrs) * 100;
                        ?>

                        <div class="pieID--operations pie-chart--wrapper">
                        <h2 class="chart_name">Tutorials</h2>
                        
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
                        
                        <!-- Logic for pie chart 04 -->

                        <?php
                            $total_hrs = $assigned_subjects_lec_hrs + $assigned_practical_hrs + $assigned_tutorial_hrs;
                            $max_hrs = $lecturer_max_lec_hrs + $instructor_max_practical_hrs + $instructor_max_tutorial_hrs;

                            $total_hrs_precentage = ($total_hrs / $max_hrs) * 100;
                        ?>

                        <div class="pieID--hello pie-chart--wrapper">
                        <h2 class="chart_name">__Total__</h2>
                        
                        <div class="pie-chart">
                            <div class="pie-chart__pie"></div>
                            
                            <ul class="pie-chart__legend">
                            <li>
                                <em>Assigned (%)</em>
                                <span><?php echo $total_hrs_precentage ?></span>
                            </li>
                            <li>
                                <em>Remaining (%)</em>
                                <span><?php echo 100 - $total_hrs_precentage ?></span>
                            </li>
                            </ul>
                        </div>
                        </div>
                        </div>
                    
                    </div>

                    
                
                </div>                
                
                <!-- print lecturer_max_lec_hrs -->
                <p>lecturer_max_lec_hrs: <?php echo $data['variables'][0]->v_value; ?></p>
                <!-- print lec_hrs_per_credit -->
                <p>lec_hrs_per_credit: <?php echo $data['variables'][1]->v_value; ?></p>
                <!-- print assigned_subjects_credits -->
                <p>**assigned_subjects_credits: <?php echo $assigned_subjects_credits; ?></p>

                <!-- print practcal_hrs_per_credit -->
                <p>practcal_hrs_per_credit: <?php echo $data['variables'][2]->v_value; ?></p>
                <!-- print tutorial_hrs_per_credit -->
                <p>tutorial_hrs_per_credit: <?php echo $data['variables'][3]->v_value; ?></p>
                <!-- print instructor_max_practical_hrs -->
                <p>instructor_max_practical_hrs: <?php echo $data['variables'][4]->v_value; ?></p>
                <!-- print instructor_max_tutorial_hrs -->
                <p>instructor_max_tutorial_hrs: <?php echo $data['variables'][5]->v_value; ?></p>
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
                        <th> Lecture </th>
                        <th></th>
                        <th> Practical </th>
                        <th></th>
                        <th> Tutorial </th>
                        <th></th>
                    </tr>
                </thead>
                <!-- Code	Name	Year	Semester	Credits	Stream -->
                <tbody>        
                    <?php $i = 0;
                    foreach($data['subjects'] as $subject) : ?>
                        <tr>
                            <td><?php echo $subject->sub_code; ?></td>
                            <td><?php echo $subject->sub_name; ?></td>
                            <td><?php echo $subject->sub_year; ?></td>
                            <td><?php echo $subject->sub_semester; ?></td>
                            <td><?php echo $subject->sub_credits; ?></td>
                            <td><?php echo $subject->sub_stream; ?></td>
                            
                                <?php if(!$subject->sub_isHaveLecture){ ?>
                                    <td>
                                    <p style='color: gray;'><b>No Lecture</b></p>
                                    </td>
                                    <td>
                                        <form>
                                            <input class="dummy_btn" type="submit" value="NULL" disabled>
                                        </form>
                                    </td>
                                <?php }else { ?>
                                        <?php if(!$subject->lecturer_code){ ?>
                                            <td>
                                                <p style='color: green;'><b>Avaliable</b></p>
                                            </td>
                                            <td>
                                                <form action="<?php echo URLROOT;?>/AdminPosts/i_addToAssignSubjects/<?php echo $subject->sub_code; ?>/<?php echo $data['postId']; ?>" method="POST"> <!-- add action -->
                                                    <input class="update_button" type="submit" value="SELECT">
                                                </form> 
                                            </td>
                                        <?php } else if($subject->lecturer_code == $data['postId']) { ?>
                                            <td>
                                                <p style='color: gray;'><b>Assigned</b></p>
                                            </td>
                                            <td>
                                                <form>
                                                    <input class="dummy_btn" type="submit" value="UNAVAILABLE" disabled>
                                                </form>
                                            </td>
                                        <?php } else { ?>
                                            <td>
                                                <p style='color: red;'><b>Unavailable</b></p>
                                                
                                            </td>
                                            <td>
                                                <form action="<?php echo URLROOT;?>/AdminPosts/i_forceAssignLecturers/<?php echo $subject->sub_code; ?>/<?php echo $data['postId']; ?>" method="POST"> <!-- add action -->
                                                    <input class="force" type="submit" value="FORCE">
                                                </form>
                                            </td>
                                        <?php } ?>
                                <?php } ?>
                            
                                <?php if(!$subject->sub_isHavePractical){ ?>
                                    <td>
                                        <p style='color: gray;'><b>No Practical</b></p>
                                    </td>
                                    <td>
                                        <form>
                                            <input class="dummy_btn" type="submit" value="NULL" disabled>
                                        </form>
                                    </td>
                                <?php }else { ?>
                                    <?php if(!$subject->p_instructor_code){ ?>
                                            <td>
                                                <p style='color: green;'><b>Avaliable</b></p>
                                            </td>
                                            <td>
                                                <form action="<?php echo URLROOT;?>/AdminPosts/i_addToAssignPractical/<?php echo $subject->sub_code; ?>/<?php echo $data['postId']; ?>" method="POST"> <!-- add action -->
                                                    <input class="update_button" type="submit" value="SELECT">
                                                </form> 
                                            </td>
                                        <?php } else if($subject->p_instructor_code == $data['postId']) { ?>
                                            <td>
                                                <p style='color: gray;'><b>Assigned</b></p>
                                            </td>
                                            <td>
                                                <form>
                                                    <input class="dummy_btn" type="submit" value="UNAVAILABLE" disabled>
                                                </form>
                                            </td>
                                        <?php } else { ?>
                                            <td>
                                                <p style='color: red;'><b>Unavailable</b></p>
                                                
                                            </td>
                                            <td>
                                                <form action="<?php echo URLROOT;?>/AdminPosts/i_forceAssignPractical/<?php echo $subject->sub_code; ?>/<?php echo $data['postId']; ?>" method="POST"> <!-- add action -->
                                                    <input class="force" type="submit" value="FORCE">
                                                </form>
                                            </td>
                                        <?php } ?>
                                <?php } ?>
                            
                                <?php if(!$subject->sub_isHaveTutorial){ ?>
                                    <td>
                                        <p style='color: gray;'><b>No Tutorial</b></p>
                                    </td>
                                    <td>
                                        <form>
                                            <input class="dummy_btn" type="submit" value="NULL" disabled>
                                        </form>
                                    </td>
                                <?php }else { ?>
                                    <?php if(!$subject->t_instructor_code){ ?>
                                            <td>
                                                <p style='color: green;'><b>Avaliable</b></p>
                                            </td>
                                            <td>
                                                <form action="<?php echo URLROOT;?>/AdminPosts/i_addToAssignTutorial/<?php echo $subject->sub_code; ?>/<?php echo $data['postId']; ?>" method="POST"> <!-- add action -->
                                                    <input class="update_button" type="submit" value="SELECT">
                                                </form> 
                                            </td>
                                        <?php } else if($subject->t_instructor_code == $data['postId']) { ?>
                                            <td>
                                                <p style='color: gray;'><b>Assigned</b></p>
                                            </td>
                                            <td>
                                                <form>
                                                    <input class="dummy_btn" type="submit" value="UNAVAILABLE" disabled>
                                                </form>
                                            </td>
                                        <?php } else { ?>
                                            <td>
                                                <p style='color: red;'><b>Unavailable</b></p>
                                                
                                            </td>
                                            <td>
                                                <form action="<?php echo URLROOT;?>/AdminPosts/i_forceAssignTutorial/<?php echo $subject->sub_code; ?>/<?php echo $data['postId']; ?>" method="POST"> <!-- add action -->
                                                    <input class="force" type="submit" value="FORCE">
                                                </form>
                                            </td>
                                        <?php } ?>
                                <?php } ?>
                            


                            
                            
                        </tr>
                    <?php endforeach; ?>
            </table> 
        </div>
    <!-- submitbutton toa url -->
    <form action="">
        <input class="create_button" type="submit" value="CANCEL">
    </form>
    
    <div class="legend">
        <p><b><span style='color: green;'>Available</span></b> - can be assigned.</p>
        <p><b><span style='color: red;'>Unavailable</span></b> - can't be assigned to this lecturer but can be forced (remove the current lecturer and assign to this lecturer).</p>
        <p><b><span style='color: gray;'>Assigned</span></b> - already assigned to this lecturer.</p>
        <p><b><span style='color: gray;'>NULL</span></b> - no such optiion for this subject.</p>
    </div>
    
    </div>

</div>

<script src="<?php echo URLROOT;?>/js/administrator/assignSubjectsInstructor.js"></script>

<?php require APPROOT . '/views/includes/adminFooter.php'; ?>