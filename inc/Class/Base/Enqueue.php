<?php
namespace GolfGavi\Base;

class Enqueue extends Base
{
    public function register()
    {
        add_action( 'wp_enqueue_scripts', array( $this, 'golfgavi_scripts' ) );
        // if (is_admin()) {
        //     add_action( 'admin_enqueue_scripts', array( $this, 'golfgavi_admin_scripts' ) );
        // }
    }

    public function golfgavi_scripts() {
        parent::__construct();
        $time = time();

        wp_enqueue_style( 'golfgavi-style', $this->theme_uri . '/dist/css/main.css' , null, $time/* $this->version */ );

        wp_enqueue_script( 'jquery');

        wp_enqueue_script( 'golfgavi-selectordie-js', $this->theme_uri . '/js/selectordie.min', array( 'jquery' ), $time/* $this->version */, true );
        
        wp_register_script(
            'golfgavi-js', 
            $this->theme_uri . '/dist/js/main.js', 
            array( 'golfgavi-selectordie-js' ), 
            $time/* $this->version */, 
            true
        );
        // wp_enqueue_script( 'golfgavi-js', $this->theme_uri . '/dist/js/main.js', null, $time/* $this->version */, true );
        wp_enqueue_script( 'golfgavi-js');
        // wp_enqueue_script('jquery');
    
        wp_localize_script( 'golfgavi-js', 'golfgavi_vars', array(
            'ajax_url'      => admin_url( 'admin-ajax.php' ),
            'security' => wp_create_nonce('ajax_nonce_string')
        ));

    
        // if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
        //     wp_enqueue_script( 'comment-reply' );
        // }
    }

    // public function golfgavi_admin_scripts() { 
    //     parent::__construct();
    //     $time = time();

    //     wp_enqueue_style( 'golfgavi-admin-style', $this->theme_uri . '/dist/css/admin.css' , null, $time/* $this->version */ );
        
    //     wp_enqueue_script( 'golfgavi-admin-js', $this->theme_uri . '/dist/js/admin.js', null, $time/* $this->version */ ); // $this->version/* $time */
    // }
}