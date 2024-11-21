<?php
/**
* A Simple Category Template
*/
 
get_header(); ?> 
 
<section id="primary" class="site-content archive">
	<div id="content" role="main">
		<div class="grid">

			<?php 
			// Check if there are any posts to display
			if ( have_posts() ) : ?>
			 
			<div class="archive-header">
				<h1 class="archive-title"><?php single_cat_title( '', true ); ?> Posts</h1>
				 
				 
				<?php
				// Display optional category description
				 if ( category_description() ) : ?>
				<div class="archive-meta"><?php echo category_description(); ?></div>
				<?php endif; ?>
			</div>
			<div class="article-loop">
				<?php
				 
				// The Loop
				while ( have_posts() ) : the_post();
				get_template_part('template-parts/content-post-featured');
				 
				 endwhile; 

				 wp_reset_postdata();
				 
				else: ?>
				<p>Sorry, no posts matched your criteria.</p>
				 
				 
				<?php endif; ?>

				<div class="pagination">
					<?php echo paginate_links(); ?>
				</div>
			</div>
			<div class="archive-sidebar">
				<?php get_sidebar(); ?>
			</div>
		</div>
	</div>
</section>
 
 

<?php get_footer(); ?>