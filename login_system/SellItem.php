<?php

@include 'config.php';

session_start();

$itemID = $_POST["itemID"];
$userID = $_POST["userID"];

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
  }

$sql="SELECT price FROM items WHERE ID='".$itemID ."'";

$result = mysqli_query($conn, $sql);

if ($result->num_rows > 0) {
  
    //Store item price
    $itemPrice = $result->fetch_assoc()["price"];

    //Second sql (delete item)
    $sql2 = "DELETE FROM user_items WHERE itemID = '$itemID' AND  userID = '$userID' ORDER BY ID ASC LIMIT 1 ";

    $result2 = $conn->query($sql2);

    if($result2)
    {
        //If deleted succesfully

        $sql3 = "UPDATE `user_form` SET `coins` = coins + '$itemPrice' WHERE `id` = '$userID' ";

        $conn->query($sql3);
    } 
    else
    {
        echo "error: could not delete item";
    }
}
else
{
    echo "0";
}

$conn->close();
?>