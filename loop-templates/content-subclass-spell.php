<?php 

$permalink = get_permalink( $spell_learned->ID );
$title = get_the_title( $spell_learned->ID );

?>

<li<?php 
    $sources = get_the_terms( $spell_learned->ID, 'source' ); 
    if($sources):
	    $source = $sources[0]-> slug;
	    if ($source):
	    	echo ' class="' . $source . '"';
		endif;
	endif;
?>>
<span class="
<?php if( have_rows('class_rating', $spell_learned->ID) ): while( have_rows('class_rating', $spell_learned->ID) ): the_row(); 
		if( have_rows('class', $spell_learned->ID) ): while( have_rows('class', $spell_learned->ID) ): the_row(); 
			$raceclass = get_sub_field('class_selection', $spell_learned->ID);
			if( $raceclass ):
     			$raceclass_check = esc_html( $raceclass->post_title ); 
			endif;
			if ($raceclass_check == $subclass_name):
				if( have_rows('class_selection_rating', $spell_learned->ID) ): while( have_rows('class_selection_rating', $spell_learned->ID) ): the_row(); 
					$class_specific_rating = get_sub_field( 'class_specific_rating', $spell_learned->ID );  
					echo $class_specific_rating->slug;
				endwhile; endif;
			endif;
		endwhile; endif;
endwhile; endif;

if ($class_specific_rating):
else:
	$parent_rating = get_field( 'parent_rating', $spell_learned->ID ); 
	if ($parent_rating):
		echo $parent_rating->slug;
	endif;
endif;

?>


">
<strong><? if(!$sources || get_field('full_spell_guide', $spell_learned->ID)):?><a href="<?php echo $permalink; ?>"><?php echo $title; ?></a><? else: echo $title; endif; ?></strong></span>: 
<?php if( have_rows('class_rating', $spell_learned->ID) ): while( have_rows('class_rating', $spell_learned->ID) ): the_row(); 
		if( have_rows('class') ): while( have_rows('class') ): the_row(); 
			$raceclass = get_sub_field('class_selection');
			if( $raceclass ):
     			$raceclass_check = esc_html( $raceclass->post_title ); 
			endif;
			if ($raceclass_check == $subclass_name):
				if( have_rows('class_selection_rating', $spell_learned->ID) ): while( have_rows('class_selection_rating', $spell_learned->ID) ): the_row();   
					$class_rating_text = get_sub_field('rating_text', false, false, $spell_learned->ID);
					echo $class_rating_text;
				endwhile; endif;
			endif;
		endwhile; endif;
endwhile; endif;

if ($class_rating_text):
else:
	$parent_rating_text = get_field( 'parent_rating_text', $spell_learned->ID );
	if ($parent_rating_text):
		$formatted_text = str_replace(['<p>', '</p>'], '', $parent_rating_text);
		echo $formatted_text;
	endif;
endif;
	
$class_specific_rating = 0;
$class_rating_text = 0;	
?>
</li>