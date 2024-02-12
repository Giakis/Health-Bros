<?php
  session_start();
?><!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>HTML CSS Website</title>
    <link rel="stylesheet" href="style/forum_issue.css" />
    <link rel="stylesheet" href="style/navbar.css" />
    <link rel="stylesheet" href="style/footer.css" />
    <!-- <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.14.0/css/all.css" integrity="sha384-HzLeBuhoNPvSl5KYnjx0BT+WB0QEEqLprO+NBkkk5gbc67FTaL7XIGa2w1L0Xbgc" crossorigin="anonymous" />
    <link href="https://fonts.googleapis.com/css2?family=Kumbh+Sans:wght@400;700&display=swap" rel="stylesheet" /> -->

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

    <div class="forum_main_container">
        <div class="forum_main_top">

          <?php
          $connection =  new mysqli("localhost", "root", "" , "Healthy-Bros-DB");
            echo'<div class="issue">';
                echo'<h1>'; 
                    if(isset($_GET['titl'])) {
    			$new_variable = $_GET['titl'];
    			echo $new_variable;
		    }
                echo'</h1>';
            echo'</div>';
          ?>
            <ul class="post_container">


                
                <!-- FIRST POST START -->
                
                <?php
                    $connection =  new mysqli("localhost", "root", "" , "Healthy-Bros-DB"); // Establishing Connection with Server
                    $title = $_GET['titl'];
                    $post_id = mysqli_query($connection,"SELECT id FROM posts WHERE title='$title'");
                    
                    while ($row = mysqli_fetch_array($post_id)) {
                        $id= $row['id'];
                    
                    }
                    $_SESSION['post_id'] = $id;
                    $_SESSION['reply'] = $title;
                    $sql = "UPDATE posts SET views=views+1 WHERE title='$title'";
                    $connection->query($sql);
    		     $query = mysqli_query($connection , "SELECT * FROM posts WHERE title='$title'");
    		     while ($row = mysqli_fetch_array($query)) {
    		        $tb=$row['user_id'];
		        $sql=mysqli_query($connection , "SELECT username FROM user WHERE id=$tb") ;
		        $username="";
		        while ($r = mysqli_fetch_array($sql)) {
                           $username= $r['username'];
                       }
		        echo'<div class="avatars-container">';
		            echo'<div class="avatars">';
		                echo'<img src="https://www.gravatar.com/avatar/afe65b6166482ebd026878fa71d764d1?size=192&d=mm" alt="username" component="avatar/picture" data-original-title="username">';
		                echo'<i component="user/status" class="fa fa-circle status offline" title="Offline" data-original-title="Offline"></i>';
		            echo'</div>';
		        echo'</div>';
		        echo'<li class="post">';

		            echo'<div class="post_content">';

		                echo'<div class="top-post-content">';
		                    echo'<small class="post_author">'; ?>
		                      <a href="account.php"><?php echo $username?></a>
		                    <?php
		                    echo'</small>';

		                    echo'<small class="pull-right">';
		                      echo'<span class="bookmarked">';
		                      echo'<i class="fa fa-bookmark-o"></i>';
		                      echo'</span>';
		                    echo'</small>';

		                    echo'<small class="pull-right">';
		                      echo'<span class="time">Feb 26, 2022, 3:48AM</span>';
		                    echo'</small>';
		                echo'</div>';

		                echo'<div class="bottom-post-content">';
		                    if(isset($_GET['titl'])) {
    			                $name = $_GET['titl'];
    					$myfile = fopen("issues/$name.txt", "r") or die("Unable to open file!");
    					echo'<p>';
				            echo fread($myfile,filesize("issues/$name.txt"));
				        echo'</p>';
			  	        fclose($myfile);
		    		    }
		                   
			  	    
		                    //echo'<p>';
		                        
		                    //echo'</p>';
		                echo'</div>';
		                echo'<div class="reply-footer">';
		                  echo'<div class="left-reply">';
		                    echo'<a href=""># replies</a>';
		                  echo'</div>';
		                  echo'<div class="right-reply">';
		                    echo'<a href="">Reply</a>';
		                    echo'<span class="votes">';
		                      echo'<a href="">';
		                        echo'<i class="fa fa-thumbs-up"></i>';
		                      echo'</a>';
		                      echo'<span id="likes" data-votes="0">0</span>';
		                    echo'</span>';
		                    //<!-- <span data-votes="0">0</span> -->
		                    echo'<span class="votes">';
		                      echo'<a href="">';
		                        echo'<i class="fa fa-thumbs-down"></i>';
		                      echo'</a>';
		                      echo'<span id="likes" data-votes="0">0</span>';
		                    echo'</span>';
		                    //<!-- <span data-votes="0">0</span> -->
		                  echo'</div>';
		                echo'</div>';
		            echo'</div>';
		        echo'</li>';
		        //<!-- FIRST ISSUE END -->    
		     }       

		

		     $query = mysqli_query($connection , "SELECT * FROM comments WHERE post_id=$id"); 
		     $temp=0;
		     while ($row = mysqli_fetch_array($query)) {
		        $tb=$row['user_id'];
		        $sql=mysqli_query($connection , "SELECT username FROM user WHERE id=$tb") ;
		        $username="";
		        while ($r = mysqli_fetch_array($sql)) {
                           $username= $r['username'];
                       }
		     
		        echo'<div class="avatars-container">';
		            
		            echo'<div class="avatars">';
		                echo'<img src="https://www.gravatar.com/avatar/afe65b6166482ebd026878fa71d764d1?size=192&d=mm" alt="username" component="avatar/picture" data-original-title="username">';
		                echo'<i component="user/status" class="fa fa-circle status offline" title="Offline" data-original-title="Offline"></i>';
		            echo'</div>';
		        echo'</div>';
		        echo'<li class="post">';

		            echo'<div class="post_content">';

		                echo'<div class="top-post-content">';
		                    echo'<small class="post_author">';?>
		                      <a href="/account.html"><?php echo $username ?></a>
		                    <?php
		                    echo'</small>';

		                    echo'<small class="pull-right">';
		                      echo'<span class="bookmarked">';
		                      echo'<i class="fa fa-bookmark-o"></i>';
		                      echo'</span>';
		                    echo'</small>';

		                    echo'<small class="pull-right">';
		                      echo'<span class="time">Feb 26, 2022, 3:48AM</span>';
		                    echo'</small>';
		                echo'</div>';

		                echo'<div class="bottom-post-content">';
		                  while (TRUE) {
		                    if(isset($_GET['titl'])) {
    			                $name = $_GET['titl'];
    			                $name = $name . $temp;
    			                $temp=$temp+1;
    			                if (file_exists("replies/$name.txt")){
    					    $myfile = fopen("replies/$name.txt", "r") or die("Unable to open file!");
    					    echo'<p>';
				                echo fread($myfile,filesize("replies/$name.txt"));
				            echo'</p>';
			  	            fclose($myfile);
			  	            break;
			  	        }
		    		    }
		    		  }
              echo'<div class="reply-footer">';
		                	echo'<div class="left-reply">';
		                		echo'<a href=""># replies</a>';
		                  	echo'</div>';
		                  	echo'<div class="right-reply">';
		                    	echo'<a href="">Reply</a>';
		                    	$cid = $row['id'];
								echo'<span class="votes">';
									echo'<a href="">';
									?>
									<!-- <span class="unlike fa fa-thumbs-up" id="<?php echo $cid; ?>" onclick="unlikeFunction(this ,id)"><?php echo $row['likes']; ?></span> -->
									<i class="fa fa-heart" aria-hidden="true" id="heart" onClick="like(this,id)"><?php echo $row['likes'];?></i> 
									 <?php
									echo'</a>';
								echo'</span>';  
		                  	echo'</div>';
		                echo'</div>';
		            echo'</div>';
		        echo'</li>';
		        //<!-- FIRST ISSUE END -->    
		     }    
                ?>
            </ul>
            <form>
            </form>
            <form action="back/reply.php?titl=$title" method="post" enctype='multipart/form-data'>
    		<textarea id="subject" name="subject" placeholder="Write a reply..." style="height:200px"></textarea>
        	<input type="submit" value="Reply" name="upload">
	    </form>
        </div>
        <!-- dd -->
        <div class="forum_main_bottom">
            <h1>Related issues</h1>
            <!-- FIRST ISSUE -->
            <?php 
    $connection =  new mysqli("localhost", "root", "" , "Healthy-Bros-DB"); // Establishing Connection with Server
    //$db = mysql_select_db("Healthy-Bros-DB", $connection); // Selecting Database
    //MySQL Query to read data
    if(isset($_GET['titl'])) {
    	$t = $_GET['titl'];
    }
    $query = mysqli_query($connection , "SELECT * FROM posts");
    $total_related = 0;
    while ($row = mysqli_fetch_array($query)) {
        
        $relating=similar_text($t, $row['title']);
        $c1 = strlen($t);
        $c2 = strlen($row['title']);
        if(($relating/($c1+$c2)) > 0.2 && $t!=$row['title']){
        $total_related = $total_related+1;
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
     if($total_related==0){
        	echo'No related issues found!';
        }

?>
            
        </div>
    </div>
    <!-- FORM SUBMIT FOR ISSUES OF USERS -->
    <div class="form_submit">
      <h3>Issue Form</h3>
      <div class="forum_container">
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


    
    <script>
	    function like(x , id) {
         
      x.classList.toggle("fa-heart");
      //num=document.getElementById(id).id;
      
      <?php 
        $number = '<script>document.writeln(localStorage.getItem("cid"));</script>';
        $sql = "UPDATE comments SET likes=likes+1 WHERE id=$a";
        connection->query($sql);
      ?>
       }
    </script>	
    
    // <script>
    // 	function unlikeFunction(x , id) {
    //         x.classList.toggle("fa-heart");
    //         num=document.getElementById(id).id;
	  //   	<?php 
    //             $number = '<script>document.writeln(localStorage.getItem("num"));</script>';
    //             $sql = "UPDATE comments SET likes=likes+1 WHERE id=num";
    //             $connection->query($sql);
    //         ?>
    // 	}
    // </script>
   
</body>

</html>