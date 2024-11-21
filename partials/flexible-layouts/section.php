<?php $remove_open = get_sub_field('remove_open'); if (!$remove_open): ?>
<section <?php $section_class = get_sub_field('class'); if($section_class ):echo 'class="'. $section_class .'"'; endif; $section_id = get_sub_field('id'); if($section_id): echo 'id="'. $section_id .'"'; endif; ?>>
<?php endif; ?> 
<? the_sub_field('content'); ?>
<?php $remove_close = get_sub_field('remove_close'); if (!$remove_close): ?>
</section>
<?php endif; ?>