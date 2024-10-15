<?php include "connect.php" ?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>
<body>
    <?php
        $pFolder = "pphoto/";
        if (!empty($_FILES["pphoto"]["name"])) {
            $pphotofile = uniqid();
            $pImg = $pFolder . $pphotofile . "_" . $_FILES["pphoto"]["name"];

            if (move_uploaded_file($_FILES["pphoto"]["tmp_name"], $pImg)) {
                $pphoto = $pImg;
            } else {
                echo "อัพโหลดรูปภาพไม่สำเร็จ";
                exit();
            }
        } else {
            $stmt = $pdo->prepare("SELECT pphoto FROM product WHERE pid = ?");
            $stmt->bindParam(1, $_POST["pid"]);
            $stmt->execute();
            $row = $stmt->fetch();
            $pphoto = $row["pphoto"];
        }
        
        $stmt = $pdo->prepare("UPDATE product SET pid=?, pname=?, pdetail=?, price=?, pphoto=? WHERE pid=?");
        $stmt->bindParam(1, $_POST["pid"]);
        $stmt->bindParam(2, $_POST["pname"]);
        $stmt->bindParam(3, $_POST["pdetail"]);
        $stmt->bindParam(4, $_POST["price"]);
        $stmt->bindParam(5, $pphoto);
        $stmt->bindParam(6, $_POST["pid"]);

        if ($stmt->execute()) {
            header("Location: editproduct.php");
            exit();
        } else {
            echo "error edit: " . implode(", ", $stmt->errorInfo());
        }
    ?>
</body>
</html>
