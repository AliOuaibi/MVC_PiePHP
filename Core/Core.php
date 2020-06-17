<?php
namespace Core;
require_once('./src/routes.php');
class Core {
    public function run() {
        // echo __CLASS__ . " [OK]" . PHP_EOL;
        // echo "<br>";

        //Partie statique
        $test = Router::get($_SERVER['REQUEST_URI']);
        // var_dump($test);
        // echo "<br>";
        $Controller = $test["controller"].'Controller';
        // var_dump($Controller);
        // echo "<br>";
        $action = $test["action"].'Action';
        // var_dump($action);
        // echo "<br>";
        
        // Partie dynamique
        // $url = str_replace(BASE_URI, '', $_SERVER['REQUEST_URI']);
        // echo $url;
        // $controller = explode('/',$url);
        // $controller = Router::get($url);
        // var_dump($controller);
        // $Controller = $controller[1].'Controller';
        // $action = $controller[2].'Action';
        // echo $Controller ."<br>";
        // echo $action."<br>";
        // if(class_exists($Controller))
        {
            if (method_exists($Controller, $action)) {
                $new_controller = new $Controller;
                $new_controller->$action();
            }
            else {
                echo "error 404 method not found";
            }
            
        }else {
            echo "error 404 class not found";
        }
        
    }
}

include "ORM.php";

