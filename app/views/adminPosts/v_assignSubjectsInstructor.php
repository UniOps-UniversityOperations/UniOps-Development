<?php $style = "assignSubjectsInstructor"; ?> 

<?php require APPROOT . '/views/includes/adminHeader.php'; ?>

<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

<div class="main">
    <div class="top">
            <h1 class="topic">Adminitsrator / Instructor / Assign Subjects </h1>
            <h2 class="topic2">Lcturer Code: <?php echo $data['postId']; ?></h2>
    </div>        

    <div class="container">
        <div class="column">
            <!-- Content for the first column -->
            <h2 style='color: #010127'>Requeted Subjects by the lecturer</h2>

            <div class="title_bar">
                <p style="padding-left: 20px;" class="title_item"><b>Subject</b></p>
                <p class="title_item"><b>Credits</b></p>
                <p class="title_item"><b>Year</b></p>
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
                <p class="title_item"><b>Stream</b></p>
                <p class="title_item"><b>Lecture</b></p>
                <p class="title_item"><b>Practical</b></p>
                <p style="padding-right: 60px;" class="title_item"><b>Tutorial</b></p>
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
                        <p class="header_title"><?php echo $post->sub_stream; ?></p>
                        <p class="header_title"><?php echo $post->lecturer_code ? "<span style='color: green;'>&#10004;</span>" : "<span style='color: red;'>&#10008;</span>"; ?></p>
                        <p class="header_title"><?php echo $post->p_instructor_code ? "<span style='color: green;'>&#10004;</span>" : "<span style='color: red;'>&#10008;</span>"; ?></p>
                        <p class="header_title"><?php echo $post->t_instructor_code  ? "<span style='color: green;'>&#10004;</span>" : "<span style='color: red;'>&#10008;</span>"; ?></p>

                        <a href="<?php echo URLROOT; ?>/AdminPosts/deleteRowASI/<?php echo $data['postId']; ?>/<?php echo $post->subject_code; ?>" title="Delete">
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
                <p>Pie Chart</p>

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
                                                <form action="" method="POST"> <!-- add action -->
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
                                                <form action="" method="POST"> <!-- add action -->
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
                                            <td>--link--</td>
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
                                            <td>--link--</td>
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
                                            <td>--link--</td>
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
                                            <td>--link--</td>
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