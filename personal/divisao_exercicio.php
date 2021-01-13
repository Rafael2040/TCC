<?php

require '../utils/verifica_sessao.php';
require '../bd/conexao.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $r = $_POST['repeticoes'];
    $s = $_POST['series'];
    $c = $_POST['carga'];
    $e = $_POST['exercicio'];
    $d = $_POST['div'];
    $o = $_POST['obs'];

    $sql = "INSERT INTO divisao_exercicio(exercicio_id, divisao_id, n_series, n_repeticoes, carga, observacoes) 
    VALUES ($e, $d, $s, $r, $c, '$o' )";

    if ($conexao->query($sql)) {
        header("Location: ./divisao_detalhes.php?id=$d");
    }

    exit();
}

$exercicios = $conexao->query("SELECT exercicio_id, nome_exercicio FROM exercicio");


?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Adicionar Exercicio</title>
</head>

<body>
    <form method="post">

        <label for="exercicio">Exercicio</label>
        <select name="exercicio" id="exercicio">
            <?php while($e = $exercicios->fetch_assoc()):?>
                <option value="<?=$e['exercicio_id']?>"><?=$e['nome_exercicio']?></option>
            <?php endwhile ?>
        </select>
        <br>
        <label for="repeticoes">repetições</label>
        <input type="number" name="repeticoes" id="repeticoes">
        <br>
        <label for="series">séries</label>
        <input type="number" name="series" id="series">
        <br>

        <label for="carga">carga</label>
        <input type="number" name="carga" id="carga">
        <br>

        <label for="obs">Observações</label>
        <input type="text" name="obs" id="obs">
        <br>
        <input type="hidden" name="div" value="<?=$_GET['id']?>">

        <input type="submit" value="Adicionar">
    </form>
</body>

</html>