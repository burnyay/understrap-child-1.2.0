<div class="blog-date">
<?php 
	$u_time = get_the_time('U'); 
	$u_modified_time = get_the_modified_time('U');
	echo "<p>Published on ";
	echo the_time('F j, Y');

if ($u_modified_time >= $u_time + 86400) { 
	echo ", Last modified on ";
	echo the_modified_time('F jS, Y');
} 

echo"</p>"; 

?>

</div>
<div class="blog-excerpt">
<?php 
if ( ! has_excerpt() ) {
    echo '';
} else { 
    the_excerpt();
}
?>
</div>
<div class="spotlight-holder-mobile">
	<? include(locate_template('loop-templates/content-sidebar-spotlight.php')); ?>
</div>
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
<div class="affiliate">Arcane Eye may earn a small commission from affiliate links in this article. <a href="/privacy-policy/">Learn more.</a></div>