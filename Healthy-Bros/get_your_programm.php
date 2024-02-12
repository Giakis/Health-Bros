<?php
    include 'database/db.php';
    session_start();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>HTML CSS Website</title>
    <link rel="stylesheet" href="style/get_your_programm.css" />
    <link rel="stylesheet" href="style/navbar.css" />
    <link rel="stylesheet" href="style/footer.css" />
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.14.0/css/all.css" integrity="sha384-HzLeBuhoNPvSl5KYnjx0BT+WB0QEEqLprO+NBkkk5gbc67FTaL7XIGa2w1L0Xbgc" crossorigin="anonymous" />
    <link href="https://fonts.googleapis.com/css2?family=Kumbh+Sans:wght@400;700&display=swap" rel="stylesheet" />
    
    
</head>

<body>
    <!-- Navbar Section -->
    <?php include 'Navbar.php';?>

    <div class="programm_main_container">
        
        <?php
            $uid = $_SESSION['id'];
            $query = mysqli_query($conn, "SELECT * FROM programms WHERE user_id=$uid");
            
        ?>
        
        <!-- dd -->
        <?php
            $temp=0;
            if(mysqli_num_rows($query) > 0) {
                while($row = mysqli_fetch_array($query)) {
                    $loc=$row['location'];
                    $temp=$temp+1;
        ?>     
	            <a href="user_program.php?loc=<?php echo $loc ?>">Programm<?php echo "   ".$temp?></a>

                
            <?php }
            } else {
                echo'<div class="Text">';
			echo'<p>';
				echo'NO DATA TO DISPLAY. CREATE A PROGRAMM WITH THE FORM BELOW';
			echo'</p>';
	    
		echo'</div>';
            }
            ?>
        
        
        <h1>Complete the following data</h1>
        <div class="programm_main_top">

            <div class="form_submit">
                <div class="programm_container">
                    <form>
                    </form>
                    <form id="form" action="back/program_production.php" method="post">
                        <label for="fage">Your age</label>
                        <input type="text" id="fage" name="age" placeholder="Your age.." required>

                        <label for="fweight">Your weight</label>
                        <input type="text" id="fweight" name="weight" placeholder="Your weight.." required>

                        <label for="fheight" id="lheight">Your height</label>
                        <input type="text" id="fheight" name="fheight" placeholder="Your height.." required>

                        <label for="fgender">Your gender</label>
                        <select id="fgender" name="gender" placeholder="Your gender..">
                            <!-- <option value=""> </option> -->
                            <option value="Male">Male</option>
                            <option value="Female">Female</option>
                        </select> 
                        <!-- <span id="errorGender"></span> -->

                        <label for="fgoal">Your goal</label>
                        <!-- <span id="errorGoal"></span> -->
                        <select id="fgoal" name="goal" placeholder="Your goal..">
                            <!-- <option value="empty"></option> -->
                            <option value="lose weigths">Lose weights</option>
                            <option value="body line">Body line</option>
                            <option value="physical condition">Physical condition</option>
                        </select> 
                        <!-- <span id="errorGoal"></span> -->

                        <span id="error"></span>

                        <!-- checkboxes -->
                        <h1>Select your excersizes</h1>
                        <label class="container">Chest
                            <input type="checkbox" name="chest">
                            <span class="checkmark"></span>
                        </label>
                        <label class="container">Arms
                            <input type="checkbox" name="arms">
                            <span class="checkmark"></span>
                        </label>
                        <label class="container">Butt
                            <input type="checkbox" name="butt">
                            <span class="checkmark"></span>
                        </label>
                        <label class="container">Legs
                            <input type="checkbox" name="legs">
                            <span class="checkmark"></span>
                        </label>

                        <!-- Radio buttons -->
                        <h1>Select your time for excersize</h1>
                        <input type="radio" id="time1" name="time" value="20" checked="checked">
                        <label for="time1">15 - 20 mins</label><br>
                        <input type="radio" id="time2" name="time" value="30">
                        <label for="time2">20 - 30 mins</label><br>  
                        <input type="radio" id="time3" name="time" value="35">
                        <label for="time3">30 - 35 mins</label><br>
                        <input type="radio" id="time4" name="time" value="40">
                        <label for="time4">35 - 40 mins</label><br>
                        <input type="radio" id="time5" name="time" value="45">
                        <label for="time5">40 - 45 mins</label><br>
                        <input type="radio" id="time6" name="time" value="60">
                        <label for="time6">45 - 60 mins</label><br>
                        <input type="radio" id="time7" name="time" value="90">
                        <label for="time7">60 - 90 mins</label><br>
            
                        <input type="submit" value="Submit" name="upload">
                    </form>

                </div>
              </div>

        </div>

        

    </div>
    <!-- Footer Section -->
    <?php include 'footer.php';?>
    <script src="handling/programm.js"></script>
</body>

</html>
