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
 <div class="container" id="login">
        <div class="card hoverable center-align col s6 offset-s5 grey lighten-3">
            <div class="card-content black-text">
                <span class="card-title">Criar divisão</span>
                <div class="cadastro">
				<form method="POST">
					<center>
						<label for="obj">Rótulo:</label>
						<input type="text" name="rotulo" id="obj"><br><br>

						<label for="obs">Descrição:</label>
						<input type="text" name="desc" id="obs"><br><br>
						<input type="hidden" name="treino" value="<?=$_GET['id']?>">
						<input class="btn waves-effect waves-light #673ab7 grey darken-4" type="submit" value="Cadastrar" id="cadastrar" name="cadastrar">

					</center>
				</form>
			</div>
        </div>
    </div>  
</div>
	<br>
</body>
</html>