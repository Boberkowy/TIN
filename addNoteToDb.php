<?php

include ("db.php");
session_start();

if(!isset($_SESSION['login'])){
    header("location: index.php");

}
if(isset ($_POST['submitBtn'])){
    $file = $_FILES['photo'];
    $filesize = $_FILES['photo']['size'];
    if(mime_content_type($file) != 'image/gif'){
        $_SESSION['formatError'] = "plik nie jest obrazkiem";
        echo $_SESSION['formatError'];
    //    header("location: addNote.php");
    }else echo "chuj";}
//    if($filesize == 0 || $filesize > 2097152 ) {
//        $_SESSION['sizeError'] = "Zdjęcie nie może przekraczać 2 megabajtów";
//        header("location: addNote.php");
//    }
//    $title = mysqli_real_escape_string($db,$_POST['titleInput']);
//    $noteContent = mysqli_real_escape_string($db,$_POST['noteContentInput']);
//    $date = date ("Y-m-d H:i:s", time());
//    $photo = addslashes (file_get_contents($_FILES['photo']['tmp_name']));
//    $userid = $_SESSION['login'];
//
//    $noteQuery = "INSERT INTO notes(`title`, `date`, `content`, `UserID`) VALUES ('$title','$date', '$noteContent', '$userid')";
//    $result = mysqli_query($db,$noteQuery);
//    $noteIDQuery = "SELECT NoteID from notes WHERE title = '$title'";
//    $noteIDResult = mysqli_query($db,$noteIDQuery);
//    $row = mysqli_fetch_array($noteIDResult, MYSQLI_ASSOC);
//    $NoteID = $row['NoteID'];
//    if(isset($photo)) {
//        $photoQuery = "INSERT INTO photos (`photo`, `NoteID`) VALUES ('$photo', '$NoteID')";
//        $photoResult = mysqli_query($db, $photoQuery);
//    }
//    if($photoResult == 1){
//        if($_SESSION['role'] == 'admin'){
//            header("location: Admin/adminNotes.php");
//    }else{
//        header("location: profile.php");}
//    }
//   else{
//      echo "coś się popsuło";
//
//    }?>