<?php $style = "administrator_dashboard"; ?>

<?php require APPROOT . '/views/includes/adminHeader.php'; ?>

<h1>Aministrator Dashboard </h1>

<div class="add_user_btn">
    <a href="<?php echo URLROOT;?>/AdminPosts/addUser">
        <button class="add_user">Add User</button>
    </a>
</div>


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

        <!--Table of Users-->
        <div>
            <table class="styled-table">
                <thead>
                    <tr>
                        <th>user_id</th>
                        <th>username</th>
                        <th>password</th>
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
                            <td><?php echo $user->password; ?></td>
                            <td><?php switch($user->role){
                                case 1:
                                    echo "Administrator(1)";
                                    break;
                                case 2:
                                    echo "Lecturer(2)";
                                    break;
                                case 3:
                                    echo "Instructor(3)";
                                    break;
                                case 4:
                                    echo "Student(4)";
                                    break;
                                default:
                                    echo "User";
                                    break;
                            } 
                            ?></td>
                            <td class="link">
                            <a href="<?php echo URLROOT;?>/AdminPosts/updateUser/<?php echo $user->user_id; ?>">
                                <button class="update_button">UPDATE</button>
                            </a>
                            </td>
                            <td class="link">
                            <a href="<?php echo URLROOT;?>/AdminPosts/deleteUser/<?php echo $user->user_id; ?>">
                                <button class="delete_button">DELETE</button>
                            </a>
                            </td>
                        </tr>    
                    <?php else : ?>
                        <tr class="active-row">
                            <td><?php echo $user->user_id; ?></td>
                            <td><?php echo $user->username; ?></td>
                            <td><?php echo $user->password; ?></td>
                            <td><?php switch($user->role){
                                case 1:
                                    echo "Administrator(1)";
                                    break;
                                case 2:
                                    echo "Lecturer(2)";
                                    break;
                                case 3:
                                    echo "Instructor(3)";
                                    break;
                                case 4:
                                    echo "Student(4)";
                                    break;
                                default:
                                    echo "User";
                                    break;
                            } 
                            ?></td>
                            <td class="link">
                            <a href="<?php echo URLROOT;?>/AdminPosts/updateUser/<?php echo $user->user_id; ?>">
                                <button class="update_button">UPDATE</button>
                            </a>
                            </td>
                            <td class="link">
                            <a href="<?php echo URLROOT;?>/AdminPosts/deleteUser/<?php echo $user->user_id; ?>">
                                <button class="delete_button">DELETE</button>
                            </a>
                            </td>
                        </tr>
                    <?php endif; ?>
                    <?php $i++; ?>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>

    <div class="column">
        <p> This is the column for the right side of the page. </p>
    </div>
</div>



<a href="<?php echo URLROOT;?>/AdminPosts/viewUsers">
    <button class="add_user">Refresh</button>
</a>


<?php require APPROOT . '/views/includes/adminFooter.php'; ?>
