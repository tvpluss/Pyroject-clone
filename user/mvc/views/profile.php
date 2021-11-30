<?php
// require_once './mvc/views/Layouts/Header.php';
require_once __DIR__ . "./Layouts/Header.php";
?>
<script>
function checkValidation() {
  // const username = document.getElementById("username").value;
  const firstname = document.getElementById("firstname").value;
  const lastname = document.getElementById("lastname").value;
  const email = document.getElementById("email").value;
  const telephone = document.getElementById("telephone").value;
  const streetAddress = document.getElementById("streetAddress").value;
  const townCity = document.getElementById("townCity").value;
  const postcode = document.getElementById("postcode").value;
  const account = document.getElementById("account").value;
  const bankName = document.getElementById("bankName").value;
  // console.log(firstname, lastname, email, telephone, streetAddress, townCity, postcode, account, bankName);
  const localCheckFirstname = checkLength(firstname, 15, "warningFirstname", "First name", 1);
  const localCheckLastname = checkLength(lastname, 25, "warningLastname", "Last name", 1);
  const localCheckEmail = checkEmail(email);
  let localCheckTelephone = checkTelephone(telephone);
  if (telephone.length == 0) {
    localCheckTelephone = true;
    document.getElementById("warningTelephone").innerHTML = "";
  }
  const localCheckStreetAddress = checkLength(streetAddress, 70, "warningStreetAddress", "Địa chỉ", 0);
  const localCheckTownCity = checkLength(townCity, 25, "warningTownCity", "Tỉnh/thành phố", 0);
  const localCheckPostcode = checkLength(postcode, 10, "warningPostcode", "Post code", 0);
  const localCheckAccount = checkLength(account, 20, "warningAccount", "Tài khoản", 0);
  const localCheckBankName = checkLength(bankName, 20, "warningBankName", "Tên ngân hàng", 0);
  return (localCheckFirstname && localCheckLastname && localCheckEmail && localCheckTelephone &&
    localCheckStreetAddress && localCheckTownCity && localCheckPostcode && localCheckAccount && localCheckBankName);
}
</script>
<div class="container-sm">
  <style>
  .warning {
    font-size: 14px;
    color: #540dff;
    display: block;
    margin-bottom: 6 px;
  }
  </style>
  <form class="profile" onkeyup="checkValidation()">
    <h1 class="h3 mb-3 font-weight-normal">Thông tin cá nhân</h1>
    <div class="row">
      <div class="col-sm-6 col-12">
        <label for="username">Username:</label>
        <input disabled class="form-control" type="text" name="username" id="username"
          value="<?php echo $_SESSION['sessionUser'] ?>">
        <label for="lastname">Họ:</label>
        <input value='<?php echo $_SESSION["sessionLastName"] ?>' class="form-control" type="text" id="lastname"
          name="lastname" placeholder="Họ của bạn">
        <span class="warning" id="warningLastname"></span>
        <label for="firstname">Tên:</label>
        <input class="form-control" type="text" value='<?php echo $_SESSION["sessionFirstName"] ?>' id="firstname"
          name="firstname" placeholder="Tên của bạn">
        <span class="warning" id="warningFirstname"></span>
        <label for="email">Email:</label>
        <input value='<?php echo $_SESSION["sessionEmail"] ?>' class="form-control" type="email" id="email" name="email"
          placeholder="Email">
        <span class="warning" id="warningEmail"></span>
        <label for="telephone">Số điện thoại:</label>
        <input value='<?php echo $_SESSION["sessionTelephone"] ?>' class="form-control" type="text" id="telephone"
          name="telephone" placeholder="Optional">
        <span class="warning" id="warningTelephone"></span>
      </div>
      <div class="col-sm-6 col-12">
        <label for="streetAddress">Địa chỉ:</label>
        <input class="form-control" type="text" name="streetAddress" id="streetAddress"
          value='<?php if (isset($_SESSION['sessionStreetAddress'])) echo $_SESSION['sessionStreetAddress'] ?>'
          placeholder="Optional">
        <span class="warning" id="warningStreetAddress"></span>
        <label for="townCity">Tỉnh/Thành phố</label>
        <input class="form-control" type="text" name="townCity" id="townCity"
          value='<?php if (isset($_SESSION['sessionTownCity'])) echo $_SESSION['sessionTownCity'] ?>'
          placeholder="Optional">
        <span class="warning" id="warningTownCity"></span>
        <label for="postcode">Post Code:</label>
        <input class="form-control" class="form-control" type="text" id="postcode"
          value='<?php if (isset($_SESSION['sessionPostcode'])) echo $_SESSION['sessionPostcode'] ?>' name="postcode"
          placeholder="Optional">
        <span class="warning" id="warningPostcode"></span>
        <label for="account">Tài khoản ngân hàng:</label>
        <input class="form-control" type="text" name="account" id="account"
          value='<?php if (isset($_SESSION['sessionAccount'])) echo $_SESSION['sessionAccount'] ?>'
          placeholder="Optional">
        <span class="warning" id="warningAccount"></span>
        <label for="bankName">Tên ngân hàng:</label>
        <input class="form-control" type="text" name="bankName" id="bankName"
          value='<?php if (isset($_SESSION['sessionBankName'])) echo $_SESSION['sessionBankName'] ?>' id="bankName"
          placeholder="Optional">
        <span class="warning" id="warningBankName"></span>
      </div>
    </div>
    <button type="button" id="saveProfile" class="btn btn-primary">Lưu</button>
  </form>
</div>

<script>
var saveProfile = document.querySelector('#saveProfile');
saveProfile.addEventListener('click', (e) => {
  e.preventDefault();
  if (checkValidation()) {
    const username = document.getElementById("username").value;
    const firstname = document.getElementById("firstname").value;
    const lastname = document.getElementById("lastname").value;
    const email = document.getElementById("email").value;
    const telephone = document.getElementById("telephone").value;
    const streetAddress = document.getElementById("streetAddress").value;
    const townCity = document.getElementById("townCity").value;
    const postcode = document.getElementById("postcode").value;
    const account = document.getElementById("account").value;
    const bankName = document.getElementById("bankName").value;
    // console.log("success");
    $.post("./Profile/Edit", {
      Last_Name: lastname,
      First_Name: firstname,
      Usename: username,
      Email: email,
      Telephone: telephone,
      Street_Address: streetAddress,
      Town_City: townCity,
      Postcode_ZIP: postcode,
      Account: account,
      Bank_Name: bankName
    }, function(data, status) {
      if (data) {
        console.log(data);
        if (data == "success") {
          window.location.assign("./Index?success=updateProfile")
        } else if (data == "failed") {
          toast({
            type: "toast--error",
            title: "Error",
            msg: "Cập nhật thất bại",
            icon: "fas fa-check-circle"
          });
        } else if (data == "sqlerror") {
          toast({
            type: "toast--error",
            title: "Error",
            msg: "Cập nhật không thành công",
            icon: "fas fa-check-circle"
          });
        }
      }
    })
  } else {
    toast({
      type: "toast--error",
      title: "Error",
      msg: "Cập nhật không thành công, vui lòng điền đúng và đầy đủ thông tin",
      icon: "fas fa-check-circle"
    });
  }
})
</script>
<?php
require_once __DIR__ . './Layouts/Footer.php';
?>