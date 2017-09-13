<?php
/*
    Template name: Background Image Page
*/

 get_header(); ?>
 <?php
    // Start the loop.
    while ( have_posts() ) : the_post(); ?>

    <div class="container-page-bg-image" style="background-image: url( <?php echo the_post_thumbnail_url(); ?> )">
        <div class="row">
        
            <div class="col-md-12">
                <article class="page-content">
	                <?php the_content(); ?>
                </article>
            </div>
        
        </div>
    </div>
    <?php endwhile; ?>
<?php get_footer(); ?>