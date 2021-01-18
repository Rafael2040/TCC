<?php

require '../utils/verifica_sessao.php';
require '../bd/conexao.php';

$personal_id = $_SESSION['id'];
$personal_nome = $_SESSION['nome'];

//buscar alunos no banco
$sql = "SELECT * FROM aluno WHERE personal_id=$personal_id";//pegar só os aluno daquele personal"$perosnal_id= personal_id"
$alunos = mysqli_query($conexao, $sql) or die($conexao->close());

?>
<!DOCTYPE html>
<html>
<head>
	<title>Página Inicial</title>
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
	<center><h1>Bem vindo <?=$_SESSION['nome']?></h1></center>
    <?php while ($aluno = $alunos->fetch_assoc()): ?>
        <?php $urlEdicao = "./criar_treino.php?id=".$aluno['aluno_id']; ?>
	<div class="container">
        <div class="row">
            <div class="card">
                <table class="striped">
                    <thead>
                        <tr>
                            <th>Cliente</th>
                            <th>Nome</th>
                            <th>Nivel de treinamento</th>
                            <th>Criar treino</th>
                        </tr>
                    </thead>
                    <tbody>
						<td>01</td>
						<td><?=$aluno['nome']?></td>
						<td>intermediario</td>
                        <td><a href="<?=$urlEdicao?>"><?=$aluno['aluno_id']?></a></td>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <?php endwhile ?>
</body>
</html>

