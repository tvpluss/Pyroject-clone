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
                <form action="EditProduct/Process?del=1" method="POST">
                <input type="text" value="<?php echo $result['ID']; ?>" name ="ID" hidden>
                    <button name="btnDel" type="submit" class="btn btn-lg btn-primary btn-block">Xóa</button>
                </form>
                <form action="EditProduct" method="POST">
                    <input type="text" value="<?php echo $result['ID']; ?>" name ="ID" hidden>
                    <input type="text" value="<?php echo $result['Nane']; ?>" name ="Nane" hidden>
                    <input type="text" value="<?php echo $result['Picture']; ?>" name ="Picture" hidden>
                    <input type="text" value="<?php echo $result['Quantity']; ?>" name ="Quantity" hidden>
                    <input type="text" value="<?php echo $result['Buy_price']; ?>" name ="Buy_price" hidden>
                    <input type="text" value="<?php echo $result['Sell_price']; ?>" name ="Sell_price" hidden>
                    <input type="text" value="<?php echo $result['Description']; ?>" name ="Description" hidden>
                    
                    <button name="btnEdit" type="submit" class="btn btn-lg btn-primary btn-block">Sửa</button>
                </form>
            </td>
        </tr>
    <?php } ?>
</table>
<?php
require_once __DIR__ . './Layouts/Footer.php';
?>