<?php
include '../db.php';
session_start();
$userID = mysqli_real_escape_string($db,$_GET['id']);
if(isset($_GET['id'])){

    $query = "DELETE FROM  users WHERE `userID` = '$userID'";
    $result = mysqli_query($db,$query);
    if($result){
        if($_SESSION['role'] == 'admin'){
            header("location: usersList.php");
        }else{
            header("location: profile.php");
        }
    }
    else{
        echo "Nie udało się usunąć wpisu";
    }
}