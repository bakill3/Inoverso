<?php
include '../db_connect.php';
$id_user = $_SESSION['login'][1];
$id_notificacao = htmlspecialchars(mysqli_real_escape_string($link, $_POST['id_notificacao']));
mysqli_query($link, "UPDATE notificacoes SET vista_notificacoes='0' WHERE id_user_recebeu='$id_user'");
?>