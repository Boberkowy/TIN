<?php

include ("db.php");
session_start();

if(!isset($_SESSION['login'])){
    header("location: index.php");

}
if(isset ($_POST['submitBtn'])){
    $imageMimeTypes = array(
        'image/png',
        'image/gif',
        'image/jpeg');

    if(!isset($_FILES)){
        $fileMimeType = mime_content_type($_FILES['photo']['tmp_name']);
        $fileSize = $_FILES['photo']['size'];

        if(!in_array($fileMimeType, $imageMimeTypes)){
        $_SESSION['formatError'] = "plik nie jest obrazkiem";
        echo $_SESSION['formatError'];
        //header("location: addNote.php");
        exit();
    }  if($fileSize == 0 || $fileSize > 2097152 ) {
            $_SESSION['sizeError'] = "Zdjęcie nie może przekraczać 2 megabajtów";
            header("location: addNote.php");
            exit();
        }}

    $title = mysqli_real_escape_string($db,$_POST['titleInput']);
    $noteContent = mysqli_real_escape_string($db,$_POST['noteContentInput']);
    $date = date ("Y-m-d H:i:s", time());
    $photo = $_FILES['photo']['tmp_name'];
    $userid = $_SESSION['login'];

    $noteQuery = "INSERT INTO notes(`title`, `date`, `content`, `UserID`) VALUES ('$title','$date', '$noteContent', '$userid')";
    $result = mysqli_query($db,$noteQuery);
    $noteIDQuery = "SELECT NoteID from notes WHERE title = '$title'";
    $noteIDResult = mysqli_query($db,$noteIDQuery);
    $row = mysqli_fetch_array($noteIDResult, MYSQLI_ASSOC);
    $NoteID = $row['NoteID'];
    if(isset($photo)) {
        for ($count = 0; $count < count($_FILES['photo']); $count++) {

            $tmpName[$count]  = $_FILES['photo']['tmp_name'][$count];

            $fp[$count]   = fopen($tmpName[$count], 'r');
            $data[$count] = fread($fp[$count], filesize($tmpName[$count]));
            $data[$count] = addslashes($data[$count]);
            fclose($fp[$count]);


            $photoToDb = $_FILES['photo'][$count];
            $photoQuery = "INSERT INTO photos (`photo`, `NoteID`) VALUES ('$data[$count]', '$NoteID')";
            $photoResult = mysqli_query($db, $photoQuery);
    }}
    if($photoResult == 1){
        if($_SESSION['role'] == 'admin'){

            $_SESSION['formatError'] = null;
            $_SESSION['sizeError'] = null;

            header("location: Admin/adminNotes.php");

    }else{
            $_SESSION['formatError'] = null;
            $_SESSION['sizeError'] = null;
        header("location: profile.php");}

    }
   else {
       echo "coś się popsuło";

   }}?>