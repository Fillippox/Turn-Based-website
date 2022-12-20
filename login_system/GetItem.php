<?php

@include 'config.php';

session_start();

$itemID = $_POST["itemID"];

$sql="SELECT name, description, price FROM items WHERE ID='".$itemID ."'";

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
 echo "0";
}

$conn->close();
?>
