<?php 
include 'modal.php';
include 'header_nonav.php';
$btns=array("primary", "warning", "info", "default", "success", "dark");
$query_notificacoes = mysqli_query($link, "SELECT * FROM users INNER JOIN projetos ON users.id = projetos.id_user");
$conta_projetos = mysqli_num_rows($query_notificacoes);

if (isset($_GET['id'])) { //SE ENCONTRAR ?id= no url (ex: mensagens.php?id=1), e esse ID existir na TABELA USERS RECEBE INFO DAS MENSAGENS

	$id_other = htmlspecialchars(mysqli_real_escape_string($link, $_GET['id']));
	$query_other = mysqli_query($link, "SELECT nome, apelido FROM users WHERE id='$id_other'");
	$info_other = mysqli_fetch_assoc($query_other);
	$nome = $info_other['nome'];
	$apelido = $info_other['apelido'];
	
}
?>


<div style="display: inline-block;padding-top: 2%; width: 81%; height: 100%;" id="second_nav_content">
	<div data-aos="zoom-in-right" style="padding-left: 4%">
		<h1 style="color: #414042; font-size: 80px;" class="Neue-bold" id="dashboard_title">Mensagens</h1>
	</div>

	
	<div style="height: 81%; background-color: #E6E7E8; margin-top: 3%;">
		
		<div class="card" style="width: 30%; display: inline-block; vertical-align: top; height: 90%;">
			<div class="card-header text-center">
				<span class="responsive">Administradores</span>
			</div>
			<ul class="list-group" >
				<?php 
				//SELECT * FROM users WHERE role_status = '1'
				$query = mysqli_query($link, "SELECT * FROM users");
				while ($info = mysqli_fetch_array($query)) {
					$id_user = $info['id'];
					$nome_lista = $info['nome'];
					$apelido_lista = $info['apelido'];
					$profissao_lista = $info['profissao'];
					$foto = $info['foto'];
					echo '<li style="cursor: pointer;" class="list-group-item user_mensagem_lista" id="'.$id_user.'" value="'.$nome_lista.' '.$apelido_lista.'"><img src="'.$foto.'" style="width: 8%; border-radius: 50%; display: inline-block;"><h5 class="mb-1 Neue-regular responsive_titles" style="display: inline-block; margin-left: 1.5%;"><span>'.$nome_lista.'</span> <span>'.$apelido_lista.'</span></h5><p class="Neue-bold responsive_titles">'.$profissao_lista.'</p></li>';
				}
				?>
				<li class="list-group-item">&nbsp;&nbsp;<p>&nbsp;&nbsp;&nbsp;&nbsp;</p></li>
				<li class="list-group-item">&nbsp;&nbsp;<p>&nbsp;&nbsp;&nbsp;&nbsp;</p></li>
				<li class="list-group-item">&nbsp;&nbsp;<p>&nbsp;&nbsp;&nbsp;&nbsp;</p></li>
			</ul>
		</div><div class="card" style="display: inline-block; vertical-align: top; width: 70%; height: 90%;">
			<div class="card-header text-center">
				<span class="Neue-regular responsive" id="userto_nome">Destinatário</span>
			</div>
			<div style="height: 82%;overflow-y: auto; width: 100%; display: inline-block; vertical-align: top; overflow-y: scroll;" class="messages_center">

			</div>
			<div style="display: inline-block; width: 100%;">

				<textarea id="message" class="form-control" placeholder="Mensagem..." style="display: inline-block; width: 80%; vertical-align: bottom; height: 10%;"></textarea><button id="enviar_mensagem" class="btn btn-info btn-lg Neue-bold" style="width: 20%; cursor: pointer; background-color: #b62125 !important; border-color: #b62125 !important; display: inline-block; height: 10%;">Enviar</button>
				<input type="hidden" id="id_other" value="<?php if (isset($id_other)) { echo $id_other; } ?>">
			</div>
		</div>

	</div>


</div>

<script>
	$(document).ready(function(){
		if (window.matchMedia('(max-width: 768px)').matches) {
			$("#left_dashboard_nav").hide();
			$("#btn_responsive_nonav").show();
			$("#btn_responsive_nonav").css('display', 'inline-block');
			$("#second_nav_content").css('width', '96%');
			$("#btn_responsive_nonav_2").css("display", "block");
		}

		$("#btn_responsive_nonav").click(function(event) {
			$("#btn_responsive_nonav").hide(300);
			$("#left_dashboard_nav").css('width', '100%', 'important');
			$("#left_dashboard_nav").show(300);
			$("#menu_left").css('padding-top', '0%', 'important');
			$("#second_nav_content").css('display', 'none');9
			$("#img_dash_div").css('padding-top', '10%', 'important');
			$("#img_dash").css('width', '40%', 'important');

			//$("#second_nav_content").css('width', '82%');
			//$("#second_nav_content").css('padding-left', '5%');
		});

		$("#btn_responsive_nonav_2").click(function(event) {
			$("#left_dashboard_nav").hide(300);
			$("#btn_responsive_nonav").show(300);
			$("#btn_responsive_nonav").css('display', 'inline-block');
			$("#second_nav_content").css('width', '96%');
			$("#second_nav_content").css('display', 'inline-block');
			//$("img_dash_div").css('padding-top', '10%', 'important');
		});
		$(".user_mensagem_lista").click(function(event) {
			$(".user_mensagem_lista").removeClass("active");
			$(this).addClass("active");
			var nome_user_to = $(this).attr("value");
			console.log(nome_user_to);
			$("#userto_nome").text(nome_user_to);
			var id_user = this.id;
			display_mensagem(id_user);
			$("#id_other").val(id_user);
			

			$.ajax({
				type: "POST",
				url: "ajax/update_vista.php",
				data: {id_user: id_user},
				success: function(){
					console.log('Visto');
				}
			});
		});
		$("#enviar_mensagem").click(function() {
			var message = $("#message").val();
			var id_other = $("#id_other").val();
			//console.log(message + " " + id_other);
			$.ajax({
				type: "POST",
				url: "ajax/enviar_mensagem.php",
				data: {message: message, id_other: id_other},
				success: function(){
					$("#message").val('');
				//console.log("enviado");
			}
		});
		});
		setInterval(function() {
			var id_other = $("#id_other").val();
			display_mensagem(id_other);
		}, 400);

		function display_mensagem(id_other) {
			$.ajax({
				type: "POST",
				url: "ajax/display_mensagem.php",
				data: {id_other: id_other},
				success: function(data){
					$('.messages_center').html(data);
					$('.toast').toast('show');
				}
			});
		}

	});
</script>
<script async src="//cdn.iframe.ly/embed.js" charset="utf-8"></script>


<?php
include 'footer.php';
?>