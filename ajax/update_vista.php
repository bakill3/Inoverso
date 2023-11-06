<?php
include '../db_connect.php';

$id_user_enviou = htmlspecialchars(mysqli_real_escape_string($link, $_POST['id_user']));

$query = mysqli_query($link, "SELECT vista FROM users WHERE id='".$_SESSION['login'][1]."'");
$info = mysqli_fetch_assoc($query);
$vista = $info['vista'];

if ($vista == 1) {
	mysqli_query($link, "UPDATE notificacoes SET vista_notificacoes='0' WHERE id_user_enviou='".$_SESSION['login'][1]."' AND id_user_recebeu='$id_user_enviou'");
	mysqli_query($link, "UPDATE users SET vista='0', vista_email='0' WHERE id='".$_SESSION['login'][1]."'");
}

?>