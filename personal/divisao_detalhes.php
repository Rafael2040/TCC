<?php

require '../utils/verifica_sessao.php';
require '../bd/conexao.php';

$divisao = $conexao->query("SELECT * FROM divisao WHERE divisao_id={$_GET['id']}")->fetch_assoc();

$exercicios = $conexao->query("SELECT * FROM divisao_exercicio WHERE divisao_id={$_GET['id']}")
?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Divisão <?= $divisao['rotulo'] ?></title>
</head>

<body>
    <table style="border: 1px solid black">
        <tr>
            <th>Campo</th>
            <th>Dado</th>
        </tr>
        <tr>
            <td>Rotulo</td>
            <td><?= $divisao['rotulo'] ?></td>
        </tr>
        <tr>
            <td>Descrição</td>
            <td><?= $divisao['descricao'] ?></td>
        </tr>
    </table>
    <h2>Exercicios</h2>
    <?php while ($e = $exercicios->fetch_assoc()):
        $en = $conexao->query("SELECT nome_exercicio FROM exercicio WHERE exercicio_id={$e['exercicio_id']}")->fetch_array()[0];
        
        ?>
        <h4><?=$en?></h4>
        <ul>
            <li><?=$e['n_repeticoes']?> Repetições</li>
            <li><?=$e['n_series']?> Séries</li>
            <li><?=$e['carga']?>KGs de carga</li>
            <li><?=$e['observacoes']?></li>
        
        </ul>

    <?php endwhile ?>


    <a href="./divisao_exercicio.php?id=<?=$divisao['divisao_id']?>">Adicionar exercicio</a>
</body>

</html>