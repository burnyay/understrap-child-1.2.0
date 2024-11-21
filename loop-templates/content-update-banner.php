<? $featured_posts = get_field('version_2024');
  if( $featured_posts ): ?>
    <? $post_type = get_field('post_type');
    if ($post_type == "2014"): ?>
    <div class="update-banner tip">
      <?php foreach( $featured_posts as $post ): 

        // Setup this post for WP functions (variable must be named $post).
        setup_postdata($post); ?>
          <p>This article has been updated for the rules in the 2024 <em>Player's Handbook</em>: <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></p>
      <?php endforeach; ?>
      </div>
      <?php 
      // Reset the global post object so that the rest of the page works correctly.
      wp_reset_postdata(); ?>
    <?php endif; ?>
  <?php endif; ?>