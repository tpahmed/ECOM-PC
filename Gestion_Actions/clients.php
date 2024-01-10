<?php
    session_start();
    include "../Acces_DB/client.php";
    function recherche(){
        if(isset($_SESSION["user"])){
            header("Location:../");
        }
        if(!isset($_POST["username"])){
            header("Location:../IHM/Utilisateurs/login.php");
        }
        $_SESSION["user"] = client_get($_POST);
        header("Location:../");
    }
    function insertion(){
        if(isset($_SESSION["user"])){
            header("Location:../");
        }
        if(!isset($_POST["username"])){
            header("Location:../IHM/Clients/form_add.php");
        }
        client_insert($_POST);
        $_SESSION["user"] = client_get($_POST);
        header("Location:../");
    }

    switch($_GET['action']){
        case 'login':
            recherche();
            break;
        case 'signup':
            insertion();
            break;
    }