<?php
namespace Aktar\Portfolio;
use Aktar\Portfolio\Admin\Menu;
use Aktar\Portfolio\Admin\CustomPost;
//use Mps\Extension\Assets;
class Admin{
    function __construct(){
        //new Assets();
        new Menu();
        new CustomPost();
    }
}