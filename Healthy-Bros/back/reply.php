<?php
	include '../database/db.php';
	session_start();
    if(isset($_SESSION['id'])) {
	if(isset($_POST['upload'])){
		

		$user_id = $_SESSION['id'];
		$post_id = $_SESSION['post_id'];

		$likes = 0;
		$unlikes = 0;
   		
   
   		$txt = $_REQUEST['subject'];
   		$name = $_SESSION['reply'];
   		$titl = $name;
   		$connection =  new mysqli("localhost", "root", "" , "Healthy-Bros-DB");
   		
   		
   		
   		$reply_id = mysqli_query($connection,"SELECT id FROM comments WHERE post_id=$post_id");
   		$rid = 0;
        while ($row = mysqli_fetch_array($reply_id)) {
            $rid= $row['id'];
        }
        $name = $name . $rid;
        
   		$myfile = fopen("../replies/$name.txt", "w") or die("Unable to open file!");
   		
		fwrite($myfile, $txt);
		fclose($myfile);
		$location = "replies/$name.txt";
	
		$sql = "INSERT INTO comments (post_id , user_id , likes , unlikes , reply_location)
    	VALUES ($post_id, $user_id , $likes , $unlikes , '$location')";
    	if ($conn->query($sql) === TRUE) {
    		$sql = "SELECT * FROM comments WHERE post_id=$post_id";
   		    $rowcount = 0;
		    if ($result=mysqli_query($connection,$sql)) {
    		    $rowcount=mysqli_num_rows($result); 
		    }
		    $sql = "UPDATE posts SET replies=$rowcount WHERE title='$titl'";
            $connection->query($sql);
    		header("Location: ../forum_issue.php?titl=$titl");
    	} else {
        	echo "Error: " . $sql . "<br>" . $conn->error;
    	}
	}
    }else {
        header("Location: ../signup.php");
    }
?>
