<?php include "connect.php" ?>
    <?php
    $pFolder = "pphoto/";
    $pphotofile = uniqid();
    $pImg = $pFolder . basename($pphotofile . "_" . $_FILES["pphoto"]["name"]);

    if (move_uploaded_file($_FILES["pphoto"]["tmp_name"], $pImg)) {
        $stmt = $pdo->prepare("INSERT INTO product VALUES (?,?,?,?,?)");

        $pid = (int)$_POST["pid"];
        $stmt->bindParam(1, $pid, PDO::PARAM_INT);
        $stmt->bindParam(2, $_POST["pname"]);
        $stmt->bindParam(3, $_POST["pdetail"]);
        $stmt->bindParam(4, $_POST["price"]);
        $stmt->bindParam(5,$pImg);
        // $stmt->execute();

    
        if($stmt->execute())
            header("location:allproductPage.php");
    } else {
        echo "อัพโหลดรูปภาพไม่สำเร็จ";
        echo "<a href='addproduct.html'>ลองอีกครัง</a>"; 
    }

    ?>

