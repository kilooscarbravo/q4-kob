<?php include "connect.php" ?>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>
<body>
    <?php
        $stmt = $pdo->prepare("SELECT * FROM member");
        $stmt->execute();
        
    ?>
    <?php while ($row = $stmt->fetch()) { 
        echo "ชื่อสมาชิก : " . $row["name"] . "<br>";
        echo "ที่อยู่ : " . $row["address"] . "<br>";
        echo "E-mail : " . $row["email"] . "<br>";
        echo "<img src='mphoto/" . $row["username"] . ".jpg' width='200'>";
        echo "<a href='workshop9_editform.php?username=" . $row["username"] . "'>แก้ไข</a>";
        echo "<hr>\n";
    } ?>

</body>
</html>