<?php // Start the session 
session_start();

?>
<!DOCTYPE html>
<html>

<head>
    <title>Tennis Club</title>
    <link rel="shortcut icon" href="../images/logo.png" />
    <link rel="stylesheet" href="../css/main_style.css">
    <link rel="stylesheet" href="../css/sign_up_style.css">
</head>

<body>

    <nav>
        <ul id="navigation-list">
            <li><a href="../index.php">Home</a></li> |
            <li><a href="about_club.php">About Club</a></li> |
            <li><a href="club_officials.php">Club Officials</a></li>
            <?php
            if (isset($_SESSION["loggedIn"]) && $_SESSION["loggedIn"]) {
                echo '| <li><a href="training.php">Training</a></li> | 
                        <li><a href="../functions/log_out.php">Log Out</a></li> <div id="avatar-container">
                        <img id="avatar" src="../images/' . $_SESSION["avatar"] . '.png">
                        <p id="avatar-text">' . $_SESSION["firstname"] . ' ' . $_SESSION["surname"] . '</p></div>';
            } else {
                echo '| <li><a href="log_in.php">Log In</a></li> | <li><a class="selected" href="sign_up.php">Sign Up</a></li>';
            }
            ?>
        </ul>
    </nav>
    <main>
        <form method="POST" action="../functions/create_account.php">

            <h1 class="title-text">Sign Up</h1>
            <label>Email</label>
            <input type="text" name="email" placeholder="Email..." maxlength="255" required>
            <label>First Name</label>
            <input type="text" name="firstname" placeholder="First Name..." maxlength="30" required>
            <label>Surname</label>
            <input type="text" name="surname" placeholder="Surname..." maxlength="30" required>
            <label>Password</label>
            <input type="password" name="password" placeholder="Password..." maxlength="30" required>
            <label>Select Avatar</label>
            <table>
                <tr>
                    <td> <input type="radio" name="avatar" value="red_ball" required></td>
                    <td> <input type="radio" name="avatar" value="orange_ball" required></td>
                    <td> <input type="radio" name="avatar" value="green_ball" required></td>
                    <td> <input type="radio" name="avatar" value="yellow_ball" required></td>
                    <td> <input type="radio" name="avatar" value="racket" required></td>
                    <td> <input type="radio" name="avatar" value="court" required></td>
                </tr>
                <tr>
                    <td> <img class="avatar-choice" src="../images/red_ball.png"></td>
                    <td> <img class="avatar-choice" src="../images/orange_ball.png"></td>
                    <td> <img class="avatar-choice" src="../images/green_ball.png"></td>
                    <td> <img class="avatar-choice" src="../images/yellow_ball.png"></td>
                    <td> <img class="avatar-choice" src="../images/racket.png"></td>
                    <td> <img class="avatar-choice" src="../images/court.png"></td>
                </tr>
            </table>
            <input type="submit" value="Submit" name="submit">
        </form>
        <?php if (isset($_SESSION["createAccountError"]) && $_SESSION["createAccountError"]) {
            echo '<p class="error">That email already exists.</p>';
        } ?>
    </main>

    <footer>
        Contact us at 0800 896 745 or email rbtennis@gmail.com
    </footer>


    <body>

</html>