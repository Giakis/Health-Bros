const menu = document.querySelector('#mobile-menu');
const menuLinks = document.querySelector('.navbar__menu');

menu.addEventListener('click', function() {
  menu.classList.toggle('is-active');
  menuLinks.classList.toggle('active');
});

function toggle_light_and_dark_mode(){
    var body = document.getElementsByTagName('body')[0];
    var current_mode = body.className;
    if(current_mode == 'light-mode'){
        body.className = 'dark-mode';
    }
    else{
        body.className = 'light-mode';
    }
}