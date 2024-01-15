<?php
    require "connection.php";
    error_reporting(E_ALL);
    ini_set('display_errors', 1);
    $connection = get_connection();
    function ajouter_commande($id_client,$id_prod){
        global $connection;
        $prequest = $connection->prepare("SELECT prix_unitaire FROM Product WHERE id = ?");
        $prequest->bind_param('i', $id_prod);
        $prequest->execute();
        $result = $prequest->get_result();
        $product = $result->fetch_assoc();
        $prequest = $connection->prepare("INSERT INTO `Commande`(`prix`, `id_client`,`id_product`) VALUES (?, ?, ?)");
        $prequest->bind_param('dii', $product['prix_unitaire'],$id_client,$id_prod);
        $prequest->execute();
    }

    function lister_commands($user_id = null) {
        global $connection;
    
        $whereClause = ($user_id !== null) ? " WHERE id_client = $user_id" : "";
    
        $query = "SELECT Commande.*, Product.designation, DATE_FORMAT(Commande.date_cmd, '%Y-%m-%d %H:%i:%s') as formatted_date_cmd
                  FROM Commande
                  JOIN Product ON Commande.id_product = Product.id" . $whereClause;
    
        $result = $connection->query($query);
    
        if ($result) {
            return $result->fetch_all(MYSQLI_ASSOC);
        } else {
            return array();
        }
    }
    function confirm_command($command_id) {
        global $connection;

        $prequest = $connection->prepare("UPDATE `Commande` SET `confirmer` = 1 WHERE `id` = ?");
        $prequest->bind_param('i', $command_id);
        $prequest->execute();
    }
