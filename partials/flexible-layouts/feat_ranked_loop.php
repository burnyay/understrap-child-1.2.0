<? 

the_sub_field('intro');

$guide_type = get_field('guide_type');

?>

<div class="feats-ranked-loop single-class-guides">
 <? $ratings = get_terms([ 
    'orderby' => 'term_id', 
    'order' => 'desc', 
    'taxonomy' => 'rating',
    'hide_empty' => true,
  ]);


  // output a custom query and loop for each
  foreach ( $ratings as $rating ) { 

  if($rating->name == "Sky Blue"): ?>
    <h3>S Tier</h3>
  <? elseif($rating->name == "Blue"): ?>
    <h3>A Tier</h3>
  <? elseif($rating->name == "Green"): ?>
    <h3>B Tier</h3>
  <? elseif($rating->name == "Orange"): ?>
    <h3>C Tier</h3>
  <? elseif($rating->name == "Red"): ?>
    <h3>D Tier</h3>
  <?endif;?>

 <? 
 
  // Set up the base query args
  $feat_query_args = array(
    'post_type' => 'feats',
    'post_per_page' => -1,
    'orderby' => 'title',
    'order' => 'asc',
    'nopaging' => true,
    'tax_query' => array(
      array (
          'taxonomy' => 'rating',
          'field' => 'slug',
          'terms' => $rating->slug,
      )
    ),
  );

  // Build the query
  $feat_query = new WP_Query( $feat_query_args );

  // Open the query loop
  if ( $feat_query->have_posts() ) : ?>

      <?php while ( $feat_query->have_posts() ) : $feat_query->the_post(); ?>

        <?php include(locate_template('loop-templates/content-class-feat-ranked.php')); ?>
      <?php endwhile; ?>
  
  <?php endif;


  wp_reset_query();
  } ?>
  </section>
  <? wp_reset_postdata(); ?>