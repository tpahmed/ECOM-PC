<?php
    require "../Acces_BD/Visiteur.php";
    session_start();
    if(!isset($_POST["username"]) || isset($_SESSION["user"])){
        header("Location:../IHM/login.php");
    }
    $_SESSION["user"] = client_get($_POST);
    header("Location:../IHM/");