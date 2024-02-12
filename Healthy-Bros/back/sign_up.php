<?php
session_start();
//$servername = "localhost";
//$username = "root";
//$password = "";
//$dbname = "Healthy-Bros-DB";

$servername = "sql102.epizy.com";
$username = "epiz_31739742";
$password = "18p6faABv5hw";
$dbname = "epiz_31739742_Healthy_Bros";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}
//<include 'database/db.php'>;

$uname =  $_REQUEST['Username'];
$mail = $_REQUEST['email'];
$pass =  $_REQUEST['password'];
$confirm_pass=$_REQUEST['confirm_password'];
$date = $_REQUEST['Date'];
$height = 0.0;
$weight = 0.0;

//$_SESSION['category'] = $cat;

////Ελενχει αν εχει αποδεκτο ονομα////
$flag=TRUE;
$stringWithout = preg_replace('/[^a-zA-Z0-9]/', '_', $uname);
if ($uname != $stringWithout) {
  $flag=FALSE;
  $_SESSION['status']="You can only use: Character, number, '_'";
  header("Location: ../signup.php");
} else {
  ////Ελενχει αν εχει αποδεκτο email και δεν υπαρχει αλλο ιδιο σην βαση////\
  // if (!filter_var($mail, FILTER_VALIDATE_EMAIL)) {
  //   $flag=FALSE;
  //   $_SESSION['status']="Invalid email format";
  //   header("Location: ../signup.php");
  ////Ελενχει αν εχει αποδεκτο email////
  if (!filter_var($mail, FILTER_VALIDATE_EMAIL)) {
    $flag=FALSE;
    $_SESSION['status']="Invalid email format";
    header("Location: ../signup.php");
  }
  ////Ελενχει αν υπαρχει το email μεσα στην βαση ////
  $query = "SELECT email,id,password FROM user;";
  $result = $conn->query($query);
  if ($result->num_rows > 0)
  {
    while($row = $result->fetch_assoc()){
      if ($mail == $row['email'] ){
        $flag=FALSE;
        $_SESSION['status']="This email is registered";
        header("Location: ../signup.php");
        break;
      }
    }
  } else {
    ////Ελενχει αν εχει αποδεκτο κωδικο////
    $stringWithout = preg_replace('/[^a-zA-Z0-9!@#$%^&*]/', '_', $pass);
    if ($pass != $stringWithout) {
      $flag=FALSE;
      $_SESSION['status']="You can only use: Character, number, _ , ! , @ , # , $ , % , ^ , & , * ";
      header("Location: ../signup.php");
    } else {
      ////Ελενχει αν Password==Confirm_Password////
      $stringWithout = preg_replace('/[^a-zA-Z0-9!@#$%^&*]/', '_', $confirm_pass);
      if ($confirm_pass != $stringWithout || $pass!=$confirm_pass) {
        $flag=FALSE;
        $_SESSION['status']="Passwords are different";
        header("Location: ../signup.php");
      }
    }
  }
}

if ($flag){
  $cat = $_POST['category'];
  $sql = "INSERT INTO user (username , email , password , date , height , weight , cat)
  VALUES ('$uname', '$mail' , '$pass' , '$date' , $height , $weight , '$cat')";
  if ($conn->query($sql) === TRUE) {
    header("Location: ../loginn.php");
  } else {
    echo "Error: " . $sql . "<br>" . $conn->error;
  }
}

$conn->close();
?> 
