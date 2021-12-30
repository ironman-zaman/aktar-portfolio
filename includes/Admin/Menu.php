<?php
namespace Aktar\Portfolio\Admin;
class Menu{
    function __construct(){
     add_action('admin_menu',[$this,'admin_menu']);   
    }
    
    public function admin_menu(){
        $parent_slug = 'aktar-portfolio';
        add_menu_page(__('Portfolio','portfolio'),__('Portfolio','portfolio'),'manage_options',$parent_slug,[$this,'plugin_page'],'dashicons-palmtree');
    }
    public function plugin_page(){
        echo "New feature will come soon";
    }
}