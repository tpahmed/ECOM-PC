<?php
    function get_connection(){
        $fenv = file(__DIR__.'/.env');
        $host = trim(explode(":",$fenv[0])[1]);
        $username = trim(explode(":",$fenv[1])[1]);
        $password = trim(explode(":",$fenv[2])[1]);
        $dbname = trim(explode(":",$fenv[3])[1]);
        return @mysqli_connect($host,$username,$password,$dbname);
    }
?>