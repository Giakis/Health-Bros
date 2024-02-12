<?php
session_start();
include("database/db.php");
 
if(isset($_POST['upload'])){
   	$maxsize = 5242880; // 5MB
   
   	$txt = $_REQUEST['subject'];
   	$myfile = fopen("newfile.txt", "w") or die("Unable to open file!");
	fwrite($myfile, $txt);
	fclose($myfile);
	$name = $_REQUEST['title'];
	$extension = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
	$target_dir = "issues/";
    $target_file = $target_dir . $name;
   if(isset($_FILES['file']['name']) && $_FILES['file']['name'] != ''){
       $name = $_FILES['file']['name'];
       $target_dir = "issues/";
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


<!--<?php 
  session_start();
?>-->
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>HB Forum</title>
    <link rel="stylesheet" href="style/forum.css" />
    <link rel="stylesheet" href="style/navbar.css" />
    <link rel="stylesheet" href="style/footer.css" />
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
  </head>
  <body>
    <!-- Navbar Section -->
    <?php include 'Navbar.php';?>
    
    <!-- SEARCH BAR -->
    <div class="search_bar">
      <input type="text" id="search" placeholder="Search your issue...">
    </div>
    <div class="forum_main_container">
      <div class="forum_main_top">
        <h1>Latest issues</h1>
        
        
        
<?php 
    $connection =  new mysqli("localhost", "root", "" , "Healthy-Bros-DB"); // Establishing Connection with Server
    //$db = mysql_select_db("Healthy-Bros-DB", $connection); // Selecting Database
    //MySQL Query to read data
    $query = mysqli_query($connection , "SELECT * FROM posts");
    while ($row = mysqli_fetch_array($query)) {
		 echo'<div class="topic-list">';
          echo'<ul class="content">';
            echo'<div class="top_flex">';
              //<!-- img start -->
              echo'<a class="pull-left" href="account.php">';
                echo'<img 
                  class="avatar" src="https://www.gravatar.com/avatar/afe65b6166482ebd026878fa71d764d1?size=192&d=mm" 
                  alt="username"
                  component="avatar/picture"
                  data-original-title="username"
                >';
              echo'</a>';
              //<!-- img end -->
              //<!-- START ISSUE --> ?>
              <h3>
                 <a href="forum_issue.php?titl=<?php echo $row['title']; ?>"  class="issue_links">
                   <?php
                       echo $row["title"]
                   ?>
                   
                </a>
                
              </h3>
              <?php
              //<!-- END ISSUE -->
              echo'<div class="post_view_flex">';
                echo'<h2>';
                  echo $row["replies"] . " POSTS";
                echo'</h2>';
                

                echo'<h2>';
                  echo $row["views"] . " VIEWS";
                echo'</h2>';
              echo'</div>';
            echo'</div> ';
            echo'<div class="bottom_flex">';
              //<!-- START SOME TEXT -->
              echo'<li class="f_item">';
               echo'<p>About # hours/days before</p>';
              echo'</li>';
              //<!-- END SOME TEXT -->
              echo'<li class="a_item">';

                echo'<div class="navbar__toggl" id="mobile_post">';
                ?>
                  <a href="forum_issue.php?titl=<?php echo $row['title']; ?>">
                 <?php   
                    echo'<i class="fa fa-arrow-circle-right"></i>';
                    echo'<span>';
                    	echo $row["replies"];
                    echo'</span>';
                  echo'</a>';
                echo'</div>';
              echo'</li>';
            echo'</div>';
          echo'</ul>';
        echo'</div>';
        //<!-- FIRST ISSUE END -->
        
    }
     

?>
        
        
        
        
    </div>
      <!-- dd -->
      <div class="forum_main_bottom">
        <h1>Most common issues</h1>
        <!-- FIRST ISSUE -->
        <!-- FIRST ISSUE START -->
        <?php 
    $connection =  new mysqli("localhost", "root", "" , "Healthy-Bros-DB"); // Establishing Connection with Server
    //$db = mysql_select_db("Healthy-Bros-DB", $connection); // Selecting Database
    //MySQL Query to read data
    $query = mysqli_query($connection , "SELECT * FROM posts ORDER BY views desc");
    $t1=0;
    while ($row = mysqli_fetch_array($query)) {
      if($t1<2) {
        $t1=$t1+1;
        echo'<div class="topic-list">';
          echo'<ul class="content">';
            echo'<div class="top_flex">';
              //<!-- img start -->
              echo'<a class="pull-left" href="account.php">';
                echo'<img 
                  class="avatar" src="https://www.gravatar.com/avatar/afe65b6166482ebd026878fa71d764d1?size=192&d=mm" 
                  alt="username"
                  component="avatar/picture"
                  data-original-title="username"
                >';
              echo'</a>';
              //<!-- img end -->
              //<!-- START ISSUE --> ?>
              <h3>
                 <a href="forum_issue.php?titl=<?php echo $row['title']; ?>"  class="issue_links">
                   <?php
                       echo $row["title"]
                   ?>
                   
                </a>
                
              </h3>
              <?php
              //<!-- END ISSUE -->
              echo'<div class="post_view_flex">';
                echo'<h2>';
                  echo $row["replies"] . " POSTS";
                echo'</h2>';
                

                echo'<h2>';
                  echo $row["views"] . " VIEWS";
                echo'</h2>';
              echo'</div>';
            echo'</div> ';
            echo'<div class="bottom_flex">';
              //<!-- START SOME TEXT -->
              echo'<li class="f_item">';
               echo'<p>About # hours/days before</p>';
              echo'</li>';
              //<!-- END SOME TEXT -->
              echo'<li class="a_item">';

                echo'<div class="navbar__toggl" id="mobile_post">';
                ?>
                  <a href="forum_issue.php?titl=<?php echo $row['title']; ?>">
                 <?php   
                    echo'<i class="fa fa-arrow-circle-right"></i>';
                    echo'<span>';
                    	echo $row["replies"];
                    echo'</span>';
                  echo'</a>';
                echo'</div>';
              echo'</li>';
            echo'</div>';
          echo'</ul>';
        echo'</div>';
        //<!-- FIRST ISSUE END -->
        }
        
    }
     

?>
      </div>
    </div>
    <!-- FORM SUBMIT FOR ISSUES OF USERS -->
    <div class="form_submit">
      <h3>Issue Form</h3>
      <div class="forum_container">
      	<form>
      	</form>
        <form action="back/post.php" method="post" enctype='multipart/form-data'>
        	<input type="text" name="title" placeholder="Title of issue">
        	<label for="subject">Your issue</label>
        	<textarea id="subject" name="subject" placeholder="Write something.." style="height:200px"></textarea>
        	<input type="submit" value="Submit" name='upload'>
        </form>
      </div>
    </div>
    <!-- Footer Section -->
    <?php include 'footer.php';?>
    
  </body>
</html>
