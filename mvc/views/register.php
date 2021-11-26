<?php
// require_once './mvc/views/Layouts/Header.php';
require_once __DIR__ . "./Layouts/Header.php";
?>
<div class="register container-sm">
  <form method="post" action="./Register/Process">
    <a href="./Index">
      <img src="./public/assets/image/logo-png2.png" alt="">
    </a>
    <label for="username">Username*:</label>
    <input type="text" name="username" id="username" class="form-control" placeholder="Username"
      onkeyup="checkUsename(this.value)">
    <span id="warningUsername" class="warning"></span>
    <label for="password">Password*:</label>
    <input type="password" name="password" id="Password" class="form-control" placeholder="Password"
      onkeyup="checkPassword(this.value)">
    <span id="warningPassword" class="warning"></span>
    <label for="confirmPassword">Confirm password*:</label>
    <input type="password" class="form-control" name="confirmPassword" placeholder="Confirm Password"
      onkeyup="checkConfirmPassword(this.value)">
    <span id="warningConfirmPassword" class="warning"></span>
    <label for="firstname">First Name*:</label>
    <input type="text" class="form-control" name="firstname" placeholder="First name">
    <label for="lastname">Last Name*:</label>
    <input type="text" class="form-control" name="lastname" placeholder="Last name">
    <label for="email">Email:</label>
    <input type="email" class="form-control" name="email" placeholder="Email">
    <button class="btn btn-lg btn-primary btn-block" type="submit" name="submit" value="signup">Sign up</button>
  </form>
  <button onclick="showSuccess()">Test</button>
</div>

<?php
require_once __DIR__ . './Layouts/Footer.php';
?>