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
<div class="news">
  <div class="container-md">
    <h1>Trang tin tức</h1>
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