<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Pyroject</title>
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-uWxY/CJNBR+1zjPWmfnSnVxwRheevXITnMqoEIeG1LJrdI0GlVs/9cVSyPYXdcSF" crossorigin="anonymous">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta2/css/all.min.css" integrity="sha512-YWzhKL2whUzgiheMoBFwW8CKV4qpHQAEuvilg9FAn5VJUDwKZZxkJNuGM4XkWuk94WCrrwslk8yWNGmY1EduTA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
  <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="./public/assets/css/main.css?key=<?php echo time(); ?>">
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
  <style>
    body {
      display: flex;
      flex-direction: column;
      justify-content: space-between;
      height: 100vh;
    }
  </style>
</head>

<body>
  <div id="toast"></div>
  <div class="container-xl">
    <header>
      <div class="logo">
        <i class="fas fa-bars menu-icon"></i>
        <a href="./Contact"><img src="./public/assets/image/logo-png2.png" alt="logo"></a>
      </div>
      <ul>
        <li>
          <a href="./Contact">Liên hệ</a>
        </li>
        <li>
          <a href="./Product">Quản Lý Sản Phẩm</a>
        </li>
        <li>
          <a href="./Blogs">Quản Lý Blog</a>
        </li>
        <li>
          <a href="./Order">Orders</a>
        </li>

      </ul>
      <div class="auth">
        <?php
        if (!isset($_SESSION['sessionUser'])) {
          echo ("
                        <a href=\"./Login\">Đăng nhập</a>
                        ");
        } else {
          echo ("
                      <a href=\"./Profile/Logout\">Đăng xuất</a>
                ");
        }
        ?>

      </div>
    </header>
    <div class="menu">
      <ul>
        <a href="./Contact">Liên hệ</a>
        </li>
        <li>
          <a href="./Product">Quản Lý Sản Phẩm</a>
        </li>
        <li>
          <a href="./Blogs">Quản Lý Blog</a>
        </li>
        <li>
          <a href="./Order">Orders</a>
        </li>
      </ul>
    </div>
  </div>