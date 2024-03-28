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
      if (currentScrollPos > 0) {
        document.querySelector('.header').classList.add("opacity");
      }
    } else {
      if (currentScrollPos > 100) {
      document.querySelector('.header').classList.add("scrolldown");
      }
    }
    if (currentScrollPos < 100 ) {
      document.querySelector('.header').classList.remove("opacity");
    }
    prevScrollpos = currentScrollPos;
  }
}

// var nav = responsiveNav(".nav-collapse", {
//   animate: true, // Boolean: Use CSS3 transitions, true or false
//   transition: 284, // Integer: Speed of the transition, in milliseconds
//   label: '<i class="fa fa-bars"></i>',
//   insert: "after",
//   customToggle: "",
//   closeOnNavClick: true,
//   openPos: "relative",
//   navClass: "nav-collapse",
//   navActiveClass: "js-nav-active",
//   jsClass: "js"
// });


// popup events page

// var loads = document.querySelectorAll('.load');
// var overlayContainer = document.getElementById('overlay-container');
// var overlay = document.getElementById('overlay');
// var close = document.querySelector('.close-icon');
// if (loads) {
//   loads.forEach(function (load) {
//     load.addEventListener('click', function (e) {
//       e.preventDefault;
//       overlayContainer.style.display = 'flex';
//       document.body.style.overflowY = 'hidden';
//       var url = load.dataset.url;
//       jQuery('#overlay').load(url + ' .main ', function () {
//         jQuery('.tabs').foundation();
//         jQuery("#overlay").getNiceScroll().remove()
//       }).on('change.zf.tabs', function() {
//         jQuery("#overlay").getNiceScroll().remove()
        
//         jQuery('#overlay').niceScroll({
//         cursorcolor: "black",
//         cursorborder: "1px solid black",
//       });

// });

//     })
//   });


// }

// if (close) {
//   close.addEventListener('click', function () {
//     overlayContainer.style.display = 'none';
//     document.body.style.overflowY = 'scroll';
//     overlay.innerHTML = '<div class="spinner text-center"><i class="fas fa-spinner fa-spin  fa-4x"></i></div>';
//   })
// }

jQuery('.concerts-slider').slick({

  infinite: true,
  speed: 300,
  slidesToShow: 1,
  responsive: [{
    breakpoint: 1024,
    settings: {
      slidesToShow: 1,
      slidesToScroll: 1,
      infinite: false,
      dots: false,
      arrows: true
    }
  },
  {
    breakpoint: 480,
    settings: {
      arrows: false,
      slidesToShow: 1,
      slidesToScroll: 1,
      dots: true
    }
  }]

});

jQuery('.upcoming-slider').slick({

  infinite: true,
  speed: 300,
  slidesToShow: 3,
      slidesToScroll: 1,
  responsive: [{
    breakpoint: 1024,
    settings: {
      slidesToShow: 3,
      slidesToScroll: 1,
      infinite: false,
      dots: false,
      arrows: false
    }
  },
  {
    breakpoint: 480,
    settings: {
      arrows: false,
      slidesToShow: 1,
      slidesToScroll: 1,
      dots: true
    }
  }]

});


//carousel block
jQuery('.slick-carousel').slick({
  arrows: false,
  dots: false,
  infinite: false,
  speed: 300,
  slidesToShow: 4,
  slidesToScroll: 1,
  responsive: [{
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
        dots: true
      }
    }
  ]
});
jQuery('.single-item').slick({
  infinite: true,
  slidesToShow: 1,
  slidesToScroll: 1,
  arrows: false,
  dots: true,
});

jQuery('.featured-products-slider').slick({
  dots: true,
  arrows : false,
  infinite: false,
  speed: 300,
  slidesToShow: 4,
  slidesToScroll: 4,
  responsive: [
    {
      breakpoint: 1024,
      settings: {
        slidesToShow: 3,
        slidesToScroll: 3,
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
        slidesToShow: 2,
        slidesToScroll: 1
      }
    }
  ]
});
var accountInstagram = document.getElementById("instagram-account");
if (accountInstagram){
  accountInstagram.addEventListener('click', function(e){
    e.target.value = "@";
  })
}
// var NoneMode = Isotope.LayoutMode.create('none');
// var $grid = jQuery('.products-grid').imagesLoaded( function() {
//   // init Isotope after all images have loaded
//   $grid.isotope({
//     itemSelector: '.products-grid-item',
//     layoutMode: 'none'
//   });
// });


// // store filter for each group
//add event listener to all .cat-filter with document.querySelectorAll('.cat-filter')
var catFilters = document.querySelectorAll('.cat-filter');
if (catFilters) {
  catFilters.forEach(function (catFilter) {
    catFilter.addEventListener('click', function (e) {
      e.preventDefault();
      //add class active to the clicked filter
      catFilters.forEach(function (catFilter) {
        catFilter.classList.remove('active');
      });
      //get the filter value
      var filter = e.target.dataset.filter;
      //show all the items with class = filter
      var items = document.querySelectorAll('.products-grid-item');
      items.forEach(function (item) {
        item.classList.remove('hide');
        if (!item.classList.contains(filter) && filter !== 'all') {
          item.classList.add('hide');
        }
      });
      e.target.classList.add('active');
    });
  });
}



// jQuery('.products-filters').on( 'change', function( event ) {
//   var $select = jQuery( event.target );
//   // get group key
//   // set filter for group
//   var filter = event.target.value;
//   // combine filters
//   //jQuery('.products-grid-item').show();
//   jQuery( '.products-grid-item' ).each(function( index ) {
//     if(jQuery( this ).hasClass(filter) || '' === filter) {
//       jQuery( this ).show();
//     } else {
//       jQuery( this ).hide();
//     }
    
//   });
//   // set filter for Isotope
//  // $grid.isotope({ filter: filterValue });
// });


/* Set the width of the side navigation to 250px and the left margin of the page content to 250px */
function openNav() {
  document.getElementById("mySidenav").style = "transform: translateX(0)";
  
}

/* Set the width of the side navigation to 0 and the left margin of the page content to 0 */
function closeNav() {
  document.getElementById("mySidenav").style = "transform: translateX(100%)";

}