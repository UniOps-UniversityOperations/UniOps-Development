<?php
    $response = $data['response'];
?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <link rel="stylesheet" href="styles.css">
   <title>Send Email in PHP using PHPMailer and Gmail</title>

   <!-- styles -->
   <style>
    *{
	   margin: 0;
	   padding: 0;
	   box-sizing: border-box;
	}
	 
	body{
	   font-family: sans-serif;
	   min-height: 100%;
	   color: #555;
	}
	 
	form{
	   max-width: 400px;
	   margin: 50px auto 0 auto;
	   border:  thin solid #e4e4e4;
	   padding: 20px;
	   box-shadow: 0 5px 5px rgba(0, 0, 0, 0.2);
	}
	 
	form .info{
	   font-weight: bold;
	   margin-bottom: 30px;
	   text-align: center;
	   font-size: 24px;
	}
	 
	form label{
	   display: block;
	   margin-bottom: 10px;
	   padding-left: 5px;
	}
	 
	form input, form textarea{
	   display: block;
	   width:  100%;
	   padding: 10px;	
	   margin-bottom: 10px;
	   font-size: 16px;
	   border:  thin solid #e4e4e4;
	   margin-bottom: 30px;
	}
	 
	form input:focus,
	form select:focus,
	form textarea
	{
	   outline: none;
	}
	 
	form textarea{
	   min-height: 80px;
	}
	 
	form input::placeholder{
	   font-size: 16px;
	}
	 
	form button{
	   background: #32749a;
	   color: white;
	   border: none;	
	   padding: 15px;
	   width:  100%;
	   font-size: 16px;
	   margin-top: 20px;
	   cursor: pointer;
	}
	 
	form button:active{
	   background-color: green;
	}
	 
	.error{
	   margin-top: 30px;
	   color: #af0c0c;
	}
	 
	.success{
	   margin-top: 30px;
	   color: green;
	}
   </style>
</head>
<body>
 
   <!-- Here goes the html email form -->
   <form action="<?php echo URLROOT;?>/AdminPosts/sendTestMail/" method="post" enctype="multipart/form-data">
	   <div class="info">
	      Send an email to your self
	   </div>
       <br>
       <br>
	 
	   <label>Enter your email</label>
	   <input type="email" name="email" value="">
       <br>
       <br>
	   
	   <label>Enter a subject</label>
	   <input type="text" name="subject" value="">
       <br>
       <br>
	 
	   <label>Enter your message</label>
	   <textarea name="message"></textarea>
       <br>
       <br>

	 
	   <button type="submit" name="submit">Submit</button>

       <?php
	      if(@$response == "success"){
	         ?>
	            <p class="success">Email send successfully</p>
	         <?php
	      }else{
	         ?>
	            <p class="error"><?php echo @$response; ?></p>
	         <?php
	      }
	   ?>


	</form>
 
</body>
</html>	