<?php get_header(); ?>

    <div class="container-page-grey">
        <div class="container-page">
            <div class="row">
                <div class="col-md-12">
                    <article class="page-content">
                        <div class="row">
                            
                            <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>

                                <div class="col-md-6 col-sm-12 col-xs-12">
                                    <div class="posts-box">
                                        <div class="thumbnail-container" style="background-image: url(<?php echo the_post_thumbnail_url(); ?>);">
                                        </div>
                                        <div class="content-container">
                                            <h4><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h4>
                                            <p class="post-date-single"><?php echo get_the_date('F j, Y'); ?></p>
                                            <?php the_excerpt(); ?><br />
                                            <a href="<?php the_permalink(); ?>" class="link-button">Find out more</a>
                                        </div>
                                    </div>
                                </div>

                            <?php endwhile; else : ?>
                                <p><?php _e( 'Sorry, no posts matched your criteria.' ); ?></p>
                            <?php endif; ?>

                        </div>
                    </article>
                </div>
            </div>
        </div>
    </div>
<?php get_footer(); ?>