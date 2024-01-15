<?php
    session_start();
    include_once "../Acces_BD/client.php";
    include_once "../Acces_BD/user.php";
    function recherche(){
        if(isset($_SESSION["user"])){
            header("Location:../");
        }
        else if(!isset($_POST["username"])){
            header("Location:../IHM/Utilisateurs/");
        }
        else{
            $_SESSION["user"] = user_get($_POST);
            header("Location:../Gestion_Actions/produits.php?action=lister");
        }
    }
    function insertion(){
        if(isset($_SESSION["user"])){
            header("Location:../");
        }
        else if(!isset($_POST["username"])){
            header("Location:../IHM/Clients/form_add.php");
        }
        else{
            $new_client = client_insert($_POST);
            $_SESSION["user"] = $new_client;
            header("Location:../Gestion_Actions/produits.php?action=lister");
        }
    }
    function profile(){
        $client = client_get($_SESSION['user']['id']);
        $client['username'] = $_SESSION['user']['username'];
        $_SESSION["client"] = $client;
        header("Location:../IHM/Clients");
    }
    function modifier(){
        $client = client_get($_SESSION['user']['id']);
        $client['username'] = $_SESSION['user']['username'];
        $_SESSION["client"] = $client;
        header("Location:../IHM/Clients/form_edit.php");
    }
    function edit(){
        modifier_client($_SESSION['user']['id'], $_POST);
        profile();
    }

    switch($_GET['action']){
        case 'login':
            recherche();
            break;
        case 'signup':
            insertion();
            break;
        case 'profile':
            profile();
            break;
        case 'modifier':
            modifier();
            break;
        case 'edit':
            edit();
            break;
}