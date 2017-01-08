<!DOCTYPE html>
<head>
    <title>Blog Technologie Internetu</title>
    <link rel="stylesheet" type="text/css" href="css/styles.css" />
    <link rel="stylesheet" type="text/css" href="css/bootstrap.css"/>
    <link href='http://fonts.googleapis.com/css?family=Amatic+SC&amp;subset=latin,latin-ext' rel='stylesheet' type='text/css'/>
    <script type="text/javascript" src ="js/jquery-3.1.1.js"></script>
    <script type="application/javascript" src='http://ajax.googleapis.com/ajax/libs/jqueryui/1.8.5/jquery-ui.min.js'></script>
    <script type="application/javascript" src="js/popup.js"></script>
    <script type="application/javascript" src="js/confirmDelete.js"></script>

</head>
<?php
session_start();
include ("db.php");
if(!isset($_SESSION['login'])){
    header("location: index.php");
    exit();
}
?>
<body>
<div id = "page">
    <div id="name"><a id="namelink" href="index.php">Blogasek</a>
        <div id="nav_horizontal">
            <span class="btn btn-default"><a href="addNote.php">DODAJ WPIS</a></span>
            <span class="btn btn-default"><a href="logout.php">WYLOGUJ</a></span>
        </div>
    </div>

    <div id="nav_vertical">
        <?PHP
        if($_SESSION['role'] == 'admin'){ ?>
        <p class= "category">Użytkownicy</p>
        <ul>
            <li><a href="Admin/newUser.php">Dodaj użytkownika</a></li>
            <li><a href="Admin/usersList.php">Lista użytkowników</a></li>
        </ul>
        <p class="category">Notatki</p>
        <ul>
            <li><a href="Admin/notesList.php">Lista notatek</a></li>
            <li><a href="Admin/adminNotes.php">Twoje notatki</a></li>
        </ul>
        <?php }?>


    </div>

    <div id = "content">
        <?php

        $noteID = $_GET['id'];
        $query = "SELECT * FROM notes WHERE NoteID = '$noteID'";
        $result = mysqli_query($db, $query);
        $row = mysqli_fetch_array($result,MYSQLI_ASSOC);
        ?> <div id="addNote">
            <form action="editNoteToDb.php" method="POST" id="addNoteForm" enctype="multipart/form-data">
                <h1>EDYTUJ NOTKĘ</h1>
                <input type="hidden" name="NoteID" id="noteID" value="<?php echo $row['NoteID']?>">
                <input  type="text" name="titleInput" id = "titleInput"  value = "<?php echo $row['title'] ?>" required><br/>
                <textarea name="noteContentInput" id = "noteContentInput" required><?php echo $row['content'] ?></textarea><br/>
                <input  type="file" name ="photo" id="photoInput" class="formularzyk" multiple><br/>
                <button onclick="history.go(-1);">Wstecz </button>
                <input  type="submit" name="submitBtn"  value="Aktualizuj"><br/>
            </form>
        </div>
    </div>
</div>
<footer>
    <p> Strona stworzona przez Mateusza Owerczuk na projekt zaliczeniowy z przedmiotu TIN.</p>
</footer>
</body>
</html>