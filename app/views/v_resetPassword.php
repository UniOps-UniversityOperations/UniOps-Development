<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>resetPassword</title>
    <link rel="stylesheet" href="<?php echo URLROOT;?>/css/login.css">

    <style>
        .hidden { display: none; }
        .visible { display: block; }
    </style>


</head>
<body>

    <div class="left-section">

        <img src="<?php echo URLROOT;?>/images/loginimg.svg" class="login-img" alt="login Image">

    </div>

    <div class="right-section">

        <h1>Reset Password</h1>

        <form action="<?php echo URLROOT; ?>/Users/resetPassword" method="post">
            
        <label for="email">Enter Your email(User Name) </label>
        <input type="text" id="email" name="email" required>

        <button type="submit" name="resetrequest">Reset Password</button>

        </form>        
 
        <?php
            $Successmessageclass = ($data == 'success') ? 'visible' : 'hidden';
            $Failedmessageclass = ($data == 'Email not send. Please try again') ? 'visible' : 'hidden';
        ?>

        <div id="SuccessMessage" class="<?php echo $Successmessageclass; ?>">Reset Password Email was sent Successfully. Check you Emails</div>
        <div id="FailedMessage" class="<?php echo $Failedmessageclass; ?>">Failed to send reset email. Try Again.</div>

    </div>

</body>
</html>

