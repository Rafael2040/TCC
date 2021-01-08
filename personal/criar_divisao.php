<?php

require '../utils/verifica_sessao.php';
require '../bd/conexao.php';

if($_SERVER['REQUEST_METHOD'] == 'POST') {
	$rotulo = $_POST['rotulo'];
	$desc = $_POST['desc'];
	$id = $_POST['treino'];
	$sql = "INSERT INTO divisao(treino_id, rotulo, descricao) VALUES ($id, '$rotulo', '$desc')";

	if($conexao->query($sql)){
		header('Location: ./listar_alunos.php');
	}
}

?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
	<meta charset="utf-8">
	<title>Criar divisao</title>
</head>
<body>
	<form method="POST">
		<center>
			<h2>Criar divisão</h2>
			<label for="obj">Rótulo:</label>
			<input type="text" name="rotulo" id="obj"><br><br>

			<label for="obs">Descrição:</label>
			<input type="text" name="desc" id="obs"><br><br>
			<input type="hidden" name="treino" value="<?=$_GET['id']?>">
			<input type="submit" value="Cadastrar" id="cadastrar" name="cadastrar">

		</center>
	</form>
	<br>
</body>
</html>