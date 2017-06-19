<?php
/**
 * Created by PhpStorm.
 * User: Админ
 * Date: 17.06.2017
 * Time: 15:34
 */

namespace library;


class Auth
{
    public static function isGuest(){
        if(empty($_SESSION['user'])){

            return true;
        }
    }

    public static function canAccess($role){
        if($_SESSION['user']['role'] == $role){

            return true;
        }
        return false;
    }

    public static function login($id, $role){
        $_SESSION['user']['id'] = $id;
        $_SESSION['user']['role'] = $role;
    }

    public static function logout(){
        session _unset();
        session_destroy();
    }
}