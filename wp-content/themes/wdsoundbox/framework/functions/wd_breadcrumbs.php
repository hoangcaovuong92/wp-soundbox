<?php 
/* 
	Show breadcrumbs with format : 
		Home » Category » Subcategory » Post Title
		Home » Subcategory » Post Title
		Home » Page Level 1 » Page Level 2 » Page Level 3
*/
if(!function_exists('soundbax_dimox_breadcrumbs')){
	function soundbax_dimox_breadcrumbs() {
	
		if( in_array( "woocommerce/woocommerce.php", apply_filters( 'active_plugins', get_option( 'active_plugins' ) ) ) ){
			if( function_exists('woocommerce_breadcrumb') && function_exists('is_woocommerce') && is_woocommerce() ){
				woocommerce_breadcrumb();
				return;
			}
		}
 
		wp_reset_postdata();
		$delimiter = '<span class="brn_arrow"><i class="fa fa-angle-right"></i></span>';
	  
		$front_id = get_option( 'page_on_front' );
		if ( !empty( $front_id ) ) {
			$home = get_the_title( $front_id );
		} else {
			$home = esc_html__( 'Home', 'wdsoundbox' );
		}
		$ar_title = array(
					'search' 		=> esc_html__('Search results for ','wdsoundbox')
					,'404' 			=> esc_html__('Error 404','wdsoundbox')
					,'tagged' 		=> esc_html__('Tagged ','wdsoundbox')
					,'author' 		=> esc_html__('Articles posted by ','wdsoundbox')
					,'page' 		=> esc_html__('Page','wdsoundbox')
					,'portfolio' 	=> esc_html__('Portfolio','wdsoundbox')
					);
	  
		$before = '<span class="current">'; // tag before the current crumb
		$after = '</span>'; // tag after the current crumb
		global $wp_rewrite;
		$rewriteUrl = $wp_rewrite->using_permalinks();
		if ( !is_home() && !is_front_page() || is_paged() ) {
	 
			echo '<div id="crumbs">';
	 
			global $post;
			$homeLink = home_url(); //get_bloginfo('url');
			echo '<a href="' . $homeLink . '">' . $home . '</a> ' . $delimiter . ' ';
	 
		if ( is_category() ) {
			global $wp_query;
			$cat_obj = $wp_query->get_queried_object();
			$thisCat = $cat_obj->term_id;
			$thisCat = get_category($thisCat);
			$parentCat = get_category($thisCat->parent);
			if ($thisCat->parent != 0) echo(get_category_parents($parentCat, TRUE, ' ' . $delimiter . ' '));
				echo wp_kses_post($before . single_cat_title('', false) . $after);
	 
		}
		elseif ( is_search() ) {
			echo wp_kses_post($before . $ar_title['search'] . '"' . get_search_query() . '"' . $after);
	 
		}elseif ( is_day() ) {
			echo '<a href="' . get_year_link(get_the_time('Y')) . '">' . get_the_time('Y') . '</a> ' . $delimiter . ' ';
			echo '<a href="' . get_month_link(get_the_time('Y'),get_the_time('m')) . '">' . get_the_time('F') . '</a> ' . $delimiter . ' ';
			echo wp_kses_post($before . get_the_time('d') . $after);
	 
		} elseif ( is_month() ) {
			echo '<a href="' . get_year_link(get_the_time('Y')) . '">' . get_the_time('Y') . '</a> ' . $delimiter . ' ';
			echo wp_kses_post($before . get_the_time('F') . $after);
	 
		} elseif ( is_year() ) {
			echo wp_kses_post($before . get_the_time('Y') . $after);
	 
		} elseif ( is_single() && !is_attachment() ) {
			if ( get_post_type() != 'post' ) {
				$post_type = get_post_type_object(get_post_type());
				$slug = $post_type->rewrite;
				$post_type_name = $post_type->labels->singular_name;
			if(strcmp('Portfolio Item',$post_type->labels->singular_name)==0){
				$post_type_name = $ar_title['portfolio'];
			}
			if($rewriteUrl){
				echo '<a href="' . $homeLink . '/' . $slug['slug'] . '/">' . $post_type_name . '</a> ' . $delimiter . ' ';
			}else{
				echo '<a href="' . $homeLink . '/?post_type=' . get_post_type() . '">' . $post_type_name . '</a> ' . $delimiter . ' ';
			}
			
			echo wp_kses_post($before . get_the_title() . $after);
		  } else {
			$cat = get_the_category(); $cat = $cat[0];
			echo get_category_parents($cat, TRUE, ' ' . $delimiter . ' ');
			echo wp_kses_post($before . get_the_title() . $after);
		  }
	 
		} elseif ( !is_single() && !is_page() && get_post_type() != 'post' && !is_404() ) {
			$post_type = get_post_type_object(get_post_type());
			if ( is_tax() ) {
		        $term = get_queried_object();
		        if ( $term ) {
		            $tax   = get_taxonomy( $term->taxonomy );
		            $title = single_term_title( );
		            echo wp_kses_post($before . $title . $after);
		        }
            }
			elseif(isset($post_type)){
				$slug = $post_type->rewrite;
				$post_type_name = $post_type->labels->singular_name;
			  	if(strcmp('Portfolio Item',$post_type->labels->singular_name)==0){
					$post_type_name = $ar_title['portfolio'];
			  	}
			  	echo wp_kses_post($before . $post_type_name . $after);
		  	} // check type post
		  	
			if ( is_tag() ) {
				echo wp_kses_post($before . $ar_title['tagged'] . '"' . single_tag_title('', false) . '"' . $after);
		 
			}elseif(is_taxonomy_hierarchical(get_query_var('taxonomy'))){
				$curTaxanomy = get_query_var('taxonomy');
				$curTerm = get_query_var( 'term' );
				$termNow = get_term_by( "name",$curTerm, $curTaxanomy);
				$pushPrintArr = array();
				if( $termNow !== false ){
					while ((int)$termNow->parent != 0){
						$parentTerm = get_term((int)$termNow->parent,get_query_var('taxonomy'));
						array_push($pushPrintArr,'<a href="' . get_term_link((int)$parentTerm->term_id,$curTaxanomy) . '">' . $parentTerm->name . '</a> ' . $delimiter . ' ');
						$curTerm = $parentTerm->name;
						$termNow = get_term_by( "name",$curTerm, $curTaxanomy);
					}
				}
				$pushPrintArr = array_reverse($pushPrintArr);
				array_push($pushPrintArr,$before  . get_term_by( 'slug', get_query_var( 'term' ), get_query_var( 'taxonomy' ) )->name  . $after);
				echo implode($pushPrintArr);
			}
		} elseif ( is_attachment() ) {
			if( (int)$post->post_parent > 0 ){
				$parent = get_post($post->post_parent);
				$cat = get_the_category($parent->ID);
				if( count($cat) > 0 ){
					$cat = $cat[0];
					echo get_category_parents($cat, TRUE, ' ' . $delimiter . ' ');
				}
				echo '<a href="' . get_permalink($parent) . '">' . $parent->post_title . '</a> ' . $delimiter . ' ';
			}
			echo wp_kses_post($before . get_the_title() . $after);
		} elseif ( is_page() && !$post->post_parent ) {
			echo wp_kses_post($before . get_the_title() . $after);
	 
		} elseif ( is_page() && $post->post_parent ) {
			$parent_id  = $post->post_parent;
			$breadcrumbs = array();
			while ($parent_id) {
				$page = get_post($parent_id);
				$breadcrumbs[] = '<a href="' . get_permalink($page->ID) . '">' . get_the_title($page->ID) . '</a>';
				$parent_id  = $page->post_parent;
		  }
		  $breadcrumbs = array_reverse($breadcrumbs);
		  foreach ($breadcrumbs as $crumb) echo wp_kses_post($crumb . ' ' . $delimiter . ' ');
		  echo wp_kses_post($before . get_the_title() . $after);
	 
		} elseif ( is_tag() ) {
			echo wp_kses_post($before . $ar_title['tagged'] . '"' . single_tag_title('', false) . '"' . $after);
	 
		} elseif ( is_author() ) {
			global $author;
			$userdata = get_userdata($author);
			echo wp_kses_post($before . $ar_title['author'] . $userdata->display_name . $after);
	 
		} elseif ( is_404() ) {
			echo wp_kses_post($before . $ar_title['404'] . $after);
		}
	 
		if ( get_query_var('paged') ) {
			if ( is_category() || is_day() || is_month() || is_year() || is_search() || is_tag() || is_author() || is_page_template() ||  is_post_type_archive() || is_archive() ) echo wp_kses_post($before .' (');
				echo wp_kses_post($ar_title['page'] . ' ' . get_query_var('paged'));
			if ( is_category() || is_day() || is_month() || is_year() || is_search() || is_tag() || is_author() || is_page_template() ||  is_post_type_archive() || is_archive() ) echo ')'. $after;
		}
		else{ 
			if ( get_query_var('page') ) {
				if ( is_category() || is_day() || is_month() || is_year() || is_search() || is_tag() || is_author() || is_page_template() ||  is_post_type_archive() || is_archive() ) echo wp_kses_post($before .' (');
					echo wp_kses_post($ar_title['page'] . ' ' . get_query_var('page'));
				if ( is_category() || is_day() || is_month() || is_year() || is_search() || is_tag() || is_author() || is_page_template() ||  is_post_type_archive() || is_archive() ) echo ')'. $after;
			}
		}
		echo '</div>';
	 
	  }
		wp_reset_postdata();
	}
}

if(!function_exists("soundbax_show_breadcrumbs")){
    function soundbax_show_breadcrumbs(){
        soundbax_dimox_breadcrumbs(); 
    }
}