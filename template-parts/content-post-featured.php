<div class="post-wrapper">
	<div class="featured-image">
		<?php echo get_the_post_thumbnail( $post_id, 'blog-post'); ?>
	</div>
	<div class="post-meta">
		<div class="categories">
			<?php
			$categories = get_the_category();
			$separator = ' | ';
			$output = '';
			if ( ! empty( $categories ) ) {
			    foreach( $categories as $category ) {
			        $output .= '<a href="' . esc_url( get_category_link( $category->term_id ) ) . '" alt="' . esc_attr( sprintf( __( 'View all posts in %s', 'textdomain' ), $category->name ) ) . '">' . esc_html( $category->name ) . '</a>' . $separator;
			    }
			    echo trim( $output, $separator );
			}
			?>
		</div>
		<div class="post-title">
			<h3><a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>"><?php the_title(); ?></a></h3>
		</div>
		<div class="post-excerpt">
			<?php echo wp_trim_words( get_the_excerpt(), 55, $moreLink); ?>	
		</div>
		<p class="date"><?php $post_date = get_the_date( 'l F j, Y' ); echo $post_date; ?></p>
	</div>
	<div class="read-more">
		<a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>">Read More <i class="fas fa-chevron-right"></i></a>
	</div>
 
</div>