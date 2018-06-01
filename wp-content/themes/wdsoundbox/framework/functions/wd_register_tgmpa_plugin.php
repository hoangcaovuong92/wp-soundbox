<?php
	if(!function_exists ('wdsoundbox_register_tgmpa_plugin')){
		function wdsoundbox_register_tgmpa_plugin(){
            $wdsoundbox_plugins = array(
                array(
                    'name'                  => esc_html__('WPBakery Visual Composer', 'wdsoundbox'), // The plugin name
                    'slug'                  => 'js_composer', // The plugin slug (typically the folder name)
                    'source'                => TVLGIAO_WPDANCE_THEME_FRAMEWORK_URI.'/plugins/js_composer.zip', // The plugin source
                    'required'              => true, // If false, the plugin is only 'recommended' instead of required
                    'version'               => '5.0.1', // E.g. 1.0.0. If set, the active plugin must be this version or higher, otherwise a notice is presented
                    'force_activation'      => false, // If true, plugin is activated upon theme activation and cannot be deactivated until theme switch
                    'force_deactivation'    => false, // If true, plugin is deactivated upon theme switch, useful for theme-specific plugins
                    'external_url'          => '', // If set, overrides default API URL and points to an external URL
                ),
                array(
                    'name'                  => esc_html__('Revolution Slider', 'wdsoundbox'), // The plugin name
                    'slug'                  => 'revslider', // The plugin slug (typically the folder name)
                    'source'                => TVLGIAO_WPDANCE_THEME_FRAMEWORK_URI.'/plugins/revslider.zip', // The plugin source
                    'required'              => true, // If false, the plugin is only 'recommended' instead of required
                    'version'               => '5.3.1.5', // E.g. 1.0.0. If set, the active plugin must be this version or higher, otherwise a notice is presented
                    'force_activation'      => false, // If true, plugin is activated upon theme activation and cannot be deactivated until theme switch
                    'force_deactivation'    => false, // If true, plugin is deactivated upon theme switch, useful for theme-specific plugins
                    'external_url'          => '', // If set, overrides default API URL and points to an external URL
                ),
                array(
                    'name'                  => esc_html__('Ubermenu', 'wdsoundbox'), // The plugin name
                    'slug'                  => 'ubermenu', // The plugin slug (typically the folder name)
                    'source'                => TVLGIAO_WPDANCE_THEME_FRAMEWORK_URI.'/plugins/ubermenu.zip', // The plugin source
                    'required'              => true, // If false, the plugin is only 'recommended' instead of required
                    'version'               => '3.2.1.1', // E.g. 1.0.0. If set, the active plugin must be this version or higher, otherwise a notice is presented
                    'force_activation'      => false, // If true, plugin is activated upon theme activation and cannot be deactivated until theme switch
                    'force_deactivation'    => false, // If true, plugin is deactivated upon theme switch, useful for theme-specific plugins
                    'external_url'          => '', // If set, overrides default API URL and points to an external URL
                ),
                array(
                    'name'                  => esc_html__('WD Portfolio', 'wdsoundbox'), // The plugin name
                    'slug'                  => 'wd_portfolio', // The plugin slug (typically the folder name)
                    'source'                => TVLGIAO_WPDANCE_THEME_FRAMEWORK_URI.'/plugins/wd_portfolio.zip', // The plugin source
                    'required'              => true, // If false, the plugin is only 'recommended' instead of required
                    'version'               => '1.0.1', // E.g. 1.0.0. If set, the active plugin must be this version or higher, otherwise a notice is presented
                    'force_activation'      => false, // If true, plugin is activated upon theme activation and cannot be deactivated until theme switch
                    'force_deactivation'    => false, // If true, plugin is deactivated upon theme switch, useful for theme-specific plugins
                    'external_url'          => '', // If set, overrides default API URL and points to an external URL
                ),
                 array(
                    'name'                  => esc_html__('WD ShortCode', 'wdsoundbox'), // The plugin name
                    'slug'                  => 'wd_shortcode', // The plugin slug (typically the folder name)
                    'source'                => TVLGIAO_WPDANCE_THEME_FRAMEWORK_URI.'/plugins/wd_shortcode.zip', // The plugin source
                    'required'              => true, // If false, the plugin is only 'recommended' instead of required
                    'version'               => '1.0.0', // E.g. 1.0.0. If set, the active plugin must be this version or higher, otherwise a notice is presented
                    'force_activation'      => false, // If true, plugin is activated upon theme activation and cannot be deactivated until theme switch
                    'force_deactivation'    => false, // If true, plugin is deactivated upon theme switch, useful for theme-specific plugins
                    'external_url'          => '', // If set, overrides default API URL and points to an external URL
                ),
                  array(
                    'name'                  => esc_html__('WD ShortCode Blog', 'wdsoundbox'), // The plugin name
                    'slug'                  => 'wd_shortcode_blog', // The plugin slug (typically the folder name)
                    'source'                => TVLGIAO_WPDANCE_THEME_FRAMEWORK_URI.'/plugins/wd_shortcode_blog.zip', // The plugin source
                    'required'              => true, // If false, the plugin is only 'recommended' instead of required
                    'version'               => '2.0.1', // E.g. 1.0.0. If set, the active plugin must be this version or higher, otherwise a notice is presented
                    'force_activation'      => false, // If true, plugin is activated upon theme activation and cannot be deactivated until theme switch
                    'force_deactivation'    => false, // If true, plugin is deactivated upon theme switch, useful for theme-specific plugins
                    'external_url'          => '', // If set, overrides default API URL and points to an external URL
                ),
                  array(
                    'name'                  => esc_html__('WD Team', 'wdsoundbox'), // The plugin name
                    'slug'                  => 'wd_team', // The plugin slug (typically the folder name)
                    'source'                => TVLGIAO_WPDANCE_THEME_FRAMEWORK_URI.'/plugins/wd_team.zip', // The plugin source
                    'required'              => true, // If false, the plugin is only 'recommended' instead of required
                    'version'               => '1.0', // E.g. 1.0.0. If set, the active plugin must be this version or higher, otherwise a notice is presented
                    'force_activation'      => false, // If true, plugin is activated upon theme activation and cannot be deactivated until theme switch
                    'force_deactivation'    => false, // If true, plugin is deactivated upon theme switch, useful for theme-specific plugins
                    'external_url'          => '', // If set, overrides default API URL and points to an external URL
                ),
                array(
                    'name'                  => esc_html__('Contact Form 7', 'wdsoundbox'), // The plugin name
                    'slug'                  => 'contact-form-7', // The plugin slug (typically the folder name)
                    'required'              => true, // If false, the plugin is only 'recommended' instead of required
                ),
                array(
                    'name'                  => esc_html__('Easy Digital Downloads', 'wdsoundbox'), // The plugin name
                    'slug'                  => 'easy-digital-downloads', // The plugin slug (typically the folder name)
                    'required'              => true, // If false, the plugin is only 'recommended' instead of required
                ),
                array(
                    'name'                  => esc_html__('EDD Downloads As Services', 'wdsoundbox'), // The plugin name
                    'slug'                  => 'edd-downloads-as-services', // The plugin slug (typically the folder name)
                    'required'              => true, // If false, the plugin is only 'recommended' instead of required
                ),
                array(
                    'name'                  => esc_html__('Features', 'wdsoundbox'), // The plugin name
                    'slug'                  => 'features-by-woothemes', // The plugin slug (typically the folder name)
                    'required'              => true, // If false, the plugin is only 'recommended' instead of required
                ),
                array(
                    'name'                  => esc_html__('WP Instagram Widget', 'wdsoundbox'), // The plugin name
                    'slug'                  => 'wp-instagram-widget', // The plugin slug (typically the folder name)
                    'required'              => true, // If false, the plugin is only 'recommended' instead of required
                ),
                array(
                    'name'                  => esc_html__('Testimonials by WooThemes', 'wdsoundbox'), // The plugin name
                    'slug'                  => 'testimonials-by-woothemes', // The plugin slug (typically the folder name)
                    'required'              => true, // If false, the plugin is only 'recommended' instead of required
                )
    		); //End plugins
            $wdsoundbox_config = array(
                'default_path'      => '',
                'menu'              => 'tgmpa-install-plugins',
                'has_notices'       => true,
                'dismissable'       => true,
                'dismiss_msg'       => '',
                'is_automatic'      => false,
                'message'           => '',
                'strings' => array(
                    'page_title'                        => esc_html__('Install Required Plugins', 'wdsoundbox'),
                    'menu_title'                        => esc_html__('Install Plugins', 'wdsoundbox'),
                    'installing'                        => esc_html__('Installing Plugin: %s', 'wdsoundbox'),
                    'oops'                              => esc_html__('Something went wrong with the plugin API.', 'wdsoundbox'),
                    'notice_can_install_required'       => _n_noop('This theme requires the following plugin: %1$s.', 'This theme requires the following plugins: %1$s.','wdsoundbox'),
                    'notice_can_install_recommended'    => _n_noop('This theme recommends the following plugin: %1$s.', 'This theme recommends the following plugins: %1$s.','wdsoundbox'),
                    'notice_cannot_install'             => _n_noop('Sorry, but you do not have the correct permissions to install the %s plugin. Contact the administrator of this site for help on getting the plugin installed.', 'Sorry, but you do not have the correct permissions to install the %s plugins. Contact the administrator of this site for help on getting the plugins installed.','wdsoundbox'),
                    'notice_can_activate_required'      => _n_noop('The following required plugin is currently inactive: %1$s.', 'The following required plugins are currently inactive: %1$s.','wdsoundbox'),
                    'notice_can_activate_recommended'   => _n_noop('The following recommended plugin is currently inactive: %1$s.', 'The following recommended plugins are currently inactive: %1$s.','wdsoundbox'),
                    'notice_cannot_activate'            => _n_noop('Sorry, but you do not have the correct permissions to activate the %s plugin. Contact the administrator of this site for help on getting the plugin activated.', 'Sorry, but you do not have the correct permissions to activate the %s plugins. Contact the administrator of this site for help on getting the plugins activated.','wdsoundbox'),
                    'notice_ask_to_update'              => _n_noop('The following plugin needs to be updated to its latest version to ensure maximum compatibility with this theme: %1$s.', 'The following plugins need to be updated to their latest version to ensure maximum compatibility with this theme: %1$s.','wdsoundbox'),
                    'notice_cannot_update'              => _n_noop('Sorry, but you do not have the correct permissions to update the %s plugin. Contact the administrator of this site for help on getting the plugin updated.', 'Sorry, but you do not have the correct permissions to update the %s plugins. Contact the administrator of this site for help on getting the plugins updated.','wdsoundbox'),
                    'install_link'                      => _n_noop('Begin installing plugin', 'Begin installing plugins','wdsoundbox'),
                    'activate_link'                     => _n_noop('Begin activating plugin', 'Begin activating plugins','wdsoundbox'),
                    'return'                            => esc_html__('Return to Required Plugins Installer', 'wdsoundbox'),
                    'plugin_activated'                  => esc_html__('Plugin activated successfully.', 'wdsoundbox'),
                    'complete'                          => esc_html__('All plugins installed and activated successfully. %s', 'wdsoundbox'),
                    'nag_type'                          => 'updated'
                )
            );
            tgmpa($wdsoundbox_plugins, $wdsoundbox_config);
		}
	}
	//Register Tgmpa Plugin
	add_action('tgmpa_register', 'wdsoundbox_register_tgmpa_plugin');
?>