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
        function confirmDelete(pname){
            let ans = confirm("ต้องการลบสินค้า "+pname);
            if(ans==true)
                document.location = "deleteproduct.php?pname="+pname;
        }
    </script>
  </head>

  <style>
        article {
            text-align: center;
        }
        .product-container {
            display: flex;
            flex-wrap: wrap;
            justify-content: center; /* จัดกลางแนวนอน */
            padding: 20px;
        }
        .product-card {
            
            margin: 5px;
            padding: 15px;
            border: 1px solid #ccc;
            border-radius: 8px;
            width: 200px; /* กำหนดความกว้าง */
            text-align: center; /* จัดข้อความให้อยู่กลาง */
            display: flex; /* ใช้ flex เพื่อจัดแนวภายใน */
            flex-direction: column; /* ตั้งค่าแนวตั้ง */
            align-items: center; /* จัดกลางแนวนอน */
        }
        .product-card img {
            max-width: 100%; /* ให้รูปภาพไม่ใหญ่เกิน */
            height: auto; /* รักษาสัดส่วนของรูป */
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
            // if(!isset($_SESSION['cart'])){
            //     $_SESSION['cart']=array();
            // }	
            // ?>
            <div class="product-container">	
            <?php
                $stmt = $pdo->prepare("SELECT * FROM product");
                $stmt->execute();
                while ($row = $stmt->fetch()) { 
            ?>
                <div class="product-card">
                    <a href="detailProduct.php?pid=<?=$row["pid"]?>">
                        <img src='<?php
                                if (isset($row["pphoto"])) echo $row["pphoto"];
                                else echo "pphoto/" . $row["pid"];
                                ?>' width='100'><br>
                    <?=$row ["pname"]?><br><?=$row ["price"]?> บาท<br>
                    <a style="color:blue;" href='editproductInfo.php?pid=<?= $row["pid"] ?>'>แก้ไข</a> 
                    <a style="color:red;" href='#' onclick='confirmDelete("<?= $row["pname"] ?>")'>ลบ</a>
                </div>
            <?php } ?>
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
          <li><a href="loginPage.php">Login</a></li>
        </ul>
      </nav>
    </main>
  </body>
</html>