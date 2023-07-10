<?php

if(!function_exists('bridge_qode_child_theme_enqueue_scripts')) {

	Function bridge_qode_child_theme_enqueue_scripts() {
		wp_register_style('bridge-childstyle', get_stylesheet_directory_uri() . '/style.css');
		wp_enqueue_style('bridge-childstyle');
	}

	add_action('wp_enqueue_scripts', 'bridge_qode_child_theme_enqueue_scripts', 11);
}

/** PLUGINS GOLF / BOOKING **/
define( 'CLUB_ID', 732 );
define( 'SERIAL_NUMBER_ID', '8P744S008G1i' );
define( 'WSDL_URL', 'https://www.gesgolf.it/GesgolfWsExporter/GesgolfExporter.asmx?WSDL');
define( 'WSDL_URL_TEST', 'https://www.gesgolf.it/GesgolfWsExporter_Test/GesgolfExporter.asmx?WSDL');
define( 'GESGOLF_BASE_URL', 'http://www.gesgolf.it/GolfOnline');

// Require once the Autoload
if ( file_exists( dirname( __FILE__ ) . '/inc/autoload.php' ) ) {
	require_once dirname( __FILE__ ) . '/inc/autoload.php';
}

/**
 * Run the Theme
 */
if ( class_exists( 'GolfGavi\\Init' ) ) {
	GolfGavi\Init::register_services();
}

/* function hook_Chronogolf_Widgets() {
	$locale = 'it-IT';
    ?>
        <!-- Start / Chronogolf Widgets -->
		<div class="chrono-bookingbutton"></div>
		<script>
		  window.chronogolfSettings = {
			"clubId" : 17596,
			"locale" : "<?php echo $locale; ?>"
		  };
		  // Optional
		  window.chronogolfTheme = {
			"color"  : "#dd9933"
		  };
		</script>
		<script>
		  !function(d,i){if(!d.getElementById(i)){var s=d.createElement("script");
		  s.id=i,s.src="https://cdn2.chronogolf.com/widgets/v2";
		  var r=d.getElementsByTagName("script")[0];
		  r.parentNode.insertBefore(s,r)}}(document,"chronogolf-js");
		</script>
		<!-- End / Chronogolf Widgets -->

		<script src="//booking.slope.it/js/widget.js" type="text/javascript"></script>
    <?php
}
add_action('wp_head', 'hook_Chronogolf_Widgets'); */