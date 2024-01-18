<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
    session_start();
    require_once "../Acces_BD/commands.php";
    function Buy(){
        ajouter_commande($_SESSION['user']['id'],$_GET['id']);
        header("Location:produits.php?action=lister");
    }
    function Lister(){
        $_SESSION["commands"] = lister_commands($_SESSION['user']['type'] ? null : $_SESSION['user']['id']);
        header("Location:../IHM/Commandes");
    }
    function Confirm(){
        confirm_command($_GET['id_prod'],$_GET['id']);
        Lister();
    }
    switch($_GET['action']){
        case 'ajouter':
            Buy();
            break;
        case 'lister':
            lister();
            break;
        case 'confirm':
            Confirm();
            break;
    }