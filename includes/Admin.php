<?php
namespace Aktar\Portfolio;
use Aktar\Portfolio\Admin\Menu;
use Aktar\Portfolio\Admin\CustomPost;
use Aktar\Portfolio\Admin\Acf;
//use Mps\Extension\Assets;
class Admin{
    function __construct(){
        //new Assets();
        new Menu();
        new CustomPost();
        new Acf();
    }
}