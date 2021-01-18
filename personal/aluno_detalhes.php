<?php

require '../utils/verifica_sessao.php';
require '../bd/conexao.php';

$id_aluno = $_GET['id'];
$sql = "SELECT * FROM aluno WHERE aluno_id=$id_aluno;";
$dados = $conexao->query($sql)->fetch_assoc();

$treinos_sql = "SELECT treino_id, objetivo from treino WHERE aluno_id=$id_aluno";
$treinos=$conexao->query($treinos_sql);

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
 <div class="container">
        <div class="row">
            <div class="card">
			<table class="striped">
				<tr>
					<th>Campos</th>
					<th>Dados</th>			
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
		</div>
	</div>
</div>
	<center>
	<h2>Treinos</h2>
	<?php while ($t = $treinos->fetch_assoc()){
		echo "<a href='./treino_detalhes.php?id={$t['treino_id']}'>{$t['objetivo']}</a>";
		echo '<br>';
	}
	?>
	<br>
	<br>
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
<br><br><br>
</center>
</html>