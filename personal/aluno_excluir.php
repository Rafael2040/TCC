<?php 

require '../bd/conexao.php';

$aluno_id = $_GET['id'];
$sql = "DELETE FROM aluno WHERE aluno_id=$aluno_id";

$result = $conexao->query($sql);

if($result){
	header('Location: ./index.php');	
} else {
	echo $conexao->error;
}

$conexao->close();

?>