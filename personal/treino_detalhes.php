<?php

require '../utils/verifica_sessao.php';
require '../bd/conexao.php';

$id = $_GET['id'];
$sql_treino = "SELECT * FROM treino WHERE treino_id=$id";
$sql_divisoes = "SELECT rotulo, divisao_id FROM divisao WHERE treino_id=$id";

$treino = $conexao->query($sql_treino)->fetch_assoc();
$divisoes =  $conexao->query($sql_divisoes)->fetch_all();
var_dump($divisoes);
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
</head>
<body>
	<table style="border: 1px solid black">
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

	<h2>Divisões</h2>
	<ul>
		<?php foreach($divisoes as $d):?>
		<li><a href="#"><?=$d[0]?></a></li>
		<?php endforeach ?>
	</ul>

	<a href="#" onclick="verificarExclusao()" style="color: red">Excluir Aluno</a><br>
	<a href="./criar_divisao.php?id=<?=$id?>">Criar divisão</a>
</body>
<script>
function verificarExclusao(){
	if (confirm("tem certeza que deseja excluir o exercicio?")) {
		window.location = "./aluno_excluir.php?id=<?=$treino['aluno_id']?>";
	}
}
</script>
</html>