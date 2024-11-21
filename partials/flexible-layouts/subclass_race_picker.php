<section>
	<? $target_keyword = get_field('target_keyword'); ?>
<? if (get_sub_field('title_check')): ?>
	<h2 id="best-races">Best Races for <?php if ($target_keyword): echo $target_keyword . 's'; else: the_title(); endif; ?> 5e</h2>
<? endif; ?>
<? if (get_sub_field('intro_text_check')):
	the_sub_field('intro_text'); 
	endif;
?>

<? if (get_sub_field('after_standard_title_check')): ?>
	<h3>Standard Races</h3>
	<? the_sub_field('after_standard_title'); 
	endif;
?>
<?php

// Check rows exists.
if( have_rows('subclass_race_picker') ):

    // Loop through rows.
    while( have_rows('subclass_race_picker') ) : the_row();

    $race = get_sub_field('race');
    $sources = get_the_terms( $race->ID, 'source' );
    if( !$sources ):
        if( $race ): ?>
            <div class="race">
            <p><span class="<? $rating = get_sub_field( 'rating', $race->ID ); 
           if ($rating):
           echo $rating->slug;
           endif; ?>"><strong><a href="<?php echo get_permalink( $race->ID ); ?>"><?php echo esc_html( $race->post_title ); ?></a></strong></span>: <? the_sub_field('rating_text', false, false);?></p>

           <?php

          // Check rows exists.
          if( have_rows('subrace_repeat') ):?>
          <ul>
              <?// Loop through rows.
              while( have_rows('subrace_repeat') ) : the_row();
              $subrace_post_object = get_sub_field('subrace_post_object');  
              $sources = get_the_terms( $subrace_post_object->ID, 'source' ); ?>
              <li <?php 
              if($sources):
                  $source = $sources[0]-> slug;
                  if ($source):
                    echo ' class="races source ' . $source . '"';
                  endif;
              endif;
              ?>><span class="<? $subrace_rating = get_sub_field( 'rating', $subrace_post_object->ID );
               if ($subrace_rating):
               echo $subrace_rating->slug;
               endif; ?>"><strong><?php echo esc_html( $subrace_post_object->post_title ); ?></strong></span>: <? the_sub_field('rating_text', false, false);?></li>
              <? // End loop.
              endwhile;?>

          </ul>
          <? endif;?>
          </div>
        <?php endif;
      endif;

    // End loop.
    endwhile;

// No value.
else :
    // Do something...
endif;
?>

<? if (get_sub_field('after_nonstandard_title_check')): ?>
	<h3>Non-Standard Races</h3>
	<? the_sub_field('after_nonstandard_title'); 
	endif;
?>
<?php

// Check rows exists.
if( have_rows('subclass_race_picker') ):

    // Loop through rows.
    while( have_rows('subclass_race_picker') ) : the_row();

    $race = get_sub_field('race');
    $sources = get_the_terms( $race->ID, 'source' );
    if( $sources ):
        if( $race ): ?>
          <div <?php 
              $source = $sources[0]-> slug;
              if ($source):
                echo ' class="races source ' . $source . '"';
            endif;
          ?>>
          <p><span class="<? $rating = get_sub_field( 'rating', $race->ID ); 
           if ($rating):
           echo $rating->slug;
           endif; ?>"><strong><a href="<?php echo get_permalink( $race->ID ); ?>"><?php echo esc_html( $race->post_title ); ?></a></strong></span>: <? the_sub_field('rating_text', false, false);?></p>
          <? // Check rows exists.
          if( have_rows('subrace_repeat') ):?>
          <ul>
              <?// Loop through rows.
              while( have_rows('subrace_repeat') ) : the_row();
              $subrace_post_object = get_sub_field('subrace_post_object');  
              $sources = get_the_terms( $subrace_post_object->ID, 'source' ); ?>
              <li <?php 
              $source = $sources[0]-> slug;
              if ($source):
                echo ' class="races source ' . $source . '"';
              endif;
              ?>><span class="<? $subrace_rating = get_sub_field( 'rating', $subrace_post_object->ID );
               if ($subrace_rating):
               echo $subrace_rating->slug;
               endif; ?>"><strong><?php echo esc_html( $subrace_post_object->post_title ); ?></strong></span>: <? the_sub_field('rating_text', false, false);?></li>
              <? // End loop.
              endwhile;?>

          </ul>
          <? endif;?>
          </div>
        <?php endif;
      endif;

    // End loop.
    endwhile;

// No value.
else :
    // Do something...
endif;
?>

</section>