<?php
include_once __DIR__ . "./Layouts/Header.php";
?>

<link rel="stylesheet" href="./public/assets/css/cart.css">
<div class="news">
    <div class="container-fluid px-5">
        <h1>Đây là cart của bạn</h1>
        <?php
        $fm = new Format();
        $total_price = 0;
        $total_quantity = 0;
        ?>
        <div class="row">
            <div class="col-sm-7">
                <table class="table table-image">
                    <thead>
                        <tr>
                            <th scope="col" style="width:15%"></th>
                            <th scope="col" style="width: 35%">NAME</th>
                            <th scope="col" style="width: 15%">PRICE</th>
                            <th scope="col" style="width:20%">QUANTITY</th>
                            <th scope="col" style="width:15%">SUBTOTAL</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        foreach ($data as $result) {
                        ?>
                            <?php
                            $total_price += $result['Sell_price'] * $result['quantity'];
                            $total_quantity += $result['quantity']
                            ?>
                            <tr>
                                <td style="width: 100px">
                                    <a href="./Details?ID=<?php echo $result['ID'] ?>">
                                        <img class="img-fluid img-thumbnail" src=<?php echo $result['Picture'] ?> alt="">
                                    </a>
                                </td>
                                <td>
                                    <a href="./Details?ID=<?php echo $result['ID'] ?>" class="name" style="text-decoration: none; color: black">
                                        <?php echo $result['Nane'] ?>
                                    </a>
                                </td>
                                <td>
                                    <div class="price"><?php echo $fm->format_currency($result['Sell_price']) . " " . "đ" ?></div>
                                </td>
                                <td>
                                    <div class="quantity">
                                        <button id="subtractQuantity"><span>-</span></button>
                                        <input id="quantity" type="text" readonly value=<?php echo $result['quantity'] ?>>
                                        <button id="addQuantity"><span>+</span></button>
                                    </div>
                                </td>
                                <td>
                                    <div class="subtotal">
                                        <?php echo $fm->format_currency($result['Sell_price'] * $result['quantity']) ?> đ
                                    </div>
                                </td>
                            </tr>

                        <?php
                        }
                        ?>
                    </tbody>
                </table>
            </div>
            <div class="card col-sm-5 h-75" style="color:deepskyblue">
                <div class="card-body">
                    <h2 class="card-title" style="text-decoration: underline">Cart total</h2>
                    <h3 class="card-subtitle mb-2 text-muted">
                        <div class="row">
                            <div class="col-sm-8"> Tổng số lượng:</div>
                            <div class="col-sm-4">
                                <span class="card-text"><?php echo $total_quantity ?></span>
                            </div>
                        </div>
                    </h3>
                    <h3 class="card-subtitle mb-2 text-muted">
                        <div class="row">
                            <div class="col-sm-8"> Tổng thanh toán:</div>
                            <div class="col-sm-4">
                                <span class="card-text"><?php echo $fm->format_currency($total_price) ?> đ</span>
                            </div>
                        </div>
                    </h3>
                    <form action="./Checkout?success=checkout" method="POST">
                        <?php
                        $json_encode = json_encode($data);
                        echo '<input type="hidden" name="data" value="' . htmlentities($json_encode) . '">';
                        ?>
                        <button type="submit" class="btn btn-primary btn-lg btn-block">Process to checkout</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<?php
include_once __DIR__ . "./Layouts/Footer.php";
