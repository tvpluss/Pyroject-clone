var menu_icon = document.querySelector('.menu-icon');
var menu = document.querySelector('.menu');
menu_icon.addEventListener('click', () => {
    console.log('asda', menu)
    if (menu.classList.contains('active')) {
        menu.classList.remove('active');
    }
    else {
        menu.classList.add('active');
    }
})
        function checkPassword(str) {
            var Regex = /^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)[a-zA-Z\d]{8,}$/;
            if (str.match(Regex)) {
                document.getElementById('warningPassword').innerHTML = 'This password can be used';
            } else {
                document.getElementById('warningPassword').innerHTML = 'Password must contain minimum eight characters, at least one uppercase letter, one lowercase letter and one number';
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
                xmlhttp.open("GET", "./Register/CheckUsename?Usename=" + str, true);
                xmlhttp.send();

            }
        }

        function checkConfirmPassword(str) {
            if (str.length == 0) {
                document.getElementById('warningConfirmPassword').innerHTML = '';
            } else {
                const Password = document.getElementById('Password').value;
                if (str != Password) {
                    document.getElementById('warningConfirmPassword').innerHTML = 'Confirm password do not match password';
                } else {
                    document.getElementById('warningConfirmPassword').innerHTML = 'Confirm password match password';
                }
            }
        }