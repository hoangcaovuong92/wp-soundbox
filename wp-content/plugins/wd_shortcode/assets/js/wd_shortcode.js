jQuery(document).ready(function($) {
	jQuery('.faq_toggle').click(function(event) {
		/* Act on the event */
        jQuery(this).toggleClass('active');
        jQuery(this).parents('.wd_shortcode_faq').toggleClass('active')
		jQuery(this).parents('.wd_shortcode_faq').find('.wd_shortcode_faq__answer').slideToggle();
	});
});
