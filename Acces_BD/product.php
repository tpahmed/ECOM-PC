<?php
    require "connection.php";
    error_reporting(E_ALL);
    ini_set('display_errors', 1);
    $connection = get_connection();

    function lister_produits(){
        global $connection;
        return $connection->query("SELECT * FROM Product")->fetch_all(MYSQLI_ASSOC);
    }
?>
