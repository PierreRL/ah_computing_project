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
            <li><a class="selected" href="about_club.php">About Club</a></li> <span class="nav-divider">|</span>
            <li><a href="club_officials.php">Club Officials</a></li>
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
        <h1 class="title-text">About Club</h1>
        <div class="card-container">
            <h2 class="subtitle-text">Courts</h2>
            <p class="card-descriptor">Our courts are hard-surface synthetic courts allowing for a good bounce while still keeping you light on your toes.
                There are 4 doubles courts, which are each cleaned and sprayed once a week.
                Courts can be booked at the clubhouse or can be played at any other time if they are free.</p>
        </div>
        <div class="card-container">
            <h2 class="subtitle-text">Facilities</h2>
            <p class="card-descriptor">Behind our courts you will find the clubhouse. In the clubhouse you will find everything you may need including toilets,
                a kitchen, a bar, tennis balls and rackets and a television. The clubhouse can be booked by an independent party for events
                in out of hours times. Get in contact to book.</p>
        </div>
        <div class="card-container">
            <h2 class="subtitle-text">Location</h2>
            <p class="card-descriptor">The courts can be found on 45 West Avenue in Edinburgh - postcode EH11 6HE. The clubhouse is behind the courts but can also be
                accessed from the road behind on Barkley St.</p>
        </div>
    </main>

    <footer>
        Contact us at 0800 896 745 or email rbtennis@gmail.com
    </footer>

    <body>

</html>