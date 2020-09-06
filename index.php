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
  <title>Login de Personal</title>
</head>
<body>
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
</body>
</html>