$(document).ready(function(){
	$('.nav-button22').click(function(){
		$('nav > ul').slideToggle(600)
	})
});


function scrollEvent(){
  var distanceY = window.pageYOffset || document.documentElement.scrollTop,
  shrinkOn = 80,
  fix_header = $(".fix_header");
  if (distanceY > shrinkOn) {
		$(fix_header).addClass("smaller");
		$('.top-strip').css('padding-bottom','0px').fadeOut(400)
  } else {
  if ($(fix_header).hasClass("smaller")) {
			$(fix_header).removeClass("smaller");
			$('.top-strip').css('padding-bottom','10px').fadeIn(500)
	}
  }
}


function init() {
	if(window.addEventListener)
		window.addEventListener('scroll',scrollEvent);    	
		else	
	 	window.attachEvent('onscroll', scrollEvent);      
	}
window.onload = init();