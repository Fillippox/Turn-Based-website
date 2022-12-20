<?php

@include 'config.php';

session_start();

if($conn->connect_error)
{
    die("Connection Failed: " . $conn->connect_error);
}

$itemID = $_POST["itemID"];

$path = "http://localhost/Turn-Based-website/Items_Icons/" . $itemID . ".png";

$image = file_get_contents($path);


echo $image;

$conn->close();

?>
