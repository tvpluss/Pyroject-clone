<?php
require_once __DIR__ . './Layouts/Header.php';
?>
<div class="menu">
  <ul>
    <li>
      <a href="">Trang chủ</a>
    </li>
    <li>
      <a href="">Sản Phẩm</a>
    </li>
    <li>
      <a href="">Dịch Vụ</a>
    </li>
    <li>
      <a href="">Giới thiệu</a>
    </li>
    <li>
      <a href="">Liên hệ</a>
    </li>
  </ul>
</div>
</div>
<style>
td,
th {
  vertical-align: middle;
}

.table {
  margin-top: 10px;
}

.btnn {
  max-width: 70px;
}
</style>
</style>
<div class="container-sm">
  <a href="./AddNews" class="btn btn-primary btnAddNew">Thêm mới</a>
  <table class="table table-striped table-hover">
    <tr>
      <th scope="col">TÊN BÀI VIẾT</th>
      <th scope="col">HÌNH ẢNH</th>
      <th scope="col">TÁC GIẢ</th>
      <th scope="col">NGÀY CẬP NHẬT</th>
      <th scope="col"></th>
      <th scope="col"></th>

    </tr>
    <?php
    foreach ($data as $article) {
    ?>
    <tr>
      <td scope="col"><?php echo $article['Title'] ?></td>
      <td scope="col">
        <div style="width: 120px; height: 100px">
          <img style="width: 100%; height: 100%" src='<?php echo $article['Picture'] ?>' alt="">
        </div>
      </td>
      <td scope="col"><?php echo $article['Author'] ?></td>
      <td scope="col"><?php echo $article['Post_Date'] ?></td>
      <td scope="col" class="btnn">
        <form action="ShowNews/Process?del=1" method="POST">
          <input type="text" value="<?php echo $article['ID']; ?>" name="ID" hidden>
          <button name="btnDel" type="submit" class="btn btn-lg btn-primary btn-block">Xóa</button>
        </form>
      </td>
      <td scope="col" class="btnn">
        <form action="EditNews" method="POST">
          <input type="text" value="<?php echo $article['ID']; ?>" name="ID" hidden>
          <input type="text" value="<?php echo $article['Title']; ?>" name="Title" hidden>
          <input type="text" value="<?php echo $article['Author']; ?>" name="Author" hidden>
          <input type="text" value="<?php echo $article['Post_Date']; ?>" name="Post_Date" hidden>
          <input type="text" value='<?php echo $article['Content']; ?>' name="Content" hidden>
          <input type="text" value="<?php echo $article['Picture']; ?>" name="Picture" hidden>
          <button name="btnEdit" type="submit" class="btn btn-lg btn-primary btn-block">Sửa</button>
        </form>
      </td>
    </tr>
    <?php
    }
    ?>
  </table>
</div>

<?php
require_once __DIR__ . './Layouts/Footer.php';
?>