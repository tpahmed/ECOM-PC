<?php
    session_start();
    include "../Acces_BD/product.php";
    error_reporting(E_ALL);
    ini_set('display_errors', 1);  
    function Lister(){
        $_SESSION["products"] = lister_produits();
        header("Location:../IHM/Produits");
    }

    switch($_GET['action']){
        case 'lister':
            Lister();
            break;
    }