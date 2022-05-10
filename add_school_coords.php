<?php

session_start();

include('config.php');

// $query = $connection->prepare("SELECT * FROM `spatial`");

// // $query = $connection->prepare("show tables");
// $query->execute();
// $result = $query->fetchAll(PDO::FETCH_ASSOC);


$result = mysqli_query($con, "SELECT * FROM `spatial`");


// $query->execute();
// $result = $query->fetch(PDO::FETCH_ASSOC);

// // $query = $connection->prepare("DELETE  FROM users_temp WHERE username=:username");
// // $query->bindParam("username", $username, PDO::PARAM_STR);
// // $result = $query->execute();

if ($result) {
    echo json_encode(mysqli_fetch_all($result));
    exit;   
} else {
    echo json_encode("Bad!");
    exit;           
}


?>



