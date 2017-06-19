<?php
/**
 * Created by PhpStorm.
 * User: Админ
 * Date: 17.06.2017
 * Time: 16:10
 */

namespace base;


class View
{
    public $basePath = __DIR__ . '/../views/templates/';
    protected  $title;
    protected $seo = [];
    protected $css = [];
    protected $js = [];
    protected $_layout;

    public function setLayout($layout)
    {
        $this->_layout =  __DIR__ . '/../views/layout/' . $layout . '.php';
    }


    public function render($tplName, $data)
    {
       include $this->_layout;
    }

    public function setTitle($str)
    {
        $this->title = $str;
    }

    public function getTitle(){
        return $this->title;
    }

    public function setCss($css)
    {
        $this->css[] = $css;
    }

    /**
     * @return array
     */
    public function getJs()
    {
        return $this->js;
    }
}