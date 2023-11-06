<?php
header('Content-Type: text/html; charset=utf-8');
/* $link = mysqli_connect("localhost", "hw36am2w", "Pd*1141187*", "hw36am2w_i9_trabalho"); */
$link = mysqli_connect("HOST", "USERNAME", "PASSWORD", "hw36am2w_i9_trabalho");
if ($link ==FALSE) {
	die("Nao foi possivel estabelecer uma conexao" . mysqli_error());
	exit;
}
mysqli_set_charset($link, "utf8mb4");
session_start();
?>