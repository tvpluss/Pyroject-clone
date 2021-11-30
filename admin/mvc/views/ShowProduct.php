<?php
// require_once './mvc/views/Layouts/Header.php';
require_once __DIR__ . "./Layouts/Header.php";
?>
<style>
  td,
  th {
    vertical-align: middle;
  }

  .table {
    margin-top: 10px;
  }

  .btnn {
    max-width: 50px;
  }
</style>
<div class="container-sm">
  <a href="./addProduct" class="btn btn-primary btnAddNew">Thêm mới</a>
  <table class="table table-hover table-striped">
    <tr>
      <th scope="col">ID</th>
      <th scope="col">TÊN SẢN PHẨM</th>
      <th scope="col">HÌNH ẢNH</th>
      <th scope="col">GIÁ BÁN</th>
      <th scope="col"> </th>
      <th scope="col"> </th>
    </tr>
    <?php $fm = new Format();
    //$all_product = $product->get_all_product();
    foreach ($data['products'] as $result) { ?>
      <tr>
        <td scope="col"><?php echo $result['ID'] ?></td>
        <td scope="col"><?php echo $result['Nane'] ?></td>
        <td scope="col">
          <div style="width: 120px; height: 100px">
            <img style="width: 100%; height: 100%" src="<?php echo $result['Picture'] ?>" alt="">
          </div>
        </td>
        <td scope="col"><?php echo $fm->format_currency($result['Sell_price']) . " " . "VNĐ" ?></td>
        <td class="btnn">
          <form action="Product/Process?del=1" method="POST">
            <input type="text" value="<?php echo $result['ID']; ?>" name="ID" hidden>
            <button name="btnDel" type="submit" class="btn btn-lg btn-primary btn-block">Xóa</button>
          </form>
        </td>
        <td class="btnn" scope="col">
          <a name="btnEdit" href="./Product?ID=<?php echo  $result['ID']; ?>" class="btn btn-lg btn-primary btn-block">Sửa</a>
        </td>
      </tr>
    <?php } ?>
  </table>
  <nav aria-label="Page navigation example">
    <ul class="pagination">
      <li class="page-item"><a class="page-link" href="./Product?page=1">First</a></li>
      <li class="page-item"><a class="page-link" href="./Product?page=<?php echo ($data['currentPage'] - 1) ?>">Previous</a></li>
      <li class="page-item"><a class="page-link" href="#"><?php echo ($data['currentPage']) ?></a></li>
      <li class="page-item"><a class="page-link" href="./Product?page=<?php echo ($data['currentPage'] + 1) ?>">Next</a></li>
      <li class="page-item"><a class="page-link" href="./Product?page=<?php echo ($data['totalPages']) ?>">Last</a></li>
    </ul>
  </nav>
</div>
<?php
require_once __DIR__ . './Layouts/Footer.php';
?>