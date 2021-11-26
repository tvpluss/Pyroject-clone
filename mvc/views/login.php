<?php
require_once __DIR__ . "./Layouts/Header.php";
?>
<div class="login container-sm">
  <form method="post" action="./Login/Process">
    <a href="./Index">
      <img src="./public/assets/image/logo-png2.png" alt="">
    </a>
    <label for="inputEmail" class="sr-only">Email address</label>
    <input type="text" name="username" id="inputUsername" class="form-control" placeholder="Username" required
      autofocus>
    <label for="inputPassword" class="sr-only">Password</label>
    <input type="password" name="password" id="inputPassword" class="form-control" placeholder="Password" required>
    <button class="btn btn-lg btn-primary btn-block" type="submit" name="submit" value="signin">Sign in</button>
  </form>
</div>

<?php
require_once __DIR__ . "./Layouts/Footer.php";
?>