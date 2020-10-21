<?php
/**
 * Add admin notice
*/

add_action( 'admin_notices', 'rynobiz_admin_notice'  );
add_action( 'wp_ajax_dismiss_admin_notice', 'rynobiz_dismiss_admin_notice' );
add_action( 'admin_enqueue_scripts', 'rynobiz_welcome_static'  );

 
function rynobiz_admin_notice() {
	if ( is_admin() && ! get_user_meta( get_current_user_id(), 'rynobiz_welcome_box' ) ) {
		?>
		
		
		
		<div class="updated notice is-dismissible rynobiz-admin-notice" data-notice="rynobiz_welcome_box">
			<h1><?php
			$theme_info = wp_get_theme();
			printf( esc_html__('Congratulations, Welcome to %1$s Theme', 'rynobiz'), esc_html( $theme_info->Name ), esc_html( $theme_info->Version ) ); ?>
			</h1>
			<p><?php echo sprintf( esc_html__("Thank you for choosing rynobiz theme. To take full advantage of the complete features of the theme, you have to go to our %1\$s welcome page %2\$s.", "rynobiz"), '<a href="' . esc_url( admin_url( 'themes.php?page=rynobiz-welcome' ) ) . '">', '</a>' ); ?></p>
			
			<p><a href="<?php echo esc_url( admin_url( 'themes.php?page=rynobiz-welcome' ) ); ?>" class="button button-blue-secondary button_info" style="text-decoration: none;"><?php echo esc_html__('Get started with rynobiz','rynobiz'); ?></a></p>
		</div>
		
		
		<?php
	}
}


/**
 * Dismiss admin notice
 */
function rynobiz_dismiss_admin_notice() {

	// Nonce check.
	check_ajax_referer( 'rynobiz_dismiss_admin_notice', 'nonce' );

	// Bail if user can't edit theme options.
	if ( ! current_user_can( 'edit_theme_options' ) ) {
		wp_send_json_error();
	}

	$notice = isset( $_POST['notice'] ) ? sanitize_text_field( wp_unslash( $_POST['notice'] ) ) : '';

	if ( $notice ) {
		update_user_meta( get_current_user_id(), $notice, true );
		wp_send_json_success();
	}

	wp_send_json_error();
}

/**
 * Load welcome screen script and css
 */
function rynobiz_welcome_static($hook) {
	
	
	
	if ( 'appearance_page_rynobiz-welcome' != $hook ) {
		
		// Dismiss admin notice.
	wp_enqueue_script(
		'rynobiz-dismiss-admin-notice',
		get_stylesheet_directory_uri() . '/inc/admin/js/dismiss-admin-notice.js',
		'1.0',
		true
	);
	
	

	wp_localize_script(
		'rynobiz-dismiss-admin-notice',
		'rynobiz_dismiss_admin_notice',
		array(
			'nonce' => wp_create_nonce( 'rynobiz_dismiss_admin_notice' ),
		)
	);
       
    }else {
		
		wp_enqueue_script(
		'rynobiz-install-demo',
		get_stylesheet_directory_uri() . '/inc/admin/js/install-demo.js',
		array('updates'),
		'1.0',
		true
	);
	
	// Dismiss admin notice.
	wp_enqueue_script(
		'rynobiz-dismiss-admin-notice',
		get_stylesheet_directory_uri() . '/inc/admin/js/dismiss-admin-notice.js',
		'1.0',
		true
	);
	
	

	wp_localize_script(
		'rynobiz-dismiss-admin-notice',
		'rynobiz_dismiss_admin_notice',
		array(
			'nonce' => wp_create_nonce( 'rynobiz_dismiss_admin_notice' ),
		)
	);

	// Welcome screen style.
	wp_enqueue_style('rynobiz-admin-styles', get_stylesheet_directory_uri().'/inc/admin/css/rynobiz-welcome.css');
	}
	
	

}



add_action('admin_menu', 'rynobiz_welcome_page');


// rynobiz welcome page register
function rynobiz_welcome_page() {
	$wpazure_page_title =  apply_filters( 'rynobiz_menu_page_title', __( 'Rynobiz Options', 'rynobiz' ) );
    add_theme_page('rynobiz Theme Options', $wpazure_page_title, 'edit_theme_options', 'rynobiz-welcome', 'rynobiz_settings_page');
}

function rynobiz_settings_page(){
	?>
  <div class="rynobiz-admin wrap">
  	<?php	do_action( 'rynobiz_settings_content' ); ?>
  </div><!-- /.wrap -->
  <?php
}


/**
 * Customizer settings link
 */
function rynobiz_info_customizer_settings() {
	$customizer_settings = apply_filters(
		'rynobiz_panel_customizer_settings',
		array(
			'upload_logo' => array(
				'icon'     => 'dashicons dashicons-format-image',
				'name'     => __( 'Upload Logo', 'rynobiz' ),
				'type'     => 'control',
				'setting'  => 'custom_logo',
				'required' => '',
			),
			
			'home_section' => array(
				'icon'     => 'dashicons dashicons-admin-settings',
				'name'     => __( 'Home section settings', 'rynobiz' ),
				'type'     => 'panel',
				'setting'  => 'homepage_sections',
				'required' => '',
			),
			
			'widget' => array(
				'icon'     => 'dashicons dashicons-tagcloud',
				'name'     => __( 'Widgets', 'rynobiz' ),
				'type'     => 'section',
				'setting'  => 'sidebar-widgets-top-header-left',
				'required' => '',
			),
		)
	);

	return $customizer_settings;
}


