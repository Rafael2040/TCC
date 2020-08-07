<?php
session_start();

require '../utils/verifica_sessao.php';
require '../bd/conexao.php';

$personal_id = $_SESSION['id'];
$personal_nome = $_SESSION['nome'];

//buscar alunos no banco
$sql = "SELECT * FROM aluno";
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
	<h2><a href="logout.php">Sair</a></h2>
	<ul>
	<?php while ($aluno = $alunos->fetch_assoc()): ?>
		<?php $urlEdicao = "./aluno_editar.php?id={$aluno['aluno_id']}"; ?>
		<li><a href="<?=$urlEdicao?>"><?=$aluno['nome']?></a></li>
	<?php endwhile ?>
	</ul>
</body>
</html>

