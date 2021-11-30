<?php
require_once __DIR__ . './Layouts/Header.php';
// print_r($data);
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
        max-width: 70px;
    }
</style>
<div class="container-lg">
    <table class="table table-striped table-hover">
        <tr>
            <!-- <th scope="col">ID</th> -->
            <th scope="col" style="min-width: 100px;">Order ID </th>
            <th scope="col" style="min-width: 160px;">Trạng thái</th>
            <th scope="col" style="min-width: 100px;">Tạo vào</th>
            <th scope="col">Chi tiết đơn hàng</th>
        </tr>

        <?php foreach ($data['Orders'] as $item) { ?>
            <tr>
                <td scope="col"><?php echo $item['Order_ID'] ?></td>
                <td scope="col"><?php echo $item['Status'] ?></td>
                <td scope="col"><?php echo $item['Created'] ?></td>
                <td scope="col" style="min-width: 160px;">
                    <a class="btn" href="?action=vieworder&userId=<?php echo $_SESSION['sessionId'] ?>&orderId=<?php echo $item["Order_ID"] ?>">Xem chi
                        tiết
                    </a>
                </td>
            <?php }
            ?>
    </table>
    <nav aria-label="Page navigation example">
        <ul class="pagination">
            <li class="page-item"><a class="page-link" href="./Profile?action=viewhistory&page=1">First</a></li>
            <li class="page-item"><a class="page-link" href="./Profile?action=viewhistory&page=<?php echo ($data['currentPage'] - 1) ?>">Previous</a></li>
            <li class="page-item"><a class="page-link" href="#"><?php echo ($data['currentPage']) ?></a></li>
            <li class="page-item"><a class="page-link" href="./Profile?action=viewhistory&page=<?php echo ($data['currentPage'] + 1) ?>">Next</a></li>
            <li class="page-item"><a class="page-link" href="./Profile?action=viewhistory&page=<?php echo ($data['totalPages']) ?>">Last</a></li>
        </ul>
    </nav>
</div>

<?php
require_once __DIR__ . './Layouts/Footer.php';
?>