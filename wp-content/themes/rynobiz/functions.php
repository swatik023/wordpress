<?php
function rynobiz_css() {
	
	wp_enqueue_style( 'consultera-parent-style', get_template_directory_uri() . '/style.css' );
	wp_enqueue_style( 'rynobiz-style', get_stylesheet_uri(), array( 'consultera-parent-style' ));
	
	wp_enqueue_style('rynobiz-color-default',get_stylesheet_directory_uri() .'/css/default.css');
	wp_dequeue_style('consultera-color-default');
	
	wp_enqueue_script('rynobiz-js',get_stylesheet_directory_uri() .'/js/custom-rynobiz.js');
}
add_action( 'wp_enqueue_scripts', 'rynobiz_css',999);


if ( is_admin() ) {

 require_once( get_stylesheet_directory(). '/inc/admin/rynobiz-welcome.php' );
 }
 
 
 if(!function_exists('Rynobiz_setup')):
	function Rynobiz_setup()
	{
		
		/**
		 * Add support for two custom navigation menus.
		 */
		register_nav_menus( array(
			'primary'   => esc_html__( 'Primary Menu', 'rynobiz' ),
			'footer'   => esc_html__( 'Footer Menu', 'rynobiz' ),
		) );
		
	}
endif;
add_action('after_setup_theme','Rynobiz_setup');
 
 
 
 
 
 
/**
 * Get the comments
 */

if ( ! function_exists( 'rynobiz_get_comments_number' ) ) :
	/**
	 * Prints HTML with the comment count for the current post.
	 */
	function rynobiz_get_comments_number() {
		
		echo '<li class="post-comment"> <i class="fa fa-comment" aria-hidden="true"></i>';
	$comment_count = get_comments_number();
	if ( '1' === $comment_count ) {
		esc_html_e( '1 ', 'rynobiz' );
	} else {
		
		
		printf(
					/* translators: 1: Number of comments, 2: Post title. */
					_nx(
						'%1$s reply',
						'%1$s replies ',
						$comment_count,
						'comments title',
						'rynobiz'
					),
					number_format_i18n( $comment_count )
					
				);
		
		
		
	}
	echo '</li>';
		
	}
endif;
   	

/**
 * All categories
 */
if ( ! function_exists( 'rynobiz_all_categories' ) ) :
function rynobiz_all_categories() {
	$Separate_meta = ', ';
	$categories_list = get_the_category_list($Separate_meta);

	if ( $categories_list ) {
		echo '<li class="post-category"><i class="fa fa-folder-open" aria-hidden="true"></i> ' . $categories_list . '</li>';
	}
}
endif;

/**
* Blog post meta post by 
*/
if ( ! function_exists( 'rynobiz_posted_by' ) ) :
	/**
	 * Prints HTML with meta information for the current author.
	 */
	function rynobiz_posted_by() {
		$byline = sprintf(
			/* translators: %s: post author. */
			esc_html_x( 'By %s', 'post author', 'rynobiz' ),
			'<a class="author" href="' . esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ) . '">' . esc_html( get_the_author() ) . '</a>'
		);

		echo '<li class="post-author">' . $byline ;
		_e(' At ','rynobiz');
		echo get_the_time().' </li>'; // WPCS: XSS OK.
	}
endif;





/**
 * Post author
 */
if ( ! function_exists( 'rynobiz_post_author_image' ) ) :
function rynobiz_post_author_image() {
	
	
		echo '<li class="post-author-image">'.get_avatar( get_the_author_meta( 'ID' ), 32, '', '' , $args = array( 'class' => array( 'img-fluid ', 'author-img' ) )).'</li>';
	
}
endif;

function rynobiz_widgets_init(){
register_sidebar(
				array(
					'name'          => esc_html__( 'Top header right social', 'rynobiz' ),
					'id'            => 'top-header-social',
					'description'   => '',
					'before_widget' => '<div id="%1$s" class="widget %2$s">',
					'after_widget'  => '</div>',
					'before_title'  => '<h2 class="widget-title">',
					'after_title'   => '</h2>',
				)
			
		);
		
}

add_action( 'widgets_init', 'rynobiz_widgets_init' );




/**
 * Before Footer 
 */
function rynobiz_footer_before(){
	do_action( 'rynobiz_footer_before' );
}

/**
 * widget Footer 
 */
function rynobiz_footer(){
	do_action( 'rynobiz_footer' );
}

/**
 * After Footer 
 */
function rynobiz_footer_after(){
	do_action( 'rynobiz_footer_after' );
}

/**
 * Scroll to top button 
 */
function rynobiz_scroll_to_top(){
	do_action( 'rynobiz_scroll_to_top' );
}

/**
 * Function to get site Footer
 */
