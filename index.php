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
  <div class="container" id="login">
        <div class="card hoverable center-align col s6 offset-s5 grey lighten-3">
            <div class="card-content black-text">
                <span class="card-title">Entrar</span>
                  <form method="POST" action="index.php">
                    <center>
                      <h2>Login de Personal</h2>
                      <label for="email">Email</label>
                      <input type="email" name="email" id="email"><br><br>

                      <label for="senha">Senha</label>
                      <input type="password" name="senha" id="senha"><br><br>

                      <input type="submit" value="Logar" id="entrar" name="entrar">

                      <a href="cadastro.php">Cadastre-se</a>
                    </center>
                  </form>
                </div>
                    <button class="btn waves-effect waves-light #673ab7 grey darken-4" type="submit" name="action">Entrar
                        <i class="fa fa-send"></i>
                    </button>
                </form>
            </div>
        </div>
    </div>                 
</body>
</html>

  <div class="grey darken-4 nav-wrapper">
            <a href="index.php" class="brand-logo"><img src="imagens/gtec.png" height="90px"></a>
            <ul id="nav-mobile" class=" right hide-on-med-and-down">
                <li><a href="entrar.php">Entrar como administrador</a></li>
            </ul>
        </div>
    </nav>
    <br><br><br>

    <div class="container" id="login">
        <div class="card hoverable center-align col s6 offset-s5 grey lighten-3">
            <div class="card-content black-text">
                <span class="card-title">Entrar</span>
                <form class="col s12" method="POST" action="actions/login.php">
                    <p>
                        <div class="input-field">
                            <i class="material-icons prefixe">people</i><input class="validate" name="nome" placeholder="João Silva" id="email_cad" type="text" required="required">
                            <label for="email_cad" data-error="email inválido" data-success="email valido">Seu nome</label>
                        </div>
                  
                    <p>
                        <div class="input-field">
                            <p>  <i class="material-icons ">vpn_key</i><input class="validate" name="senha" placeholder="ex. 1234" id="senha_cad" type="password" required="required">
                            <label for="senha_cad">Sua senha</label>
                        </div>
                    <button class="btn waves-effect waves-light #673ab7 grey darken-4" type="submit" name="action">Entrar
                        <i class="fa fa-send"></i>
                    </button>
                </form>
            </div>
        </div>
    </div>                 