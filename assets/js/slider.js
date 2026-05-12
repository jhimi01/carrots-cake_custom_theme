document.addEventListener("DOMContentLoaded", function () {
  new Swiper(".mySwiper", {
    effect: "coverflow",
    grabCursor: true,
    spaceBetween: 0,
    centeredSlides: true,
    loop: true,
    // coverflowEffect: {
    //   rotate: 0,
    //   stretch: 0,
    //   depth: 100,
    //   modifier: 4,
    //   slideShadows: true,
    // },
    breakpoints: {
      640: {
        slidesPerView: 1,
        coverflowEffect: {
          rotate: 0,
          stretch: 40,
          depth: 50,
          modifier: 2,
          slideShadows: true,
        },
      },
      768: {
        slidesPerView: 2.3,
        coverflowEffect: {
          rotate: 0,
          stretch: 0,
          depth: 100,
          modifier: 4,
          slideShadows: true,
        },
      },
      1024: {
        slidesPerView: 3,
        coverflowEffect: {
          rotate: 0,
          stretch: 0,
          depth: 100,
          modifier: 4,
          slideShadows: true,
        },
      },
    },
    navigation: {
      nextEl: ".swiper-button-next",
      prevEl: ".swiper-button-prev",
    },
    Keyboard: {
      enable: true,
    },
  });
});
