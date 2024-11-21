<div id="author-info">
  <div id="author-avatar">
    <?php echo get_avatar( get_the_author_meta( 'ID' ), 150 ); ?>
  </div>
  <div id="author-description">
    <h3><?php the_author_link(); ?></h3>
    <?php the_author_meta('description'); ?>
    </div>
</div>