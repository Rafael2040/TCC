<?php

require '../utils/verifica_sessao.php';
require '../bd/conexao.php';

$id = $_GET['id'];
$sql = "SELECT * FROM treino 
		LEFT JOIN divisao ON treino.treino_id = divisao.treino_id
		WHERE treino.treino_id=$id";

$tudo = $conexao->query($sql)->fetch_array();
print_r($tudo);
$dados = $tudo[0];
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
	<title>Detalhes - <?=$dados['objetivo']?></title>
</head>
<body>
	<table style="border: 1px solid black">
		<tr>
			<th>Campo</th>
			<th>Dado</th>			
		</tr>
		<tr>
			<td>Observações</td>
			<td><?=$dados['observacoes']?></td>			
		</tr>
		<tr>
			<td>Data</td>
			<td><?=$dados['data']?></td>			
		</tr>
	</table>

	<h2>Divisões</h2>
	<ul>
		<?php 
			foreach($tudo as $d):
				if ($d['divisao_id'] == null) {
					break;
				}	
		?>
		<li><a href="#"><?=$d['divisao_rotulo']?></a></li>
		<?php endforeach ?>
	</ul>

	<a href="./aluno_editar.php?id=<?=$dados['aluno_id']?>">Editar</a><br>
	<a href="#" onclick="verificarExclusao()" style="color: red">Excluir Aluno</a><br>
	<a href="./criar_divisao.php?id=<?=$dados['treino_id']?>">Criar divisão</a>
</body>
<script>
function verificarExclusao(){
	if (confirm("tem certeza que deseja excluir o exercicio?")) {
		window.location = "./aluno_excluir.php?id=<?=$dados['aluno_id']?>";
	}
}
</script>
</html>