<?php

require '../utils/verifica_sessao.php';
require '../bd/conexao.php';
$mensagens = [];

$nome = NULL;
$endereco = NULL;
$sexo = NULL;
$nasc = NULL;
$nivel = NULL;
$objetivo = NULL;
$email = NULL;
$personal_id = $_SESSION['id'];

if(isset($_POST['cadastrar'])){
    $nome = isset($_POST['nome']) ? $_POST['nome'] : NULL;
    $endereco = isset($_POST['endereco']) ? $_POST['endereco'] : NULL;
    $sexo = isset($_POST['sexo']) ? $_POST['sexo'] : NULL;
    $nasc = isset($_POST['nasc']) ? $_POST['nasc'] : NULL;
    $nivel = isset($_POST['nivel']) ? $_POST['nivel'] : NULL;
    $objetivo = isset($_POST['objetivo']) ? $_POST['objetivo'] : NULL;
    $observacoes = isset($_POST['observacoes']) ? $_POST['observacoes'] : NULL;
    $email = isset($_POST['email']) ? $_POST['email'] : NULL;  
    $senha = isset($_POST['senha']) ? password_hash($_POST['senha'], PASSWORD_DEFAULT) : NULL;
    $senha_2 = isset($_POST['senha_2']) ? password_verify($_POST['senha_2'], $senha) : NULL;

    if(!$nome || !(strlen($nome) > 2) || (strlen($nome) > 255)){
        array_push($mensagens, "Por favor preencha Nome entre 2 e 255 caracteres");
    }
    if(!$email || !(strlen($email) > 6) || (strlen($email) > 255)){
        array_push($mensagens, "Por favor preencha Email entre 6 e 255 caracteres");
    }
    if(!$senha){
        array_push($mensagens, "Por favor preencha Senha");
    }
    if(!$senha_2){
        array_push($mensagens, "As senhas não conferem"); 
	}
    if($senha != $senha_2){
        array_push($mensagens, "A Senha e a sua confirmação devem ser iguais");
    } else {
        if((strlen($senha) < 8)){
            array_push($mensagens, "A Senha deve ter no minimo 8 caracteres");
        }
	 }
    if(!$nasc){
        array_push($mensagens, "Por favor preencha Data de Nascimento");
    }
    if(count($mensagens) === 0){
    	$query_select= "SELECT nome FROM aluno WHERE nome='$nome'";
		$resultado = mysqli_query($conexao, $query_select);
		$usuario_verificado = mysqli_fetch_assoc($resultado)['nome'];

		$query = "INSERT INTO aluno(nome,endereco,sexo,data_de_nascimento,nivel_de_treinamento,objetivo,observacoes,email,senha,personal_id) VALUES ('$nome','$endereco','$sexo','$nasc','$nivel','$objetivo','$observacoes','$email','$senha','$personal_id')";
		$insert = mysqli_query($conexao, $query);
			
		if($insert){
			header('Location: ../personal/index.php');
		}else{
			echo $conexao->error."<br>".$query;
			}
		}
    }	
    
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
	<meta charset="utf-8">
	<title>Cadastro - Aluno</title>
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
<?php 
        if(count($mensagens) > 0){
            echo "<b>ERROS!</b> <br>";
            foreach($mensagens as $mensagem){
                echo $mensagem;
                echo "<br>";
            }
        }
    ?>
<br><br><br>	
<div class="container" id="login">
        <div class="card hoverable center-align col s6 offset-s5 grey lighten-3">
            <div class="card-content black-text">
                <span class="card-title">Cadastro de Aluno</span>
                <div class="cadastro">
				<form method="POST" action="aluno_formulario.php">
					<center>
						<label for="nome">Nome:</label>
						<input type="text" name="nome" id="nome"><br><br>

						<label for="endereco">Endereço</label>
						<input type="text" name="endereco" id="endereco"><br><br>

						<label for="sexo">Sexo</label>
						
						<select name="sexo">
							<option value="M">Masculino</option>
							<option value="F">Feminino</option>
						</select><br><br>

						<label for="nasc" >Data de Nascimento</label>
						<input type="date" name="nasc" id="nasc"><br><br>

						<label for="nivel" >Nivel de Treinamento</label>
						
						<select name="nivel">
							<option value="nenhum">Nenhum</option>
							<option value="basico">Básico</option>
							<option value="intermediario">Intermediário</option>
							<option value="avancado">Avançado</option>
						</select><br><br>
						
						<label for="objetivo">Objetivo:</label>
						<input type="text" name="objetivo"><br><br>
						
						<label for="observacoes">Observações:</label>
						<input type="text" name="observacoes"><br><br>
						
						<label for="email">Email:</label>
						<input type="email" name="email"><br><br>

						<label for="senha">Senha:</label>
						<input type="password" name="senha" id="senha"><br><br>

						<label for="senha_2">Repita sua Senha:</label>
						<input type="password" name="senha_2" id="senha_2"><br><br>

						<input class="btn waves-effect waves-light #673ab7 grey darken-4" type="submit" value="Cadastrar" id="cadastrar" name="cadastrar">

					</center>
				</form>
				<br>
                <a href="../aluno/index.php">
                    <button class="btn waves-effect waves-light #673ab7 grey darken-4" type="submit" name="action">Fazer login
                        <i class="fa fa-send"></i>
                    </button>
                </a>
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