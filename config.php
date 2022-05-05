<?php
    define('USER', 'master');
    define('PASSWORD', 'geo2022!');
    define('HOST', 'a2nlmysql39plsk.secureserver.net:3306');
    define('DATABASE', 'geoSite');
    try {
        $connection = new PDO("mysql:host=".HOST.";dbname=".DATABASE, USER, PASSWORD);
    } catch (PDOException $e) {
        exit("Error: " . $e->getMessage());
    }
?>