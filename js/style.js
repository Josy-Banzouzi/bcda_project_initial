const slideShowImages = document.querySelectorAll('.fullbackground .slideShow');
const imageDelay = 7000;
let currentImageCounter = 0;
slideShowImages[currentImageCounter].style.opacity = 1;

setInterval(nextImage, imageDelay);

function nextImage(){
    slideShowImages[currentImageCounter].style.zIndex = -2;
    const tempCounter = currentImageCounter;
    setTimeout(() =>{
        slideShowImages[tempCounter].style.opacity = 0;
    }, 1000);
    currentImageCounter = (currentImageCounter +1) % slideShowImages.length;
    slideShowImages[currentImageCounter].style.opacity = 1;
    slideShowImages[currentImageCounter].style.zIndex = -1;
}

const textWrapper = document.querySelector('.text-animation');
textWrapper.innerHTML = textWrapper.textContent.replace(/\S/g, '<span class="letter">$&</span>');

anime.timeline({loop:true})
    .add({
        targets:'.text-animation .letter',
        scale:[4,1],
        opacity:[0,1],
        translateZ:0,
        duration:8000,
        easing:"easeOutExpo",
        delay:(elem, index) => index*80
    })
    .add({
        targets:'.text-animation',
        opacity:0,
        duration:10000,
        delay:1000,
        easing:"easeOutExpo"
    });