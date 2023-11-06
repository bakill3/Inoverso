<?php
include 'db_connect.php';
$pagina = basename($_SERVER['PHP_SELF']); //NOME DA PAGINA
?>
<!DOCTYPE html>
<html lang="PT">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="author" content="inoverso">
	<meta name="description" content="Inoverso - Empresa de  publicidade em Portimão. Especialistas na criação de identidades visuais, websites, aplicações, flyers, cartazes, montras, menus, cartões de visita, entre outros..."> <!-- DECRIÇÃO DA EMPRESA -->
	<meta name="keywords" content="design, sites, web, portimão, gráfico, portugal, flyer, app, cartaz, identidade visual, marca, menu">
	<link rel="stylesheet" type="text/css" href="bootstrap4/bootstrap.min.css"> <!-- BUSCAR BOOTSTRAP -->
	<link rel="stylesheet" type="text/css" href="bootstrap4/bootstrap-grid.min.css"> <!-- BUSCAR BOOTSTRAP -->
	<link rel="stylesheet" type="text/css" href="bootstrap4/bootstrap-reboot.min.css"> <!-- BUSCAR BOOTSTRAP -->

	<script type="text/javascript" src="jquery.min.js"></script> <!-- BUSCAR JQUER -->
	<script type="text/javascript" src="bootstrap4/popper.js"></script> <!-- BUSCAR BOOTSTRAP -->
	<script src="bootstrap4/bootstrap.min.js"></script> <!-- BUSCAR BOOTSTRAP -->
	<link href="https://fonts.googleapis.com/css?family=Open+Sans" rel="stylesheet">
	<link rel="shortcut icon" type="image/png" href="logo.png"/>
	<meta name="theme-color" content="#b62125"/>

	<link rel="stylesheet" type="text/css" href="main.min.css">
	<link href="https://fonts.googleapis.com/css?family=IBM+Plex+Sans" rel="stylesheet">
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous"> <!-- BUSCAR FONTAWESOME (ICONS) -->
	<title>inoverso - universo criativo</title>
	<link rel="stylesheet" href="dist/aos.css" />
</head>
<body <?php if ($pagina == "index.php" || $pagina == "login.php") { ?> style="width: 100%; height: 100%;    background: url(imagens/fundos/fundo_01.jpg);
background-repeat: no-repeat;
background-attachment: fixed;
/* background-position: center; */
background-size: cover;" <?php } ?>>

<nav class="navbar navbar-expand-lg navbar-light bg-light" style="width: 100%;     background-color: white !important;
color: black; box-shadow: 0px 0px 10px 3px rgba(0, 0, 0, 0.6); position: absolute; z-index: 10;">
<img src="logo.png" id="logo" class="d-inline-block align-top" alt="" style="width: 4%; cursor: pointer;">
<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo01" aria-controls="navbarTogglerDemo01" aria-expanded="false" aria-label="Toggle navigation">
	<span class="navbar-toggler-icon"></span>
</button>
<div class="collapse navbar-collapse" id="navbarTogglerDemo01" style="margin-left: 1.5%;">
	<ul class="navbar-nav mr-auto mt-2 mt-lg-0">
		<li class="nav-item nav-textos-controlo">
			<a class="nav-link nav-textos" href="sobre.php">Sobre</a>
		</li>
		<li class="nav-item nav-textos-controlo">
			<a class="nav-link nav-textos" href="portfolio.php">Portfólio</a>
		</li>
		<li class="nav-item nav-textos-controlo">
			<a class="nav-link nav-textos" href="formulario.php">Contacto</a>
		</li>
	</ul>
	<div style="color: #B62125; font-family: 'Neue-regular'; margin-right: 3%;"> <!--ICONS DAS REDES SOCIAIS AO CANTO-->
		<div style="display: inline-block;">
			<a href="https://www.facebook.com/inoverso.pt/" target="_blank" style="color: #B62125; cursor: pointer;"><i class="fab fa-facebook social-btns"></i></a>
		</div>
		<div style="color: #B62125; display: inline-block;">
			<a href="https://www.instagram.com/inoversocom/" target="_blank" style="color: #B62125; cursor: pointer;"><i class="fab fa-instagram social-btns"></i></a>
		</div>
		<div style=" color: #B62125; display: inline-block;">
			<a class="nostyle" style=" color: #B62125; cursor: pointer;" href="login.php"><i class="fas fa-user social-btns"></i></a>
		</div>

	</div>
</div>
</nav><div style="height: 100%; font-size: 0; padding-top: 5%;">
