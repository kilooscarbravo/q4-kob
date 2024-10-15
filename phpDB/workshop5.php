<?php include "connect.php" ?>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>
<body>
    <?php
        $stmt = $pdo->prepare("SELECT * FROM member WHERE username = ?");
        $stmt->bindParam(1,$_GET["username"]);
        $stmt->execute();
        $row = $stmt->fetch();
    ?>
    <div style="display:flex">
        <div>
            <img src='mphoto/<?=$row["username"]?>.jpg' width='200'>
        </div>
        <div style="padding: 15px">
            <h2><?=$row["username"]?></h2>
            ชื่อสมาชิก : <?=$row["name"]?><br>
            ที่อยู่ : <?=$row["address"]?><br><br>
            E-mail : <?=$row["email"]?>
        </div>
    </div>
    <a href="workshop5_detail.php">รายละเอียด</a>
</body>
</html>