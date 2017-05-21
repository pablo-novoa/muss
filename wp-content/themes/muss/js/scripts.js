jQuery(document).ready(function(){
  //call menu scrolls
  scrolledHeader();
  jQuery(window).scroll(scrolledHeader);
});

function scrolledHeader(){
  var changePoint = 90;
  var menuElement = jQuery('#main_header') || null;
  if(window.pageYOffset >= changePoint){
    if(menuElement){ menuElement.addClass('scrolled'); }
  }else{
    if(menuElement){ menuElement.removeClass('scrolled'); }
  }
}
