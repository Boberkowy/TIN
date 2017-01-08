<?php

function selectNotes(){
    include "../db.php";

    $query = "SELECT notes.* , photos.photo FROM `notes` LEFT JOIN `photos` ON notes.NoteID = photos.NoteID";
    $result = mysqli_query($db,$query);

    if(!$result){
        echo "Nie mogę pobrać notatek";
    }else{
        while($row = mysqli_fetch_array($result,MYSQLI_ASSOC)){
            echo "<div id='notesList'>";
            echo "<h1>Tytuł: " . $row['title'] . "</h1>";
            echo "<p>Data: " . $row['date'] . "</p>";
            echo "<p>NoteID: " . $row['NoteID']. "</p>";
            echo "<p>Treść: " . $row['content'] . "</p>";
            if($row['photo'] != null) {
            echo '<img src="data:image/jpeg;base64,' . base64_encode($row['photo']) . '" />';
}?>
            <a href="../deleteNote.php?id=<?php echo $row['NoteID'];?>" onclick="NoteDeleteConfirm(' <?php  echo $row['NoteID']; ?> ',' <?php echo $row['title']?>')">Usuń</a>
            <a href="../editNote.php?id=<?php echo $row['NoteID'];?>">Edytuj</a>
            </div>
            <?php
        }
    }
}
?>