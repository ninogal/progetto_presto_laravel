let navbar = document.querySelector('.navbar')
let button = document.querySelector('#btntop')
let icon = document.querySelector('#icona')
document.addEventListener('scroll',()=>{
    if(window.scrollY > 1){
        navbar.classList.add('sticky-top')
        icon.classList.add('iconScroll')
    }else {
        navbar.classList.remove('sticky-top')
        icon.classList.remove('iconScroll')
    }
})
document.addEventListener('scroll', () => {
    let scrolled = window.scrollY;
    if (scrolled > 100) {
        button.classList.remove('d-none')
    }
    if (scrolled < 100) {
        button.classList.add('d-none')
    }
})