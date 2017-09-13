<?php
/*
    Template name: Dark Page
*/

 get_header(); ?>

    <div class="container-page-dark">
        <div class="row">
        <?php
            // Start the loop.
            while ( have_posts() ) : the_post(); ?>
            <div class="col-md-7">
                <div class="featured-image-container">
                <?php
                    if ( has_post_thumbnail() ) { // check if the post has a Post Thumbnail assigned to it.
                    the_post_thumbnail( 'full' );
                    }
                ?>
                </div>
            </div>
            <div class="col-md-5">
                <article class="page-content">
	                <?php the_content(); ?>
                </article>
            </div>
        <?php endwhile; ?>
        </div>
    </div>

<?php get_footer(); ?>