<?php
// require_once './mvc/views/Layouts/Header.php';
require_once __DIR__ . "./Layouts/Header.php";
?>
<div class="register ">
  <form method="post" style="max-width: 700px;" action="./Product/Save">
    <a href="./Contact">
      <img src="./public/assets/image/logo-png2.png" alt="">
    </a>
    <h3>Sửa sản phẩm </h3>
    <label for="ID">ID:</label>
    <input type="text" name="ID" id="ID" class="form-control" onkeyup="checkProduct(this.value)"
      value='<?php echo $data['ID'] ?>' readonly>

    <label for="Name">Name:</label>
    <input type="text" name="Name" id="Nane" class="form-control" onkeyup="checkProduct(this.value)"
      value='<?php echo $data['Nane'] ?>'>

    <label for="Description">Description:</label>
    <input type="text" class="form-control" id="Description" name="Description"
      value=" <?php echo $data['Description'] ?>">


    <label for="Quantity">Quantity:</label>
    <input type="text" class="form-control" id="Quantity" name="Quantity" onkeyup="checkQuantity(this.value)"
      value=" <?php echo $data['Quantity'] ?>">
    <span id="warningQuantity" class="warning"></span>

    <label for="Sell_price">Sell Price:</label>
    <input type="text" class="form-control" name="Sell_price" id="Sell_price" onkeyup="checkSellPrice(this.value)"
      value=" <?php echo $data['Sell_price'] ?>">
    <span id="warningSellPrice" class="warning"></span>

    <label for="Buy_price">Buy Price:</label>
    <input type="text" class="form-control" name="Buy_price" id="Buy_price" onkeyup="checkBuyPrice(this.value)"
      value="<?php echo $data['Buy_price'] ?>">
    <span id="warningBuyPrice" class="warning"></span>

    <label for="Picture">Picture:</label>
    <input type="text" class="form-control" name="Picture" id="Picture" value="<?php echo $data['Picture'] ?>">
    <button class="btn btn-lg btn-primary btn-block" type="submit" name="submit" value="signup">Save</button>
  </form>
</div>

<?php
require_once __DIR__ . './Layouts/Footer.php';
?>