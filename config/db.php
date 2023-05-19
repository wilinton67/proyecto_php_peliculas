<?php
class Database
{
    public static function connect()
    {
        $db = new mysqli('localhost', 'root', '', 'proyecto_peliculas');
        $db->query("SET NAMES 'utf8'");

        return $db;
    }
}
