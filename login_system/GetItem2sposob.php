<?php


$servername = "localhost";
$username = "root";
$password ="";
$dbname = "user_db";

$itemID = 2;//$_POST["itemID"];

$conn = new mysqli($servername,$username,$password,$dbname);

$sql="SELECT name, description, price FROM items WHERE ID='". $itemID . "'";

$result = $conn->query($sql);

if ($result->num_rows > 0) {
 // output data of each row
 $row = array();
 while($row = $result->fetch_assoc()) {
   $rows[] = $row;
 }

 echo json_encode($rows);

} else {
 echo "0 results";
}

$conn->close();
?>







<!------------------------------------------------------------------------------------------------------------------------------------------>


<?php

@include 'config.php';

session_start();

if(isset($_POST['submit'])){

   $email = mysqli_real_escape_string($conn, $_POST['email']);
   $pass = md5($_POST['password']);

   $itemID = 2;//$_POST["itemID"];

   $select = " SELECT * FROM user_form WHERE email = '$email' && password = '$pass' ";

    $sql="SELECT name, description, price FROM items WHERE ID='".$itemID ."'";

   $result = mysqli_query($conn, $sql);

   if ($result->num_rows > 0) {
    // output data of each row
    $row = array();
    while($row = $result->fetch_assoc()) {
      $rows[] = $row;
    }
  
    echo json_encode($rows);
  
  } else {
    echo "0 results";
  }
};

$conn->close();

?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>login form</title>

   <!-- custom css file link  -->
   <link rel="stylesheet" href="css/style.css">

</head>
<body>
   
<div class="form-container">

   <form action="" method="post">
      <h3>login now</h3>
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
      <p>don't have an account? <a href="register_form.php">register now</a></p>
   </form>

</div>

</body>
</html>

