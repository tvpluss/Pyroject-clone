<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pryject</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta2/css/all.min.css" integrity="sha512-YWzhKL2whUzgiheMoBFwW8CKV4qpHQAEuvilg9FAn5VJUDwKZZxkJNuGM4XkWuk94WCrrwslk8yWNGmY1EduTA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-uWxY/CJNBR+1zjPWmfnSnVxwRheevXITnMqoEIeG1LJrdI0GlVs/9cVSyPYXdcSF" crossorigin="anonymous">
    <link rel="stylesheet" href="./public/assets/css/main.css">
</head>

<body>

    <div class="container-xl">
        <header>
            <div class="logo">
                <i class="fas fa-bars menu-icon"></i>
                <img src="./public/assets/image/logo-png2.png" alt="logo">
            </div>
            <ul>
                <li>
                    <a href="./Index">Trang chủ</a>
                </li>
                <li>
                    <a href="">Sản Phẩm</a>
                </li>
                <li>
                    <a href="">Dịch Vụ</a>
                </li>
                <li>
                    <a href="./Intro">Giới thiệu</a>
                </li>
                <li>
                    <a href="">Liên hệ</a>
                </li>
            </ul>
            <div class="auth">
                <a href="./Login">Đăng nhập</a>
                <a href="./Register">Đăng kí</a>
                <a href="">
                    <i class="fas fa-cart-plus cart-icon"></i>
                </a>
            </div>
        </header>
        <div class="menu">
            <ul>
                <li>
                    <a href="">Trang chủ</a>
                </li>
                <li>
                    <a href="">Sản Phẩm</a>
                </li>
                <li>
                    <a href="">Dịch Vụ</a>
                </li>
                <li>
                    <a href="./Intro">Giới thiệu</a>
                </li>
                <li>
                    <a href="">Liên hệ</a>
                </li>
            </ul>
        </div>
    </div>
    <?php
    if (isset($_SESSION['sessionUser'])) {
        // echo print_r($_SESSION);
        print_r($_SESSION);
    }
    echo "<br/>";
    if (isset($_GET['success'])) {
        echo $_GET['success'];
    }
    ?>