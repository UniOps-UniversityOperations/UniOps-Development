<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="<?php echo URLROOT;?>/css/login.css">
</head>
<body>

    <div class="left-section">

        <img src="<?php echo URLROOT;?>/images/loginimg.svg" class="login-img" alt="login Image">

    </div>

    <div class="right-section">

        <h1>Sign In</h1>

        <form action="<?php echo URLROOT; ?>/Users/login" method="post">
            
        <label for="username">User Name </label>
        <input type="text" id="username" name="user_id" required>

        <label for="password">Password</label>
        <input type="password" id="password" name="password" required>

        <button type="submit">Login</button>

        </form>

        <?php
            if($data['Error']){
                echo "<p id='Errormsg'>User Name or Password Incorrect</p>";
           }
            
        ?>

    </div>

</body>
</html>

