<?php
namespace App\Helpers;

class Guard {

    public static function isAuth()
    {
        return isset($_SESSION["user"]);
    }

    public static function notAuthorized()
    {
        return !self::isAuth();
    }

    public static function Auth($data)
    {
        $_SESSION["user"] = $data["login"];
    }

    public static function User()
    {
        return $_SESSION["user"];
    }

    public static function Logout()
    {
        unset($_SESSION["user"]);
    }

    public static function htmlEncode($string)
    {
        return htmlspecialchars($string);
    }
}