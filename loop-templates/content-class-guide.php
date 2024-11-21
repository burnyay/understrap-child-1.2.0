<main class="post-content">
	<div class="main-content">
	  	<div class="blog-title">
	  		<h1 class="blog-single-title">D&#38;D <?php if (get_field('target_keyword')): echo get_field('target_keyword'); else: the_title(); endif; ?> 5e Guide</h1>
	  	</div>
			<?php get_template_part('loop-templates/content-date-excerpt-thumbnail'); ?>
    		<?php while ( have_posts() ):
				the_post();
				$id = get_the_ID();?>

				<?php 
				$intro = get_field('intro');
				if ($intro ): ?>
					<section>
					<? echo $intro; ?>
					</section>
				<? endif; ?>
				
				
				<section>
						<h2 id="what-is-this-guide"><? the_title(); ?> 5e Guide Rating Scheme</h2>
						<p>This guide is meant as a deep dive into the DnD 5e <?php echo strtolower(get_the_title());?>. For a quick overview of other 5e classes, check out our <a href="/dm-tools-5e/dnd-5e-classes/">Guide to DnD 5e Classes</a>.</p>

						<p>The color code below has been implemented to help you identify, at a glance, how good that option will be for your <?php echo strtolower(get_the_title());?>. This color coding isn’t a hard and fast rule; there are plenty of sub-optimized options out there that will be viable to your party and will be fun to play.</p>
						<ul>
						 	<li><span style="color: #ff0000;"><strong>Red </strong></span>isn’t going to contribute to the effectiveness of your character build at all</li>
						 	<li><span style="color: #ff6600;"><strong>Orange </strong></span>is an OK option</li>
						 	<li><span style="color: #339966;"><strong>Green </strong></span>is a good option</li>
						 	<li><span style="color: #0000ff;"><strong>Blue </strong></span>is a great option, you should strongly consider this option for your character</li>
						 	<li><span style="color: #00ccff;"><strong>Sky Blue</strong></span> is an amazing option. If you do not take this option your character would not be optimized</li>
						</ul>
						<?php 
						$rating_transition = get_field('rating_transition');
						if ($rating_transition ):
							echo $rating_transition;
						endif;?>

				</section>

				<?php // check if the flexible content field has rows of data
				if ( have_rows( 'flexible_layouts', $id ) ) :

					    // loop through the selected ACF layouts and display the matching partial
					    while ( have_rows( 'flexible_layouts', $id ) ) : the_row();

							get_template_part( 'partials/flexible-layouts/' . get_row_layout() );

				endwhile;

				elseif ( get_the_content() ) :

				// no layouts found

				endif; 

				include(locate_template('loop-templates/content-sources.php'));

		
			$non_subclass_guide_ids = get_posts( array(
				'fields'      => 'ids',
				'post_type' => 'class-guides',
				'post__not_in' => array($post->ID),
				'posts_per_page' => -1,
				'post_parent'    => $id,
				'meta_query'    => array(
					array(
						'key'       => 'guide_type',
						'value'     => array('Spells', 'Feats', 'Races', 'Subclass Loop'),
						'compare'   => 'IN'
					)
				)
			));

			$subclass_guide_ids = get_posts( array(
				'fields'      => 'ids',
				'post_type' => 'class-guides',
				'post__not_in' => array($post->ID),
				'posts_per_page' => -1,
				'post_parent'    => $id,
				'meta_query'    => array(
					array(
						'key'	  	=> 'full_subclass_guide',
						'value'	  	=> '1'
					)
				)
			));

			// merging ids
			$post_ids = array_merge( $non_subclass_guide_ids, $subclass_guide_ids );

			if($post_ids):

				// the main query
				$query = new WP_Query(array(
					'post_type' => 'class-guides',
					'post__in'  => $post_ids, 
					'orderby'   => 'date', 
					'order'     => 'DESC',
					'posts_per_page' => -1,
				));



				// Open the query loop
				if ( $query->have_posts() ) : ?>
				<h2>Other <?php the_title(); ?> Guides</h2>
				<ul>
					<?php while ( $query->have_posts() ) : $query->the_post(); ?>
					<li>
						<a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
					</li>
					<?php endwhile; ?> 
				</ul>
				<?php endif;

				wp_reset_postdata();

			endif;

				?>

		<?php endwhile;?>

		<?php get_template_part('template-parts/subscribe'); ?>
		<?php get_template_part('loop-templates/content-author-info'); ?>
	</div>
</main>

<div class="sidebar left">
	<?php get_template_part('loop-templates/content-toc-builder'); ?>
	<div class="spotlight-holder">
		<?php get_template_part('loop-templates/content-sidebar-spotlight'); ?>
	</div>
</div>