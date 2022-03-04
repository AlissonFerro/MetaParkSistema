<?php


?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <title>Veículo</title>
    <meta charset="UTF-8">
</head>

<body>
    <div id="container">
        <h2>Cadastrar</h2>

        <form action="cadastrar.php" method="POST">
            Marca<br>
            <textarea rows="1" cols="20" name="marca"></textarea><br>
            Modelo<br>
            <textarea rows="1" cols="20" name="modelo"></textarea><br>
            Placa<br>
            <textarea rows="1" cols="20" name="placa"></textarea><br>

            <button class="botao botao-block" href="cadastrar.php">Cadastrar</button><br><br>
        </form>

        <a href="index.php">Voltar</a>
        </p>
    </div>
</body>

</html>