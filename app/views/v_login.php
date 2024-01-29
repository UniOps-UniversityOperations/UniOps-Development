<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>UniOps Login</title>
    <link rel="stylesheet" type="text/css" href="<?php echo URLROOT;?>/css/login.css">
</head>
<body>
    

    <div class="body"></div>
		
		<div class="container">
            <div class="logo">  <!--TEh ccheck boxes-->
                <img src="<?php echo URLROOT;?>/images/UniOps_logo.png" alt="UniOps" width="400px" height="auto">>
        </div>
		</div>
		<br>
		<div class="login">
                <h1>Login</h1>
				
				

            <form action="" method="post">
                <input type="text" placeholder="Username" name="user_id" <?php echo $data['user_id'];?>><br>
                <span class="invalidFeedback"> Value = "<?php echo $data['user_idError']; ?>" </span><br>
                
                <input type="pwd" placeholder="pwd" name="pwd" <?php echo $data['pwd'];?>><br>
                <span class="invalidFeedback"> Value = "<?php echo $data['pwdError']; ?>"</span><br>

                <!--TEh ccheck boxes-->
                <div class="checkboxes">
                <label><input class="mutually-exclusive" type="checkbox" name="CB_administrator" value="true"> Administrator</label>
                <label><input class="mutually-exclusive" type="checkbox" name="CB_lecturer" value="true"> Lecturer</label>
                <label><input class="mutually-exclusive" type="checkbox" name="CB_instructor" value="true"> Instructor</label>
                <label><input class="mutually-exclusive" type="checkbox" name="CB_student" value="true"> Student</label>
                </div>
                <button class="index_login_button" type="submit"name="submit">LOGIN</button>
            </form>

            <script src="<?php echo URLROOT;?>/js/login.js"></script>
		</div>


</body>
</html>

