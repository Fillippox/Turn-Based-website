<?php

@include 'config.php';

session_start();

$email = mysqli_real_escape_string($conn, $_POST['email']);
$pass = md5($_POST['password']);

if($conn->connect_error){
    die("Connection failed: " . $conn->connect_error);
}
//echo " Successfully connected to Server \n";


$select = " SELECT * FROM user_form WHERE email = '$email' && password = '$pass'  ";

$result = mysqli_query($conn, $select);

if($result->num_rows > 0)
{
    while($row = $result->fetch_assoc()) 
    {
        if($row["password"] == $pass)
        {
            echo $row["id"];
        }
        else
        {
            echo "Wrong Password.";
        }
    }
}
else
{
    echo "Wrong Credentials.";
}

$conn->close();

?>