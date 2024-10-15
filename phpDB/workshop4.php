<?php include "connect.php" ?>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>
<body>
    <form>
        <input type="text" name="keyword">
        <input type="submit" value="ค้นหา">
    </form>
    <div style="display: flex;"></div>
    <?php 
        $stmt = $pdo->prepare("SELECT * FROM member WHERE username LIKE ?");
        if(!empty($_GET))
            $value = '%' . $_GET["keyword"] .'%';
        $stmt->bindParam(1,$value);
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