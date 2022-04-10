<?php
// require_once './mvc/views/Layouts/Header.php';
require_once __DIR__ . "./Layouts/Header.php";
?>
<div class="container-sm">
  <table class="table table-striped table-hover">
    <tr>
      <th scope="col">ID sản phẩm</th>
      <th scope="col">Tên sản phẩm</th>
      <th scope="col">Đơn giá</th>
      <th scope="col">Số lượng</th>
      <th scope="col">Tổng</th>
    </tr>
    <?php
    $fm = new Format();
    foreach ($data as $result) { ?>
    <tr>
      <td scope="col"><?php echo $result['ID'] ?></td>
      <td scope="col"><?php echo $result['nane'] ?></td>
      <td scope="col"><?php echo $result['quantity'] ?></td>
      <td scope="col"><?php echo $fm->format_currency($result['Sell_price']) ?></td>
      <td scope="col"><?php echo $fm->format_currency($result['Total_amount_of_each_product']) ?></td>
      <?php }
      ?>
  </table>
</div>
<?php
require_once __DIR__ . './Layouts/Footer.php';
?>