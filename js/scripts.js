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

/* Tiny fallback: if nav/home or contact anchors lack usable hrefs, route to canonical pages.
 	Only affects anchors with classes `nav-home` or `btn-contact` to avoid touching modals or other links. */
(function(){
	// Canonical URLs for JS fallbacks (defined near top to ensure availability)
	var HOME = 'index.php?pageid=2';
	var CONTACT = 'Contact.html';

	function looksUnsafe(h){
		if(!h) return false;
		// treat file: scheme or any drive-letter absolute paths as unsafe
		if (/^file:/i.test(h)) return true;
		if (/^[A-Za-z]:[\\\/]/.test(h)) return true;
		return false;
	}

	document.addEventListener('click', function(e){
		try{
			var a = e.target && e.target.closest && e.target.closest('a');
			if(!a) return;
			if(a.classList && a.classList.contains('btn-contact')){
				var href = a.getAttribute('href') || '';
				if(!href || href.trim() === '#'){
					e.preventDefault();
					window.location.href = CONTACT;
				}
			}
			if(a.classList && a.classList.contains('nav-home')){
				var href = a.getAttribute('href') || '';
				if(!href || looksUnsafe(href)){
					e.preventDefault();
					window.location.href = HOME;
				}
			}
		}catch(err){/* noop */}
	});
})();
/* Canonical URLs — keep in one place for JS fallbacks */
var CANONICAL_HOME = 'index.php?pageid=2';
var CANONICAL_CONTACT = 'Contact.html';

/* Hero CTA Button Handlers
	- Book a Free Demo: opens WhatsApp in new tab
	- Contact Us: navigates to Contact page
*/
document.addEventListener('click', function(e) {
	var demo = e.target.closest && e.target.closest('.btn-demo');
	if (demo) {
		window.open('https://wa.me/9059508050?text=Hi%2C%20I%20would%20like%20to%20book%20a%20free%20AI%20and%20Robotics%20demo.', '_blank');
		e.preventDefault();
		return;
	}
	
	var contact = e.target.closest && e.target.closest('.btn-contact');
	if (contact) {
		window.location.href = CANONICAL_CONTACT;
		e.preventDefault();
		return;
	}
});

/* Mobile-safe fallback: block navigation to file: and windows-drive paths
	 - Intercepts clicks in capture phase so other handlers see cleaned URLs
	 - If an unsafe URL is detected, redirect to `Contact.html` when intent
		 appears to be a Contact CTA, otherwise fall back to homepage.
*/
(function(){
	function isUnsafeHref(rawHref, resolvedHref){
		if(!rawHref && !resolvedHref) return false;
		rawHref = rawHref || '';
		resolvedHref = resolvedHref || '';
		// raw attribute could be like "C:\path\file" or "file:///C:/..."
		if (/^file:/i.test(rawHref) || /^file:/i.test(resolvedHref)) return true;
		if (/^[A-Za-z]:[\\\/]/.test(rawHref)) return true;
		// also guard against accidental back-end windows path included in absolute resolved href
		if (/file:\/\//i.test(resolvedHref)) return true;
		return false;
	}

	document.addEventListener('click', function(ev){
		try{
			var el = ev.target && ev.target.closest && ev.target.closest('a, [data-href], .link-2, .fss-card, .btn-contact');
			if(!el) return;

			var rawHref = el.getAttribute && (el.getAttribute('href') || el.dataset && el.dataset.href) || '';
			// resolvedHref uses the element's href property when available (absolute URL), fall back to raw
			var resolvedHref = el.href || rawHref || '';

			if(isUnsafeHref(rawHref, resolvedHref)){
				ev.preventDefault();
				ev.stopImmediatePropagation();
				// If element looks like Contact, go to canonical Contact page
				var isContact = (el.classList && el.classList.contains('btn-contact')) || /contact/i.test(rawHref+resolvedHref);
				if(isContact){
					window.location.href = CANONICAL_CONTACT;
				} else {
					// safe fallback to canonical homepage
					window.location.href = CANONICAL_HOME;
				}
			}
		}catch(e){
			// swallow errors to avoid breaking other click handlers
		}
	}, true);
})();