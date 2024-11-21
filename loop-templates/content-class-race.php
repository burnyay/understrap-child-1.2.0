<div <?php 
					    $sources = get_the_terms( $post->ID, 'source' );
					    if ($sources):
				    		$source = $sources[0]-> slug; 
					      		echo 'class="race source ' . $source . '"';
	 					else:
	 							echo 'class="race"';
			      		endif;
					  ?>>

<span class="
	<?php if( have_rows('class_rating') ): while( have_rows('class_rating') ): the_row(); 
		if( have_rows('class') ): while( have_rows('class') ): the_row();
			$raceclass = get_sub_field('class');
				if( $raceclass ):
				     $raceclass_check = esc_html( $raceclass->post_title ); 
				endif;

				if ($raceclass_check == $class): 
					$rating = get_sub_field( 'rating' );  
					if( $rating ): echo $rating->slug;  
					endif;
				endif;
	endwhile; endif;
endwhile; endif;?>
">
	<strong><a href="<?php the_permalink(); ?>">
		<?php the_title(); ?></a></strong></span>: 
<?php 
if( have_rows('class_rating') ): while( have_rows('class_rating') ): the_row(); 
	if( have_rows('class') ): while( have_rows('class') ): the_row(); 
		$raceclass = get_sub_field('class');
		if( $raceclass ):
		     $raceclass_check = esc_html( $raceclass->post_title ); 
		endif;
			if ($raceclass_check == $class): 
				echo get_sub_field('rating_text', false, false); 
			endif;
	endwhile; endif; 
endwhile; endif;?>
	<?
	    // Set up the base query args
	    $subrace_query_args = array(
	        'post_type' => 'races',
	        'post_per_page' => -1,
	        'order' => 'asc',
	        'nopaging' => true,
	        'posts_per_page' => -1,
	        'post_parent'    => $post->ID,
	        'order'          => 'ASC',
	        'orderby'        => 'menu_order title'
	    );

	      // Build the query
	      $subrace_query = new WP_Query( $subrace_query_args );

	      // Open the query loop
	      if ( $subrace_query->have_posts() ) :?> <ul> <? while ( $subrace_query->have_posts() ) : $subrace_query->the_post(); 
		      	if( have_rows('class_rating') ): while( have_rows('class_rating') ): the_row();
		      		if( have_rows('class') ): while( have_rows('class') ): the_row();?>
		      			<? $subrace = get_sub_field('class');
							if( $subrace ):
							     $subrace_class_check = esc_html( $subrace->post_title ); 
							endif;

							if ($subrace_class_check == $class): ?>
			      				<li <?php 
							    $sources = get_the_terms( $post->ID, 'source' ); 
							    if($sources):
								    $source = $sources[0]-> slug;
								    if ($source):
								    	echo ' class="' . $source . '"';
							    	endif;
						    	endif;
							  ?>><span class="<?php $rating = get_sub_field( 'rating' );  
								if( $rating ): 
									echo $rating->slug; 
									endif; ?>"><strong><?php the_title();?></strong></span>: <? the_sub_field('rating_text', false, false); ?></li>
							<?php endif; ?>
				<? endwhile; endif;	
			endwhile; endif;
	      // Close the loop
	      endwhile;?> <? wp_reset_postdata(); ?> </ul> <? endif; ?>
</div>