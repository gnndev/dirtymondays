jQuery(document).foundation();
jQuery(function () {
    jQuery(".player").mb_YTPlayer();
});

var gallery = jQuery('.wp-block-gallery .blocks-gallery-item a').simpleLightbox();


/** hide header on scroll down , show on scroll up */
if (window.innerWidth > 1024) {
    var prevScrollpos = window.pageYOffset;
    window.onscroll = function () {
        var currentScrollPos = window.pageYOffset;
        if (prevScrollpos > currentScrollPos) {
            document.querySelector('.header').classList.remove("scrolldown");
            if (currentScrollPos > 0 ){document.querySelector('.header').classList.add("opacity");}
        } else {
            document.querySelector('.header').classList.add("scrolldown");
        }
        if (currentScrollPos === 0 ){document.querySelector('.header').classList.remove("opacity");}
        prevScrollpos = currentScrollPos;
    }
}

var nav = responsiveNav(".nav-collapse", {
    animate: true, // Boolean: Use CSS3 transitions, true or false
    transition: 284, // Integer: Speed of the transition, in milliseconds
    label: '<i class="fa fa-bars"></i>',
    insert: "after",
    customToggle: "",
    closeOnNavClick: true,
    openPos: "relative",
    navClass: "nav-collapse",
    navActiveClass: "js-nav-active",
    jsClass: "js"
});


// popup events page

var loads = document.querySelectorAll('.load');
var overlayContainer = document.getElementById('overlay-container');
var overlay = document.getElementById('overlay');
var close = document.querySelector('.close-icon');
if (loads) {
    loads.forEach(function(load){
        load.addEventListener('click', function(e){
            e.preventDefault;
            overlayContainer.style.display = 'flex';
            document.body.style.overflowY = 'hidden';
            var url= load.dataset.url;
            jQuery('#overlay').load(url + ' .main ', function() {
                jQuery('.tabs').foundation();
            }).niceScroll({
                cursorcolor:"black",
                cursorborder:"1px solid black",
              });
           
        })
    });

    
}

if (close){
    close.addEventListener('click', function(){
        overlayContainer.style.display = 'none';
        document.body.style.overflowY = 'scroll';
        overlay.innerHTML = '<div class="spinner text-center"><i class="fas fa-spinner fa-spin  fa-4x"></i></div>';
    })
}

//carousel block
jQuery('.slick-carousel').slick({
    arrows: false,
    dots: false,
    infinite: false,
    speed: 300,
    slidesToShow: 4,
    slidesToScroll: 1,
    responsive: [
      {
        breakpoint: 1024,
        settings: {
          slidesToShow: 4,
          slidesToScroll: 3,
          infinite: false,
          dots: true
        }
      },
      {
        breakpoint: 600,
        settings: {
          slidesToShow: 2,
          slidesToScroll: 2
        }
      },
      {
        breakpoint: 480,
        settings: {
            arrows: false,
          slidesToShow: 1,
          slidesToScroll: 1,
          autoplay: true,
        autoplaySpeed: 2000,
          dots: true
        }
      }
      // You can unslick at a given breakpoint now by adding:
      // settings: "unslick"
      // instead of a settings object
    ]
  });

