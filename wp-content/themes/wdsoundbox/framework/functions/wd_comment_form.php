<?php
	if(!function_exists ('soundbax_comment_form')){
		function soundbax_comment_form( $args = array(), $post_id = null ) {
			global $user_identity, $id;

			if ( null === $post_id )
				$post_id = $id;
			else
				$id = $post_id;

			$commenter = wp_get_current_commenter();
			$req = get_option( 'require_name_email' );
			$aria_req = ( $req ? " aria-required='true'" : '' );
			$defaut = array(
				'comment_author'		=>	esc_html__('Name*','wdsoundbox'),
				'comment_author_email'	=>	esc_html__('Email*','wdsoundbox'),
				'comment_author_url'	=>	esc_html__('Website','wdsoundbox')	
			);
			extract($defaut,EXTR_OVERWRITE);
			extract(array_filter(array(
				'comment_author'		=>	esc_attr($commenter['comment_author']),
				'comment_author_email'	=>	esc_attr($commenter['comment_author_email']),
				'comment_author_url'	=>	esc_attr($commenter['comment_author_url'])
			)),EXTR_OVERWRITE);
			
			$fields =  array(
				'author' => '<div class="col"><p class="comment-form-author">' . '<input id="author" placeholder="'.esc_attr__('Your name', 'wdsoundbox').'" class="input-text" name="author" type="text"  data-default="'.$defaut['comment_author'].'" size="30"' . $aria_req . ' />' .'</p></div>',
				'email'  => '<div class="col"><p class="comment-form-email"><input id="email" class="input-text" name="email" type="text" placeholder="'.esc_attr__('Your email', 'wdsoundbox').'" size="30"' . $aria_req . ' data-default="'.$defaut['comment_author_email'].'"/>'.'</p></div>',
				'url'    => '<div class="col"><p class="comment-form-url"><input id="url" class="input-text" name="url" type="text"  placeholder="'.esc_attr__('Website', 'wdsoundbox').'" size="30" data-default="'.$defaut['comment_author_url'].'"/>' .'</p></div>',
			);
			
			if( !is_user_logged_in() ){
				$fields['author'] = '<div class="comment-author-wrapper">'.$fields['author'];
				$fields['url'] = $fields['url'].'</div>';
			}

			$required_text = sprintf( ' ' . wp_kses(__('Required fields are marked %s','wdsoundbox'), array()), '<span class="required">*</span>' );
			$defaults = array(
				'fields'               => apply_filters( 'comment_form_default_fields', $fields ),
				'comment_field'        => '<p class="comment-form-comment"><textarea id="comment" placeholder="'.esc_attr__('Your message', 'wdsoundbox').'" name="comment" cols="45" rows="8" aria-required="true"></textarea></p>',
				'must_log_in'          => '<p class="must-log-in">' .  sprintf(__( 'You must be <a href="%s">logged in</a> to post a comment.','wdsoundbox' ), wp_login_url( apply_filters( 'the_permalink', get_permalink( $post_id ) ) ) ) . '</p>',
				'logged_in_as'         => '<p class="logged-in-as">' . sprintf(__( 'Logged in as <a href="%1$s">%2$s</a>. <a href="%3$s" title="Log out of this account">Log out?</a>','wdsoundbox'), admin_url( 'profile.php' ), $user_identity, wp_logout_url( apply_filters( 'the_permalink', get_permalink( $post_id ) ) ) ) . '</p>',
				'comment_notes_before' => '',
				'comment_notes_after'  => '',
				'id_form'              => 'commentform',
				'id_submit'            => 'submit',
				'title_reply'          => esc_html__( 'Be first to comment','wdsoundbox' ),
				'title_reply_to'       => esc_html__( 'Leave a Reply to %s','wdsoundbox'),
				'cancel_reply_link'    => esc_html__( 'Cancel reply','wdsoundbox' ),
				'label_submit'         => esc_html__( 'POST COMMENT','wdsoundbox' ),
				//'label_infomation'	   => esc_html__('Please note comments must be approved before they are published','wdsoundbox')
			);
			
			if( !is_user_logged_in() ){
				$defaults['comment_field'] = '<div class="comment-message-wrapper">'.$defaults['comment_field'].'</div>';
			}

			$args = wp_parse_args( $args, apply_filters( 'comment_form_defaults', $defaults ) );

			?>
				<?php if ( comments_open() ) : ?>
					<?php do_action( 'comment_form_before' ); ?>
					<div id="respond">
						<div class="wd_title_respond"><h3 id="reply-title" class="heading-title"><?php comment_form_title( $args['title_reply'], $args['title_reply_to'] ); ?> <small><?php cancel_comment_reply_link( $args['cancel_reply_link'] ); ?></small></h3></div>
						
						<!--<p class="info"><?php //echo esc_attr( $args['label_infomation'] ); ?></p>-->
						
						<?php  ?>
						<?php if ( get_option( 'comment_registration' ) && !is_user_logged_in() ) : ?>
							<?php echo esc_attr($args['must_log_in']); ?>
							<?php do_action( 'comment_form_must_log_in_after' ); ?>
						<?php else : ?>
							<form action="<?php echo site_url( '/wp-comments-post.php' ); ?>" method="post" id="<?php echo esc_attr( $args['id_form'] ); ?>">
								<?php do_action( 'comment_form_top' ); ?>
								<?php if ( is_user_logged_in() ) : ?>
									<?php echo apply_filters( 'comment_form_logged_in', $args['logged_in_as'], $commenter, $user_identity ); ?>
									<?php do_action( 'comment_form_logged_in_after', $commenter, $user_identity ); ?>
								<?php else : ?>
									<?php echo esc_attr($args['comment_notes_before']); ?>
									<?php
									do_action( 'comment_form_before_fields' );
									foreach ( (array) $args['fields'] as $name => $field ) {
										echo apply_filters( "comment_form_field_{$name}", $field ) . "\n";
									}
									
									?>
								<?php endif; ?>
								<?php echo apply_filters( 'comment_form_field_comment', $args['comment_field'] ); ?>
								<?php echo esc_attr($args['comment_notes_after']); ?>
								<?php if ( !is_user_logged_in() ) do_action( 'comment_form_after_fields' );?>
								<p class="form-submit">
									<button class="button" type="submit" id="<?php echo esc_attr( $args['id_submit'] ); ?>"><span><span><?php echo esc_attr( $args['label_submit'] ); ?></span></span></button>

									<?php comment_id_fields( $post_id ); ?>
								</p>
								<?php do_action( 'comment_form', $post_id ); ?>
							</form>
						<?php endif; ?>
					</div><!-- #respond -->
					<?php do_action( 'comment_form_after' ); ?>
				<?php else : ?>
					<?php do_action( 'comment_form_comments_closed' ); ?>
				<?php endif; ?>
			<?php
		} // End Function
	} // End If
?>