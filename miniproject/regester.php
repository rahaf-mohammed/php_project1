 <?php
 @include 'config.php';
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
    $error[]='user already exist';


   }else{
    if($pass !=$passc){
        $error[] ='pass not matched';
    }else{
       $insert = "INSERT INTO user_form( name ,email, password ,user_type) VALUE('$name','$email','$pass','$user_type') ";
       mysqli_query($conn, $insert);
       header('location:login.php');
 
   } 
 }
}
 
 ?>
 

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>regester</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
  
    <div class="form-container">
    <form action="" method="post" class="foooorm">
     <h3>sign up now</h3>
      <?php
      if(isset($error)){
        foreach( $error as $error){
            echo '<span class="error-">'.$error.'</span>';
        }
      }
      
      
      
      ?>


        <label>Email:</label>
        <input type="email" name="email" required><br>

        <label>Mobile:</label>
        <input type="tel" name="mobile" pattern="[0-9]{14}" required><br>

        <label>Full Name:</label>
        <input type="text" name="fname" required>
        <input type="text" name="mname">
        <input type="text" name="lname">
        <input type="text" name="familyname"><br>

        <label>Password:</label>
        <input type="password" name="password" pattern="/^(?=.\d)(?=.[A-Z])(?=.[!@#$%^&])[A-Za-z\d!@#$%^&*]{8,16}$/" required><br>

        <label>Password Confirmation:</label>
        <input type="password" name="confirm_password"  required><br>

        <label>Date of Birth:</label>
        <input type="text" name="day" placeholder="DD" maxlength="2" required>
        <input type="text" name="month" placeholder="MM" maxlength="2" required>
        <input type="text" name="year" placeholder="YYYY" maxlength="4" required><br>
        <select name="user_type">
            <option value="user">user</option>
            <option value="admin">admin</option>
        </select>
        <input type="submit" name="submit" value="Sign Up now" class="form-btn">
        <p>already have an account? <a href="login.php">login now</p> 

        </form>
    </div>
    




</body>
</html>