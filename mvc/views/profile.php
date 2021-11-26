<?php
// require_once './mvc/views/Layouts/Header.php';
require_once __DIR__ . "./Layouts/Header.php";
?>

<div class="container-sm">

  <form method="post" class="profile" action="Profile/Edit">
    <h1 class="h3 mb-3 font-weight-normal">Your Profile</h1>
    <div class="row">
      <div class="col-sm-6 col-12">
        <label for="username">Username:</label>
        <input class="form-control" type="text" name="username" id="username"
          value="<?php echo $_SESSION['sessionUser'] ?>">
        <label for="firstname">First Name:</label>
        <input class="form-control" type="text" value='<?php echo $_SESSION["sessionFirstName"] ?>' name="firstname"
          placeholder="First name">
        <label for="lastname">Last Name:</label>
        <input value='<?php echo $_SESSION["sessionUser"] ?>' value='<?php echo $_SESSION["sessionLastName"] ?>'
          class="form-control" type="text" name="lastname" placeholder="Last name">
        <label for="email">Email:</label>
        <input value='<?php echo $_SESSION["sessionEmail"] ?>' class="form-control" type="email" name="email"
          placeholder="Email">
        <label for="telephone">Telephone:</label>
        <input value='<?php echo $_SESSION["sessionTelephone"] ?>' class="form-control" type="text" name="telephone"
          placeholder="Optional">
      </div>
      <div class="col-sm-6 col-12">
        <label for="streetAddress">Address:</label>
        <input class="form-control" type="text" name="streetAddress" placeholder="Optional">
        <label for="townCity">Town/City:</label>
        <input class="form-control" type="text" name="townCity" placeholder="Optional">
        <label for="postcode">Post Code:</label>
        <input class="form-control" class="form-control" type="text" name="postcode" placeholder="Optional">
        <label for="account">Bank Account:</label>
        <input class="form-control" type="text" name="account" placeholder="Optional">
        <label for="bankName">Bank Name:</label>
        <input class="form-control" type="text" name="bankName" id="bankName" placeholder="Optional">
      </div>
    </div>
    <button type="submit" class="btn btn-primary">Save</button>
  </form>
</div>

<?php
require_once __DIR__ . './Layouts/Footer.php';
?>