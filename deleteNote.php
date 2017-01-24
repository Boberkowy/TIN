<?php
session_start();
include 'db.php';
$noteId = $_GET['id'];

if(isset($_GET['id'])){
    $query = "DELETE FROM  notes WHERE `NoteID` = '$noteId'";
    $result = mysqli_query($db,$query);
    if($result){
        if($_SESSION['role'] == 'admin'){
            header("location: Admin/notesList.php");
    }else{
        header("location: profile.php");
        }
    }
    else{
        echo "Nie udało się usunąć wpisu";
    }
}