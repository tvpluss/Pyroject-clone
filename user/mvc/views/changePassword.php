<?php
require_once __DIR__ . "./Layouts/Header.php";
?>
<div class="login">
  <form onkeyup="checkValidation()">
    <a href="./Index">
      <img src="./public/assets/image/logo-png2.png" alt="">
    </a>
    <label for="oldPassword">Mật khẩu cũ</label>
    <input type="password" name="oldPassword" id="oldPassword" class="form-control" placeholder="Nhập lại mật khẩu cũ" required autofocus value="111111">
    <label for="newPassword">Mật khẩu mới</label>
    <input type="password" name="newPassword" id="newPassword" class="form-control" placeholder="Nhập mật khẩu mới" required>
    <span class="warning" id="warningPassword"></span>
    <button class="btn btn-lg btn-primary btn-block" type="button" id="change" name="submit" value="change">Đổi mật khẩu</button>
  </form>
</div>
<script>
  function checkValidation() {
    const oldPassword = document.getElementById("oldPassword").value;
    const newPassword = document.getElementById("newPassword").value;
    if (oldPassword == newPassword) {
      document.getElementById("warningPassword").innerHTML = "Mật khẩu mới phải khác mật khẩu cũ";
      return false;
    }
    return checkPassword(newPassword);
  }
  var change = document.querySelector('#change');
  change.addEventListener('click', (e) => {
    e.preventDefault();
    const oldPassword = document.getElementById("oldPassword").value;
    const newPassword = document.getElementById("newPassword").value;
    if (!checkValidation()) {
      toast({
        type: "toast--error",
        title: "Error",
        msg: "Đã xảy ra lỗi, vui lòng kiểm tra lại",
        icon: "fas fa-exclamation-circle"
      });
    }
    // console.log(oldPassword, newPassword);
    $.post("./Profile/changePassword", {
      oldPassword: oldPassword,
      newPassword: newPassword
    }, function(data, status) {
      if (data) {
        // console.log(data);
        if (data == "success") {
          toast({
            type: "toast--success",
            title: "Success",
            msg: "Thay đổi mật khẩu thành công",
            icon: "far fa-bell"
          });
          // window.location.assign("./Intro?success=loggedin");
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
        } else if (data == "failed") {
          toast({
            type: "toast--error",
            title: "Error",
            msg: "Thay đổi mật khẩu thất bại",
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