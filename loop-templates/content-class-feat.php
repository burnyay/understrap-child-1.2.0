<?php if( have_rows('class_rating') ): while( have_rows('class_rating') ): the_row(); 
		if( have_rows('class') ): while( have_rows('class') ): the_row(); 

			$raceclass = get_sub_field('class');
				if( $raceclass ):
				     $raceclass_check = esc_html( $raceclass->post_title ); 
				endif;

				if ($raceclass_check == $class): ?>
				<li class="<?php 
						   $sources = get_the_terms( $post->ID, 'source' ); 
						   if($sources):
						   	echo $sources[0]-> slug;
					   		endif;
						   ?>">

				<span class="
							<?php
									$rating = get_sub_field( 'rating' );  
									if( $rating ): echo $rating->slug;  
									endif; ?>
				"><strong><? if(get_field('full_feat_guide')):?><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a><? else: the_title(); endif; ?></strong></span>: 
				<?php 
								echo get_sub_field('rating_text', false, false); 
							 ?>
				</li>
		<?php endif; 
	endwhile; endif; 
endwhile; endif;?>