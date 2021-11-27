var menu_icon = document.querySelector('.menu-icon');
var menu = document.querySelector('.menu');
menu_icon.addEventListener('click', () => {
    console.log('asda', menu)
    console.log(location.search);
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
        xmlhttp.onreadystatechange = function () {
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

function checkBuyPrice(num) {
    if (num < 0) {
        document.getElementById('warningBuyPrice').innerHTML = 'This value is not be less than 0';
    
    }
}
function checkSellPrice(num) {
    if (num < 0) {
        
        document.getElementById('warningSellPrice').innerHTML = 'This value is not be less than 0';
        
    }
}
function checkQuantity(num) {
    if (num < 0) {
        
        document.getElementById('warningQuantity').innerHTML = 'This value is not be less than 0';
    }
}


function toast({
    type = "",
    title = "",
    msg = "",
    icon = ""
}) {
    var main = document.querySelector('#toast');
    if (main) {
        const toast = document.createElement('div');
        toast.classList.add('toast', `${type}`);
        toast.style.animation = "slideInleft ease .3s, fadeOut linear 1s 3s forwards";
        const ex = setTimeout(() => main.removeChild(toast), 4000);
        toast.onclick = function (e) {
            if (e.target.closest('.toast__close')) {
                main.removeChild(toast);
                clearTimeout(ex);
            };
        }
        toast.innerHTML = `
    <div class="toast__icon">
        <i class="${icon}"></i>
    </div>
    <div class="toast__body">
        <h3 class="toast__title">${title}</h3>
        <p class="toast__msg">${msg}</p>
    </div>
    <div class="toast__close">
        <i class="fas fa-times"></i>
    </div>
    `
        // var m = toast.getElementsByClassName('toast__close')[0];
        // m.addEventListener('click', () => {
        // main.removeChild(toast);
        // clearTimeout(ex);
        // })
        main.appendChild(toast);
    };
};

function showSuccess() {
    toast({
        type: "toast--success",
        title: "Success",
        msg: "Sản phẩm đã được thêm vào giỏ hàng.",
        icon: "fas fa-check-circle"
    });
}

if (window.location.search.includes("success=registered")) {
    toast({
        type: "toast--success",
        title: "Success",
        msg: "Đăng ký thành công",
        icon: "fas fa-check-circle"
    });
}
