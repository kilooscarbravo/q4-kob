<?php include "connect.php";
  // session_start();
  // // ตรวจสอบว่ามีชื่อใน session หรือไม่ หากไม่มีให้ไปหน้า login อัตโนมัติ
  // if (empty($_SESSION["username"]) ) { 
  //     header("location: loginPage.php");
  // }
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
        <form action="addmember.php" method="post" enctype="multipart/form-data">
            Username : <input type="text" name="username" ><br>
            Password : <input type="text" name="password"><br>
            ชื่อสมาชิก : <input type="text" name="name"><br>
            ที่อยู่ : <br>
            <textarea name="address" rows="3" cols="40"></textarea><br>
            เบอร์โทรศัพท์ : <input type="tel" name="mobile"><br>
            E-mail : <input type="email" name="email"><br><br>  
            เพิ่มรูปภาพ <input type="file" id="mphoto" name="mphoto" accept="image/jpg,image/jpeg,image/png" required/>
            <input type="submit" value="เพิ่มสมาชิก">
    
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