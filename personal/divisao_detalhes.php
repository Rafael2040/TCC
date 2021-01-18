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
    <!-- Compiled and minified CSS -->
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">

    <!-- Compiled and minified JavaScript -->	
    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>

</head>

<body>

<nav>
		<div class="nav-wrapper grey darken-4">
		<a href="index.php" class="brand-logo"><img src="../imagens/logo.png" style="height:60px"></a>
		<ul id="nav-mobile" class="right hide-on-med-and-down">
			<li><a href="./aluno_formulario.php">Adicionar aluno</a></li>
			<li><a href="./lista_exercicios.php">Lista de exercicio</a></li>
			<li><a href="logout.php">Sair</a></li>
		</ul>
		</div>
	</nav>
    <br><br>
	<div class="container">
        <div class="row">
            <div class="card">
                <table class="striped">
                    <tr>
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
            </div>
        </div>
    </div>
    <center>
    <h2>Exercicios</h2>
    <?php while ($e = $exercicios->fetch_assoc()):
        $en = $conexao->query("SELECT nome_exercicio FROM exercicio WHERE exercicio_id={$e['exercicio_id']}")->fetch_array()[0];
        
        ?>
        <h4><?=$en?></h4>
        <ul>
            <li><?=$e['n_series']?> Séries</li>
            <li><?=$e['n_repeticoes']?> Repetições</li>
            <li><?=$e['carga']?>KGs de carga</li>
            <li><?=$e['observacoes']?></li>
        
        </ul>

    <?php endwhile ?>


    <h5><a href="./divisao_exercicio.php?id=<?=$divisao['divisao_id']?>">Adicionar exercicio</a></h5>
    </center>
    <br><br>
</body>

</html>