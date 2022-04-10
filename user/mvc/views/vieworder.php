<?php
include_once __DIR__ . "./Layouts/Header.php";
?>

<link rel="stylesheet" href="./public/assets/css/cart.css">
<div class="news">
    <div class="container-fluid px-5">
        <?php
        $fm = new Format();
        $total_price = 0;
        $total_quantity = 0;
        $datalength = count($data);
        ?>

        <div class="row">
            <div class="col-sm-8">
                <table class="table table-image">
                    <thead>
                        <tr>
                            <th scope="col" style="width:10%">ID</th>
                            <th scope="col" style="width: 40%">NAME</th>
                            <th scope="col" style="width: 10%">PICTURE</th>
                            <th scope="col" style="width:20%">QUANTITY</th>
                            <th scope="col" style="width:20%">SUBTOTAL</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        foreach ($data as $result) {
                        ?>
                            <?php
                            $total_price += $result['Price'];
                            $total_quantity += $result['Quantity'];
                            ?>

                            <tr>
                                <td scope="col">
                                    <?php echo $result['ID'] ?>
                                </td>
                                <td scope="col">
                                    <a href="./Details?ID=<?php echo $result['ID'] ?>" class="name" style="text-decoration: none; color: black">
                                        <?php echo $result['Name'] ?>
                                    </a>
                                </td>
                                <td scope="col" style="width: 100px">
                                    <a href="./Details?ID=<?php echo $result['ID'] ?>">
                                        <img class="img-fluid img-thumbnail" src=<?php echo $result['Picture'] ?> alt="">
                                    </a>
                                </td>
                                <td scope="col">
                                    <div class="quantity">
                                        <p>
                                            <?php echo $result['Quantity'] ?>
                                        </p>
                                    </div>
                                </td>
                                <td scope="col">
                                    <div class="subtotal">
                                        <?php echo $fm->format_currency($result['Price']) ?> đ
                                    </div>
                                </td>
                            </tr>
                        <?php
                        }
                        ?>
                    </tbody>
                </table>
            </div>
            <div class="card col-sm-4 h-75" style="color:deepskyblue">
                <div class="card-body">
                    <h2 class="card-title">Order total</h2>
                    <h3 class="card-subtitle mb-2 text-muted">
                        <div class="row">
                            <div class="col-sm-6">
                                <h4>Tổng số lượng:</h4>
                            </div>
                            <div class="col-sm-6">
                                <h4><?php echo $total_quantity ?>
                                </h4>
                            </div>
                        </div>
                    </h3>
                    <h3 class="card-subtitle mb-2 text-muted">
                        <div class="row">
                            <div class="col-sm-6">
                                <h4> Tổng thanh toán:
                                </h4>
                            </div>
                            <div class="col-sm-6">
                                <h4><?php echo $fm->format_currency($total_price) ?> đ</h4>
                            </div>
                        </div>
                    </h3>
                </div>
            </div>
        </div>
    </div>
</div>

<?php
include_once __DIR__ . "./Layouts/Footer.php";
