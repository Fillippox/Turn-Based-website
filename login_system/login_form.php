<?php

@include 'config.php';

session_start();

if(isset($_POST['submit'])){

   $name = mysqli_real_escape_string($conn, $_POST['name']);
   $email = mysqli_real_escape_string($conn, $_POST['email']);
   $pass = md5($_POST['password']);
   $cpass = md5($_POST['cpassword']);
   $user_type = $_POST['user_type'];

   $select = " SELECT * FROM user_form WHERE email = '$email' && password = '$pass' ";

   $result = mysqli_query($conn, $select);

   if(mysqli_num_rows($result) > 0){

      $row = mysqli_fetch_array($result);

      if($row['user_type'] == 'admin'){

         $_SESSION['admin_name'] = $row['name'];
         $_SESSION['uid'] = $row['id'];
         $_SESSION['coinsCount'] = $row['coins'];
         header('location:admin_page.php');

      }elseif($row['user_type'] == 'user'){

         $_SESSION['user_name'] = $row['name'];
         $_SESSION['uid'] = $row['id'];
         $_SESSION['coinsCount'] = $row['coins'];
         header('location:user_page.php');

      }
     
   }else{
      $error[] = 'incorrect email or password!';
   }

};

?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Login</title>

   <!-- custom css file link  -->
   <!-- <link rel="stylesheet" href="css/style.css"> -->
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
         <h3>Login</h3>
         <?php
         if(isset($error)){
            foreach($error as $error){
               echo '<span class="error-msg">'.$error.'</span>';
            };
         };
         ?>
         <input type="email" name="email" required placeholder="enter your email">
         <input type="password" name="password" required placeholder="enter your password">
         <input type="submit" name="submit" value="login now" class="form-btn">
         <p>Don't have an account? <a href="register_form.php">register now</a></p>
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