<div class="post-wrapper">
	<a href="<?php the_permalink(); ?>">
		<div class="featured-image">
			<?php echo get_the_post_thumbnail( $post, 'homepage-blog-roll'); ?>
		</div>
	</a>
	<div class="post-meta">
		<div class="categories">
			<?php
			$categories = get_the_category();
			$separator = ' | ';
			$output = '';
			if ( get_post_type() === 'post' ) {
				if ( ! empty( $categories ) ) {
				    foreach( $categories as $category ) {
				        $output .= '<a href="' . esc_url( get_category_link( $category->term_id ) ) . '" alt="' . esc_attr( sprintf( __( 'View all posts in %s', 'textdomain' ), $category->name ) ) . '">' . esc_html( $category->name ) . '</a>' . $separator;
				    }
				    echo trim( $output, $separator );
				}
			} elseif (get_post_type() === 'races') { ?>
				<a href="https://arcaneeye.com/players/dnd-5e-races/">DnD Races</a>
			<?php }
			?>
		</div>
		<div class="post-title">
			<h3><a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>"><?php the_title(); ?></a></h3>
		</div>
		<div class="post-excerpt">
			<?php echo wp_trim_words( get_the_excerpt(), 24); ?>
		</div>
		<p class="date"><?php $post_date = get_the_date( 'l F j, Y' ); echo $post_date; ?></p>
	</div>
	<div class="read-more">
		<a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>">Read More <i class="fas fa-chevron-right"></i></a>
	</div>
 
</div>