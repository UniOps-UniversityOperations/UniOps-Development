<?php $style = "administrator_dashboard"; ?>

<?php require APPROOT . '/views/includes/adminHeader.php'; ?>

<h1>Aministrator Dashboard </h1>

<div class="add_user_btn">
    <a href="<?php echo URLROOT;?>/AdminPosts/addUser">
        <button class="add_user">Add User</button>
    </a>
</div>

<?php require APPROOT . '/views/includes/adminFooter.php'; ?>
