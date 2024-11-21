<?php 

$permalink = get_permalink( $spell_learned->ID );
$title = get_the_title( $spell_learned->ID );

?>

<li<?php 
    $sources = get_the_terms( $spell_learned->ID, 'source' ); 
    $source = $sources[0]-> slug;
    if ($source):
    	echo ' class="' . $source . '"';
	endif;
?>>
<span class="
<? if ($change_ratingtext):
	if ($subrace_spell_rating):
		echo $subrace_spell_rating->slug;
	endif;
else: 
			 $parent_rating = get_field( 'parent_rating', $spell_learned->ID ); 
			 if ($parent_rating):
			 echo $parent_rating->slug;
			 endif;
endif;

?>


">
<strong><a href="<?php echo $permalink; ?>"><?php echo $title; ?></a></strong></span>: 

<? if ($change_ratingtext):
	if ($subrace_spell_rating_text):
		$formatted_text = str_replace(['<p>', '</p>'], '', $subrace_spell_rating_text);
		echo $formatted_text;
	endif;
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