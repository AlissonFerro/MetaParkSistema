<?php 
//session_start();

$mysql = new mysqli('localhost','root','','estacionamento');
$mysql->set_charset('utf8');

if($mysql == FALSE){
    echo "Erro na conexão";
}



?>