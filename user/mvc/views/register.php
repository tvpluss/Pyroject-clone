<?php
// require_once './mvc/views/Layouts/Header.php';
require_once __DIR__ . "./Layouts/Header.php";
?>

<script>
function checkValidation() {
  const email = document.getElementById("email").value;
  const username = document.getElementById("username").value;
  const password = document.getElementById("password").value;
  const confirmPassword = document.getElementById("confirmPassword").value;
  const firstname = document.getElementById("firstname").value;
  const lastname = document.getElementById("lastname").value;
  // console.log(checkUsename(username));
  const localCheckUsename = checkUsename(username);
  const localCheckPassword = checkPassword(password);
  const localCheckConfirmPassword = checkConfirmPassword(confirmPassword, password);
  const localCheckFirstname = checkLength(firstname, 20, "warningFirstname", "First name", 1);
  const localCheckLastname = checkLength(lastname, 20, "warningLastname", "Last name", 1);
  const localCheckEmail = checkEmail(email);
  return (localCheckConfirmPassword && localCheckPassword && localCheckFirstname && localCheckLastname &&
    localCheckEmail);
  // console.log(document.getElementById('warningUsername').classList.contains('true'));
  // console.log(email, username, password, confirmPassword, firstname, lastname, firstname);

}
</script>
<div class="register">
  <form onkeyup="checkValidation()">
    <a href="./Index">
      <img src="./public/assets/image/logo-png2.png" alt="">
    </a>
    <label for="username">Username*:</label>
    <input type="text" name="username" id="username" class="form-control" placeholder="Nhập username">
    <span id="warningUsername" class="warning"></span>
    <label for="password">Mật khẩu*:</label>
    <input type="password" name="password" id="password" class="form-control" placeholder="Nhập mật khẩu">
    <span id="warningPassword" class="warning"></span>
    <label for="confirmPassword">Mật khẩu xác nhận*:</label>
    <input id="confirmPassword" type="password" class="form-control" name="confirmPassword"
      placeholder="Nhập lại mật khẩu">
    <span id="warningConfirmPassword" class="warning"></span>
    <label for="firstname">Họ*:</label>
    <input type="text" class="form-control" name="firstname" id="firstname" placeholder="Nhập họ của bạn">
    <span id="warningFirstname" class="warning"></span>
    <label for="lastname">Tên*:</label>
    <input type="text" class="form-control" name="lastname" id="lastname" placeholder="Nhập tên của bạn">
    <span id="warningLastname" class="warning"></span>
    <label for="email">Email:</label>
    <input id="email" type="email" class="form-control" name="email" placeholder="Nhập email của bạn">
    <span id="warningEmail" class="warning"></span>
    <button class="btn btn-lg btn-primary btn-block" type="button" id="register" name="submit" value="signup">Đăng
      kí</button>
  </form>
</div>
<script>
function checkValidation() {
  const email = document.getElementById("email").value;
  const username = document.getElementById("username").value;
  const password = document.getElementById("password").value;
  const confirmPassword = document.getElementById("confirmPassword").value;
  const firstname = document.getElementById("firstname").value;
  const lastname = document.getElementById("lastname").value;
  // console.log(checkUsename(username));
  const localCheckUsename = checkUsename(username);
  const localCheckPassword = checkPassword(password);
  const localCheckConfirmPassword = checkConfirmPassword(confirmPassword, password);
  const localCheckFirstname = checkLength(firstname, 10, "warningFirstname", "First name", 1);
  const localCheckLastname = checkLength(lastname, 20, "warningLastname", "Last name", 1);
  const localCheckEmail = checkEmail(email);
  return (localCheckConfirmPassword && localCheckPassword && localCheckFirstname && localCheckLastname &&
    localCheckEmail);
  // console.log(document.getElementById('warningUsername').classList.contains('true'));
  // console.log(email, username, password, confirmPassword, firstname, lastname, firstname);

}
</script>
<script>
var register = document.querySelector('#register');
register.addEventListener('click', (e) => {
  e.preventDefault();
  if (checkValidation()) {
    const email = document.getElementById("email").value;
    const username = document.getElementById("username").value;
    const password = document.getElementById("password").value;
    const confirmPassword = document.getElementById("confirmPassword").value;
    const firstname = document.getElementById("firstname").value;
    const lastname = document.getElementById("lastname").value;
    // console.log("success");
    $.post("./Register/Process", {
      email: email,
      username: username,
      password: password,
      confirmPassword: confirmPassword,
      firstname: firstname,
      lastname: lastname
    }, function(data, status) {
      if (data) {
        // console.log(data);
        if (data == "registered")
          toast({
            type: "toast--success",
            title: "Success",
            msg: "Đăng kí thành công",
            icon: "fas fa-check-circle"
          });
        else if (data == "usernametaken") {
          toast({
            type: "toast--error",
            title: "Error",
            msg: "Đăng kí không thành công, tên người dùng đã được dùng",
            icon: "fas fa-check-circle"
          });
        } else if (data == "sqlerror") {
          toast({
            type: "toast--error",
            title: "Error",
            msg: "Đăng kí không thành công",
            icon: "fas fa-check-circle"
          });
        }
      }
    })
  } else {
    toast({
      type: "toast--error",
      title: "Error",
      msg: "Đăng kí không thành công, vui lòng điền đúng và đầy đủ thông tin",
      icon: "fas fa-check-circle"
    });
  }
})
</script>
<?php
require_once __DIR__ . './Layouts/Footer.php';
?>