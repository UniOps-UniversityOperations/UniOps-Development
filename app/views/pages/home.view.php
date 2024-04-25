<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>UniOps</title>

    <!-- Styles -->
    <style>
        <?php include 'D:\xampp\htdocs\URMS\public\assets\css\main.css'; ?>
        <?php include 'D:\xampp\htdocs\URMS\public\assets\css\home.css'; ?>
        <?php include 'D:\xampp\htdocs\URMS\public\assets\css\components.css'; ?>
    </style>

</head>
<body>

    <div class="main-home">
        <div class="content">
            <div class="title">
                <h1>Welcome to</h1>
                <img src="<?=ROOT?>/images/Logo_blue.svg" alt="">
            </div>
            <div class="buttons-container">
                <div class="outline">
                    <button class="fill-inside"><a href="users/login">Log In</a></button>
                </div>
                <!-- <div class="outline">
                    <button class="outline-inside"><a href="signup">Sign Up</a></button>
                </div> -->
            </div>
        </div>
        <div class="image-container">
            <?php include 'D:\xampp\htdocs\URMS\app\views\includes\components\image.view.php'; ?>
        </div>
    </div>

</body>
</html>

