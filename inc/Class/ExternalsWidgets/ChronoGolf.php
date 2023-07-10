<?php
namespace GolfGavi\ExternalsWidgets;

/**
 * ChronoGolf Widget (YoastSEO)
 * Compatibility File
 *
 *
 * @package GolfGavi
 */
 
// use NpArcal\Services\AdminNotices;

class ChronoGolf/*  extends BasePlugins */
{
    public function register() {
        // if ( !( $this->isActivePlugin('wordpress-seo/wp-seo.php') || $this->isActivePlugin( 'wordpress-seo-premium/wp-seo-premium.php' ) ) ) {
        //     AdminNotices::addNotice(array(
        //         'type' => 'error',
        //         'message' => "<strong>Grande problema SEO:</strong> Il <b>plugin Yoast SEO NON risulta attivato</b>. Se così non fosse si prega di contattare l'amministratore del sito.<br>Alcune funzionalità (esempio Breadcrumb ecc) sono compromesse.",
        //         // 'isDismissable' => true,
        //     ));
        // }
        add_action('wp_head', array( $this, 'hook_Chronogolf_Widgets' ) );
    }
    
    public function hook_Chronogolf_Widgets() {
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
}