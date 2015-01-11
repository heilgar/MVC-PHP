<?php
/**
 * Created by PhpStorm.
 * User: horizon
 * Date: 11.01.2015
 * Time: 1:56
 */

class Bootstrap{

    public function __construct(){

        $url = isset($_GET['url']) ? $_GET['url'] : null;
        $url = rtrim($url, '/');
        $url= explode('/', $url);

        if(empty($url[0])){
            require_once 'app/controllers/index_view.php';
            $controller = new Index();
            return false;

        }

        $file = 'app/controllers/'.$url[0].".php";

        if(file_exists($file)){
            require $file;
        } else {
            throw new Exception("The file: $file Does not exist");
        }



        $controller = new $url[0];

        if(isset($url[2])){
            $controller->{$url[1]}($url[2]);
        } else{
            if(isset($url[1])){
                $controller->{$url[1]}();
            }
        }

    }
}