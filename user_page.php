<?php

include 'config.php';

session_start();

if(!isset($_SESSION['loggedin'])){ 
   header('location:login_form.php');
   exit;
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>User page</title>
   <link rel="stylesheet" href="style.css">

</head>
<body>
   
<div class="container">
   <div class="content">
      <h1>Thank You for registering <span><?php echo $_SESSION['user_name'] ?></span></h1>
      <p>You have passed the robot verification. You can proceed with Feedback Submission or Logout as you wish!</p>
      <a href="logout.php" class="btn">Logout</a>
      <a href="https://saintsfrow.github.io/Sample-Feedback-Form/" class="btn">Feedback</a>
   </div>
</div>
</body>
</html>
