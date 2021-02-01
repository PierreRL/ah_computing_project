<?php
session_start();

$user = 'root';
$pass = '';
$dbname = 'tennis_club';

$conn = mysqli_connect('localhost', $user, $pass, $dbname);

if (!$conn) {
    die('Error connecting');
}
$email = $_POST["email"];
$password = $_POST["password"];

$sql = "SELECT password FROM member WHERE email='$email'";

$result = mysqli_query($conn, $sql);
if (!$result) {
    die('Failed to execute query');
}
$row = mysqli_fetch_array($result, MYSQLI_ASSOC);
$authpassword = $row["password"];
if ($password == $authpassword) {
    $sql = "SELECT ID, firstname, surname, avatar FROM member WHERE email='$email'";
    $result = mysqli_query($conn, $sql);

    if (!$result || mysqli_num_rows($result) == 0) {
        die('Error fetching database information');
    }
    $row = mysqli_fetch_array($result, MYSQLI_ASSOC);
    $id = $row["ID"];
    $firstname = $row["firstname"];
    $surname = $row["surname"];
    $avatar = $row["avatar"];

    $_SESSION["ID"] = $id;
    $_SESSION["loggedIn"] = true;
    $_SESSION["firstname"] = $firstname;
    $_SESSION["surname"] = $surname;
    $_SESSION["avatar"] = $avatar;
    $_SESSION["logInError"] = false;
    mysqli_close($conn);
    header('Location: ../index.php');
}
else {
    $_SESSION["logInError"] = true;
    header('Location: ../pages/log_in.php');
}


