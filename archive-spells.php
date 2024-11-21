<?php 

get_header();

// WP_Query arguments
$args = array(
    'post_type'              => array('post'), // use any for any kind of post type, custom post type slug for custom post type
    'post__in'            => array('12965'), // Also support: pending, draft, auto-draft, future, private, inherit, trash, any
);
 
// The Query
$query = new WP_Query($args);?>
<div class="grid">
<?php 
// The Loop
if ($query->have_posts()) :
    while ($query->have_posts()) :
        $query->the_post();?>
			<div class="flex">
				<main class="post-content">
					<div class="categories"><?php echo get_the_category_list(' | '); ?></div>
				  	<div class="blog-title"><h1 class="blog-single-title"><?php the_title(); ?></h1></div>
					<div class="blog-date">
						<?php 
						
						$u_time = get_the_time('U'); 
						$u_modified_time = get_the_modified_time('U');

							echo "<p>Published on ";
							echo the_time('F j, Y');

						if ($u_modified_time >= $u_time + 86400) { 
							echo ", Last modified on ";
							echo the_modified_time('F jS, Y');
						} 

						echo"</p>"; 

						?>
						
					</div>
				  	<div class="blog-excerpt">
					    <?php 
				    	if ( ! has_excerpt() ) {
						    echo '';
						} else { 
						    the_excerpt();
						}
					    ?>
				  	</div>
					<div class="blog-featured-image">	
						<?php the_post_thumbnail('blog'); ?>
						<div class="credit">
						<?php 
							$name_of_artist = get_field('name_of_artist');
							$name_of_the_rights_holder = get_field('name_of_the_rights_holder');
							$the_title_of_the_art = get_field('the_title_of_the_art');

							if( $name_of_artist ) { ?>
								<p class="arist-name"><?php echo $name_of_artist; ?> - <?php echo $name_of_the_rights_holder; ?> - <?php echo $the_title_of_the_art; ?></p>
						<?php } ?>
						</div>	
					</div>
					<div class="affiliate">Arcane Eye may earn a small commission from affiliate links in this article. <a href="/privacy-policy/">Learn more.</a></div>
					<div class="main-content" id="main-content">

						<?php the_content() ?>

						<?php if ( get_field('score') ) { ?>
							<div class="product-spotlight-rating" style="background-image: url(<?php the_field('image'); ?>);">
								<div class="score-internal">
									<div class="score">
										<div class="score-number">
											<?php the_field('score'); ?>
										</div>	
									</div>
									<div class="score_text"><?php the_field('score_text'); ?></div>
									<div class="short_blurb"><?php the_field('short_blurb'); ?></div>
									<div class="buy-button"><a class="button" href="<?php the_field('buy_button_link'); ?>"><?php the_field('buy_button_text'); ?></a></div>
								</div>
							</div>
						<?php } ?>
						<?php get_template_part('template-parts/subscribe'); ?>
						<div id="author-info">
							<div id="author-avatar">
								<?php echo get_avatar( get_the_author_meta( 'ID' ), 150 ); ?>
							</div>
							<div id="author-description">
								<h3><?php the_author_link(); ?></h3>
								<?php the_author_meta('description'); ?>
						    </div>
						</div>
					</div>
				</main>
			  	<div class="sidebar left <?php if (get_field('sortable') === true) {?> sortable-sidebar <?php } ?>">
			  		<?php echo do_shortcode( '[toc]' ); ?>
			  			<div class="spotlight-holder">
		<?php get_template_part('loop-templates/content-sidebar-spotlight'); ?>
	</div>
					<?php if (get_field('sortable') === true) {?>
						<div class="controls-row">
							<ul id="controls">
								<?php 
								if( have_rows('category') ):
									while ( have_rows('category') ) : the_row();

										$name = get_sub_field('name');
										$control_cat_id = get_sub_field('control_cat_id');

										echo '	<li>
													<a class="fruit" data-fruit="'.$control_cat_id.'">'.$name.'</a>
												</li>';

									endwhile;
								endif;	
								?>
							</ul>
						</div>
					<?php }?>
				</div>
			</div>
		<?php 
	endwhile; 
	wp_reset_postdata(); 
endif;
comments_template(); ?> 
</div>

 
<?

get_footer();

?>