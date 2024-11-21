<li<?php 
					    $sources = get_the_terms( $post->ID, 'source' ); 
					    if($sources):
						    $source = $sources[0]-> slug;
						    if ($source):
						    	echo ' class="' . $source . '"';
					    	endif;
				    	endif;
					  ?>>
<span class="<?php if( have_rows('class_rating') ): while( have_rows('class_rating') ): the_row(); 
		if( have_rows('class') ): while( have_rows('class') ): the_row(); 
			$raceclass = get_sub_field('class_selection');
			if( $raceclass ):
     			$raceclass_check = esc_html( $raceclass->post_title ); 
			endif;
			if ($raceclass_check == $class):
				if( have_rows('class_selection_rating') ): while( have_rows('class_selection_rating') ): the_row(); 
					$class_specific_rating = get_sub_field( 'class_specific_rating' );  
					echo $class_specific_rating->slug;
				endwhile; endif;
			endif;
		endwhile; endif;
endwhile; endif;

if ($class_specific_rating):
else:
	$parent_rating = get_field( 'parent_rating' ); 
	if ($parent_rating):
		echo $parent_rating->slug;
	endif;
endif;

?>


">
<strong><? if(!$source || get_field('full_spell_guide')):?><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a><? else: the_title(); endif; ?></strong></span>: 
<?php if( have_rows('class_rating') ): while( have_rows('class_rating') ): the_row(); 
		if( have_rows('class') ): while( have_rows('class') ): the_row(); 
			$raceclass = get_sub_field('class_selection');
			if( $raceclass ):
     			$raceclass_check = esc_html( $raceclass->post_title ); 
			endif;
			if ($raceclass_check == $class):
				if( have_rows('class_selection_rating') ): while( have_rows('class_selection_rating') ): the_row();   
					$class_rating_text = get_sub_field('rating_text', false, false);
					echo $class_rating_text;
				endwhile; endif;
			endif;
		endwhile; endif;
endwhile; endif;

if ($class_rating_text):
else:
	the_field( 'parent_rating_text', false, false ); 
endif;

$class_specific_rating = 0;
$class_rating_text = 0;
?>
</li>