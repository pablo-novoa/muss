jQuery(document).ready(function(){
  //call menu scrolls
  scrolledHeader();
  jQuery(window).scroll(scrolledHeader);
});

function scrolledHeader(){
  var changePoint = 90;
  var menuElements = {
    desktop: jQuery('#main_header') || null,
    mobile: jQuery('#main_header_mobile') || null
  };
  if(window.pageYOffset >= changePoint){
    if(menuElements.desktop){ menuElements.desktop.addClass('scrolled'); }
    if(menuElements.desktop){ menuElements.mobile.addClass('scrolled'); }
  }else{
    if(menuElements.desktop){ menuElements.desktop.removeClass('scrolled'); }
    if(menuElements.desktop){ menuElements.mobile.removeClass('scrolled'); }
  }
}
