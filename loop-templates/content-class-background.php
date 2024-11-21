<div class="<?php $source = get_sub_field( 'source' ); if( $source ): echo $source->slug; endif; ?>">

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
	<a href="<?php the_permalink(); ?>">
		<?php the_title(); ?>
	</a>
</span>
: 
<?php 
if( have_rows('class_rating') ): while( have_rows('class_rating') ): the_row(); 
	if( have_rows('class') ): while( have_rows('class') ): the_row(); 
		$raceclass = get_sub_field('class');
		if( $raceclass ):
		     $raceclass_check = esc_html( $raceclass->post_title ); 
		endif;
			if ($raceclass_check == $class): 
				echo get_sub_field('rating_text'); 
			endif;
	endwhile; endif; 
endwhile; endif;?>
</div>