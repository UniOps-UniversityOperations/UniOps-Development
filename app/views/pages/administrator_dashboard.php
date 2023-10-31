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
                    <td><?php echo $user->role; ?></td>
                </tr>    
            <?php else : ?>
                <tr class="active-row">
                    <td><?php echo $user->user_id; ?></td>
                    <td><?php echo $user->username; ?></td>
                    <td><?php echo $user->password; ?></td>
                    <td><?php echo $user->role; ?></td>
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
