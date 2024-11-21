<div class="spell-summary">
  <div class="spell-summary__content accordion">
    <div class="spell-summary__title">
	    <div class="spell-info">
	    	<div class="column spell-name">
	    		<?php the_title(); ?> 
	    		<?php if (get_field('requires_concentration') == 'TRUE') {?>
	    			<span class="concentration">C</span>
	    		<?php } ?>
	    	</div>
	    	<div class="column spell-level">
	    		<?php 
				$level = get_field('level');
	    		foreach( $level as $levels ): ?>
				<?php echo esc_html( $levels->name ); ?>
				<?php endforeach; ?>
			</div> 
			<div class="column casting-time">
	    		<?php the_field('casting_time'); 

    			$casting_time_condition = get_field('reaction_condition');

	    		if ($casting_time_condition) {
	    			echo '*';
	    		}
	    		?>

			</div>
			<div class="column range">
	    		<?php the_field('range'); ?>
			</div>
			<div class="column duration">
	    		<?php if (get_field('requires_concentration') == 'TRUE') {?>Concentration, <?php } ?><?php the_field('duration') ?>
			</div>
			<div class="column school">
	    	<?php 
			//School
			$school = get_field('school');
			if( $school ): ?>
			    <?php foreach( $school as $schools ): ?>
			        <?php echo esc_html( $schools->name ); ?>
			    <?php endforeach; ?>
			<?php endif; ?>
			</div>
    	</div>
	</div>	
	<div class="spell-meta">
    	<?php get_template_part('template-parts/spell-meta'); ?>
    	<a href="<?php the_permalink(); ?>" class="nu gray">View Spell Page ></a>
	</div>
  </div>
</div>