let f1 = document.querySelector('.nav__burger');

f1.onclick = function(){
    document.querySelector('.section__nav').classList.toggle('active');
    document.querySelector('.nav__burger').classList.toggle('active');
};