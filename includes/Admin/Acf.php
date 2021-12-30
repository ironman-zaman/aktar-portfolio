<?php
namespace Aktar\Portfolio\Admin;
class Acf{
    function __construct(){
     // Define path and URL to the ACF plugin.
        define( 'MY_ACF_PATH', PORTFOLIO_PATH . '/includes/acf/' );
        define( 'MY_ACF_URL', PORTFOLIO_PATH . '/includes/acf/' );

        // Include the ACF plugin.
        include_once( MY_ACF_PATH . 'acf.php' );

        // Customize the url setting to fix incorrect asset URLs.
        add_filter('acf/settings/url', [$this,'my_acf_settings_url']);
        // (Optional) Hide the ACF admin menu item.
        add_filter('acf/settings/show_admin', [$this,'my_acf_settings_show_admin']);
        $this->add_acf_fields();
    }

    function my_acf_settings_url( $url ) {
        return MY_ACF_URL;
    }

    function my_acf_settings_show_admin( $show_admin ) {
        return false;
    }

    /*add acf fields*/ 
    function add_acf_fields(){
        if( function_exists('acf_add_local_field_group') ):

            acf_add_local_field_group(array(
                'key' => 'group_1',
                'title' => 'Portfolio',
                'fields' => array (),
                'location' => array (
                    array (
                        array (
                            'param' => 'post_type',
                            'operator' => '==',
                            'value' => 'portfolio',
                        ),
                    ),
                ),
            ));
            
            acf_add_local_field(array(
                'key' => 'field_1',
                'label' => 'Project Link',
                'name' => 'project_link',
                'type' => 'url',
                'parent' => 'group_1'
            ));
            
            endif;
    }
}