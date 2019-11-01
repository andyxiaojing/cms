<?php


class SmartyUtil
{
    static function getSmarty(){
        $smarty = new Smarty();
        $smarty->debugging = true;
        $smarty->caching = false;
        $smarty->left_delimiter = "<{";
        $smarty->right_delimiter = "}>";
        $smarty->setCompileDir("./application/templates_c");
        $smarty->setTemplateDir("./application/templates");
        return $smarty;
    }

}