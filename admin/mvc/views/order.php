<?php
// require_once './mvc/views/Layouts/Header.php';
require_once __DIR__ . "./Layouts/Header.php";
?>
<div class="container-sm">
  <table class="table table-striped table-hover">
    <tr>
      <!-- <th scope="col">ID</th> -->
      <th scope="col">Họ</th>
      <th scope="col">Tên</th>
      <th scope="col">Trạng thái</th>
      <th scope="col">Số điện thoại</th>
      <th scope="col">Địa chỉ đường</th>
      <!-- <th scope="col">Postcode_ZIP</th> -->
      <th scope="col">Town_City</th>
      <th scope="col">Tạo vào</th>
      <th scope="col">Số TK</th>
      <th scope="col">Ngân hàng</th>
      <!-- <th scope="col">Ghi chú</th> -->
      <th scope="col">Chi tiết đơn hàng</th>
    </tr>
    <?php foreach ($data as $result) { ?>
    <tr>
      <!-- <td scope="col"><?php echo $result['User_ID'] ?></td> -->
      <td scope="col"><?php echo $result['Status'] ?></td>
      <td scope="col"><?php echo $result['Last_Name'] ?></td>
      <td scope="col"><?php echo $result['First_name'] ?></td>
      <td scope="col"><?php echo $result['Telephone'] ?></td>
      <td scope="col"><?php echo $result['Street_address'] ?></td>
      <!-- <td scope="col"><?php echo $result['Postcode_ZIP'] ?></td> -->
      <td scope="col"><?php echo $result['Town_City'] ?></td>
      <td scope="col"><?php echo $result['Created'] ?></td>
      <td scope="col"><?php echo $result['Account'] ?></td>
      <td scope="col"><?php echo $result['Bank_Name'] ?></td>
      <!-- <td scope="col"><?php echo $result['Note'] ?></td> -->
      <td scope="col"><a class="btn" href="?orderId=<?php echo $result["ID"] ?>">Xem chi tiết</a></td>
      <?php }
      ?>
  </table>
</div>
<?php
require_once __DIR__ . './Layouts/Footer.php';
?>