<?php
    include("../database/db.php");
	session_start();
	
	
	$uid = $_SESSION['id'];
	$query = mysqli_query($conn , "SELECT username FROM user WHERE id=$uid");
	$row = mysqli_fetch_array($query);
	$username = $row['username'];
	$age = $_POST['age'];
	$weight = $_POST['weight'];
	$height = $_POST['fheight'];
	$gender = $_POST['gender'];
	$goal = $_POST['goal'];
	
	
	if(isset($_POST['chest'])){
		$chest = $_POST['chest'];
	}else {
		$chest="off";
	}
	
	if(isset($_POST['arms'])){
		$arms = $_POST['arms'];
	}else {
		$arms="off";
	}
	
	if(isset($_POST['butt'])){
		$butt = $_POST['butt'];
	}else {
		$butt="off";
	}
	
	if(isset($_POST['legs'])){
		$legs = $_POST['legs'];
	}else {
		$legs="off";
	}
	
	$time = $_POST['time'];

	echo $age;
	echo $weight;
	echo $height;
	echo $gender;
	echo $goal;
	echo $chest;
	echo $butt;
	echo $legs;
	echo $arms;
	echo $time;
	$time = $time*60; // from mins to secs
	$temp_time=0;


	
	$txt="";
	$query = mysqli_query($conn , "SELECT * FROM videos");
	while($row = mysqli_fetch_array($query)) {
		if($row['category']=="chest" && $chest=="on"){
			if(($temp_time+$row['time'])<=$time){
			    $temp_time = $temp_time+$row['time'];
				$vid = $row['id'];
				$txt = $txt ." " . $vid;
			}
		}
		
		if($row['category']=="legs" && $legs=="on"){
			if(($temp_time+$row['time'])<=$time){
				$vid = $row['id'];
				$txt = $txt ." " . $vid;
			}
		}
		
		if($row['category']=="butt" && $butt=="on"){
			if(($temp_time+$row['time'])<=$time){
				$vid = $row['id'];
				$txt = $txt ." " . $vid;
			}
		}
		
		if($row['category']=="arms" && $arms=="on"){
			if(($temp_time+$row['time'])<=$time){
				$vid = $row['id'];
				$txt = $txt ." " . $vid;
			}
		}
	}
 
    if(isset($_POST['upload'])){
   		$name = $username;
   		$temp=0;
   		while(TRUE){
   		    $temp2 = $name.$temp;
   			if (file_exists("../users_programs/$temp2.txt")) {
    			$temp=$temp+1;
			} else {
				$name = $name.$temp;
				break;			
			}
   		}
   		
   		$myfile = fopen("../users_programs/$name.txt", "w") or die("Unable to open file!");
   		
		fwrite($myfile, $txt);
		fclose($myfile);
		$location = "users_programs/$name.txt";
		
		$sql = "INSERT INTO programms (user_id , time , location)
    	VALUES ($uid, $time , '$location')";
    	$conn->query($sql);
    		
   
	}
	//$file = "../users_programs/$name.txt";
	//$content = file_get_contents($file);
	//$arr = explode(" ", $content);
	
	
?>
