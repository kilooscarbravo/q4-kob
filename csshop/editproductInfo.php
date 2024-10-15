<?php include "connect.php"?>

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
    form{
        margin-top: 2%;
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
            $stmt = $pdo->prepare("SELECT * FROM product WHERE pid = ?");
            $stmt->bindParam(1,$_GET["pid"]);
            $stmt->execute();
            $row = $stmt->fetch();
        ?>
        <form action="editproductMethod.php" method="post" enctype="multipart/form-data">
            <input type="hidden" name="pid" value="<?=$row["pid"]?>"><br>
            ชื่อสินค้า : <input type="text" name="pname" value="<?=$row["pname"]?>"><br>
            รายละเอียดสินค้า : <br>
            <textarea name="pdetail" rows="3" cols="40" ><?=$row["pdetail"]?></textarea><br>
            ราคา : <input type="number" name="price" value="<?=$row["price"]?>"><br><br>   
            เพิ่มรูปภาพ<input type="file" id="pphoto" name="pphoto" accept="image/jpg,image/jpeg,image/png"/><br><br>
            <input type="submit" value="แก้ไขสินค้า">
        </form>        
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
        </ul>
      </nav>
    </main>
  </body>
</html>