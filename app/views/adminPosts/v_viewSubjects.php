<?php $style = "viewSubjects"; ?> 


<?php require APPROOT . '/views/includes/adminHeader.php'; ?>

<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

        <!-- <div class="wrapper side-panel-open"> -->
        <div class="wrapper">
        <div class="main">
            <h1 class="topic">Adminitsrator / Subjects</h1>

            <?php
                // Count the number of rooms for each year
                $roomYears = [];
                foreach ($data['posts'] as $post) {
                    $year = $post->sub_year;
                    if (!isset($roomYears[$year])) {
                        $roomYears[$year] = 1;
                    } else {
                        $roomYears[$year]++;
                    }
                }
            ?>

                <div class="centered_container">
                    <div class="room_type_counts">
                        <?php
                        // Display the count for each type
                        foreach ($roomYears as $year => $count) {
                            echo "<div class='count_tile'>";
                            echo "<div class='count_row'>";
                            echo "<div class='count_column'><p>Number of \"year $year subjects\":</p></div>";
                            echo "<div class='count_column'><p>$count</p></div>";
                            echo "</div>";
                            echo "</div>";
                        }
                        ?>
                    </div>
                </div>

                <div class="table-head">
                    <div class="search-container">
                        <input type="text" id="search" placeholder="Search by subject name..." >
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
                        <a href="<?php echo URLROOT;?>/AdminPosts/createSubject">
                            <button class="create_button">Create subject</button>
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


            <?php $test = $lec_room = []; ?>

            <?php foreach($data['posts'] as $post) : ?>

                <div class="lecture_room" data-room-name="<?php echo $post->sub_name; ?>" data-room-type="<?php echo $post->sub_year; ?>">

                    <!-- Idle view -->
                    <div class="idle-view">
                            <div class="lecture_room_header">
                                <h3 class="header_title"><?php echo $post->sub_code; ?></h3>
                                <p class="header_item"><b>Name:</b> <?php echo $post->sub_name; ?></p>
                                <p class="header_item"><b>Stream:</b> <?php echo $post->sub_stream; ?></p>
                                <p class="header_item"><b>Year:</b> <?php echo $post->sub_year; ?></p>
                                <p class="header_item"><b>Credits:</b> <?php echo $post->sub_credits; ?></p>
                                
                                <div class="action_buttons">

                                    <button class="view_button">
                                        <img src="<?php echo URLROOT;?>/images/view_icon.svg" alt="View Icon" class="view_icon">
                                    </button>
                                    
                                    <a href="<?php echo URLROOT; ?>/AdminPosts/updateSubject/<?php echo $post->sub_id ?>">
                                        <button class="update_button">
                                            <img src="<?php echo URLROOT;?>/images/update_icon.svg" alt="Update Icon" class="update_icon">

                                        </button>
                                    </a>
                                    
                                    <a href="<?php echo URLROOT; ?>/AdminPosts/deleteSubject/<?php echo $post->sub_id ?>">
                                        <button class="delete_button">
                                            <img src="<?php echo URLROOT;?>/images/delete_icon.svg" alt="Delete Icon" class="delete_icon">
                                        </button>
                                    </a>


                                </div>
                            </div>  
                    </div>
                    
                    <!-- Detailed view -->

                            <?php
                            // $test.push($post->name);
                             $test[] = $post->sub_name;
                             $lec_room[] = $post;
                            ?>
                    
                    
                </div>
                
            <?php endforeach; ?>


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
                            <h3 class="header_text"><?php echo $post->sub_name; ?></h3>
                        
                        </div>
                        
                        <div class="sidebar_body">
                            <div class="sidebar_body_top">
                                <div class="sidebar_top_left">
                                    <p><b>Subject Code</b></p>
                                    <p><b>Subject Name</b></p>
                                    <p><b>Number of Credits</b></p>
                                    <p><b>Year</b></p>
                                    <p><b>Semester</b></p>
                                    <p><b>Stream</b></p>
                                </div>

                                <div class="sidebar_top_right">
                                    <p> <b> : </b> <?php echo $post->sub_code; ?></p>
                                    <p> <b> : </b> <?php echo $post->sub_name; ?></p>
                                    <p> <b> : </b> <?php echo $post->sub_credits; ?></p>
                                    <p> <b> : </b> <?php echo $post->sub_year; ?></p>
                                    <p> <b> : </b> <?php echo $post->sub_semester; ?></p>
                                    <p> <b> : </b> <?php echo $post->sub_stream; ?></p>
                                </div>
                            </div>
                        

                            <div class="sidebar_body_bottom">
                                <div class="sidebar_bottom_left_part1">
                                    <p><b>Is Core</b></p>
                                    <p><b>Is Has Lecture</b></p>
                                    <p><b>Is Has Tutorial</b></p>
                                    <p><b>Is Has Practical</b></p>
                                </div>

                                <div class="sidebar_bottom_right_part1">
                                    <p><?php echo $post->sub_isCore ? "<b> : </b> Yes" : "<b> : </b> No"; ?></p>
                                    <p><?php echo $post->sub_isHaveLecture ? "<b> : </b> Yes" : "<b> : </b> No"; ?></p>
                                    <p><?php echo $post->sub_isHaveTutorial ? "<b> : </b> Yes" : "<b> : </b> No"; ?></p>
                                    <p><?php echo $post->sub_isHavePractical ? "<b> : </b> Yes" : "<b> : </b> No"; ?></p>
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
<script src="<?php echo URLROOT;?>/js/administrator/viewSubjects.js"></script>
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



<!-- Structure of the database table:
        sub_id
        sub_code
        sub_name
        sub_credits
        sub_year
        sub_semester
        sub_stream
        sub_isCore
        sub_isHaveLecture
        sub_isHaveTutorial
        sub_isHavePractical
        sub_isDeleted -->