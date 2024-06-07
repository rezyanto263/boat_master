// Navbar Show Up and Hide In
document.addEventListener("scroll", () => {
    const navbar = document.querySelector("nav");

    if (window.scrollY > 95) {
        navbar.classList.remove("hidden");
    }else {
        navbar.classList.add("hidden");
    }
});

// Owl Carousel
$(document).ready(function(){
    $(".video-slider").owlCarousel({
        loop:false,
        margin:24,
        nav:false,
        dots:false,
        autoWidth:true,
    });

    $(".teams-slider").owlCarousel({
        loop:false,
        margin:24,
        nav:false,
        dots:false,
        autoWidth:true,
    });

    $(".boat-overview-slider").owlCarousel({
        loop:true,
        autoplay: false,
        items: 1,
        margin: 24,
        nav: false,
        center: true,
        dots:true,

    });


});


const plus = document.querySelector(".plus"),
minus = document.querySelector(".minus"),
num = document.querySelector(".num");

if ((plus&&minus&&num)!=null) {
let a = 1;

plus.addEventListener("click", ()=>{
a++;
a = (a < 10) ? "0" + a : a;
num.innerText = a;
console.log(a);
});

minus.addEventListener("click", ()=>{
    if(a > 1){
        a--;
        a = (a < 10) ? "0" + a : a;
num.innerText = a;
console.log(a);
    }
});
}