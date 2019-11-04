<?php


class LoginAction
{

    function toLoginPage(){
        $view = ViewUtil::getView();
        $view->display("login.php");
    }

    function login(){
        $username = $_POST["username"];
        $password = $_POST["password"];
        if ($username ==null || $password == null){
            header("Location: index.php?model=login&method=toLoginPage", true, 301);
        }
        if ("admin"== $username && "admin"== $password){
            // create session
            session_start();
            $_SESSION["user"] = "admin";
            header("Location: index.php?model=content&method=index", true, 301);
        }else if ($username!="admin"){
            //其他都是普通用户
            session_start();
            $_SESSION["user"] = $username;
            header("Location: index.php?model=content&method=index", true, 301);
        }else{
            // admin ,but pwd is wrong
            header("Location: index.php?model=login&method=toLoginPage", true, 301);
        }
    }

    function logOut(){
        session_start();
        $_SESSION["user"] = null;
        header("Location: index.php?model=login&method=toLoginPage", true, 301);
    }


}