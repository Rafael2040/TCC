<?php

require '../utils/verifica_sessao.php';
require '../bd/conexao.php';

$id_aluno = $_GET['id'];
$sql = "SELECT * FROM aluno WHERE aluno_id=$id_aluno;";
$dados = $conexao->query($sql)->fetch_assoc();

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
	<title>Detalhes - <?=$dados['nome']?></title>
</head>
<body>
	<table style="border: 1px solid black">
		<tr>
			<th>Campo</th>
			<th>Dado</th>			
		</tr>
		<tr>
			<td>Nome</td>
			<td><?=$dados['nome']?></td>			
		</tr>
		<tr>
			<td>Email</td>
			<td><?=$dados['email']?></td>			
		</tr>
		<tr>
			<td>Endereço</td>
			<td><?=$dados['endereco']?></td>			
		</tr>
		<tr>
			<td>Sexo</td>
			<td><?=$dados['sexo']?></td>			
		</tr>
		<tr>
			<td>Data de nascimento</td>
			<td><?=$dados['data_de_nascimento']?></td>			
		</tr>
		<tr>
			<td>Nível de treinamento</td>
			<td><?=$dados['nivel_de_treinamento']?></td>			
		</tr>
		<tr>
			<td>Objetivo</td>
			<td><?=$dados['objetivo']?></td>			
		</tr>
		<tr>
			<td>Observações</td>
			<td><?=$dados['observacoes']?></td>			
		</tr>
	</table>

	<a href="./aluno_editar.php?id=<?=$dados['aluno_id']?>">Editar</a><br>
	<a href="#" onclick="verificarExclusao()" style="color: red">Excluir Aluno</a><br>
	<a href="./criar_treino.php?id=<?=$dados['aluno_id']?>">Criar treino</a>
</body>
<script>
function verificarExclusao(){
	if (confirm("tem certeza que deseja excluir o aluno?")) {
		window.location = "./aluno_excluir.php?id=<?=$dados['aluno_id']?>";
	}
}
</script>
</html>