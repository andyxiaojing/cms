<?php


class View
{

    private $dataArray;
    private $prefixViewPath = "./application/templates/";

    function __construct()
    {
        $this->dataArray = array();
    }

    function addData($key,$value){
        $this->dataArray[$key] = $value;
    }

    function display($view){
        extract($this->dataArray);
        ob_start();
        include_once($this->prefixViewPath.$view);
        $html = ob_get_contents();
        ob_end_flush();//输出全部内容到浏览器,并清除
        return $html;
    }

}