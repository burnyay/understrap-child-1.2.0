<?
$classes = get_the_terms( $post->ID, 'spell_classes' );
foreach ( $classes as $class ) {
    $class = $class->name;
}  

$guide_type = get_field('guide_type'); 

if ( $guide_type == 'Subclass Loop') : ?>

<?// Set up the base query args
$spell_query_args = array(
    'post_type' => 'class-guides',
    'post_per_page' => -1,
    'orderby' => 'title',
    'order' => 'asc',
    'nopaging' => true,
    'posts_per_page' => -1,
    'post_parent'    => $post->post_parent,
    'order'          => 'ASC',
    'orderby'        => 'title',
	'meta_key'      => 'guide_type',
    'meta_value'    => 'Subclass',
);

else:

// Set up the base query args
$spell_query_args = array(
    'post_type' => 'class-guides',
    'post_per_page' => -1,
    'orderby' => 'title',
    'order' => 'asc',
    'nopaging' => true,
    'posts_per_page' => -1,
    'post_parent'    => $post->ID,
    'order'          => 'ASC',
    'orderby'        => 'title',
    'meta_key'      => 'guide_type',
    'meta_value'    => 'Subclass',
);

endif;

if ( !$post->post_parent && get_sub_field('list')) :

      // Build the query
  $spell_query = new WP_Query( $spell_query_args );

  // Open the query loop
  if ( $spell_query->have_posts() ) : ?><ul><? while ( $spell_query->have_posts() ) : $spell_query->the_post();

    include(locate_template('loop-templates/content-subclass-loop-parent.php'));

  // Close the loop
  endwhile;?></ul> <?endif;

else:

  // Build the query
  $spell_query = new WP_Query( $spell_query_args );

  // Open the query loop
  if ( $spell_query->have_posts() ) : while ( $spell_query->have_posts() ) : $spell_query->the_post();
	
   if ( $guide_type == 'Subclass Loop') :

        include(locate_template('loop-templates/content-subclass-loop.php'));

    elseif ( get_field('full_subclass_guide') ) : 

		include(locate_template('loop-templates/content-class-full-subclass.php'));

	else :

		include(locate_template('loop-templates/content-class-subclass.php'));

	endif;

  // Close the loop
  endwhile; endif;

endif;

// Clean up
$spell_query = null;
wp_reset_postdata() 
?>