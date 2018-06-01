//****************************************************************//
/*                          product download JS                   */
//****************************************************************//
jQuery(document).ready(function($) {
    "use strict";
    $('.download_icon_audio').click(function(event) {
        var audio_id = $(this).data('audio_id');
        var audio_element = $('#'+audio_id);
        // starting audio
        $('.download_icon_audio').removeClass('download_icon_pause').addClass('download_icon_play');
        $('audio').trigger('pause');
        audio_element.toggleClass('active');
        if(audio_element.hasClass('active')){
            $(this).text('pause').removeClass('download_icon_play').addClass('download_icon_pause');  
            $('audio').removeClass('active');
            audio_element.addClass('active');
            audio_element.get(0).play();
            //audio_element.trigger('play');
        } else {
            $(this).text('play').removeClass('download_icon_pause').addClass('download_icon_play'); 
            audio_element.trigger('pause');
        }
    });

    $('.download_icon_video').on('click',function(event) {
        /* Act on the event */
        $('.popup_container_video').css('display', 'block');
        var $this = $(this).parent('.download_container_video').find('.container_product_video').html();
        $('.popup_container_video').html($this);
    });

    $('.popup_container_video').on('click','.close_video',function(event) {
        /* Act on the event */
       $(this).parents('.popup_container_video').empty().css('display', 'none');; 
        var iframe = $(this).parents('.popup_container_video').find('iframe');
        var video = $(this).parents('.popup_container_video').find('video');
        var object = $(this).parents('.popup_container_video').find('object');
        if ( iframe ) {
             var src= $(iframe).attr('src');
            $(iframe).attr('src',src); 
        }else if (video){
            video.trigger('pause');
        }else if(object){
        	 $(this).parents('.popup_container_video').empty(); 
        }
    });

    //show - hide of price option to create box ;
    $('.edd_download_buy_button').hide();
    $('.price_option').click(function(event) {
        /* Act on the event */
        $(this).parent('div').find('.edd_download_buy_button').show();
    });
    $('.close_option').click(function(event) {
        /* Act on the event */
        $(this).parent('.edd_download_buy_button').hide();
    });
    $('.container_header_cart').on('click', '.header_cart', function(event) {
        event.preventDefault();
        $('.edd-cart').toggle(1000);
        /* Act on the event */
    });
	
	
});