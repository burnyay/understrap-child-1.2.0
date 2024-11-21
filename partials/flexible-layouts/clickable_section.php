<div class="clickable-section-row">
	<?php 
	if( have_rows('clickable_section_item') ):
		while ( have_rows('clickable_section_item') ) : the_row();

			$title = get_sub_field('title');
			$text = get_sub_field('descriptor');
			$link = get_sub_field('link');

			echo '	<a class="clickable-section" href="'. $link .'">
						<div class="clickable-section__holder">
							<h2 class="title">'. $title .'</h2>
							<p>'. $text .'</p>
						</div>
					</a>';

		endwhile;
	endif;	
	?>
</div>