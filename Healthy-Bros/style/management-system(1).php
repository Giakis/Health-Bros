<?php
session_start();
include("database/db.php");
 
if(isset($_POST['but_upload'])){
   $maxsize = 5242880; // 5MB
   if(isset($_FILES['file']['name']) && $_FILES['file']['name'] != ''){
       $name = $_FILES['file']['name'];
       $target_dir = "videos/";
       $target_file = $target_dir . $_FILES["file"]["name"];
       $category = $_POST["category"];
       $time = $_POST["time"];
       $set = $_POST["sets"];
       $reps = $_POST["repss"];


       // Select file type
       $extension = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

       // Valid file extensions
       $extensions_arr = array("mp4","avi","3gp","mov","mpeg","mkv");

       // Check extension
       if( in_array($extension,$extensions_arr) ){
 
          // Check file size
          if(($_FILES['file']['size'] >= $maxsize) || ($_FILES["file"]["size"] == 0)) {
             $_SESSION['message'] = "File too large. File must be less than 5MB.";
          }else{
             // Upload
             if(move_uploaded_file($_FILES['file']['tmp_name'],$target_file)){
               // Insert record
               $query = "INSERT INTO videos(name,category,time,sets,reps,location) VALUES('".$name."','".$category."','".$time."','".$set."','".$reps."','".$target_file."')";

               mysqli_query($con,$query);
               $_SESSION['message'] = "Upload successfully.";
               header("Location:management-system.php");
             }
          }

       }else{
          $_SESSION['message'] = "Invalid file extension.";
       }
   }else{
       $_SESSION['message'] = "Please select a file.";
   }
   
   exit;
} 
?>


<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>HB Programs</title>
    <link rel="stylesheet" href="style/management-system.css" />
    <link rel="stylesheet" href="style/forum.css" />
    <link
      rel="stylesheet"
      href="https://use.fontawesome.com/releases/v5.14.0/css/all.css"
      integrity="sha384-HzLeBuhoNPvSl5KYnjx0BT+WB0QEEqLprO+NBkkk5gbc67FTaL7XIGa2w1L0Xbgc"
      crossorigin="anonymous"
    />
    <link
      href="https://fonts.googleapis.com/css2?family=Kumbh+Sans:wght@400;700&display=swap"
      rel="stylesheet"
    />
    <!--<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.14.0/css/all.css" integrity="sha384-HzLeBuhoNPvSl5KYnjx0BT+WB0QEEqLprO+NBkkk5gbc67FTaL7XIGa2w1L0Xbgc" crossorigin="anonymous" />
    <link href="https://fonts.googleapis.com/css2?family=Kumbh+Sans:wght@400;700&display=swap" rel="stylesheet" /> -->
</head>

<body>

<div class="main">
    <section class="sec">
      <h1>Edit the Following groups</h1>
      <ul>
      	   <li class="controll panel">Control Panel</li>
          <li class="users">Users</li>
          <li class="programs container">Programs Container</li>
          <li class="forum container">Forum Container</li>
      </ul>
    </section>

  <div id="users" class="Head" data-filter="users">
  
    <div class="cat">
      <h1>Users</h1>    
    </div>
    
    <a href="signup.php">Add an administrator</a>
    
    <div class="search-bar">
      <form id="form0" action="management-system.php#form0" method="post">
        <input type="text" id="search" name="search" placeholder="Search your issue...">
        <input id="submit" name="submit" type="submit" value="Search">
      </form>
    </div>
    <?php
    if(isset($_POST["submit"])){
    	include("back/search-user.php");
    }else{
   	include("back/all-user.php");
    }
    ?>

  </div>
  
  <div id="programs container" class="Head" data-filter="programs container">
  
    <div class="cat">
      <h1>Programs Container</h1>    
    </div>
  
    <?php 
	    if(isset($_SESSION['message'])){
	       echo $_SESSION['message'];
	       unset($_SESSION['message']);
	    }
    ?>
    
    <div class="upload-form">
    	    <h1>Upload Video</h1>
	    <form method="post" action="management-system.php" enctype='multipart/form-data'>
	      <label for="fgender">Your gender</label>
		<select id="fgender" name="category" placeholder="Category of excersize" required>
		  <!-- <option value=""> </option> -->
		  <option value="chest">Chest</option>
		  <option value="arms">Arms</option>
		  <option value="legs">Legs</option>
		  <option value="butt">Butt</option>
		</select> 
		
	      <label for="fsets">Set</label>
		<input type="number" step="1" name="sets" placeholder="Set of excersize" required>
	      <label for="freps">Reps</label>
		<input type="number" step="1" name="repss" placeholder="Reps of 1 set" required>
		
		
	      <label for="ftime">Time</label>
		<input type="text" name="time" placeholder="Time in sec.." required>
		
	      <input type='file' name='file' />
	      <input type='submit' value='Upload' name='but_upload'>
	    </form>
    </div>
    
    <div class="search-bar">
      <form id="form1" name="form1" action="management-system.php#form1" method="post" >
        <input type="text" id="search" name="search1" placeholder="Search for programs...">
        <input id="submit" name="submit1" type="submit" value="Search">
      </form>
    </div>
    
    <div class="flex-programm">
	    <?php
	    if(isset($_POST["submit1"])){
	    	include("back/search-program.php");
	    }else{
	   	include("back/all-program.php");
	    }
	    ?>
    </div>

  </div> 
  
  <div id="forum container" class="Head" data-filter="forum container">
  
  <div class="cat">
      <h1>Forum Container</h1>    
  </div>

