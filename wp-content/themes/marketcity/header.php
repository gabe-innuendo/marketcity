<!doctype html>
<html class="no-js" lang="">
<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title><?php wp_title(' | '); ?></title>
    <meta name="description" content="<?php get_bloginfo('description'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="apple-touch-icon" href="apple-touch-icon.png">
    <!-- Place favicon.ico in the root directory -->

    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
    <?php wp_head();?>  
</head>
<body>
        <header id="main-header-area">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-xs-4 col-md-12">
                        <div class="header-logo-container">
                            <a href="<?php echo get_site_url(); ?>"><img src="<?php get_image_url(); ?>/market-city-logo.svg" alt="Market City Logo"/></a>
                        </div>                        
                    </div><!-- end col-xs-4 -->

                    <?php if(is_active_sidebar('sidebar-2')) : ?>
                            
                            <?php dynamic_sidebar('sidebar-2'); ?>
                            
                    <?php endif; ?>

                    <div class="col-xs-8">
                        <div id="hamburger-menu">
                            <span></span>
                            <span></span>
                            <span></span>
                            <span></span>
                        </div>
                    </div><!-- end col-xs-3 -->
                </div><!-- end row -->
            </div>
        </header>
        
        <nav class="navigation-menu-desktop">
            <?wp_nav_menu( 
                array( 
                    'theme_location' => 'desktop-menu',
                    'menu_class' => 'link-row',
                    'before' => '',
                    'after' => '',
                    'link_before' => '<div class="col-md nav-link"><span>',
                    'link_after' => '</span></div>'
                    ) 
                ); 
            ?>
        </nav>

        <nav class="navigation-menu-mobile">
            
            <div class="nav-menu-container">
                    <div class="link-row">
                        <?wp_nav_menu( 
                            array( 
                                'theme_location' => 'mobile-menu',
                                'menu_class' => 'link-row',
                                'link_before' => '<div class="col-xs-12 nav-link"><span>',
                                'link_after' => '</span></div>'
                                ) 
                            ); 
                        ?>
                        
                    </div><!-- end row -->
            </div>
        </nav>