<section>
<? $enable_title = get_sub_field('enable_title');
if($enable_title):?>
<? $target_keyword = get_field('target_keyword'); ?>
<h2 id="best-spells">Best Spells for <?php if ($target_keyword): echo $target_keyword . 's'; else: the_title(); endif; ?> 5e</h2>
<? endif;
the_sub_field('intro_text');	

$subclass_name = get_the_title();
$enable_list = get_sub_field('enable_list');

if( have_rows('spells') ): while( have_rows('spells') ): the_row(); 
  if ($enable_list): ?>
      <ul><li><?php the_sub_field('levels'); ?></li>
      <?php 
      $spells_learned = get_sub_field('spells_learned');
      if( $spells_learned ): ?>
          <ul>
          <?php foreach( $spells_learned as $spell_learned ): ?>
                <?php include(locate_template('loop-templates/content-subclass-spell.php')); ?>
          <?php endforeach; ?>
          </ul>
      <?php endif; ?>
      </ul>
  <?php else : ?>

  <h3><?php the_sub_field('levels'); ?></h3>
    <?php $spells_learned = get_sub_field('spells_learned');
    if( $spells_learned ): ?>
        <ul>
        <?php foreach( $spells_learned as $spell_learned ): ?>
              <?php include(locate_template('loop-templates/content-subclass-spell.php')); ?>
        <?php endforeach; ?>
        </ul>
    <?php endif; ?>
  <?php endif; ?>
<?php endwhile; endif;
?>
</section>