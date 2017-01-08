<?php
include '../db.php';
session_start();
$login = mysqli_real_escape_string($db,$_POST['login']);
$password = mysqli_real_escape_string($db,$_POST['password']);
$userID = mysqli_real_escape_string($db,$_POST['UserID']);
$email = mysqli_real_escape_string($db,$_POST['email']);
$role = mysqli_real_escape_string($db,$_POST['role']);


if(isset($_POST['submitBtn'])) {

    $query = "UPDATE users SET `Login` = '$login', `Password` = '$password' ,`Email` = '$email' , `Role` = '$role' WHERE `userID` = '$userID'";
    $result = mysqli_query($db, $query);

    if ($result == true) {
        if ($_SESSION['role'] == 'admin')
            header("location: usersList.php");
        else echo "Nie mozna bylo edytować ziomeczka";

    }
}