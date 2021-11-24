<?php
require_once __DIR__ . './Layouts/Header.php';
if (!isset($_GET['proid']) || $_GET['proid'] == NULL) {
    require_once "./mvc/controllers/Errors.php";
} else {
    $id = $_GET['proid'];
}
?>


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
        $product = new ProductModel();
        $fm = new Format();
        $get_product_details = $product->get_details_catalog($id);
        if ($get_product_details) {
            while ($result_details = $get_product_details->fetch_assoc()) {
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
                                    $productt = new ProductModel();
                                    $get_product_detailss = $productt->get_details_catalog($result_details['ID']);
                                    if ($get_product_detailss) {
                                        while ($result_detailss = $get_product_detailss->fetch_assoc()) {
                                            echo $result_detailss['Name'];
                                        }
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


        <?php
            }
        }
        ?>
    </div>
</div>

<?php
require_once __DIR__ . './Layouts/Footer.php';
?>