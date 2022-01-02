<?php
/**
 * Plugin Name: Portfolio Aktar
 * Description: This is a custom plugin for displaying portfolio grid
 * Plugin URL: https://aktaruzzaman.com/
 * Author: Aktar Uz Zaman
 * Author URI: https://aktaruzzaman.com/
 * Version: 1.0
 * License: GPL2 or Later
 */
 
 if( ! defined('ABSPATH')){
     exit;
 }

//Autoload composer
require_once __DIR__.'/vendor/autoload.php';
use Aktar\Portfolio\Admin;
use Aktar\Portfolio\FrontEnd;
/**
  * Main plugin class
*/
final class Portfolio{
    const version = '1.0';
    private function __construct(){
        $this->define_constants();
        register_activation_hook(__FILE__,[$this,'activate']);
        add_action('plugins_loaded',[$this,'init_plugin']);
    }
    
    public static function init(){
        static $instance = false;
        if(!$instance){
            $instance = new self();
        }
        return $instance;
    }
    
    public function define_constants(){
        define('PORTFOLIO_VERSION',self::version);
        define('PORTFOILO_FILE',__FILE__);
        define('PORTFOLIO_PATH',__DIR__);
        define('PORTFOLIO_URL', plugins_url('', PORTFOILO_FILE));
        define('PORTFOLIO_ASSETS', PORTFOLIO_URL . '/assets');
    }
    
    public function activate(){
        $installed = get_option('portfolio_installed');
        if(!$installed){
            update_option('portfolio_installed', time());
        }
        update_option('portfolio_version',PORTFOLIO_VERSION);
    }
    
    public function init_plugin(){
        if(is_admin()){
            new Admin();
        }else{
            new FrontEnd();
        }
        
    }
}

 /*initialize the main plugin*/
function portfolio(){
    return Portfolio::init();
}

//finally start the plugin
portfolio();