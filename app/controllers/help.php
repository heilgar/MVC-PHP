<?php
/**
 * Created by PhpStorm.
 * User: horizon
 * Date: 11.01.2015
 * Time: 1:46
 */

class Help extends Controller{

    protected $content;

    public function __construct(){
        parent::__construct();
        $this->view->title = 'Помощь';
        $this->view->content = '';

        $data_menu = [
            'links' => [
                'index' => 'Главная',
                'help' => 'Помощь'
            ]
        ];

        $this->view->block_center = $this->view->block('app/views/blocks/help_view.php');
        $this->view->block_menu = $this->view->block('app/views/blocks/menu_view.php',$data_menu);
        $this->view->display();
    }

}