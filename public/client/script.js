const nav = document.querySelector("nav");
const navLinks = document.querySelectorAll(".nav-links li");
const menu = document.querySelector("#menu");

document.body.addEventListener("click", (e) => {
  if (!menu.contains(e.target) & !nav.contains(e.target)) {
    nav.classList.remove("active");
    menu.classList.remove("active");
  } else if (menu.contains(e.target)) {
    nav.classList.toggle("active");
    menu.classList.toggle("active");
  }
});

navLinks.forEach((link) => link.addEventListener("click", addActiveClass));

function addActiveClass() {
  navLinks.forEach((link) => link.classList.remove("active"));
  this.classList.add("active");
}

// animation for vertical line 📏 & circles ⚪
const verticalLine = document.querySelector(".vertical");
const circles = document.querySelectorAll(".circle");
const horizontalLines = document.querySelectorAll(".horizontal");
const startingPoint = document.querySelector("#home").offsetHeight / 2;

let activeIndex = 0;

/// **  Description **
/**
 * animation will start at height/2 of the Home page.
 * when scrollAmount >= height of a feature card
 * we want to increment active Index and
 * then animate vertical line and the circles.
 */

function scrollEffect() {
  const scrollAmt = scrollY - startingPoint;

  if (scrollAmt < 0) {
    activeIndex = 0;
    circles.forEach((circle) => circle.classList.remove("active"));
    horizontalLines.forEach((circle) => circle.classList.remove("active"));
    verticalLine.style.height = 0;
    return;
  }

  const amtToScroll =
    document.querySelector(".feature").offsetHeight * (activeIndex + 1);

  if (scrollAmt >= amtToScroll) {
    activeIndex = Math.min(activeIndex + 1, circles.length);
    verticalLine.style.height = `${(activeIndex * 100) / circles.length}%`;
    circles[activeIndex - 1].classList.add("active");
    horizontalLines[activeIndex - 1].classList.add("active");
  }
}

window.onscroll = scrollEffect;
// footer copyright
let output = `<span class='copy-write'>&copy; ${new Date().getFullYear()}</span>`;
document.querySelector("footer .container").innerHTML += output;

// JavaScript for the slider
let slideIndex = 1;
const slides = document.querySelector('.hero-slider');
const dots = document.querySelectorAll('.dot');
const slideWidth = document.querySelector('.hero-slide').offsetWidth; // Get the width of one slide

function showSlides(n) {
    if (n > dots.length) {
        slideIndex = 1;
    }
    if (n < 1) {
        slideIndex = dots.length;
    }

    slides.style.transform = `translateX(-${(slideIndex - 1) * 100}%)`; // Use percentage for responsiveness

    dots.forEach(dot => dot.classList.remove('active'));
    dots[slideIndex - 1].classList.add('active');
}

function currentSlide(n) {
    slideIndex = n;
    showSlides(slideIndex);
}

// Auto play (optional)
function autoPlay() {
    slideIndex++;
    showSlides(slideIndex);
}
setInterval(autoPlay, 5000); // Change slide every 5 seconds

// Initial show
showSlides(slideIndex);

// Make sure the slider is properly sized on resize
window.addEventListener('resize', () => {
    slideWidth = document.querySelector('.hero-slide').offsetWidth;
    showSlides(slideIndex);
});

//
// Dark & Light toggle

document.querySelector(".day-night input").addEventListener("change", () => {
  document.querySelector("body").classList.add("toggle");
  setTimeout(() => {
    document.querySelector("body").classList.toggle("light");

    setTimeout(
      () => document.querySelector("body").classList.remove("toggle"),
      10
    );
  }, 5);
});
// danh mục 
$(document).ready(function(){
  $('.product-carousel').slick({
      infinite: false,
      slidesToShow: 3, // Hiển thị 3 card cùng lúc (điều chỉnh theo ý muốn)
      slidesToScroll: 1,
      // Thêm các tùy chọn khác nếu cần
  });
});

const carousel = document.getElementById('autoScrollingCarousel');

if (carousel) {
    let scrollSpeed = 2; // Tốc độ cuộn (pixels mỗi frame)

    function autoScroll() {
        carousel.scrollLeft += scrollSpeed;
        // Kiểm tra nếu đã cuộn đến cuối, thì quay lại đầu
        if (carousel.scrollLeft >= (carousel.scrollWidth - carousel.clientWidth)) {
            carousel.scrollLeft = 0;
        }
        requestAnimationFrame(autoScroll); // Lặp lại animation trên frame tiếp theo
    }

    // Bắt đầu cuộn tự động khi trang tải
    requestAnimationFrame(autoScroll);

    // Dừng cuộn khi hover để người dùng có thể xem
    carousel.addEventListener('mouseenter', () => {
        scrollSpeed = 0;
    });

    // Tiếp tục cuộn khi chuột rời khỏi
    carousel.addEventListener('mouseleave', () => {
        scrollSpeed = 2;
    });
}


$('.article-cardy').slick({
  slidesToShow: 3,
  slidesToScroll: 1,
  autoplay: true,
  autoplaySpeed: 2000,
});
	