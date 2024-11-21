<section class="sources-wrapper">
<h2 id="sources">Sources Used in This Guide</h2>
<?php 
$terms = get_terms([
    'taxonomy' => 'source',
    'hide_empty' => false,
]);
echo '<ul>';
foreach($terms as $term) {
	$acronym = get_field('acronym', $term);
     echo '<li class="' . $term->slug . '-toggle">' . $acronym . ': '. $term->name . '</li>' ;
}
echo '</ul>'; 
?>

</section>