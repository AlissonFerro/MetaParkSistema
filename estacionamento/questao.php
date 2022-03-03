<?php

session_start();
require_once "logica.php";
require_once "src/Questoes.php";


$id= $_SESSION['idQuestao'][$_SESSION['contador']];

$prova = new Questoes($mysql);
$questoes = $prova->encontrarPorId($id);

array_push($_SESSION['gabarito'], $questoes["Gabarito"]);

$_SESSION['contador'] = $_SESSION['contador']+1;
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <title>Prova</title>
    <meta charset="UTF-8">
    <link rel="stylesheet" type="text/css" href="style.css">
</head>

<body>
    <div id="container">
        <h2>
            <?php echo (sizeof($_SESSION['respostas']) + 1) . ' - ' . $questoes["Enunciado"];?>
                        
        </h2>
        <div>
            <form action="resultado.php" method="post" >
            
                <input type="radio" name="alternativa" value="A" >
                <label for="">
                    <?php echo $questoes["AlternativaA"];?><br>
                
                    <input type="radio" name="alternativa" value="B" unchecked>
                <label for="">
                <?php echo $questoes["AlternativaB"];?><br>
                <input type="radio" name="alternativa" value="C" unchecked>
                <label for="">
                    <?php echo $questoes["AlternativaC"];?><br>
                <input type="radio" name="alternativa" value="D" unchecked>
                <label for="">
                <?php echo $questoes["AlternativaD"];?><br>
                <input type="radio" name="alternativa" value="E" unchecked>
                <label for="">
                <?php echo $questoes["AlternativaE"];?><br><br>
                <input type="hidden" name="respostas" action="resultado.php" value="<?php $respostas;?>" >      

            </form>
        <div>
            <button type="submit" class="botao botao-block" href="resultado.php">Próximo</button>

        </div>
    </div>
</body>

</html>