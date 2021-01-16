<?php

require './bd/conexao.php';

if($_SERVER['REQUEST_METHOD'] == 'POST'){
  $email = $_POST['email'];
  $entrar = $_POST['entrar'];
  $senha = MD5($_POST['senha']);

    if (isset($entrar)) {
      $query = "SELECT * FROM personal WHERE email = '$email' AND senha = '$senha'";
        $verifica = mysqli_query($conexao, $query) or die($connect->error);

        var_dump(mysqli_num_rows($verifica));
        if (mysqli_num_rows($verifica) <= 0){
          echo"<script>alert('Login e/ou senha incorretos');window.location.href='index.php';</script>";

          die();

        }else{
          session_start();
          $dados = mysqli_fetch_assoc($verifica);
          $_SESSION['nome'] = $dados['nome'];
          $_SESSION['id'] = $dados['personal_id'];
            header("Location: ./personal/index.php");
        }
    }

    echo $conexao->error;
}



?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
  <meta charset="utf-8">

  <!-- Compiled and minified CSS -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">

  <!-- Compiled and minified JavaScript -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>

  <title>Login de Personal</title>
</head>
<body>
  <br><br><br><br>
  <div class="container" id="login">
        <div class="card hoverable center-align col s6 offset-s5 grey lighten-3">
            <div class="card-content black-text">
                <span class="card-title">Entrar</span>
                  <form method="POST" action="index.php">
                    <center>
                      <label for="email">Email</label>
                      <input type="email" name="email" id="email"><br><br>

                      <label for="senha">Senha</label>
                      <input type="password" name="senha" id="senha"><br><br>

                      <input class="btn waves-effect waves-light #673ab7 grey darken-4" type="submit" value="Entrar" id="entrar" name="entrar">

                    </center>
                  </form>
                </div>
                <a href="cadastro.php">
                    <button class="btn waves-effect waves-light #673ab7 grey darken-4" type="submit" name="action">Cadastre-se
                        <i class="fa fa-send"></i>
                    </button>
                </a>
                    <br><br>
                </form>
            </div>
        </div>
    </div>                 
</body>
</html>