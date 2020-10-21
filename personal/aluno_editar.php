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
</head>
<body>
	
	<form method="POST" action="aluno_editar.php?id=<?=$id?>">
		<center>
			<h2>Edição de Aluno - <?=$dados['nome']?></h2>
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
			
			<input type="submit" value="Salvar" id="salvar" name="editar">

		</center>
	</form>
	<br>
</body>
</html>