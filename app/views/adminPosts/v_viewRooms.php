<!-- this variable is used to set the css file for this view -->
<?php $style = "viewRooms"; ?> 

<?php require APPROOT . '/views/includes/adminHeader.php'; ?>

<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

        <!-- <div class="wrapper side-panel-open"> -->
        <div class="wrapper">
        <div class="main">
            <?php
                // Count the number of rooms for each type
                $roomTypes = [];
                foreach ($data['posts'] as $post) {
                    $type = $post->type;
                    if (!isset($roomTypes[$type])) {
                        $roomTypes[$type] = 1;
                    } else {
                        $roomTypes[$type]++;
                    }
                }
                ?>
            
                <div class="top">
                <h1 class="topic">Adminitsrator / Rooms</h1>
                    <div class="centered_container">
                        <div class="room_type_counts">
                            <?php
                            // Display the count for each type
                            foreach ($roomTypes as $type => $count) {
                                echo "<div class='count_tile'>";
                                echo "<div class='count_row'>";
                                echo "<div class='count_column'><p># $type rooms:</p></div>";
                                echo "<div class='count_column'><p>$count</p></div>";
                                echo "</div>";
                                echo "</div>";
                            }
                            ?>
                        </div>
                    </div>

                    <div class="table-head">
                        <div class="search-container">
                            <input type="text" id="search" placeholder="Search by room name..." >
                            <span class="clear-icon" id="clear-search">&#10006;</span>
                        </div>

                        <div class="filter-container">
                            <label for="filter-type">Filter by Type:</label>
                            <select id="filter-type">
                                <option value="">All Types</option>
                                <?php
                                // Populate the dropdown with unique room types
                                foreach (array_keys($roomTypes) as $type) {
                                    echo "<option value=\"$type\">$type</option>";
                                }
                                ?>
                            </select>
                        </div>

                        <div class="create_room_button">
                            <a href="<?php echo URLROOT;?>/AdminPosts/createRoom">
                                <button class="create_button">Add Room</button>
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

                <div class="title_bar">
                    <p style="padding-left: 25px;" class="title_item"><b>Name</b></p>
                    <p class="title_item"><b>ID</b></p>
                    <p class="title_item"><b>Type</b></p>
                    <p style="padding-right: 210px;" class="title_item"><b>Capacity</b></p>
                </div> 
            
            </div>
            
            <div class="list">
            <?php 
            //counter variable for row numbers
            $i = 1;
            foreach($data['posts'] as $post) : ?>

                <div class="lecture_room" data-room-name="<?php echo $post->name; ?>" data-room-type="<?php echo $post->type; ?>">

                    <!-- Idle view -->
                    <div class="idle-view">
                            <div class="lecture_room_header">
                                <p class="row_num"><?php echo $i++; ?></p>
                                <h3 class="header_title"><?php echo $post->name; ?></h3>
                                <p class="header_item"><?php echo $post->id; ?></p>
                                <p class="header_item"><?php echo $post->type; ?></p>
                                <p class="header_item"><?php echo $post->capacity; ?></p>
                                <!-- <p class="header_item"><b>Availability:</b> <?php echo $post->current_availability; ?></p> -->
                                
                                <div class="action_buttons">
                                    <!-- <button class="view_button">View</button>
                                    <a href="<?php echo URLROOT; ?>/AdminPosts/updateRoom/<?php echo $post->id ?>"><button class="update_button">Update</button></a>
                                    <a href="<?php echo URLROOT; ?>/AdminPosts/deleteRoom/<?php echo $post->id ?>"><button class="delete_button">Delete</button></a> -->

                                    <button class="view_button" title="View More">
                                        <img src="<?php echo URLROOT;?>/images/view_icon.svg" alt="View Icon" class="view_icon">
                                    </button>
                                    
                                    <a href="<?php echo URLROOT; ?>/AdminPosts/updateRoom/<?php echo $post->id ?>" title="Edit Details">
                                        <button class="update_button">
                                            <img src="<?php echo URLROOT;?>/images/update_icon.svg" alt="Update Icon" class="update_icon">
                                        </button>
                                    </a>
                                    
                                    <a href="<?php echo URLROOT; ?>/AdminPosts/deleteRoom/<?php echo $post->id ?>" title="Delete">
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
                             $test[] = $post->name;
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
                            <h3 class="header_text"><?php echo $post->name; ?></h3>
                        
                        </div>
                        
                        <div class="sidebar_body">
                            <div class="sidebar_body_top">
                                <div class="sidebar_top_left">
                                    <p><b>ID / Code</b></p> 
                                    <p><b>Type</b></p>
                                    <p><b>Capacity</b></p>
                                    <p><b>Availability</b></p> 
                                    <p><b>No of Tables</b></p> 
                                    <p><b>No of Chairs</b></p> 
                                    <p><b>No of Boards</b></p> 
                                    <p><b>No of Projectors</b></p>
                                    <p><b>No of Computers</b></p>
                                </div>

                                <div class="sidebar_top_right">
                                    <p> <b> : </b> <?php echo $post->id; ?></p>
                                    <p> <b> : </b> <?php echo $post->type; ?></p>
                                    <p> <b> : </b> <?php echo $post->capacity; ?></p>
                                    <p> <b> : </b> <?php echo $post->current_availability; ?></p>
                                    <p> <b> : </b> <?php echo $post->no_of_tables; ?></p>
                                    <p> <b> : </b> <?php echo $post->no_of_chairs; ?></p>
                                    <p> <b> : </b> <?php echo $post->no_of_boards; ?></p>
                                    <p> <b> : </b> <?php echo $post->no_of_projectors; ?></p>
                                    <p> <b> : </b> <?php echo $post->no_of_computers; ?></p>
                                </div>
                            </div>
                        

                            <div class="sidebar_body_bottom">
                                <div class="sidebar_bottom_left_part1">
                                    <p><b>AC</b></p>
                                    <p><b>Wifi</b></p>
                                    <p><b>Media</b></p>
                                    <p><b>Lecture</b></p>
                                    <p><b>Lab</b></p>
                                </div>

                                <div class="sidebar_bottom_right_part1">
                                    <p><?php echo $post->is_ac ? "<b> : </b> <span style='color: green;'>&#10004;</span>" : "<b> : </b> <span style='color: red;'>&#10008;</span>"; ?></p>
                                    <p><?php echo $post->is_wifi ? "<b> : </b> <span style='color: green;'>&#10004;</span>" : "<b> : </b> <span style='color: red;'>&#10008;</span>"; ?></p>
                                    <p><?php echo $post->is_media ? "<b> : </b> <span style='color: green;'>&#10004;</span>" : "<b> : </b> <span style='color: red;'>&#10008;</span>"; ?></p>
                                    <p><?php echo $post->is_lecture ? "<b> : </b> <span style='color: green;'>&#10004;</span>" : "<b> : </b> <span style='color: red;'>&#10008;</span>"; ?></p>
                                    <p><?php echo $post->is_lab ? "<b> : </b> <span style='color: green;'>&#10004;</span>" : "<b> : </b> <span style='color: red;'>&#10008;</span>"; ?></p>
                                </div>

                                <div class="sidebar_bottom_left_part2">
                                    <p><b>Tutorial</b></p>
                                    <p><b>Meeting</b></p>
                                    <p><b>Seminar</b></p>
                                    <p><b>Exam</b></p>
                                </div>

                                <div class="sidebar_bottom_right_part2">
                                    <p><?php echo $post->is_tutorial ? "<b> : </b> <span style='color: green;'>&#10004;</span>" : "<b> : </b> <span style='color: red;'>&#10008;</span>"; ?></p>
                                    <p><?php echo $post->is_meeting ? "<b> : </b> <span style='color: green;'>&#10004;</span>" : "<b> : </b> <span style='color: red;'>&#10008;</span>"; ?></p>
                                    <p><?php echo $post->is_seminar ? "<b> : </b> <span style='color: green;'>&#10004;</span>" : "<b> : </b> <span style='color: red;'>&#10008;</span>"; ?></p>
                                    <p><?php echo $post->is_exam ? "<b> : </b> <span style='color: green;'>&#10004;</span>" : "<b> : </b> <span style='color: red;'>&#10008;</span>"; ?></p>
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
<script src="<?php echo URLROOT;?>/js/administrator/viewRooms.js"></script>
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