<?php
include 'config.php';
session_start();

if (isset($_POST['submit'])) 
{
   $email = mysqli_real_escape_string($conn, $_POST['email']);
   $pass = $_POST['password'];

   $select = "SELECT * FROM user_form WHERE email = '$email'";

   $result = mysqli_query($conn, $select);
   $row = mysqli_fetch_array($result);

   if (mysqli_num_rows($result) > 0) 
   {
      if (password_verify($pass, $row['password'])) 
      {
         $_SESSION['loggedin'] = true;
         $_SESSION['user_name'] = $row['name'];
         header('location:user_page.php');
         exit;
      } 
      else 
      {
         $error = 'incorrect email or password!';
      }
   } else {
      $error = 'incorrect email or password!';
   }
};   
?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>login form</title>
   <link rel="stylesheet" href="style.css">

</head>
<body>
   
<div class="form-container">

   <form action="" method="post">
      <h3>LOGIN</h3>
      <?php
      if(isset($error)){
         echo '<span class="error-msg">'.$error.'</span>';
      };
      ?>
      <input type="email" name="email" required placeholder="enter your email">
      <input type="password" name="password" required placeholder="enter your password">
      <input type="submit" name="submit" value="login now" class="form-btn">
      <p>Don't have an account? <a href="register_form.php">Register</a></p>
   </form>

</div>

</body>
</html>
