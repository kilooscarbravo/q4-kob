<?php include "connect.php" ?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>
<body>
    <?php
        $mFolder = "mphoto/";
        if (!empty($_FILES["mphoto"]["name"])) {
            $mphotofile = uniqid();
            $mImg = $mFolder . $mphotofile . "_" . $_FILES["mphoto"]["name"];

            if (move_uploaded_file($_FILES["mphoto"]["tmp_name"], $mImg)) {
                $mphoto = $mImg;
            } else {
                echo "อัพโหลดรูปภาพไม่สำเร็จ";
                exit();
            }
        } else {
            $stmt = $pdo->prepare("SELECT mphoto FROM member WHERE username = ?");
            $stmt->bindParam(1, $_POST["username"]);
            $stmt->execute();
            $row = $stmt->fetch();
            $mphoto = $row["mphoto"];
        }
        
        $stmt = $pdo->prepare("UPDATE member SET username=?, password=?, name=?, address=?, mobile=?, email=?, mphoto=? WHERE username=?");
        $stmt->bindParam(1, $_POST["username"]);
        $stmt->bindParam(2, $_POST["password"]);
        $stmt->bindParam(3, $_POST["name"]);
        $stmt->bindParam(4, $_POST["address"]);
        $stmt->bindParam(5, $_POST["mobile"]);
        $stmt->bindParam(6, $_POST["email"]);
        $stmt->bindParam(7, $mphoto);
        $stmt->bindParam(8, $_POST["username"]);

        if ($stmt->execute()) {
            header("Location: editmember.php");
            exit();
        } else {
            echo "error edit: " . implode(", ", $stmt->errorInfo());
        }
    ?>
</body>
</html>
