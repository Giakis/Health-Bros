
  <!DOCTYPE html>
<html>
<head>
        <title>HB SignUp</title>
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
	<!-- main -->
    <div class="main-w3layouts wrapper">
		<h1>SignUp Form</h1>
		<div class="main-agileinfo">
    <!--ERROR FOR NAME-->
      <?php 
        if (isset($_SESSION['status'])){?>
        <div style="background-color:rgb(255, 223, 128)" class="alert alert-warning alert-dismissible fade show" role="alert" >
        <?= $_SESSION['status']; ?>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
         </div>
        <?php
          unset($_SESSION['status']);
        }?>
			<div class="agileits-top">
				<form action="back/admin.php" method="post">
					<input class="text email" type="email" name="email" placeholder="Email" required="">
					<input type="submit" name="submit" value="Add admin">
				</form>
			</div>
		</div>
	</div>
	<!-- //main -->

    <!-- Footer Section -->
    <?php include 'footer.php';?>
    <script src="handling/app.js"></script>
</body>
</html>

