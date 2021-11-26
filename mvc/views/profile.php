<?php
print_r($_SESSION);
?>
<?php
// require_once './mvc/views/Layouts/Header.php';
require_once __DIR__ . "./Layouts/Header.php";
?>

<div class="register container-sm">
  <form method="post">
    <h1 class="h3 mb-3 font-weight-normal">Your Profile</h1>
    <label for="username">Username:</label>
    <input type="text" name="username" id="username" value="<?php echo $_SESSION['sessionUser'] ?>" readonly>
    <label for="firstname">First Name:</label>
    <input type="text" name="firstname" placeholder="First name">
    <label for="lastname">Last Name:</label>
    <input type="text" name="lastname" placeholder="Last name">
    <label for="email">Email:</label>
    <input type="email" name="email" placeholder="Email">
    <label for="telephone">Telephone:</label>
    <input type="text" name="telephone" placeholder="Optional">
    <label for="streetAddress">Address:</label>
    <input type="text" name="streetAddress" placeholder="Optional">
    <label for="townCity">Town/City:</label>
    <input type="text" name="townCity" placeholder="Optional">
    <label for="postcode">Post Code:</label>
    <input type="text" name="postcode" placeholder="Optional">
    <label for="account">Bank Account:</label>
    <input type="text" name="account" placeholder="Optional">
    <label for="bankName">Bank Name:</label>
    <input type="text" name="bankName" id="bankName" placeholder="Optional">
    <button class="btn btn-lg btn-primary btn-block" type="button" name="submit" value="signup">Save</button>

  </form>
</div>

<?php
require_once __DIR__ . './Layouts/Footer.php';
?>