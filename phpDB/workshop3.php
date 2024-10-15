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
    <?php while ($row = $stmt->fetch()) { ?>
        ชื่อสมาชิก : <?=$row["name"]?><br>
        ที่อยู่ : <?=$row["address"]?><br>
        E-mail : <?=$row["email"]?><br>
        <img src='mphoto/<?=$row["username"]?>.jpg' width='200'><hr><br>
    <?php } ?>
</body>
</html>