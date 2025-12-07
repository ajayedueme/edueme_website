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

/* Reveal-on-scroll IntersectionObserver
	 - Adds `.is-visible` to elements with `.reveal-on-scroll` when they cross threshold
	 - Respects `prefers-reduced-motion` and falls back to immediate reveal when unsupported
*/
(function(){
	if (window.matchMedia && window.matchMedia('(prefers-reduced-motion: reduce)').matches) {
		// Respect user preference: reveal all immediately
		document.querySelectorAll('.reveal-on-scroll').forEach(function(el){ el.classList.add('is-visible'); });
		return;
	}

	var revealEls = document.querySelectorAll('.reveal-on-scroll');
	if (!revealEls.length) return;

	if ('IntersectionObserver' in window) {
		var io = new IntersectionObserver(function(entries, obs){
			entries.forEach(function(entry){
				if (entry.isIntersecting) {
					entry.target.classList.add('is-visible');
					obs.unobserve(entry.target);
				}
			});
		}, { threshold: 0.15 });

		revealEls.forEach(function(el){ io.observe(el); });
	} else {
		// Fallback: reveal all
		revealEls.forEach(function(el){ el.classList.add('is-visible'); });
	}
})();

/* Hero CTA Button Handlers
   - Book a Free Demo: opens WhatsApp in new tab
   - Contact Us: navigates to Contact page
*/
document.addEventListener('click', function(e) {
	var demo = e.target.closest && e.target.closest('.btn-demo');
	if (demo) {
		window.open('https://wa.me/9059508050?text=Hi%2C%20I%20would%20like%20to%20book%20a%20free%20demo%20for%20robotics%20%2F%20AI%20classes.', '_blank');
		e.preventDefault();
		return;
	}
	
	var contact = e.target.closest && e.target.closest('.btn-contact');
	if (contact) {
		window.location.href = 'Contact.html';
		e.preventDefault();
		return;
	}
});