<?php

get_header();

?>
<?php 				
$u_time = get_the_time('U'); 
$u_modified_time = get_the_modified_time('U');
?>
<script type="application/ld+json">
    {
      "@context": "https://schema.org",
      "@type": "NewsArticle",
      "mainEntityOfPage": {
        "@type": "WebPage",
        "@id": "<?php the_permalink(); ?>"
      },
      "headline": "<?php the_title(); ?>",
      "image": [
        "<?php the_post_thumbnail_url(); ?> "
      ],
      "datePublished": "<?php echo the_time('Y-m-d h:i:s'); ?>",
      "dateModified": "<?php echo the_modified_time('Y-m-d h:i:s'); ?>",
      "author": {
        "@type": "Person",
        "name": "<?php the_author(); ?>"
      },
      "publisher": {
        "@type": "Organization",
        "name": "Arcane Eye",
        "logo": {
          "@type": "ImageObject",
          "url": "https://arcaneeyedev.flywheelstaging.com/wp-content/uploads/2020/05/istock-1050788020-1.svg"
        }
      }
    }
</script>
<div class="grid">
	<div class="flex">
		<main class="post-content">
			<article class="main-content">
			  	<div class="blog-title"><h1 class="blog-single-title"><?php the_title(); ?> 5e </h1></div>
				<?php get_template_part('loop-templates/content-date-excerpt-thumbnail'); ?>
				<? $full_feat_guide = get_field('full_feat_guide'); ?>
				<? $title = get_the_title(); ?>
				<? $hypenated_name = strtolower(str_replace(' ', '-', $title));
			  if($full_feat_guide): ?>
					<? $what_is_it = get_field('what_is_it'); 
					if('$what_is_it'):?>
						<h2 id="what-is-<? echo $hypenated_name ?>">What Is <? the_title(); ?> 5e?</h2>
						<?php the_field('what_is_it'); ?>
					<? endif; ?>
					<h2 id="how-does-<? echo $hypenated_name ?>-work">How Does <? the_title(); ?> Work?</h2>
					<?php the_field('how_does_it_work'); ?>
					<h2 id="is-<? echo $hypenated_name ?>-good">Is <? the_title(); ?> Good?</h2>
					<? $rating_slug = get_the_terms( $post->ID, 'rating' );
				    	$feat_rating = $rating_slug[0]-> slug; 
				    	
					if( $feat_rating == 'sky-blue' ): ?>
					<p>We gave <? the_title(); ?> an S Tier rating In our <a href="/players/dnd-5e-feats-tier-list/">5e Feats Tier List</a>, making it among the most potent feats in D&amp;D 5e.</p>
					<? elseif( $feat_rating == 'blue' ): ?>
					<p>In our <a href="/players/dnd-5e-feats-tier-list/">5e Feats Tier List</a>, <? the_title(); ?> was given an A Tier rating, making it an excellent pickup for specific classes.</p>
					<? elseif( $feat_rating == 'green' ): ?>
					<p>In our <a href="/players/dnd-5e-feats-tier-list/">5e Feats Tier List</a>, <? the_title(); ?> was given a B Tier rating, making it a niche feat that can improve some builds in D&amp;D 5e.</p>
					<? elseif( $feat_rating == 'orange' ): ?>
					<p>We gave <? the_title(); ?> a C Tier rating In our <a href="/players/dnd-5e-feats-tier-list/">5e Feats Tier List</a>, making it a below-average feat in D&amp;D 5e.</p>
					<? elseif( $feat_rating == 'red' ): ?>
					<p>We gave <? the_title(); ?> a D Tier rating In our <a href="/players/dnd-5e-feats-tier-list/">5e Feats Tier List</a>, making it an underwhelming feat in most cases.</p>
					<? endif; ?>
					<?php the_field('is_it_good'); ?>
					<?php if (get_field('extra_section')): the_field('extra_section'); endif; ?>
					<? $interactions = get_field('interactions');
					if($interactions): ?>
					<h2 id="<? echo $hypenated_name ?>-interactions"><? the_title(); ?> 5e Interactions</h2>
					<?php the_field('interactions'); ?>
					<? endif; ?>
				<? else: ?>
					<?php the_content(); ?>
				<? endif; ?>
				<div class="class-ratings__wrapper">
					<?php if( have_rows('class_rating') ): ?>
						<h2 id="which-classes-make-the-most-of-<? echo $hypenated_name ?>?">Which 5e Classes Make the Most of <? the_title(); ?>?</h2>
					<section class="guide-intro">
						<p>The color code below has been implemented to help you identify, at a glance, how good the <? the_title(); ?> 5e feat is for a specific class/subclass.</p>
						<ul>
						<li><span style="color: #ff0000;"><strong>Red </strong></span>isn&rsquo;t going to contribute to the effectiveness of your character build at all</li>
						<li><span style="color: #ff6600;"><strong>Orange </strong></span>Situationally good, but a below-average option otherwise</li>
						<li><span style="color: #339966;"><strong>Green </strong></span>is a good option</li>
						<li><span style="color: #0000ff;"><strong>Blue </strong></span>is a great option, you should strongly consider this option for your character</li>
						<li><span style="color: #00ccff;"><strong>Sky Blue</strong></span>&nbsp;is an amazing option. If you do not take this option your character would not be optimized</li>
						</ul>
					</section>
					<?php the_field('after_rating_text'); ?>
					<?php while( have_rows('class_rating') ): the_row(); 
						if( have_rows('class') ): while( have_rows('class') ): the_row(); ?>
							<p><span class="

							<?php $rating = get_sub_field( 'rating' );  
							if( $rating ): 
								echo $rating->slug; 
							endif; ?>"><strong>

							<?php $class = get_sub_field('class');
							if( $class ):?>
							    <a href="<?php echo get_permalink( $class->ID ); ?>"><?php echo esc_html( $class->post_title ); ?></a><?php endif; ?></strong></span>: <?php 
							echo get_sub_field('rating_text', false, false); ?>
							</p>
						<?php endwhile; endif; 
					endwhile; endif;?>
				</div>
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
				<?php the_field('conclusion'); ?>
				<?php get_template_part('template-parts/subscribe'); ?>
				<div id="author-info">
					<div id="author-avatar">
						<?php echo get_avatar( get_the_author_meta( 'ID' ), 150 ); ?>
					</div>
					<div id="author-description">
						<h3><?php the_author_link(); ?></h3>
						<?php the_author_meta('description'); ?>
				    </div>
				</div>
			</article>
		</main>
		<aside class="sidebar left">
	  		<div id="ez-toc-container" class="ez-toc-v2_0_17 ez-toc-wrap-right counter-hierarchy ez-toc-grey">
				<div class="ez-toc-title-container">
					<p class="ez-toc-title">Table of Contents</p>
				</div>
				<nav>
					<? if($full_feat_guide): ?>
					<ul class="ez-toc-list ez-toc-list-level-1">
						<?php if($what_is_it):?>
							<li class="ez-toc-page-1 ez-toc-heading-level-2"><a class="ez-toc-link ez-toc-heading-1" href="#what-is-<? echo $hypenated_name ?>">What Is <? the_title(); ?>?</a></li>
						<?php endif; ?>
						<li class="ez-toc-page-1 ez-toc-heading-level-2"><a class="ez-toc-link ez-toc-heading-1" href="#how-does-<? echo $hypenated_name ?>-work">How Does <? the_title(); ?> Work?</a></li>
						<li class="ez-toc-page-1 ez-toc-heading-level-2"><a class="ez-toc-link ez-toc-heading-1" href="#is-<? echo $hypenated_name ?>-good">Is <? the_title(); ?> Good?</a></li>
						<?php if($interactions):?>
							<li class="ez-toc-page-1 ez-toc-heading-level-2"><a class="ez-toc-link ez-toc-heading-1" href="#<? echo $hypenated_name ?>-interactions"><? the_title(); ?> Interactions</a></li>
						<? endif; ?>
						<li class="ez-toc-page-1 ez-toc-heading-level-2"><a class="ez-toc-link ez-toc-heading-1" href="#which-classes-make-the-most-of-<? echo $hypenated_name ?>?">Which Classes Make the Most of <? the_title(); ?>?</a></li>
						<?php if( get_field('faq') ): ?><li class="ez-toc-page-1 ez-toc-heading-level-2"><a class="ez-toc-link ez-toc-heading-1" href="#<? echo $hypenated_name ?>-faqs"><? the_title();?> FAQs</a>

						
						<? endif; ?>
					</ul>
					<? endif; ?>
				</nav>
			</div>
			<div class="spotlight-holder">
				<? include(locate_template('loop-templates/content-sidebar-spotlight.php')); ?>
			</div>
		</aside>	
	</div>
	<?php comments_template(); ?>
</div>


<?php 

get_footer();

?>