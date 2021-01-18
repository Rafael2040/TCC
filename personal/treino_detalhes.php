<?php

require '../utils/verifica_sessao.php';
require '../bd/conexao.php';

$id = $_GET['id'];
$sql_treino = "SELECT * FROM treino WHERE treino_id=$id";
$sql_divisoes = "SELECT rotulo, divisao_id FROM divisao WHERE treino_id=$id";

$treino = $conexao->query($sql_treino)->fetch_assoc();
$divisoes =  $conexao->query($sql_divisoes)->fetch_all();
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
	<meta charset="utf-8">
	<style type="text/css">
		table, th, td {
			border: 1px solid black;
			border-collapse: collapse;
		}
	</style>
	<title>Detalhes - <?=$treino['objetivo']?></title>
	 <!-- Compiled and minified CSS -->
	 <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">

	<!-- Compiled and minified JavaScript -->
	<script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
</head>
<body>
<nav>
    <div class="nav-wrapper grey darken-4">
      <a href="#" class="brand-logo"><img src="../imagens/logo.png" style="height:60px"></a>
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
						<th>Campo</th>
						<th>Dado</th>			
					</tr>
					<tr>
						<td>Observações</td>
						<td><?=$treino['observacoes']?></td>			
					</tr>
					<tr>
						<td>Data</td>
						<td><?=$treino['data']?></td>			
					</tr>
				</table>
            </div>
        </div>
    </div>

<center>

		<h2>Divisões</h2>
		<ul>
			<?php foreach($divisoes as $d):?>
			<li><a href="./divisao_detalhes.php?id=<?=$d[1]?>"><?=$d[0]?></a></li>
			<?php endforeach ?>
		</ul>

		<a href="#" onclick="verificarExclusao()" style="color: red">Excluir exercicio</a><br>
		<a href="./criar_divisao.php?id=<?=$id?>">Criar divisão</a>
	</body>
	<script>
	function verificarExclusao(){
		if (confirm("tem certeza que deseja excluir o exercicio?")) {
			window.location = "./aluno_excluir.php?id=<?=$treino['aluno_id']?>";
		}
	}
	</script>
</center>
</html>