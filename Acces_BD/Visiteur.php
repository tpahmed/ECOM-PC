<?php
    require "connection.php";
    error_reporting(E_ALL);
    ini_set('display_errors', 1);
    $connection = get_connection();
    function client_insert($data){
        global $connection;
        $utilisateur = $connection->query("INSERT INTO `Utilisateur`(`username`, `password`, `type`) VALUES ('{$data["username"]}','{$data["password"]}','0')");
        
        $connection->query("INSERT INTO `Client`(`nom`, `prenom`, `email`, `gsm`, `ville`, `id_user`) VALUES ('{$data["FName"]}','{$data["LName"]}','{$data["email"]}','{$data["GSM"]}','{$data["city"]}','{$connection->insert_id}')");
    }