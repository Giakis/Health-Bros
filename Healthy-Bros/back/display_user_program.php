<?php

    //session_start();
    //$connection =  new mysqli("localhost", "root", "" , "Healthy-Bros-DB"); // Establishing Connection with Server
    include 'database/db.php';
    
    $uid = $_SESSION['id'];

    //$db = mysql_select_db("Healthy-Bros-DB", $connection); // Selecting Database
    //MySQL Query to read data
    //$query = mysqli_query($conn, "SELECT * FROM programms WHERE user_id=$uid");
    //$row = mysqli_fetch_array($query);
    //if(mysqli_num_rows($query)>0) {
    	//$loc = $row['location'];
    //} else {
    	//$loc="no_file";
    //}
    $loc=$_SESSION['loc'];
    
    $file = "$loc";
    if(file_exists("$file")) {
		$content = file_get_contents($file);
		$arr = explode(" ", $content);
		
		$i = 1;

		while($i < count($arr))
		{
		    $vid = $arr[$i];
		    $query = mysqli_query($conn, "SELECT * FROM videos WHERE id=$vid");
			$row = mysqli_fetch_array($query);

			$location = $row['location'];
		    $name = $row['name'];
		    $category = $row['category'];
		    $set = $row['sets'];
		    $reps = $row['reps'];
		    $time = $row['time'];
			echo'<div class="product">';
		    		echo'<div class="video_content">';
			  
				        echo'<video class="IFRAME" width="300" height="180" controls>';
	  		                echo'<source src="'.$location.'" type="video/mp4">';
			            echo'</video>';
		  
				        echo'<div class="Text">';
				            echo'<p>';
				                echo'&#9702;Category: '.$category.'';
				            echo'</p>';
				            echo'<p>';
				                echo'&#9702;Set: '.$set.' Reps: '.$reps.''; 
				            echo'</p>';	
				            echo'<p>';
				                echo'&#9702;Time in seconds: '.$time.''; 
				            echo'</p>';	    
				        echo'</div>';
				    echo'</div>';
			echo'</div>'; 
			$i++;
		}
    } else {
    	echo'<div class="Text">';
			echo'<p>';
				echo'NO DATA TO DISPLAY. CREATE A PROGRAMM WITH THE FORM BELOW';
			echo'</p>';
	    
		echo'</div>';
    }
?>
