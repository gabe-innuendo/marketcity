<?php get_header(); ?>

    <div class="container-page">
        <div class="row">
            <div class="col-sm-8">
                <article class="page-content">
	                <div class="row">
                        <div class="col-sm-3">
                            <img class="whats-on-featured-image"  src="<?php echo get_the_post_thumbnail_url(); ?>" alt="" />
                        </div>
                        <div class="col-sm-9">
                        <h1><?php the_title(); ?></h1>
                        <p class="post-date-single"><?php the_date('F j, Y'); ?></p>
	                	<?php the_content(); ?>
                        <hr />
                        <h3>What else is happening</h3>
                        <div class="row">
                            <?php
                                $args = array(
                                    'post_type' => array( 'post' ),
                                );
                                query_posts( $args );

                                if (have_posts()) : while (have_posts()) : the_post();?>
                                    <div class="col-md col-sm-6 col-xs-6">
                                        <a href="<?php the_permalink(); ?>">
                                            <div class="post-thumbnail-link">
                                                <img src="<?php echo get_the_post_thumbnail_url(); ?>" />
                                            </div> 
                                        </a>
                                    </div>
                                <?php endwhile; else: ?>
                                    <p>Sorry, no pages matched your criteria.</p>
                                <?php endif; ?>
                        </div>
                        </div>
	                </div>
                </article>
            </div>
            <?php get_sidebar(); ?>
        </div>
    </div>
<?php get_footer(); ?>