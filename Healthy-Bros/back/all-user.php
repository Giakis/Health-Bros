
<?php
    include 'database/db.php';

$query = mysqli_query($conn , "SELECT * FROM user");
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
                        echo'<a href="">Posts</a>';?>
                        <a href="back/Delete.php?you_id=<?php echo $row['id']?>"> Delete accountt</a>
                        <?php
                    echo'</div>';
                echo'</div>';
            echo'</div>'; 
        echo'</div>';
     } 
     
?>
