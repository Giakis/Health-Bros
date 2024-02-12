<?php
?>
<!DOCTYPE html>
<html lang="en">
    <!-- Navbar Section -->
    <nav class="navbar">
      <div class="navbar__container">
        <a href="/" id="navbar__logo"><i class="fas fa-gem"></i>Healthy Bros</a>
        <div class="navbar__toggle" id="mobile-menu">
          <span class="bar"></span> <span class="bar"></span>
          <span class="bar"></span>
        </div>
        <ul class="navbar__menu">



        <!--Βλεπει αν εχει acc.Αν δεν εχει τον παει στο singUp ενω αν εχει τον παει στα προγραμματα-->  
        <?php 
          if (isset($_SESSION['email']) ){?>  
            
            <?php 
                  if($_SESSION['cat']=="admin") {?>
                    <li class="navbar__btn"><a href="management-system.php" class="button" >Control Panel</a></li>
                  <?php }?>
            <li class="navbar__item"> <a href="get_your_programm.php" class="navbar__links">My Program</a> </li>
          <?php }else {?>
            <li class="navbar__btn"><a href="loginn.php" class="navbar__links">My Program</a></li>
          <?php }?>
          <li class="navbar__item">
            <a href="Diet.php" class="navbar__links">Diet</a>
          </li>
          <li class="navbar__item">
            <a href="forum_main.php" class="navbar__links">Forum</a>
          </li>
          <!--Βλεπει αν εχει συνδεθει στο acc.Αν δεν εχει συνδεθει τον παει στο logIn ενω αν εχει συνδεθει τον παει στο αρχικο προγραμμα-->  
          <?php 
            if (isset($_SESSION['email']) )
          {?>
              <form action="logout.php" method="post">
                <li class="navbar__btn"><a href="logout.php" class="button" >Log Out</a></li>
              </from> 
              <?php }else {?>
                <li class="navbar__btn"><a href="loginn.php" class="button">Sign Up<br> Log in</a></li>
              <?php }?>
          
          
        </ul>
      </div>
    </nav>
</html>
