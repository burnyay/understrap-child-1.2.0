<?php

if (is_archive()) {
	$page_title = get_the_archive_title();
} else {
	$page_title = get_the_title();
}
	
if ( is_single() && 'portfolio' != get_post_type() ) {
//Classes
echo 	'<div class="breadcrumbs-row">
			<div class="breadcrumbs">
				<a href="'.get_home_url().'">Home</a> > <a href=/dm-tools-5e/dnd-5e-classes/>5e Classes</a> > '. $page_title .' 
			</div>
		</div>' ; 
} else {
//General
echo 	'<div class="breadcrumbs-row">
			<div class="breadcrumbs">
				<a href="'.get_home_url().'">Home</a> > '. $page_title .' 
		</div>
	</div>' ; 
}


?>