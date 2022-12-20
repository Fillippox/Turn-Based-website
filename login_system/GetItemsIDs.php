<?php

@include 'config.php';

session_start();

//User submited variables
$userID = $_POST["userID"];


// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT itemID FROM user_items WHERE userID ='". $userID . "'";

$result = mysqli_query($conn, $sql);

if ($result->num_rows > 0) {
  // output data of each row
  $rows = array();
  while($row = $result->fetch_assoc()) 
  {
    $rows[] = $row;
  }

  echo json_encode($rows);

}
else 
{
  echo "0 results";
}

$conn->close();

?>