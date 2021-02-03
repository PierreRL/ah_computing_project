<?php
session_start();

$user = 'root';
$pass = '';
$dbname = 'tennis_club';

$conn = mysqli_connect('localhost', $user, $pass, $dbname);

if (!$conn) {
    die('Error connecting to database.');
}
if(isset($_POST['tueTraining']) && $_POST['tueTraining'] == 1) {
    $tueTraining = TRUE;
}
else {
    $tueTraining = FALSE;
}
if(isset($_POST['wedTraining']) && $_POST['wedTraining'] == 1) {
    $wedTraining = TRUE;
}
else {
    $wedTraining = FALSE;
}
if(isset($_POST['thuTraining']) && $_POST['thuTraining'] == 1) {
    $thuTraining = TRUE;
}
else {
    $thuTraining = FALSE;
}
if (!isset($_SESSION["ID"])) {
    die('error');
}
$id = $_SESSION["ID"];


$sql = "UPDATE `member` SET tueTraining='$tueTraining', wedTraining='$wedTraining', thuTraining='$thuTraining'  WHERE ID='$id'";


$result = mysqli_query($conn, $sql);

if (!$result) {
    die('Error connecting to database.');
}

mysqli_close($conn);

header('Location: ../pages/training.php');