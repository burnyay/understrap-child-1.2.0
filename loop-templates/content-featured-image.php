<div class="blog-featured-image">	
<?php the_post_thumbnail('blog'); ?>
<div class="credit">
<?php 
    $name_of_artist = get_field('name_of_artist');
    $name_of_the_rights_holder = get_field('name_of_the_rights_holder');
    $the_title_of_the_art = get_field('the_title_of_the_art');

    if( $name_of_artist ) { ?>
        <p class="arist-name"><?php echo $name_of_artist; ?> - <?php echo $name_of_the_rights_holder; ?> - <?php echo $the_title_of_the_art; ?></p>
<?php } ?>
</div>	
</div>