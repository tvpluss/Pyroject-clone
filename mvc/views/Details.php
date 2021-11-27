<?php
include_once __DIR__ . "../Layouts/Header.php";
?>

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
                                <button id="subtractQuantity"><span>-</span></button>
                                <input id="quantity" type="text" readonly value="1">
                                <button id="addQuantity"><span>+</span></button>
                            </div>
                        </form>
                        <button class="btn" type="button" onclick="addProduct(<?php echo $result_details['ID'] ?>)">Thêm vào giỏ hàng</button>
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
<script>
    function toast({
        type = "",
        title = "",
        msg = "",
        icon = ""
    }) {
        var main = document.querySelector('#toast');
        if (main) {
            const toast = document.createElement('div');
            toast.classList.add('toast', `${type}`);
            toast.style.animation = "slideInleft ease .3s, fadeOut linear 1s 3s forwards";
            const ex = setTimeout(() => main.removeChild(toast), 4000);
            toast.onclick = function(e) {
                if (e.target.closest('.toast__close')) {
                    main.removeChild(toast);
                    clearTimeout(ex);
                };
            }
            toast.innerHTML = `
                    <div class="toast__icon">
                        <i class="${icon}"></i>
                    </div>
                    <div class="toast__body">
                        <h3 class="toast__title">${title}</h3>
                        <p class="toast__msg">${msg}</p>
                    </div>
                    <div class="toast__close">
                        <i class="fas fa-times"></i>
                    </div>
                `
            // var m = toast.getElementsByClassName('toast__close')[0];
            // m.addEventListener('click', () => {
            // main.removeChild(toast);
            // clearTimeout(ex);
            // })
            main.appendChild(toast);
        };
    };

    function addProduct(productID) {
        let cartId = '<?php echo $_SESSION['cartId']; ?>';
        let quantity = document.getElementById("quantity").value;
        console.log(productID, cartId, quantity);
        $.post("./Product/addToCart", {
            productId: productID,
            cartId: cartId,
            quantity: quantity
        }, function(data, status) {
            if (data) {
                console.log(cartId, productID);
                toast({
                    type: "toast--success",
                    title: "Success",
                    msg: "Gửi lời nhắn thành công, chúng tôi sẽ liên hệ lại với bạn qua email đã cung cấp",
                    icon: "far fa-bell"
                });

            } else {
                toast({
                    type: "toast--error",
                    title: "Error",
                    msg: "Gửi lời nhắn thất bại",
                    icon: "far fa-bell"
                });
            }
        })
    }
</script>
<?php
include_once __DIR__ . "./Layouts/Footer.php";
?>