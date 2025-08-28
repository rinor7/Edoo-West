//Hamburger Menu
var Menu = {
    el: {
    ham: jQuery('.menu-m'),
    menuTop: jQuery('.menu-top'),
    menuMiddle: jQuery('.menu-middle'),
    menuBottom: jQuery('.menu-bottom')
    },
    init: function() {
    Menu.bindUIactions();
    },
    bindUIactions: function() {
    Menu.el.ham
    .on(
    'click',
    function(event) {
    Menu.activateMenu(event);
    event.preventDefault();
    }
    );
    },
    activateMenu: function() {
    Menu.el.menuTop.toggleClass('menu-top-click');
    Menu.el.menuMiddle.toggleClass('menu-middle-click');
    Menu.el.menuBottom.toggleClass('menu-bottom-click'); 
    }
    };
Menu.init();

// Header change on scroll
$(document).ready(function() {
  $(window).scroll(function(){
      if ($(this).scrollTop() > 70) {
         $('.logo_header').addClass('logo-change-on-scroll'); 
         $('.logo_site').addClass('logo-change-on-scroll'); 
         $('.headerbar').addClass('reduce-header-height-on-scroll');
        //  $('.navbar-toggler2').addClass('scroll-hamburger');
         $('header').addClass('shadow-show-on-scroll');
         $('body').addClass('body-on-scroll');
      } else {
         $('.logo_header').removeClass('logo-change-on-scroll');
         $('.logo_site').removeClass('logo-change-on-scroll');
         $('.headerbar').removeClass('reduce-header-height-on-scroll');
        //  $('.navbar-toggler2').removeClass('scroll-hamburger');
         $('header').removeClass('shadow-show-on-scroll');
         $('body').removeClass('body-on-scroll');
      }
      if ($(this).scrollTop() > 30) {
        $('body').addClass('body-on-scroll');
     } else {
        $('body').removeClass('body-on-scroll');
     }
  });
});

// Menu for standard header with blur effect
$(document).ready(function() {
  const navbarToggler = $('.navbar-toggler-standard');
  const site = $('.site');
  const body = $('body');

  navbarToggler.on('click', function() {
    if (body.hasClass('no-scroll')) {
      body.removeClass('no-scroll');
      site.removeClass('filter-style');
      $(window).scrollTop(body.data('scroll-position')); // Restore previous scroll position
    } else {
      body.data('scroll-position', $(window).scrollTop()); // Save current scroll position
      body.addClass('no-scroll');
      site.addClass('filter-style');
    }
  });
});


// Close navbar when click on link ( used for Landingpages )
function closeNavbar() {
  $(".navbar-toggler").attr("aria-expanded", "false");
  $(".navbar-collapse").removeClass("show");
  $(".menu-top").removeClass("menu-top-click");
  $(".menu-middle").removeClass("menu-middle-click");
  $(".menu-bottom").removeClass("menu-bottom-click");
  $("body").removeClass("no-scroll");
  $(".site").removeClass("filter-style");
  $(".menu-menu-1-container").removeClass("act");
  toggleScroll();
}
$(".navbar-collapse li a").on("click", function() {
  closeNavbar();
});


//For all navigation, add menu-open class on body
document.addEventListener('DOMContentLoaded', function () {
  var navbar = document.getElementById('navbarNav');

  navbar.addEventListener('show.bs.collapse', function () {
    document.body.classList.add('menu-open');
  });

  navbar.addEventListener('hide.bs.collapse', function () {
    document.body.classList.remove('menu-open');
  });
});


var swiper = new Swiper(".mySwiper-reviews", {
  slidesPerView: 1.5,
  spaceBetween: 15,
  loop: true,
  autoHeight: true,
  navigation: {
    nextEl: ".swiper-button-next",
    prevEl: ".swiper-button-prev",
  },
  pagination: {
    el: ".swiper-pagination",
    clickable: true,
  },
  breakpoints: {
    991.98: {
      slidesPerView: 2,
      spaceBetween: 16,
    },
    1024: {
      slidesPerView: 3,
      spaceBetween: 16,
    },
  },
});

var swiper = new Swiper(".mySwiper-partners", {
  slidesPerView: 1.5,
  spaceBetween: 15,
  loop: true,
  autoHeight: true,
  autoplay: {
      delay: 3500,
      disableOnInteraction: false,
    },
  navigation: {
    nextEl: ".swiper-button-next",
    prevEl: ".swiper-button-prev",
  },
  pagination: {
    el: ".swiper-pagination",
    clickable: true,
  },
  breakpoints: {
    575.98: {
      slidesPerView: 2,
      spaceBetween: 15,
    },
    767.98: {
      slidesPerView: 3,
      spaceBetween: 15,
    },
    991.98: {
      slidesPerView: 4,
      spaceBetween: 16,
    },
    1024: {
      slidesPerView: 5,
      spaceBetween: 16,
    },
  },
});

var swiper = new Swiper(".mySwiper-events", {
  slidesPerView: 1.3,
  spaceBetween: 15,
  loop: true,
  autoHeight: false,
  navigation: {
    nextEl: ".swiper-button-next",
    prevEl: ".swiper-button-prev",
  },
  pagination: {
    el: ".swiper-pagination",
    clickable: true,
  },
  breakpoints: {
    640: {
      slidesPerView: 2,
      spaceBetween: 15,
    },
    991.98: {
      slidesPerView: 2.3,
      spaceBetween: 16,
    },
    1024: {
      slidesPerView: 3,
      spaceBetween: 16,
    },
  },
});

var swiper = new Swiper(".aboutUsSwiper", {
  slidesPerView: 1.5,
    spaceBetween: 16,
    loop: true,
    navigation: {
        nextEl: '.swiper-button-next',
        prevEl: '.swiper-button-prev'
    },
    pagination: {
        el: '.swiper-pagination',
        clickable: true
    },
    breakpoints: {
        575.98: { slidesPerView: 2 },
        767.98: { slidesPerView: 3 },
        1024: { slidesPerView: 4 }
    }
});

// Show "Other" Field CF7 When Selected
document.addEventListener('DOMContentLoaded', function() {
    const select = document.querySelector('select[name="course-select"]');
    const otherWrap = document.querySelector('.other-course-wrap');

    if (select && otherWrap) {
        // Make first option disabled (placeholder)
        if (select.options.length > 0) {
            select.options[0].disabled = true;
        }

        select.addEventListener('change', function() {
            if (this.value === 'Other') {
                otherWrap.style.display = 'block';
            } else {
                otherWrap.style.display = 'none';
            }
        });
    }
});
