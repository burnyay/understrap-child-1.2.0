<div class="grid">
	<?php get_template_part('template-parts/breadcrumbs'); ?>
	<?php 

		$archiveTitle = get_the_archive_title();

		$archiveTitle = str_replace('Spells', '', $archiveTitle);

	?>
	<h1 class="spells-title">DnD 5e <?php echo $archiveTitle; ?> Spells</h1>

	<div class="spell-main">
		<div class="spell-loop">
			<div class="table-header-row">
				<div class="column column-header spell-name">Spell Name</div>
		    	<div class="column column-header spell-level">Spell Level</div>  
				<div class="column column-header casting-time">Casting Time</div> 
				<div class="column column-header range">Range</div> 
				<div class="column column-header duration">Duration</div> 
				<div class="column column-header school">School</div>
				<div class="column column-header accordion-header"></div>
			</div>	
			
			<?php 
			  	while( have_posts()) {
			    	the_post(); 
		    		get_template_part('template-parts/content-spell');
			   }
		   	?>

			<?php get_template_part('template-parts/pagination'); ?>
		</div>
		<div class="spell-sidebar">
			<div class="spell-sidebar__classes">
				<h2>Spells by Class</h2>
				<ul>
					<li><a href="/spell-classes/artificer/">Artificer</a></li>
					<li><a href="/spell-classes/bard-spells/">Bard</a></li>
					<li><a href="/spell-classes/cleric-spells/">Cleric</a></li>
					<li><a href="/spell-classes/druid-spells/">Druid</a></li>
					<li><a href="/spell-classes/paladin-spells/">Paladin</a></li>
					<li><a href="/spell-classes/ranger-spells/">Ranger</a></li>
					<li><a href="/spell-classes/sorcerer-spells/">Sorcerer</a></li>
					<li><a href="/spell-classes/warlock-spells/">Warlock</a></li>
					<li><a href="/spell-classes/wizard-spells/">Wizard</a></li>
				</ul>
			</div>
			<div class="spell-sidebar__schools">
				<h2>Spells by School</h2>
				<ul>
					<li><a href="/school/abjuration/">Abjuration</a></li>
					<li><a href="/school/conjuration/">Conjuration</a></li>
					<li><a href="/school/divination/">Divination</a></li>
					<li><a href="/school/enchantment/">Enchantment</a></li>
					<li><a href="/school/evocation/">Evocation</a></li>
					<li><a href="/school/illusion/">Illusion</a></li>
					<li><a href="/school/necromancy/">Necromancy</a></li>
					<li><a href="/school/transmutation/">Transmutation</a></li>
				</ul>

			</div>
		</div>
	</div>
</div>