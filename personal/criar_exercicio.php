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
}

?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
	<meta charset="utf-8">
	<title>Cadastro de Exercício</title>
</head>
<body>
	<form method="POST" action="">
		<center>
			<h2>Cadastro de Exercicio</h2>
			<label for="nome">Nome do Exercicío</label>
			<input type="text" name="ex_nome" id="nome_exercicio"><br><br>

			<label for="endereco">Descrição</label>
			<input type="text" name="ex_desc" id="descricao"><br><br>

			<label for="endereco">Tipo de Estímulo</label>
			<input type="text" name="ex_tipo" id="tipo_estimulo"><br><br>

			<input type="submit" value="Cadastrar" id="cadastrar" name="cadastrar">
		</center>
	</form>
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