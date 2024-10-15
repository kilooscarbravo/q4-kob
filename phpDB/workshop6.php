<?php include "connect.php" ?>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script>
        function confirmDelete(username){
            let ans = confirm("ต้องการลบสมาชิก "+username);
            if(ans==true)
                document.location = "workshop6_delete.php?username="+username;
        }
    </script>
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
        <img src='mphoto/<?=$row["username"]?>.jpg' width='200'>
        <a href="#" onclick="confirmDelete(`<?=$row['username']?>`)">ลบ</a>
        <hr>
    <?php } ?>
</body>
</html>