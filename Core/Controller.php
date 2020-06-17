<?php 
namespace Core;

use \Core\Request;
use \Core\Core;

class Controller
{
    protected static $_render;
    // protected static $_r;

    function __construct() {
        // echo basename(get_class($this))."<br>";
        $_r = new Request();
    }
    protected function render($view, $scope = []) {
        extract($scope);
        $f = implode(DIRECTORY_SEPARATOR, [dirname(__DIR__), 'src', 'View', str_replace('Controller', '', basename(get_class($this))), $view]) . '.php';
        if (file_exists($f)) {
            ob_start();
            include($f);
            $view = ob_get_clean();
            ob_start();
            include(implode(DIRECTORY_SEPARATOR, [dirname(__DIR__), 'src', 'View', 'index']) . '.php');
            self::$_render = ob_get_clean();
        } else {
            echo "NOT FILE EXIST";
        }
    }  
    public function __destruct() {
        echo self::$_render;
    } 
}