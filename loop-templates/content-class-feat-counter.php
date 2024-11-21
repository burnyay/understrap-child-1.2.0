<?php if( have_rows('class_rating') ): while( have_rows('class_rating') ): the_row(); 
	if( have_rows('class') ): while( have_rows('class') ): the_row(); 

		$raceclass = get_sub_field('class');
			if( $raceclass ):
			     $raceclass_check = esc_html( $raceclass->post_title ); 
			endif; ?>

			<? if ($raceclass_check == $class): ?>
				<? $rating = get_sub_field( 'rating' ); 
				if ($rating == $rating_color): 
					$counter++; ?>
				<?php endif; ?>
			<?php endif; ?>

	<? endwhile; endif; 
endwhile; endif;?>