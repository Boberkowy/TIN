<?php
include 'db.php';
session_start();
$title = mysqli_real_escape_string($db,$_POST['titleInput']);
$content = mysqli_real_escape_string($db,$_POST['noteContentInput']);
$noteID = mysqli_real_escape_string($db, $_POST['NoteID']);
$photo = $_FILES['photo'];

echo $title;
echo $content;
echo $noteID;

if(isset($_POST['submitBtn'])) {
    $query = "UPDATE notes SET `title` = '$title', `content` = '$content' WHERE `NoteID` = '$noteID'";
    $result = mysqli_query($db, $query);

    if(isset($photo)){
        $photoQuery = "INSERT INTO photos (`photo`, `NoteID`) VALUES ('$photo', '$NoteID')";
        $photoResult = mysqli_query($db, $photoQuery);
    }

    if ($result == true && $photoResult == true) {
        if ($_SESSION['role'] == 'admin')
            header("location: Admin/notesList.php");
        else
            header("location: index.php");
    } else {
        echo ("ERROR");
        //header("location:javascript://history.go(-1)");

    }
}