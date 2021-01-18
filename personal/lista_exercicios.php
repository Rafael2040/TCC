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
	<center>
		<h2><a href="./criar_exercicio.php">Criar Exercício</h2>
	</center>
	<?php while ($exercicio = $exercicios->fetch_assoc()): ?>
		<?php $urlEdicao = "./criar_exercicio.php?exercicio=".$exercicio['exercicio_id']; ?>

	<div class="container">
        <div class="row">
            <div class="card">
                <table class="striped">
                    <thead>
                        <tr>

                        </tr>
                    </thead>
                    <tbody>
						<td><a href="<?=$urlEdicao?>"><?=$exercicio['nome_exercicio']?></a></td>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
	<?php endwhile ?>
</body>
</html>

