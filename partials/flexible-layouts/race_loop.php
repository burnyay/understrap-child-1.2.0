<section>
<? $guide_type = get_field('guide_type'); if ( $guide_type == 'Races') : ?>
  <h2 id="best-races">Best Races for <? echo (get_the_title($post->post_parent));?>s</h2>
<? else: ?>
  <h2 id="best-races">Best Races for <?php the_title(); ?></h2>
<? endif; ?>
<? if (get_sub_field('intro')) : ?>
  <? the_sub_field('intro'); ?>
<? endif; ?>

<?
$classes = get_the_terms( $post->ID, 'spell_classes' );
  foreach ( $classes as $class ) {
      $class = $class->name;
  }  ?>

  <h3><a href="/players/dnd-5e-races/">Standard Races</a></h3>

<?php

  // Set up the base query args
  $spell_query_args = array(
      'post_type' => 'races',
      'post_per_page' => -1,
      'orderby' => 'title',
      'order' => 'asc',
      'nopaging' => true,
      'post_parent' => 0,
      'tax_query' => array(
          array(
              'taxonomy' => 'source',
              'operator' => 'NOT EXISTS'
          )
      )
  );

    // Build the query
    $spell_query = new WP_Query( $spell_query_args );

    // Open the query loop
    if ( $spell_query->have_posts() ) : while ( $spell_query->have_posts() ) : $spell_query->the_post();

      include(locate_template('loop-templates/content-class-race.php'));

    // Close the loop
    endwhile; wp_reset_postdata(); endif;
  
?>
<h3><a href="/players/dnd-5e-races/">Non-Standard Races</a></h3>
<?php
  // Set up the base query args
  $spell_query_args = array(
      'post_type' => 'races',
      'post_per_page' => -1,
      'orderby' => 'title',
      'order' => 'asc',
      'nopaging' => true,
      'post_parent' => 0,
      'tax_query' => array(
          array(
              'taxonomy' => 'source',
              'operator' => 'EXISTS',
          )
        )
  );

    // Build the query
    $spell_query = new WP_Query( $spell_query_args );

    // Open the query loop
    if ( $spell_query->have_posts() ) : while ( $spell_query->have_posts() ) : $spell_query->the_post();

      include(locate_template('loop-templates/content-class-race.php'));

    // Close the loop
    endwhile; wp_reset_postdata(); endif;
?>
<? if (get_sub_field('outro')) : ?>
  <? the_sub_field('outro'); ?>
<? endif; ?>
</section>