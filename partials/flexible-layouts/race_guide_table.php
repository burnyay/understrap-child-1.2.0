<section class="races-wrapper">
<h2 id="A-Quick-Overview-of-DnD-Races">Playable Character Races in D&D</h2>

<?php

  // Set up the base query args
  $parent_race_query_args = array(
      'post_type' => 'races',
      'post_per_page' => -1,
      'orderby' => 'title',
      'order' => 'asc',
      'nopaging' => true,
      'post_parent' => 0,
  );

    // Build the query
    $parent_race_query = new WP_Query( $parent_race_query_args );

    // Open the query loop
    if ( $parent_race_query->have_posts() ) : while ( $parent_race_query->have_posts() ) : $parent_race_query->the_post();?>

      <section class="race-card">
        <div class="race-thumbnail"><img src="<? echo get_the_post_thumbnail_url();?>"></div>
        <div class="race-title"><div class="race-meta"><h3><a href="<? the_permalink(); ?>"><? the_title(); ?></a></h3><p><em><? $sources = get_the_terms( $post->ID, 'source' );
            $source = $sources[0]->name; 
            if ($source) :
              echo  $source;
            else:
              echo "Player's Handbook";
            endif; ?></em></p></div></div>
        
        <p><? echo wp_trim_words(get_field('what_are'), 55); ?></p>
        <a href="<? the_permalink(); ?>" class="learn-more">Learn More</a>
      </section>

      <? // Close the loop
      endwhile; wp_reset_postdata(); endif;
  
?>
</section>