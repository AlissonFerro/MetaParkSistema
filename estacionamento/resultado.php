<?php 

session_start();
require "logica.php";    

array_push($_SESSION['respostas'], $_POST['alternativa']);

if(sizeof($_SESSION['respostas'])<$qtdQuestoes){

    header('Location: /prova/questao.php');
    die();
}

$acertos = 0;
for($i =0; $i<$qtdQuestoes;$i++){
    if(($_SESSION['respostas'][$i]) == ($_SESSION['gabarito'][$i])){
        $acertos++;
    }
}

?>


<!DOCTYPE html>
<html lang="pt-br">

<head>
    <title>Resultado</title>
    <meta charset="UTF-8">
    <link rel="stylesheet" type="text/css" href="style.css">
</head>

<body>
    <div id="container">
        <h1>Resultado</h1>
        
            <p> 

            <table border="1" border-collapse="collapse">
                    <tr>
                        <th>Prova</th>
                        <th>Gabarito</th>
                    </tr>
                        <?php for($i=0;$i<sizeof($_SESSION['respostas']);$i++):?>
                        <?php echo "<tr><td>" . $_SESSION['respostas'][$i] . "</td>";?>
                        <?php echo "<td>" . $_SESSION['gabarito'][$i]. "</td></tr>"?>
                        <?php endfor?>
                        <tr>
                    </table><br>
                            
                Você acertou <?php echo $acertos;?> questão(ões) <br><br>
            <a class="botao botao-block" id="prova" href="index.php">OK</a>            
        </p> 
              
    </div>
</body>

</html>