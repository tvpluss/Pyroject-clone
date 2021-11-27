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