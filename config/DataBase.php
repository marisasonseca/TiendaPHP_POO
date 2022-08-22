<?php

class DataBase
{
    public static function connect()
    {
        $db = new mysqli('railway', 'root', 'xOXAOwlZBcjiRH73Bbel', 'tienda_master');
        $db->query("SET NAMES 'utf8'");
        return $db;
    }
}