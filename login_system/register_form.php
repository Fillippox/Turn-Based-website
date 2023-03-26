<?php

@include 'config.php';

if(isset($_POST['submit'])){

   $name = mysqli_real_escape_string($conn, $_POST['name']);
   $email = mysqli_real_escape_string($conn, $_POST['email']);
   $pass = md5($_POST['password']);
   $cpass = md5($_POST['cpassword']);
   $user_type = $_POST['user_type'];

   $select = " SELECT * FROM user_form WHERE email = '$email'";
   $select2 = " SELECT * FROM user_form WHERE name = '$name'";

   $result = mysqli_query($conn, $select);
   $result2 = mysqli_query($conn, $select2);

   if(mysqli_num_rows($result) > 0){

      $error[] = 'Account with this email alreadt exists!';

   }
   else{

      if(mysqli_num_rows($result2) > 0)
      {
         $error[] = 'Username already taken!';
      }

      else if($pass != $cpass){
         $error[] = 'password not matched!';
      }
      else{
         // Password validation check here
         if(strlen($_POST['password']) < 8 || !preg_match("#[0-9]+#", $_POST['password']) || !preg_match("#[a-z]+#", $_POST['password']) || !preg_match("#[A-Z]+#", $_POST['password'])) {
            $error[] = 'Password should be: 
            <br> •At least 8 characters long 
            <br> •Contain at least one uppercase letter 
            <br> •One lowercase letter 
            <br> •One number.';
      }
      else{
         $insert = "INSERT INTO user_form(name, email, password, user_type) VALUES('$name','$email','$pass','$user_type')";
         mysqli_query($conn, $insert);
         header('location:login_form.php');
      }
   }
}
};


?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>register form</title>

   <!-- custom css file link  -->
   <link rel="stylesheet" href="css/theme2.css">
   <link rel="icon" href="../images/monster.png">

</head>
<body>
   
<div class="background">
   <div>
      <div style="float: right;">
         <button id="switch-styles" class="switch-image">Switch Styles</button>
         <script>
            var switchStylesButton = document.getElementById("switch-styles");
            var currentStyleSheet = document.querySelector('link[href$="css/theme1.css"], link[href$="css/theme2.css"]');
            var savedStyleSheet = localStorage.getItem("selectedStyleSheet");

            if (savedStyleSheet) {
               currentStyleSheet.href = savedStyleSheet;
            }

            switchStylesButton.addEventListener("click", function() {
               if (currentStyleSheet.href.endsWith("css/theme1.css")) {
               currentStyleSheet.href = "css/theme2.css";
               } else {
               currentStyleSheet.href = "css/theme1.css";
               }

               localStorage.setItem("selectedStyleSheet", currentStyleSheet.href);
            });
         </script>
      </div>
      <a href="../index.html">
         <img width="64" height="64" src="../images/monster.png"/>
      </a>
   </div>

   <div class="form-container">

      <form action="" method="post">
         <h3>Register</h3>
         <?php
         if(isset($error)){
            foreach($error as $error){
               echo '<span class="error-msg">'.$error.'</span>';
            };
         };
         ?>
         <input type="text" name="name" required placeholder="enter your name">
         <input type="email" name="email" required placeholder="enter your email">
         <input type="password" name="password" required placeholder="enter your password">
         <input type="password" name="cpassword" required placeholder="confirm your password">
         <select name="user_type">
            <option value="user">user</option>
            <!--<option value="admin">admin</option>-->
         </select>
         <input type="submit" name="submit" value="register now" class="form-btn">
         <p>Already have an account? <a href="login_form.php">login now</a></p>
      </form>

   </div>
   <!-- The <span> elements are used as visual elements in the background animation to create an interesting and dynamic effect. -->
   <span></span>
   <span></span>
   <span></span>
   <span></span>
   <span></span>
   <span></span>
   <span></span>
   <span></span>
   <span></span>
   <span></span>
   <span></span>
   <span></span>
   <span></span>
   <span></span>
   <span></span>
   <span></span>
   <span></span>
   <span></span>
   <span></span>
   <span></span>
   <span></span>
   <span></span>
   <span></span>
   <span></span>
   <span></span>
   <span></span>
   <span></span>
   <span></span>
   <span></span>
   <span></span>
   <span></span>
   <span></span>
   <span></span>
   <span></span>
   <span></span>
   <span></span>
   <span></span>
   <span></span>
   <span></span>
   <span></span>
   <span></span>
</div>

</body>
</html>