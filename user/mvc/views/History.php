<?php
require_once __DIR__ . './Layouts/Header.php';
?>
<div class="news">
    <div class="top">
        <div class="container-sm">
            <div class="row">
                <div class="col-12 col-lg-5">
                    <h1>
                        LỊCH SỬ MUA HÀNG
                    </h1>
                </div>
                <div class="col-12 col-lg-7">
                </div>
            </div>
        </div>
    </div>
    <div class="container-md">
        <?php
        foreach ($data as $order) {
        ?>
            <div class="card">
                <h3> Trạng thái: <?php echo $order['Status'] ?></h3>
                <h3> Ngày tạo: <?php echo $order['Created'] ?></h3>
                <?php
                foreach ($order['Products'] as $product) {
                ?>
                    <div class="item">
                        <a href="./Details?ID=<?php echo $product['Product_ID'] ?>" class="post">
                            <img src='<?php echo $product['Picture'] ?>'>
                            <h3> <?php echo $product['Name'] ?></h3>
                            <p> <?php echo $product['Quantity'] ?></p>
                            <p> Subtotal: <?php echo $product['Price'] ?></p>
                        </a>
                    </div>
                <?php
                }
                ?>
            </div>
        <?php
        }
        ?>
    </div>
</div>

<?php
require_once __DIR__ . './Layouts/Footer.php';
?>