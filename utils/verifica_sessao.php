<?php
if (!isset($_SESSION['nome']) && !isset($_SESSION['id'])) {
	session_destroy();
	header("Location: ../index.php?erro=nao_logado");
}
?>
