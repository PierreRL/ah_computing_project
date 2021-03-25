<?php // Start the session 
session_start();
?>
<!DOCTYPE html>
<html>

<head>
    <title>Tennis Club</title>
    <link rel="shortcut icon" href="../images/logo.png" />
    <link rel="stylesheet" href="../css/main_style.css">
</head>

<body>


    <nav>
        <ul id="navigation-list">
            <li><a href="../index.php">Home</a></li> |
            <li><a href="about_club.php">About Club</a></li> |
            <li><a href="club_officials.php">Club Officials</a></li>
            <?php
            if (isset($_SESSION["loggedIn"]) && $_SESSION["loggedIn"]) {
                echo ' <span class="nav-divider">|</span> <li><a href="training.php">Training</a></li>  <span class="nav-divider">|</span>
                        <li><a href="../functions/log_out.php">Log Out</a></li> <div id="avatar-container">
                        <img id="avatar" src="../images/' . $_SESSION["avatar"] . '.png">
                        <p id="avatar-text">' . $_SESSION["firstname"] . ' ' . $_SESSION["surname"] . '</p></div>';
            } else {
                echo '| <li><a class="selected" href="log_in.php">Log In</a></li>  <span class="nav-divider">|</span> <li><a href="sign_up.php">Sign Up</a></li>';
            }
            ?>

        </ul>
    </nav>
    <main>
        <form method="POST" action="../functions/authenticate.php">
            <h1 class="title-text">Log In</h1>
            <label>Email</label>
            <input type="text" name="email" placeholder="Email..." maxlength="255" required>
            <label>Password</label>
            <input type="password" name="password" placeholder="Password..." maxlength="30" required>
            <input type="submit" value="Submit" name="submit">
            <?php if (isset($_SESSION["logInError"]) && $_SESSION["logInError"]) {
                echo '<p class="error">There was an error in your email and password.</p>';
            } ?>
        </form>
    </main>

    <footer>
        Contact us at 0800 896 745 or email rbtennis@gmail.com
    </footer>


    <body>

</html>