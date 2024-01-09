<?php
    $env = parse_ini_file('.env');
    function get_connection(){
        global $env;
        return @mysqli_connect($env["HOST"],$env["USERNAME"],$env["PASSWORD"],$env["DBNAME"]);
    }
?>