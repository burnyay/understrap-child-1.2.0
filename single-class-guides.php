<?php get_header(); ?>

<?php 
$guide_type = get_field('guide_type');
?>

<?php get_template_part('loop-templates/content-article-schema'); ?>
<div class="grid">
	<?php get_template_part('template-parts/breadcrumbs'); ?>
	<div class="flex">
		<?php 
			if (has_post_parent() && $guide_type == 'Races'): 
				get_template_part('loop-templates/content-class-guide-race');
			elseif(has_post_parent() && $guide_type == 'Spells'):
				get_template_part('loop-templates/content-class-guide-spell');
			elseif (has_post_parent() && $guide_type == 'Subclass'): 
				get_template_part('loop-templates/content-class-guide-subclass-guide');
			elseif (has_post_parent() && $guide_type == 'Feats'): 
				get_template_part('loop-templates/content-class-guide-feats');
			elseif (has_post_parent() && $guide_type == 'Subclass Loop'): 
				get_template_part('loop-templates/content-class-guide-subclass-loop');
			else:  
				get_template_part('loop-templates/content-class-guide');
			endif;
		?>

	</div>
	<?php comments_template(); ?>
</div>	


<?php 

get_footer();

?>