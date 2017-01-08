<?php
include 'db.php';
session_start();
$title = mysqli_real_escape_string($db,$_POST['titleInput']);
$content = mysqli_real_escape_string($db,$_POST['noteContentInput']);
$noteID = mysqli_real_escape_string($db, $_POST['NoteID']);

echo $title;
echo $content;
echo $noteID;

if(isset($_POST['submitBtn'])) {

    $query = "UPDATE notes SET `title` = '$title', `content` = '$content' WHERE `NoteID` = '$noteID'";
    $result = mysqli_query($db, $query);

    if ($result == true) {
        if ($_SESSION['role'] == 'admin')
            header("location: Admin/notesList.php");
        else
            header("location: index.php");
    } else {
        header("location:javascript://history.go(-1)");

    }
}