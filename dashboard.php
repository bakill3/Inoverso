<?php
include 'modal.php';
include 'header_nonav.php';
$query_notificacoes = mysqli_query($link, "SELECT * FROM users INNER JOIN projetos ON users.id = projetos.id_user");
$conta_projetos = mysqli_num_rows($query_notificacoes);
?>
<div style="display: inline-block; padding-left: 3%; padding-top: 2%; width: 81%;" id="second_nav_content">
	<div data-aos="zoom-in-right">
		<h1 style="color: #414042; font-size: 80px;" class="Neue-bold" id="dashboard_title">Dashboard</h1>
	</div>

	<div class="row">
		<div class="col-sm" style="background-color: #0E4869; padding: 2%; cursor: pointer; border-radius: 5px; margin:1.4%;" data-aos="zoom-in-right">
			<a href="https://www.inoverso.com/pedir_orcamento.php"style="text-decoration:none;">
				<h1 style="font-size: 55px; color: white;" class="Neue-bold responsive_dashboard_semititles">Novo<br> Orçamento</h1>
			</div>
			</a>
				&nbsp;&nbsp;

		<div class="col-sm btn btn-success btn-block text-center align-center" style="cursor: pointer; background-color: #E6E7E8 !important; border:0px; color:#414042; padding:2%; text-align:left !important; margin:1.4%;" data-aos="zoom-in" data-toggle="modal" data-target="#novos_projetos_modal">
			<div class="align-self-center">
				<h1 class="Neue-bold responsive_dashboard_semititles" style="font-size: 55px;"><?php echo $conta_projetos; ?> novos</h1>
				<h1 class="Neue-bold responsive_dashboard_semititles" style="font-size: 55px;">Projetos</h1>
			</div>
		</div>&nbsp;&nbsp;
		<div class="col-sm btn btn-warning text-center align-middle" style="background-color: #E6E7E8 !important; border:0px; color:#414042; padding:2%; margin:1.4%;" data-aos="zoom-in-left">
			<p class="Neue-regular responsive_dashboard_semititles" style="text-align: left; font-size: 25px;">Saldo:</p>
			<h1 class="Neue-bold responsive_dashboard_semititles" style="font-size: 55px;">- 000,00€</h1>
		</div>&nbsp;&nbsp;
	</div>
	<hr>
	<div id="notificacoes_dash_css" class="card" style="display: inline-block;">
		<h2 class="Neue-bold responsive_titles card-header" style="color: rgba(182, 33, 37, 1); font-size: 34px;">Notificações</h2>
		<div class="card-body" style="height: 35%; overflow-y: scroll;">
			<?php

			while ($info_notificacoes = mysqli_fetch_array($query_notificacoes)) {
				$id_user = $info_notificacoes['id'];
				$nome_user = $info_notificacoes['nome'];
				$apelido_user = $info_notificacoes['apelido'];
				$nome_do_negocio = $info_notificacoes['nome_do_negocio'];
				$id_projeto = $info_notificacoes['id_projeto'];
				echo "<p class='responsive Neue-regular' style='font-size: 15px;'><span class='Neue-bold'>$nome_do_negocio ($nome_user $apelido_user)</span> enviou-lhe um <a href='#' data-toggle='modal' data-target='#modal_$id_projeto'>projeto</a>.</p>";
			}
			?>
		</div>
	</div>

	<!--
	<p class="responsive" style="font-size: 15px;">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec auctor. </p>
	<p class="responsive" style="font-size: 15px;">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Etiam mattis. ds</p>
	<p class="responsive" style="font-size: 15px;">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer sed tellus posuere, varius elit non, suscipit mauris. Quisque sit amet.
	</p>
-->

</div>

<script async src="//cdn.iframe.ly/embed.js" charset="utf-8"></script>


<?php
include 'footer.php';
?>
