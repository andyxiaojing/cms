<?php


class LoginAction
{

    function toLoginPage(){
        $smarty = SmartyUtil::getSmarty();
        $smarty->display("login.tpl");
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
            header("Location: index.php?model=index&method=index", true, 301);
        }else{
            header("Location: index.php?model=index&method=toLoginPage", true, 301);
        }
    }

    function logOut(){
        session_start();
        $_SESSION["user"] = null;
        header("Location: index.php?model=index&method=toLoginPage", true, 301);
    }


}