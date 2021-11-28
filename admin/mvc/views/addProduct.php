<?php
// require_once './mvc/views/Layouts/Header.php';
require_once __DIR__ . "./Layouts/Header.php";
?>
<div class="register container-sm">
    <form method="post" action="./AddProduct/Process">
        <a href="./Index">
            <img src="./public/assets/image/logo-png2.png" alt="">
        </a>
        <h3>Thêm sản phẩm </h3>
        <label for="Name">Name:</label>
        <input type="text" name="Name" id="Name" class="form-control" placeholder="Product Name" onkeyup="checkProduct(this.value)">


        <label for="Category">Category:</label>
        <input type="text" name="Category" id="Category" class="form-control" placeholder="Category" onkeyup="">


        <label for="Description">Description:</label>
        <input type="text" class="form-control" id="Description" name="Description" placeholder="Description" onkeyup="">


        <label for="Quantity">Quantity:</label>
        <input type="number" class="form-control" id="Quantity" name="Quantity" placeholder="Quantity" onkeyup="checkQuantity(this.value)">
        <span id="warningQuantity" class="warning"></span>

        <label for="Sell_price">Sell Price:</label>
        <input type="text" class="form-control" name="Sell_price" id="Sell_price" placeholder="Sell Price" onkeyup="checkSellPrice(this.value)">
        <span id="warningSellPrice" class="warning"></span>
        
        <label for="Buy_price">Buy Price:</label>
        <input type="text" class="form-control" name="Buy_price" id="Buy_price" placeholder="Buy Price" onkeyup="checkBuyPrice(this.value)">
        <span id="warningBuyPrice" class="warning"></span>

        <label for="Picture">Picture:</label>
        <input type="text" class="form-control" name="Picture" id="Picture" placeholder="Link Picture">
        <button class="btn btn-lg btn-primary btn-block" type="submit" name="submit" value="signup">Save</button>
    </form>
</div>

<?php
require_once __DIR__ . './Layouts/Footer.php';
?>