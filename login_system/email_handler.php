<?php


if(isset($_POST["submit"])){
    $email = $_POST["email"];
    $host = "localhost";
    $username = "root";
    $password = "";
    $dbname = "user_db";
  
    // Create connection
    $conn = new mysqli($host, $username, $password, $dbname);
    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
  
    $sql = "INSERT INTO newsletter (email) VALUES ('$email')";
  
    $check_email = "SELECT email FROM newsletter WHERE email = '$email'";
    
    $result = mysqli_query($conn, $check_email);
    if (mysqli_num_rows($result) > 0) {
       echo "Email already exists in the database";
    } else {
       $sql = "INSERT INTO newsletter (email) VALUES ('$email')";
       if ($conn->query($sql) === TRUE) {
          echo "New record created successfully";
       } else {
           echo "Error: " . $sql . "<br>" . $conn->error;
       }
    }
  
    $conn->close();
  }

?>