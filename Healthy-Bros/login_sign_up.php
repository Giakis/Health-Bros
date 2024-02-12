<?php   
    session_start();
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>HTML CSS Website</title>
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

    <!-- Login / Sign-up Section -->
    <div class="footer__container">
      <div class="footer__content">
        <div class="footer__title" style="color: rgb(106, 255, 0);">
          <h1>Sign Up</h1>
        </div>
        <div class="footer__form">
          <form action="">
            <div class="footer__form-group">
              <label for="email" style="color: white;">Email</label>
              <input type="email" name="email" id="email" placeholder="crazyguy@gmail.com"/>
            </div>
            <div class="footer__form-group">
              <label for="password" style="color: white;">Password</label>
              <input type="password" name="password" id="password" placeholder="Enter a password"/>
            </div>
            <div class="footer__form-group">
              <label for="password"style="color: white;">Confirm Password</label>
              <input type="password" name="password" id="password" placeholder="Confirm your password"/>
            </div>
            <div class="footer__form-group">
              <label for="name"style="color: white;">Name</label>
              <input type="text" name="name" id="name" placeholder="ex. John Kenny"/>
            </div>
            </div>
            <div class="footer__form-group">
              <label for="name"style="color: white;">City</label>
              <input type="text" name="name" id="name" placeholder="ex. Athens"/>
            </div>
            <div class="footer__form-group">
              <label for="name"style="color: white;">Country</label>
              <input type="text" name="name" id="name" placeholder="ex. Greece"/>
            </div>
            <div class="footer__form-group">
              <label for="name"style="color: white;">Date of Birth</label>
              <input type="text" name="name" id="name" placeholder="ex. 11 / 02 / 1995"/>
            </div>
            <div class="footer__form-group">
              <label for="name" style="color: white;"> 
                <input type="checkbox" name="name" id="name" />
                I agree with the <a href="Terms_of_Service.php">Terms of Service</a>
              </label>
            </div>
            <div class="footer__form-group">
              <button type="submit" class="button">Sign Up</button>
            </div>
          </form>
        </div>
      </div>
    </div>

    <!-- Footer Section -->
    <?php include 'footer.php';?>
  </body>
</html>
