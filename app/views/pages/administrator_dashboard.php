<?php $style = "administrator_dashboard"; ?>

<?php require APPROOT . '/views/includes/adminHeader.php'; ?>

<h1>Aministrator Dashboard </h1>

<div class="add_user_btn">
    <a href="<?php echo URLROOT;?>/AdminPosts/addUser">
        <button class="add_user">Add User</button>
    </a>
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


<a href="<?php echo URLROOT;?>/AdminPosts/viewUsers">
    <button class="add_user">Refresh</button>
</a>


<?php require APPROOT . '/views/includes/adminFooter.php'; ?>
