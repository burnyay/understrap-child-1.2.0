<div class="post-wrapper">
	<div class="post-meta">
		<div class="post-title">
			<a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>"><?php the_title(); ?></a>
		</div>
		<p class="date"><?php $post_date = get_the_date( 'l F j, Y' ); echo $post_date; ?></p>

	</div>
 
</div>