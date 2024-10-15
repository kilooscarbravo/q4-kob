<?php include "connect.php" ?>
    <?php
    $mFolder = "mphoto/";
    $mphotofile = uniqid();
    $mImg = $mFolder . basename($mphotofile . "_" . $_FILES["mphoto"]["name"]);

    if (move_uploaded_file($_FILES["mphoto"]["tmp_name"], $mImg)) {
        $stmt = $pdo->prepare("INSERT INTO member VALUES (?,?,?,?,?,?,?,?)");


        $stmt->bindParam(1,$_POST["username"]);
        $stmt->bindParam(2,$_POST["password"]);
        $stmt->bindParam(3,$_POST["name"]);
        $stmt->bindParam(4,$_POST["address"]);
        $stmt->bindParam(5,$_POST["mobile"]);
        $stmt->bindParam(6,$_POST["email"]);
        $stmt->bindParam(7,$mImg);
        $role = "member";
        $stmt->bindParam(8,$role);
    
        if($stmt->execute())
            header("location:allmemberPage.php");
    } else {
        echo "อัพโหลดรูปภาพไม่สำเร็จ";
        echo "<a href='addmember.html'>ลองอีกครัง</a>"; 
    }

    ?>
