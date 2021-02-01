<?php // Start the session 
session_start();
?>
<!DOCTYPE html>
<html>

<head>
    <title>Tennis Club</title>
    <link rel="shortcut icon" href="images/logo.png" />
    <link rel="stylesheet" href="css/main_style.css">
    <link rel="stylesheet" href="css/home_style.css">
</head>

<body>

    <nav>
        <ul id="navigation-list">
            <li><a class="selected" href="index.php">Home</a></li> <span class="nav-divider">|</span>
            <li><a href="pages/about_club.php">About Club</a></li> <span class="nav-divider">|</span>
            <li><a href="pages/club_officials.php">Club Officials</a></li>
            <?php
            if (isset($_SESSION["loggedIn"]) && $_SESSION["loggedIn"]) {
                echo ' <span class="nav-divider">|</span> <li><a href="pages/training.php">Training</a></li>  <span class="nav-divider">|</span>
                        <li><a href="functions/log_out.php">Log Out</a></li> 
                        <div id="avatar-container">
                        <img id="avatar" src="images/' . $_SESSION["avatar"] . '.png">
                        <p id="avatar-text">' . $_SESSION["firstname"] . ' ' . $_SESSION["surname"] . '</p></div>';
            } else {
                echo '| <li><a href="pages/log_in.php">Log In</a></li>  <span class="nav-divider">|</span> <li><a href="pages/sign_up.php">Sign Up</a></li>';
            }
            ?>
        </ul>
    </nav>
    <main>
        <img id="banner-image" src="images/logo.png">
        <div id="main-center-text">
            <h1 class="title-text">The Royal Burgh Tennis Club</h1>
            <h3 class="subtitle-text"><em>A unqiue and dedicated tennis club</em></h3>
        </div>
    </main>

    <footer>
        Contact us at 0800 896 745 or email rbtennis@gmail.com
    </footer>

    <body>

</html>