<?php
include 'main_code.php';
if (!isset($_SESSION['login'])) {
	echo "<script>window.location.href='login.php'</script>";
}
$pagina = basename($_SERVER['PHP_SELF']);
?>
<!DOCTYPE html>
<html lang="PT">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="description" content="Empresa de design, website, flyers, notas">

	<script type="text/javascript" src="jquery.min.js"></script>
	<script src="bootstrap4/bootstrap.min.js"></script>
	<script src="croppie/croppie.js"></script>
	<link rel="stylesheet" type="text/css" href="bootstrap4/bootstrap.min.css">


	<link rel="stylesheet" type="text/css" href="croppie/croppie.css">
	<script type="text/javascript" src="bootstrap4/popper.js"></script>

	<link href="https://fonts.googleapis.com/css?family=Open+Sans" rel="stylesheet">
	<link rel="shortcut icon" type="image/png" href="logo.png"/>
	<meta name="theme-color" content="#317EFB"/>

	<link href="https://fonts.googleapis.com/css?family=Open+Sans" rel="stylesheet">
	<link rel="stylesheet" type="text/css" href="main.css">
	<link href="https://fonts.googleapis.com/css?family=IBM+Plex+Sans" rel="stylesheet">
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
	<title>inoverso - universo criativo</title>
	<link rel="stylesheet" href="dist/aos.css" />
</head>
<body <?php if ($pagina == "index.php" || $pagina == "login.php") { ?> style="width: 100%; height: 100%;    background: url(background3.jpg);
background-repeat: no-repeat;
background-attachment: fixed;
background-position: center;
background-size: cover;" <?php } ?>>


<div style="width: 18%; background-color: rgba(182, 33, 37, 1); display: inline-block; vertical-align:top;    min-height: 100%;
height: 100%;" id="left_dashboard_nav">
<div id="btn_responsive_nonav_2" class="text-white" style="display: none;"><i class="fas fa-times" style="font-size: 25px; padding: 4% 0% 0% 4%;"></i></div>
<div class="text-center" style="margin: 0 auto; padding-top: 15%; color: #FFF; font-family: 'Neue-bold', sans-serif;" id="menu_left">



	<img class="img-fluid" src="logo_white.png" style="width: 15%;" data-aos="zoom-in-down"><br>

	<div class="text-center" style="padding-top: 15%;" id="img_dash_div">
		<img class="img-fluid foto_perfil" src="<?php echo $_SESSION['login'][4]; ?>" style="width: 50%; border-radius: 50%; margin: 0 auto;" data-aos="flip-down" id="img_dash">
	</div><br>

	<div data-aos="zoom-in">
		<p class="Neue-bold responsive_titles" style="font-size: 21px;" ><span class="nome_perfil"><?php echo $_SESSION['login'][2]."</span> <span class='apelido_perfil'>".$_SESSION['login'][3]."</span>"; ?></p>
		<p class="Neue-bold responsive_titles" style="font-size: 13px;" ><span class="id_menu"><?php echo $_SESSION['login'][1]."</span>"; ?></p>
	</div>
	<div id="dash_menu" style="padding-top: 5%; display: inline-block;" >

		<?php
		if ($_SESSION['login'][5] == 1) {
			?>

			<div data-aos="fade-right">
				<a class="nostyle responsive" style="cursor: pointer;" href="dashboard.php">Dashboard</a><br>
			</div>
			<div data-aos="fade-left">
				<a class="nostyle responsive" style="cursor: pointer;" href="editar_portfolio.php">Portfólio</a><br>
			</div>
			<div data-aos="fade-right">
				<a class="nostyle responsive" style="cursor: pointer;" href="orcamentos.php">Orçamentos</a><br>
			</div>
			<div data-aos="fade-left">
				<a class="nostyle responsive" style="cursor: pointer;" href="clientes.php">Clientes</a><br>
			</div>
			<div data-aos="fade-right">
				<a class="nostyle responsive" style="cursor: pointer;" href="mensagens.php">Mensagens</a><br>
			</div>
			<div data-aos="fade-left">
				<a class="nostyle responsive" style="cursor: pointer;" href="editar_perfil.php">Editar Perfil</a><br>
			</div>
			<div data-aos="fade-right">
				<a class="nostyle responsive" style="cursor: pointer;" href="logout.php">Sair</a><br>
			</div>

			<?php
		} else {
			?>
			<div data-aos="fade-right">
				<a class="nostyle responsive" style="cursor: pointer;" href="orcamentos.php">Orçamentos</a><br>
			</div>
			<div data-aos="fade-right">
				<a class="nostyle responsive" style="cursor: pointer;" href="mensagens.php">Mensagens</a><br>
			</div>
			<div data-aos="fade-left">
				<a class="nostyle responsive" style="cursor: pointer;" href="editar_perfil.php">Editar Perfil</a><br>
			</div>
			<div data-aos="fade-right">
				<a class="nostyle responsive" style="cursor: pointer;" href="logout.php">Sair</a><br>
			</div>
			<?php
		}
		?>

	</div>


</div>

</div><div style="width: 100%; height: 7%; background-color: #b62125; display: none;vertical-align: top;" id="btn_responsive_nonav"><i class="fas fa-bars" style="font-size: 30px;padding-top: 2%;padding-left: 3%; color: #fff;"></i></div>
