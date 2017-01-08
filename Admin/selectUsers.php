<?php

function selectUsers(){
    include "../db.php";

$query = " SELECT * FROM users";
$result = mysqli_query($db,$query);

if($result != true){
    echo "Nie mogę pobrać danych użytkowników";
}else {
    while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
        echo "<div id='usersList'>";
        echo "<h1>UserID:" . $row['userID'] . "</h1>";
        echo "<p>Login:" . $row['Login'] ."</p>";
        echo "<p>Hasło:" . $row['Password'] . "</p>";
        echo "<p>Email:" . $row['Email'] . "</p>";
        echo "<p>Uprawnienia:" . $row['Role'] . "</p>";
        ?>
        <a href="deleteUser.php?id=<?php echo $row['userID'];?>" onclick="UserDeleteConfirm(' <?php  echo $row['userID']; ?> ',' <?php echo $row['Login']?>')">Usuń</a>
        <a href="editUser.php?id=<?php echo $row['userID'];?>">Edytuj</a>
        </div>
        <?php
}}}
?>