<?php

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "user_db";

//User submited variables
$userID = $_POST["userID"];


// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT itemID FROM user_items WHERE userID =='".$userID ."'";

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