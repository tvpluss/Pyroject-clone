<?php
require_once __DIR__ . './Layouts/Header.php';
?>
<?php
if (isset($_SESSION['sessionId'])) {
  $User = $_SESSION['sessionUser'];
  $Telephone = $_SESSION['sessionTelephone'];
  $Email = $_SESSION['sessionEmail'];
  $Id = $_SESSION['sessionId'];
} else {
  $Id = -1;
}
?>
<script>
$(document).ready(function() {
  $('#submit').click((e) => {
    // console.log("submit");
    $.post("./Contact/Submit", {
      name: $('#name').val(),
      phonenumber: $('#phonenumber').val(),
      email: $('#email').val(),
      message: $('#message').val()
    }, function(data, status) {
      if (data) {
        toast({
          type: "toast--success",
          title: "Success",
          msg: "Gửi lời nhắn thành công, chúng tôi sẽ liên hệ lại với bạn qua email đã cung cấp",
          icon: "far fa-bell"
        });

      } else {
        toast({
          type: "toast--error",
          title: "Error",
          msg: "Gửi lời nhắn thất bại",
          icon: "far fa-bell"
        });
      }
    })
  })
})
</script>
<script type="text/javascript">
window.onload = function() {
  if ('<?php echo $Id ?>' != -1) {
    document.getElementById('name').value = '<?php echo $User ?>';
    document.getElementById('phonenumber').value = '<?php echo $Telephone ?>';
    document.getElementById('email').value = '<?php echo $Email ?>';
  }
}
</script>
<div class="contact">
  <div class="container-md">
    <div class="row">
      <div class="col-12 col-lg-5">
        <div class="item">
          <div class="left">
            <img src="./public/assets/image/logo-png2.png" alt="">
            <h3>Công ty TNHH Pyroject</h3>
            <ul>
              <li>
                <span>13/35 Thành Mỹ, P08, Q.Tân Bình, TP.HCM</span>
              </li>
              <li>
                <a href="">contact@pyroject.com</a>
              </li>
              <li>
                <a href="">(+84) 906 51 51 05</a>
              </li>
            </ul>
          </div>
        </div>
      </div>
      <div class="col-12 col-lg-7">
        <div class="item">
          <form method="post">
            <label for="name">Họ và tên</label>
            <input type="text" class="form-control" name="name" id="name" value>
            <label for="phonenumber">Số điện thoại liên hệ</label>
            <input type="text" class="form-control" name="phonenumber" id="phonenumber">
            <label for="email">Email</label>
            <input type="email" class="form-control" name="email" id="email">
            <label for="message">Tin nhắn</label>
            <textarea name="message" class="form-control" id="message" rows="6"></textarea>
            <div>
              <button class="btn" style="float:left;" type="button" id="submit">Gửi tin nhắn</button>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>

<?php
require_once __DIR__ . './Layouts/Footer.php';
?>