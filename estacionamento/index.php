<?php

session_start();
require_once "verificaLogin.php";
require_once "logica.php";

$login = new Login($mysql);

$veiculo = $login->veiculoPorId($_SESSION['idUsuario']);

?>


<!DOCTYPE html>
<html lang="pt-br">

<head>
    <title>Selecionar Veículo</title>
    <meta charset="UTF-8">
</head>

<body>
    <div id="container">
        <h1>Selecione um veículo</h1>
        <table>
            <tr>
                <th>Marca</th>
                <th>Modelo</th>
                <th>Placa</th>
            </tr>
            <form action='acessarEstacionamento.php'>

                <?php for ($i = 0; $i < sizeof($veiculo); $i++) : ?>
                    <?php echo "<tr><td>" . $veiculo[$i][0] . "</td>"; ?>
                    <?php echo "<td>" . $veiculo[$i][1] . "</td>"; ?>
                    <?php echo "<td>" . $veiculo[$i][2] . "</td>" ?>
                    <td>
                        <a type='submit' name='idVeiculo' href='acessarEstacionamento.php?idVeiculo=<?php echo $i?>'>
                        Selecionar</a>
                    </td>
                    </tr>
                <?php endfor ?>
            </form>

        </table><br>

        <p>
            <a class="botao botao-block" id="cadastrar" href="cadastrarVeiculo.php">Cadastrar Veículo</a><br>
            <a class="botao botao-block" id="prova" href="formaDePagamento.php">Forma de pagamento</a>
        </p>

    </div>
</body>

</html>