<?php

require '../utils/verifica_sessao.php';
require '../bd/conexao.php';

$personal_id = $_SESSION['id'];
$personal_nome = $_SESSION['nome'];

$sql = "SELECT * FROM exercicio WHERE personal_id=$personal_id";
$exercicios = mysqli_query($conexao, $sql) or die($conexao->close());

?>
<!DOCTYPE html>
<html>
<head>
	<title>Lista de Exercícios</title>
</head>
<body>
	<?php while ($exercicio = $exercicios->fetch_assoc()): ?>
		<?php $urlEdicao = ""; ?>
		<li>
			<a href="<?=$urlEdicao?>"><?=$exercicio['nome_exercicio']?></a>
		</li>
	<?php endwhile ?>
	</ul>
</body>
</html>

