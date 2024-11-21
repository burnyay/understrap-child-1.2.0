<main class="post-content">
	<div class="main-content">
	  	<div class="blog-title">
	  		<h1 class="blog-single-title"><?php echo get_the_title( $post->post_parent ); ?> Subclasses 5e</h1>
	  	</div>
			<?php get_template_part('loop-templates/content-date-excerpt-thumbnail'); ?>
    	<?php
			while ( have_posts() ):
				the_post();
				$id = get_the_ID();
				$parent_title = strtolower(get_the_title($post->post_parent));
				$parent_permalink = get_the_permalink($post->post_parent);
			?>
				<section>
					<? the_field('class_guide_intro'); ?>
				</section>
				<section>
					<h2 id="what-is-this-guide"><strong>What is this guide?</strong></h2>
					<p>This guide is meant as a deep dive into the 5e <?php echo $parent_title ;?>s subclasses. For the full overview of the <?php echo $parent_title;?> class, check out our <?php echo '<a href="'.$parent_permalink.'">'.$parent_title.' class guide</a>';?>.</p>

					<p>To allow you to scan through the options quickly, we use the following color rating scheme:</p>
					<ul>
					 	<li><span style="color: #ff0000;"><strong>Red </strong></span>isn’t going to contribute to the effectiveness of your character build at all</li>
					 	<li><span style="color: #ff6600;"><strong>Orange </strong></span>Situationally good, but a below-average option otherwise</li>
					 	<li><span style="color: #339966;"><strong>Green </strong></span>is a good option</li>
					 	<li><span style="color: #0000ff;"><strong>Blue </strong></span>is a great option, you should strongly consider this option for your character</li>
					 	<li><span style="color: #00ccff;"><strong>Sky Blue</strong></span> is an amazing option. If you do not take this option your character would not be optimized</li>
					</ul>

					
				</section>

				<?php

					// check if the flexible content field has rows of data
				if ( have_rows( 'flexible_layouts', $id ) ) :

					    // loop through the selected ACF layouts and display the matching partial
					    while ( have_rows( 'flexible_layouts', $id ) ) : the_row();

								get_template_part( 'partials/flexible-layouts/' . get_row_layout() );

				endwhile;

				elseif ( get_the_content() ) :

				// no layouts found

				endif;

			include(locate_template('loop-templates/content-sources.php'));
		
			$parent_class_guide = get_post_parent();

			$classes = get_the_terms( $post->ID, 'spell_classes' );
			foreach ( $classes as $class ) {
				$class = $class->name;
			}

		
			$non_subclass_guide_ids = get_posts( array(
				'fields'      => 'ids',
				'post_type' => 'class-guides',
				'post__not_in' => array($post->ID),
				'posts_per_page' => -1,
				'post_parent'    => $parent_class_guide->ID,
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
				'post_parent'    => $parent_class_guide->ID,
				'meta_query'    => array(
					array(
						'key'	  	=> 'full_subclass_guide',
						'value'	  	=> '1'
					)
				)
			));

			// merging ids
			$post_ids = array_merge( $non_subclass_guide_ids, $subclass_guide_ids );

			// the main query
			$query = new WP_Query(array(
				'post_type' => 'any',
				'post__in'  => $post_ids, 
				'orderby'   => 'date', 
				'order'     => 'DESC',
				'posts_per_page' => -1,
			));

			// Open the query loop
			if ( $query->have_posts() ) : ?>
			<h2>Other <?php echo $parent_class_guide->post_title ?> Guides</h2>
			<ul>
				<li>
					<a href="<?php echo get_permalink($parent_class_guide->ID); ?>"><?php echo get_the_title($parent_class_guide->ID); ?> 5e Overview</a>
				</li>
				<?php while ( $query->have_posts() ) : $query->the_post(); ?>
				<li>
					<a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
				</li>
				<?php endwhile; ?> 
			</ul>
			<?php endif;

			wp_reset_postdata();

			?>

		<?php endwhile;?>

		<?php get_template_part('template-parts/subscribe'); ?>
		<?php get_template_part('loop-templates/content-author-info'); ?>
	</div>
</main>

<div class="sidebar left">
		<div class="spotlight-holder">
		<?php get_template_part('loop-templates/content-sidebar-spotlight'); ?>
	</div>
</div>