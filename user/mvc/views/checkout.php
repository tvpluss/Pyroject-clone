<?php
// require_once './mvc/views/Layouts/Header.php';
require_once __DIR__ . "./Layouts/Header.php";
?>

<script>
  function checkValidation() {
    // const username = document.getElementById("username").value;
    const FirstName = document.getElementById("FirstName").value;
    const LastName = document.getElementById("LastName").value;
    const Email = document.getElementById("Email").value;
    const Telephone = document.getElementById("Telephone").value;
    const StreetAddress = document.getElementById("StreetAddress").value;
    const TownCity = document.getElementById("TownCity").value;
    const Postcode = document.getElementById("Postcode").value;
    const Account = document.getElementById("Account").value;
    const BankName = document.getElementById("BankName").value;
    const Note = document.getElementById("Note").value;
    // console.log(firstname, lastname, email, telephone, streetAddress, townCity, postcode, account, bankName);
    const localCheckFirstname = checkLength(FirstName, 20, "warningFirstname", "First name", 1);
    const localCheckLastname = checkLength(LastName, 30, "warningLastname", "Last name", 1);
    const localCheckEmail = checkEmail(Email);
    const localCheckTelephone = checkTelephone(Telephone);
    const localCheckStreetAddress = checkLength(StreetAddress, 70, "warningStreetAddress", "Street address", 1);
    const localCheckTownCity = checkLength(TownCity, 30, "warningTownCity", "Town City", 1);
    const localCheckPostcode = checkLength(Postcode, 10, "warningPostcode", "Post code", 0);
    const localCheckAccount = checkLength(Account, 20, "warningAccount", "Account", 1);
    const localCheckBankName = checkLength(BankName, 20, "warningBankName", "Bank Name", 1);
    const localCheckNote = checkLength(Note, 127, "warningNote", "Note", 0);
    return (localCheckFirstname && localCheckLastname && localCheckEmail && localCheckTelephone && localCheckStreetAddress && localCheckTownCity && localCheckPostcode && localCheckAccount && localCheckBankName && localCheckNote);
  }
</script>
<div class="checkout">
  <div class="row">
    <div class="col-lg-7 col-12">
      <div class="bill" onkeyup="checkValidation()">
        <h3>Chi ti???t ????n h??ng</h3>
        <div class="mb-3">
          <div class="row">
            <div class="col-sm-6 col-12">
              <label for="Lastname" class="form-label">H???*:</label>
              <input type="text" class="form-control" id="LastName" placeholder="Nh???p h??? c???a b???n" value='<?php
                                                                                                          if (isset($_SESSION['sessionLastName'])) {
                                                                                                            echo $_SESSION['sessionLastName'];
                                                                                                          } else {
                                                                                                            echo "";
                                                                                                          }; ?>'>
              <span class="warning" id="warningLastname"></span>
            </div>
            <div class="col-sm-6 c0l-12">
              <label for="Firstname" class="form-label">T??n*:</label>
              <input type="text" class="form-control" id="FirstName" placeholder="Nh???p t??n c???a b???n" value='<?php
                                                                                                            if (isset($_SESSION['sessionFirstName'])) {
                                                                                                              echo $_SESSION['sessionFirstName'];
                                                                                                            } else {
                                                                                                              echo "";
                                                                                                            }; ?>'>
              <span class="warning" id="warningFirstname"></span>
            </div>
          </div>
        </div>
        <div class="mb-3">
          <div class="row">
            <div class="col-sm-8 col-12">
              <label for="Email" class="form-label">Email*:</label>
              <input type="email" class="form-control" id="Email" placeholder="Nh???p Email" value='<?php
                                                                                                  if (isset($_SESSION['sessionEmail'])) {
                                                                                                    echo $_SESSION['sessionEmail'];
                                                                                                  } else {
                                                                                                    echo "";
                                                                                                  }; ?>'>
              <span class="warning" id="warningEmail"></span>
            </div>
            <div class="col-sm-4 col-12">
              <label for="Telephone" class="form-label">S??T*:</label>
              <input type="text" class="form-control" id="Telephone" placeholder="Nh???p S??T" value='<?php
                                                                                                    if (isset($_SESSION['sessionTelephone'])) {
                                                                                                      echo $_SESSION['sessionTelephone'];
                                                                                                    } else {
                                                                                                      echo "";
                                                                                                    }; ?>'>
              <span class="warning" id="warningTelephone"></span>
            </div>
          </div>
        </div>
        <div class="mb-3">
          <label for="StreetAddress" class="form-label">?????a ch???*:</label>
          <input type="text" class="form-control" id="StreetAddress" placeholder="Nh???p ?????a ch???" value='<?php
                                                                                                        if (isset($_SESSION['sessionStreetAddress'])) {
                                                                                                          echo $_SESSION['sessionStreetAddress'];
                                                                                                        } else {
                                                                                                          echo "";
                                                                                                        }; ?>'>
          <span class="warning" id="warningStreetAddress"></span>
        </div>
        <div class="mb-3">
          <label for="TownCity" class="form-label">T???nh/ Th??nh ph???*:</label>
          <input type="text" class="form-control" id="TownCity" placeholder="Nh???p th??nh ph???/ t???nh" value='<?php
                                                                                                          if (isset($_SESSION['sessionTownCity'])) {
                                                                                                            echo $_SESSION['sessionTownCity'];
                                                                                                          } else {
                                                                                                            echo "";
                                                                                                          }; ?>'>
          <span class="warning" id="warningTownCity"></span>
        </div>
        <div class="mb-3">
          <label for="Postcode" class="form-label">Postcode:</label>
          <input type="text" class="form-control" id="Postcode" placeholder="Postcode" value='<?php
                                                                                              if (isset($_SESSION['sessionPostcode'])) {
                                                                                                echo $_SESSION['sessionPostcode'];
                                                                                              } else {
                                                                                                echo "";
                                                                                              }; ?>'>
          <span class="warning" id="warningPostcode"></span>
        </div>
        <div class="mb-3">
          <div class="row">
            <div class="col-sm-8 col-12">
              <label for="Account" class="form-label">T??i kho???n ng??n h??ng*:</label>
              <input type="text" class="form-control" id="Account" placeholder="Nh???p t??i kho???n ng??n h??ng" value='<?php
                                                                                                                  if (isset($_SESSION['sessionAccount'])) {
                                                                                                                    echo $_SESSION['sessionAccount'];
                                                                                                                  } else {
                                                                                                                    echo "";
                                                                                                                  }; ?>'>
              <span class="warning" id="warningAccount"></span>
            </div>
            <div class="col-sm-4 col-12">
              <label for="BankName" class="form-label">T??n ng??n h??ng*:</label>
              <input type="text" class="form-control" id="BankName" placeholder="Nh???p t??n ng??n h??ng" value='<?php
                                                                                                            if (isset($_SESSION['sessionBankName'])) {
                                                                                                              echo $_SESSION['sessionBankName'];
                                                                                                            } else {
                                                                                                              echo "";
                                                                                                            }; ?>'>
              <span class="warning" id="warningBankName"></span>
            </div>
          </div>

        </div>
        <div class="mb-3">
          <label for="Note" class="form-label">L???i nh???n:</label>
          <textarea class="form-control" id="Note" name="Note" placeholder="Nh???p l???i nh???n"></textarea>
          <span class="warning" id="warningNote"></span>
        </div>
      </div>
    </div>
    <div class="col-lg-5 col-12">
      <div class="order">
        <div class="body">
          <h3>????n h??ng c???a b???n</h3>
          <h6>S???n ph???m</h6>
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
              <span class="price"><?php echo $fm->format_currency($product['Sell_price']) ?> ??</span>
            </div>

          <?php
          }
          ?>
          <div class="total">
            <h6>Total </h6>
            <span> <?php echo $fm->format_currency($total_price)  ?> ??</span>
          </div>
          <h6>H??nh th???c thanh to??n</h6>
          <!-- <div class="form-check">
            <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault1">
            <label class="form-check-label" for="flexRadioDefault1">
              Tr??? ti???n m???t
            </label>
          </div> -->
          <div class="form-check">
            <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault2" checked>
            <label class="form-check-label" for="flexRadioDefault2">
              Qua t??i kho???n ng??n h??ng
            </label>
          </div>
          <button class="btn btn-lg" onclick="processPurchase()"> Thanh to??n</button>
        </div>
      </div>
    </div>
  </div>
