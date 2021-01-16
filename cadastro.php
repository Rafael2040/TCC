<?php

require './bd/conexao.php';
$mensagens = [];

$nome = NULL;
$email = NULL;
$nasc = NULL;

if(isset($_POST['cadastrar'])){
    $nome = isset($_POST['nome']) ? $_POST['nome'] : NULL;
    $email = isset($_POST['email']) ? $_POST['email'] : NULL;
    $nasc = isset($_POST['nasc']) ? $_POST['nasc'] : NULL;
    $senha = isset($_POST['senha']) ? md5($_POST['senha']) : NULL;
    $senha_2 = isset($_POST['senha_2']) ? md5($_POST['senha_2']) : NULL;

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
        array_push($mensagens, "Por favor preencha Confirmar Senha"); 
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
    }
    $query_select= "SELECT nome FROM personal WHERE nome='$nome'";
    $resultado = mysqli_query($conexao, $query_select);
    $usuario_verificado = mysqli_fetch_assoc($resultado)['nome'];
			
	$query = "INSERT INTO personal(nome,email,data_de_nascimento,senha) VALUES('$nome','$email','$nasc','$senha')";
	$insert = mysqli_query($conexao, $query);
			
	if($insert){
		header('Location: ./index.php');
	}else{
		echo $conexao->error."<br>".$query;
		}
	}	
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
	<meta charset="utf-8">
	<title>Cadastro de Personal</title>

    <!-- Compiled and minified CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">

    <!-- Compiled and minified JavaScript -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
</head>
<body>
<br><br><br>
<div class="container" id="login">
        <div class="card hoverable center-align col s6 offset-s5 grey lighten-3">
            <div class="card-content black-text">
                <span class="card-title">Cadastro de Personal</span>
                <div class="cadastro">
                <form method="POST" action="cadastro.php">
                    <center>                        
                        <label for="nome">Nome:</label>
                        <input type="text" name="nome" id="nome" minlength="3"><br><br>

                        <label for="email">Email:</label>
                        <input type="email" name="email"><br><br>

                        <label for="nasc" >Data de Nascimento</label>
                        <input type="date" name="nasc" id="nasc"><br><br>
                        
                        <label for="senha">Senha:</label>
                        <input type="password" class="" name="senha" id="senha"><br><br>

                        <label for="senha_2">Repita sua Senha:</label>
                        <input type="password" name="senha_2" id="senha_2"><br><br>
                        
                        <input class="btn waves-effect waves-light #673ab7 grey darken-4" type="submit" name="cadastrar" value="Cadastrar" ><br>

                    </center>
                </form>
                <br>
                <a href="index.php">
                    <button class="btn waves-effect waves-light #673ab7 grey darken-4" type="submit" name="action">Entrar no sistema
                        <i class="fa fa-send"></i>
                    </button>
                </a>
                </form>
            </div>
        </div>
    </div>  
</div>
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