<div class="wrapper post-loop <?php the_sub_field('css_class'); ?>">
  <div class="container ">
    <div class="row">
      <div class="column col-lg-8"> 
        <div class="row cards-wrapper">
        <?php

        // first query
        $post_ids = get_posts( array(
            'fields'    => 'ids',
            'post_type' => 'post',
            'posts_per_page' => -1,
        ));

        // second query
        $class_guide_ids = get_posts( array(
            'fields'      => 'ids',
            'post_type'   => 'class-guides',
            'posts_per_page' => -1,
            'post_parent' => 0
        ));

        $subclass_guide_ids = get_posts( array(
            'fields'      => 'ids',
            'post_type'   => 'class-guides',
            'posts_per_page' => -1,
            'meta_query' => array(
                array(
                    'key'   => 'full_subclass_guide',
                    'value' => '1',
                )
            )
        ));

        $class_race_guides = get_posts(array(
            'fields'      => 'ids',
            'post_type'   => 'class-guides',
            'posts_per_page' => -1,
            'meta_key'      => 'guide_type',
            'meta_value'    => 'Races'
        ));

        $class_spell_guides = get_posts(array(
            'fields'      => 'ids',
            'post_type'   => 'class-guides',
            'posts_per_page' => -1,
            'meta_key'      => 'guide_type',
            'meta_value'    => 'Spells'
        ));
			
		$magic_item_guides = get_posts(array(
            'fields'      => 'ids',
            'post_type'   => 'dnd-items',
            'posts_per_page' => -1,
        ));

       $race_guide_ids = get_posts( array(
          'fields'      => 'ids',
          'post_type'   => 'races',
          'post_parent' => 0,
      ));

      $subrace_guide_ids = get_posts( array(
          'fields'      => 'ids',
          'post_type'   => 'races',
          'post_parent' => 1,
          'meta_query' => array(
              array(
                  'key'   => 'full_race_guide',
                  'value' => '1',
              )
          )
      ));

        $feat_guide_ids = get_posts( array(
            'fields'      => 'ids',
            'post_type'   => 'feats',
            'posts_per_page' => -1,
            'meta_query' => array(
                array(
                    'key'   => 'full_feat_guide',
                    'value' => '1',
                )
            )
        ));

        $spell_guide_ids = get_posts( array(
            'fields'      => 'ids',
            'post_type'   => 'spells',
            'posts_per_page' => -1,
            'meta_query' => array(
                array(
                    'key'   => 'full_spell_guide',
                    'value' => '1',
                )
            )
        ));

        // merging ids
        $post_ids = array_merge( $post_ids, $class_guide_ids, $subclass_guide_ids, $race_guide_ids, $feat_guide_ids, $spell_guide_ids, $class_spell_guides, $class_race_guides, $magic_item_guides );

        // the main query
        $query = new WP_Query(array(
            'post_type' => 'any',
            'post__in'  => $post_ids, 
            'orderby'   => 'date', 
            'order'     => 'DESC',
            'posts_per_page' => 4,
        ));

        if( $query->have_posts() ): while ($query->have_posts()) : $query->the_post();
          $image = get_the_post_thumbnail_url('', 'medium'); 
          $title = get_the_title();
          $text = wp_trim_words( get_the_content(), 40, '...' );
          $card_link = get_the_permalink();
          $card_button_text = 'Read More';
          $card_columns = 'col-lg-6';

            include(locate_template('loop-templates/content-post.php'));

        endwhile; ?>

        <?php wp_reset_postdata(); ?>

        <?php endif; ?>
        </div>
      <div style="text-align: center;"><a class="btn btn-primary" href="/articles/">See All Posts</a></div>
      </div>
      <div class="column col-lg-4 p-3">
        <?php the_sub_field('content'); ?>
      </div>
    </div> <!--end row-->
  </div> <!--end container-->
</div><!--end wrapper-->



