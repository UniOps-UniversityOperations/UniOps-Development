<!-- this variable is used to set the css file for this view -->
<?php $style = "viewLecturers"; ?>

<?php require APPROOT . '/views/includes/adminHeader.php'; ?>

<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

        <!-- <div class="wrapper side-panel-open"> -->
        <div class="wrapper">
        <div class="main">

            <!-- Have to look this later *************************************************************************************************************-->
            <?php
                // Count the number of Lecturers
                $count = 0;
                foreach ($data['posts'] as $post) {
                    $count++;
                }
            ?>
                
                <div class="top">
                <h1 class="topic">Adminitsrator / Lecturers</h1>
                <div class="centered_container">
                    <div class="room_type_counts">
                        <?php
                        // Display the count for each type
                            echo "<div class='count_tile'>";
                            echo "<div class='count_row'>";
                            echo "<div class='count_column'><p># Lecturers:</p></div>";
                            echo "<div class='count_column'><p>$count</p></div>";
                            echo "</div>";
                            echo "</div>"
                        ?>
                    </div>
                </div>

                <div class="table-head">
                    <div class="search-container">
                        <input type="text" id="search" placeholder="Search by Lecturer name..." >
                        <span class="clear-icon" id="clear-search">&#10006;</span>
                    </div>

                    <div class="create_room_button">
                        <a href="<?php echo URLROOT;?>/AdminPosts/createLecturer">
                            <button class="create_button">Add Lecturer</button>
                        </a>
                    </div>
                </div>

                <style>
                    .table-head{
                        display: flex;
                        justify-content: space-between;
                        align-items: center;
                        margin: 20px
                    }
                </style>

                <div class="title_bar">
                    <p style="padding-left: 30px;" class="title_item"><b>Name</b></p>
                    <p class="title_item"><b>Code</b></p>
                    <p class="title_item"><b>Email</b></p>
                    <p class="title_item"><b>Contact</b></p>
                    <p style="padding-right: 220px;" class="title_item"><b>Department</b></p>
                </div> 
            
            </div>

            <?php $test = $lec_room = []; ?>
            
            <div class="list">
            <?php 
            $i = 1;
            foreach($data['posts'] as $post) : ?>

                <div class="lecture_room" data-room-name="<?php echo $post->l_fullName; ?>">

                    <!-- Idle view -->
                    <div class="idle-view">
                            <div class="lecture_room_header">
                                <p class="row_num"><?php echo $i++; ?></p>
                                <h3 class="header_title"><?php echo $post->l_nameWithInitials; ?></h3>
                                <p class="header_item"><?php echo $post->l_code; ?></p>
                                <p class="header_item"><?php echo $post->l_email; ?></p>
                                <p class="header_item"><?php echo $post->l_contactNumber; ?></p>
                                <p class="header_item"><?php echo $post->l_department; ?></p>
                                
                                <div class="action_buttons">

                                    <button class="view_button" title="View More">
                                        <img src="<?php echo URLROOT;?>/images/view_icon.svg" alt="View Icon" class="view_icon">
                                    </button>

                                    <a href="<?php echo URLROOT; ?>/AdminPosts/assignSubjects/<?php echo $post->l_code ?>" title="Assign Subjects">
                                        <button class="assign_button">
                                            <img src="<?php echo URLROOT;?>/images/assign.svg" alt="Assign" class="update_icon">

                                        </button>
                                    </a>
                                    
                                    <a href="<?php echo URLROOT; ?>/AdminPosts/updateLecturer/<?php echo $post->l_id ?>" title="Edit Details">
                                        <button class="update_button">
                                            <img src="<?php echo URLROOT;?>/images/update_icon.svg" alt="Update Icon" class="update_icon">

                                        </button>
                                    </a>
                                    
                                    <a href="<?php echo URLROOT; ?>/AdminPosts/deleteLecturer/<?php echo $post->l_id ?>" title="Delete">
                                        <button class="delete_button">
                                            <img src="<?php echo URLROOT;?>/images/delete_icon.svg" alt="Delete Icon" class="delete_icon">
                                        </button>
                                    </a>


                                </div>
                            </div>  
                    </div>
                    
                    <!-- Detailed view -->

                            <?php
                             $test[] = $post->l_code;
                             $lec_room[] = $post;
                            ?>
                    
                    
                </div>
                
            <?php endforeach; ?>
            </div>

        </div>
        <button class="side-panel-toggle" type="button">
            <span class="material-icons sp-icon-open">keyboard_double_arrow_left</span>
            <span class="material-icons sp-icon-close">keyboard_double_arrow_right</span>
        </button>

        <div class="side-panel">
            <?php

                foreach ($lec_room as $post) {
                    echo "<div class='side_item'>";
                    ?>

                        <div class="sidebar_header">
                            <h3 class="header_text"><?php echo $post->l_nameWithInitials; ?></h3>
                        
                        </div>
                        
                        <div class="sidebar_body">
                            <div class="sidebar_body_top">

                                <table class="sidebar_table">
                                    <tr>
                                        <td><b>Code</b></td>
                                        <td><b>: </b><?php echo $post->l_code; ?></td>
                                    </tr>

                                    <tr>
                                        <td><b>Email</b></td>
                                        <td>
                                            <?php 
                                                $text = $post->l_email;
                                                $chunks = str_split($text, 20);

                                                foreach ($chunks as $key => $chunk):
                                                    echo $key === 0 ? "<b>: </b>" : ''; // Add <b>: </b> for the first chunk
                                            ?>
                                                <?= $chunk ?><br>
                                            <?php endforeach; ?>
                                        </td>
                                    </tr>

                                    <tr>
                                        <td><b>Full Name</b></td>
                                        <td>
                                            <?php 
                                                $text = $post->l_fullName;
                                                $chunks = str_split($text, 20);

                                                foreach ($chunks as $key => $chunk):
                                                    echo $key === 0 ? "<b>: </b>" : ''; // Add <b>: </b> for the first chunk
                                            ?>
                                                <?= $chunk ?><br>
                                            <?php endforeach; ?>
                                        </td>
                                    </tr>

                                    <tr>
                                        <td><b>With Initials</b></td>
                                        <td><b>: </b><?php echo $post->l_nameWithInitials; ?></td>
                                    </tr>

                                    <tr>
                                        <td><b>Gender</b></td>
                                        <td><b>: </b><?php echo $post->l_gender; ?></td>
                                    </tr>

                                    <tr>
                                        <td><b>Date of Birth</b></td>
                                        <td><b>: </b><?php echo $post->l_dob; ?></td>
                                    </tr>

                                    <tr>
                                        <td><b>Contact No</b></td>
                                        <td><b>: </b><?php echo $post->l_contactNumber; ?></td>
                                    </tr>

                                    <tr>
                                        <td><b>Address</b></td>
                                        <td>
                                            <?php 
                                                $text = $post->l_address;
                                                $chunks = str_split($text, 20);

                                                foreach ($chunks as $key => $chunk):
                                                    echo $key === 0 ? "<b>: </b>" : ''; // Add <b>: </b> for the first chunk
                                            ?>
                                                <?= $chunk ?><br>
                                            <?php endforeach; ?>
                                        </td>
                                    </tr>

                                    <tr>
                                        <td><b>Department</b></td>
                                        <td><b>: </b><?php echo $post->l_department; ?></td>
                                    </tr>

                                    <tr>
                                        <td><b>Position Rank</b></td>
                                        <td><b>: </b><?php echo $post->l_positionRank; ?></td>
                                    </tr>

                                    <tr>
                                        <td><b>Date of Join</b></td>
                                        <td><b>: </b><?php echo $post->l_dateOfJoin; ?></td>
                                    </tr>

                                    <tr>
                                        <td><b>Qualifications</b></td>
                                        <td>
                                            <?php 
                                                $text = $post->l_qualifications;
                                                $chunks = str_split($text, 20);

                                                foreach ($chunks as $key => $chunk):
                                                    echo $key === 0 ? "<b>: </b>" : ''; // Add <b>: </b> for the first chunk
                                            ?>
                                                <?= $chunk ?><br>
                                            <?php endforeach; ?>
                                        </td>
                                    </tr>

                                    <tr>
                                        <td><b>Lecture Hours</b></td>
                                        <td><b>: </b><?php echo $post->l_lectureHrs; ?></td>  
                                    </tr>
                                        
                                </table>

                            </div>
                        

                            <div class="sidebar_body_bottom">
                                <div class="sidebar_bottom_left_part1">
                                    <p><b>Exam Supervisor</b></p>
                                    <p><b>Second Examinar</b></p>
                                </div>

                                <div class="sidebar_bottom_right_part1">
                                    <p><?php echo $post->l_isExamSupervisor ? "<b> : </b> <span style='color: green;'>&#10004;</span>" : "<b> : </b> <span style='color: red;'>&#10008;</span>"; ?></p>
                                    <p><?php echo $post->l_isSecondExaminar ? "<b> : </b> <span style='color: green;'>&#10004;</span>" : "<b> : </b> <span style='color: red;'>&#10008;</span>"; ?></p>
                                </div>

                            </div>
                        </div>
                    <?php
                    echo "</div>";
                }

            ?>

        </div>
    
        </div>

        <script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
