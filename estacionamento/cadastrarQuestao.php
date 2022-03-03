<?php 

require "logica.php";

$questao = array(
    'enunciado' => addslashes($_POST['enunciado']),
    'id' => 5,
    'gabarito' => addslashes($_POST['gabarito']),
    'alternativaA' => addslashes($_POST['alternativaA']),
    'alternativaB' => addslashes($_POST['alternativaB']),
    'alternativaC' => addslashes($_POST['alternativaC']),
    'alternativaD' => addslashes($_POST['alternativaD']),
    'alternativaE' => addslashes($_POST['alternativae'])
);

echo $questao['enunciado'];

//$questoes[count($questoes)]; 



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
        <h1>Prova</h1>
            <?php echo $questao['enunciado'];?>
            <p>
            <a class="botao botao-block" id="ok" href="index.php">OK</a><br>
                        
        </p> 
              
    </div>
</body>

</html>