<div id="<?php global $post; echo $post->post_name; ?>" <?php 
$subclass_sources = get_the_terms( $post->ID, 'source' ); 
if($subclass_sources):
	if ($subclass_sources[0]-> slug):?>
	class="subclass-loop__item source
	<?php echo $subclass_sources[0]-> slug;?>
	"
	<?php endif; ?>
<?php endif; ?>
	><h2 class="
		<?php 
			$rating = get_field( 'rating' );  
			if( $rating ): 
				echo $rating->slug;  
			endif;?>
	"><? if (get_field('full_subclass_guide')):?>
		<?php 
			$subclass_name = get_the_title(); 
			echo $subclass_name;
		?>
	<? else: ?>
		<?php 
			$subclass_name = get_the_title(); 
			echo $subclass_name;
		?>
	<? endif; ?></h2>
	<p><?php the_field('subclass_intro');?></p>
	<? if (get_field('full_subclass_guide')):?>
		Check out our <a href="<? the_permalink(); ?>"><? echo $subclass_name; ?> 5e guide</a> for a more in-depth breakdown of the <? echo $subclass_name; ?> subclass, including build recommendations, playstyle breakdowns, and an example build.
	<?php endif;?>
		<?php if( have_rows('features') ): ?>
			<?php while( have_rows('features') ): the_row(); ?>
					<h3><?php the_sub_field('level'); ?></h3>
					<?php if( have_rows('feature') ):?> <? while( have_rows('feature') ): the_row(); 

						$spells = get_sub_field('spells-feature'); if ($spells): ?>
							<p><span class="<?php $spell_list_rating = get_sub_field( 'spell_list_rating' );  
							echo $spell_list_rating->slug; ?>"><strong><?php the_title(); ?> spells</strong></span>: <?php the_sub_field( 'spell_list_rating_text' ); ?></p>
							<?php if( have_rows('spells') ): while( have_rows('spells') ): the_row(); ?>
								<p><strong><?php the_sub_field('levels'); ?></strong></p>
								<?php 
								$spells_learned = get_sub_field('spells_learned');
								if( $spells_learned ): ?>
									<ul>
									<?php foreach( $spells_learned as $spell_learned ): ?>
										<?php include(locate_template('loop-templates/content-subclass-spell.php')); ?>
									<?php endforeach; ?>
									</ul>
								<?php endif; ?>
							<?php endwhile; endif; ?>
						<?php else: ?>
							<div class="subclass-loop-feature-rating">
								<? the_sub_field('feature_rating'); ?>
							</div>
						<? endif;
					endwhile; endif; ?>
				<?php endwhile;?>
			<?php endif;?>
	</div>