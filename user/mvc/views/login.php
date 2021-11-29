<?php
require_once __DIR__ . "./Layouts/Header.php";
?>
<div class="login">
  <form>
    <a href="./Index">
      <img src="./public/assets/image/logo-png2.png" alt="">
    </a>
    <label for="Username" class="sr-only">Username</label>
    <input type="text" name="username" id="Username" class="form-control" placeholder="Nhập username" required
      autofocus>
    <label for="Password" class="sr-only">Mật khẩu</label>
    <input type="password" name="password" id="Password" class="form-control" placeholder="Nhập password" required>
    <span class="warning">
      Mật khẩu có ít nhất 8 kí tự, phải có ít nhất 1 kí tự viết hoa, viết thường và số
    </span>
    <button class="btn btn-lg btn-primary btn-block" type="button" id="login" name="submit" value="signin">
      Đăng nhập
    </button>
  </form>
</div>
<script>
var login = document.querySelector('#login');
login.addEventListener('click', (e) => {
  e.preventDefault();
  const Username = document.getElementById("Username").value;
  const Password = document.getElementById("Password").value;
  $.post("./Login/Process", {
    username: Username,
    password: Password
  }, function(data, status) {
    if (data) {
      console.log(data);
      if (data == "loggedin") {
        window.location.assign("./Intro?success=loggedin");
      } else if (data == "sqlerror") {
        toast({
          type: "toast--error",
          title: "Error",
          msg: "Đăng nhập không thành công",
          icon: "fas fa-exclamation-circle"
        });
      } else if (data == "wrongpassword") {
        toast({
          type: "toast--error",
          title: "Error",
          msg: "Sai mật khẩu",
          icon: "fas fa-exclamation-circle"
        });
      } else if (data == "nouser") {
        toast({
          type: "toast--error",
          title: "Error",
          msg: "Không tìm thấy user",
          icon: "fas fa-exclamation-circle"
        });
      } else if (data == "emptyfields") {
        toast({
          type: "toast--error",
          title: "Error",
          msg: "Vui lòng điền đầy đủ Username và Password",
          icon: "fas fa-exclamation-circle"
        });
      }
      // console.log(data);
    }
  })
  // console.log(Username, Password);
})
</script>
<?php
require_once __DIR__ . "./Layouts/Footer.php";
?>