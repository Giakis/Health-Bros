<?php
//$host = "sql102.epizy.com"; /* Host name */
//$user = "epiz_31739742"; /* User */
//$password = "18p6faABv5hw"; /* Password */
//$dbname = "epiz_31739742_Healthy_Bros"; /* Database name */

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "Healthy-Bros-DB";


$conn = mysqli_connect($servername, $username, $password,$dbname);
// Check connection
if (!$conn) {
  die("Connection failed: " . mysqli_connect_error());
  console.log("sss");
}
?>
