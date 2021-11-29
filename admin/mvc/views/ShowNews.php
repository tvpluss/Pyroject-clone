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
<a href="./AddNews"class="btn btn-primary btnAddNew">Thêm mới</a>
<table class="table table-hover">
    <tr>
        <th>TÊN BÀI VIẾT</th>
        <th>HÌNH ẢNH</th>
        <th>TÁC GIẢ</th>
        <th>NGÀY CẬP NHẬT</th>
        <th>THAO TÁC</th>
    </tr>
    <?php
    foreach ($data as $article) {
    ?>
        <tr>
            <td><?php echo $article['Title'] ?></td>
            <td>
                <div style="width: 120px; height: 100px">
                    <img style="width: 100%; height: 100%" src='<?php echo $article['Picture'] ?>' alt="">
                </div>
            </td>
            <td><?php echo $article['Author'] ?></td>
            <td><?php echo $article['Post_Date'] ?></td>
            <td>
                <form action="ShowNews/Process?del=1" method="POST">
                    <input type="text" value="<?php echo $article['ID']; ?>" name="ID" hidden>
                    <button name="btnDel" type="submit" class="btn btn-lg btn-primary btn-block">Xóa</button>
                </form>
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

<?php
require_once __DIR__ . './Layouts/Footer.php';
?>