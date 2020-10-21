<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package dashy
 */

 $fwidgetscount=0;
 $total_widgets = wp_get_sidebars_widgets();
 

$fotterclasses="";
if ($fwidgetscount==1) {
    $fotterclasses="rpl-xl-12 rpl-md-6 rpl-sm-12 footer-widget-item";
}
if ($fwidgetscount==2) {
    $fotterclasses="rpl-xl-6 rpl-md-6 rpl-sm-12 footer-widget-item";
} if ($fwidgetscount==3) {
    $fotterclasses="rpl-xl-4 rpl-md-6 rpl-sm-12 footer-widget-item";
} if ($fwidgetscount==4) {
    $fotterclasses="rpl-xl-3 rpl-md-6 rpl-sm-12 footer-widget-item";
}



?>



<footer class="site-footer is-bg">
    <div class="footer-in">
        <div class="container">
            <div class='row'>
                <?php
            {?>
                <div class="<?php echo esc_html($fotterclasses) ?>">

                    <?php dynamic_sidebar('footer-1'); ?>


                </div>
                <?php }?>
                <?php
            {?>
                <div class="<?php echo esc_html($fotterclasses) ?>">

                    <?php dynamic_sidebar('footer-2'); ?>


                </div>
                <?php }?>
                <?php
           {?>
                <div class="<?php echo esc_html($fotterclasses) ?>">

                    <?php dynamic_sidebar('footer-3'); ?>


                </div>
                <?php }?>
                <?php
           {?>
                <div class="<?php echo esc_html($fotterclasses) ?>">

                    <?php dynamic_sidebar('footer-4'); ?>


                </div>
                <?php }?>

            </div>

        </div>

    </div>
    <div class="site-info">
        <div class="container">
            <div class="siteinfo-text">

                <?php
               echo wp_kses_post(dashy_get_option('dashy_footer_copyright')) ;
                ?>



                <?php
                echo wp_kses_post(dashy_get_option('dashy_footer_poweredby')) ;

                ?>


            </div>
        </div>
    </div>

</footer>


<?php wp_footer() ?>

</div>
 </p>
                                  

</body>

</html>