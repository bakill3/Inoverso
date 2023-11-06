<?php
include 'db_connect.php';

/*
if (isset($_POST['editar_perfil'])) {
	$id_user = $_SESSION['login'][1];
	$nome = htmlspecialchars(mysqli_real_escape_string($link, $_POST['nome']));
	$apelido = htmlspecialchars(mysqli_real_escape_string($link, $_POST['apelido']));
	$email = htmlspecialchars(mysqli_real_escape_string($link, $_POST['email']));
	$password = htmlspecialchars(mysqli_real_escape_string($link, $_POST['password']));

	if (!empty($nome) && !empty($email) && !empty($apelido) && !empty($password)) {
		if (!is_numeric($nome) && !is_numeric($apelido)) {
			if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
				$existe = "imagens/utilizadores/".$id_user."";
				if (!is_dir($existe)) {
					mkdir($existe);
				}
				$file_name = $_FILES['file']['name'];
				$file_type = $_FILES['file']['type'];
				$file_size = $_FILES['file']['size'];
				$file_tem_loc = $_FILES['file']['tmp_name'];
				$file_store = "imagens/utilizadores/".$id."/".$file_name;
				move_uploaded_file($file_tem_loc, $file_store);

				$nova_password = password_hash($password , PASSWORD_DEFAULT);

				if ($password != "secretpass") {
					$query_txt = "UPDATE users SET nome='$nome', apelido='$apelido', email='$email', password='$nova_password' WHERE id='$id_user'";
				} else {
					$query_txt = "UPDATE users SET nome='$nome', apelido='$apelido', email='$email' WHERE id='$id_user'";
				}

				mysqli_query($link, $query_txt);

				if (!empty($file_name)) {
					mysqli_query($link, "UPDATE users SET foto='$file_store' WHERE id='$id_user'");
					$_SESSION['login'] = array($email, $id_user, $nome, $apelido, $file_store);
				} else {
					$_SESSION['login'][0] = $email;
					$_SESSION['login'][1] = $id_user;
					$_SESSION['login'][2] = $nome;
					$_SESSION['login'][3] = $apelido;
				}
				echo "Dados Atualizados!";
				

			} else {
				echo "Email Inválido!";
			}
		} else {
			echo "Nome/Apelido Inválidos!";
		}

	} else {
		echo "Preencha todos os dados!";
	}
	//echo "<script>window.location.href='editar_perfil.php';</script>";
	header('Location: editar_perfil.php');
	exit(0);
}
*/
?>