add_action( 'rynobiz_settings_content', 'rynobiz_welcome_render_options_page' );

function rynobiz_welcome_render_options_page() {  

$rynobiz_url = 'https://wpazure.com';
			?>
	<div class="rynobiz-options-wrap admin-welcome-screen">


				<div class="rynobiz-enhance">
					<div class="rynobiz-info-container">
						<div class="rynobiz-enhance-content">
							<div class="rynobiz-enhance__column rynobiz-bundle">
								<h3><?php esc_html_e( 'Link to Customizer Settings', 'rynobiz' ); ?></h3>
								<div class="rynobiz-quick-setting-section">
									<ul class="rynobiz-list">
									<?php
									foreach ( rynobiz_info_customizer_settings() as $key ) {
										$url = get_admin_url() . 'customize.php?autofocus[' . $key['type'] . ']=' . $key['setting'];

										$disabled = '';
										$title    = '';
										if ( '' !== $key['required'] && ! class_exists( $key['required'] ) ) {
											$disabled = 'disabled';

											/* translators: 1: Class name */
											$title = sprintf( __( '%s not activated.', 'rynobiz' ), ucfirst( $key['required'] ) );

											$url = '#';
										}
										?>

										<li class="link-to-customie-item <?php echo esc_attr( $disabled ); ?>" title="<?php echo esc_attr( $title ); ?>">
											<a class="wst-quick-setting-title wp-ui-text-highlight" href="<?php echo esc_url( $url ); ?>" target="_blank" rel="noopener">
												<span class="<?php echo esc_attr( $key['icon'] ); ?>"></span>
												<?php echo esc_html( $key['name'] ); ?>
											</a>
										</li>

									<?php } ?>
									</ul>
									
									
								</div>
							</div>

								
						</div>

						<div class="rynobiz-enhance-sidebar">
							<?php do_action( 'rynobiz_pro_panel_sidebar' ); ?>

							<div class="rynobiz-enhance__column">
								<h3><?php esc_html_e( 'About Theme', 'rynobiz' ); ?></h3>

								<div class="rynobiz-quick-setting-section">
									<img src="<?php echo esc_url(  get_stylesheet_directory_uri(). '/images/banner.jpg' ); ?>" alt="rynobiz Banner" />

									<p>
										<?php esc_html_e( 'Rynobiz is a modern,responsive and fully customizable lightning fast WordPress theme for professionals. This theme comes with a stunning COOL & BEAUTIFUL LOOK, SERVICE SECTION, PORTFOLIO SECTION, TESTIMONIAL SECTION, WOOCOMMERCE PRODUCT SECTION, CALL TO ACTION SECTION, BLOG POST SECTION. ', 'rynobiz' ); ?>
									</p>

									<a href="<?php echo esc_url( admin_url( 'customize.php' ) ); ?>" class="rynobiz-button button-primary " target="_blank"><?php echo esc_html__( 'Go to customizer', 'rynobiz' ); ?></a>
		
								</div>
							</div>
							
							<div class="rynobiz-enhance__column">
								<h3><?php esc_html_e( 'Recommend Plugins', 'rynobiz' ); ?></h3>
								
								
								<?php
									$plugin_slug = 'wpazure-kit';
									$slug        = 'wpazure-kit/wpazure-kit.php';
									$redirect    = admin_url( 'admin.php?page=rynobiz-welcome' );
									$nonce       = add_query_arg(
										array(
											'action'        => 'activate',
											'plugin'        => rawurlencode( $slug ),
											'plugin_status' => 'all',
											'paged'         => '1',
											'_wpnonce'      => wp_create_nonce( 'activate-plugin_' . $slug ),
										),
										network_admin_url( 'plugins.php' )
									);

									// Check rynobiz Sites status.
									$type = 'install';
									if ( file_exists( ABSPATH . 'wp-content/plugins/' . $plugin_slug ) ) {
										$activate = is_plugin_active( $plugin_slug . '/wpazure-kit.php' ) ? 'activate' : 'deactivate';
										$type = $activate;
									}

									
									$button = '<a href="' . esc_url( admin_url( 'customize.php' ) ) . '" class="rynobiz-button " target="_blank">' . esc_html__( 'Plugin activated', 'rynobiz' ) . '</a>';

									
									if ( ! defined( 'WPAZURE_KIT_VERSION' ) ) {
										if ( 'deactivate' == $type ) {
											$button = '<a data-redirect="' . esc_url( $redirect ) . '" data-slug="' . esc_attr( $slug ) . '" class="rynobiz-button button rynobiz-active-now" href="' . esc_url( $nonce ) . '">' . esc_html__( 'Activate', 'rynobiz' ) . '</a>';
										} else {
											$button = '<a data-redirect="' . esc_url( $redirect ) . '" data-slug="' . esc_attr( $plugin_slug ) . '" href="' . esc_url( $nonce ) . '" class="rynobiz-button install-now button rynobiz-install-demo">' . esc_html__( 'Install Wpazure kit', 'rynobiz' ) . '</a>';
										}
									}

									// Data.
									wp_localize_script(
										'rynobiz-install-demo',
										'rynobiz_install_demo',
										array(
											'activating' => esc_html__( 'Activating', 'rynobiz' ),
										)
									);
									?>
									<div class="rynobiz-quick-setting-section">
										<p>
											<?php echo $button; // WPCS: XSS ok. ?>
										</p>
									</div>

								
							</div>

							
							
							
						</div>
					</div>
				</div>
			</div>
	
<?php }
