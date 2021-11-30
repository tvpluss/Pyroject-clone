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
        <div id="result"></div>
        <?php
        /*$product = new ProductModel();*/
        $fm = new Format();
        //$all_product = $product->get_all_product();
        foreach ($data['products'] as $result) {
        ?>
          <div class="col-6 col-sm-4 col-md-3 col-md-2">
            <div class="item">
              <a href="./Details?ID=<?php echo $result['ID'] ?>">
                <div class="img" style="background-image: url(<?php echo $result['Picture'] ?>);">

                </div>
              </a>
              <div class="tag">
                <?php
                foreach ($result['Catalog'] as $item) {
                  echo " $item";
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
      <nav id="paging" aria-label="Page navigation example">
        <ul class="pagination">
          <li class="page-item"><a class="page-link" href="./Product?page=1">Trang đầu</a></li>
          <li class="page-item"><a class="page-link" href="./Product?page=<?php echo ($data['currentPage'] - 1) ?>">
              << </a>
          </li>
          <li class="page-item"><a class="page-link" href="#"><?php echo ($data['currentPage']) ?></a></li>
          <li class="page-item"><a class="page-link" href="./Product?page=<?php echo ($data['currentPage'] + 1) ?>"> >>
            </a></li>
          <li class="page-item"><a class="page-link" href="./Product?page=<?php echo ($data['totalPages']) ?>">Trang
              cuối</a></li>
        </ul>
      </nav>
    </div>
  </div>
</div>

<?php
require_once __DIR__ . './Layouts/Footer.php';
?>

<script>
  var search = document.querySelector('#search');
  // console.log(tags[1]);
  search.addEventListener('keyup', (e) => {
    if (e.target.value) {
      if (e.key == 'Enter') {
        window.location.assign('./Product?page=1&&limit=nolimit');
        sessionStorage.setItem("search", e.target.value);

        // if (e.target.value) {
        //   var value = e.target.value.split(" ");
        //   names.forEach(name => {
        //     if (!name.parentNode.parentNode.parentNode.classList.contains("d-none")) {
        //       name.parentNode.parentNode.parentNode.classList.add("d-none")
        //     };
        //   })
        //   names.forEach(name => {
        //     value.forEach((item) => {
        //       if (name.outerText.toLowerCase().includes(item.toLowerCase())) {
        //         name.parentNode.parentNode.parentNode.classList.remove("d-none");
        //       }
        //     })
        //   })
        // } else {
        //   names.forEach(name => {
        //     name.parentNode.parentNode.parentNode.classList.remove("d-none");
        //   })
        // }
      }
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

  window.onload = function() {
    var search = sessionStorage.getItem("search");
    var names = document.querySelectorAll('.name');
    if (search) {
      sessionStorage.removeItem("search");
      var paging = document.querySelector('#paging');
      paging.classList.add("d-none");
      var value = search.split(" ");
      var tags = document.querySelectorAll('.tag');
      names.forEach(name => {
        if (!name.parentNode.parentNode.parentNode.classList.contains("d-none")) {
          name.parentNode.parentNode.parentNode.classList.add("d-none")
        };
      })
      var noResult = true;
      names.forEach(name => {
        var check = true;
        value.forEach((item) => {
          if (!name.outerText.toLowerCase().includes(item.toLowerCase())) {
            check = false;
          }
        })
        if (check) {
          name.parentNode.parentNode.parentNode.classList.remove("d-none");
          noResult = false;
        }
      })
      if (noResult) {
        var result = document.querySelector('#result');
        result.innerHTML = `<h1 style="margin: 50px 0;">Không có kết quả tìm kiếm phù hợp</h1>`
      }
    } else {
      var paging = document.querySelector('#paging');
      paging.classList.remove("d-none");
      names.forEach(name => {
        name.parentNode.parentNode.parentNode.classList.remove("d-none");
      })
    }
  }
</script>