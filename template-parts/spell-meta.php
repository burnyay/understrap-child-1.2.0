<section class="spell-meta-section">
	<dl class="casting-time">
		<dt>Casting Time</dt>
			<dd 
			<?php $ritual = get_field('ritual');
				if ($ritual) {
					echo 'class="ritual-marker"'; 
				 } ?>>
			<?php $castingtime = get_field('casting_time');
				if ($castingtime) { 
					echo $castingtime; 
				}
			 	$reactioncondition = get_field('reaction_condition');
				if ($reactioncondition) { 
					echo ', ' . strtolower($reactioncondition); 
				} ?>
			</dd>
	</dl>
	<dl class="range">
		<dt>Range</dt>
		<dd>
		<?php the_field('range'); ?>
		</dd>
	</dl>
	<dl class="duration">
		<dt>Duration</dt>
		<dd>
		<?php if (get_field('requires_concentration') == 'TRUE') {?>Concentration, <?php } ?><?php $duration = get_field('duration');
		    	echo strtolower($duration); ?>
		</dd>
	</dl>
	<dl class="components">
		<?php 
		//components
		$components = get_field('components');
		if( $components ): ?>
	    	<dt>Components</dt>
		    <?php foreach( $components as $component ): ?>
		        <dd><?php echo esc_html( $component->name ); ?></dd>
		    <?php endforeach; ?>
		<?php endif; ?>
	</dl>
	<?php $materials_used = get_field('materials_used');
	if($materials_used):?>
	<dl class="material-used">
		<? if( $materials_used ): ?>
	    	<dt>Materials Required</dt>
	    	<dd>
		    <?php 
		    	$materials_used = get_field('materials_used');
		    	echo ucfirst(strtolower($materials_used)); 
		    ?>
			</dd>
		<?php endif; ?>
	</dl>
	<? endif ?>

	<dl class="class">
	<?php 
		//class
		$class = get_field('class');
		if( $class ): ?>
	    	<dt>Class</dt>
		    <?php foreach( $class as $classes ): ?>
		        <dd><a href="<?php echo esc_url( $classes->description ); ?>"><?php echo esc_html( $classes->name ); ?></a></dd>
		    <?php endforeach; ?>
		<?php endif; ?>
	</dl>
</section>
<? if ( is_singular( 'spells' ) ): ?>
<section class="spell-description">
	<h3>Spell Description</h3>
	<?php the_content(); ?>	 
</section>  
<? endif; ?>