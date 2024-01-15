<?php
    require_once "connection.php";
    $connection = get_connection();

    function ajouter_photo($file,$id){
        global $connection;
        $target_dir = "../IHM/public/images/";
        $filename = rand(0,135489). basename($file["image"]["name"]);
        $target_file = $target_dir . $filename;
        move_uploaded_file($file["image"]["tmp_name"], $target_file);
        $prequest = $connection->prepare("INSERT INTO `Photo`(`chemin`, `id_prod`) VALUES (?, ?)");
        $prequest->bind_param('si', $filename, $id);
        $prequest->execute();
    }
    function supprimer_photo($id,$id_prod){
        global $connection;
    
        $check_request = $connection->prepare("SELECT COUNT(*) FROM `Photo` WHERE id_prod = ?");
        $check_request->bind_param('i', $id_prod);
        $check_request->execute();
        $check_result = $check_request->get_result();
        $photo_count = $check_result->fetch_row()[0];
    
        if ($photo_count > 0) {
            $delete_request = $connection->prepare("DELETE FROM `Photo` WHERE id = ?");
            $delete_request->bind_param('i', $id);
            $delete_request->execute();
        }
    }
    
?>
