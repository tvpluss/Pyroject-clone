<?php
include_once __DIR__ . "./Layouts/Header.php";
?>

<link rel="stylesheet" href="./public/assets/css/cart.css">
<div class="news">
  <div class="container-fluid px-5">
    <h1>Giỏ hàng của bạn</h1>
    <?php
    $fm = new Format();
    $total_price = 0;
    $total_quantity = 0;
    $datalength = count($data);
    ?>
    <div class="row">
      <div class="col-sm-7">
        <table class="table table-image">
          <thead>
            <tr>
              <th scope="col" style="width:15%"></th>
              <th scope="col" style="width: 35%">Tên sản phẩm</th>
              <th scope="col" style="width: 15%">Giá</th>
              <th scope="col" style="width:20%">Số lượng</th>
              <th scope="col" style="width:15%">Thành tiền</th>
            </tr>
          </thead>
          <tbody>
            <?php
            foreach ($data as $result) {
            ?>
              <?php
              $total_price += $result['Sell_price'] * $result['quantity'];
              $total_quantity += $result['quantity'];
              ?>

              <tr>
                <td style="width: 100px">
                  <a href="./Details?ID=<?php echo $result['ID'] ?>">
                    <img class="img-fluid img-thumbnail" src=<?php echo $result['Picture'] ?> alt="">
                  </a>
                </td>
                <td>
                  <a href="./Details?ID=<?php echo $result['ID'] ?>" class="name" style="text-decoration: none; color: black">
                    <?php echo $result['Nane'] ?>
                  </a>
                </td>
                <td>
                  <div class="price"><?php echo $fm->format_currency($result['Sell_price']) . " " . "đ" ?></div>
                </td>
                <td>
                  <div class="quantity">
                    <button id="subtractQuantity<?php echo $result['ID'] ?>"><span>-</span></button>
                    <input id="quantity<?php echo $result['ID'] ?>" type="text" readonly value=<?php echo $result['quantity'] ?>>
                    <button id="addQuantity<?php echo $result['ID'] ?>"><span>+</span></button>
                  </div>
                </td>
                <td>
                  <div class="subtotal">
                    <?php echo $fm->format_currency($result['Sell_price'] * $result['quantity']) ?> đ
                  </div>
                </td>
              </tr>
              <script>
                var subtractQuantity<?php echo $result['ID'] ?> = document.querySelector(
                  '#subtractQuantity<?php echo $result['ID'] ?>');
                var addQuantity<?php echo $result['ID'] ?> = document.querySelector(
                  '#addQuantity<?php echo $result['ID'] ?>');
                var quantity<?php echo $result['ID'] ?> = document.querySelector('#quantity<?php echo $result['ID'] ?>');
                // console.log(subtractQuantity, addQuantity, quantity);
                subtractQuantity<?php echo $result['ID'] ?>.addEventListener('click', (e) => {
                  e.preventDefault();
                  if (quantity<?php echo $result['ID'] ?>.value > 0) {
                    $.post("./Cart/substractOnCart", {
                      cartId: <?php echo $_SESSION['cartId'] ?>,
                      productId: <?php echo $result['ID'] ?>
                    }, function(data, status) {
                      if (data) {
                        window.location.reload();
                      }
                    })
                  }
                })

                addQuantity<?php echo $result['ID'] ?>.addEventListener('click', (e) => {
                  e.preventDefault();
                  quantity<?php echo $result['ID'] ?>.value++;
                  $.post("./Cart/addToCart", {
                    cartId: <?php echo $_SESSION['cartId'] ?>,
                    productId: <?php echo $result['ID'] ?>
                  }, function(data, status) {
                    if (data) {
                      window.location.reload();
                    }
                  })
                })
              </script>
            <?php
            }
            ?>
          </tbody>
        </table>
      </div>
      <div class="card col-sm-5 h-75" style="color:deepskyblue">
        <div class="card-body">
          <h2 class="card-title" style="text-decoration: underline">Giỏ hàng</h2>
          <h3 class="card-subtitle mb-2 text-muted">
            <div class="row">
              <div class="col-sm-8"> Tổng số lượng:</div>
              <div class="col-sm-4">
                <span class="card-text"><?php echo $total_quantity ?></span>
              </div>
            </div>
          </h3>
          <h3 class="card-subtitle mb-2 text-muted">
            <div class="row">
              <div class="col-sm-8"> Tổng thanh toán:</div>
              <div class="col-sm-4">
                <span class="card-text"><?php echo $fm->format_currency($total_price) ?> đ</span>
              </div>
            </div>
          </h3>
          <form action="./Checkout" method="POST">
            <?php
            $json_encode = json_encode($data);
            echo '<input type="hidden" name="data" value="' . htmlentities($json_encode) . '">';
            ?>
            <button type="submit" id="checkout" class="btn btn-primary btn-lg btn-block">Chuyển tới checkout</button>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>

<script>
  let cnt = <?php echo $datalength ?>;
  console.log(cnt);
  if (cnt == 0) {
    document.getElementById("checkout").hidden = true;
  }

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
</script>
<?php
include_once __DIR__ . "./Layouts/Footer.php";
