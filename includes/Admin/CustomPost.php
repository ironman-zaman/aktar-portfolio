<?php
namespace Aktar\Portfolio\Admin;

class CustomPost{
    function __construct(){
        add_action( 'init', [$this,'portfolio_custom_post_types'] );
    }
    
    public function portfolio_custom_post_types(){
        //portfolio cpt
        $labels_portfolio = array(
        'name'  => __( 'Portfolio', 'portfolio' ),
        'singular_name' => __( 'Portfolio' , 'portfolio' ),
        'menu_name' => __( 'Portfolio', 'portfolio' ));
        
        $args_portfolio = array(
            'labels'=> $labels_portfolio,
            'public' => true,
            'publicly_queryable' => true,
            'show_in_menu'       => true,
            'capability_type' => 'post',
            'has_archive' => true,
            'supports' => array( 'title', 'editor', 'author', 'thumbnail', 'excerpt' )
            );
        register_post_type( 'portfolio', $args_portfolio );
    }
}