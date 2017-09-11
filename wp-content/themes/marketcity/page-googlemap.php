<?php

/*
    Template name: Google Maps Page
*/

    get_header(); ?>


		<?php
		// Start the loop.
		while ( have_posts() ) : the_post(); ?>
			
			<input id="origin-input" class="controls" type="text"
		        placeholder="Get directions from:">
		
		    <div id="mode-selector" class="controls">
			    <div class="input-wrapper">
			      <input type="radio" name="type" id="changemode-walking" checked="checked">
			      <label for="changemode-walking">Walking</label>
			    </div>
				<div class="input-wrapper">
			      <input type="radio" name="type" id="changemode-transit">
			      <label for="changemode-transit">Public transport</label>
				</div>
				<div class="input-wrapper">
			      <input type="radio" name="type" id="changemode-driving">
			      <label for="changemode-driving">Driving</label>
				</div>
		    </div>
		
		    <div id="map"></div>
			
			<script src="js/googlemaps.js"></script>

			<script async defer
		    src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCshoU1BBAJpDucKBg1ahk7oufE96O3D2E&libraries=places&callback=initMap">
		    </script>

			<div class="container-page">
		        <div class="row">
		            <div class="col-md-12">
		                <article class="page-content">
			                <div id="directionsPanel"></div>
			                <div class="row">
		                    <?php
		                        // Start the loop.

			                	the_content(); ?>

			                </div>
		                </article>
		            </div>
		        </div>
		    </div>
		
		<?php
		// End the loop.
		endwhile;
		?>

		</main><!-- .site-main -->
	</div><!-- .content-area -->

<?php get_footer(); ?>