<?php // Start the session 
session_start();
?>
<!DOCTYPE html>
<html>

<head>
    <title>Tennis Club</title>
    <link rel="shortcut icon" href="../images/logo.png" />
    <link rel="stylesheet" href="../css/main_style.css">
    <link rel="stylesheet" href="../css/larger_page.css">
</head>

<body>

    <nav>
        <ul id="navigation-list">
            <li><a href="../index.php">Home</a></li> <span class="nav-divider">|</span>
            <li><a href="about_club.php">About Club</a></li> <span class="nav-divider">|</span>
            <li><a class="selected" href="pages/club_officials.php">Club Officials</a></li>
            <?php
            if (isset($_SESSION["loggedIn"]) && $_SESSION["loggedIn"]) {
                echo ' <span class="nav-divider">|</span> <li><a href="training.php">Training</a></li>  <span class="nav-divider">|</span> 
                        <li><a href="../functions/log_out.php">Log Out</a></li> <div id="avatar-container">
                        <img id="avatar" src="../images/' . $_SESSION["avatar"] . '.png">
                        <p id="avatar-text">' . $_SESSION["firstname"] . ' ' . $_SESSION["surname"] . '</p></div>';
            } else {
                echo '| <li><a href="log_in.php">Log In</a></li>  <span class="nav-divider">|</span> <li><a href="sign_up.php">Sign Up</a></li>';
            }
            ?>
        </ul>
    </nav>
    <main>
        <h1 class="title-text">Club Officials</h1>
        <div class="card-container">
            <h4 class="card-role">President</h4>
            <h2 class="subtitle-text">Boris Becker</h2>
            <img class="card-image" src="../images/boris_becker.png">
            <p class="card-descriptor">Boris is a passionate tennis player with years of experience as a player, coach and club official.
                He has been president for a number of years now and seen the club grow under his leadership.</p>
        </div>
        <div class="card-container">
            <h4 class="card-role">Head Coach</h4>
            <h2 class="subtitle-text">Andy Murray</h2>
            <img class="card-image" src="../images/andy_murray.jpg">
            <p class="card-descriptor">Andy is a world-renowned tennis player but after suffering injuries has decided to retire and
                join us on our journey. He is a patient and effective coach, and is available for both group and 1-on-1 lessons.
            </p>
        </div>
        <div class="card-container">
            <h4 class="card-role">Treasurer</h4>
            <h2 class="subtitle-text">Pablo Escabar</h2>
            <img class="card-image" src="../images/pablo_escabar.jpg">
            <p class="card-descriptor">Pablo's exploits are legendary and we are sure that with his experience of monetary profits,
                the club will have no trouble financing the future.
            </p>
        </div>
    </main>

    <footer>
        Contact us at 0800 896 745 or email rbtennis@gmail.com
    </footer>


    <body>

</html>