<?php
session_start();
unset($_SESSION["id"]);
unset($_SESSION["email"]);
unset($_SESSION["password"]);
unset($_SESSION["cat"]);
session_destroy();
header("Location: index.php");
exit();
//session_start();
// session_destroy();
// unset($_SESSION['id']);
// unset($_SESSION['email']);
// unset($_SESSION['password']);
// header("Location: http://localhost/");
// exit();
?>