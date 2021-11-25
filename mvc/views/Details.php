<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pryject</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta2/css/all.min.css"
        integrity="sha512-YWzhKL2whUzgiheMoBFwW8CKV4qpHQAEuvilg9FAn5VJUDwKZZxkJNuGM4XkWuk94WCrrwslk8yWNGmY1EduTA=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link
        href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap"
        rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-uWxY/CJNBR+1zjPWmfnSnVxwRheevXITnMqoEIeG1LJrdI0GlVs/9cVSyPYXdcSF" crossorigin="anonymous">
    <link rel="stylesheet" href="../../public/assets/css/main.css">
</head>

<body>
    <div class="container-xl">
        <header>
            <div class="logo">
                <i class="fas fa-bars menu-icon"></i>
                <img src="../../public/assets/image/logo-png2.png" alt="logo">
            </div>
            <ul>
                <li>
                    <a href="../../Index">Trang chủ</a>
                </li>
                <li>
                    <a href="../../Product">Sản Phẩm</a>
                </li>
                <li>
                    <a href="../../Service">Dịch Vụ</a>
                </li>
                <li>
                    <a href="../../News">Blog</a>
                </li>
                <li>
                    <a href="../../Intro">Giới thiệu</a>
                </li>
                <li>
                    <a href="../../Contact">Liên hệ</a>
                </li>
            </ul>
            <div class="auth">
                <?php
                if (!isset($_SESSION['sessionUser'])) {
                    echo ("
                        <a href=\"../../Login\">Đăng nhập</a>
                        <a href=\"../../Register\">Đăng kí</a>
                        ");
                } else {
                    echo ("
                    <div class=\"dropdown\">
                        <a class=\"dropdown-toggle\" href=\"#\" role=\"button\" id=\"dropdownMenuLink\" data-bs-toggle=\"dropdown\" aria-expanded=\"false\">
                        <img src=\"../../public/assets/image/avatar.jpg\" alt=\"\"><span>" . $_SESSION['sessionUser'] . "</span></a>
                        <ul class=\"dropdown-menu\" aria-labelledby=\"dropdownMenuLink\">
                            <li><a class=\"dropdown-item\" href=\"../../Profile\">Chỉnh sửa thông tin</a></li>
                            <li><a class=\"dropdown-item\" href=\"#\">Lịch sử mua hàng</a></li>
                            <li><a class=\"dropdown-item\" href=\"#\">Đổi mật khẩu</a></li>
                            <li><a class=\"dropdown-item\" href=\"../../Profile/Logout\">Đăng xuất</a></li>
                        </ul>
                    </div>
                ");
                }
                ?>
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
                    <a href="">Giới thiệu</a>
                </li>
                <li>
                    <a href="">Liên hệ</a>
                </li>
            </ul>
        </div>
    </div>

    <div class="product">
        <div class="container-md">
        <?php
        $fm = new Format();
        
            foreach ($data as $result_details) {
                
        ?>
                <div class="row">
                    <div class="col-12 col-sm-5">
                        <img class='product-img' src="<?php echo $result_details['Picture'] ?>" alt="">
                    </div>
                    <div class="col-12 col-sm-7">
                        <div class="item">
                            <h1><?php echo $result_details['Nane'] ?></h1>
                            <h5>Chổ này hông có DB nên hông biết truyền gì vô nữa :'> </h5>
                            <div class="price"><?php echo $fm->format_currency($result_details['Sell_price']) . " " . "VNĐ" ?></div>
                            <span>Danh mục:
                                <strong>
                                    <?php
                                    
                                    
                                        foreach ($data as $result_detailss) {
                                            echo $result_detailss['Name'];
                                        }
                                    
                                    ?>
                                </strong>
                            </span>
                            <form>
                                <div class="quantity">
                                    <button><span>-</span></button>
                                    <input type="text" readonly value="1">
                                    <button><span>+</span></button>
                                </div>
                                <button class="btn">Thêm vào giỏ hàng</button>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="description">
                    <h2>Mô tả</h2>
                    <?php
                        echo $result_details['Description']
                    ?>
                    <h3>Thông số kỹ thuật</h3>
                    <p>Nguồn cấp: <strong>10~30 VDC – 0.5W</strong></p>
                    <p>Truyền thông: <strong>Ethernet / Wifi</strong></p>
                    <p>Giao thức: <strong>Modbus TCP/IP</strong></p>
                    <p>Tốc độ: <strong>1,200bps to 115,200 bps</strong></p>
                    <p>Kết nối: Terminal screw block</p>
                    <p>Watchdog Timer: Có</p>
                    <p>Ngõ vào Analog: <strong>4 kênh</strong>, có khả năng chuyển đổi giữa dòng ngõ vào và điện áp ngõ
                        vào.</p>
                    <p>Độ phân giải: <strong>16-bit</strong></p>
                    <p>Dòng điện ngõ vào<br>
                        <strong>Ngõ vào: mA</strong><br>
                        Giá trị ngõ vào: 0-20mA, 4-20mA<br>
                        Sai số: 0.1%
                    </p>
                    <p>Điện áp ngõ vào<br>
                        <strong>Ngõ vào: V</strong><br>
                        Giá trị ngõ vào: 0-5V, 0-10V<br>
                        Sai số: 0.2%
                    </p>
                    <p><strong>Khác</strong></p>
                    <p>Đèn LED báo: Trạng thái nguồn</p>
                    <p>Lắp đặt DIN Ray</p>
                    <p>Khối lượng 0.5Kg</p>
                    <p>Kích thước 120x100x20mm</p>
                    <p>Điều kiện môi trường</p>
                    <p>Nhiệt độ hoạt động 0 – 70 độ C</p>
                    <p>Nhiệt độ bảo quản -25 – 85 độ C</p>
                    <p>Độ ẩm 15 – 80%</p>
                </div>
                <?php break; ?>
        <?php
        }
        ?>
        </div>
    </div>
    <div class="footer">
        <div class="container-sm">
            <div class="row">
                <div class="col-12 col-md-6">
                    <div class="item">
                        <img src="../../public/assets/image/logo-png2.png" alt="">
                        <p>Sở hữu Pyriot M2C - Chúng tôi cung cấp dịch vụ số hoá dữ liệu từ thiết bị, máy móc đến Cloud
                        </p>
                    </div>
                </div>
                <div class="col-12 col-md-6">
                    <div class="item">
                        <h3>Liên hệ</h3>
                        <ul>
                            <li>
                                <i class="fas fa-search-location"></i>
                                <span>Địa chỉ: 13/35 Thành Mỹ, phường 8, quận Tân Bình</span>
                            </li>
                            <li>
                                <i class="fas fa-phone"></i>
                                <span>SĐT: 0906515105 - 0914763634</span>
                            </li>
                            <li>
                                <i class="far fa-envelope"></i>
                                <span>Email: contact@pyroject.com</span>
                            </li>
                            <li>
                                <i class="fas fa-clock"></i>
                                <span>Thời gian làm việc:: T2 - T7 / 8:00 AM - 5:30 PM</span>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js"
        integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB"
        crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.2/dist/js/bootstrap.min.js"
        integrity="sha384-PsUw7Xwds7x08Ew3exXhqzbhuEYmA2xnwc8BuD6SEr+UmEHlX8/MCltYEodzWA4u"
        crossorigin="anonymous"></script>
    <script src="../../public/assets/js/base.js"></script>
</body>

</html>