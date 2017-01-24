<?php

include ("db.php");
session_start();


if(!isset($_SESSION['login'])){
    header("location: index.php");

}


if(isset($_POST['submitBtn'])){

    $imageMimeTypes = array(
        'image/png',
        'image/gif',
        'image/jpeg');

        if($_FILES['photo']['size'] != 0){
        $fileMimeType = mime_content_type($_FILES['photo']['tmp_name']);
        if(!in_array($fileMimeType, $imageMimeTypes)){
             $_SESSION['formatError'] = "plik nie jest obrazkiem" ;
             header("location: addNote.php");
             exit();
        }}


    $title = mysqli_real_escape_string($db,$_POST['titleInput']);
    $noteContent = mysqli_real_escape_string($db,$_POST['noteContentInput']);
    $date = date ("Y-m-d H:i:s", time());
    $photo = addslashes( file_get_contents($_FILES['photo']['tmp_name']));
    $userid = $_SESSION['login'];

    $noteQuery = "INSERT INTO notes(`title`, `date`, `content`, `UserID`) VALUES ('$title','$date', '$noteContent', '$userid')";
    $result = mysqli_query($db,$noteQuery);


    if(isset($photo)) {
        $noteIDQuery = "SELECT NoteID from notes WHERE title = '$title'";
        $noteIDResult = mysqli_query($db,$noteIDQuery);
        $row = mysqli_fetch_array($noteIDResult, MYSQLI_ASSOC);
        $NoteID = $row['NoteID'];
        $photoQuery = "INSERT INTO photos (`photo`, `NoteID`) VALUES ('$photo', '$NoteID')";
        $photoResult = mysqli_query($db, $photoQuery);
    }
   if($photoResult == true){
       if($_SESSION['role'] == 'admin'){
         $_SESSION['formatError'] = null;
           $_SESSION['sizeError'] = null;
           header("location: Admin/adminNotes.php");

    }else{
            $_SESSION['formatError'] = null;
            $_SESSION['sizeError'] = null;
        header("location: profile.php");
       }
    }
  else {

       echo "coś się popsuło";

  }}?>