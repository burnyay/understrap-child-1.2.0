
<div class="card-wrapper <?php echo $card_columns; ?>">
  <div class="card">
    <div class="featured-image">
    	<a href="<?php echo $card_link ?>"><?php echo get_the_post_thumbnail( $post, 'homepage-blog-roll'); ?></a>
	</div>
    <div class="card-body">
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
      <h3 class="card-title"><a href="<?php echo $card_link ?>"><?php echo $title; ?>  <?php if( in_array( get_post_type(), array( 'class-guides'))):?> <? if (has_post_parent() && get_field('guide_type') == 'Subclass'):?>  <? echo get_the_title($post->post_parent); endif; endif;?> <?php if( in_array( get_post_type(), array( 'feats', 'spells', 'class-guides', 'races' )) ): echo 'Guide 5e'; endif; ?> </a></h3>
     	 <p class="post-excerpt">
      		<?php echo wp_trim_words( get_the_excerpt(), 24); ?>
		</p>
		<p class="date"><?php $post_date = get_the_date( 'l F j, Y' ); echo $post_date; ?></p>
      	<div class="read-more">
			<a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>">Read More <i class="fa fa-chevron-right"></i></a>
		</div>
    </div>
  </div>
</div>