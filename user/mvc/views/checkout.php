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
              <label for="exampleFormControlInput1" class="form-label">Email address</label>
              <input type="email" class="form-control" id="exampleFormControlInput1" placeholder="name@example.com">
            </div>
            <div class="col-sm-6 c0l-12">
              <label for="exampleFormControlInput1" class="form-label">Email address</label>
              <input type="email" class="form-control" id="exampleFormControlInput1" placeholder="name@example.com">
            </div>
          </div>
        </div>
        <div class="mb-3">
          <label for="exampleFormControlInput1" class="form-label">Email address</label>
          <input type="email" class="form-control" id="exampleFormControlInput1" placeholder="name@example.com">
        </div>
        <div class="mb-3">
          <label for="exampleFormControlInput1" class="form-label">Email address</label>
          <input type="email" class="form-control" id="exampleFormControlInput1" placeholder="name@example.com">
        </div>
        <div class="mb-3">
          <label for="exampleFormControlInput1" class="form-label">Email address</label>
          <input type="email" class="form-control" id="exampleFormControlInput1" placeholder="name@example.com">
        </div>
      </div>
    </div>
    <div class="col-lg-5 col-12">
      <div class="order">
        <div class="body">
          <h3>Đơn hàng của bạn</h3>
          <h6>Sản phẩm</h6>
          <div class="product">
            <span class="name">Pyriot AD Module</span>
            <span class="quantity">x 1</span>
            <span class="price"> 800.000</span>
          </div>
          <div class="product">
            <span class="name">Pyriot AD Module</span>
            <span class="quantity">x 1</span>
            <span class="price"> 800.000</span>
          </div>
          <div class="product">
            <span class="name">Pyriot AD Module</span>
            <span class="quantity">x 1</span>
            <span class="price"> 800.000</span>
          </div>
          <div class="product">
            <span class="name">Pyriot AD Module</span>
            <span class="quantity">x 1</span>
            <span class="price"> 800.000</span>
          </div>
          <div class="total">
            <h6>Total </h6>
            <span> 800.000</span>
          </div>
          <h6>Hình thức thanh toán</h6>
          <div class="form-check">
            <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault1">
            <label class="form-check-label" for="flexRadioDefault1">
              Default radio
            </label>
          </div>
          <div class="form-check">
            <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault2" checked>
            <label class="form-check-label" for="flexRadioDefault2">
              Default checked radio
            </label>
          </div>
          <button class="btn btn-lg"> Thanh toán</button>
        </div>
      </div>
    </div>
  </div>
</div>
<?php
require_once __DIR__ . './Layouts/Footer.php';
?>