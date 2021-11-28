<?php
include_once __DIR__ . "./Layouts/Header.php";
?>

<div class="product">
    <div class="container-md">
        <?php
        $item = $data;
        ?>
        <div class="row">
            <div class="col-12 col-sm-5">
                <img class='product-img' src="<?php echo $item['Picture'] ?>" alt="">
            </div>
            <div class="col-12 col-sm-7">
                <div class="item">
                    <h1><?php echo $item['Title'] ?></h1>
                    <h2>Author: <?php echo $item['Author'] ?>
                        <div class="price">Post date: <?php echo $item['Post_Date'] ?></div>
                </div>
            </div>
        </div>
    </div>
    <div class="description">
        <?php echo $item['Content'] ?>
    </div>
</div>
</div>
<?php
include_once __DIR__ . "./Layouts/Footer.php";
?>