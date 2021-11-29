<?php
// require_once './mvc/views/Layouts/Header.php';
require_once __DIR__ . "./Layouts/Header.php";
?>
<div class="container-sm">
  <table class="table table-hover">
    <tr>
      <th>ID</th>
      <th>Tên khách hàng</th>
      <th>Số điện thoại</th>
      <th>Email</th>
      <th>Nội dung</th>
    </tr>
    <?php foreach ($data as $result) { ?>
    <tr>
      <td><?php echo $result['ID'] ?></td>
      <td><?php echo $result['Name'] ?></td>
      <td><?php echo $result['Telephone'] ?></td>
      <td><?php echo $result['Email'] ?></td>
      <td><?php echo $result['Message_content'] ?></td>
      <?php }
      ?>
  </table>
</div>
<?php
require_once __DIR__ . './Layouts/Footer.php';
?>