<?php

/*
    Template name: Slider Page
*/

get_header(); ?>
<div class="container-fluid">    
    <?php

        // check if the repeater field has rows of data
        if( have_rows('image_slider') ): ?>

            <section class="slider-section">
                <ul class="dining-slider">

            
            <?php // loop through the rows of data
            while ( have_rows('image_slider') ) : the_row(); ?>

                <li style="background-image: url(<?php the_sub_field('slide_image'); ?>);">
                    <div class="dining-slider-info">
                        <h1><?php the_sub_field('slide_heading'); ?></h1>
                        <hr />
                        <p><?php the_sub_field('slide_text'); ?></p>
                    </div>
                </li>



            <?php endwhile; ?>

                </ul>
            </section>

        <?php else :

            // no rows found

        endif;

        ?>
    </div>
    <div class="container-page">
        <div class="row">
            <div class="col-sm-8">
                <article class="page-content">
                    <div class="row">
                        <?php the_content(); ?>

                        <?php
                        // Check to see if it is the dining page. If it is, load the retailer repeater.
                        if(is_page('dining')) {
                            
                            if( have_rows('foodcourt_retailers') ): 
                                while ( have_rows('foodcourt_retailers') ) : the_row(); ?>

                                    <div class="row dining-retailer">

                                        <div class="col-md-4">
                                            <img class="dining-image" src="<?php the_sub_field('retailer_image'); ?>" />
                                        </div>
                                        <div class="col-md-8">
                                            <img style="max-height: 100px;" class="retailer-logo" src="<?php the_sub_field('retailer_logo'); ?>" />
                                            <p><?php the_sub_field('retailer_description'); ?></p>
                                        </div>
                                    </div>
                                    <hr />

                                <?php endwhile; ?>

                            <?php else :

                            endif;
                            
                        }

                        ?>

                        <?php
                        // Check to see if it is the dining page. If it is, load the retailer repeater.
                        if(is_page('city-student')) {
                            
                            if( have_rows('retailer_student_offers') ): 
                                while ( have_rows('retailer_student_offers') ) : the_row(); ?>

                                        <div class="col-md-3 col-xs-12 student-offer">
                                            <div class="offer-wrapper">
                                                <img class="offer-image" src="<?php the_sub_field('retailer_logo'); ?>" />
                                                <h3><?php the_sub_field('retailer_name'); ?></h3>
                                                <p><?php the_sub_field('offer_text'); ?></p>
                                            </div>
                                        </div>
                                    
                                    <hr />

                                <?php endwhile; ?>

                            <?php else :

                            endif;
                            
                        }

                        ?>

                    </div>
                </article>
            </div>
            <?php get_sidebar(); ?>
        </div>
    </div>

<?php get_footer(); ?>