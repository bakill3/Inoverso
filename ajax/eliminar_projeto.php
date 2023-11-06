<?php
include '../db_connect.php';
$id_projeto = htmlspecialchars(mysqli_real_escape_string($link, $_POST['id_projeto']));
if (!empty($id_projeto)) {
	mysqli_query($link, "DELETE FROM portfolio WHERE id_trabalho='$id_projeto'");
}
?>