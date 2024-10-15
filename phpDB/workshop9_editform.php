<?php include "connect.php"?>
<?php
    $stmt = $pdo->prepare("SELECT * FROM member WHERE username = ?");
    $stmt->bindParam(1,$_GET["username"]);
    $stmt->execute();
    $row = $stmt->fetch();
?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="workshop9_edit.php" method="post">
        Username : <input type="text" name="username" value="<?=$row["username"]?>"><br>
        Password : <input type="text" name="password" value="<?=$row["password"]?>"><br>
        ชื่อสมาชิก : <input type="text" name="name" value="<?=$row["name"]?>"><br>
        ที่อยู่ : <br>
        <textarea name="address" rows="3" cols="40" ><?=$row["username"]?></textarea><br>
        เบอร์โทรศัพท์ : <input type="tel" name="mobile" value="<?=$row["mobile"]?>"><br>
        E-mail : <input type="email" name="email" value="<?=$row["email"]?>"><br><br>  
        <input type="submit" value="แก้ไขสมาชิก">
    </form>
</body>
</html>