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
      $str = "<a href=\"./News/Article/" . $article['ID'] . "\" class=\"post\">" . PHP_EOL;
      $str = $str . "<img src=\"./public/assets/image/avatar.jpg\" alt=\"img\">";
      $str = $str . "<h3>" . $article['Title'] . "</h3>";
      $str = $str . "<p>" . $article['Author'] . "</p>";
      $str = $str . "<p> Post Date: " . $article['Post_Date'] . "</p>";
      $str = $str . "</a>";
      echo $str;
    }
    ?>
  </div>
</div>

<?php
require_once __DIR__ . './Layouts/Footer.php';
?>