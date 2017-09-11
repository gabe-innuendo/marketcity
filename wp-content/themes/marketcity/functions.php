<?php

//
// Helper functions
//

function get_image_url() {
	echo get_template_directory_uri() . '/img';
}

// Enable functionality

add_theme_support( 'post-thumbnails' ); 

//
// Load the stylesheets in to the theme
//

function marketcity_enqueue_styles() {

	wp_enqueue_style( 'style', get_stylesheet_uri() );
	wp_enqueue_style( 'normalize', get_template_directory_uri() . '/css/normalize.css');
	wp_enqueue_style( 'flexboxgrid', get_template_directory_uri() . '/css/flexboxgrid.css');
	wp_enqueue_style( 'main', get_template_directory_uri() . '/css/main.css');
	wp_enqueue_style( 'unslider', get_template_directory_uri() . '/css/unslider.css');
}

add_action( 'wp_enqueue_scripts', 'marketcity_enqueue_styles' );

//
// Load the scripts in to the theme
//

function marketcity_enqueue_scripts() {

	// Register new version of jquery
	wp_deregister_script('jquery');
	wp_enqueue_script('jquery', 'https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js', array(), null, true);
	
	wp_enqueue_script( 'modernizr', get_template_directory_uri() . '/js/vendor/modernizr.js');
	wp_enqueue_script( 'unslider', get_template_directory_uri() . '/js/vendor/unslider-min.js', array('jquery'));
	wp_enqueue_script( 'plugins', get_template_directory_uri() . '/js/plugins.js');
	wp_enqueue_script( 'googlemaps', get_template_directory_uri() . '/js/googlemaps.js');
	wp_enqueue_script( 'main', get_template_directory_uri() . '/js/main.js', array('unslider'));

}

add_action('wp_enqueue_scripts', 'marketcity_enqueue_scripts');

//
// Register menus for the themes
//

function register_my_menus() {
  register_nav_menus(
    array(
      'desktop-menu' => 'Desktop Menu',
      'mobile-menu' => 'Mobile Menu'
    )
  );
}
add_action( 'init', 'register_my_menus' );


//
// Shortcodes for columns in posts
//

function marketcity_one_third( $atts, $content = null ) {
	return '<div class="col-md-4">'.do_shortcode($content).'</div>';
}
add_shortcode('one_third', 'marketcity_one_third');

function marketcity_two_thirds( $atts, $content = null ) {
	return '<div class="col-md-8">'.do_shortcode($content).'</div>';
}
add_shortcode('two_thirds', 'marketcity_two_thirds');

function marketcity_one_half( $atts, $content = null ) {
	return '<div class="col-md-6">'.do_shortcode($content).'</div>';
}
add_shortcode('one_half', 'marketcity_one_half');

//
// Shortcodes for accordion content sorters
//

function marketcity_accordion( $atts, $content = null ) {
	return '<div id="accordion">'.do_shortcode($content).'</div>';
}
add_shortcode('accordion', 'marketcity_accordion');

function marketcity_accordion_toggle($atts= array(), $content = null, $tag) {
	shortcode_atts(array(
		'title' => '',
		'font_awesome_icon' => ''
	), $atts);
	return '<div class="accordion-toggle"><i class="fa fa-'.$atts['font_awesome_icon'].'" aria-hidden="true"></i><span>'.$atts['title'].'</span></div><div class="accordion-content">'.do_shortcode($content).'</div>';
}
add_shortcode('accordion_toggle', 'marketcity_accordion_toggle');

function marketcity_accordion_toggle_no_icon($atts= array(), $content = null, $tag) {
	shortcode_atts(array(
		'title' => '',
	), $atts);
	return '<div class="accordion-toggle"><span class="small">'.$atts['title'].'</span></div><div class="accordion-content">'.do_shortcode($content).'</div>';
}
add_shortcode('accordion_toggle_noicon', 'marketcity_accordion_toggle_no_icon');

//
// Create sidebars
//

function marketcity_widgets_init() {

	register_sidebar(array(
		'name' => 'Page Sidebar',
		'id' => 'sidebar-1',
		'description' => 'This sidebar appears on all pages that use a sidebar page template',
	));

	register_sidebar(array(
		'name' => 'Opening Hours Area',
		'id' => 'sidebar-2',
		'description' => 'An area to display the opening hours for Market City'
	));

}
add_action('widgets_init', 'marketcity_widgets_init');

//
// Opening hours widget
//

function marketcity_load_opening_hours_widget() {
	register_widget('opening_hours_widget');
}
add_action('widgets_init', 'marketcity_load_opening_hours_widget');

class opening_hours_widget extends WP_Widget {
	function __construct() {
		parent::__construct(

			// Base ID of the widget
			'opening_hours_widget',

			// Widget name
			'Opening Hours',

			// Widget description
			array('description' => 'A widget to edit the opening hours for Market City to be displayed in the header and in the mobile menu.')
		);
	}

