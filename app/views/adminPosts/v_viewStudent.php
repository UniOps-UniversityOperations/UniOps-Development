<!-- this variable is used to set the css file for this view -->
<?php $style = "viewStudent"; ?>

<?php require APPROOT . '/views/includes/adminHeader.php'; ?>

<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
<!-- <i class="material-icons">language</i> --> 

        <!-- <div class="wrapper side-panel-open"> -->
        <div class="wrapper">
        <div class="main">

            <!-- Have to look this later *************************************************************************************************************-->
            <?php
                // Count the number of Students
                $count = 0;
                foreach ($data['posts'] as $post) {
                    $count++;
                }
            ?>


            <?php
                // Count the number of rooms for each year
                $roomYears = [];
                foreach ($data['posts'] as $post) {
                    $year = $post->s_year;
                    if (!isset($roomYears[$year])) {
                        $roomYears[$year] = 1;
                    } else {
                        $roomYears[$year]++;
                    }
                }
            ?>

                
                <div class="top">
                <h1 class="topic">Administrator / Students</h1>
                <div class="centered_container">
                    <div class="room_type_counts">
                        <?php
                        // Display the count for each type
                            echo "<div class='count_tile'>";
                            echo "<div class='count_row'>";
                            echo "<div class='count_column'><p>Number of Students:</p></div>";
                            echo "<div class='count_column'><p>$count</p></div>";
                            echo "</div>";
                            echo "</div>"
                        ?>

                    </div>
                </div>

                <div class="table-head">
                    <div class="search-container">
                        <input type="text" id="search" placeholder="Search by Student name..." >
                        <span class="clear-icon" id="clear-search">&#10006;</span>
                    </div>

                    <div class="filter-container">
                        <label for="filter-type">Filter by year:</label>
                        <select id="filter-type">
                            <option value="">All years</option>
                            <?php
                            // Populate the dropdown with unique room types
                            foreach (array_keys($roomYears) as $year) {
                                echo "<option value=\"$year\">$year</option>";
                            }
                            ?>
                        </select>
                    </div>

                   <div class="create_room_button">
                        <a href="<?php echo URLROOT;?>/AdminPosts/createStudent">
                            <button class="create_button">Create Student</button>
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
                    <p style="padding-left: 25px;" class="title_item"><b>Name</b></p>
                    <p class="title_item"><b>Email</b></p>
                    <p class="title_item"><b>Index</b></p>
                    <p class="title_item"><b>Year</b></p>
                    <p style="padding-right: 240px;" class="title_item"><b>Stream</b></p>
                </div> 
            </div>
            <?php $test = $stu_room = []; ?>

            <div class="list">
            <?php 
            $i = 1;
            foreach($data['posts'] as $post) : ?>

                <div class="student_room" data-room-name="<?php echo $post->s_fullNam; ?>" data-room-type="<?php echo $post->s_year; ?>">

                    <!-- Idle view -->
                    <div class="idle-view">
                            <div class="student_room_header">
                                <h3 class="header_title"><?php echo $post->s_nameWithInitial; ?></h3>
                                <p class="header_item"><b></b> <?php echo $post->s_email; ?></p>
                                <p class="header_item"><b></b> <?php echo $post->s_indexNumber; ?></p>
                                <p class="header_item"><b></b> <?php echo $post->s_year; ?></p>
                                <p class="header_item"><b></b> <?php echo $post->s_stream; ?></p>
                                
                                <div class="action_buttons">

                                    <button class="view_button">
                                        <img src="<?php echo URLROOT;?>/images/view_icon.svg" alt="View Icon" title="view" class="view_icon">
                                    </button>
                                    
                                    <a href="<?php echo URLROOT; ?>/AdminPosts/updateStudent/<?php echo $post->s_id ?>">
                                        <button class="update_button">
                                            <img src="<?php echo URLROOT;?>/images/update_icon.svg" alt="Update Icon" title="update" class="update_icon">

                                        </button>
                                    </a>
                                    
                                    <a href="<?php echo URLROOT; ?>/AdminPosts/deleteStudent/<?php echo $post->s_id ?>">
                                        <button class="delete_button">
                                            <img src="<?php echo URLROOT;?>/images/delete_icon.svg" alt="Delete Icon" title="delete" class="delete_icon">
                                        </button>
                                    </a>

                                </div>
                            </div>  
                    </div>
                    
                    <!-- Detailed view -->

                            <?php
                            $test[] = $post->s_code;
                             $stu_room[] = $post;
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

                foreach ($stu_room as $post) {
                    echo "<div class='side_item'>";
                    ?>

                        <div class="sidebar_header">
                            <h3 class="header_text"><?php echo $post->s_nameWithInitial; ?></h3>
                        
                        </div>
                        
                        <div class="sidebar_body">
                            <div class="sidebar_body_top">

                                <table class="sidebar_table">

                                    <tr>
                                        <td><b>Email</b></td>
                                        <td>
                                            <?php 
                                                $text = $post->s_email;
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
                                                $text = $post->s_fullName;
                                                $chunks = str_split($text, 20);

                                                foreach ($chunks as $key => $chunk):
                                                    echo $key === 0 ? "<b>: </b>" : ''; // Add <b>: </b> for the first chunk
                                            ?>
                                                <?= $chunk ?><br>
                                            <?php endforeach; ?>
                                        </td>
                                    </tr>

                                    <tr>
                                        <td><b>Index Number</b></td>
                                        <td><b>: </b><?php echo $post->s_indexNumber ; ?></td>
                                    </tr>

                                    <tr>
                                        <td><b>With Initials</b></td>
                                        <td><b>: </b><?php echo $post->s_nameWithInitial ; ?></td>
                                    </tr>

                                    <tr>
                                        <td><b>Registration Number</b></td>
                                        <td><b>: </b><?php echo $post->s_regNumber; ?></td>
                                    </tr>

                                    <tr>
                                        <td><b>Date of Birth</b></td>
                                        <td><b>: </b><?php echo $post->s_dob; ?></td>
                                    </tr>

                                    <tr>
                                        <td><b>Contact No</b></td>
                                        <td><b>: </b><?php echo $post->s_contactNumber; ?></td>
                                    </tr>

                                    <tr>
                                        <td><b>Stream</b></td>
                                        <td>
                                            <?php 
                                                $text = $post->s_stream;
                                                $chunks = str_split($text, 20);

                                                foreach ($chunks as $key => $chunk):
                                                    echo $key === 0 ? "<b>: </b>" : ''; // Add <b>: </b> for the first chunk
                                            ?>
                                                <?= $chunk ?><br>
                                            <?php endforeach; ?>
                                        </td>
                                    </tr>

                                    <tr>
                                        <td><b>Year</b></td>
                                        <td><b>: </b><?php echo $post->s_year; ?></td>
                                    </tr>
                                        
                                </table>

                            </div>
                        
<!-- 
                            <div class="sidebar_body_bottom">
                                <div class="sidebar_bottom_left_part1">
                                    <p><b>IsDeleted</b></p>
                                </div> -->

                            <!-- </div> -->
                        </div>
                    <?php
                    echo "</div>";
                }

            ?>

        </div>
    
        </div>
        

        <script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
<script src="<?php echo URLROOT;?>/js/administrator/viewStudent.js"></script>
<script>
    $(document).ready(function(){
        $(".student_room .view_button").click(function(){
            
            // get the index of the student_room div
            var index = $(".student_room .view_button").index(this);
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
