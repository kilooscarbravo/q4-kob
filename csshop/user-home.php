<?php include "connect.php";
  session_start();
  // ตรวจสอบว่ามีชื่อใน session หรือไม่ หากไม่มีให้ไปหน้า login อัตโนมัติ
  if (empty($_SESSION["username"]) ) { 
      header("location: loginPage.php");
  }
?>
<?php session_start(); ?>

<!doctype html>
<html lang="en">

  <head>
    <meta charset="utf-8">
    <title>CS Shop</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="mobile-web-app-capable" content="yes">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link href="mcss.css" rel="stylesheet" type="text/css" />
    <script src="mpage.js"></script>
  </head>

  <style>
    article{
        text-align: center;
    }
    table{
      margin: auto;
      width: 80%;
    }
    th{
      background-color: #8cce8c;
    }
  </style>

  <body>

    <header>
      <div class="logo">
        <img src="cslogo.jpg" width="200" alt="Site Logo">
      </div>
      <div class="search">
        <form>
          <input type="search" name="keyword" placeholder="Search the site...">
          <button>Search</button>
        </form>
      </div>
    </header>

    <div class="mobile_bar">
      <a href="#"><img src="responsive-demo-home.gif" alt="Home"></a>
      <a href="#" onClick='toggle_visibility("menu"); return false;'><img src="responsive-demo-menu.gif" alt="Menu"></a>
    </div>


    <main>
      <article>
        <h1>ยินดีต้อนรับค่ะ คุณ <?=$_SESSION["fullname"]?></h1>
        หากต้องการออกจากระบบโปรดคลิก -><a style="color: red;" href='logout.php'>ออกจากระบบ</a>

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
                echo "<br><br><br><br><h1>ประวัติออเดอร์ของคุณ</h1>";
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
                echo "<br><br><br><br>";
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
        
      </article>
      <nav id="menu">
        <h2>Navigation</h2>
        <ul class="menu">
          <li><a href="user-home.php">Home</a></li>

          <?php
            if(isset($_SESSION["username"])){
              if($userRole['role'] == 'admin'){
       
                echo '<li><a href="allproductPage.php">All Products</a></li>';
                echo '<li><a href="allmemberPage.php">All Member</a></li>';
                echo '<li><a href="editproduct.php">Edit product</a></li>';
                echo '<li><a href="addproductForm.php">Add product</a></li>';
                echo '<li><a href="editmember.php">Edit member</a></li>';
                echo '<li><a href="addmemberForm.php">Add member</a></li>';
                echo '<li><a href="cart.php">cart</a></li>';
              }
              elseif($userRole['role'] == 'member'){
                echo '<li><a href="allproductPage.php">All Products</a></li>';
                echo '<li><a href="cart.php">cart</a></li>';
              }
            }
          ?>

        </ul>
      </nav>
    </main>
  </body>
</html>