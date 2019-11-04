<?php


class CheckSessionUtil
{


    static function getUsername(){
        session_start();
        return $_SESSION["user"];
    }

    static function isAdmin(){
        session_start();
        //not login
        if(!isset($_SESSION["user"]) ){
            return false;
        }
        //admin user
        if (isset($_SESSION["user"]) && $_SESSION["user"] === "admin") {
          //  print_r("99999");
           return true;
        }else {
            // other user
            return false;
        }
    }

    static function  isLogin(){
        session_start();
        if (isset($_SESSION["user"]) && $_SESSION["user"] !=null) {
            return true;
        }else {
            // other user
            return false;
        }
    }

}