<?php 
    $connection =  new mysqli("localhost", "root", "" , "Healthy-Bros-DB"); // Establishing Connection with Server
    //$db = mysql_select_db("Healthy-Bros-DB", $connection); // Selecting Database
    //MySQL Query to read data
    $query = mysqli_query($connection , "SELECT * FROM user");
    while ($row = mysqli_fetch_array($query)) {
        echo'<div class="main-container">';
            echo'<div class="user">';
                echo'<div class="top">';
                    echo'<div class="avatars-container">';
                        echo'<div class="avatars">';
                            echo'<img src="https://www.gravatar.com/avatar/afe65b6166482ebd026878fa71d764d1?size=192&d=mm" alt="username" component="avatar/picture" data-original-title="username">';
                            echo'<i component="user/status" class="fa fa-circle status offline" title="Offline" data-original-title="Offline"></i>';
                        echo'</div>';
                    echo'</div>';

                    echo'<div class="username-container">';
                        echo '<h3>'; 
                        	echo "@" . $row["username"] ;
                        echo'</h3>';
                    echo'</div>';
                    
                echo'</div>';
                echo'<div class="bottom">';
                    echo'<div class="config">';
                        echo'<a href="">Postss</a>';
                        echo'<a href="">Delete accountt</a>';
                    echo'</div>';
                echo'</div>';
            echo'</div>'; 
        echo'</div>';
     }
     echo'<div class="topic-list">';
          echo'<ul class="content">';
            echo'<div class="top_flex">';
              //<!-- img start -->
              echo'<div class="avatars-container">';
                  echo'<div class="avatars">';
                  echo'<img src="https://www.gravatar.com/avatar/afe65b6166482ebd026878fa71d764d1?size=192&d=mm" alt="username" component="avatar/picture" data-original-title="username">';
                  echo'<i component="user/status" class="fa fa-circle status offline" title="Offline" data-original-title="Offline"></i>';
                  echo'</div>';
              echo'</div>';
              //<!-- img end -->

              //<!-- START ISSUE -->
              echo'<h3>';
                echo'<a href="forum_issue.html" class="issue_links">';
                  echo'How can i lose weigths fast';
                echo'</a>';
              echo'</h3>';
              //<!-- END ISSUE -->

              echo'<div class="post_view_flex">';
                echo'<h2>';
                  echo'# POSTS';
                echo'</h2>';

                echo'<h2>';
                  echo'# VIEWS';
                echo'</h2>';
                
              echo'</div>';
            echo'</div> ';

            

            echo'<div class="bottom_flex">';
              //echo'<!-- START SOME TEXT -->'
              echo'<li class="f_item">';
               echo'<p>About # hours/days before</p>';
              echo'</li>';
              //<!-- END SOME TEXT -->
              echo'<li class="a_item">';

                echo'<div class="navbar__toggl" id="mobile_post">';
                  echo'<a href="/forum_issue.html">';
                    
                    echo'<i class="fa fa-arrow-circle-right"></i>';
                    echo'<span>#</span>';
                  echo'</a>';
                echo'</div>';
              echo'</li>';
            echo'</div>';
            
            
          echo'</ul>';

          
     echo'</div>';

?>
  </div>
  

</div>



<script src="handling/submit-filter.js"></script> 
<script src="handling/management-filter.js"></script> 
<script src="handling/app.js"></script>

</body>
</html>
