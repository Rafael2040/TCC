<?php

require '../utils/verifica_sessao.php';
require '../bd/conexao.php';

if($_SERVER['REQUEST_METHOD'] == 'POST') {
	$obj = $_POST['obj'];
	$obs = $_POST['obs'];
	$data = $_POST['data'];
	$aluno = $_POST['aluno'];
	$sql = "INSERT INTO treino(aluno_id, observacoes, objetivo, data) VALUES ($aluno, '$obs', '$obj', '$data')";

	$conexao->query($sql);
	$id = $conexao->insert_id;
	header("Location: ./treino_detalhes.php?id=$id");
}

?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
	<meta charset="utf-8">
	<title>Criar treino</title>
</head>
<body>
	<form method="POST" action="criar_treino.php">
		<center>
			<h2>Criar treino</h2>
			<label for="obj">Objetivo:</label>
			<input type="text" name="obj" id="obj"><br><br>

			<label for="obs">Observações:</label>
			<input type="text" name="obs" id="obs"><br><br>

		    <label for="data" >Data</label>
			<input type="date" name="data" id="data"><br><br>
			
			<input type="hidden" name="aluno" value="<?=$_GET['id']?>">
			

			<input type="submit" value="Cadastrar" id="cadastrar" name="cadastrar">

			

		</center>
	</form>
	<br>
</body>
</html>