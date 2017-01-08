<?php
include 'db.php';
session_start();

$userID = mysqli_real_escape_string($db, $_SESSION['login']);

$query = "SELECT `date` FROM `notes` WHERE `userID` = '$userID'";
$result = mysqli_query($db,$query);

while($row = mysqli_fetch_array($result,MYSQLI_ASSOC)){
    echo $row['date'];
    echo "<br/>";
}
