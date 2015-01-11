<?php
/**
 * Created by PhpStorm.
 * User: horizon
 * Date: 11.01.2015
 * Time: 1:44
 */

class Index extends Controller {

    public function __construct(){
        parent::__construct();

        $this->view->title = 'Главная';
        $this->view->content = '';

        $data_menu = [
          'links' => [
              'index' => 'Главная',
              'help' => 'Помощь'
          ]
        ];

        $this->view->block_center = $this->view->block('app/views/blocks/index_view.php');
        $this->view->block_menu = $this->view->block('app/views/blocks/menu_view.php',$data_menu);
        $this->view->display();
    }
}