</div>
<script>
  function processPurchase() {
    if (!checkValidation()) {
      toast({
        type: "toast--error",
        title: "Error",
        msg: "Check out kh??ng th??nh c??ng, vui l??ng ??i???n ????ng v?? ?????y ????? th??ng tin",
        icon: "fas fa-exclamation-circle"
      });
      return;
    }
    const ID = <?php echo $_SESSION['sessionId'] ?>;
    const FirstName = document.getElementById("FirstName").value;
    const LastName = document.getElementById("LastName").value;
    const Email = document.getElementById("Email").value;
    const Telephone = document.getElementById("Telephone").value;
    const StreetAddress = document.getElementById("StreetAddress").value;
    const TownCity = document.getElementById("TownCity").value;
    const Postcode = document.getElementById("Postcode").value;
    const Account = document.getElementById("Account").value;
    const BankName = document.getElementById("BankName").value;
    const Note = document.getElementById("Note").value;
    // console.log("process");
    // console.log(ID, FirstName, LastName, StreetAddress, TownCity, Postcode, Account, BankName, Email, Telephone);
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
      ID: ID,
      Note: Note
    }, function(data, status) {
      console.log(data);
      if (data) {
        console.log("here");
        if (data == "success") {
          window.location.assign("./Product?page=1&success=order");
        } else if (data == "sqlerror") {
          toast({
            type: "toast--error",
            title: "Error",
            msg: "Check out kh??ng th??nh c??ng",
            icon: "fas fa-exclamation-circle"
          });
        } else if (data == "failed") {
          toast({
            type: "toast--error",
            title: "Error",
            msg: "H??? th???ng ??ang b???n, vui l??ng th??? l???i sao",
            icon: "fas fa-exclamation-circle"
          });
        } else if (data == "emptyfield") {
          toast({
            type: "toast--error",
            title: "Error",
            msg: "Check out kh??ng th??nh c??ng, vui l??ng ??i???n ?????y ????? th??ng tin",
            icon: "fas fa-exclamation-circle"
          });
        }
      } else {
        window.location.assign("./Checkout?error=order");
      }
    })
  }
</script>
<?php
require_once __DIR__ . './Layouts/Footer.php';
?>