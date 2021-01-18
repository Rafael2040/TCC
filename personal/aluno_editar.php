<?php

require '../utils/verifica_sessao.php';
require '../bd/conexao.php';

$id = $_GET['id'];

if(isset($_POST['editar'])){
	$nome = $_POST['nome'];
	$email = $_POST['email'];
	$sexo = $_POST['sexo'];
	$nasc = $_POST['nasc'];
	$objetivo = $_POST['objetivo'];
	$obs = $_POST['observacoes'];
	$nivel = $_POST['nivel'];
	$endereco = $_POST['endereco'];

	$sql = "UPDATE aluno SET nome='$nome', email='$email', sexo='$sexo', data_de_nascimento='$nasc',objetivo='$objetivo', nivel_de_treinamento='$nivel', observacoes='$obs', endereco='$endereco' WHERE aluno_id='$id'";

	$conexao->query($sql);
	echo $conexao->error;
	header("Location: ./aluno_detalhes.php?id=$id");
}

$sql = "SELECT * FROM aluno WHERE aluno_id=$id";
$dados = $conexao->query($sql)->fetch_assoc();

?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
	<meta charset="utf-8">
	<title>Editar - <?=$dados['nome']?></title>
	<!-- Compiled and minified CSS -->
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">

	<!-- Compiled and minified JavaScript -->
	<script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
</head>
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
                <span class="card-title">Edição de Aluno - <?=$dados['nome']?></span>
                <div class="cadastro">
				<form method="POST" action="aluno_editar.php?id=<?=$id?>">
					<center>
						<label for="nome">Nome:</label>
						<input type="text" name="nome" id="nome" value="<?=$dados['nome']?>"><br><br>

						<label for="endereco">Endereço</label>
						<input type="text" name="endereco" id="endereco" value="<?=$dados['endereco']?>"><br><br>

						<label for="sexo">Sexo</label>
						<select name="sexo">
							<option value="M">Masculino</option>
							<option value="F">Feminino</option>
						</select><br><br>

						<label for="nasc">Data de Nascimento</label>
						<input type="date" name="nasc" id="nasc" value="<?=$dados['data_de_nascimento']?>"><br><br>

						<label for="nivel">Nivel de Treinamento</label>
						<select name="nivel">
							<option value="<?=$dados['nivel_de_treinamento']?>" selected readonly><?=$dados['nivel_de_treinamento']?></option>
							<option value="nenhum">Nenhum</option>
							<option value="basico">Básico</option>
							<option value="intermediario">Intermediário</option>
							<option value="avancado">Avançado</option>
						</select><br><br>
						
						<label for="objetivo">Objetivo:</label>
						<input type="text" name="objetivo" value="<?=$dados['objetivo']?>"><br><br>
						
						<label for="observacoes">Observações:</label>
						<input type="text" name="observacoes" value="<?=$dados['observacoes']?>"><br><br>
						
						<label for="email">Email:</label>
						<input type="email" name="email" value="<?=$dados['email']?>"><br><br>
						
						<input class="btn waves-effect waves-light #673ab7 grey darken-4" type="submit" value="Salvar" id="salvar" name="editar">

					</center>
				</form>
			</div>
        </div>
    </div>  
</div>
	<br>
</body>
</html>