<?php
require_once __DIR__ . "./Layouts/Header.php";
?>
<div class="login">
  <form>
    <a href="./Index">
      <img src="./public/assets/image/logo-png2.png" alt="">
    </a>
    <label for="oldPassword">Old password</label>
    <input type="password" name="oldPassword" id="oldPassword" class="form-control" placeholder="oldPassword" required autofocus>
    <label for="newPassword" class="sr-only">newPassword</label>
    <input type="password" name="newPassword" id="newPassword" class="form-control" placeholder="newPassword" required>
    <span class="warning">Password must has minimum eight characters, at least one uppercase letter, one lowercase letter and one number</span>
    <button class="btn btn-lg btn-primary btn-block" type="button" id="change" name="submit" value="change">Change password</button>
  </form>
</div>
<script>
  var change = document.querySelector('#change');
  change.addEventListener('click', (e) => {
    e.preventDefault();
    const oldPassword = document.getElementById("oldPassword").value;
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