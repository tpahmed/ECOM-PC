<?php
    require_once "connection.php";
    error_reporting(E_ALL);
    ini_set('display_errors', 1);
    $connection = get_connection();

    function client_insert($data){
        global $connection;
    
        $check_username = $connection->prepare("SELECT id FROM Utilisateur WHERE username = ?");
        $check_username->bind_param('s', $data["username"]);
        $check_username->execute();
    
        $check_username->close();
    
        if ($result_username->num_rows > 0) {
            return false;
        }
    
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
        $result = $prequest->get_result();
    
        return $result->fetch_all(MYSQLI_ASSOC)[0];
    }
    
    
    function client_get($id){
        global $connection;
        $prequest = $connection->prepare("SELECT * FROM Client WHERE id_user=?");
        $prequest->bind_param('i', $id);
        $prequest->execute();
        $result = $prequest->get_result();
        return $result->fetch_all(MYSQLI_ASSOC)[0];
    }

    function modifier_client($id, $data) {
        global $connection;
        $password_change = $data['password'] === $data['cpassword'] && $data['password'] !== '';
        $utilisateur_update = $connection->prepare("UPDATE Utilisateur SET username = ?".($password_change ? ', password = ?' : '')." WHERE id = ?");
        if($password_change){
            $utilisateur_update->bind_param('ssi', $data['username'], $data['password'], $id);
        }
        else{
            $utilisateur_update->bind_param('si', $data['username'], $id);
        }
        $utilisateur_success = $utilisateur_update->execute();
        $client_update = $connection->prepare("UPDATE Client SET nom = ?, prenom = ?, email = ?, gsm = ?, ville = ? WHERE id_user = ?");
        $client_update->bind_param('sssssi', $data['nom'], $data['prenom'], $data['email'], $data['gsm'], $data['ville'], $id);
        $client_success = $client_update->execute();
    }

?>
