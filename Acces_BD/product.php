<?php
    require_once "connection.php";
    error_reporting(E_ALL);
    ini_set('display_errors', 1);
    $connection = get_connection();

    function lister_produits(){
        global $connection;
        $products = $connection->query("SELECT * FROM Product")->fetch_all(MYSQLI_ASSOC);
        foreach($products as &$prod){
            $prod["images"] = $connection->query("SELECT * FROM Photo where id_prod = " . $prod['id'])->fetch_all(MYSQLI_ASSOC); 
        }
        return $products;
    }
    function obtenir_produit($id){
        global $connection;
        $prequest = $connection->prepare("SELECT * FROM Product WHERE id = ?");
        $prequest->bind_param('i', $id);
        $prequest->execute();
        $result = $prequest->get_result();
        $product = $result->fetch_assoc();
        $product["images"] = $connection->query("SELECT * FROM Photo WHERE id_prod = " . $product['id'])->fetch_all(MYSQLI_ASSOC);
        return $product;
    }
    function ajouter_produits($data,$file){
        global $connection;
        var_dump($data);
        $prequest = $connection->prepare("INSERT INTO `Product`(`designation`,`description`,`prix_unitaire`, `type`, `qte_stock`,`promotion`) VALUES (?, ?, ?, ?, ?, ?)");
        $prequest->bind_param('ssdssd', $data["designation"], $data["description"], $data["prix_unitaire"],$data["type"],$data["qte_stock"],$data["promotion"]);
        $prequest->execute();
        $prequest_id = $prequest->insert_id;
        $target_dir = "../IHM/public/images/";
        $filename = rand(0,135489). basename($file["image"]["name"]);
        $target_file = $target_dir . $filename;
        move_uploaded_file($file["image"]["tmp_name"], $target_file);
        $prequest = $connection->prepare("INSERT INTO `Photo`(`chemin`, `id_prod`) VALUES (?, ?)");
        $prequest->bind_param('si', $filename, $prequest_id);
        $prequest->execute();
    }
    function modifier_produit($data, $id){
        global $connection;
    
        $existing_data = obtenir_produit($id);
    
        $designation = $data["designation"] !== $existing_data["designation"] ? $data["designation"] : $existing_data["designation"];
        $description = $data["description"] !== $existing_data["description"] ? $data["description"] : $existing_data["description"];
        $prix_unitaire = $data["prix_unitaire"] !== $existing_data["prix_unitaire"] ? $data["prix_unitaire"] : $existing_data["prix_unitaire"];
        $type = $data["type"] !== $existing_data["type"] ? $data["type"] : $existing_data["type"];
        $qte_stock = $data["qte_stock"] !== $existing_data["qte_stock"] ? $data["qte_stock"] : $existing_data["qte_stock"];
        $promotion = $data["promotion"] !== $existing_data["promotion"] ? $data["promotion"] : $existing_data["promotion"];
    
        if (
            $designation !== $existing_data["designation"] ||
            $description !== $existing_data["description"] ||
            $prix_unitaire !== $existing_data["prix_unitaire"] ||
            $type !== $existing_data["type"] ||
            $qte_stock !== $existing_data["qte_stock"] ||
            $promotion !== $existing_data["promotion"]
        ) {
            $prequest = $connection->prepare("UPDATE `Product` SET `designation`=?, `description`=?, `prix_unitaire`=?, `type`=?, `qte_stock`=?, `promotion`=? WHERE `id`=?");
            $prequest->bind_param('ssdsidi', $designation, $description, $prix_unitaire, $type, $qte_stock, $promotion, $id);
            $prequest->execute();
        }
    }
    function supprimer_produit($id){
        global $connection;
    
        $existing_product = obtenir_produit($id);
    
        if ($existing_product) {
            $prequest = $connection->prepare("DELETE FROM `Photo` WHERE id_prod = ?");
            $prequest->bind_param('i', $id);
            $prequest->execute();
    
            $prequest = $connection->prepare("DELETE FROM `Product` WHERE id = ?");
            $prequest->bind_param('i', $id);
            $prequest->execute();
        }
    }
    
    
    
?>
