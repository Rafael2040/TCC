<?php

require '../utils/verifica_sessao.php';
require '../bd/conexao.php';

$personal_id = $_SESSION['id'];
$personal_nome = $_SESSION['nome'];

//buscar alunos no banco
$sql = "SELECT * FROM aluno WHERE personal_id=$personal_id";//pegar só os aluno daquele personal"$perosnal_id= personal_id"
$alunos = mysqli_query($conexao, $sql) or die($conexao->close());

?>
<!DOCTYPE html>
<html>
<head>
	<title>Página Inicial</title>
</head>
<body>
	<h1>Bem vindo <?=$_SESSION['nome']?></h1>
	<h2><a href="./aluno_formulario.php">Adicionar Aluno</h2>
	<h2><a href="./lista_exercicios.php">Lista de Exercício</h2>
	<h2><a href="./criar_treino.php">Adicionar treino</h2>
	<h2><a href="./listar_alunos.php">Lista de Alunos</h2>
	<h2><a href="logout.php">Sair</a></h2>
</body>
</html>

