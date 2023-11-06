<?php
include '../db_connect.php';

$id_user = $_SESSION['login'][1];
$nome = htmlspecialchars(mysqli_real_escape_string($link, $_POST['nome']));
$apelido = htmlspecialchars(mysqli_real_escape_string($link, $_POST['apelido']));
$email = htmlspecialchars(mysqli_real_escape_string($link, $_POST['email']));
$password = htmlspecialchars(mysqli_real_escape_string($link, $_POST['password']));
$data = $_POST['data'];
$telemovel = htmlspecialchars(mysqli_real_escape_string($link, $_POST['telemovel']));

$data_new = date('Y-m-d', strtotime($data));

if (!empty($nome) && !empty($email) && !empty($apelido) && !empty($password)) {
	if (!is_numeric($nome) && !is_numeric($apelido)) {
		if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
			$existe = "../imagens/utilizadores/".$id_user."";
			if (!is_dir($existe)) {
				mkdir($existe);
			}
			if (isset($_POST['file'])) {
				$data = $_POST["file"];
				$file_tem_loc = $_FILES['file']['tmp_name'];

				$image_array_1 = explode(";", $data);

				$image_array_2 = explode(",", $image_array_1[1]);

				$data = base64_decode($image_array_2[1]);

				$file_name = time() . '.png';

				$file_store = "../imagens/utilizadores/".$id_user."/".$file_name;

				file_put_contents($file_store, $data);

				$image_file = addslashes(file_get_contents($file_name));
				//$file_name = $_FILES['file']['name'];
				//$file_type = $_FILES['file']['type'];
				//$file_size = $_FILES['file']['size'];
				//$file_tem_loc = $_FILES['file']['tmp_name'];
				
				//move_uploaded_file($file_tem_loc, $file_store);

				$file_store_db = "imagens/utilizadores/".$id_user."/".$file_name;
			}

			$nova_password = password_hash($password , PASSWORD_DEFAULT);

			if ($password != "secretpass") {
				$query_txt = "UPDATE users SET nome='$nome', apelido='$apelido', email='$email', telefone='$telemovel', data_nascimento='$data_new', password='$nova_password' WHERE id='$id_user'";
			} else {
				$query_txt = "UPDATE users SET nome='$nome', apelido='$apelido', email='$email', telefone='$telemovel', data_nascimento='$data_new' WHERE id='$id_user'";
			}

			mysqli_query($link, $query_txt) or die(mysqli_error($link));

			if (!empty($file_name)) {
				mysqli_query($link, "UPDATE users SET foto='$file_store_db' WHERE id='$id_user'");
				$_SESSION['login'] = array($email, $id_user, $nome, $apelido, $file_store_db);
				$json_info = array('foto_perfil' => $file_store_db, 'nome' => $nome, 'apelido' => $apelido, 'mensagem' => 'Dados Atualizados!', 'status' => '1');
			} else {
				$json_info = array('nome' => $nome, 'apelido' => $apelido, 'mensagem' => 'Dados Atualizados!', 'status' => '1');
				$_SESSION['login'][0] = $email;
				$_SESSION['login'][1] = $id_user;
				$_SESSION['login'][2] = $nome;
				$_SESSION['login'][3] = $apelido;
			}
			//echo "Dados Atualizados!";
			echo json_encode($json_info);
			exit();


		} else {
			echo json_encode(array('mensagem' => 'Email Inválido!', 'status' => '0'));
			//echo "Email Inválido!";
		}
	} else {
		echo json_encode(array('mensagem' => 'Nome/Apelido Inválidos!', 'status' => '0'));
		//echo "Nome/Apelido Inválidos!";
	}

} else {
	echo json_encode(array('mensagem' => 'Preencha todos os dados!', 'status' => '0'));
	//echo "Preencha todos os dados!";

}

?>