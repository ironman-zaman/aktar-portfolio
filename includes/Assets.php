<?php

namespace Aktar\Portfolio;

class Assets
{
    function __construct()
    {
        add_action('admin_enqueue_scripts', [$this, 'enqueue_assets']);
        add_action('wp_enqueue_scripts', [$this,'custom_front_scripts'] );
    }
    
    //Backend scripts and css
    public function enqueue_assets()
    {
        wp_register_style('portfolio-css-backend', PORTFOLIO_ASSETS . '/css/backend.css', false, '1.0.0');
        wp_enqueue_style('portfolio-css-backend');
    }
    
    // front end scripts and css
    function custom_front_scripts() {
	wp_enqueue_style( 'frontend_styles', PORTFOLIO_ASSETS . '/css/frontend.css', false, time() );
	wp_enqueue_script('frontendjs', PORTFOLIO_ASSETS . '/js/frontend.js', array(), '1.0.0', 'true' );
    }
}
