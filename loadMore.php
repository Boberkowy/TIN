<?php
session_start();
include "db.php";

$no = $_POST['result'];
$id = mysqli_real_escape_string($db, $_SESSION['login']);

$query = mysqli_query($db,"SELECT notes.*, photos.photo FROM `notes` LEFT JOIN `photos` ON notes.NoteID = photos.NoteID WHERE notes.UserID = '$id' ORDER BY notes.NoteID DESC LIMIT $no, 3 ");
while($row =mysqli_fetch_assoc($query)) {
    echo "<div id='notesList'>";
    echo "<h1>" . $row['title'] . "</h1>";
    echo "<p>" . $row['date'] . "</p>";
    echo "<p>" . $row['content'] . "</p>";
    if ($row['photo'] != null) {
        echo '<img src="data:image/jpeg;base64,' . base64_encode($row['photo']) . '" />';
    }
    if ($_SESSION['role'] == "user") { ?>
        <a href="deleteNote.php?id=<?php echo $row['NoteID']; ?>"
           onclick="UserNoteDeleteConfirm(' <?php echo $row['NoteID']; ?> ',' <?php echo $row['title'] ?>'); ">Usuń</a>
        <a href="editNote.php?id=<?php echo $row['NoteID']; ?>">Edytuj</a>

        </div>

    <?php } else {
        ?>  <a href="../deleteNote.php?id=><?php echo $row['NoteID']; ?>"
               onclick="NoteDeleteConfirm('<?php echo $row['NoteID']; ?> ',' <?php echo $row['title'] ?>')">Usuń</a>
        <a href="../editNote.php?id=<?php echo $row['NoteID']; ?>">Edytuj</a>
        </div>
        <?php
    }
}