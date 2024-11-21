<?php

get_header();

?>
<?php 				
$u_time = get_the_time('U'); 
$u_modified_time = get_the_modified_time('U');
?>
<script type="application/ld+json">
    {
      "@context": "https://schema.org",
      "@type": "NewsArticle",
      "mainEntityOfPage": {
        "@type": "WebPage",
        "@id": "<?php the_permalink(); ?>"
      },
      "headline": "<?php the_title(); ?>",
      "image": [
        "<?php the_post_thumbnail_url(); ?> "
      ],
      "datePublished": "<?php echo the_time('Y-m-d h:i:s'); ?>",
      "dateModified": "<?php echo the_modified_time('Y-m-d h:i:s'); ?>",
      "author": {
        "@type": "Person",
        "name": "<?php the_author(); ?>"
      },
      "publisher": {
        "@type": "Organization",
        "name": "Arcane Eye",
        "logo": {
          "@type": "ImageObject",
          "url": "https://arcaneeyedev.flywheelstaging.com/wp-content/uploads/2020/05/istock-1050788020-1.svg"
        }
      }
    }
</script>
<div class="grid">
	<div class="flex">
		<main class="post-content">
			<article class="main-content">
			 	<div class="categories"><a href="/players/dnd-5e-races/">DnD 5e Races</a></div>
			  	<div class="blog-title"><h1 class="blog-single-title"><?php the_title(); ?> Guide 5e</h1></div>
				  <?php get_template_part('loop-templates/content-date-excerpt-thumbnail'); ?>
				<section>
					<h2 id="what_is_this_guide"><strong>What is this guide?</strong></h2>
					<p>This guide is meant to give you an idea of whether or not the <? echo strtolower(get_the_title()); ?> will be right for your 5e character build.</p>

					<p>The color code below has been implemented to help you identify, at a glance, how good that option will be for your <? echo strtolower(get_the_title()); ?>. This color coding isn’t a hard and fast rule; there are plenty of sub-optimized options out there that will be viable to your party and will be fun to play.</p>
					<ul>
					 	<li><span style="color: #000000;"><strong>Black</strong> is a trait shared by many races and or will not impact the effectiveness of your character build</span></li>
					 	<li><strong><span style="color: #ff0000;">Red</span> </strong>isn’t going to contribute to the effectiveness of your character build at all</li>
					 	<li><strong><span style="color: #ff6600;">Orange</span> </strong>Situationally good, but a below-average option otherwise</li>
					 	<li><strong><span style="color: #008000;">Green</span> </strong>is a good option</li>
					 	<li><strong><span style="color: #0000ff;">Blue</span> </strong>is a great option, you should strongly consider this option for your character</li>
					 	<li><span style="color: #00ccff;"><strong>Sky Blue</strong></span>&nbsp;is an amazing option. If you do not take this option your character would not be optimized</li>
					</ul>
				</section>
				<div class="tip">
				<h3>Tasha's Cauldron of Everything Update</h3>
				<p>Tasha's Cauldron of Everything has added the "Customizing Your Origin" option that may affect the ability score increases, languages, and proficiencies in this guide. To read more about this, visit our <a href="https://arcaneeye.com/players/dnd-5e-races/#Tasha%E2%80%99s_Cauldron_of_Everything_Update">D&D Race Guide</a>.</p>
				</div>
				<?php the_content(); ?>
				<section id="what_are_<? echo strtolower(get_the_title()); ?>">
					<h2>What are <? $plural = get_field('plural'); if($plural): echo $plural; else: the_title(); endif;?> in 5e?</h2>
					<section <? $sources = get_the_terms( $post->ID, 'source' ); 
							    $source = $sources[0]->slug;
							    if ($source):
							    	echo 'class="inline-source source ' . $source .'"';
						    	else:
					    			echo 'class="source"';
						    	endif;?>><p><em>Source: <?if ($source): echo $sources[0]->name; else: echo "Player's Handbook"; endif;?></em></p></section>
					<?php the_field('what_are'); ?>
				</section>
				<?php $traits = get_field('traits'); ?>
				<?php if($traits): ?>
				<section id="<? echo strtolower(get_the_title()); ?>_traits">
					<h2><? the_title(); ?> 5e Traits</h2>
					<?php echo $traits; ?>
				</section>
				<? endif; ?>
				
				<?
				    // Set up the base query args
				    $spell_query_args = array(
				        'post_type' => 'races',
				        'post_per_page' => -1,
				        'orderby' => 'title',
				        'order' => 'asc',
				        'nopaging' => true,
				        'posts_per_page' => -1,
				        'post_parent'    => $post->ID,
				        'order'          => 'ASC',
				        'orderby'        => 'menu_order title'
				    );

				      // Build the query
				      $spell_query = new WP_Query( $spell_query_args );

				      // Open the query loop
				      if ( $spell_query->have_posts() ) :?><section id="<? echo strtolower(get_the_title()); ?>_subraces"><h2><?php the_title(); ?> 5e Subraces</h2><? while ( $spell_query->have_posts() ) : $spell_query->the_post(); ?>
			      		<section id="<? $subrace_name_san = strtolower(get_the_title()); $subrace_name_san = preg_replace('/\s+/', '_', $subrace_name_san); echo $subrace_name_san; ?>" <?php 
							    $sources = get_the_terms( $post->ID, 'source' ); 
							    $source = $sources[0]->slug;
							    if ($source):
							    	echo 'class="subrace source ' . $source .'"';
						    	endif;
							  	?>><h3><?php the_title();?></h3>
				  			<? the_content();
				  			if( have_rows('spells_learned_list') ):?><ul> <?while( have_rows('spells_learned_list') ): the_row();?>
				  			<li><?the_sub_field('level');?></li>
			  			 		<? if( have_rows('spells_learned_repeater') ):?><ul><?while( have_rows('spells_learned_repeater') ): the_row();
			  			 			$change_ratingtext = get_sub_field('change_ratingtext');
									if ($change_ratingtext):
										$subrace_spell_rating = get_sub_field( 'rating'); 
										$subrace_spell_rating_text = get_sub_field( 'rating_text');
									endif;
									$spell_learned = get_sub_field('spells_learned_chooser');
										if( $spell_learned ): ?>
								        <?php include(locate_template('loop-templates/content-race-spell.php')); ?>
										<?php endif;
								  endwhile;?></ul><?endif;
							  endwhile;?></ul> <?endif; ?>
				  			</section></section><?


				      // Close the loop
				      endwhile; wp_reset_postdata(); endif;
				    
				?>
				</section>
				<section id="which_classes_work_with_<? echo strtolower(get_the_title()); ?>" class="class-ratings__wrapper">		
						<?php if( have_rows('class_rating') ): ?> <h2>Which 5e Classes Work With <? $plural = get_field('plural'); if($plural): echo $plural; else: the_title(); endif;?>?</h2>
						<? $which_classes_preview_text = get_field('which_classes_preview_text');
						if($which_classes_preview_text):
							echo '<p>' . $which_classes_preview_text . '</p>';
						endif;
						?>

						<?php while( have_rows('class_rating') ): the_row(); 
							if( have_rows('class') ): while( have_rows('class') ): the_row(); ?>
								<p><span class="

								<?php $rating = get_sub_field( 'rating' );  
								if( $rating ): 
									echo $rating->slug; 
								endif; ?>">

								<?php $class = get_sub_field('class');
								if( $class ):?>
								    <strong><a href="<?php echo get_permalink( $class->ID ); ?>"><?php echo esc_html( $class->post_title ); ?></a></strong><?php endif; ?></span>: <?php 
								echo get_sub_field('rating_text', false, false); ?>
								</p>

								<?
							    // Set up the base query args
							    $spell_query_args = array(
							        'post_type' => 'races',
							        'post_per_page' => -1,
							        'orderby' => 'title',
							        'order' => 'asc',
							        'nopaging' => true,
							        'posts_per_page' => -1,
							        'post_parent'    => $post->ID,
							        'order'          => 'ASC',
							        'orderby'        => 'menu_order title'
							    );

							      // Build the query
							      $spell_query = new WP_Query( $spell_query_args );

							      // Open the query loop
							      if ( $spell_query->have_posts() ) :?> <ul> <? while ( $spell_query->have_posts() ) : $spell_query->the_post(); 
								      	if( have_rows('class_rating') ): while( have_rows('class_rating') ): the_row();
								      		if( have_rows('class') ): while( have_rows('class') ): the_row();
												$subrace_class_check = get_sub_field('class');
												if ($subrace_class_check == $class) : ?>
								      				<li <?php 
												    $sources = get_the_terms( $post->ID, 'source' ); 
												    $source = $sources[0]-> slug;
												    if ($source):
												    	echo ' class="' . $source . '"';
											    	endif;
												  ?>><span class="<?php $rating = get_sub_field( 'rating' );  
													if( $rating ): 
														echo $rating->slug; 
													endif; ?>"><strong><?php the_title();?></strong></span>: <? the_sub_field('rating_text', false, false); ?></li>
													  			 
						      					<? endif;
										endwhile; endif;	
									endwhile; endif;
							      // Close the loop
							      endwhile; wp_reset_postdata();?> </ul> <?endif;

							endwhile; endif; 
						endwhile; endif;?>
					</section>
					<section id="sources">
					<? include(locate_template('loop-templates/content-sources.php')); ?>
					</section>
				
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
			</article>
		</main>
		<aside class="sidebar left">
			<div id="ez-toc-container" class="ez-toc-v2_0_17 ez-toc-wrap-right counter-hierarchy ez-toc-grey">
				<div class="ez-toc-title-container">
					<p class="ez-toc-title">Table of Contents</p>
				</div>
				<nav>
					<ul class="ez-toc-list ez-toc-list-level-1">
						<li class="ez-toc-page-1 ez-toc-heading-level-2"><a class="ez-toc-link ez-toc-heading-1" href="#what_is_this_guide">What is this guide?</a></li>
						<li class="ez-toc-page-1 ez-toc-heading-level-2"><a class="ez-toc-link ez-toc-heading-1" href="#what_are_<? echo strtolower(get_the_title()); ?>">What are <? $plural = get_field('plural'); if($plural): echo $plural; else: the_title(); endif;?>?</a></li>
						<?php if($traits): ?>
						<li class="ez-toc-page-1 ez-toc-heading-level-2"><a class="ez-toc-link ez-toc-heading-1" href="#<? echo strtolower(get_the_title()); ?>_traits"><? the_title();?> Traits</a></li>
						<?php endif; ?>
						<li class="ez-toc-page-1 ez-toc-heading-level-2"><a class="ez-toc-link ez-toc-heading-1" href="#which_classes_work_with_<? echo strtolower(get_the_title()); ?>"> Which Classes Work With <? if($plural): echo $plural; else: the_title(); endif;?>?</a></li>
						 <? if ( $spell_query->have_posts() ) :?><li class="ez-toc-page-1 ez-toc-heading-level-2"><a class="ez-toc-link ez-toc-heading-1" href="#<? echo strtolower(get_the_title()); ?>_subraces"><? the_title();?> Subraces</a>

						 <ul class="ez-toc-list-level-3"><? while ( $spell_query->have_posts() ) : $spell_query->the_post(); ?>
								<li class="ez-toc-heading-level-3"><a class="ez-toc-link ez-toc-heading-7" href="#<? $subrace_name_san = strtolower(get_the_title()); $subrace_name_san = preg_replace('/\s+/', '_', $subrace_name_san); echo $subrace_name_san; ?>"><? the_title(); ?></a></li>
							<? endwhile; ?>
							</ul></li>
						<? endif; ?>
						<li class="ez-toc-page-1 ez-toc-heading-level-2"><a class="ez-toc-link ez-toc-heading-1" href="#sources">Sources Used in This Guide</a></li>
					</ul>
				</nav>
			</div>
			<div class="spotlight-holder">
				<? include(locate_template('loop-templates/content-sidebar-spotlight.php')); ?>
			</div>
		</aside>
	</div>
<?php comments_template(); ?>
</div>
</div>
<?php  get_footer(); ?>