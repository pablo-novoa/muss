jQuery(document).ready(function(){
  burguerInit();
  muss_prodColorSelect();
  bxSlider_init();
  //call menu scrolls
  scrolledHeader();
  jQuery(window).scroll(scrolledHeader);
  prodLinks();
});

jQuery(window).load(function(){
  prodGalleryCarousel();
});

function scrolledHeader(){
  var changePoint = 50;
  var menuElement = jQuery('#main_header') || null;
  if(window.pageYOffset >= changePoint){
    if(menuElement){ menuElement.addClass('scrolled'); }
  }else{
    if(menuElement){ menuElement.removeClass('scrolled'); }
  }
}

function burguerInit(){

  var burguer = jQuery('.menu_burguer');
  var menu = jQuery('.header_menu_wrap');
  var animaSpeed = 600;
  if(burguer.length == 0 || menu.length == 0){ return false; }
  if(window.innerWidth <= 992){ menu.hide(); }

  burguer.click(function(){
    jQuery(this).toggleClass('toggled');
    if(jQuery(this).hasClass('toggled')){
      menu.fadeIn(animaSpeed);
    }else{
      menu.fadeOut(animaSpeed);
    }
  });

  jQuery(window).resize(function(){
      burguer.removeClass('toggled');
      if(window.innerWidth > 992){
        menu.show();
      }else{
        menu.hide();
      }
  });

}

function muss_prodColorSelect(){
  
  if(jQuery('.swatch-color').length == 0){ return false; }

  jQuery('.swatch-color').click(function(){
    jQuery('.swatch-color').css('opacity', '0.5');
    jQuery(this).css('opacity', '1');
  });

}


function bxSlider_init(){
  jQuery('.bxslider').bxSlider({
    pager: false,
    //auto: true,
    //pause: 3700
  });
}

function prodLinks(){
  jQuery('.product_card').click(function(){
    var link = jQuery(this).data('link');
    window.location.href = link;
  });
}

function prodGalleryCarousel(){
  PGC_initMarkup();
  //PGC_settup();
}

function PGC_initMarkup(){
  jQuery('.woocommerce-product-gallery ol.flex-control-thumbs').each(function(){
    var element = jQuery(this);
    element.addClass('slick_gallery_carousel');
    element.wrap('<div class="product-gallery_carousel"></div>');

  });
  PGC_settup();
}

function PGC_settup(){
  jQuery('.slick_gallery_carousel').slick({
    dots: true,
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
          slidesToShow: 1,
          slidesToScroll: 1
        }
      }
      // You can unslick at a given breakpoint now by adding:
      // settings: "unslick"
      // instead of a settings object
    ]
  });
}
