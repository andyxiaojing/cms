<?php
header("content-type:text/html;charset=utf-8");
//接受参数，判断调用哪个controller 的哪个方法
$modelName=empty($_GET['model'])?'index':$_GET['model'];  //模块的名称,没有传递默认就是index
$method=empty($_GET['method'])?'index':$_GET['method'];  //方法的名称，没有传递默认就是index

//获取当前的记载路径
$include_path=get_include_path();

//拼接所需要的加载路径
$include_path.=PATH_SEPARATOR."./application/model/";
$include_path.=PATH_SEPARATOR."./application/controller";
$include_path.=PATH_SEPARATOR."./application/view/";
$include_path.=PATH_SEPARATOR."./application/dao/";
$include_path.=PATH_SEPARATOR."./application/service/";
$include_path.=PATH_SEPARATOR."./application/commons/";
$include_path.=PATH_SEPARATOR."./application/entity/";
//设置加载路径

set_include_path($include_path);
require "./application/smarty/Smarty.class.php";
require 'DbOperation.php';
require 'SmartyUtil.php';
require "CategoryService.php";
require "ContentService.php";
require "Category.php";
require "Content.php";


try{
    if("login"==$modelName || "toLoginPage"==$modelName || "logOut" == $modelName){
        run($modelName,$method);
    }else{

        checkSession($modelName,$method);
    }

}catch (Exception $ex){
    echo $ex->getMessage();
}

function checkSession($modelName,$method){
    session_start();
    if (isset($_SESSION["user"]) && $_SESSION["user"] === "admin") {
        run($modelName,$method);
    }else {
        // redirect login page
        header("Location: index.php?model=login&method=toLoginPage", true, 301);
    }
}

// run action method
function run($modelName,$method){
    $modelClassName = ucfirst($modelName)."Action";
    require $modelClassName.".php";
    $model = new $modelClassName();
    //$调用方法
    $model->$method();
}

