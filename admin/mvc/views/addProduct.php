<?php
// require_once './mvc/views/Layouts/Header.php';
require_once __DIR__ . "./Layouts/Header.php";
?>
<div class="register ">
  <form method="post" style="max-width: 700px;" action="./AddProduct/Process">
    <a href="./Contact">
      <img src="./public/assets/image/logo-png2.png" alt="">
    </a>
    <h3>Thêm sản phẩm </h3>

    <label for="Name">Tên sản phẩm:</label>
    <input type="text" name="Name" id="Name" class="form-control" placeholder="Nhập tên sản phẩm">


    <label for="Category">Thể loại:</label>
    <input type="text" name="Category" id="Category" class="form-control" placeholder="Nhập thể loại" onkeyup="">

    <label for="Category">Tag:</label>
    <input type="text" name="Tag" id="Tag" class="form-control" placeholder="Nhập tag" onkeyup="">


    <label for="Description">Mô tả:</label>
    <input type="text" class="form-control" id="Description" name="Description" placeholder="Nhập mô tả" onkeyup="">


    <label for="Quantity">Số lượng:</label>
    <input type="number" class="form-control" id="Quantity" name="Quantity" placeholder="Nhập số lượng" onkeyup="checkQuantity(this.value)">
    <span id="warningQuantity" class="warning"></span>

    <label for="Sell_price">Giá bán:</label>
    <input type="text" class="form-control" name="Sell_price" id="Sell_price" placeholder="Nhập giá bán" onkeyup="checkSellPrice(this.value)">
    <span id="warningSellPrice" class="warning"></span>

    <label for="Buy_price">Giá mua:</label>
    <input type="text" class="form-control" name="Buy_price" id="Buy_price" placeholder="Nhập giá mua" onkeyup="checkBuyPrice(this.value)">
    <span id="warningBuyPrice" class="warning"></span>

    <label for="Picture">Đường dẫn hình ảnh:</label>
    <input type="text" class="form-control" name="Picture" id="Picture" placeholder="Nhập đường dẫn hình ảnh">
    <button class="btn btn-lg btn-primary btn-block" type="submit" name="submit" value="signup">Save</button>
  </form>
</div>


<?php
require_once __DIR__ . './Layouts/Footer.php';
?>