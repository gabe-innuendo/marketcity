<?php get_header(); ?>

    <div class="container-page">
        <div class="row">
            <div class="col-md-12">
                <article class="page-content">
	                <div class="row">
                    <?php
                        // Start the loop.
                        while ( have_posts() ) : the_post();

	                	the_content(); ?>

                        <?php endwhile;
                        ?>
	                </div>
                </article>
            </div>
        </div>
    </div>
    
<?php get_footer(); ?>