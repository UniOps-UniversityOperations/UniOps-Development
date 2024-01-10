<!-- this variable is used to set the css file for this view -->
<?php $style = "viewAssets"; ?> 

<?php require APPROOT . '/views/includes/adminHeader.php'; ?>

<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

        <!-- <div class="wrapper side-panel-open"> -->
        <div class="wrapper">
        <div class="main">
            <h1 class="topic">Adminitsrator / Database</h1>

            <?php
                // Count the number of rooms for each type
                $Types = [];
                foreach ($data['posts'] as $post) {
                    $type = $post->a_type;
                    if (!isset($Types[$type])) {
                        $Types[$type] = 1;
                    } else {
                        $Types[$type]++;
                    }
                }
                ?>

                <div class="centered_container">
                    <div class="room_type_counts">
                        <?php
                        // Display the count for each type
                        foreach ($Types as $type => $count) {
                            echo "<div class='count_tile'>";
                            echo "<div class='count_row'>";
                            echo "<div class='count_column'><p>Number of \"$type" . "s\":</p></div>";
                            echo "<div class='count_column'><p>$count</p></div>";
                            echo "</div>";
                            echo "</div>";
                        }
                        ?>
                    </div>
                </div>

                <div class="table-head">
                    <div class="search-container">
                        <input type="text" id="search" placeholder="Search by asset code..." >
                        <span class="clear-icon" id="clear-search">&#10006;</span>
                    </div>

                    <div class="filter-container">
                        <label for="filter-type">Filter by Type:</label>
                        <select id="filter-type">
                            <option value="">All Types</option>
                            <?php
                            // Populate the dropdown with unique room types
                            foreach (array_keys($Types) as $type) {
                                echo "<option value=\"$type\">$type</option>";
                            }
                            ?>
                        </select>
                    </div>

                    <div class="create_room_button">
                        <a href="<?php echo URLROOT;?>/AdminPosts/createAsset">
                            <button class="create_button">Create Asset</button>
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

                <div class="lecture_room" data-room-name="<?php echo $post->a_code; ?>" data-room-type="<?php echo $post->a_type; ?>">

                    <!-- Idle view -->
                    <div class="idle-view">
                            <div class="lecture_room_header">
                                <h3 class="header_title"><?php echo $post->a_code; ?></h3>
                                <p class="header_item"><b>Type: </b><?php echo $post->a_type; ?></p>
                                <p class="header_item"><b>Added Date: </b><?php echo $post->a_addedDate; ?></p>
                                <p class="header_item"><b>Is In Use: </b><?php echo $post->a_isInUse ? "Yes" : "No"; ?></p>
                                
                                <div class="action_buttons">
                    
                                    
                                    <a href="<?php echo URLROOT; ?>/AdminPosts/updateAsset/<?php echo $post->a_id ?>">
                                        <button class="update_button">
                                            <img src="<?php echo URLROOT;?>/images/update_icon.svg" alt="Update Icon" class="update_icon">

                                        </button>
                                    </a>
                                    
                                    <a href="<?php echo URLROOT; ?>/AdminPosts/deleteAsset/<?php echo $post->a_id ?>">
                                        <button class="delete_button">
                                            <img src="<?php echo URLROOT;?>/images/delete_icon.svg" alt="Delete Icon" class="delete_icon">
                                        </button>
                                    </a>


                                </div>
                            </div>  
                    </div>                    
                    
                </div>
                
            <?php endforeach; ?>


        </div>

        

    
        </div>

        <script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
<script src="<?php echo URLROOT;?>/js/administrator/viewRooms.js"></script>
<script>
    $(document).ready(function(){        

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




<!-- the structure of the assets table

            a_id
            a_code
            a_type
            a_addedDate
            a_isInUse
            a_isDeleted -->