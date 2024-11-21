<?php
    $featured_posts = get_field('version_2024');
    if( $featured_posts ): ?>
      <? $post_type = get_field('post_type');
      if ($post_type == "2024"): ?>
        <?php foreach( $featured_posts as $post ): 

          // Setup this post for WP functions (variable must be named $post).
          setup_postdata($post); ?>
    <div class="affiliate"><p>Looking for the legacy version of this article based on the 2014 rules? <a href="<?php the_permalink(); ?>">Click here.</a></p></div>
        <?php endforeach; ?>
        <?php 
        // Reset the global post object so that the rest of the page works correctly.
        wp_reset_postdata(); ?>
      <?php endif; ?>
    <?php endif; ?>