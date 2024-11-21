<section>
<? $target_keyword = get_field('target_keyword'); ?>	
<h2 id="example-build"><?php if ($target_keyword): echo $target_keyword; else: the_title(); endif; ?> 5e Build Example</h2>

<? the_sub_field('subclass_guide_table_intro'); ?>

<table class="subclass-build-guide-table">
<tbody>

<?php

// Check rows exists.
if( have_rows('subclass_guide_table_repeater') ):?>
    <? while( have_rows('subclass_guide_table_repeater') ) : the_row(); ?>
	<tr class="grey">
        <td colspan="100%">
          <strong><? the_sub_field('level');?></strong>
        </td>
      </tr>
      <tr>
        <td>
          <? the_sub_field('text', false, false); ?>
        </td>
		<? if (get_sub_field('content')): ?>
		  <td class="content">
			  <? the_sub_field('content'); ?>
		  </td>
		<? endif; ?>
      </tr>
    <? endwhile; ?>

<? endif;

?>

</tbody>
</table>

</section>