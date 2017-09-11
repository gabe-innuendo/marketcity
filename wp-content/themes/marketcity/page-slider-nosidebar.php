<?php

/*
    Template name: Slider Page (no sidebar)
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
            <div class="col-md-12">
                <article class="page-content">
                    <div class="row">
                        <?php the_content(); ?>

                        <?php
                        // Check to see if it is the dining page. If it is, load the retailer repeater.
                        if(is_page('dining')) {
                            
                            if( have_rows('foodcourt_retailers') ): 
                                while ( have_rows('foodcourt_retailers') ) : the_row(); ?>

                                    <div class="row dining-retailer">
                                        <div class="col-sm-4">
                                            <img class="dining-image" src="<?php the_sub_field('retailer_image'); ?>" />
                                        </div>
                                        <div class="col-sm-8">
                                            <img class="retailer-logo" src="<?php the_sub_field('retailer_logo'); ?>" />
                                            <p><?php the_sub_field('retailer_description'); ?></p>
                                        </div>
                                    </div>

                                <?php endwhile; ?>

                            <?php else :

                            endif;
                            
                        }

                        ?>
                    </div>
                </article>
            </div>
        </div>
    </div>

<?php get_footer(); ?>