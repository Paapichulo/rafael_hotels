$(document).ready(function(){
    // Animation on scroll instance
    AOS.init();
});

const navItem = document.querySelector('.nav-items');
const toggleBtn = document.querySelector('.toggle-btn');
const icon = document.querySelector('#font');




toggleBtn.onclick = ()=>{
    toggleBtn.classList.toggle('toggle-turn');
    setTimeout(() => {
        icon.classList.toggle('fa-times');
    }, 300);
    navItem.classList.toggle('nav-display');
};

window.addEventListener('scroll', ()=>{
    let top = document.querySelector('.top');
    top.classList.toggle('active', window.scrollY > 50);
});

const wideImg = document.querySelector('.wide-img');
const images = document.querySelectorAll('.images');
const wideDisplay = document.querySelector('.wide-display');
images.forEach(image =>{
    image.onclick = ()=>{
        wideImg.src = image.src;
    };
});


var swiper = new Swiper(".slide-content",{
    slidesPerView: 4,
    spaceBetween: 25,
    // slidesPerGroup: 3,
    loop: "true",
    centerSlide: "true",
    fade: "true",
    grabCursor: "true",
    // loopFillGroupWithBlank: true,
    pagination:{
        el: ".swiper-pagination",
        clickable: true,
        dynamicBullets: true,
    },
    navigation:{
        nextEl: ".next-btn",
        prevEl: ".prev-btn",
        nextEl2: ".next-btn-2"
    },

    breakpoints:{
        0:{
            slidesPerView: 1,
        },
        600:{
            slidesPerView: 3,
        },
        950:{
            slidesPerView: 4,
        }
    }
});


var swiper = new Swiper(".slide-content-2",{
    slidesPerView: 4,
    spaceBetween: 25,
    // slidesPerGroup: 3,
    loop: "true",
    centerSlide: "true",
    fade: "true",
    grabCursor: "true",
    // loopFillGroupWithBlank: true,
    pagination:{
        el: ".swiper-pagination-2",
        clickable: true,
        dynamicBullets: true,
    },
    navigation:{
        nextEl: ".next-btn-2",
        prevEl: ".prev-btn-2",
    },

    breakpoints:{
        0:{
            slidesPerView: 1,
        },
        600:{
            slidesPerView: 3,
        },
        950:{
            slidesPerView: 4,
        }
    }
});


var swiper = new Swiper(".slide-content-3",{
    slidesPerView: 4,
    spaceBetween: 25,
    // slidesPerGroup: 3,
    loop: "true",
    centerSlide: "true",
    fade: "true",
    grabCursor: "true",
    // loopFillGroupWithBlank: true,
    pagination:{
        el: ".swiper-pagination-3",
        clickable: true,
        dynamicBullets: true,
    },
    navigation:{
        nextEl: ".next-btn-3",
        prevEl: ".prev-btn-3",
    },

    breakpoints:{
        0:{
            slidesPerView: 1,
        },
        600:{
            slidesPerView: 3,
        },
        950:{
            slidesPerView: 4,
        }
    }
});

var swiper = new Swiper(".slide-content-4",{
    slidesPerView: 4,
    spaceBetween: 25,
    // slidesPerGroup: 3,
    loop: "true",
    centerSlide: "true",
    fade: "true",
    grabCursor: "true",
    // loopFillGroupWithBlank: true,
    pagination:{
        el: ".swiper-pagination-4",
        clickable: true,
        dynamicBullets: true,
    },
    navigation:{
        nextEl: ".next-btn-4",
        prevEl: ".prev-btn-4",
    },

    breakpoints:{
        0:{
            slidesPerView: 1,
        },
        600:{
            slidesPerView: 3,
        },
        950:{
            slidesPerView: 4,
        }
    }
});

var swiper = new Swiper(".slide-content-5",{
    slidesPerView: 4,
    spaceBetween: 25,
    // slidesPerGroup: 3,
    loop: "true",
    centerSlide: "true",
    fade: "true",
    grabCursor: "true",
    // loopFillGroupWithBlank: true,
    pagination:{
        el: ".swiper-pagination-5",
        clickable: true,
        dynamicBullets: true,
    },
    navigation:{
        nextEl: ".next-btn-5",
        prevEl: ".prev-btn-5",
    },

    breakpoints:{
        0:{
            slidesPerView: 1,
        },
        600:{
            slidesPerView: 3,
        },
        950:{
            slidesPerView: 4,
        }
    }
});




