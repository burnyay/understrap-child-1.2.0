<section>
<h2 id="A-Quick-Overview-of-DnD-Races">A Quick Overview of D&D Races</h2>

<table class="races-table mobile-responsive">
<thead>
<tr class="tableizer-firstrow">
<th>Race</th>
<th>Language</th>
<th>Size</th>
<th>Speed</th>
<th>Ability Modifiers</th>
<th>Source</th>
</tr>
</thead>
<tbody>

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

      <tr class="main-race">
        <td><a href="<? the_permalink(); ?>"><? the_title(); ?></a></td>
        <td><? the_field('language'); ?></td>
        <td><? the_field('size'); ?></td>
        <td><? the_field('speed'); ?></td>
        <td><? $parent_asi = get_field('asi'); if($parent_asi): echo $parent_asi; else: echo '–'; endif; ?></td>
        <td><? $sources = get_the_terms( $post->ID, 'source' );
            $source = $sources[0]-> slug; 
            if ($source) :
              echo  $source;
            else:
              echo "phb";
            endif; ?></td>
      </tr>

       <?php

        // Set up the base query args
        $child_race_query_args = array(
            'post_type' => 'races',
            'post_per_page' => -1,
            'orderby' => 'title',
            'order' => 'asc',
            'nopaging' => true,
            'post_parent' => $post->ID,
        );

        // Build the query
      $child_race_query = new WP_Query( $child_race_query_args );

      // Open the query loop
      if ( $child_race_query->have_posts() ) : while ( $child_race_query->have_posts() ) : $child_race_query->the_post();?>

        <tr>
          <td><? the_title(); ?></td>
          <td><? the_field('language'); ?></td>
          <td><? the_field('size'); ?></td>
          <td><? the_field('speed'); ?></td>
          <td><? $child_asi = get_field('asi'); $replace_parent_asi = get_field('replace_parent_asi'); if($parent_asi && !$replace_parent_asi): echo $parent_asi; if($child_asi):echo ', '; endif; endif; echo $child_asi; ?></td>
          <td><? $sources = get_the_terms( $post->ID, 'source' );
            $source = $sources[0]-> slug; 
            if ($source) :
              echo  $source;
              else:
              echo "phb";
              endif; ?></td>
        </tr>

      <? // Close the loop
      endwhile; wp_reset_postdata(); endif;


    // Close the loop
    endwhile; wp_reset_postdata(); endif;
  
?>

</tbody>
</table>

</section>