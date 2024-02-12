<?php
    //$connection =  new mysqli("localhost", "root", "" , "Healthy-Bros-DB"); // Establishing Connection with Server
    include 'database/db.php';

    //$db = mysql_select_db("Healthy-Bros-DB", $connection); // Selecting Database
    //MySQL Query to read data
    $fetchVideos = mysqli_query($conn, "SELECT * FROM videos");
    while($row = mysqli_fetch_assoc($fetchVideos)){	
          $location = $row['location'];
          $name = $row['name'];
          $category = $row['category'];
          $set = $row['sets'];
          $reps = $row['reps'];
          $time = $row['time'];
	  echo'<div class="product">';
	      echo'<section id="video">';

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
    }
?>
