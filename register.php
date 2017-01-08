<?php
include ("db.php");
session_start();

if($_SERVER["REQUEST_METHOD"] == "POST") {


    $username = mysqli_real_escape_string($db, $_POST['login']);
    $password = mysqli_real_escape_string($db, $_POST['password']);
    $email = mysqli_real_escape_string($db, $_POST['email']);

    $checkLoginQuery = "SELECT `Login`from users WHERE Login = '$username'";
    $checkEmailQuery = "SELECT `Email` from users WHERE Email = '$email'";
    $loginResult = mysqli_query($db, $checkLoginQuery);
    $passwordResult = mysqli_query($db, $checkEmailQuery);

    if (mysqli_num_rows($loginResult) == 0 && mysqli_num_rows($passwordResult) == 0) {
        $query = "INSERT INTO users (`Login`, `Password`,`Email` ,`Role`) VALUES ('$username', '$password', '$email ' ,'user')";
        $result = mysqli_query($db, $query);
        if ($result == true) {
            if ($_SESSION['role'] == 'admin')
                header("location: Admin/usersList.php");
            else
                header("location: index.php");

        } else {
            header("location:javascript://history.go(-1)");

        }
    }
}
?>