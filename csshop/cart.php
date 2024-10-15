<?php include "connect.php";
  session_start();
  // ตรวจสอบว่ามีชื่อใน session หรือไม่ หากไม่มีให้ไปหน้า login อัตโนมัติ
  if (empty($_SESSION["username"]) ) { 
      header("location: loginPage.php");
  }
?>

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
    <script>
        function update(pid) {
            var qty = document.getElementById(pid).value;
            document.location = "cart.php?action=update&pid=" + pid + "&qty=" + qty; 
        }
    </script>
  </head>

  <style>
    article{
        text-align: center;
    }
    table {
        margin: 0 auto; /* จัดกลางตาราง */
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
        <?php
        session_start();
        if ($_GET["action"]=="add") {
            $pid = $_GET['pid'];
            $cart_item = array(
                'pid' => $pid,
                'pname' => $_GET['pname'],
                'price' => $_GET['price'],
                'qty' => $_POST['qty']
            );
            if(empty($_SESSION['cart']))
                $_SESSION['cart'] = array();
            if(array_key_exists($pid, $_SESSION['cart']))
                $_SESSION['cart'][$pid]['qty'] += $_POST['qty'];
            else
                $_SESSION['cart'][$pid] = $cart_item;
        } else if ($_GET["action"]=="update") {
            $pid = $_GET["pid"];     
            $qty = $_GET["qty"];
            $_SESSION['cart'][$pid]['qty'] = $qty;
        } else if ($_GET["action"]=="delete") {
            $pid = $_GET['pid'];
            unset($_SESSION['cart'][$pid]);
        }
        ?>

        <form >
        <table border="1">
        <?php 
            $sum = 0;
            if(!empty($_SESSION["cart"])){
            foreach ($_SESSION["cart"] as $item) {
                $sum += $item["price"] * $item["qty"];
        ?>
            <tr>
                <td><?=$item["pname"]?></td>
                <td><?=$item["price"]?></td>
                <td>			
                    <input type="number" id="<?=$item["pid"]?>" value="<?=$item["qty"]?>" min="1" max="9">
                    <a style="color: blue" href="#" onclick="update(<?=$item["pid"]?>)">แก้ไข</a>
                    <a style="color: red" href="?action=delete&pid=<?=$item["pid"]?>">ลบ</a>
                </td>
            </tr>
        <?php } ?>
        <tr><td colspan="3" align="right">รวม <?=$sum?> บาท</td></tr>
        <?php }else{ ?>
          <tr><td colspan="3">ไม่มีสินค้าในตะกร้า</td></tr>
        <?php } ?>
        </table>
        </form>
        <a href="allproductPage.php">< เลือกสินค้าต่อ</a>

      </article>
      <nav id="menu">
        <h2>Navigation</h2>
        <ul class="menu">
          <li><a href="user-home.php">Home</a></li>
          <li><a href="allproductPage.php">All Products</a></li>
          <li><a href="allmemberPage.php">All Member</a></li>
          <li><a href="editproduct.php">Edit product</a></li>
          <li><a href="addproductForm.php">Add product</a></li>
          <li><a href="editmember.php">Edit member</a></li>
          <li><a href="addmemberForm.php">Add member</a></li>
          <li><a href="cart.php">cart</a></li>
          <li><a href="user-home.php">logout</a></li>
        </ul>
      </nav>
    </main>
  </body>
</html>