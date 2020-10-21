<?php
/**
 *  Fairy Single Page Option
 *
 * @since Fairy 1.0.0
 *
 */
/*Single Page Options*/
$wp_customize->add_section( 'fairy_single_page_section', array(
   'priority'       => 40,
   'capability'     => 'edit_theme_options',
   'theme_supports' => '',
   'title'          => __( 'Single Post Options', 'fairy' ),
   'panel' 		 => 'fairy_panel',
) );


/*Featured Image Option*/
$wp_customize->add_setting( 'fairy_options[fairy-single-page-featured-image]', array(
    'capability'        => 'edit_theme_options',
    'transport' => 'refresh',
    'default'           => $default['fairy-single-page-featured-image'],
    'sanitize_callback' => 'fairy_sanitize_checkbox'
) );
$wp_customize->add_control( 'fairy_options[fairy-single-page-featured-image]', array(
    'label'     => __( 'Enable Featured Image', 'fairy' ),
    'description' => __('You can hide or show featured image on single page.', 'fairy'),
    'section'   => 'fairy_single_page_section',
    'settings'  => 'fairy_options[fairy-single-page-featured-image]',
    'type'      => 'checkbox',
    'priority'  => 15,
) );

/*Related Post Options*/
$wp_customize->add_setting( 'fairy_options[fairy-single-page-related-posts]', array(
    'capability'        => 'edit_theme_options',
    'transport' => 'refresh',
    'default'           => $default['fairy-single-page-related-posts'],
    'sanitize_callback' => 'fairy_sanitize_checkbox'
) );
$wp_customize->add_control( 'fairy_options[fairy-single-page-related-posts]', array(
    'label'     => __( 'Enable Related Posts', 'fairy' ),
    'description' => __('3 Post from similar category will display at the end of the page.', 'fairy'),
    'section'   => 'fairy_single_page_section',
    'settings'  => 'fairy_options[fairy-single-page-related-posts]',
    'type'      => 'checkbox',
    'priority'  => 20,
) );
/*callback functions related posts*/
if ( !function_exists('fairy_related_post_callback') ) :
    function fairy_related_post_callback(){
        global $fairy_theme_options;
        if(isset($fairy_theme_options['fairy-single-page-related-posts'])){ 
        $related_posts = absint($fairy_theme_options['fairy-single-page-related-posts']);
        if( true == $related_posts ){
            return true;
        }
        else{
            return false;
        }
    }
    }
endif;
/*Related Post Title*/
$wp_customize->add_setting( 'fairy_options[fairy-single-page-related-posts-title]', array(
    'capability'        => 'edit_theme_options',
    'transport' => 'refresh',
    'default'           => $default['fairy-single-page-related-posts-title'],
    'sanitize_callback' => 'sanitize_text_field'
) );
$wp_customize->add_control( 'fairy_options[fairy-single-page-related-posts-title]', array(
    'label'     => __( 'Related Posts Title', 'fairy' ),
    'description' => __('Give the appropriate title for related posts', 'fairy'),
    'section'   => 'fairy_single_page_section',
    'settings'  => 'fairy_options[fairy-single-page-related-posts-title]',
    'type'      => 'text',
    'priority'  => 20,
    'active_callback'=>'fairy_related_post_callback'
) );