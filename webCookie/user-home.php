<?php include "connect.php" ?>
<?php session_start(); ?>

<html>
<body>
<h1>สวัสดี <?=$_SESSION["fullname"]?></h1>
หากต้องการออกจากระบบโปรดคลิก <a href='logout.php'>ออกจากระบบ</a>
<br><br>

<?php
              $stmt = $pdo->prepare("SELECT role FROM member WHERE username = ?");
              $stmt->bindParam(1, $_SESSION['username']);
              $stmt->execute();
              $userRole = $stmt->fetch();
              if($userRole['role'] == 'member')
              {
                $stmt2 = $pdo->prepare("SELECT orders.ord_id AS 'รหัสคำสั่งซื้อ',product.pname AS 'pname',quantity,(product.price * item.quantity) AS 'ราคารวม' FROM orders JOIN item ON orders.ord_id = item.ord_id JOIN product ON item.pid = product.pid WHERE orders.username = ? ");
                $stmt2->bindParam(1,$_SESSION['username']);
                $stmt2->execute();
                echo "<table border='1'>";
                echo "<tr>";
                echo "<th>รหัสคำสั่งซื้อ</th>";
                echo "<th>ชื่อสินค้า</th>";
                echo "<th>จำนวน</th>";
                echo "<th>ราคารวม</th>";
                echo "</tr>";
                while ($order = $stmt2->fetch()) {
                    echo "<tr>";
                    echo "<td>" . $order ["รหัสคำสั่งซื้อ"] . "</td>";
                    echo "<td>" . $order ["pname"] . "</td>";
                    echo "<td>" . $order ["quantity"] . "</td>";
                    echo "<td>" . $order ["ราคารวม"] . "</td>";
                    echo "</tr>";
                }
                echo "</table>";
              }
              else {
                $stmt2 = $pdo->prepare("SELECT username,COUNT(ord_id) AS 'จำนวนคำสั่งซื้อ' FROM orders GROUP BY username;");
                $stmt2->execute();
                echo "<table border='1'>";
                echo "<tr>";
                echo "<th>ชื่อสมาชิก</th>";
                echo "<th>จำนวนคำสั่งซื้อ</th>";
                echo "</tr>";
                while ($order = $stmt2->fetch()) {
                    echo "<tr>";
                    echo "<td>" . $order ["username"] . "</td>";
                    echo "<td>" . $order ["จำนวนคำสั่งซื้อ"] . "</td>";
                    echo "</tr>";
                }
                echo "</table>";
              }
          ?>

</body>
</html>
