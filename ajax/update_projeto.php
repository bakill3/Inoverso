<?php
include '../db_connect.php';
$id_projeto = htmlspecialchars(mysqli_real_escape_string($link, $_POST['id_projeto']));
$nome_trabalho = mysqli_real_escape_string($link, $_POST['nome_trabalho']);
$descricao_trabalho = mysqli_real_escape_string($link, $_POST['descricao_trabalho']);
$tamanho_imagem = htmlspecialchars(mysqli_real_escape_string($link, $_POST['tamanho_imagem']));
//$capa_trabalho = htmlspecialchars(mysqli_real_escape_string($link, $_POST['capa_trabalho']));

if (!empty($nome_trabalho) && !empty($descricao_trabalho)) {
	$query = "UPDATE portfolio SET nome_trabalho='$nome_trabalho', tamanho_imagem='$tamanho_imagem', descricao_trabalho='$descricao_trabalho'";
	if (isset($_FILES["imagem_upload"]["tmp_name"])) {

		$existe = "../imagens/portfolio/".$id_projeto."/main";
		if (!is_dir($existe)) {
			mkdir(''.$existe.'', 0777, true);
		}
		$targetPath = "imagens/portfolio/".$id_projeto."/main/".$_FILES["imagem_upload"]["name"]; 

		$caminho = "../imagens/portfolio/".$id_projeto."/main/".$_FILES["imagem_upload"]["name"]; 

		move_uploaded_file($_FILES["imagem_upload"]["tmp_name"], $caminho);    

		$query .= ", imagem='$targetPath'";


	} 
	if (isset($_FILES["capa_trabalho"]["tmp_name"])) {

		$existe = "../imagens/portfolio/".$id_projeto."/capas";
		if (!is_dir($existe)) {
			mkdir(''.$existe.'', 0777, true);
		}
		$targetPath2 = "imagens/portfolio/".$id_projeto."/capas/".$_FILES["capa_trabalho"]["name"]; 

		$caminho = "../imagens/portfolio/".$id_projeto."/capas/".$_FILES["capa_trabalho"]["name"]; 

		move_uploaded_file($_FILES["capa_trabalho"]["tmp_name"], $caminho);    

		$query .= ", capa='$targetPath2'";

	} 

	if (!isset($targetPath)) {
		$targetPath = "nope";
	}

	if (!isset($targetPath2)) {
		$targetPath2 = "nope";
	}

	//$query .= " nome_trabalho='$nome_trabalho', tamanho='$tamanho_imagem', descricao_trabalho='$descricao_trabalho'";
	

	$query .= " WHERE id_trabalho='$id_projeto'";
	mysqli_query($link, $query);
	$erro = mysqli_error($link);
	echo json_encode(array('mensagem' => 'Dados atualizados!', 'status' => '1', 'imagem_trabalho' => $targetPath, 'capa_trabalho' => $targetPath2, 'teste' => $erro));
	
	
} else {
	echo json_encode(array('mensagem' => 'Preencha todos os dados!', 'status' => '0', 'teste' => $erro));
}



//$json_info = array('nome_trabalho' => $nome_trabalho, 'descricao_trabalho' => $descricao_trabalho, 'imagem_trabalho' => $imagem_trabalho);
//echo json_encode($json_info);
exit();
?>