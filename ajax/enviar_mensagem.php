<?php
include '../db_connect.php';

	$user_from = $_SESSION['login'][1];
	$user_to = htmlspecialchars(mysqli_real_escape_string($link, $_POST['id_other']));

	$mensagem = htmlspecialchars(mysqli_real_escape_string($link, $_POST['message'])); 
	$data = date("Y-m-d H:i:s");

	if (!empty($mensagem)) {
		mysqli_query($link, "INSERT INTO mensagens(user_from, user_to, mensagem, data) VALUES('$user_from', '$user_to', '$mensagem', '$data')");
		mysqli_query($link, "INSERT INTO notificacoes(tipo, id_user_enviou, id_user_recebeu, data, vista_notificacoes) VALUES ('mensagem', '$user_from', '$user_to', '$data', '1')");
		mysqli_query($link, "UPDATE users SET vista='1', vista_email='1' WHERE id='$user_to'");
	}

?>