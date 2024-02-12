<?php
session_start();

 $servername = "local";
 $username = "epiz_31739742";
 $password = "18p6faABv5hw";
 $dbname = "epiz_31739742_Healthy_Bros";

// // Create connection
 //$conn = new mysqli($servername, $username, $password, $dbname);
// // Check connection
 //if ($conn->connect_error) {
   //die("Connection failed: " . $conn->connect_error);
 //}
include '../database/db.php';


/////Παιρνει τα στοιχεια απο την βαση/////
$query = "SELECT * FROM user;";
$result = $conn->query($query);

/////Ελενχος αν υπαρχουν στοιχεια στην βαση/////
if ($result->num_rows > 0)
 {
  /////Παιρνει τα στοιχεια απο την HTML/////
  $mail = $_REQUEST['email'];
  $pass =  $_REQUEST['password'];

  
  $flag = false;
  $counter = 0;
  // OUTPUT DATA OF EACH ROW
  while($row = $result->fetch_assoc())
    {
      if ($mail == $row['email'] && $pass == $row['password'] )
        {
          $_SESSION['id']=$row['id'];
          $_SESSION['email']= $row['email'];
          $_SESSION['password']= $row['password'];
          $_SESSION['cat']= $row['cat'];
          $flag=true;
            break;
              // echo "Email: "  .$row["email"]. "<br>"
              //     ."Username: " .$row["username"]. "<br>"
              //     ."Password: " .$row["password"]. "<br>";
      }
    }
    
  }else{
    echo "0 results";
}

/////Ελενχει αν υπαρχουν τα στοιχεια που δωθηκαν στην εισοδο/////
if (! $flag)
  {
    $_SESSION['status']="Login failed.The username or password was incorrect";
    header("Location: ../loginn.php");
  }else{
    header("Location: ../index.php");
  }
  exit();

$conn->close();

?>
