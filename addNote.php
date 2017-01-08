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

if(!isset($_SESSION['login'])){
    header("location: index.php");

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
    TODO NAV VERTICAL
// LISTA ARCHIWALNYCH WPISÓW
</div>

    <div id = "content">
        <?php
            if(isset($_SESSION['sizeError']) || isset($_SESSION['formatError']))
                echo "<div id='error'><h1>" . $_SESSION['formatError'] . "</h1></div>";
                echo "<div id='error'><h1>" . $_SESSION['sizeError'] . "</h1></div>";
        ?>
        <div id="addNote">
          <form action="addNoteToDb.php" method="POST" id="addNoteForm" enctype="multipart/form-data">
              <h1>DODAJ NOTKĘ</h1>
              <input  type="text" name="titleInput" id = "titleInput" placeholder="Tytuł wpisu" required><br/>
              <textarea name="noteContentInput" id = "noteContentInput" placeholder="Zawartość wpisu" required></textarea><br/>
              <input  type="file" name ="photo" id="photoInput" class="formularzyk" maxlength="1000000" multiple><br/>
              <button title="backBtn" onclick="history.go(-1);">Wstecz </button>
              <input  type="submit" name="submitBtn"  value="Dodaj wpis"><br/>
          </form>
        </div>
    </div>


</div>
<footer>
    <p> Strona stworzona przez Mateusza Owerczuk na projekt zaliczeniowy z przedmiotu TIN.</p>
</footer>

</body>
</html>