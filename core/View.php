<?php
/**
 * Created by PhpStorm.
 * User: horizon
 * Date: 11.01.2015
 * Time: 2:27
 */

class View {

    protected $_template;
    protected $_data = [];

    public function __construct($template)
    {
        if (file_exists($template)) {
            $this->_template = $template;
        } else {
            exit('File ' . $template . ' not exists.');
        }
    }

    public function __set($key, $value)
    {
        $this->_data[$key] = $value;
    }

    public function block($template_block, $data = NULL)
    {
        if (file_exists($template_block)) {
            if ($data != NULL) extract($data, EXTR_SKIP);
            ob_start();
            require $template_block;
            $out = ob_get_contents();
            ob_end_clean();
            return $out;
        } else {
            return 'File ' . $template_block . ' not exist.';
        }
    }

    public function display()
    {
        extract($this->_data);
        require($this->_template);
    }

}