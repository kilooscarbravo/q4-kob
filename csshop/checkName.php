<?php include "connect.php";

$takenUsernames = $pdo->prepare("SELECT username FROM member WHERE username = :username");
$takenUsernames->execute(['username' => $_GET["username"]]);

sleep(1);

if ($takenUsernames->rowCount() > 0) {
    echo "denied"; 
} else {
    echo "okay"; 
}

?>