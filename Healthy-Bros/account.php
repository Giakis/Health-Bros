<?php
    session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>HTML CSS Website</title>
    <link rel="stylesheet" href="style/account.css" />
    <link rel="stylesheet" href="style/navbar.css" />
    <link rel="stylesheet" href="style/footer.css" />
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.14.0/css/all.css" integrity="sha384-HzLeBuhoNPvSl5KYnjx0BT+WB0QEEqLprO+NBkkk5gbc67FTaL7XIGa2w1L0Xbgc" crossorigin="anonymous" />
    <link href="https://fonts.googleapis.com/css2?family=Kumbh+Sans:wght@400;700&display=swap" rel="stylesheet" />
</head>

<body>
<?php include 'Navbar.php';?>

    <div class="account-main-container">
        <div class="account-main-top">
            <img src="images/account.jpg" alt="gg">
            <div class="avatar-container">
                <div class="avatar">
                    <img src="https://www.gravatar.com/avatar/afe65b6166482ebd026878fa71d764d1?size=192&d=mm" alt="username" component="avatar/picture" data-original-title="username">
                    <i component="user/status" class="fa fa-circle status offline" title="Offline" data-original-title="Offline"></i>
                </div>
            </div>

            <div class="username">
                <h1>@username</h1>
            </div>

            <div class="user-info">
                <a href=""># Fame</a>
                <a href=""># Views of profile</a>
                <a href=""># Posts</a>
                <a href=""># Followers</a>
                <a href=""># Following</a>
            </div>


            <div class="user-connection">
                <h6>
                    Joined Apr 27, 2003, 3:00 AM Last Online about 2 hours ago
                </h6>
            </div>

        </div>

        <div class="account-main-bottom">

            <div class="header">
                <h3>Best posts of the user</h3>
            </div>

            <ul class="post_container">
                <li class="post">
                    <div class="post_content">
                        <div class="top-post-content">
                            <small class="post_author">
                              <a href="">username</a>
                            </small>

                            <small class="pull-right">
                              <span class="bookmarked">
                              <i class="fa fa-bookmark-o"></i>
                              </span>
                            </small>

                            <small class="pull-right">
                              <span class="time">Feb 26, 2022, 3:48AM</span>
                            </small>
                        </div>

                        <div class="bottom-post-content">
                            <p>
                                I've just run an Opera update and all of my Saved Passwords have disappeared.
                                <br> Before I do any other steps, is there a file which I could look for in order to retrieve them? I've just run an Opera update and all of my Saved Passwords have disappeared.
                                <br> Before I do any other steps, is there a file which I could look for in order to retrieve them? I've just run an Opera update and all of my Saved Passwords have disappeared.
                                <br> Before I do any other steps, is there a file which I could look for in order to retrieve them? I've just run an Opera update and all of my Saved Passwords have disappeared.
                                <br> Before I do any other steps, is there a file which I could look for in order to retrieve them? I've just run an Opera update and all of my Saved Passwords have disappeared.
                                <br> Before I do any other steps, is there a file which I could look for in order to retrieve them? I've just run an Opera update and all of my Saved Passwords have disappeared. Before I do any other steps, is there a file
                                which I could look for in order to retrieve them?
                            </p>
                        </div>
                    </div>
                </li>

                <li class="post">
                    <div class="post_content">
                        <div class="top-post-content">
                            <small class="post_author">
                              <a href="">username</a>
                            </small>

                            <small class="pull-right">
                              <span class="bookmarked">
                              <i class="fa fa-bookmark-o"></i>
                              </span>
                            </small>

                            <small class="pull-right">
                              <span class="time">Feb 26, 2022, 3:48AM</span>
                            </small>
                        </div>

                        <div class="bottom-post-content">
                            <p>
                                I've just run an Opera update and all of my Saved Passwords have disappeared.
                                <br> Before I do any other steps, is there a file which I could look for in order to retrieve them? I've just run an Opera update and all of my Saved Passwords have disappeared.
                                <br> Before I do any other steps, is there a file which I could look for in order to retrieve them? I've just run an Opera update and all of my Saved Passwords have disappeared.
                                <br> Before I do any other steps, is there a file which I could look for in order to retrieve them? I've just run an Opera update and all of my Saved Passwords have disappeared.
                                <br> Before I do any other steps, is there a file which I could look for in order to retrieve them? I've just run an Opera update and all of my Saved Passwords have disappeared.
                                <br> Before I do any other steps, is there a file which I could look for in order to retrieve them? I've just run an Opera update and all of my Saved Passwords have disappeared. Before I do any other steps, is there a file
                                which I could look for in order to retrieve them?
                            </p>
                        </div>
                    </div>
                </li>
            </ul>
        </div>
    </div>\
    <!-- Footer Section -->
    <?php include 'footer.php';?>
</body>

</html>
