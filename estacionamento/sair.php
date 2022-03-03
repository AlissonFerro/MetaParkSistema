<?php 

session_start();
require_once "verificaLogin.php";
require_once "logica.php";

$login = new Login($mysql);

$date = new DateTime('now',new DateTimeZone('-0300'));
$stringDate = $date->format('Y-m-d H:i:s');



?>