<?php
// require_once './mvc/views/Layouts/Header.php';
require_once __DIR__ . "./Layouts/Header.php";
?>
<div class="checkout">
  <div class="row">
    <div class="col-lg-7 col-12">
      <div class="bill">
        <h3>Chi tiết đơn hàng</h3>
        <div class="mb-3">
          <div class="row">
            <div class="col-sm-6 col-12">
              <label for="exampleFormControlInput1" class="form-label">Họ</label>
              <input type="text" class="form-control" id="LastName" placeholder="Last Name" value=<?php
                                                                                                  if (isset($_SESSION['sessionLastName'])) {
                                                                                                    echo $_SESSION['sessionLastName'];
                                                                                                  } else {
                                                                                                    echo "";
                                                                                                  }; ?>>
            </div>
            <div class="col-sm-6 c0l-12">
              <label for="exampleFormControlInput1" class="form-label">Tên</label>
              <input type="text" class="form-control" id="FirstName" placeholder="First Name" value=<?php
                                                                                                    if (isset($_SESSION['sessionFirstName'])) {
                                                                                                      echo $_SESSION['sessionFirstName'];
                                                                                                    } else {
                                                                                                      echo "";
                                                                                                    }; ?>>
            </div>
          </div>
        </div>
        <div class="mb-3">
          <label for="exampleFormControlInput1" class="form-label">Street Address</label>
          <input type="email" class="form-control" id="StreetAddress" placeholder="Street Address" value=<?php
                                                                                                          if (isset($_SESSION['sessionStreetAddress'])) {
                                                                                                            echo $_SESSION['sessionStreetAddress'];
                                                                                                          } else {
                                                                                                            echo "";
                                                                                                          }; ?>>
        </div>
        <div class="mb-3">
          <label for="TownCity" class="form-label">Town/City</label>
          <input type="email" class="form-control" id="TownCity" placeholder="Town/City" value=<?php
                                                                                                if (isset($_SESSION['sessionTownCity'])) {
                                                                                                  echo $_SESSION['sessionTownCity'];
                                                                                                } else {
                                                                                                  echo "";
                                                                                                }; ?>>
        </div>
        <div class="mb-3">
          <label for="Postcode" class="form-label">Postcode (optional)</label>
          <input type="email" class="form-control" id="Postcode" placeholder="Postcode" value=<?php
                                                                                              if (isset($_SESSION['sessionPostcode'])) {
                                                                                                echo $_SESSION['sessionPostcode'];
                                                                                              } else {
                                                                                                echo "";
                                                                                              }; ?>>
        </div>
        <div class="mb-3">
          <label for="Account" class="form-label">Account</label>
          <input type="email" class="form-control" id="Account" placeholder="Account" value=<?php
                                                                                            if (isset($_SESSION['sessionAccount'])) {
                                                                                              echo $_SESSION['sessionPostcode'];
                                                                                            } else {
                                                                                              echo "";
                                                                                            }; ?>>
        </div>
        <div class="mb-3">
          <label for="BankName" class="form-label">Bank Name</label>
          <input type="email" class="form-control" id="BankName" placeholder="Postcode" value=<?php
                                                                                              if (isset($_SESSION['sessionBankName'])) {
                                                                                                echo $_SESSION['sessionBankName'];
                                                                                              } else {
                                                                                                echo "";
                                                                                              }; ?>>
        </div>
      </div>
    </div>
    <div class="col-lg-5 col-12">
      <div class="order">
        <div class="body">
          <h3>Đơn hàng của bạn</h3>
          <h6>Sản phẩm</h6>
          <?php
          // $newdata = json_decode($data);
          $fm = new Format();
          $total_price = 0;
          foreach ($data as $product) {
            $total_price += $product['Sell_price'] * $product['quantity'];
          ?>

            <div class="product">
              <span class="name"><?php echo $product['Nane'] ?></span>
              <span class="quantity">x <?php echo $product['quantity'] ?></span>
              <span class="price"><?php echo $fm->format_currency($product['Sell_price']) ?> đ</span>
            </div>

          <?php
          }
          ?>
          <div class="total">
            <h6>Total </h6>
            <span> <?php echo $fm->format_currency($total_price)  ?> đ</span>
          </div>
          <h6>Hình thức thanh toán</h6>
          <div class="form-check">
            <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault1">
            <label class="form-check-label" for="flexRadioDefault1">
              Trả tiền mặt
            </label>
          </div>
          <div class="form-check">
            <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault2" checked>
            <label class="form-check-label" for="flexRadioDefault2">
              Qua tài khoản ngân hàng
            </label>
          </div>
          <button class="btn btn-lg" onclick="processPurchase()"> Thanh toán</button>
        </div>
      </div>
    </div>
  </div>
</div>
<script>
  function processPurchase() {
    const ID = <?php echo $_SESSION['sessionId'] ?>;
    const FirstName = document.getElementById("FirstName").value;
    const LastName = document.getElementById("LastName").value;
    const StreetAddress = document.getElementById("StreetAddress").value;
    const TownCity = document.getElementById("TownCity").value;
    const Postcode = document.getElementById("Postcode").value;
    const Account = document.getElementById("Account").value;
    const BankName = document.getElementById("BankName").value;
    const Email = "example@example.com";
    const Telephone = 123456789;
    console.log("process");
    console.log(ID, FirstName, LastName, StreetAddress, TownCity, Postcode, Account, BankName);
    $.post("./Checkout/Process", {
      Email: Email,
      FirstName: FirstName,
      LastName: LastName,
      StreetAddress: StreetAddress,
      TownCity: TownCity,
      Postcode: Postcode,
      Account: Account,
      BankName: BankName,
      Telephone: Telephone,
      ID: ID
    }, function(data, status) {
      console.log(data);
    })
  }
</script>
<?php
require_once __DIR__ . './Layouts/Footer.php';
?>