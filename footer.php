<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after
 *
 * @package UnderStrap
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

$container = get_theme_mod( 'understrap_container_type' );
?>

<footer id="colophon" class="site-footer">

		<div class="grid">
			<div class="footer-column" id="subscribe">
				<h2>Newsletter</h2>
				<p>Subscribe to our newsletter and never miss another post!</p>
				<?php echo do_shortcode( '[gravityform id="2" title="false" description="false" ajax="true"]' ); ?>
			</div>
			<div class="footer-column">
				<div class="footer-article-loop">
					<h2>Recent Posts</h2>
				<?php

					// The Query
					$the_query = new WP_Query( array( 
						'posts_per_page' => 3
					) );

					// The Loop
					if ( $the_query->have_posts() ) {
					    while ( $the_query->have_posts() ) {
					        $the_query->the_post();
					        get_template_part('template-parts/content-footer-post');
					    }
					} else {
					    // no posts found
					}
					/* Restore original Post Data */
					wp_reset_postdata();

					?>
				</div>
			</div>
			<div class="footer-column">
				<div class="social">
					<div class="widget-title">
						<h2>Social</h2>
					</div>
					<a href="https://www.facebook.com/Arcane-Eye-102733701086570"><i class="fa fa-facebook"></i></a>
					<a href="https://www.instagram.com/the_arcane_eye/"><i class="fa fa-instagram"></i></a>
					<a href="https://twitter.com/arcane_eye"><i class="fa fa-twitter"></i></a>
					<a href="https://www.youtube.com/@The_Arcane_Eye"><i class="fa fa-youtube"></i></a>
				</div>
				<p>Arcane Eye is unofficial Fan Content permitted under the Fan Content Policy. Portions of the materials used are property of Wizards of the Coast.</p>
				<p>Dungeons and Dragons is a Trademark of Wizards of the Coast, LLC. / Hasbro, Inc. The information presented on this site about Dungeons and Dragons, both literal and graphical, is copyrighted by Wizards of the Coast. This website is not produced, endorsed, supported, or affiliated with Wizards of the Coast.</p>
			</div>
		</div>
		<div class="subfooter">
				<p>Additional accessible formats for this information are available upon request. <a href="https://arcaneeye.com/contact/">Contact Us</a> for more information.<br />Copyright &copy; 2020 Arcane Eye. All Rights Reserved. <a href="https://arcaneeye.com/privacy-policy/">Privacy Policy</a></p>
			</div>

</footer><!-- #colophon -->

</div><!-- #page we need this extra closing tag here -->

<?php wp_footer() ?>

<?php if ( is_singular( 'class-guides' ) && get_field('minimalist_class_guide') == FALSE || is_singular( 'races' ) ) { ?>
	<div class="source-toggler-wrapper">
		<input id="SourceToggler" class="source-toggler-toggle" name="ToggleButton" type="button" value="Hide Source Toggler">
		<div class="source-toggler">
			<p>Use the buttons below to fine tune the content you see in our guides.</p>
			<input id="TcoeToggle" class="tcoe-toggle" name="ToggleButton" type="button" value="Hide TCoE">
			<input id="XgteToggle" class="xgte-toggle" name="ToggleButton" type="button" value="Hide XGtE"> 
			<input id="EGtWToggle" class="egtw-toggle" name="ToggleButton" type="button" value="Hide EGtW"> 
			<input id="SCAGToggle" class="scag-toggle" name="ToggleButton" type="button" value="Hide SCAG">
			<input id="MOoTToggle" class="moot-toggle" name="ToggleButton" type="button" value="Hide MOoT">  
			<input id="VRGtRToggle" class="vrgtr-toggle" name="ToggleButton" type="button" value="Hide VRGtR">  
			<input id="EEPCToggle" class="eepc-toggle" name="ToggleButton" type="button" value="Hide EEPC">  
			<input id="GGtRToggle" class="ggtr-toggle" name="ToggleButton" type="button" value="Hide GGtR">  
			<input id="MToFToggle" class="mtof-toggle" name="ToggleButton" type="button" value="Hide MToF">  
			<input id="VGtMToggle" class="vgtm-toggle" name="ToggleButton" type="button" value="Hide VGtM"> 
			<input id="ERLWtoggle" class="erlw-toggle" name="ToggleButton" type="button" value="Hide ERLW">
			<input id="FToDtoggle" class="ftod-toggle" name="ToggleButton" type="button" value="Hide FToD"> 
			<input id="SCoCtoggle" class="scoc-toggle" name="ToggleButton" type="button" value="Hide SCoC">
			<input id="WBTWtoggle" class="wbtw-toggle" name="ToggleButton" type="button" value="Hide WBtW">
			<input id="motmtoggle" class="motm-toggle" name="ToggleButton" type="button" value="Hide MotM"> 
			<input id="saistoggle" class="sais-toggle" name="ToggleButton" type="button" value="Hide SAiS">
			<input id="sotdqtoggle" class="sotdq-toggle" name="ToggleButton" type="button" value="Hide SotDQ">
			<input id="gotgtoggle" class="gotg-toggle" name="ToggleButton" type="button" value="Hide GotG">
			<input id="paitmtoggle" class="paitm-toggle" name="ToggleButton" type="button" value="Hide PAitM">
			<a style="color: #fff; text-align: center; display: block;" href="#sources">What do these mean?</a>
		</div>
	</div>
<?php } ?>


</body>

</html>

