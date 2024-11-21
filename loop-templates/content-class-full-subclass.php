<div id="<?php global $post; echo $post->post_name; ?>" <?php 
$subclass_sources = get_the_terms( $post->ID, 'source' ); 
if ($subclass_sources[0]-> slug):?>
class="source
<?php echo $subclass_sources[0]-> slug;?>
"
<?php endif; ?>
	><h4 class="
		<?php 
			$rating = get_field( 'rating' );  
			if( $rating ): 
				echo $rating->slug;  
			endif;?>
	">
		<a href="<?php the_permalink(); ?>">
			<?php 
				$subclass_name = get_the_title(); 
				echo $subclass_name;
			?>
		</a>
	</h4>
	<p><?php the_field('subclass_intro');?></p>
	<p>Check out our <a href="<?php the_permalink(); ?>"><?php the_title();?>  <?echo get_the_title( $post->post_parent );?> 5e Guide</a> for build optimization tips.</p>
</div>