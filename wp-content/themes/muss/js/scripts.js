jQuery(document).ready(function(){
  burguerInit()
  //call menu scrolls
  scrolledHeader();
  jQuery(window).scroll(scrolledHeader);
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
