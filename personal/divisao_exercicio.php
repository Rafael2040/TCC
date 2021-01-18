<?php

require '../utils/verifica_sessao.php';
require '../bd/conexao.php';
$personal_id = $_SESSION['id'];
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $r = $_POST['repeticoes'];
    $s = $_POST['series'];
    $c = $_POST['carga'];
    $e = $_POST['exercicio'];
    $d = $_POST['div'];
    $o = $_POST['obs'];

    $sql = "INSERT INTO divisao_exercicio(exercicio_id, divisao_id, n_series, n_repeticoes, carga, observacoes) 
    VALUES ($e, $d, $s, $r, $c, '$o' )";

    if ($conexao->query($sql)) {
        header("Location: ./divisao_detalhes.php?id=$d");
    }

    exit();
}

$exercicios = $conexao->query("SELECT exercicio_id, nome_exercicio FROM exercicio WHERE personal_id = $personal_id");


?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Adicionar Exercicio</title>
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
                <span class="card-title">Cadastro de exercicio</span>
                <div class="cadastro">
                    <form method="post">

                        <label for="exercicio">Exercicio</label>
                        <select name="exercicio" id="exercicio">
                            <?php while($e = $exercicios->fetch_assoc()):?>
                                <option value="<?=$e['exercicio_id']?>"><?=$e['nome_exercicio']?></option>
                            <?php endwhile ?>
                        </select>
                        <br>
                        <label for="series">séries</label>
                        <input type="number" name="series" id="series">

                        <br>
                        <label for="repeticoes">repetições</label>
                        <input type="number" name="repeticoes" id="repeticoes">
                        <br>

                        <label for="carga">carga</label>
                        <input type="number" name="carga" id="carga">
                        <br>

                        <label for="obs">Observações</label>
                        <input type="text" name="obs" id="obs">
                        <br>
                        <input type="hidden" name="div" value="<?=$_GET['id']?>">

                        <input class="btn waves-effect waves-light #673ab7 grey darken-4" type="submit" value="Adicionar">
                    </form>
                </div>
            </div>
        </div>  
    </div>
    <script>
	document.addEventListener('DOMContentLoaded', function() {
   	 	var elems = document.querySelectorAll('select');
    	var instances = M.FormSelect.init(elems);
  });
</script>
</body>

</html>