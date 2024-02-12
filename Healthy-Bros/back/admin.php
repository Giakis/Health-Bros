<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "Healthy-Bros-DB";
session_start();
// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}
//<include 'database/db.php'>;

$mail = $_REQUEST['email'];
$flag=FALSE;
$query = "SELECT email,id,password FROM user;";
  $result = $conn->query($query);
  if ($result->num_rows > 0)
  {
    while($row = $result->fetch_assoc()){
      if ($mail == $row['email'] ){
        $flag=TRUE;
        break;
      }
    }
  }
if($flag) {

  $query = mysqli_query($conn, "UPDATE user SET cat='admin' WHERE email='$mail'");


  if ($query) {
    header("Location: ../management-system.php");

  }
} else {
    $_SESSION['status']="This email is not registered";
    header("Location: ../admin-signup.php");
}
$conn->close();
?> 
