<?php

/*
    Template name: Map Page
*/

    get_header(); ?>


		<?php
		// Start the loop.
		while ( have_posts() ) : the_post();

			the_content();

		// End the loop.
		endwhile;
		?>

		</main><!-- .site-main -->
	</div><!-- .content-area -->

<?php get_footer(); ?>