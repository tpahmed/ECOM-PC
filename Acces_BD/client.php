<?php
    require "connection.php";
    error_reporting(E_ALL);
    ini_set('display_errors', 1);
    $connection = get_connection();

    function client_insert($data){
        global $connection;
        $utilisateur = $connection->prepare("INSERT INTO `Utilisateur`(`username`, `password`, `type`) VALUES (?, ?, 0)");
        $utilisateur->bind_param('ss', $data["username"], $data["password"]);
        $utilisateur->execute();
        $utilisateur_id = $utilisateur->insert_id;
        $client = $connection->prepare("INSERT INTO `Client`(`nom`, `prenom`, `email`, `gsm`, `ville`, `id_user`) VALUES (?, ?, ?, ?, ?, ?)");
        $client->bind_param('sssssi', $data["FName"], $data["LName"], $data["email"], $data["GSM"], $data["city"], $utilisateur_id);
        $client->execute();
        $prequest = $connection->prepare("SELECT id, username, type FROM Utilisateur WHERE id=?");
        $prequest->bind_param('i', $utilisateur_id);
        $prequest->execute();
        return $prequest->fetch_all(2);
    }

    function user_get($data){
        global $connection;
        $prequest = $connection->prepare("SELECT id, username, type FROM Utilisateur WHERE username=? AND password=?");
        $prequest->bind_param('ss', $data["username"], $data["password"]);
        $prequest->execute();
        return $prequest->fetch_all(MYSQLI_ASSOC);
    }

?>
