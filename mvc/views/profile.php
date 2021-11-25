<?php
print_r($_SESSION);
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pyroject</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta2/css/all.min.css" integrity="sha512-YWzhKL2whUzgiheMoBFwW8CKV4qpHQAEuvilg9FAn5VJUDwKZZxkJNuGM4XkWuk94WCrrwslk8yWNGmY1EduTA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-uWxY/CJNBR+1zjPWmfnSnVxwRheevXITnMqoEIeG1LJrdI0GlVs/9cVSyPYXdcSF" crossorigin="anonymous">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <link rel="stylesheet" href="./public/assets/css/main.css">
    <link rel="stylesheet" href="./public/assets/css/register.css">
    <script>

    </script>
</head>

<body>
    <div class="register container-sm">
        <form method="post">
            <a href="./Index">
                <img src="./public/assets/image/logo-png2.png" alt="">
            </a>
            <br>
            <h1 class="h3 mb-3 font-weight-normal">Your Profile</h1>
            <label for="username">Username:</label>
            <input type="text" name="username" id="username" placeholder="<?php echo $_SESSION['sessionUser'] ?>" disabled>
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
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.2/dist/js/bootstrap.min.js" integrity="sha384-PsUw7Xwds7x08Ew3exXhqzbhuEYmA2xnwc8BuD6SEr+UmEHlX8/MCltYEodzWA4u" crossorigin="anonymous"></script>
    <script src="./public/assets/js/base.js"></script>
</body>

</html>