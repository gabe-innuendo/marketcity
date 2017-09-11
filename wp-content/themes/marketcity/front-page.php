<?php get_header(); ?>

    <div class="container-fluid">
        <?php
        // check if the repeater field has rows of data
        if( have_rows('image_slider') ): ?>
            
            <section class="slider-section">
                <ul class="home-slider">
            
                <?php // loop through the rows of data
                while ( have_rows('image_slider') ) : the_row(); ?>

                    <li style="background-image: url(<?php the_sub_field('slide_image'); ?>);">
                        <div class="slider-box-container">
                            <div class="slider-box">
                                <h1><?php the_sub_field('slide_heading'); ?></h1>
                                <div class="slider-box-footer">
                                </div>
                            </div>
                        </div>
                    </li>

                <?php endwhile; ?>

                </ul>
            </section>

        <?php else :
        endif;
        if( have_rows('front_page_menu') ): ?>

            <section class="main-box-section">
                <ul class="main-boxes">
            
                <?php // loop through the rows of data
                while ( have_rows('front_page_menu') ) : the_row(); ?>

                    <li>
                        <a href="<?php echo get_site_url(); ?>/<?php the_sub_field('menu_link_slug'); ?>">
                            <img src="<?php the_sub_field('menu_icon'); ?>" alt="Icon" />
                            <h2><?php the_sub_field('menu_title'); ?></h2>
                            <h5><?php the_sub_field('menu_subtitle'); ?></h5>
                        </a>
                    </li>

                <?php endwhile; ?>

                </ul>
            </section>

        <?php else :
        endif;?>
    </div>

    <div class="container-page">
        <div class="row">
            <div class="col-sm-8">
                <article class="page-content">
                    <?php the_content(); ?>
                </article>
            </div>
            <?php get_sidebar(); ?>
        </div>
    </div>

<?php get_footer(); ?>
