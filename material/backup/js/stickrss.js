function initializeExternalLinks() {
	$('a').filter(function() {
		return this.hostname && this.hostname !== location.hostname;
	}).addClass('external');
	
	$('a.external').click(function(event) {
		open(this.href);
		event.preventDefault();
	});
}

function initializeExpandableElements() {
	$('.expandable').hide();
	
	$('.expand, .collapse').click(function(event) {
		$(this).parent().toggleClass('expanded');
		$(this).toggleClass('expand').toggleClass('collapse');
		$(this).siblings('.expandable').slideToggle(100);
		event.preventDefault();
	});
}

function initializeIeFix() {
	if ($.browser.msie) {
		if ($.browser.version < 7) {
			$('#menu').css('position', 'absolute');
			var menuOffset = $('#menu').position().top;
			$(window).scroll(function() {
				$('#menu').css({
					'top': menuOffset + $(window).scrollTop() + 'px'
				});
			});
		}
	}
}

$(document).ready(function() {
	initializeExternalLinks();
	initializeExpandableElements();
	initializeIeFix();
});