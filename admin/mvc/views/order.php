<?php
// require_once './mvc/views/Layouts/Header.php';
require_once __DIR__ . "./Layouts/Header.php";
?>
<div class="container-sm">
  <table class="table table-hover">
    <tr>
      <th>User_ID</th>
      <th>Status</th>
      <th>Last_Name</th>
      <th>First_name</th>
      <th>Telephone</th>
      <th>Street_address</th>
      <th>Postcode_ZIP</th>
      <th>Town_City</th>
      <th>Created</th>
      <th>Account</th>
      <th>Bank_Name</th>
      <th>Note</th>
    </tr>
    <?php foreach ($data as $result) { ?>
    <tr>
      <td><?php echo $result['User_ID'] ?></td>
      <td><?php echo $result['Status'] ?></td>
      <td><?php echo $result['Last_Name'] ?></td>
      <td><?php echo $result['First_name'] ?></td>
      <td><?php echo $result['Telephone'] ?></td>
      <td><?php echo $result['Street_address'] ?></td>
      <td><?php echo $result['Postcode_ZIP'] ?></td>
      <td><?php echo $result['Town_City'] ?></td>
      <td><?php echo $result['Created'] ?></td>
      <td><?php echo $result['Account'] ?></td>
      <td><?php echo $result['Bank_Name'] ?></td>
      <td><?php echo $result['Note'] ?></td>
      <?php }
      ?>
  </table>
</div>
<?php
require_once __DIR__ . './Layouts/Footer.php';
?>