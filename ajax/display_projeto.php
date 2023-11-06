<?php
include '../db_connect.php';
$id_projeto = htmlspecialchars(mysqli_real_escape_string($link, $_POST['id_projeto']));
$query = mysqli_query($link, "SELECT * FROM portfolio WHERE id_trabalho='$id_projeto'");
$info = mysqli_fetch_assoc($query);

$nome_trabalho = $info['nome_trabalho'];
$descricao_trabalho = $info['descricao_trabalho'];
$imagem_trabalho = $info['imagem'];
$capa = $info['capa'];

$json_info = array('nome_trabalho' => $nome_trabalho, 'descricao_trabalho' => $descricao_trabalho, 'imagem_trabalho' => $imagem_trabalho, 'capa_trabalho' => $capa);
echo json_encode($json_info);
exit();
?>