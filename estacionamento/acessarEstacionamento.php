<?php 

session_start();
require_once "verificaLogin.php";
require_once "logica.php";

$login = new Login($mysql);

$date = new DateTime('now',new DateTimeZone('-0300'));
$stringDate = $date->format('Y-m-d H:i:s');

$_SESSION['idVeiculo'] = $_GET['idVeiculo'];

$_SESSION['idAcesso'] = $login->acessoVeiculo($_SESSION['idUsuario'], $_SESSION['idVeiculo'], $stringDate);
echo $_SESSION['idAcesso'];

if($_SESSION['idAcesso']>=0){
    echo "Acesso liberado";
}else{
    echo "Acesso negado";
}

?>