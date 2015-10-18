<?php
if (!isset($_SESSION))
    session_start();

class ManageSession
{
    public static function isLogged()
    {
        if ($_SESSION['state'] != "logged") {
            return false;
        }
        return true;
    }

    public static function isAdmin()
    {
        if ($_SESSION['role'] == "Admin") {
            return true;
        }
        return false;
    }

    public static function isPO()
    {
        if ($_SESSION['role'] == "Product Owner") {
            return true;
        }
        return false;
    }

    public static function isSM()
    {
        if ($_SESSION['role'] == "Scrum Master") {
            return true;
        }
        return false;
    }

    public static function isTeam()
    {
        if ($_SESSION['role'] == "Development Team") {
            return true;
        }
        return false;
    }
}

?>