<?php
// require_once './mvc/views/Layouts/Header.php';
require_once __DIR__ . "./Layouts/Header.php";
?>
<a href="./addProduct"class="btn btn-primary btnAddNew">Thêm mới</a>
<table class="table table-hover">
    <tr>
        <th>ID</th>
        <th>TÊN SẢN PHẨM</th>
        <th>HÌNH ẢNH</th>
        <th>GIÁ BÁN</th>
        <th>THAO TÁC</th>
    </tr>
    <?php $fm = new Format();
        //$all_product = $product->get_all_product();
        foreach ($data as $result) { ?>
        <tr>
            <td><?php echo $result['ID'] ?></td>
            <td><?php echo $result['Nane'] ?></td>
            <td>
                <div style="width: 120px; height: 100px">
                    <img style="width: 100%; height: 100%"src="<?php echo $result['Picture']?>" alt="">
                </div>
            </td>
            <td><?php echo $fm->format_currency($result['Sell_price']) . " " . "VNĐ" ?></td>
            <td class="">
                <form action="" method="POST">
                    <button name="btnDel" type="submit" class="btn  btn-sm">Xóa</button>
                </form>
                <form action="" method="POST">
                    
                    <button name="btnEdit" type="submit" class="btn  btn-sm">Sửa</button>
                </form>
            </td>
        </tr>
    <?php } ?>
</table>
<?php
require_once __DIR__ . './Layouts/Footer.php';
?>