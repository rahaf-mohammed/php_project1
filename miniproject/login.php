<?php
 @include 'config.php';
 session_start();



 if(isset($_post['submit'])){

   $name = mysqli_real_escape_string($conn,$_post['submit']);
   $email = mysqli_real_escape_string($conn,$_post['email']);
   $mobile =  mysqli_real_escape_string($conn,$_post['email']);
   $pass = mds($_POST['password']);
   $passc = mds($_POST['password']);
   $date =  mysqli_real_escape_string($conn,$_post['text']);
   $user_type =$_POST['user_type'];

   $select = " SELSET * FORM user_form WHERE email = '$email' && passwoed ='$pass' ";
   $result = mysqli_query($conn, $select);
   if(mysqli_num_rows ($result) > 0) {
    $row =mysql_fetch_array($result);
    if($row['user_type']=='admain'){
        $_SESSION['admain_name'] = $row['name'];
        header('location:admain.php');

    }elseif($row['user_type']=='user'){
        $_SESSION['user_name'] = $row['name'];
        header('location:user.php');
   }
}else{
    $error[] = 'incorrect email or password' ;
}

 }
 ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>login</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
<div class="form-container">
      
      <form action="" method="post" class="foooorm" >
      <h3>login now</h3>
      <?php
      if(isset($error)){
        foreach( $error as $error){
            echo '<span class="error-">'.$error.'</span>';
        }
      }
      
      
      
      ?>
      
      <input type="email" name="email" required placeholder="enter your email">
      <input type="password" name="password" required placeholder="enter your password">
      <input type="submit" name="login now" class="form-btn">
      <p>dont have an account? <a href="regester.php">regester now</a></p>
</body>
</html>