<div id="<?php global $post; echo $post->post_name; ?>" <?php 
$subclass_sources = get_the_terms( $post->ID, 'source' ); 
if($subclass_sources):
	if ($subclass_sources[0]-> slug):?>
	class="source
	<?php echo $subclass_sources[0]-> slug;?>
	"
	<?php endif; ?>
<?php endif; ?>
	><h4 class="
		<?php 
			$rating = get_field( 'rating' );  
			if( $rating ): 
				echo $rating->slug;  
			endif;?>
	">
		<?php 
			$subclass_name = get_the_title(); 
			echo $subclass_name;
		?>
	</h4>
	<p><?php the_field('subclass_intro');?></p>
<?php if( have_rows('features') ): ?>
	<ul>
	<?php while( have_rows('features') ): the_row(); ?>
		<li>
			<?php the_sub_field('level'); ?>
		</li>
			<?php if( have_rows('feature') ): while( have_rows('feature') ): the_row(); 

				$spells = get_sub_field('spells-feature'); if ($spells): ?>
					<ul><li><span class="<?php $spell_list_rating = get_sub_field( 'spell_list_rating' );  
					echo $spell_list_rating->slug; ?>"><strong><?php the_title(); ?> spells</strong></span>: <?php the_sub_field( 'spell_list_rating_text' ); ?></li>
					<?php if( have_rows('spells') ): while( have_rows('spells') ): the_row(); ?>
						<ul><li><?php the_sub_field('levels'); ?></li>
						<?php 
						$spells_learned = get_sub_field('spells_learned');
						if( $spells_learned ): ?>
						    <ul>
						    <?php foreach( $spells_learned as $spell_learned ): ?>
					            <?php include(locate_template('loop-templates/content-subclass-spell.php')); ?>
						    <?php endforeach; ?>
						    </ul>
						<?php endif; ?>
						</ul>
					<?php endwhile; endif; ?>
					</ul>
				<?php else:
					the_sub_field('feature_rating');
				endif;
			endwhile; endif; ?>
		<?php endwhile;?>
	</ul>
<?php endif;?>
</div>