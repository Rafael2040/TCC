<?php
session_start();
include '../utils/verifica_sessao.php';
?>

<!DOCTYPE html>
<html>
<head>
	<title>Página Inicial</title>
</head>
<body>
	<h1>Bem vindo <?=$_SESSION['nome']?></h1>
	<h2><a href="logout.php">Sair</a></h2>
</body>
</html>

