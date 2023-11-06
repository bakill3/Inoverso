<?php
include '../db_connect.php';

if (isset($_SESSION['login'])) {
	header('Location: home.php');
	exit(0);
}

if (isset($_POST['email']) && isset($_POST['password'])) {
	$email = htmlspecialchars(mysqli_real_escape_string($link, $_POST['email']));
	$password = htmlspecialchars(mysqli_real_escape_string($link, $_POST['password']));

	if (!empty($email) && !empty($password)) {
		$query = mysqli_query($link, "SELECT * FROM users WHERE email='$email'");
		$info_query = mysqli_fetch_assoc($query);

		$id_user = $info_query['id'];
		$pass_db = $info_query['password'];
		$nome = $info_query['nome'];
		$apelido = $info_query['apelido'];
		$foto = $info_query['foto'];
		$role_status = $info_query['role_status'];


		if (mysqli_num_rows($query) == 1 && password_verify($password, $pass_db)) {
			$_SESSION['login'] = array($email, $id_user, $nome, $apelido, $foto, $role_status);
			echo $role_status;
		} else {
			echo "Email/Password incorrecto.";
		}

	}
}
?>