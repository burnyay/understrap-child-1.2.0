<section>

<? $classes = get_the_terms( $post->ID, 'spell_classes' );
foreach ( $classes as $class ) {
    $class = $class->name;
}  

$guide_type = get_field('guide_type');

?>

<?
if (has_post_parent() && $guide_type == 'Feats'): 
  // Get all the ratings and sort by best rating first
  $ratings = get_terms([ 
    'meta_key' => 'tier',
    'orderby' => 'meta_value_num', 
    'taxonomy' => 'rating',
    'hide_empty' => false,
  ]);

  // output a custom query and loop for each
  foreach ( $ratings as $rating ) { 

  // Set up the base query args
  $feat_query_args = array(
    'post_type' => 'feats',
    'post_per_page' => -1,
    'orderby' => 'title',
    'order' => 'asc',
    'tax_query' => array(
      array(
        'taxonomy' => 'rating',
        'field' => 'slug',
        'terms' => $rating->slug
      ),
   ),
    'nopaging' => true,
  );

  // Build the query
  $feat_query = new WP_Query( $feat_query_args );

  // Open the query loop
  if ( $feat_query->have_posts() ) : ?>

    <h3><?php echo $rating->description ?></h3>
    <ul>
      <?php while ( $feat_query->have_posts() ) : $feat_query->the_post(); ?>

        <?php include(locate_template('loop-templates/content-class-feat.php')); ?>
      <?php endwhile; ?>
    </ul>
  <?php endif;

  }

  wp_reset_postdata(); ?>

<? else: ?>

<h2 id="best-feats"> Best Feats for <?php the_title(); ?></h2>

    <?php

    // Set up the base query args
    $spell_query_args = array(
        'post_type' => 'feats',
        'post_per_page' => -1,
        'orderby' => 'title',
        'order' => 'asc',
        'nopaging' => true,
    );

      // Build the query
      $spell_query = new WP_Query( $spell_query_args );

      // Open the query loop
      if ( $spell_query->have_posts() ) :?> <ul>
    
       <?php while ( $spell_query->have_posts() ) : $spell_query->the_post();

        include(locate_template('loop-templates/content-class-feat.php'));

      // Close the loop
      endwhile; ?>
    </ul>
    <?php endif;

    // Clean up
    $spell_query = null;
    wp_reset_postdata() 
?>
</section>

<? endif; ?>