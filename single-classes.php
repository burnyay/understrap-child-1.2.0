<?php

get_header();

?>

<div class="grid">
	<?php get_template_part('template-parts/breadcrumbs'); ?>
	<div class="flex">
		<main class="post-content">
			<div class="main-content">
			 	<div class="blog-title">
			    	<h1 class="blog-single-title"><?php the_title(); ?></h1>
			  	</div>
				<?php the_content(); ?>
				<?php get_template_part('template-parts/subscribe'); ?>
			</div>
		</main>
		<div class="sidebar left">
	  		<?php echo do_shortcode( '[toc]' ); ?>
		</div>	
	</div>
</div>


<?php 

comments_template(); 

get_footer();

?>