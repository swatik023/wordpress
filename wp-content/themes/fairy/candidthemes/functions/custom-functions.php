<?php
if (!function_exists('fairy_social_menu')) {
    /**
     * Add social icons menu
     *
     * @since 1.0.0
     *
     */
    function fairy_social_menu()
    {
        if (has_nav_menu('social-menu')) :
        wp_nav_menu(array(
            'theme_location' => 'social-menu',
            'container' => 'ul',
            'menu_class' => 'social-menu'
        ));
        endif;
    }
}


if (!function_exists('fairy_custom_body_class')) {
    /**
     * Add sidebar class in body
     *
     * @since 1.0.0
     *
     */
    function fairy_custom_body_class($classes)
    {
        global $fairy_theme_options;
        if( $fairy_theme_options['fairy-enable-sticky-sidebar'] == 1){
            $classes[] = 'ct-sticky-sidebar';
        }

        return $classes;
    }
}

add_filter('body_class', 'fairy_custom_body_class');



if ( !function_exists('fairy_excerpt_more') ) :
    /**
     * Remove ... From Excerpt
     *
     * @since 1.0.0
     */
    function fairy_excerpt_more( $more ) {
        if(!is_admin() ){
            return '';
        }
    }
endif;
add_filter('excerpt_more', 'fairy_excerpt_more');


if ( !function_exists('fairy_alter_excerpt') ) :
    /**
     * Filter to change excerpt length size
     *
     * @since 1.0.0
     */
    function fairy_alter_excerpt( $length ){
        if(is_admin() ){
            return $length;
        }
        global $fairy_theme_options;
        $excerpt_length = $fairy_theme_options['fairy-excerpt-length'];
        if( !empty( $excerpt_length ) ){
            return absint($excerpt_length);
        }
        return 25;
    }
endif;
add_filter('excerpt_length', 'fairy_alter_excerpt');


if (!function_exists('fairy_tag_cloud_widget')) :
    /**
     * Function to modify tag clouds font size
     *
     * @param none
     * @return array $args
     *
     * @since 1.0.0
     *
     */
    function fairy_tag_cloud_widget($args)
    {
        $args['largest'] = 0.9; //largest tag
        $args['smallest'] = 0.9; //smallest tag
        $args['unit'] = 'rem'; //tag font unit
        return $args;
    }
endif;
add_filter('widget_tag_cloud_args', 'fairy_tag_cloud_widget');