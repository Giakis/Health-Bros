<?php
    session_start();
?>

<!DOCTYPE html>
<html>
    <head>
        <title>HB Login</title>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
        <!-- Custom Theme files -->
        <link
            rel="stylesheet"
            href="https://use.fontawesome.com/releases/v5.14.0/css/all.css"
            integrity="sha384-HzLeBuhoNPvSl5KYnjx0BT+WB0QEEqLprO+NBkkk5gbc67FTaL7XIGa2w1L0Xbgc"
            crossorigin="anonymous"
        />

        <link href="style/login_signup.css" rel="stylesheet" type="text/css" media="all" />
        <link rel="stylesheet" href="style/styles.css" />
        <!-- //Custom Theme files -->
        <!-- web font -->
        <link href="//fonts.googleapis.com/css?family=Roboto:300,300i,400,400i,700,700i" rel="stylesheet">
        <!-- //web font -->
    </head>
<body>
    <!-- Navbar Section -->
    <?php include 'Navbar.php';?>

    <!-- <nav class="navbar">...-->

	<!-- main -->
	<div class="main-w3layouts wrapper">
		<h1>Login</h1>
		<div class="main-agileinfo">
			<div class="agileits-top">
      <?php 
        if (isset($_SESSION['status'])){?>
          <div style="background-color:rgb(255, 223, 128)" class="alert alert-warning alert-dismissible fade show" role="alert" >
          <?= $_SESSION['status']; ?>
          <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
          </div>
          <?php
          unset($_SESSION['status']);
          
        }
      ?>
				<form action="back/login.php" method="post">
          <form actio="Cookie.php" method="post">
					<!-- <input class="text" type="text" name="Username" placeholder="Username" required=""> -->
					<input class="text email" type="email" name="email" placeholder="Email" required="" id="email">
					<input class="text" type="password" name="password" placeholder="Password" required="" id="password">
        
          <!--Button for remember-->
          <p><input type="checkbox" name="remember" /> Remember me</p>
					<input class="login__button" type="submit" value="Login"> 
          </form>
        </form>
				<p>Don't have an Account? <a href="signup.php"> SignUp Now!</a></p>
			</div>
		</div>
	</div>

  <?php
    echo '<script>alert("The web inlude cookie")</script>';
    if (isset($_COOKIE['email']) && isset($_COOKIE['password'])){
      $email=$_COOKIE['email'];
      $password=$_COOKIE['password'];

  }
?>

	<!-- //main -->
  <!-- Footer Section -->
    <?php include 'footer.php';?>
</body>
</html>
