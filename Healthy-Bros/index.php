<?php
    session_start();
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Healthy Bros</title>
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

    <!-- Hero Section -->
    <div class="main">
      <div class="main__container">
        <div class="main__content">
          <h1>MAKE YOUR LIFE</h1>
          <h2>HEALTHIER</h2>
          <p>See what makes up different.</p>
          <!-- <button class="main__btn"><a href="#">Get Started</a></button> -->
        </div>
        <div class="main__img--container">
          <img id="main__img" src="images/pic1.svg" />
        </div>
      </div>
    </div>

    <!-- Services Section -->
    <div class="services">
      <h1>See what the hype is about</h1>
      <div class="services__container">
        <div class="services__card">
          <h2>Programs</h2>
          <p>Start with some new programs</p>
          <button><a href="Video.php">Get Started</a></button>
        </div>
        <div class="services__card">
          <h2>How it works!</h2>
          <p>Take the leap</p>
          <button><a href="how_it_works.php">Get Started</a></button>
        </div>
        <div class="services__card">
          <h2>Diet</h2>
          <p>make it healthy</p>
          <button><a href="Diet.php">Get Started</a></button>
        </div>
        <div class="services__card">
          <h2>Forum</h2>
          <p>Communicate with others</p>
          <button><a href="forum_main.php">Get Started</a></button>
        </div>
      </div>
    </div>
    <!-- Footer Section -->
    <?php include 'footer.php';?>
    <script src="handling/app.js"></script>
  </body>
</html>
