<?php
/**
 * Created by PhpStorm.
 * User: horizon
 * Date: 11.01.2015
 * Time: 2:23
 */

class Controller {

    public $view;
    public $model;
    
    public function __construct(){
        $this->view = new View('app/views/template.php');
        $this->model = new Model();
    }


}