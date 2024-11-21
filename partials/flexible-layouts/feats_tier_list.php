<section>

	<? $count = 0; $guide_type = get_field('guide_type'); ?>

	<? if ( $guide_type == 'Spells') : ?>
		<h2 id="best-spells"> Best Spells for  <? echo (get_the_title($post->post_parent));?>s</h2>
	<? elseif(get_sub_field('disable_title')): ?>
	<? elseif(!get_sub_field('disable_title')): ?>
		<h2 id="best-spells"> Best Spells for <?php the_title(); ?></h2>
	<? endif; ?>

	<? if (get_sub_field('intro')) : ?>
		<? the_sub_field('intro'); ?>
	<? endif; ?>

	<?php
	global $post;

	if ( $guide_type == 'Spells') :
		$slug = (get_the_title($post->post_parent));
	else:
		$slug = $post->post_title;
	endif;

	$spell_slug = strtolower( $slug ) . '-spells';

	$classes = get_the_terms( $post->ID, 'spell_classes' );

	foreach ( $classes as $class ) {
		$class = $class->name;
	} 

	$enable_chooser = get_sub_field('enable_chooser');

	$enable_best = get_sub_field('enable_best');

	$spell_post_ids = get_sub_field('chooser');

	if($enable_best):

		// Set up the base query args
		$spell_query_args = array(
			'post_type' => 'spells',
			'post__in' => $spell_post_ids,
			'post_per_page' => -1,
			'orderby' => 'post__in',
			'nopaging' => true,
		);

		// Build the query
		$spell_query = new WP_Query( $spell_query_args );

		// Open the query loop
		if ( $spell_query->have_posts() ) : ?>

		<p>

		<?php while ( $spell_query->have_posts() ) : $spell_query->the_post(); ?>
			<div class="single-spells">
				<h2><?echo ++$count; ?>.  <? the_title(); ?></h2>
				<div class=" spell-level">
					<?php 
					$level = get_field('level');
					$level_name = esc_html( $level->name ); 
					
					$school_fields = get_field('school');
					if( $school_fields ):
					    foreach( $school_fields as $school_field ):
					       $school = esc_html( $school_field->name );
					    endforeach;
					endif;

					if($level_name == 'Cantrip'): 
						echo $school .' '. $level_name;
					else:
						echo $level_name .' '. $school;
					endif; ?>
				</div>
				<p class="source">Source: <?php 
				$sources = get_the_terms( $post->ID, 'source' ); 
				if($sources):
					$source = $sources[0]-> name;
					if ($source):
						echo $source;
					endif;
				else:
					$source = "Player's Handbook";
					echo $source;
				endif;
				?></p>
				<div class="spell-meta">
					<? get_template_part('template-parts/spell-meta'); ?>
				</div>
				<div class="rating">
					<? if(get_field( 'how_to_use')): ?>
						<? the_field( 'how_to_use'); ?>
					<? else: ?>
						<? the_field( 'parent_rating_text'); ?>
					<? endif; ?>
				</div>
			</div>
		<? endwhile; ?>
		<? endif; ?>

		<? wp_reset_postdata(); ?>

	<? else: ?>

		<? // Get all the spell levels and sort by level with cantrips first
		$spell_levels = get_terms([ 
			'meta_key' => 'order',
			'orderby' => 'meta_value_num', 
			'taxonomy' => 'spell_slot',
			'hide_empty' => false,
		]);
		// Loop through the months, and
		// output a custom query and loop
		// for each
		foreach ( $spell_levels as $spell_level ) { ?>

		<?php

		if ($enable_chooser) :

		// Set up the base query args
		$spell_query_args = array(
			'post_type' => 'spells',
			'post__in' => $spell_post_ids,
			'post_per_page' => -1,
			'orderby' => 'title',
			'order' => 'asc',
			'tax_query' => array(
			array(
				'taxonomy' => 'spell_slot',
				'field' => 'slug',
				'terms' => $spell_level->slug
				),
			),
			'nopaging' => true,
		);

		else:

		// Set up the base query args
		$spell_query_args = array(
			'post_type' => 'spells',
			'post_per_page' => -1,
			'orderby' => 'title',
			'order' => 'asc',
			'tax_query' => array(
				array(
					'taxonomy' => 'spell_slot',
					'field' => 'slug',
					'terms' => $spell_level->slug
				),
				array (
					'taxonomy' => 'spell_classes',
					'field' => 'slug',
					'terms' => $spell_slug
				)
			),
			'nopaging' => true,
		);

		endif;

		// Build the query
		$spell_query = new WP_Query( $spell_query_args );

		// Open the query loop
		if ( $spell_query->have_posts() ) : ?>
			<h3><?php echo $spell_level->name ?></h3>
			<ul>
			<?php while ( $spell_query->have_posts() ) : $spell_query->the_post(); ?>
				<?php include(locate_template('loop-templates/content-class-spell.php')); ?>
			<?php endwhile; ?>
			</ul>
		<?php endif; ?>

		<? } // end foreach spell_level ?>

		<? wp_reset_postdata(); ?>

	<?php endif; ?>
	<? if (get_sub_field('outro')) : ?>
		<? the_sub_field('outro'); ?>
	<? endif; ?>
</section>