	// Widget front end
	public function widget ($args, $instance) { 

		// Get the current day
		if(date('l') === 'Monday') {
			$today = $instance['monday'];
		} else if(date('l') === 'Tuesday'){
			$today = $instance['tuesday'];
		} else if(date('l') === 'Wednesday'){
			$today = $instance['wednesday'];
		} else if(date('l') === 'Thursday'){
			$today = $instance['thursday'];
		} else if(date('l') === 'Friday'){
			$today = $instance['friday'];
		} else if(date('l') === 'Saturday'){
			$today = $instance['saturday'];
		} else if(date('l') === 'Sunday'){
			$today = $instance['sunday'];
		}

		?>
		<aside class="opening-hours-section">
            <span class="gold-text">Open today</span><span> <?php echo $today; ?> <i class="fa fa-caret-down" aria-hidden="true"></i></span>
        </aside>
        <section id="opening-hours-pull-out">
	        <header>
	        	<h4>Opening Hours</h4>
	        	<div id="opening-hours-close">
	                <i class="fa fa-times" aria-hidden="true"></i>
	            </div>
	        </header>
	            <table class="trading-hours-table">
	                <tbody>
	                    <tr>
	                        <td class="day">Monday</td>
	                        <td class="time"><?php echo $instance['monday']; ?></td>
	                    </tr>
	                    <tr>
	                        <td class="day">Tuesday</td>
	                        <td class="time"><?php echo $instance['tuesday']; ?></td>
	                    </tr>
	                    <tr>
	                        <td class="day">Wednesday</td>
	                        <td class="time"><?php echo $instance['wednesday']; ?></td>
	                    </tr>
	                     <tr>
	                        <td class="day">Thursday</td>
	                        <td class="time"><?php echo $instance['thursday']; ?></td>
	                    </tr>
	                    <tr>
	                        <td class="day">Friday</td>
	                        <td class="time"><?php echo $instance['friday']; ?></td>
	                    </tr>
	                    <tr>
	                        <td class="day">Saturday</td>
	                        <td class="time"><?php echo $instance['saturday']; ?></td>
	                    </tr>
	                    <tr>
	                        <td class="day">Sunday</td>
	                        <td class="time"><?php echo $instance['sunday']; ?></td>
	                    </tr>
	                </tbody>
	            </table>
	            <footer>
	                <p>For more detailed opening hours please visit our <a href="<?php echo get_home_url(); ?>/centre-information">Centre information page.</a></p>
	            </footer>
        </section>
	<?php }

	// Widget back end
	public function form( $instance ) {
	    
	    $title = $instance[ 'title' ];

	    $monday = $instance[ 'monday' ];
	    $tuesday = $instance[ 'tuesday' ];
	    $wednesday = $instance[ 'wednesday' ];
	    $thursday = $instance[ 'thursday' ];
	    $friday = $instance[ 'friday' ];
	    $saturday = $instance[ 'saturday' ];
	    $sunday = $instance[ 'sunday' ];
	     
	    // markup for form ?>
	    <p>
	    	<label for="<?php echo $this->get_field_id( 'monday' ); ?>">Title:</label>
	        <input class="widefat" type="text" id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" value="<?php echo esc_attr( $title ); ?>">

	        <label for="<?php echo $this->get_field_id( 'monday' ); ?>">Monday:</label>
	        <input class="widefat" type="text" id="<?php echo $this->get_field_id( 'monday' ); ?>" name="<?php echo $this->get_field_name( 'monday' ); ?>" value="<?php echo esc_attr( $monday ); ?>">

	        <label for="<?php echo $this->get_field_id( 'tuesday' ); ?>">Tuesday:</label>
	        <input class="widefat" type="text" id="<?php echo $this->get_field_id( 'tuesday' ); ?>" name="<?php echo $this->get_field_name( 'tuesday' ); ?>" value="<?php echo esc_attr( $tuesday ); ?>">

	        <label for="<?php echo $this->get_field_id( 'wednesday' ); ?>">Wednesday:</label>
	        <input class="widefat" type="text" id="<?php echo $this->get_field_id( 'wednesday' ); ?>" name="<?php echo $this->get_field_name( 'wednesday' ); ?>" value="<?php echo esc_attr( $wednesday ); ?>">

	        <label for="<?php echo $this->get_field_id( 'thursday' ); ?>">Thursday:</label>
	        <input class="widefat" type="text" id="<?php echo $this->get_field_id( 'thursday' ); ?>" name="<?php echo $this->get_field_name( 'thursday' ); ?>" value="<?php echo esc_attr( $thursday ); ?>">

	        <label for="<?php echo $this->get_field_id( 'friday' ); ?>">Friday:</label>
	        <input class="widefat" type="text" id="<?php echo $this->get_field_id( 'friday' ); ?>" name="<?php echo $this->get_field_name( 'friday' ); ?>" value="<?php echo esc_attr( $friday ); ?>">

	        <label for="<?php echo $this->get_field_id( 'saturday' ); ?>">Saturday:</label>
	        <input class="widefat" type="text" id="<?php echo $this->get_field_id( 'saturday' ); ?>" name="<?php echo $this->get_field_name( 'saturday' ); ?>" value="<?php echo esc_attr( $saturday ); ?>">

	        <label for="<?php echo $this->get_field_id( 'sunday' ); ?>">Sunday:</label>
	        <input class="widefat" type="text" id="<?php echo $this->get_field_id( 'sunday' ); ?>" name="<?php echo $this->get_field_name( 'sunday' ); ?>" value="<?php echo esc_attr( $sunday ); ?>">

	    </p>
	             
	<?php

	}

	// Update widget replacing old instances with new
	function update( $new_instance, $old_instance ) {
 
    $instance = $old_instance;
    
    $instance[ 'title' ] = strip_tags( $new_instance[ 'title' ] );

    $instance[ 'monday' ] = strip_tags( $new_instance[ 'monday' ] );
    $instance[ 'tuesday' ] = strip_tags( $new_instance[ 'tuesday' ] );
    $instance[ 'wednesday' ] = strip_tags( $new_instance[ 'wednesday' ] );
    $instance[ 'thursday' ] = strip_tags( $new_instance[ 'thursday' ] );
    $instance[ 'friday' ] = strip_tags( $new_instance[ 'friday' ] );
    $instance[ 'saturday' ] = strip_tags( $new_instance[ 'saturday' ] );
    $instance[ 'sunday' ] = strip_tags( $new_instance[ 'sunday' ] );


    return $instance;
     
	}

}



