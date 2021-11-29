<?php
require_once __DIR__ . './Layouts/Header.php';
?>
<div class="news">
  <div class="top">
    <div class="container-sm">
      <div class="row">
        <div class="col-12 col-lg-5">
          <h1>
            BLOG
          </h1>
          <p>
            Trang này Pyroject dành riêng để tri ân những người ghé thăm website và khách hàng bằng thông tin, bài viết, case study và kinh nghiệm của chính các thành viên. Ngoài ra. bạn có thể tải xuống brochure để hiểu rõ hơn chúng tôi nhé!
          </p>
        </div>
        <div class="col-12 col-lg-7">
        </div>
      </div>
    </div>
  </div>
  <div class="container-md">
    <?php
    foreach ($data as $article) {
    ?>
      <div class="item">
        <a href="./Article?articleId=<?php echo $article['ID'] ?>" class="post">
          <img src='<?php echo $article['Picture'] ?>'>
          <h3> <?php echo $article['Title'] ?></h3>
          <p> <?php echo $article['Author'] ?></p>
          <p> Post Date: <?php echo $article['Post_Date'] ?></p>
        </a>
      </div>
    <?php
    }
    ?>
  </div>
</div>

<?php
require_once __DIR__ . './Layouts/Footer.php';
?>