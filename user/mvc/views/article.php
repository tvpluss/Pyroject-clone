<?php
include_once __DIR__ . "./Layouts/Header.php";
?>

<div class="product">
    <div class="container-md">
        <?php
        $item = $data['Article'];
        ?>
        <div class="row">
            <div class="col-12 col-sm-8">
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
                <div class="description">
                    <?php echo $item['Content'] ?>
                </div>
            </div>
            <div class="col-12 col-sm-4">
                <div class="sticky-top">
                    <h2>Các bài viết khác</h2>
                    <div class="news">
                        <?php
                        foreach ($data['Articles'] as $article) {
                        ?>
                            <div class="item">
                                <a href="./Article?articleId=<?php echo $article['ID'] ?>" class="post">
                                    <img style="width:50px; height:50px" src='<?php echo $article['Picture'] ?>'>
                                    <p> <?php echo $article['Title'] ?></p>
                                </a>
                            </div>
                        <?php
                        }
                        ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</div>
<?php
include_once __DIR__ . "./Layouts/Footer.php";
?>