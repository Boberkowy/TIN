<?php
session_start();

function selectNotes()
{
    include 'db.php';
    $limitPerPage=3;
    $id = mysqli_real_escape_string($db, $_SESSION['login']);
    if (isset($_GET["page"])) { $page  = $_GET["page"]; } else { $page=1; };
    $startFrom = ($page-1) * $limitPerPage;

    $noteQuery =  "SELECT notes.*, photos.photo FROM `notes` LEFT JOIN `photos` ON notes.NoteID = photos.NoteID WHERE notes.UserID = '$id' ORDER BY notes.NoteID DESC LIMIT $startFrom,$limitPerPage";
    $noteResult = mysqli_query($db, $noteQuery);
    $count = mysqli_num_rows($noteResult);

    if ($count == 0 ){
        echo ("Brak wpisów");
    }
        else {
            while ($row = mysqli_fetch_array($noteResult, MYSQLI_ASSOC)) {
                echo "<div id='notesList'>";
                echo "<h1>" . $row['title'] . "</h1>";
                echo "<p>" . $row['date'] . "</p>";
                echo "<p>" . $row['content'] . "</p>";
                if($row['photo'] != null) {
                    echo '<img src="data:image/jpeg;base64,' . base64_encode($row['photo']) . '" />';
                }
                if($_SESSION['role'] != 'admin'){
                ?>
                <a href="deleteNote.php?id=<?php echo $row['NoteID'];?>" onclick="NoteDeleteConfirm(' <?php  echo $row['NoteID']; ?> ',' <?php echo $row['title']?>'); " >Usuń</a>
                <a href="editNote.php?id=<?php echo $row['NoteID'];?>">Edytuj</a>
                    </div>
<?php
                }else{
                    ?> <a href="../deleteNote.php?id=<?php echo $row['NoteID'];?>" onclick="NoteDeleteConfirm(' <?php  echo $row['NoteID']; ?> ',' <?php echo $row['title']?>')">Usuń</a>
                        <a href="../editNote.php?id=<?php echo $row['NoteID'];?>">Edytuj</a>
                    </div>
<?php

                }
            }}
$countQuery = "SELECT notes.*, photos.photo FROM `notes` LEFT JOIN `photos` ON notes.NoteID = photos.NoteID WHERE notes.UserID = '$id' ORDER BY notes.NoteID ";
$query = mysqli_query($db,$countQuery);
$count = mysqli_num_rows($query);
$totalPages = ceil($count / $limitPerPage);

if($_SESSION['role'] == 'admin') {
    echo "<a href='Admin/adminNotes.php?page=1'>" . '|<' . "</a> ";
}
else {
    echo "<a href='profile.php?page=1'>" . '|<' . "</a> ";
}
for ($i=1; $i<= $totalPages; $i++) {
    if($_SESSION['role'] == 'admin'){
        echo "<a href='Admin/adminNotes.php?page=".$i."'>".$i."</a> ";
    }
    else{
        echo "<a href='profile.php?page=".$i."'>".$i."</a> ";
    }
}

if($_SESSION['role'] == 'admin') {
    echo "<a href='Admin/adminNotes.php?page=$totalPages'>" . '>|' . "</a> ";
}else
    echo "<a href='profile.php?page=1'>".'|<'."</a> ";
}
?>
