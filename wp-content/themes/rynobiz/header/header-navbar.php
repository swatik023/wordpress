<?php 
$HeaderLink = get_theme_mod('header_btn_link','');
$HeaderbtnText = get_theme_mod('button_title','');
?>
<header class="site-header header-style-2 dark-version">
		<!-- middle header -->
		<div class="main-header-wrapper navbar-expand-lg">
			<div class="main-header clearfix">
				<!-- top bar -->
				<?php if ( is_active_sidebar( 'top-header-left' ) || is_active_sidebar( 'top-header-right' )) { ?>
				<div class="top-bar">
					<div class="container">
						<div class="row d-flex justify-content-between">
						
						<?php if ( is_active_sidebar( 'top-header-left' ) ) { ?>
									<div class="col-sm-4 col-12 ce-top-bar-left">
										<?php dynamic_sidebar( 'top-header-left'); ?>
									</div>
								<?php } 
									if ( is_active_sidebar( 'top-header-right' ) ) { ?>
									<div class="col-sm-4 col-12 ce-top-bar-right">
										<?php dynamic_sidebar( 'top-header-right'); ?>
									</div>
									<?php } 
							
							
							if ( is_active_sidebar( 'top-header-social' ) ) { ?>
									<div class="col-sm-4 col-12 ce-top-bar-right">
										<?php dynamic_sidebar( 'top-header-social'); ?>
									</div>
									<?php } ?>
						</div>
					</div>
				</div>
				<?php } ?>
				<div class="sticky-header">
					<div class="container clearfix">
						<div class="ce-logo">
							<?php rynobiz_site_branding(); ?>
						</div>
						
						<div class="menu-area">
							<div class="d-flex justify-content-end align-items-center">
								<button class="navbar-toggler justify-content-between collapsed" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="<?php esc_attr_e( 'Toggle navigation', 'rynobiz' ); ?>">
				                    <span class="fa fa-bars" aria-hidden="true"></span>
				                </button>
				                <ul class="extra-nav d-block d-lg-none">
		                             <li>
		                                <a href="javascript:void(0);" class="searchBar">
		                                    <i class="fa fa-search" aria-hidden="true"></i>
		                                    <div class="searchField">
												<form role="search" class="search-form" action="<?php echo esc_url(home_url('/'));?>">
													<input type="text" name="s" class="form-control" placeholder="<?php  esc_attr_e('Type here','rynobiz');?>">
												</form>
			                                </div>
		                                </a>
		                            </li>
									
									
									<?php //if ( class_exists( 'WooCommerce' ) ) { ?>
									  <li class="d-sm-inline d-none">
										<a href="#" class="default-button button-sm bg-blue effect-1 quote-btn">
											<span class="btn-text"><?php _e('Start a Project','rynobiz');?></span>
										</a>
										</li>
										<?php // } ?>
									
		                        </ul>
							</div>
				            <nav class="navbar-collapse collapse mainmenu justify-content-between" id="navbarNavDropdown">
			                    <?php
												   wp_nav_menu(
												array(
													'theme_location'  => 'primary',
													'container'  => 'nav-collapse collapse navbar-inverse-collapse',
													'menu_class' => 'nav navbar-nav',
													'fallback_cb'     => 'Consultera_Bootstrap_Navwalker::fallback',
													'walker'          => new Consultera_Bootstrap_Navwalker(),
												)
											);
										?>
			                    <ul class="extra-nav d-none d-lg-block">
		                           <li>
		                                <a href="javascript:void(0);" class="searchBar">
		                                    <i class="fa fa-search" aria-hidden="true"></i>
		                                </a>
		                                <div class="searchField">
											<form role="search" class="search-form" action="<?php echo esc_url(home_url('/'));?>">
												<input type="text" name="s" class="form-control" placeholder="<?php  esc_attr_e('Type here','rynobiz');?>">
											</form>
		                                </div>
		                            </li>
									<?php if($HeaderbtnText!=""){?>
									<li>
		                                <a href="<?php echo esc_url($HeaderLink); ?>" class="default-button button-sm bg-blue effect-1 quote-btn">
											<span class="btn-text"><?php echo esc_html($HeaderbtnText);?></span>
										</a>
		                            </li>
									<?php }?>
		                        </ul>
				            </nav>
						</div>
					</div>
				</div>
			</div>
		</div>
		<!-- main header END -->
	</header>
<?php

