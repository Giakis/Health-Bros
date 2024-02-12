<?php
	include '../database/db.php';
    session_start();
    if(isset($_SESSION['id'])) {
	if(isset($_POST['upload'])){
		
		$title = $_REQUEST['title'];


		$user_id = $_SESSION['id'];
		
		$views = 0;
		$replies = 0;
   		$maxsize = 5242880; // 5MB
   
   		$txt = $_REQUEST['subject'];
   		$name = $_REQUEST['title'];
   		$myfile = fopen("../issues/$name.txt", "w") or die("Unable to open file!");
   		
		fwrite($myfile, $txt);
		fclose($myfile);
		$location = "issues/$name.txt";
	
		$sql = "INSERT INTO posts (user_id , title , views , replies , location)
    	VALUES ($user_id, '$title' , $views , $replies , '$location')";
    	if ($conn->query($sql) === TRUE) {
    		header("Location: ../forum_main.php");
    	} else {
        	header("Location: ../signup.php");
    	}
	}
    } else {
        header("Location: ../signup.php");
    }
?>
