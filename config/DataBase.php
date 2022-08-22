<?php

class DataBase
{
    public static function connect()
    {
        $db = new mysqli('mysql://root:xOXAOwlZBcjiRH73Bbel@containers-us-west-83.railway.app:7774/railway');
        $db->query("SET NAMES 'utf8'");
        return $db;
    }
}