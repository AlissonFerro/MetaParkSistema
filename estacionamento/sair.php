<?php 

session_start();
require_once "verificaLogin.php";
require_once "logica.php";

$login = new Login($mysql);

$date = new DateTime('now',new DateTimeZone('-0300'));
$stringDate = $date->format('Y-m-d H:i:s');

$login->saidaVeiculo($_SESSION['idAcesso'], $stringDate);
$horarioEntrada = $login->buscaHorario($_SESSION['idAcesso']);

$dateStart = new \DateTime($stringDate);
$dateSaida = new \DateTime($horarioEntrada);

$dateDiff = $dateStart->diff($dateSaida);
$result = $dateDiff->h . ' horas e ' . $dateDiff->i . ' minutos <br>';

if($dateDiff->h >=1){
    $valor = $dateDiff->h * $valorHora;
}else{
    $valor = $valorHora/2;
}
echo $result;
echo "valor a pagar R$ " . $valor . ",00 <br>";


?>