<?php
get_header();
$full_spell_guide = get_field('full_spell_guide');
?>

<div class="grid">
	<div class="flex">
		<aside class="sidebar left">
		</aside>
		<main class="post-content">
			<article>
				<div class=" spell-name"><h1>
					<?php if ($full_spell_guide): ?>
						<?php the_title(); ?> 5e Guide
					<?php else: ?>
						<?php the_title(); ?>
					<?php endif; ?>
					</h1>
				</div>
					<div class="spell-info">
						<div class=" spell-level">
							<?php 
							$level = get_field('level');
							$level_name = esc_html( $level->name ); 
							
							$school_fields = get_field('school');
							if( $school_fields ):
							    foreach( $school_fields as $school_field ):
							       $school = esc_html( $school_field->name );
							    endforeach;
							endif;

							if($level_name == 'Cantrip'): 
								echo $school .' '. $level_name;
							else:
								echo $level_name .' '. $school;
							endif; ?>
						</div> 
					</div>
					<div class="spell-meta">

						<?php $sources = get_the_terms( $post->ID, 'source' );
						if (! $sources || $full_spell_guide) :
						get_template_part('template-parts/spell-meta'); 
						endif; ?>

						<div class="damage">
							<?php
							//Cantrip
							if ($level->name == "Cantrip") {
								if( have_rows('cantrip-damage') ):
								while( have_rows('cantrip-damage') ): the_row();

									$level1cantip = get_sub_field('level_1_damage_cantrip');
										if( have_rows('level_1_damage_cantrip') ):
										while( have_rows('level_1_damage_cantrip') ): the_row();
											$cantriplevel1dice = get_sub_field('Level_1_dice_rolled_cantrip');
											$cantriplevel1min = get_sub_field('level_1_min_damage_cantrip');
											$cantriplevel1avg = get_sub_field('level_1_avg_damage_cantrip');
											$cantriplevel1max = get_sub_field('level_1_max_damage_cantrip');
										endwhile;
										endif;
									$level5cantrip = get_sub_field('level_5_damage_cantrip');
										if( have_rows('level_5_damage_cantrip') ):
										while( have_rows('level_5_damage_cantrip') ): the_row();
											$cantriplevel5dice = get_sub_field('Level_5_dice_rolled_cantrip');
											$cantriplevel5min = get_sub_field('level_5_min_damage_cantrip');
											$cantriplevel5avg = get_sub_field('level_5_avg_damage_cantrip');
											$cantriplevel5max = get_sub_field('level_5_max_damage_cantrip');
										endwhile;
										endif;
									$level11cantrip = get_sub_field('level_11_damage_cantrip');
										if( have_rows('level_11_damage_cantrip') ):
										while( have_rows('level_11_damage_cantrip') ): the_row();
											$cantriplevel11dice = get_sub_field('Level_11_dice_rolled_cantrip');
											$cantriplevel11min = get_sub_field('level_11_min_damage_cantrip');
											$cantriplevel11avg = get_sub_field('level_11_avg_damage_cantrip');
											$cantriplevel11max = get_sub_field('level_11_max_damage_cantrip');
										endwhile;
										endif;
									$level19cantrip = get_sub_field('level_19_damage_cantrip');
										if( have_rows('level_19_damage_cantrip') ):
										while( have_rows('level_19_damage_cantrip') ): the_row();
											$cantriplevel19dice = get_sub_field('Level_19_dice_rolled_cantrip');
											$cantriplevel19min = get_sub_field('level_19_min_damage_cantrip');
											$cantriplevel19avg = get_sub_field('level_19_avg_damage_cantrip');
											$cantriplevel19max = get_sub_field('level_19_max_damage_cantrip');
										endwhile;
										endif;
									endwhile;
									endif;

									if($cantriplevel1dice): ?>
										<table>
										  <tr>
											<th></th>
											<th>Level 1</th>
											<th>Level 5</th>
											<th>Level 11</th>
											<th>Level 19</th>
										  </tr>
										  <tr>
											<td>Damage Dice</td>
											<td><?php echo $cantriplevel1dice; ?></td>
											<td><?php echo $cantriplevel5dice; ?></td>
											<td><?php echo $cantriplevel11dice; ?></td>
											<td><?php echo $cantriplevel19dice; ?></td>
										  </tr>
										  <tr>
											<td>Min Damage</td>
											<td><?php echo $cantriplevel1min; ?></td>
											<td><?php echo $cantriplevel5min; ?></td>
											<td><?php echo $cantriplevel11min; ?></td>
											<td><?php echo $cantriplevel19min; ?></td>
										  </tr>
										  <tr>
											<td>Average Damage</td>
											<td><?php echo $cantriplevel1avg; ?></td>
											<td><?php echo $cantriplevel5avg; ?></td>
											<td><?php echo $cantriplevel11avg; ?></td>
											<td><?php echo $cantriplevel19avg; ?></td>
										  </tr>
										  <tr>
											<td>Max Damage</td>
											<td><?php echo $cantriplevel1max; ?></td>
											<td><?php echo $cantriplevel5max; ?></td>
											<td><?php echo $cantriplevel11max; ?></td>
											<td><?php echo $cantriplevel19max; ?></td>
										  </tr>
										</table>
									<?php endif;
							} ?>

							<?php
							//Non Cantrip
							if ($levels->name !== "Cantrip") {
								if( have_rows('damage') ):
								while( have_rows('damage') ): the_row();
									$level1 = get_sub_field('level_1_damage');
										if( have_rows('level_1_damage') ):
										while( have_rows('level_1_damage') ): the_row();
											$level1dice = get_sub_field('Level_1_dice_rolled');
											$level1min = get_sub_field('level_1_min_damage');
											$level1avg = get_sub_field('level_1_avg_damage');
											$level1max = get_sub_field('level_1_max_damage');
										endwhile;
										endif;
									$level2 = get_sub_field('level_2_damage');
									if( have_rows('level_2_damage') ):
									while( have_rows('level_2_damage') ): the_row();
										$level2dice = get_sub_field('Level_2_dice_rolled');
										$level2min = get_sub_field('level_2_min_damage');
										$level2avg = get_sub_field('level_2_avg_damage');
										$level2max = get_sub_field('level_2_max_damage');
									endwhile;
									endif;
									$level3 = get_sub_field('level_3_damage');
									if( have_rows('level_3_damage') ):
									while( have_rows('level_3_damage') ): the_row();
										$level3dice = get_sub_field('Level_3_dice_rolled');
										$level3min = get_sub_field('level_3_min_damage');
										$level3avg = get_sub_field('level_3_avg_damage');
										$level3max = get_sub_field('level_3_max_damage');
									endwhile;
									endif;
									$level4 = get_sub_field('level_4_damage');
									if( have_rows('level_4_damage') ):
									while( have_rows('level_4_damage') ): the_row();
										$level4dice = get_sub_field('Level_4_dice_rolled');
										$level4min = get_sub_field('level_4_min_damage');
										$level4avg = get_sub_field('level_4_avg_damage');
										$level4max = get_sub_field('level_4_max_damage');
									endwhile;
									endif;
									$level5 = get_sub_field('level_5_damage');
									if( have_rows('level_5_damage') ):
									while( have_rows('level_5_damage') ): the_row();
										$level5dice = get_sub_field('Level_5_dice_rolled');
										$level5min = get_sub_field('level_5_min_damage');
										$level5avg = get_sub_field('level_5_avg_damage');
										$level5max = get_sub_field('level_5_max_damage');
									endwhile;
									endif;
									$level6 = get_sub_field('level_6_damage');
									if( have_rows('level_6_damage') ):
									while( have_rows('level_6_damage') ): the_row();
										$level6dice = get_sub_field('Level_6_dice_rolled');
										$level6min = get_sub_field('level_6_min_damage');
										$level6avg = get_sub_field('level_6_avg_damage');
										$level6max = get_sub_field('level_6_max_damage');
									endwhile;
									endif;
									$level7 = get_sub_field('level_7_damage');
									if( have_rows('level_7_damage') ):
									while( have_rows('level_7_damage') ): the_row();
										$level7dice = get_sub_field('Level_7_dice_rolled');
										$level7min = get_sub_field('level_7_min_damage');
										$level7avg = get_sub_field('level_7_avg_damage');
										$level7max = get_sub_field('level_7_max_damage');
									endwhile;
									endif;
									$level8 = get_sub_field('level_8_damage');
									if( have_rows('level_8_damage') ):
									while( have_rows('level_8_damage') ): the_row();
										$level8dice = get_sub_field('Level_8_dice_rolled');
										$level8min = get_sub_field('level_8_min_damage');
										$level8avg = get_sub_field('level_8_avg_damage');
										$level8max = get_sub_field('level_8_max_damage');
									endwhile;
									endif;
									$level9 = get_sub_field('level_9_damage');
									if( have_rows('level_9_damage') ):
									while( have_rows('level_9_damage') ): the_row();
										$level9dice = get_sub_field('Level_9_dice_rolled');
										$level9min = get_sub_field('level_9_min_damage');
										$level9avg = get_sub_field('level_9_avg_damage');
										$level9max = get_sub_field('level_9_max_damage');
									endwhile;
									endif;
								endwhile;
								endif;

								if ($level1min or $level2min or $level3min or $level4min or $level5min or $level6min or $level7min or $level8min or $level9min) { ?>
								<table class="desktop">
								  <tr>
									<th></th>
									<th>1st</th>
									<th>2nd</th>
									<th>3rd</th>
									<th>4th</th>
									<th>5th</th>
									<th>6th</th>
									<th>7th</th>
									<th>8th</th>
									<th>9th</th>
								  </tr>
								  <tr>
									<td>Damage Dice</td>
									<td><?php echo $level1dice; ?></td>
									<td><?php echo $level2dice; ?></td>
									<td><?php echo $level3dice; ?></td>
									<td><?php echo $level4dice; ?></td>
									<td><?php echo $level5dice; ?></td>
									<td><?php echo $level6dice; ?></td>
									<td><?php echo $level7dice; ?></td>
									<td><?php echo $level8dice; ?></td>
									<td><?php echo $level9dice; ?></td>
								  </tr>
								  <tr>
									<td>Min Damage</td>
									<td><?php echo $level1min; ?></td>
									<td><?php echo $level2min; ?></td>
									<td><?php echo $level3min; ?></td>
									<td><?php echo $level4min; ?></td>
									<td><?php echo $level5min; ?></td>
									<td><?php echo $level6min; ?></td>
									<td><?php echo $level7min; ?></td>
									<td><?php echo $level8min; ?></td>
									<td><?php echo $level9min; ?></td>
								  </tr>
								  <tr>
									<td>Average Damage</td>
									<td><?php echo $level1avg; ?></td>
									<td><?php echo $level2avg; ?></td>
									<td><?php echo $level3avg; ?></td>
									<td><?php echo $level4avg; ?></td>
									<td><?php echo $level5avg; ?></td>
									<td><?php echo $level6avg; ?></td>
									<td><?php echo $level7avg; ?></td>
									<td><?php echo $level8avg; ?></td>
									<td><?php echo $level9avg; ?></td>
								  </tr>
								  <tr>
									<td>Max Damage</td>
									<td><?php echo $level1max; ?></td>
									<td><?php echo $level2max; ?></td>
									<td><?php echo $level3max; ?></td>
									<td><?php echo $level4max; ?></td>
									<td><?php echo $level5max; ?></td>
									<td><?php echo $level6max; ?></td>
									<td><?php echo $level7max; ?></td>
									<td><?php echo $level8max; ?></td>
									<td><?php echo $level9max; ?></td>
								  </tr>
								</table>
								<table class="mobile">
								  <tr>
									<th>Lvl</th>
									<th>Dice</th>
									<th>Min</th>
									<th>Avg</th>
									<th>Max</th>
								  </tr>
								  <tr>
									<td>1st</td>
									<td><?php echo $level1dice; ?></td>
									<td><?php echo $level1min; ?></td>
									<td><?php echo $level1avg; ?></td>
									<td><?php echo $level1max; ?></td>  
								  </tr>
								  <tr>
									<td>2nd</td>
									<td><?php echo $level2dice; ?></td>
									<td><?php echo $level2min; ?></td>
									<td><?php echo $level2avg; ?></td>
									<td><?php echo $level2max; ?></td>
									</tr>
								  <tr>
									<td>3rd</td>
									<td><?php echo $level3dice; ?></td>
									<td><?php echo $level3min; ?></td>
									<td><?php echo $level3avg; ?></td>
									<td><?php echo $level3max; ?></td>
									</tr>
								  <tr>
									<td>4th</td>
									<td><?php echo $level4dice; ?></td>
									<td><?php echo $level4min; ?></td>
									<td><?php echo $level4avg; ?></td>
									<td><?php echo $level4max; ?></td>
									</tr>
								  <tr>
									<td>5th</td>
									<td><?php echo $level5dice; ?></td>
									<td><?php echo $level5min; ?></td>
									<td><?php echo $level5avg; ?></td>
									<td><?php echo $level5max; ?></td>
									</tr>
								  <tr>
									<td>6th</td>
									<td><?php echo $level6dice; ?></td>
									<td><?php echo $level6min; ?></td>
									<td><?php echo $level6avg; ?></td>
									<td><?php echo $level6max; ?></td>
									</tr>
								  <tr>
									<td>7th</td>
									<td><?php echo $level7dice; ?></td>
									<td><?php echo $level7min; ?></td>
									<td><?php echo $level7avg; ?></td>
									<td><?php echo $level7max; ?></td>
									</tr>
								  <tr>
									<td>8th</td>
									<td><?php echo $level8dice; ?></td>
									<td><?php echo $level8min; ?></td>
									<td><?php echo $level8avg; ?></td>
									<td><?php echo $level8max; ?></td>
									</tr>
								  <tr>
									<td>9th</td>
									<td><?php echo $level9dice; ?></td>
									<td><?php echo $level9min; ?></td>
									<td><?php echo $level9avg; ?></td>
									<td><?php echo $level9max; ?></td>
									</tr>
								</table>
								<?php }
								?>
							<?php } ?>
						</div>
					<h2>Is <?php $spell_title = get_the_title(); echo $spell_title; ?> Good?</h2>
					<div class="class-rating">
						<div class="class-rating__row">
							<?php $parent_rating = get_field( 'parent_rating' );
								if($parent_rating): ?>
							<p>Overall Rating: <strong><span class="<?php if($parent_rating): echo $parent_rating->slug; endif;?>"><?php if($parent_rating): $parent_rating_name = $parent_rating->name; echo $parent_rating_name;?></span></strong>. This means that
							<?php if($parent_rating_name == 'Red'):?>
								<em><?php echo strtolower($spell_title); ?></em> isn’t going to contribute to the effectiveness of your character build at all.
							<?php elseif($parent_rating_name == 'Orange'): ?>
								<em><?php echo strtolower($spell_title); ?></em> is an OK spell.
							<?php elseif($parent_rating_name == 'Green'): ?>
								<em><?php echo strtolower($spell_title); ?></em> is a good spell.
							<?php elseif($parent_rating_name == 'Blue'): ?>
								<em><?php echo strtolower($spell_title); ?></em> is a great spell and you should strongly consider this spell for your character.
							<?php elseif($parent_rating_name == 'Sky Blue'): ?>
								<em><?php echo strtolower($spell_title); ?></em> is an amazing spell. If you do not take this spell your character would not be optimized.
							<?php elseif($parent_rating_name == 'Black'): ?>
								<em><?php echo strtolower($spell_title); ?></em> has vastly different ratings based on how you plan on using it.
							<?php endif; ?>
							 <?php endif;?></p> 
							<p>Overall Notes: <?php the_field('parent_rating_text', false, false);?></p>
							<?php endif; ?>
							<?php
								if( have_rows('class_rating') ): while( have_rows('class_rating') ): the_row(); ?>
									
									<?php if( have_rows('class') ): ?>
									<h3>Class Specific Ratings for <?php the_title(); ?></h3>
									<?php while( have_rows('class') ): the_row(); ?>
										<?php $class_selection = get_sub_field('class_selection');
											if ($class_selection):
												$class_selection_title = esc_html($class_selection->post_title);
												$class_selection_permalink = get_permalink( $class_selection->ID );
												$class_selection_slug = $class_selection->post_name;
												$subclass_check = has_post_parent( $class_selection->ID );
												$full_subclass_check = get_field('full_subclass_guide', $class_selection->ID );
												$subclass_parent_id = wp_get_post_parent_id($class_selection->ID);
											endif; ?>
										<?php if( have_rows('class_selection_rating') ): while( have_rows('class_selection_rating') ): the_row();?>
											<p><span class="
			    								<?php $class_specific_rating = get_sub_field( 'class_specific_rating' ); 
			    									if ($class_specific_rating) {
			    										echo $class_specific_rating->slug; 
			    									} ?> ">
			    									<strong><a href="
														<?php if ($subclass_check):?><?php $subclass_parent_permalink = get_permalink( $subclass_parent_id );
															$subclass_parent_title = strtolower(get_the_title(( $subclass_parent_id ))); ?><?php if ($full_subclass_check):?><?php echo $class_selection_permalink ?>"><?php echo $class_selection_title . ' ' . $subclass_parent_title; ?><?php else: ?><?php echo $subclass_parent_permalink . '#' . $class_selection_slug ?>"><?php echo $class_selection_title . ' ' . $subclass_parent_title; ?><?php endif; ?><?php else: ?><?php echo $class_selection_permalink ?>"><?php echo $class_selection_title; ?><?php endif; ?></a></strong></span>: <?php the_sub_field('rating_text', false, false); ?></p>
				    					<?php endwhile;endif;
				    				endwhile;endif;
								endwhile;endif;
							?>
						</div>
					</div>	
					<?php if ($full_spell_guide): ?>
						<?php if (get_field('how_to_use')): ?>
							<h2>How to Use <?php the_title();?> Effectively in 5e</h2>
							<?php the_field('how_to_use'); ?>
						<?php endif; ?>
						<?php if( have_rows('vs') ): ?>
    						<?php while( have_rows('vs') ): the_row(); ?>
							<?php if (get_sub_field('vs_intro')): ?>
								<h2><?php the_title();?>
								<?php if( have_rows('vs_repeater') ): ?>
    								<?php while( have_rows('vs_repeater') ): the_row();
										$vs_spell_picker = get_sub_field('vs_spell_picker');
										if( $vs_spell_picker ): ?>
											VS <?php echo esc_html( $vs_spell_picker->post_title ); ?>

										<?php endif; ?>
									<?php endwhile; ?>
								<?php endif; ?>
								</h2>
								<?php the_sub_field('vs_intro');?>
								<p><span class=""><strong><?php the_title();?></strong></span>: <?php the_sub_field('current_spell_vs_text', false, false);?></p>
								<?php if( have_rows('vs_repeater') ): ?>
    								<?php while( have_rows('vs_repeater') ): the_row();
										$vs_spell_picker = get_sub_field('vs_spell_picker');
										if( $vs_spell_picker ): ?>
											<p><span class=""><strong><a href="<?echo get_permalink( $vs_spell_picker->ID );?>"><?php echo get_the_title($vs_spell_picker->ID);?></a></strong></span>: <?php echo get_sub_field( 'vs_spell_picker_text', false, false, $vs_spell_picker->ID );?></p>
										<?php endif; ?>
									<?php endwhile; ?>
								<?php endif; ?>
								<?php the_sub_field('vs_outro');?>
								<?php endif; ?>
							<?php endwhile; ?>
						<?php endif; ?>
					<?php endif; ?>
					<?php if( have_rows('extra_section') ): ?>
						<?php while( have_rows('extra_section') ): the_row(); ?>
						<h2><? the_sub_field('title'); ?></h2>
							<? the_sub_field('content'); ?>
						<?php endwhile; ?>
					<?php endif; ?>
					<?php if( get_field('faq') ): ?>
						<div class="faq__wrapper">
						<script type="application/ld+json">{
						"@context": "https://schema.org",
						  "@type": "FAQPage",
						 "mainEntity": [
						 <?php $faq_repeater = get_field('faq_repeater');
						 $last_row = end($faq_repeater);
						 $last_row_title = $last_row['faq_title'];?>
						 <?php if( have_rows('faq_repeater') ): ?>
							<?php while( have_rows('faq_repeater') ): the_row(); ?>
							<?php $faq_title = get_sub_field('faq_title'); ?>
							 {"@type": "Question",
							"name":"<?php echo $faq_title;?>",
							 "acceptedAnswer": {
							  "@type": "Answer",
							  "text": "<?php the_sub_field('faq_body');?>"
							  }
							  } <?php if( $last_row_title !== $faq_title ){ echo ','; } ?>
							<?php endwhile; endif; ?>
							]
							}
						</script>
						<h2 id="<? echo $hypenated_name ?>-faqs"><?php the_title();?> 5e FAQs</h2>
							<?php if( have_rows('faq_repeater') ): ?>
							<?php while( have_rows('faq_repeater') ): the_row(); ?>
							<h3><?php the_sub_field('faq_title');?></h3>
							<p><?php the_sub_field('faq_body');?></p>
							<?php endwhile; endif; ?>
						</div>
					<?php endif; ?>
					<?php if ($full_spell_guide): ?>
						<?php if (get_field('closing_thoughts')): ?>
							<h2>Closing Thoughts</h2>
							<?php the_field('closing_thoughts'); ?>
						<?php endif; ?>
					<?php endif; ?>
				</div>
			</article>
		</main>
	</div>
</div>

<?php
get_footer();
?>