<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>resetPassword</title>
    <link rel="stylesheet" href="<?php echo URLROOT;?>/css/login.css">
</head>
<body>

    <?php

    // Get the current URL path
    $urlPath = $_SERVER['REQUEST_URI'];

    // Split the path into segments
    $pathSegments = explode('/', trim($urlPath, '/'));

    // Get the last element(Token)
    $validator = end($pathSegments);
   

    // Get the element before the last element(selector)
    $selector = prev($pathSegments);
 

    ?>

    

    <?php 

    if(ctype_xdigit($validator) && ctype_xdigit($selector)) {
    ?>
        <div class="left-section">

        <img src="<?php echo URLROOT;?>/images/loginimg.svg" class="login-img" alt="login Image">

        </div>

        <div class="right-section">

        <h1>Reset Your Password</h1>

        <form action="<?php echo URLROOT; ?>/Users/resetpasswordsubmit" method="post">
            
        <input type="hidden" name='selector' value = "<?php echo $selector ;?>">
        <input type="hidden" name='validator' value = "<?php echo $validator ;?>">
        <input type="password" name="pwd" placeholder="Enter a New Password...." required>
        <input type="password" name="pwd-repeat" placeholder="Repeat New Password...." required>
        <button type="submit" name="reset-password-submit">Reset Password</button>

        </form>        

        </div>
    
    <?php

    } else {
        die("Couldn't validate your request.");
    }

    ?>



</body>
</html>

