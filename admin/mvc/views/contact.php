<?php
// require_once './mvc/views/Layouts/Header.php';
require_once __DIR__ . "./Layouts/Header.php";
?>
<div class="container-fluid">
  <table class="table table-striped table-hover">
    <tr>
      <th scope="col">ID</th>
      <th scope="col">Trạng thái</th>
      <th scope="col">Ngày gửi</th>
      <th scope="col">Tên khách hàng</th>
      <th scope="col">Số điện thoại</th>
      <th scope="col">Email</th>
      <th scope="col">Nội dung</th>
    </tr>
    <?php foreach ($data['contacts'] as $result) { ?>
      <tr>
        <td scope="col"><?php echo $result['ID'] ?></td>
        <td scope="col">
          <select class="form-select" id="<?php echo $result['ID'] ?>">
            <option value="Xác nhận" <?php if ($result['Status'] == "Xác nhận") echo 'selected="selected"'; ?>>Xác nhận</option>
            <option value="Mới" <?php if ($result['Status'] == "Mới") echo 'selected="selected"'; ?>>Mới</option>
        </td>
        <td scope="col"><?php echo $result['Created'] ?></td>
        <td scope="col"><?php echo $result['Name'] ?></td>
        <td scope="col"><?php echo $result['Telephone'] ?></td>
        <td scope="col"><?php echo $result['Email'] ?></td>
        <td scope="col"><textarea style="background-color: #fff;" class="form-control" readonly><?php echo $result['Message_content'] ?></textarea></td>
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

        function changeStatus(messageId, status) {
          $.post('./Contact/changeStatus', {
            messageId,
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
  <nav id="paging" aria-label="Page navigation example">
    <ul class="pagination">
      <li class="page-item"><a class="page-link" href="./Contact?page=1">Trang đầu</a></li>
      <li class="page-item"><a class="page-link" href="./Contact?page=<?php echo ($data['currentPage'] - 1) ?>">
          << </a>
      </li>
      <li class="page-item"><a class="page-link" href="#"><?php echo ($data['currentPage']) ?></a></li>
      <li class="page-item"><a class="page-link" href="./Contact?page=<?php echo ($data['currentPage'] + 1) ?>"> >>
        </a></li>
      <li class="page-item"><a class="page-link" href="./Contact?page=<?php echo ($data['totalPages']) ?>">Trang
          cuối</a></li>
    </ul>
  </nav>
</div>
<?php
require_once __DIR__ . './Layouts/Footer.php';
?>