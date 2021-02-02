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
$firstname = $_POST["firstname"];
$surname = $_POST["surname"];
$password = $_POST["password"];

$password = password_hash($password, PASSWORD_DEFAULT);
if ($password == false) {
    die('Error hashing password');
}
$avatar = $_POST["avatar"];
$sqlverify = "SELECT ID FROM member WHERE email='$email'";

$result = mysqli_query($conn, $sqlverify);
if (!$result) {
    die('error executing query');
}

if (mysqli_num_rows($result) != 0) {
    $_SESSION["createAccountError"] = true;
    unset($_SESSION['loggedIn']);
    header('Location: ../pages/sign_up.php');
}

$_SESSION["createAccountError"] = false;
$sql = "INSERT INTO member (email, password, firstname, surname, avatar) 
    VALUES ('$email', '$password', '$firstname', '$surname', '$avatar');";

$result = mysqli_query($conn, $sql);
if (!$result) {
    die('Failed to execute query');
}

$sql = "SELECT ID FROM member WHERE email='$email'";
$result = mysqli_query($conn, $sql);

if (!$result || mysqli_num_rows($result) == 0) {
    die('Error fetching database information');
}
$row = mysqli_fetch_array($result, MYSQLI_ASSOC);
$id = $row["ID"];

$_SESSION["ID"] = $id;
$_SESSION["loggedIn"] = true;
$_SESSION["firstname"] = $firstname;
$_SESSION["surname"] = $surname;
$_SESSION["avatar"] = $avatar;
mysqli_close($conn);
header('Location: ../index.php');
