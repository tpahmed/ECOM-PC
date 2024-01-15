<?php
    require_once "connection.php";
    error_reporting(E_ALL);
    ini_set('display_errors', 1);
    $connection = get_connection();

    
    function user_get($data){
        global $connection;
        $prequest = $connection->prepare("SELECT id, username, type FROM Utilisateur WHERE username=? AND password=?");
        $prequest->bind_param('ss', $data["username"], $data["password"]);
        $prequest->execute();
        $result = $prequest->get_result();
        return $result->fetch_all(MYSQLI_ASSOC)[0];
    }

?>
