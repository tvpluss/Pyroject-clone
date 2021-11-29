<?php
// require_once './mvc/views/Layouts/Header.php';
require_once __DIR__ . "./Layouts/Header.php";
?>
<?php print_r($data) ?>
<div class="register container-sm">
  <form method="post" action="EditNews/Process">
    <a href="./Index">
      <img src="./public/assets/image/logo-png2.png" alt="">
    </a>
    <h3>Sửa bài viết </h3>
    <label for="ID">ID:</label>
    <input type="text" name="ID" id="ID" class="form-control" onkeyup="checkProduct(this.value)"
      value='<?php echo $data['ID'] ?>' readonly>

    <label for="Title">Tiêu đề*:</label>
    <input type="text" name="Title" id="Title" class="form-control" placeholder="Title"
      value="<?php echo $data['Title'] ?>">


    <label for="Picture">Link hình ảnh*:</label>
    <input type="Picture" name="Picture" id="Picture" class="form-control" placeholder="Picture" onkeyup=""
      value="<?php echo $data['Picture'] ?>">

    <label for="Author">Tác giả*:</label>
    <input type="Author" name="Author" id="Author" class="form-control" placeholder="Author" onkeyup=""
      value="<?php echo $data['Author'] ?>">

    <label for="Content">Nội dung*:</label>
    <input type="Content" name="Content" id="Content" class="form-control" placeholder="Content" onkeyup=""
      value="<?php echo $data['Content'] ?>">


    <label for="Post_Date">Ngày đăng (YYYY-MM-DD):</label>
    <input type="text" class="form-control" id="Post_Date" name="Post_Date" placeholder="Post Date"
      value="<?php echo date("Y-m-d") ?>" readonly>

    <button class="btn btn-lg btn-primary btn-block" type="submit" name="submit" value="signup">Lưu</button>
  </form>
</div>

<?php
require_once __DIR__ . './Layouts/Footer.php';
?>