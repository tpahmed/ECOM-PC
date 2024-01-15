<?php
    require_once "../Acces_BD/photo.php";
    require_once "../Acces_BD/product.php";
    error_reporting(E_ALL);
    ini_set('display_errors', 1);
    function Add_photo(){
        ajouter_photo($_FILES,$_GET['id']);
        header("Location:produits.php?action=modifier&id=".$_GET['id']);
    }
    function Delete_photo(){
        supprimer_photo($_GET['id'],$_GET['id_prod']);
        header("Location:produits.php?action=modifier&id=".$_GET['id_prod']);
    }

    switch($_GET['action']){
        case 'add':
            Add_photo();
            break;
        case 'delete':
            Delete_photo();
            break;
    }