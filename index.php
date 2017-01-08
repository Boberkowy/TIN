<html lang="pl">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>Blog Technologie Internetu</title>
    <link rel="stylesheet" type="text/css" href="css/styles.css" />
    <link rel="stylesheet" type="text/css" href="css/bootstrap.css">
    <link href='http://fonts.googleapis.com/css?family=Amatic+SC&subset=latin,latin-ext' rel='stylesheet' type='text/css'>
    <script type="text/javascript" src ="js/jquery-3.1.1.js"></script>
    <script src='http://ajax.googleapis.com/ajax/libs/jqueryui/1.8.5/jquery-ui.min.js'></script>
    <script type="application/javascript" src="js/popup.js"></script>

</head>
<body>
<?php
session_start();

if(isset($_SESSION['login'])){
    header("location: profile.php");
}
?>
<div id="loginForm">
    <button class="cancelButton">X</button>
    <form action="login.php" method="POST" id="formularzyk" >
        <h1>LOGOWANIE</h1>
        <input  type="text" name="login" placeholder="Login" required ></br>
        <input  type="password" name="password" placeholder="Hasło" required><br/>
        <input  type="submit" name="loggin"  value="Zaloguj się" required><br/>
    </form>
</div>

<div id="registerForm">
    <button class="cancelButton">X</button>
    <form action ="register.php" method="POST" id="formularzyk" >
    <h1>REJESTRACJA</h1>
    <input type="text" name="login" placeholder="Login" required ></br>
    <input type="password" name="password" placeholder="Hasło" required><br/>
    <input type ="email" name="email" placeholder="Email"  required><br/>
    <input type="submit" value="Rejestruj" ><br/>
    </form>
</div>

    <div id = "page">
        <div id="name"><a id="namelink" href="index.php">Blogasek</a>
            <div id="nav_horizontal">
                <span class="btn btn-default" id="loginButton">Zaloguj</span>
                <span class="btn btn-default" id="registerButton">Zarejestruj</span>
            </div>
            </div>


        <div id="nav_vertical">
            TODO NAV VERTICAL
            // LISTA ARCHIWALNYCH WPISÓW
        </div>

        <div id = "content">
            <?php
                if(isset($_SESSION['error']))
                    echo "<div id='error'><h1>" . $_SESSION['error'] . "</h1></div>";
            ?>
            <h1>Witaj na blogu</h1>
            <p>Zaloguj się lub zarejestruj aby korzystać z możliwości strony.</p>
            <p>Strona ma możliwość rejestracji nowych użytkowników, logowania.
                Każdy użytkownik może dodać, usunąć lub edytować wpis.
                Do wpisu można dodać zdjęcia.
                Administrator strony ma dodatkowe możliwości. Może usuwać, dodawać, edytować dane
                użytkowników, ze specjalnej strony dostępnej tylko dla niego.
                </p>

        </div>

        <footer>
          <p> Strona stworzona przez Mateusza Owerczuk na projekt zaliczeniowy z przedmiotu TIN.</p>
        </footer>
        </div>


    </body>
    </html>

