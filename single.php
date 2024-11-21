<?php
/*
** single.php
** mk_build_main_wrapper : builds the main divisions that contains the content. Located in framework/helpers/global.php
** mk_get_view gets the parts of the pages, modules and components. Function located in framework/helpers/global.php
*/

get_header(); ?>
<?php 				
$u_time = get_the_time('U'); 
$u_modified_time = get_the_modified_time('U');
?>
<? include(locate_template('loop-templates/content-article-schema.php')); ?>
<div class="grid">
	<div class="flex">
		<main class="post-content">
			<article>
				
				<? include(locate_template('loop-templates/content-update-banner.php')); ?>
				
				
				<div class="categories"><?php echo get_the_category_list(' | '); ?></div>
			  	<div class="blog-title"><h1 class="blog-single-title"><?php the_title(); ?></h1></div>
				<div class="blog-date">
					<?php 

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
				<? include(locate_template('loop-templates/content-featured-image.php')); ?>
				<? include(locate_template('loop-templates/content-affiliate.php')); ?>
				<? include(locate_template('loop-templates/content-update-notice.php')); ?>

				<div class="main-content" id="main-content">

				<? // check if the flexible content field has rows of data
					if ( have_rows( 'flexible_layouts', $id ) ) :

						    // loop through the selected ACF layouts and display the matching partial
						    while ( have_rows( 'flexible_layouts', $id ) ) : the_row();

    								get_template_part( 'partials/flexible-layouts/' . get_row_layout() );

						endwhile;

					elseif ( get_the_content() ) :

						the_content();

					endif; ?>

					<?php if( get_field('faq') ): ?>
				<div class="faq__wrapper">
				<script type="application/ld+json">{
				"@context": "https://schema.org",
				  "@type": "FAQPage",
				 "mainEntity": [
				 <?php $faq_repeater = get_field('faq_repeater');
				 $last_row = end($faq_repeater);
				 $last_row_title = $last_row['faq_title'];?>
				 <?php if( have_rows('faq_repeater') ): ?>
					<?php while( have_rows('faq_repeater') ): the_row(); ?>
					<?php $faq_title = get_sub_field('faq_title'); ?>
					 {"@type": "Question",
					"name":"<?php echo $faq_title;?>",
					 "acceptedAnswer": {
					  "@type": "Answer",
					  "text": "<?php the_sub_field('faq_body');?>"
					  }
					  } <?php if( $last_row_title !== $faq_title ){ echo ','; } ?>
					<?php endwhile; endif; ?>
					]
					}
				</script>
				<h2 id="<? echo $hypenated_name ?>-faqs"><?php the_title();?> FAQs</h2>
					<?php if( have_rows('faq_repeater') ): ?>
					<?php while( have_rows('faq_repeater') ): the_row(); ?>
					<h3><?php the_sub_field('faq_title');?></h3>
					<p><?php the_sub_field('faq_body');?></p>
					<?php endwhile; endif; ?>
				</div>
				<? if(get_field('conclusion')): the_field('conclusion'); endif; ?>	
				<?php endif; ?>
					
					<?php if ( get_field('short_blurb') ) { 
						$score = get_field_object('score');
						$value = $score['value'];
						$label = $score['choices'][ $value ];?>
						<div class="product-spotlight-rating" style="background-image: url(<?php the_field('image'); ?>);">
							<div class="score-internal">
								<div class="score">
									<div class="score-number">
										<?php echo $value; ?>/5
									</div>	
								</div>
								<div class="score_text"><?php echo $label;  ?></div>
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
			</article>
		</main>
	  	<aside class="sidebar left <?php if (get_field('sortable') === true) {?> sortable-sidebar <?php } ?>">
	  		<?php $enable_toc_builder = get_field('enable_table_of_contents_builder');
	  		if($enable_toc_builder):
	  			if ( have_rows( 'table_of_contents_builder' ) ) : ?>
	  				<div id="ez-toc-container" class="ez-toc-v2_0_17 ez-toc-wrap-right counter-hierarchy ez-toc-grey">
									<div class="ez-toc-title-container">
										<p class="ez-toc-title">Table of Contents</p>
									</div>
									<nav>
										<ul class="ez-toc-list ez-toc-list-level-1">
					    			<? while ( have_rows( 'table_of_contents_builder' ) ) : the_row();?>
											<li class="ez-toc-page-1 ez-toc-heading-level-2"><a class="ez-toc-link ez-toc-heading-1" href="#<? the_sub_field('heading_id'); ?>"><? the_sub_field('heading'); ?></a>
											<? if ( have_rows( 'subheading_repeater' ) ) : ?>
												<ul class="ez-toc-list-level-3">
												<? while ( have_rows( 'subheading_repeater' ) ) : the_row();?>
													<li class="ez-toc-heading-level-3"><a class="ez-toc-link ez-toc-heading-7" href="#<? the_sub_field('subheading_id'); ?>"><? the_sub_field('subheading'); ?></a></li>	
												<? endwhile; ?>
												</ul>
												</li>
											<? endif; ?>
			    					<? endwhile; ?>
										</ul>
									</nav>
								</div>
			    <? endif;
  			else: ?>
			<? echo do_shortcode( '[ez-toc]' ); 
	  		endif;?>
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
		</aside>
	</div>


<?php 

comments_template(); 

?> 

</div>

<?php


get_footer();
?>