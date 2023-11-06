<?php
include '../db_connect.php';
$nome_trabalho = htmlspecialchars(mysqli_real_escape_string($link, $_POST['adicionar_nome_trabalho']));
$descricao_trabalho = htmlspecialchars(mysqli_real_escape_string($link, $_POST['adicionar_descricao_trabalho']));
$tamanho_imagem_add = htmlspecialchars(mysqli_real_escape_string($link, $_POST['tamanho_imagem_add']));

if (!empty($nome_trabalho) && !empty($descricao_trabalho)) {
	if (isset($_FILES["adicionar_imagem_upload"]["tmp_name"])) {

		$query = "INSERT INTO portfolio(id_user, nome_trabalho, descricao_trabalho, tamanho_imagem) VALUES ('".$_SESSION['login'][1]."', '$nome_trabalho', '$descricao_trabalho', '$tamanho_imagem_add')";
		mysqli_query($link, $query) or die(mysqli_error($link));
		$id_projeto = mysqli_insert_id($link);

		$existe = "../imagens/portfolio/".$id_projeto."";
		if (!is_dir($existe)) {
			mkdir(''.$existe.'', 0777, true);
		}
		$targetPath = "imagens/portfolio/".$id_projeto."/".$_FILES["adicionar_imagem_upload"]["name"]; 

		$caminho = "../imagens/portfolio/".$id_projeto."/".$_FILES["adicionar_imagem_upload"]["name"]; 

		move_uploaded_file($_FILES["adicionar_imagem_upload"]["tmp_name"], $caminho);    

		mysqli_query($link, "UPDATE portfolio SET imagem='$targetPath' WHERE id_trabalho='$id_projeto'");

	} else {
		$query = "INSERT INTO portfolio(id_user, nome_trabalho, descricao_trabalho, tamanho_imagem) VALUES ('".$_SESSION['login'][1]."', '$nome_trabalho', '$descricao_trabalho', '$tamanho_imagem_add')";
		mysqli_query($link, $query) or die(mysqli_error($link));
		$id_projeto = mysqli_insert_id($link);
	}
	
	echo json_encode(array('mensagem' => 'Projeto Inserido!', 'status' => '1', 'nome' => $_SESSION["login"][2], 'apelido' => $_SESSION["login"][3], 'foto' => $_SESSION["login"][4], 'id_projeto' => $id_projeto));
	
	
} else {
	echo json_encode(array('mensagem' => 'Preencha todos os dados!', 'status' => '0'));
}


exit();
?>