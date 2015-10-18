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

    public function isAdmin()
    {
    }

    public function isPO()
    {

    }

    public function isSM()
    {

    }

    public function isTeam()
    {

    }
}

?>