<script src="<?php echo URLROOT;?>/js/administrator/viewLectures.js"></script>
<script>
    $(document).ready(function(){
        $(".lecture_room .view_button").click(function(){
            
            // get the index of the lecture_room div
            var index = $(".lecture_room .view_button").index(this);
            console.log(index);

            // toggle display block on index of side_item

            $(".side_item").removeClass("active");
            $(".side_item").eq(index).toggleClass("active");

        });
        

        // onclick .delete_button prevent default and confirm
        $(".delete_button").click(function(e){
            e.preventDefault();
            var c = confirm("Are you sure you want to delete this room?");
            if(c){
                // get href from parent div
                var href = $(this).parent().attr("href");
                console.log(href);
                // follow the href
                window.location.href = href;
                
            }
        });
    });
</script>




<?php require APPROOT . '/views/includes/adminFooter.php'; ?>

<!--
    Structure of the database table:

    table name: lecturers

    l_id (INT AUTO INCRIMENT)
    l_code (VARCHAR 50)
    l_email (VARCHAR 50)
    l_fullName (VARCHAR 50)
    l_nameWithInitials (VARCHAR 50)
    l_gender (CHAR)
    l_dob (DATE)
    l_contactNumber (VARCHAR 20)
    l_address (VARCHAR 255)
    l_department (VARCHAR 50)
    l_positionRank (VARCHAR 50)
    l_dateOfJoin (DATE)
    l_qualifications (TEXT)
    l_isExamSupervisor (BOOLEAN)
    l_isSecondExaminar (BOOLEAN)
    l_lectureHrs (INT)

-->
