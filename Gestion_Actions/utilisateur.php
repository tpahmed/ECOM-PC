<?php
    session_start();
    include "../Acces_BD/client.php";
    function logout(){
        session_destroy();
        header("Location:../");
    }
    
    switch($_GET['action']){
        case 'logout':
            logout();
            break;
    }