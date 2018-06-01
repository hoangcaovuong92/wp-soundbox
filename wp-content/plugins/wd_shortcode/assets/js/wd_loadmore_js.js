jQuery.noConflict();
jQuery( document ).ready( function($) {
	$(document).on ( 'click', '.btn_loadmore_product', function( event ) {
		event.preventDefault();
		var post_type = 'product'; // this is optional and can be set from anywhere, stored in mockup etc...
		var _this 					= $(this);
		var select_item_parent  	= _this.parents('.wd-wrapper-parents-value');
		var select_content_item 	= select_item_parent.find('.wd-products-wrapper').find('.products');
		var offset_begin 			= select_content_item.children().length;

		var offset = offset_begin;
		var posts_per_page 		= document.getElementById('tvlgiao_number_loadmore').value;
		var tvlgiao_id_category = select_item_parent.find('#tvlgiao_id_category').val();
		var tvlgiao_data_show 	= document.getElementById('tvlgiao_data_show').value;
		$.ajax({
			url: ajax_object.ajax_url,
			type: 'post',
			data: {
				action: 'load_more',
				query_vars: ajax_object.query_vars,
				offset:offset, 
				post_type:post_type,
				posts_per_page:posts_per_page,
				category_id: tvlgiao_id_category,
				data_show: tvlgiao_data_show
			},

			beforeSend: function(data) {
				$("#show_image_loading").css({ display: "block" });
			},
			success: function( response ) {
				$("#show_image_loading").css({ display: "none" });
				select_content_item.append(response);
				if (document.getElementById('tvlgiao_have_post') !=null) {
					var wd_status = select_item_parent.find('#tvlgiao_have_post').val();
					if(wd_status == 1){
						_this.removeClass('btn_loadmore_product').addClass('btn_end_load_more').html('END OF POSTS');
					}
				}

			}
		});
	});

	$(document).on ( 'click', '.btn_loadmore_blog', function( event ) {
		event.preventDefault();
		var post_type = 'post'; // this is optional and can be set from anywhere, stored in mockup etc...
		var offset_begin = $('.wd-shortcode-special-blog .wd-load-more-content-blog').length;
		var offset = offset_begin;
		var posts_per_page 					= document.getElementById('tvlgiao_blog_number_loadmore').value;
		var tvlgiao_id_category 			= document.getElementById('tvlgiao_blog_id_category').value;
		var tvlgiao_data_show 				= document.getElementById('tvlgiao_blog_data_show').value;
		var tvlgiao_columns 				= document.getElementById('tvlgiao_blog_columns').value;
		var tvlgiao_show_data_image_slider 	= document.getElementById('tvlgiao_blog_show_data_image_slider').value;
		var tvlgiao_show_gird_list 			= document.getElementById('tvlgiao_blog_show_gird_list').value;
		$.ajax({
			url: blog_ajax_object.ajax_url_blog,
			type: 'post',
			data: {
				action: 'load_more_blog',
				query_vars: ajax_object.query_vars,
				offset:offset, 
				post_type:post_type,
				posts_per_page:posts_per_page,
				category_id: tvlgiao_id_category,
				data_show: tvlgiao_data_show,
				columns : tvlgiao_columns,
				show_data_image_slider: tvlgiao_show_data_image_slider, 
				show_gird_list: tvlgiao_show_gird_list,
			},

			beforeSend: function(data) {
				$("#show_image_loading").css({ display: "block" });
			},
			success: function( response ) {
				$("#show_image_loading").css({ display: "none" });
				$( '.wd-shortcode-special-blog' ).append(response);
				if (document.getElementById('tvlgiao_have_post') !=null) {
					var wd_status = document.getElementById('tvlgiao_have_post').value;
					if(wd_status == 1){
						$("#loadmore a").removeClass('btn_loadmore_product').addClass('btn_end_load_more').html('END OF POSTS');
					}
				}

			}
		});
	});
});