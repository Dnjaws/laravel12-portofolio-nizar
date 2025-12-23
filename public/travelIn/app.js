// SWIPER #1 – Rekomendasi buat yang Nolep
new Swiper('.nolep-swiper', {
    loop: true,
    spaceBetween: 10,
    pagination: {
        el: '.nolep-swiper .swiper-pagination',
        clickable: true,
    },
    navigation: {
        nextEl: '.nolep-swiper .swiper-button-next',
        prevEl: '.nolep-swiper .swiper-button-prev',
    },
    breakpoints: {
        0: { slidesPerView: 1 },
        768: { slidesPerView: 2 },
        1024: { slidesPerView: 4 },
    }
});

// SWIPER #2 – TRENDING
new Swiper('.trenn-swiper', {
    loop: true,
    spaceBetween: 20,
    pagination: {
        el: '.trenn-swiper .swiper-pagination',
        clickable: true,
    },
    navigation: {
        nextEl: '.trenn-swiper .swiper-button-next',
        prevEl: '.trenn-swiper .swiper-button-prev',
    },
    breakpoints: {
        0: { slidesPerView: 1 },
        768: { slidesPerView: 2 },
        1024: { slidesPerView: 4 },
    }
});

window.addEventListener("scroll", () => {
  const nav = document.querySelector("header nav");
  if (window.scrollY > 50) {
    nav.classList.add("scrolled");
  } else {
    nav.classList.remove("scrolled");
  }
});

const nav = document.querySelector("header nav");
const stopSection = document.querySelector(".secc"); // ganti sesuai class section "TRENN!!"

window.addEventListener("scroll", () => {
  const currentScroll = window.pageYOffset;
  const stopPoint = stopSection.offsetTop - 50; // titik mulai hilang (bisa disesuaikan)

  if (currentScroll >= stopPoint) {
    nav.style.transform = "translateY(-100%)"; // sembunyikan
  } else {
    nav.style.transform = "translateY(0)"; // tampilkan
  }
});

