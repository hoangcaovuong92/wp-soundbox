//****************************************************************//
/*							Main JS								  */
//****************************************************************//

jQuery(document).ready(function($) {
	"use strict";
	
	
	//Form login and cart
	jQuery('.cart_dropdown,.form_drop_down').hide();
	jQuery('.wd_tini_cart_wrapper,.wd_tini_account_wrapper').hoverIntent(
		function(){
			jQuery(this).children('.drop_down_container').slideDown(300);
		}
		,function(){
			jQuery(this).children('.drop_down_container').slideUp(300);
		}
	
	);
	jQuery('body').live('mini_cart_change',function(){
		jQuery('.wd_tini_cart_wrapper,.wd_tini_account_wrapper').hoverIntent(
			function(){
				jQuery(this).children('.drop_down_container').slideDown(300);
			}
			,function(){
				jQuery(this).children('.drop_down_container').slideUp(300);
			}
		
		);
	});
	
	jQuery('.menu-bars').click(function(event) {
		jQuery('.pushmenu-left').toggle("slide", {
            direction: "left"
        });
	});
	//Hide Popup
	jQuery(".popup").hide();

	jQuery(".wd-click-popup-search").click(function () {
		if(jQuery(".wd-popup-search" ).hasClass( "hidden" )){
			jQuery(".wd-popup-search").removeClass('hidden').addClass('show')	
		}else{
			jQuery(".wd-popup-search").removeClass('show').addClass('hidden')
		}
	});
	jQuery(".wd-search-close").click(function () {
		jQuery(".wd-popup-search").removeClass('show').addClass('hidden')
	});

	//Scroll Button
	if( jQuery('html').offset().top < 100 ){
		jQuery("#to-top").hide();
	}
	jQuery(window).scroll(function () {
		
		if (jQuery(this).scrollTop() > 100) {
			jQuery("#to-top").fadeIn();
		} else {
			jQuery("#to-top").fadeOut();
		}
	});
	jQuery('.scroll-button').click(function(){
		jQuery('body,html').animate({
		scrollTop: '0px'
		}, 1000);
		return false;
	});
	em_sections();
});
// Video Play
function soundbax_video_play(){
	//Popup Video
	jQuery(".tvlgiao_playvideo").click(function () {
		var video_url = document.getElementById('tvlgiao_urlvideo').value;
		jQuery(".popup iframe").attr("src",video_url);
	    jQuery(".openpop").fadeOut('slow');
	    jQuery(".popup").fadeIn('slow');
	    jQuery(".tvlgiao_playvideo").hide();
	});
	//Close Popup
	jQuery(".close").click(function () {
	    jQuery(".popup").hide();
	    jQuery(".tvlgiao_playvideo").show();
	   	jQuery(".popup iframe").attr("src",'');
	    jQuery(".openpop").show();
	});
}
// Wishlist
jQuery(document).ready(function($) {
	soundbax_video_play();
	if(jQuery('.post-slider').length >0 ){
					jQuery('.post-slider').each(function(){
						var _auto = jQuery(this).attr('data-auto') == 1 ? true : false;
						var _nav = jQuery(this).attr('data-nav') == 1 ? true : false;
						var _pagi = jQuery(this).attr('data-pagi') == 1 ? true : false;
						jQuery(this).flexslider({
							animation: "slide"
							,controlNav: _pagi
							,directionNav: _nav
							,slideshow: _auto
						});
					});
				}

	if(jQuery('.post_mansory').length > 0 ){
					jQuery('.post_mansory').each(function(index,value){
						var wrapper_width = jQuery(this).width();				
						var object_selector = '#'+jQuery(this).attr('id');
						var min_width = jQuery(value).attr('data-min');		
						var item_width = Math.floor(wrapper_width * min_width / 100);
						fix_gallery_item(object_selector,wrapper_width,min_width,item_width);
						
						jQuery(value).imagesLoaded( function() {
							jQuery(value).isotope({
								layoutMode: 'masonry'
								,itemSelector: '.gallery_item'
								,masonry: {
									columnWidth: item_width
								}
							});
						});
					});	
				}
				function fix_gallery_item(object_selector,wrapper_width,min_width,item_width){
					jQuery( object_selector + " div.gallery_item" ).each(function() {
						var item_data_width = 	jQuery(this).attr('data-width');
						var item_width__ = Math.round(item_data_width / min_width) * item_width;
						//var item_width = Math.floor(wrapper_width * item_data_width / 100);
						jQuery( this).css({'width' : item_width__+'px'});
					});
				}	
		jQuery('#commentform').find('input').focus(function() {
							if(jQuery(this).val() == jQuery(this).attr('data-default'))
								jQuery(this).val('');
						}).blur(function() {
							if(jQuery(this).val() == '')
								jQuery(this).val(jQuery(this).attr('data-default'));
						});
						jQuery('#commentform').submit(function() {
							jQuery(this).find('input').each(function(input){
								if(jQuery(this).val() == jQuery(this).attr('data-default'))
									jQuery(this).val('');
							});	
							return true;
						});
						
	custom_mobile_menu();
	jQuery( "html .woocommerce table.wishlist_table tbody tr td.product-name" ).attr({
	  "data-title": "Product"
	});
	jQuery( "html .woocommerce table.wishlist_table tbody tr td.product-price" ).attr({
	  "data-title": "Price"
	});
	jQuery( "html .woocommerce table.wishlist_table tbody tr td.product-stock-status" ).attr({
	  "data-title": "Stock"
	});
	
	jQuery(".mobile-main-menu ul.menu").on("click",'.menu-drop-icon-mobile',function(){
        if(!jQuery(this).hasClass("active")){
            jQuery(this).parents("li:first").find("ul.sub-menu:first").slideDown("slow");
            jQuery(this).addClass("active");
        }
        else{
            jQuery(this).parents("li:first").find("ul.sub-menu:first").slideUp("slow");
            jQuery(this).find("ul.sub-menu").hide();
            jQuery(this).removeClass("active");
        }
        
    });
});

function custom_mobile_menu(){
    var _li_have_sub_menu_mobile = jQuery(".mobile-main-menu ul.menu ul.sub-menu").parents("li");
    var _button_toggle_menu_html = '<i class="fa fa-angle-down menu-drop-icon-mobile" aria-hidden="true"></i>';

    jQuery(_button_toggle_menu_html).insertAfter(_li_have_sub_menu_mobile.find("a:first"));
    jQuery(".mobile-main-menu ul.menu ul.sub-menu").slideUp('slow');
    jQuery(".mobile-main-menu ul.menu li.current-menu-item").parents("ul.sub-menu").show();
    jQuery(".mobile-main-menu ul.menu li.current-menu-item").parents("ul.sub-menu").prev().addClass("active");
}

function em_sections(){ 
	jQuery('.vc_row-fluid[data-vc-full-width="true"]').each(function(){
		
		if( jQuery('body').hasClass('rtl') ){
			jQuery(this).css({'left': 'auto'});
			jQuery(this).css({'right': 'auto'});
			var rt = (jQuery(window).width() - (jQuery(this).offset().left + jQuery(this).outerWidth()));
			jQuery(this).css({
				'right': - (rt),
				'width': jQuery(window).width(),
				'visibility': 'visible',
				'position': 'relative'
			});
		}		
	});
}