<h2 id="best-backgrounds"> Best Backgrounds for <?php the_title(); ?></h2>

<?

$classes = get_the_terms( $post->ID, 'spell_classes' );
  foreach ( $classes as $class ) {
      $class = $class->name;
  }  ?>

    <?php

    // Set up the base query args
    $spell_query_args = array(
        'post_type' => 'backgrounds',
        'post_per_page' => -1,
        'orderby' => 'title',
        'order' => 'asc',
        'nopaging' => true,
    );

      // Build the query
      $spell_query = new WP_Query( $spell_query_args );

      // Open the query loop
      if ( $spell_query->have_posts() ) : while ( $spell_query->have_posts() ) : $spell_query->the_post();

        include(locate_template('loop-templates/content-class-background.php'));

      // Close the loop
      endwhile; endif;

    // Clean up
    $spell_query = null;
    wp_reset_postdata() 
?>
