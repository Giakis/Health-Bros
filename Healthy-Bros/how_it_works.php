<?php 
    session_start();
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>How_It_Works</title>
    <link rel="stylesheet" href="style/styles.css" />
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

    <!--Information Page-->
    <div class="information__container">
        <h1 style="color:rgb(255, 255, 255); position: relative; left:155px; top:110px; font-size: 6em;">If you don't decide;</h1>
        <h1 style="color:rgb(255, 255, 255); position: relative; left:155px; top:130px; font-size: 6em;">Who will?</h1>
        <div class="info_photo--container">
            <img src="images/jogging.png" alt="JoggingPic" style="position:relative; left:-500px; top: -180px;"
                width="400" 
                height="400">"
          </div>

        <h2 style="color: rgb(106, 255, 0); position: relative; left: -510px; top: -100px" >How to start your journey</h2>
        <p style="color: white; position: relative; top: -80px; left: -10px;">
            Welcome to Healthy Bros! Healthy Bros is a platform that allows you to find the best health coach or program for you.
            <br>
            To get started, you simply need to move at the top left of the page and press the sign up button!
            Once that is done, all that is left is to fill a bunch of information about yourself. 
            <br>
            That includes your:
            <ul style="color: white; position: relative; left: -550px; top: -65px;">
                <li>Age</li>
                <li>Height</li>
                <li>Weight</li>
            </ul>
        </p>
        <p style="color: white; position: relative; top: -50px; left: -355px;">
          The process is simple and should not take you more than 5 minutes to get started!</p>
        <h2 style="color: rgb(106, 255, 0); position: relative; left: -430px; top: -20px" >How to find the perfect program for you</h2>
        <p style="color: white; position: relative; top: -0px; left: -185px;">
            Once you have filled out the information, you can search for a program that suits you.
            <br>
            The search is based on the following criteria that you have given us when you have completed your account.
            <br>
            With a fully completed account, you can now hover over the main page of our website and click on the categories of your liking.
            <br>  
            Our categories are:
            <ul style="color: white; position: relative; left: -550px; top: 20px;">
              <li>Workout</li>
              <li>Fitness</li>
          </ul>
          <p style="color: white; position: relative; left: 10px; top: 30px;">Once you have chosen your categories, you will be redirected into pages 
            full of programs that contain exercises that each part of the body. You can choose a program of your linking.</p>
            <br>
            <p style="color: white; position: relative; left: 30px; top: 10px;">
              All programs contain a description from the certified coach and explain what it does. <br>
              With that out of the way, if your time is limited due to work, college or even housework, you can simply add
              your available time to filter the available programs based on the time limitation.
          </p>
          <h2 style="color: rgb(106, 255, 0); position: relative; left: -495px; top: 30px" >What happens with my data?</h2>
          <p style="color: white; position: relative; left: -235px; top: 50px;">
            The data you provide us with your resignation allows our webpage to filter the best programs.
            <br>
            By all means, we do not compromise the data you provide us and no third-party involvement is allowed. We do not <br>
            by any means give, provide or sell the data you provide us with. To find out more on this subject, you can check our <br>
            <a href="Terms_of_Service.html">Terms of service</a> guide that explains our process of data collection and use. 
          </p>

    </div>

    <!-- Back to top button -->
<!--     <div class="back-to-top">
      <a href="#top">
        <i class="fas fa-arrow-up" style="color: rgb(106, 255, 0);"></i>
      </a> -->
    
    <!-- Footer Section -->
    <?php include 'footer.php';?>
  </body>
</html>