if ( ! function_exists( 'rynobiz_footer_markup' ) ) {

	/**
	 * Site Footer - <footer>
	 */
	function rynobiz_footer_markup() { ?>
		
		<!-- FOOTER SECTION START -->
		<footer class="main-footer">
			<div class="container">
				<div class="row">
					<?php if ( is_active_sidebar( 'footer-widget-1' ) ) : ?>
					<div class="col-md-4 col-12">
						<?php dynamic_sidebar( 'footer-widget-1' ); ?>	
					</div>
					<?php endif; 
					if ( is_active_sidebar( 'footer-widget-2' ) ) : ?>
					<div class="col-md-4 col-12">
						<?php dynamic_sidebar( 'footer-widget-2' ); ?>	
					</div>
					<?php endif; 
					if ( is_active_sidebar( 'footer-widget-3' ) ) : ?>
					<div class="col-md-4 col-12">
						<?php dynamic_sidebar( 'footer-widget-3' ); ?>	
					</div>
					<?php endif; ?>
				</div>
				<!-- #Footer bottom section -->
				
				
				
				
				<!-- End of Footer bottom -->
			</div>
			<div class="copyright-wrapper copyright-bar">
				<div class="container">
					<div class="row">
						<div class="col-md-6 col-xs-12 copyright-bar-left">
							
							<a href="<?php echo esc_url( __( 'https://wordpress.org/', 'rynobiz' ) ); ?>">
								<?php
								/* translators: placeholder replaced with string */
								printf( esc_html__( 'Proudly powered by %s', 'rynobiz' ), 'WordPress' );
								?>
							</a>
							<span class="sep"> | </span>
							<?php
							/* translators: placeholder replaced with string */
							printf( esc_html__( 'Theme: %1$s by %2$s.', 'rynobiz' ), 'rynobiz', '<a href="' . esc_url( __( 'https://wpazure.com/', 'rynobiz' ) ) . '" rel="designer">Wpazure</a>' );
							?>		
				
						</div>
						<div class="col-md-6 col-xs-12 copyright-bar-right mt-md-0 mt-3">
							<?php
												   wp_nav_menu(
												array(
													'theme_location'  => 'footer',
													'container'  => '',
													'menu_class' => '',
													'fallback_cb'     => 'Consultera_Bootstrap_Navwalker::fallback',
													'walker'          => new Consultera_Bootstrap_Navwalker(),
												)
											);
										?>
						</div>
					</div>
				</div>
			</div>
		</footer>
		<!-- FOOTER SECTION END -->
		
	<?php }

}

add_action( 'rynobiz_footer', 'rynobiz_footer_markup' );


 
/**
 * Site branding
 */
if ( !function_exists( 'rynobiz_site_branding' ) ) {
	function rynobiz_site_branding()
	{
		if ( has_custom_logo() ) :
				the_custom_logo();
		else : ?>
			
				
					<a class="custom-logo-link"href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?>
					</a>
			
			<?php
				$description = get_bloginfo( 'description', 'display' );
				if ( $description || is_customize_preview() ) : ?>
					<p class="site-description"><?php echo esc_html($description); ?></p><?php 
				endif;?>
			
			<?php
		
		endif;
	}
}



add_filter('get_custom_logo','rynobiz_logo_class');

function rynobiz_logo_class($html)
{
$html = str_replace('custom-logo-link', 'navbar-brand', $html);
return $html;
}



function rynobiz_homepage_section_setting( $wp_customize ) {
	$selective_refresh = isset( $wp_customize->selective_refresh ) ? 'postMessage' : 'refresh';
	
	
	/* Header Section */
	$wp_customize->add_panel( 'header_sections', array(
		'priority' => 97,
		'capability' => 'edit_theme_options',
		'title' => __('Header section settings', 'rynobiz'),
	) );

	
	/* Slider Section */
	$wp_customize->add_section( 'menu_right_section' , array(
		'title'      => __('Menu Right section', 'rynobiz'),
		'panel'  => 'header_sections',
		'priority'   => 1,
   	) );
		
		
		// Link title
		$wp_customize->add_setting( 'button_title',array(
		'default' => __('Start a Project','rynobiz'),
		'sanitize_callback' => 'rynobiz_header_section_sanitize_text',
		'transport'         => $selective_refresh,
		));	
		$wp_customize->add_control( 'button_title',array(
		'label'   => __('Button Label','rynobiz'),
		'section' => 'menu_right_section',
		'type' => 'text',
		));	
	
		// Link title
		$wp_customize->add_setting( 'header_btn_link',array(
		'sanitize_callback' => 'esc_url_raw',
		'transport'         => $selective_refresh,
		));	
		$wp_customize->add_control( 'header_btn_link',array(
		'label'   => __('Link','rynobiz'),
		'section' => 'menu_right_section',
		'type' => 'text',
		));	
		
		
	}
	add_action( 'customize_register', 'rynobiz_homepage_section_setting' );
	
	
	
	function rynobiz_register_header_section_partials( $wp_customize ){

		
		
		$wp_customize->selective_refresh->add_partial( 'button_title', array(
			'selector'            => '.extra-nav .quote-btn',
			'settings'            => 'button_title',
			'render_callback'  => 'rynobiz_header_section_btn_text_render_callback',
		
		) );
		
		$wp_customize->selective_refresh->add_partial( 'header_btn_link', array(
			'selector'            => '.extra-nav .quote-btn',
			'settings'            => 'header_btn_link',
			'render_callback'  => 'rynobiz_header_section_btn_link_render_callback',
		
		) );
		
		
	}

	add_action( 'customize_register', 'rynobiz_register_header_section_partials' );



function rynobiz_header_section_btn_text_render_callback() {
		return esc_html(get_theme_mod( 'button_title' ));
	}

	function rynobiz_header_section_btn_link_render_callback() {
		return esc_url(get_theme_mod( 'header_btn_link' ));
	}
	
//Sanatize text validation
	if ( ! function_exists( 'rynobiz_header_section_sanitize_text' ) ) :
		function rynobiz_header_section_sanitize_text( $input ) {

				return wp_kses_post( force_balance_tags( $input ) );
		}
	endif;
	
function rynobiz_theme_setup() {
	add_theme_support( 'starter-content', array(
		'options' => array(
			'button_title' => __('Start a Project','rynobiz'),
			'header_btn_link' => '#',
		),
	) );
}
add_action( 'after_setup_theme', 'rynobiz_theme_setup' );
	