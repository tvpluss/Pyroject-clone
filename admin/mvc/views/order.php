<?php
// require_once './mvc/views/Layouts/Header.php';
require_once __DIR__ . "./Layouts/Header.php";
?>
<style>
  td,
  th {
    vertical-align: middle;
    min-width: 100px;
  }

  .table {
    margin-top: 10px;
  }

  .btnn {
    max-width: 70px;
  }
</style>
<div class="container-fluid">
  <table class="table table-striped table-hover">
    <tr>
      <!-- <th scope="col">ID</th> -->
      <th scope="col" style="min-width: 120px;">Họ</th>
      <th scope="col">Tên</th>
      <th scope="col" style="min-width: 160px;">Trạng thái</th>
      <th scope="col" style="min-width: 120px;">Số điện thoại</th>
      <th scope="col" style="min-width: 200px;">Địa chỉ đường</th>
      <!-- <th scope="col">Postcode_ZIP</th> -->
      <th scope="col">Town_City</th>
      <th scope="col" style="min-width: 100px;">Tạo vào</th>
      <th scope="col" style="min-width: 100px;">Số TK</th>
      <th scope="col">Ngân hàng</th>
      <!-- <th scope="col">Ghi chú</th> -->
      <th scope="col">Chi tiết đơn hàng</th>
    </tr>

    <?php foreach ($data['orders'] as $result) { ?>
      <tr>
        <!-- <td scope="col"><?php echo $result['User_ID'] ?></td> -->
        <td scope="col"><?php echo $result['Last_Name'] ?></td>
        <td scope="col"><?php echo $result['First_name'] ?></td>
        <td scope="col">
          <select class="form-select" id="<?php echo $result["ID"] ?>">
            <option value="Thành công" <?php if ($result['Status'] == "Thành công") echo ' selected="selected"'; ?>>Thành
              công
            </option>
            <option value="Chờ xác nhận" <?php if ($result['Status'] == "Chờ xác nhận") echo ' selected="selected"'; ?>>
              Chờ xác nhận
            </option>



          </select>
        </td>
        <td scope="col"><?php echo $result['Telephone'] ?></td>
        <td scope="col"><?php echo $result['Street_address'] ?></td>
        <!-- <td scope="col"><?php echo $result['Postcode_ZIP'] ?></td> -->
        <td scope="col"><?php echo $result['Town_City'] ?></td>
        <td scope="col"><?php echo $result['Created'] ?></td>
        <td scope="col"><?php echo $result['Account'] ?></td>
        <td scope="col"><?php echo $result['Bank_Name'] ?></td>
        <!-- <td scope="col"><?php echo $result['Note'] ?></td> -->
        <td scope="col" style="min-width: 160px;"><a class="btn" href="?orderId=<?php echo $result["ID"] ?>">Xem chi
            tiết</a></td>
      <?php }
      ?>

      <script>
        var selects = document.querySelectorAll('select');
        selects.forEach(select => {
          select.addEventListener('change', (e) => {
            console.log(select.value, select.id);
            changeStatus(select.id, select.value);
          })
        })

        function changeStatus(orderId, status) {
          $.post('./Order/changeStatus', {
            orderId,
            status
          }, (data) => {
            console.log(data);
            if (data)
              toast({
                type: "toast--success",
                title: "Success",
                msg: "Thay đổi trạng thái thành công",
                icon: "fas fa-exclamation-circle"
              });
          })
        }
      </script>
  </table>
  <nav aria-label="Page navigation example">
    <ul class="pagination">
      <li class="page-item"><a class="page-link" href="./Order?page=1">First</a></li>
      <li class="page-item"><a class="page-link" href="./Order?page=<?php echo ($data['currentPage'] - 1) ?>">Previous</a></li>
      <li class="page-item"><a class="page-link" href="#"><?php echo ($data['currentPage']) ?></a></li>
      <li class="page-item"><a class="page-link" href="./Order?page=<?php echo ($data['currentPage'] + 1) ?>">Next</a></li>
      <li class="page-item"><a class="page-link" href="./Order?page=<?php echo ($data['totalPages']) ?>">Last</a></li>
    </ul>
  </nav>
</div>
<?php
require_once __DIR__ . './Layouts/Footer.php';
?>