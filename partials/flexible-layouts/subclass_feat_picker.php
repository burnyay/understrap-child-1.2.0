<section>
<? $target_keyword = get_field('target_keyword'); ?>
<h2 id="best-feats">Best <a href="/players/dnd-5e-feats-tier-list/">Feats</a> for <?php if ($target_keyword): echo $target_keyword. 's'; else: the_title(); endif; ?> 5e</h2>

<?php

// Check rows exists.
if( have_rows('subclass_feat_picker') ):

    // Loop through rows.
    while( have_rows('subclass_feat_picker') ) : the_row(); ?>
	
	<ul>
	
	<? $subclass_feat_post_object = get_sub_field('subclass_feat_post_object');
    
        if( $subclass_feat_post_object ): ?>
            
            <li <?php
              $sources = get_the_terms( $subclass_feat_post_object->ID, 'source' );
              $source = $sources[0]-> slug;
              if ($source):
                echo ' class="races source ' . $source . '"';
              endif;
              ?>><span class="<? $rating = get_sub_field( 'rating', $subclass_feat_post_object->ID ); 
           if ($rating):
           echo $rating->slug;
           endif; ?>"><strong><a href="<?php echo get_permalink( $subclass_feat_post_object->ID ); ?>"><?php echo esc_html( $subclass_feat_post_object->post_title ); ?></a></strong></span>: <? the_sub_field('rating_text', false, false);?></li>

        <?php endif; ?>

	</ul>
    
		<? endwhile;

// No value.
else :
    // Do something...
endif;
?>
</section>