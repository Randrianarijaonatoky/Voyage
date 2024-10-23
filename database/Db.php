<?php

// Connexion au base de donnée
function Db() {
    try {
        $db = new PDO('mysql:dbname=voyage;host=localhost', 'root', '');
        $db->exec('SET NAMES UTF8');
        // echo 'Database connected'; 
    } catch (PDOExcecution $e) {
        echo 'Connexion Error : ' .$e->getMessage();
    }
    return $db;
}