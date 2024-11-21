<div class="wrapper <?php if (get_sub_field('background_image_row')):?>background-image<? endif;?> <?php the_sub_field('css_class'); ?>" <? if(get_sub_field('id')):?>id="<? the_sub_field('id');?>"<? endif;?>>  
	<?php if (get_sub_field('background_image_row')) {?>
		<div class="background" style="background-image:url(<?php the_sub_field('background_image_row'); ?>)"></div>
	<?php }?>
	<div class="container">
		<div class="row">
			<?php 
			if( have_rows('column') ):
				while ( have_rows('column') ) : the_row();
			
					$css_class = get_sub_field('css_class');
					$wysiwyg_or_plain_html = get_sub_field('wysiwyg_or_plain_html'); 
					
					if ($wysiwyg_or_plain_html == "Plain HTML") {
						$content = get_sub_field('content', false, false);
					} else {
						$content = get_sub_field('content');
					}

					$column_content_css = get_sub_field('column_content_css');


					?>
						<div class="column <?php the_sub_field('css_class'); ?>" <?php if (get_sub_field('background_image_column')) {?>style="background-image:url(<?php the_sub_field('background_image_column'); ?>)" <?php } ?>>
							<div class="column-content" <? if( $column_content_css ): ?> style="<? echo $column_content_css;?>" <? endif; ?> >
								<?php 
									echo $content ; 
								?>
							</div>
						</div>

				<?php endwhile;
			endif;	
			?>
		</div> <!----row---->
	</div> <!----container---->
	<? 	if (get_sub_field('scroll')): ?>
		<div class="scroll">
			<a href="#next">
				<img src="<? the_sub_field('scroll_image'); ?>">
				Scroll to learn more
			</a>
		</div>
	<? endif; ?>
</div> <!----wrapper---->