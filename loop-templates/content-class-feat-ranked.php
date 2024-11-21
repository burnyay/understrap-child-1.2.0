<div <?php 
			$sources = get_the_terms( $post->ID, 'source' ); 
			if($sources):
			echo 'class="source ' . $sources[0]-> slug . '"';
			endif;
			?>>

<h4><? if(get_field('full_feat_guide')):?><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a><? else: the_title(); endif; ?></h4> 
<?php 
				echo get_field('is_it_good'); 
				?>
</div>