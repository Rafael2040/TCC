<?php

require '../utils/verifica_sessao.php';
require '../bd/conexao.php';

$mensagens = [];

if(isset($_POST['cadastrar'])){
	$nome = $_POST['ex_nome'];
	$descricao = $_POST['ex_desc'];
	$tipo = $_POST['ex_tipo'];
	$personal = $_SESSION['id'];

	$sql = "INSERT INTO exercicio(nome_exercicio, descricao, tipo_de_estimulo, personal_id) VALUES ('$nome', '$descricao', '$tipo', $personal)";

	$conexao->query($sql);

	header('Location: ./lista_exercicios.php');
}

$dados = false;

if(isset($_GET['exercicio'])){
	$e =  $_GET['exercicio'];

	$sql = "SELECT * FROM exercicio WHERE exercicio_id = $e";
	$dados = $conexao->query($sql)->fetch_assoc();

}

?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
	<meta charset="utf-8">
	<title>Cadastro de Exercício</title>
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
<br><br><br>
<div class="container" id="login">
        <div class="card hoverable center-align col s6 offset-s5 grey lighten-3">
            <div class="card-content black-text">
                <span class="card-title">Cadastro de Exercicio</span>
                <div class="cadastro">
				<form method="POST" action="">
					<center>
						<label for="nome">Nome do Exercicío</label>
						<input 
							type="text" 
							name="ex_nome" 
							id="nome_exercicio"
							<?= $dados ? "value='{$dados['nome_exercicio']}'" : '' ?>
						>

						<br><br>

						<label for="endereco">Descrição</label>
						<input 
							type="text" 
							name="ex_desc" 
							id="descricao"
							<?= $dados ? "value='{$dados['descricao']}'" : '' ?>
						><br><br>

						<label for="endereco">Tipo de Estímulo</label>
						<input 
							type="text" 
							name="ex_tipo" 
							id="tipo_estimulo"
							<?= $dados ? "value='{$dados['tipo_de_estimulo']}'" : '' ?>
						><br><br>

						<input class="btn waves-effect waves-light #673ab7 grey darken-4" type="submit" value="Cadastrar" id="cadastrar" name="cadastrar">
					</center>

                </form>
            </div>
        </div>
    </div>  
</div>
	<br>
	<?php 
        if(count($mensagens) > 0){
            echo "<b>ERROS!</b> <br>";
            foreach($mensagens as $mensagem){
                echo $mensagem;
                echo "<br>";
            }
        }
    ?>
</body>
</html>