<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pryject</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta2/css/all.min.css" integrity="sha512-YWzhKL2whUzgiheMoBFwW8CKV4qpHQAEuvilg9FAn5VJUDwKZZxkJNuGM4XkWuk94WCrrwslk8yWNGmY1EduTA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-uWxY/CJNBR+1zjPWmfnSnVxwRheevXITnMqoEIeG1LJrdI0GlVs/9cVSyPYXdcSF" crossorigin="anonymous">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <link rel="stylesheet" href="./public/assets/css/main.css">
    <script>
        function checkPassword(str) {
            var Regex = /^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)[a-zA-Z\d]{8,}$/;
            if (str.match(Regex)) {
                document.getElementById('warningPassword').innerHTML = 'This password can be used';
            } else {
                document.getElementById('warningPassword').innerHTML = 'Password must contain minimum eight characters, at least one uppercase letter, one lowercase letter and one number:';
            }

        }

        function checkUsename(str) {
            if (str.length == 0) {
                document.getElementById('warningUsername').innerHTML = '';
            } else {
                var xmlhttp = new XMLHttpRequest();
                xmlhttp.onreadystatechange = function() {
                    if (this.readyState == 4 && this.status == 200) {
                        const response = JSON.parse(this.response)
                        if (response.result == true) {
                            document.getElementById('warningUsername').innerHTML = 'This Username is already used';
                        } else {
                            document.getElementById('warningUsername').innerHTML = 'This Username can be used';
                        }
                    }
                }
                xmlhttp.open("GET", "./Api/CheckUsename?Usename=" + str, true);
                xmlhttp.send();

            }
        }
        $(document).ready(function() {
            console.log("ajax");
            $('#checkID').click((e) => {
                console.log("clicked");
                $.ajax({
                    url: './Api/CheckUsename',
                    type: 'GET',
                    dataType: 'json',
                    data: {
                        Usename: $('#username').val()
                    }
                }).done((data_response) => {
                    console.log(data_response);
                    document.getElementById("bankName").value = "check";
                })
            })
        })
    </script>
</head>

<body>
    <div class="register container-sm">
        <form method="post" action="./Register/Process">
            <img src="./public/assets/image/logo-png2.png" alt="">
            <br>
            <h1 class="h3 mb-3 font-weight-normal">Please sign up</h1>
            <input type="text" name="username" id="username" placeholder="Username" onkeyup="checkUsename(this.value)">
            <span id="warningUsername"></span>
            <input type="password" name="password" placeholder="Password" onkeyup="checkPassword(this.value)">
            <span id="warningPassword"></span>
            <input type="password" name="confirmPassword" placeholder="Confirm Password">
            <input type="text" name="firstname" placeholder="First name">
            <input type="text" name="lastname" placeholder="Last name">
            <input type="email" name="email" placeholder="Email">
            <input type="text" name="telephone" placeholder="Telephone">
            <input type="text" name="streetAddress" placeholder="Address">
            <input type="text" name="townCity" placeholder="Town/City">
            <input type="text" name="postcode" placeholder="Postcode">
            <input type="text" name="account" placeholder="Bank Account">
            <input type="text" name="bankName" id="bankName" placeholder="Bank Name">
            <button class="btn btn-lg btn-primary btn-block" type="submit" name="submit" value="signup">Sign up</button>

        </form>
        <button class="btn btn-lg btn-primary btn-block" type="submit" id="checkID" name="checkID" value="checkID">checkID</button>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.2/dist/js/bootstrap.min.js" integrity="sha384-PsUw7Xwds7x08Ew3exXhqzbhuEYmA2xnwc8BuD6SEr+UmEHlX8/MCltYEodzWA4u" crossorigin="anonymous"></script>
    <script src="./public/assets/js/base.js"></script>
</body>

</html>