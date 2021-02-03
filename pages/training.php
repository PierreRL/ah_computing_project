<?php // Start the session 
session_start();

$user = 'root';
$pass = '';
$dbname = 'tennis_club';

$conn = mysqli_connect('localhost', $user, $pass, $dbname);

if (!isset($_SESSION["ID"])) {
    die('Error with session');
}
$id = $_SESSION["ID"];

$sql = "SELECT tueTraining, wedTraining, thuTraining FROM member WHERE ID='$id'";

$result = mysqli_query($conn, $sql);

$row = mysqli_fetch_array($result, MYSQLI_ASSOC);

$tueTraining = $row["tueTraining"];
$wedTraining = $row["wedTraining"];
$thuTraining = $row["thuTraining"];
mysqli_close($conn);
?>
<!DOCTYPE html>
<html>

<head>
    <title>Tennis Club</title>
    <link rel="shortcut icon" href="../images/logo.png">
    <link rel="stylesheet" href="../css/main_style.css">
    <link rel="stylesheet" href="../css/larger_page.css">
    <link rel="stylesheet" href="../css/training_style.css">
</head>

<body>

    <nav>
        <ul id="navigation-list">
            <li><a href="../index.php">Home</a></li> <span class="nav-divider">|</span>
            <li><a href="about_club.php">About Club</a></li> <span class="nav-divider">|</span>
            <li><a href="club_officials.php">Club Officials</a></li>
            <?php
            if (isset($_SESSION["loggedIn"]) && $_SESSION["loggedIn"]) {
                echo ' <span class="nav-divider">|</span> <li><a class="selected" href="training.php">Training</a></li>  <span class="nav-divider">|</span>
                        <li><a href="../functions/log_out.php">Log Out</a></li> <div id="avatar-container">
                        <img id="avatar" src="../images/' . $_SESSION["avatar"] . '.png">
                        <p id="avatar-text">' . $_SESSION["firstname"] . ' ' . $_SESSION["surname"] . '</p></div>';
            } else {
                echo '| <li><a href="log_in.php">Log In</a></li>  <span class="nav-divider">|</span> <li><a class="selected" href="sign_up.php">Sign Up</a></li>';
            }
            ?>
        </ul>
    </nav>
    <main>
        <h1 class="title-text">Training Days</h1>
        <form action="../functions/enrollment.php" method="POST">
            <div class="card-container">
                <h4 class="card-role">Junior</h4>
                <h2 class="subtitle-text">Tuesday</h2>
                <?php if ($tueTraining) {
                    echo '<span class="enrolled-text">Enrolled </span> <input type="checkbox" checked name="tueTraining" value="1">';
                } else {
                    echo '<span class="not-enrolled-text">Not Enrolled</span> <input type="checkbox" name="tueTraining" value="1">';
                } ?>
                <p class="card-descriptor">
                    Tuesday night training offers introductory training for juniors. From 5-7pm for £10. Pay when you turn up.
                </p>
            </div>
            <div class="card-container">
                <h4 class="card-role">Senior</h4>
                <h2 class="subtitle-text">Wednesday</h2>
                <?php if ($wedTraining) {
                    echo '<span class="enrolled-text">Enrolled </span> <input type="checkbox" checked name="wedTraining" value="1">';
                } else {
                    echo '<span class="not-enrolled-text">Not Enrolled</span> <input type="checkbox" name="wedTraining" value="1">';
                } ?>
                <p class="card-descriptor">
                    Wednesday nights are games nights. Join our head coach in playing some fun matches all while improving your game.
                </p>
            </div>
            <div class="card-container">
                <h4 class="card-role">Senior</h4>
                <h2 class="subtitle-text">Thursday</h2>

                <?php if ($thuTraining) {
                    echo '<span class="enrolled-text">Enrolled </span> <input type="checkbox" checked name="thuTraining" value="1">';
                } else {
                    echo '<span class="not-enrolled-text">Not Enrolled</span> <input type="checkbox" name="thuTraining" value="1">';
                } ?>

                <p class="card-descriptor">
                    Thursday night training welcome all over 18s to learn the fundamentals of tennis and learn while
                    having fun playing matches.
                </p>
            </div>
            <input type="submit" value="Submit" name="submit">
        </form>
    </main>

    <footer>
        Contact us at 0800 896 745 or email rbtennis@gmail.com
    </footer>


    <body>

</html>