<?php


class IndexAction
{

    public function index(){
        $smarty = SmartyUtil::getSmarty();
        $smarty->display("index.tpl");
    }
}