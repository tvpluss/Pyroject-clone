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
          <img src="./public/assets/image/image-48-1.webp" alt="">
        </div>
      </div>
    </div>
  </div>
  <div class="list">
    <div class="container-md">
      <div class="row" style="margin-bottom: 20px;">
        <div class="col-12 col-lg-9">
        </div>
        <div class="col-12 col-lg-3">
          <input class="form-control me-2" id="search" type="text" placeholder="Tìm kiếm sản phẩm">
        </div>
      </div>
      <div class="row">
        <?php
        /*$product = new ProductModel();*/
        $fm = new Format();
        //$all_product = $product->get_all_product();
        foreach ($data as $result) {
        ?>
          <div class="col-6 col-sm-4 col-md-3 col-md-2">
            <div class="item">
              <a href="./Details?ID=<?php echo $result['ID'] ?>">
                <div class="img" style="background-image: url(<?php echo $result['Picture'] ?>);">

                </div>
              </a>
              <div class="tag">
                <?php
                echo '<h5>Catalog</h5>';
                foreach ($result['Catalog'] as $item) {
                  echo "<p> $item</p>";
                }
                echo '<h5>Tag</h5>';
                foreach ($result['Tag'] as $item) {
                  echo "<p> $item </p>";
                }
                /*$productt = new ProductModel();
                                    $get_product_details = $productt->get_details_catalog($result['ID']);
                                    if ($get_product_details) {
                                        while ($result_details = $get_product_details->fetch_assoc()) {
                                            echo $result_details['Name'];
                                        }
                                    }*/
                ?>
              </div>
              <div>
                <a href="./Details?ID=<?php echo $result['ID'] ?>" class="name">
                  <?php echo $result['Nane'] ?>
                </a>
              </div>
              <div class="price"><?php echo $fm->format_currency($result['Sell_price']) . " " . "VNĐ" ?></div>
              <button class="btn" onclick="addProduct( <?php echo $result['ID'] ?>)">Thêm vào giỏ hàng</button>
            </div>
          </div>
        <?php
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
  var names = document.querySelectorAll('.name');
  var search = document.querySelector('#search');

  search.addEventListener('keyup', (e) => {
    console.log(e.target.value);
    if (e.target.value) {
      var value = e.target.value.split(" ");
      names.forEach(name => {
        if (!name.parentNode.parentNode.parentNode.classList.contains("d-none")) {
          name.parentNode.parentNode.parentNode.classList.add("d-none")
        };
      })
      names.forEach(name => {
        value.forEach((item) => {
          if (name.outerText.toLowerCase().includes(item.toLowerCase())) {
            name.parentNode.parentNode.parentNode.classList.remove("d-none");
          }
        })
      })
    } else {
      names.forEach(name => {
        name.parentNode.parentNode.parentNode.classList.remove("d-none");
      })
    }
  })

  function addProduct(productID) {
    let cartId = '<?php
                  if (isset($_SESSION['cartId'])) {
                    echo ($_SESSION['cartId']);
                  } else {
                    echo "false";
                  }
                  ?>';
    if (cartId == "false") {
      toast({
        type: "toast--error",
        title: "Error",
        msg: "Vui lòng đăng nhập",
        icon: "far fa-exclamation-circle"
      });
    } else {
      $.post("./Product/addToCart", {
        productId: productID,
        cartId: cartId
      }, function(data, status) {
        if (data) {
          // console.log(cartId, productID);
          toast({
            type: "toast--success",
            title: "Success",
            msg: "Thêm vào giỏ hàng thành công",
            icon: "far fa-bell"
          });

        } else {
          toast({
            type: "toast--error",
            title: "Error",
            msg: "Thêm vào giỏ hàng thất bại",
            icon: "far fa-exclamation-circle"
          });
        }
      })
    }
  }
</script>