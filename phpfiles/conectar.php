<?php
function Conecta(){
    $con = new mysqli("localhost:3309", "root", "1234", "bd_dawjus");

    $con->query("SET NAMES 'utf8'");
    return $con;
}

?>