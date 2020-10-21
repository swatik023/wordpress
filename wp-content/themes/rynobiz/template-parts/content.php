<?php
/**
 * Template part for displaying posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Rynobiz
 */

?>

<div class="col-lg-4 col-md-6 col-sm-12 col-12">
		<div class="grid-box post-inner">
			<div class="post-img">
				<?php consultera_post_thumbnail();?>
			</div>
			<div class="post-info">
				<div class="entry-meta">
					<ul>
						<?php rynobiz_post_author_image();?>
						
					   
							<?php rynobiz_posted_by(); ?> 
						
					</ul>
				</div>
				<div class="entry-header">
					<h2 class="entry-title">
						<a href="<?php the_permalink(); ?>"><?php the_title();?></a>
					</h2>
				</div>
				<div class="entry-content">
					<?php the_content(__('Read More','rynobiz')); ?>
				</div>
			</div>
			<div class="entry-footer">
				<div class="entry-meta">
					<ul>
						<?php rynobiz_get_comments_number();
						consultera_posted_on();
						consultera_get_tags();
						rynobiz_all_categories();
						?>
						
					</ul>
				</div>
			</div>
		</div>
</div>

