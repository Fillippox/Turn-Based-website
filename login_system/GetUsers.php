<?php

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "user_db";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

echo "Connected successfully". "<br>";

$sql = "SELECT name, level, coins FROM user_form";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
  // output data of each row
  while($row = $result->fetch_assoc()) {
    echo "Username: " . $row["name"]. " - level: " . $row["level"]. " - Coins: " . $row["coins"]. "<br>";
  }
} else {
  echo "0 results";
}

$conn->close();

?>