<?php

// echo "<h1>we here yo</h1>";

// $result = $_GET['var'];
// echo $result;

// $data['name'] = "yo bozo";
// $data['resp'] = $_POST['var'];




session_start();

include('config.php');

$username = $_POST['username'];
$query = $connection->prepare("SELECT  *  FROM users_temp WHERE username=:username");
$query->bindParam("username", $username, PDO::PARAM_STR);
$query->execute();

if ($query->rowCount() == 0) {
    echo  '<p class="error">No user with this username exists.</p>';
}

if ($query->rowCount() != 0) {
    $query = $connection->prepare("DELETE  FROM users_temp WHERE username=:username");
    $query->bindParam("username", $username, PDO::PARAM_STR);
    $result = $query->execute();

    if ($result) {
        echo json_encode("User deleted successfully!");
        exit;   
    } else {
        echo json_encode("Something went wrong! User was not deleted.");
        exit;           
    }

}




?>