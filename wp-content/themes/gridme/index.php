<?php
/**
* The main template file.
*
* This is the most generic template file in a WordPress theme
* and one of the two required files for a theme (the other being style.css).
* It is used to display a page when nothing more specific matches a query.
* E.g., it puts together the home page when no home.php file exists.
*
* @link https://developer.wordpress.org/themes/basics/template-hierarchy/
*
* @package GridMe WordPress Theme
* @copyright Copyright (C) 2020 ThemesDNA
* @license http://www.gnu.org/licenses/gpl-2.0.html GNU/GPLv2 or later
* @author ThemesDNA <themesdna@gmail.com>
*/

get_header(); ?>
<?php echo do_shortcode('[metaslider id="78"]'); ?>

<div class="gridme-main-wrapper clearfix" id="gridme-main-wrapper" itemscope="itemscope" itemtype="http://schema.org/Blog" role="main">
<div class="theiaStickySidebar">
<div class="gridme-main-wrapper-inside clearfix">

<?php gridme_before_main_content(); ?>



<?php gridme_after_main_content(); ?>

</div>
</div>
</div><!-- /#gridme-main-wrapper -->

<?php get_sidebar(); ?>

<?php get_footer(); ?>