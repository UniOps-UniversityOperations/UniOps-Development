<?php $style = "administrator_dashboard"; ?>

<?php require APPROOT . '/views/includes/adminHeader.php'; ?>

<h1>Aministrator Dashboard </h1>


<div class="container">
    <div class="column">
        <div class="welccome_block">
        <!-- Welcome to UniOps  and display username-->
            <div class="welcome_text">
                <h2 style='padding : 10px'>Welcome to UniOps ! </h2>
                <h3 style='padding-bottom : 10px; padding-left : 10px;'>Username - <?php echo $_SESSION['username']; ?></h3>
            </div>

            <div class='welcome_image'>
                <img src="<?php echo URLROOT;?>/images/welcome_image.svg" alt="welcome image">
            </div>

        </div>

        <div class="centered_container">
            <div class="room_type_counts">
                <div class='count_tile'>
                    <p># Rooms </p> 
                    <p><?php echo $data['r_count']->count; ?></p>
                    </p>
                </div>
                <div class='count_tile'>
                    <p># Subjects </p> 
                    <p><?php echo $data['s_count']->count; ?></p>
                    </p>
                </div>
                <div class='count_tile'>
                    <p># Lecturers </p> 
                    <p><?php echo $data['l_count']->count; ?></p>
                    </p>
                </div>
                <div class='count_tile'>
                    <p># Instructors </p> 
                    <p><?php echo $data['i_count']->count; ?></p>
                    </p>
                </div>
                <div class='count_tile'>
                    <p># Students </p> 
                    <p>-database-</p>
                    </p>
                </div>
                <div class='count_tile'>
                    <p># Assets </p> 
                    <p><?php echo $data['a_count']->count; ?></p>
                    </p>
                </div>
            </div>
        </div>

        
        <div class="inner_container">
            <!--Table of Users-->
            <div class='inner_column'>

                <div class='uses_top_bar'>
                    <h3 style='padding-bottom:10px;'>Users</h3>

                    <div class="filters filter-container">
                        <label for="streamFilter">Stream:</label>
                        <select id="streamFilter">
                            <option value="">All</option>
                            <option value="1">1</option>
                            <option value="2">2</option>
                            <option value="3">3</option>
                            <option value="4">4</option>
                            <?php foreach ($data['streams'] as $stream) : ?>
                                <option value="<?php echo $stream; ?>"><?php echo $stream; ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                    
                </div>

                <div class="table-wrapper">
                    <table class="styled-table">
                        <thead>
                            <tr>
                                <th>user_id</th>
                                <th>username</th>
                                <th>pwd</th>
                                <th>role</th>
                                <th></th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>        
                            <?php
                                $i = 0;
                            foreach($data['posts'] as $user) : ?>

                            <?php if($i % 2 == 0) : ?>
                                <tr>
                                    <td><?php echo $user->user_id; ?></td>
                                    <td><?php echo $user->username; ?></td>
                                    <td><?php echo $user->pwd; ?></td>
                                    <td><?php switch($user->role){
                                        case 1:
                                            echo 1;
                                            break;
                                        case 2:
                                            echo 2;
                                            break;
                                        case 3:
                                            echo 3;
                                            break;
                                        case 4:
                                            echo 3;
                                            break;
                                        default:
                                            echo "User";
                                            break;
                                    } 
                                    ?></td>
                                    <td class="link">
                                    <a href="<?php echo URLROOT;?>/AdminPosts/updateUser/<?php echo $user->user_id; ?>">
                                        <button class="update_button">
                                            <img src="<?php echo URLROOT;?>/images/update_icon.svg" alt="Update Icon" class="update_icon">
                                        </button>
                                    </a>
                                    </td>
                                    <td class="link">
                                    <a href="<?php echo URLROOT;?>/AdminPosts/deleteUser/<?php echo $user->user_id; ?>">
                                        <button class="delete_button">
                                            <img src="<?php echo URLROOT;?>/images/delete_icon.svg" alt="Delete Icon" class="delete_icon">
                                        </button>
                                    </a>
                                    </td>

                                </tr>    
                            <?php else : ?>
                                <tr class="active-row">
                                    <td><?php echo $user->user_id; ?></td>
                                    <td><?php echo $user->username; ?></td>
                                    <td><?php echo $user->pwd; ?></td>
                                    <td><?php switch($user->role){
                                        case 1:
                                            echo 1;
                                            break;
                                        case 2:
                                            echo 2;
                                            break;
                                        case 3:
                                            echo 3;
                                            break;
                                        case 4:
                                            echo 3;
                                            break;
                                        default:
                                            echo "User";
                                            break;
                                    } 
                                    ?></td>
                                    <td class="link">
                                    <a href="<?php echo URLROOT;?>/AdminPosts/updateUser/<?php echo $user->user_id; ?>">
                                        <button class="update_button">
                                            <img src="<?php echo URLROOT;?>/images/update_icon.svg" alt="Update Icon" class="update_icon">
                                        </button>
                                    </a>
                                    </td>
                                    <td class="link">
                                    <a href="<?php echo URLROOT;?>/AdminPosts/deleteUser/<?php echo $user->user_id; ?>">
                                        <button class="delete_button">
                                            <img src="<?php echo URLROOT;?>/images/delete_icon.svg" alt="Delete Icon" class="delete_icon">
                                        </button>
                                    </a>
                                    </td>
                                </tr>
                            <?php endif; ?>
                            <?php $i++; ?>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>

                <button class="add_user"><a href="<?php echo URLROOT;?>/AdminPosts/addUser">Add User</a></button>
                
                <button class="add_user"><a href="<?php echo URLROOT;?>/AdminPosts/showDashboard">Refresh</a></button>
                

            </div>

            <div class='inner_column'>
                <h3 style='padding-bottom:10px;'>Variables</h3>
                    
                <table class="styled-table">
                    <thead>
                        <tr>
                            <th>var name</th>
                            <th>var value</th>
                        </tr>
                    </thead>
                    <tbody>        
                        <?php
                        foreach($data['vars'] as $var) : ?>

                        
                            <tr>
                                <td><?php echo $var->v_name; ?></td>
                                <td><?php echo $var->v_value; ?></td>
                            </tr>    
                        
                        <?php endforeach; ?>
                    </tbody>
                </table>

            </div>

        </div>
    </div>

    <div class="column">
        <p> This is the column for the right side of the page. </p>
    </div>
</div>


<script src="<?php echo URLROOT;?>/js/administrator/administrator_dashboard.js"></script>

<?php require APPROOT . '/views/includes/adminFooter.php'; ?>
