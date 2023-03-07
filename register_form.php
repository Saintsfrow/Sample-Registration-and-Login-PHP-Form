<?php
session_start();
@include 'config.php';

if(isset($_SESSION['loggedin']) && $_SESSION['loggedin'] === true){
   header('location:user_page.php');
   exit;
}

$error = array();

if(isset($_POST['submit']))
{
   $name = mysqli_real_escape_string($conn, $_POST['name']);
   $email = mysqli_real_escape_string($conn, $_POST['email']);
   $pass = password_hash($_POST['password'], PASSWORD_DEFAULT);

   $select = "SELECT * FROM user_form WHERE email = '$email'";
   $result = mysqli_query($conn, $select);

   if(mysqli_num_rows($result) > 0)
   {
      $error[] = 'User already exists!';
   }
   else
   {
      $insert = "INSERT INTO user_form(name, email, password) VALUES('$name','$email','$pass')";
      mysqli_query($conn, $insert);
      header('location: login_form.php');
      exit;
   }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>register form</title>
   <link rel="stylesheet" href="style.css">

</head>
<body>
   
<div class="form-container">

   <form action="" method="post">
      <h3>REGISTER</h3>
      <?php
      if(!empty($error)){
         foreach($error as $e){
            echo '<span class="error-msg">'.$e.'</span>';
         };
      };
      ?>
      <input type="text" name="name" required placeholder="enter your name">
      <input type="email" name="email" required placeholder="enter your email">
      <input type="password" name="password" required placeholder="enter your password">
      <input type="submit" name="submit" value="register now" class="form-btn">
      <p>Already have an account? <a href="login_form.php">Login</a></p>
   </form>

</div>

</body>
</html>
