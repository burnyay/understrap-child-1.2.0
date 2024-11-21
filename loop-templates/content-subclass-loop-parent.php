<li id="<?php global $post; echo $post->post_name; ?>" <?php 
$subclass_sources = get_the_terms( $post->ID, 'source' ); 
if($subclass_sources):
	if ($subclass_sources[0]-> slug):?>
	class="subclass-loop__item source
	<?php echo $subclass_sources[0]-> slug;?>
	"
	<?php endif; ?>
<?php endif; ?>
	><span class="
		<?php 
			$rating = get_field( 'rating' );  
			if( $rating ): 
				echo $rating->slug;  
			endif;?>
	"><strong><?php $subclass_name = get_the_title(); echo $subclass_name;?></strong></span>: <?php the_field('subclass_intro');?>
	</li>