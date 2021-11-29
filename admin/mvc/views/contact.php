<?php
// require_once './mvc/views/Layouts/Header.php';
require_once __DIR__ . "./Layouts/Header.php";
?>
<div class="container-fluid">
  <table class="table table-striped table-hover">
    <tr>
      <th scope="col">ID</th>
      <th scope="col">Tên khách hàng</th>
      <th scope="col">Số điện thoại</th>
      <th scope="col">Email</th>
      <th scope="col">Nội dung</th>
    </tr>
    <?php foreach ($data as $result) { ?>
    <tr>
      <td scope="col"><?php echo $result['ID'] ?></td>
      <td scope="col"><?php echo $result['Name'] ?></td>
      <td scope="col"><?php echo $result['Telephone'] ?></td>
      <td scope="col"><?php echo $result['Email'] ?></td>
      <td scope="col"><textarea style="background-color: #fff;" class="form-control"
          readonly><?php echo $result['Message_content'] ?></textarea></td>
      <?php }
      ?>
  </table>
</div>
<?php
require_once __DIR__ . './Layouts/Footer.php';
?>