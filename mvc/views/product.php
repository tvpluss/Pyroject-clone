<?php
require_once __DIR__ . './Layouts/Header.php';
?>


<div class="products">
    <div class="top">
        <div class="container-sm">
            <div class="row">
                <div class="col-12 col-lg-5">
                    <h1>
                        PYRIOT ED
                    </h1>
                    <p>
                        Nằm trong chuỗi sản phẩm Pyriot M2C, các phần cứng này thực hiện chuyển đổi tín hiệu sang dữ
                        liệu số hoặc giao tiếp với phần tử khác để thu gom thông tin. Giúp bạn nhanh chóng tích hợp
                        với thiết bị, máy móc và xây dựng hệ thu thập dữ liệu
                    </p>
                </div>
                <div class="col-12 col-lg-7">
                    <img src="./assets/image/image-48-1.webp" alt="">
                </div>
            </div>
        </div>
    </div>
    <div class="list">
        <div class="container-md">
            <div class="row">
                <a href="./Product/Details/1">Bâms</a>
                <?php
                $product = new ProductModel();
                $fm = new Format();
                $all_product = $product->get_all_product();
                if ($all_product) {
                    while ($result = $all_product->fetch_assoc()) {
                ?>
                        <div class="col-6 col-sm-4 col-md-3 col-md-2">
                            <div class="item">
                                <a href="./Details?proid=<?php echo $result['ID'] ?>">
                                    <div class="img" style="background-image: url(<?php echo $result['Picture'] ?>);">

                                    </div>
                                </a>
                                <div class="tag">
                                    <?php
                                    $productt = new ProductModel();
                                    $get_product_details = $productt->get_details_catalog($result['ID']);
                                    if ($get_product_details) {
                                        while ($result_details = $get_product_details->fetch_assoc()) {
                                            echo $result_details['Name'];
                                        }
                                    }
                                    ?>
                                </div>
                                <div>
                                    <a href="" class="name">
                                        <?php echo $result['Nane'] ?>
                                    </a>
                                </div>
                                <div class="price"><?php echo $fm->format_currency($result['Sell_price']) . " " . "VNĐ" ?></div>
                                <button class="btn" onclick="showSuccess()">Thêm vào giỏ hàng</button>
                            </div>
                        </div>
                <?php
                    }
                }
                ?>
            </div>
        </div>
    </div>
</div>

<?php
require_once __DIR__ . './Layouts/Footer.php';
?>

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

    function showSuccess() {
        toast({
            type: "toast--success",
            title: "Success",
            msg: "Sản phẩm đã được thêm vào giỏ hàng.",
            icon: "fas fa-check-circle"
        });
    }
</script>