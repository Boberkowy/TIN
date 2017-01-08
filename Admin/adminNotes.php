<!DOCTYPE html>
<head>
    <title>Blog Technologie Internetu</title>
    <link rel="stylesheet" type="text/css" href="../css/styles.css" />
    <link rel="stylesheet" type="text/css" href="../css/bootstrap.css"/>
    <link href='http://fonts.googleapis.com/css?family=Amatic+SC&amp;subset=latin,latin-ext' rel='stylesheet' type='text/css'/>
    <script type="text/javascript" src ="../js/jquery-3.1.1.js"></script>
    <script type="application/javascript" src='http://ajax.googleapis.com/ajax/libs/jqueryui/1.8.5/jquery-ui.min.js'></script>
    <script type="application/javascript" src="../js/popup.js"></script>
    <script type="application/javascript" src="../js/confirmDelete.js"></script>

</head>
<?php
include "../notes.php";
if($_SESSION['role'] !='admin'){
    header("location: ../index.php");
    exit();
}
?>
<body>
<div id = "page">

    <div id="name"><a id="namelink" href="../index.php">Blogasek</a>

        <div id="nav_horizontal">
            <span class="btn btn-default"><a href="../addNote.php">DODAJ WPIS</a></span>
            <span class="btn btn-default"><a href="../logout.php">WYLOGUJ</a></span>
        </div>
    </div>

    <div id="nav_vertical">
        <p class= "category">Użytkownicy</p>
        <ul>
            <li><a href="newUser.php">Dodaj użytkownika</a></li>
            <li><a href="usersList.php">Lista użytkowników</a></li>
        </ul>
        <p class="category">Notatki</p>
        <ul>
            <li><a href="notesList.php">Lista notatek</a></li>
            <li><a href="adminNotes.php">Twoje notatki</a></li>
        </ul>
    </div>

    <div id = "content">
        <?php
        selectNotes();
        ?>
    </div>
</div>

<footer>
    <p> Strona stworzona przez Mateusza Owerczuk na projekt zaliczeniowy z przedmiotu TIN.</p>
</footer>
</body>
</html>