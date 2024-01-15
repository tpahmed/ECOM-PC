<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
    session_start();
    require_once "../Acces_BD/product.php";
    function Afficher(){
        $_SESSION["full_product"] = obtenir_produit($_GET['id']);
        header("Location:../IHM/Produits/affichage.php");
    }
    function Lister(){
        $_SESSION["products"] = lister_produits();
        header("Location:../IHM/Produits");
    }
    function Ajouter(){
        header("Location:../IHM/Produits/form_add.php");
    }
    function Modifier(){
        $_SESSION["product"] = obtenir_produit($_GET['id']);
        header("Location:../IHM/Produits/form_edit.php");
    }
    function Add(){
        ajouter_produits($_POST,$_FILES);
        Lister();
    }
    function Edit(){
        modifier_produit($_POST,$_GET['id']);
        Lister();
    }
    function Delete(){
        supprimer_produit($_GET['id']);
        Lister();
    }

    switch($_GET['action']){
        case 'afficher':
            Afficher();
            break;
        case 'lister':
            Lister();
            break;
        case 'ajouter':
            Ajouter();
            break;
        case 'add':
            Add();
            break;
        case 'modifier':
            Modifier();
            break;
        case 'edit':
            Edit();
            break;
        case 'delete':
            Delete();
            break;
    }