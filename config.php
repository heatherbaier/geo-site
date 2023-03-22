<?php

    define('USER', 'cbmaynard');
    define('PASSWORD', 'Redsoxfan1');
    define('HOST', 'a2nlmysql39plsk.secureserver.net:3306');
    define('DATABASE', 'geoSite');
    try {
        $connection = new PDO("mysql:host=".HOST.";dbname=".DATABASE, USER, PASSWORD);
    } catch (PDOException $e) {
        exit("Error: " . $e->getMessage());
    }

    date_default_timezone_set('America/New_York');

    $con = mysqli_connect(HOST,USER,PASSWORD,DATABASE);

    #
?>