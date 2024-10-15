<?php include "connect.php" ?>

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
        /* text-align: center; */
        justify-content: center;
    }
    article div{
        margin: 20px;
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
        
        <?php session_start(); ?>

        <?php
        
        $stmt = $pdo->prepare("SELECT * FROM member WHERE username = ?");
        // $stmt->bindParam(1, $_GET["username"]);
        $stmt->bindParam(1,$_GET["username"]);
        $stmt->execute(); 	
        $row = $stmt->fetch();	
        ?>

        <div style="display:flex">
            <div>
                <img src='<?php
                    if (isset($row["mphoto"])) echo $row["mphoto"];
                    else echo "mphoto/" . $row["username"];
                    ?>' width='200'><br>
            </div>
            <div style="padding: 15px">
                <h2><?=$row["username"]?></h2>
                ชื่อสมาชิก : <?= $row["name"] ?><br>
                ที่อยู่ : <?= $row["address"] ?><br>
                อีเมล์ : <?= $row["email"] ?><br>	   
                </form>
            </div>
        </div>

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