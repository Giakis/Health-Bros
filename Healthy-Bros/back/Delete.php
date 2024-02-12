<?php
session_start();
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "Healthy-Bros-DB";
$you_id = $_GET['you_id'];

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

$you=-1;
$query = "SELECT * FROM posts";
$result = $conn->query($query);
if ($result->num_rows > 0){
  while($row = $result->fetch_assoc()){
    if ($row['user_id']==$you_id){     
      $you=$row['id'];
    }
  }
}
if ($you!=-1){
  $sql = "DELETE FROM posts WHERE id=$you";
}
if ($conn->query($sql) === TRUE) {
  echo "OKKK";
}





$you=-1;
$query = "SELECT * FROM comments";
$result = $conn->query($query);
if ($result->num_rows > 0){
  while($row = $result->fetch_assoc()){
    if ($row['user_id']==$you_id){
      $you=$row['id'];    
    }
  }
}
if ($you!=-1){
   $sql = "DELETE FROM comments WHERE id=$you";
}
if ($conn->query($sql) === TRUE) {
  echo "OKKK";
}




// sql to delete a record
$sql = "DELETE FROM user WHERE id=$you_id";

if ($conn->query($sql) === TRUE) {
  header("Location: ../management-system.php");
} else {
  echo "Error deleting record: " . $conn->error;
}

$conn->close();
?>
