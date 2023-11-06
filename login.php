<?php
include 'header.php';
if (isset($_SESSION['login'])) { //SE O USER JÁ TIVER FEITO LOGIN, É REDIRECIONADO PARA O PAINEL/HOME
	header('Location: dashboard.php');
	exit(0);
}
?>
<div style="width: 50%; display: inline-block; vertical-align:top;" id="form_css1">
	<div style="color: black; margin-top: 20%; margin-left: 20%;" data-aos="zoom-in-down">
		<h1 style="color: #fff !important;" class="Neue-bold" id="entre_em_contacto">Acompanhe o seu projeto de perto</h1>
	</div>
</div>
<div style="width: 50%; background-color: rgba(182, 33, 37, 0.8);; display: inline-block; vertical-align:top;" id="form_css2">

	<div class="Neue-regular" id="login_formulario" data-aos="flip-right">
		<div class="text-center">
			<h2 class="Neue-bold">Login</h2>
		</div>

		<div class="form-group">
			<label>Email</label>
			<input class="form-control input_login" type="email" name="login" id="email" placeholder="something@gmail.com">
		</div>
		<div class="form-group">
			<label>Palavra-Chave</label>
			<input class="form-control input_login" type="password" name="password" id="password" placeholder="Password">
		</div>
		<p class="text-danger Neue-bold" id="error"></p>
		<button class="btn btn-info" style="width: 100%; cursor: pointer;" id="login">Entrar</button>

	</div>	


</div>
<?php
include 'footer.php';
?>
