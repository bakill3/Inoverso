<?php
include 'header_nonav.php';
$query = mysqli_query($link, "SELECT * FROM users WHERE id='".$_SESSION['login']['1']."'");
$info_user = mysqli_fetch_assoc($query);

$nome = $info_user['nome'];
$apelido = $info_user['apelido'];
$email = $info_user['email'];
$password = $info_user['password'];
$foto = $info_user['foto'];
$telefone = $info_user['telefone'];
$data_nascimento = $info_user['data_nascimento'];
?>


<div style="display: inline-block;padding-top: 2%; width: 81%;" id="second_nav_content" class="Neue-regular text-white">
	<div data-aos="zoom-in-right" style="padding-left: 4%">
		<h1 style="color: #414042; font-size: 80px;" class="Neue-bold" id="dashboard_title">Editar Perfil</h1>
	</div>

	<div class="col-md-8" style="margin: 0 auto;">
		<div class="card" style="background-color: #fff; border:0px; margin-bottom: 100px;">

			<div class="card-body text-center">
				<p class="text-danger Neue-bold" id="error"><?php if (isset($_SESSION['error'])) { echo $_SESSION['error']; unset($_SESSION['error']); } ?></p>
				<p class="text-success Neue-bold" id="sucesso"><?php if (isset($_SESSION['success'])) { echo $_SESSION['success']; unset($_SESSION['success']); } ?></p>


				<div class="col-md-4" style="margin: 0 auto;">
					<img class="img-responsive foto_perfil" src="<?php echo $foto; ?>" style="width: 150px; border-radius: 50%;"><br>
					<br>
					<div class="btn btn-warning btn-file" style="width: 100%;">
						<div id="mudar_foto">Mudar Foto</div> <input type="file" name="file" id="file_perfil">
					</div>
				</div>
				<br><br><br>

				<div class="col-sm-4" style="display: inline-block;">
					<label id="label_form_editar">Nome</label>
					<div class="form-group">
						<input type="text" name="nome" class="form-control" value="<?php echo $nome; ?>" id="nome">
					</div>
				</div>
				<div class="col-sm-4" style="display: inline-block;">
					<label id="label_form_editar">Apelido</label>
					<div class="form-group">
						<input type="text" name="apelido" class="form-control" value="<?php echo $apelido; ?>" id="apelido">
					</div>
				</div><br>
				<div class="col-sm-4" style="display: inline-block;">
					<label id="label_form_editar">Email</label>
					<div class="form-group">
						<input type="email" name="email" class="form-control" value="<?php echo $email; ?>" id="email">
					</div>
				</div>
				<div class="col-sm-4" style="display: inline-block;">
					<label id="label_form_editar">Password</label>
					<div class="form-group">
						<input type="password" name="password" class="form-control" value="secretpass" id="password">
					</div>
				</div><br>
				<div class="col-sm-4" style="display: inline-block;">
					<label id="label_form_editar">Data de Nascimento</label>
					<div class="form-group">
						<input type="date" name="data_nascimento" class="form-control" value="<?php echo $data_nascimento ?>" id="data_nascimento">
					</div>
				</div>
				<div class="col-sm-4" style="display: inline-block;">
					<label id="label_form_editar">Número de Telemóvel</label>
					<div class="form-group">
						<input type="number" name="telefone" class="form-control" value="<?php echo $telefone; ?>" id="telemovel">
					</div>
				</div><br><br><br>

				<div class="col-md-8" style="margin: 0 auto;">
					<button class="bnt btn-primary btn-lg" style="width: 100%;" id="editar_perfil">Alterar Dados</button>
				</div>




			</div>

		</div>
	</div>
	<script>

		$(document).ready(function(){
			var formData = new FormData();
			$("#file_perfil").change(function(){

				if (document.getElementById("file_perfil").files.length > 0) {
					$("#mudar_foto").html('<span class="spinner-border spinner-border-sm"></span> Carregando');
					console.log("a ir buscar o file");
					$("#mudar_foto").html('<span class="spinner-border spinner-border-sm"></span> Carregando');
					$('#editar_perfil').prop('disabled', true);
					$("#editar_perfil").html('<span class="spinner-border spinner-border-sm"></span> Carregando Foto');
					var name = document.getElementById("file_perfil").files[0].name;
						//var form_data = new FormData();
						var oFReader = new FileReader();
						oFReader.readAsDataURL(document.getElementById("file_perfil").files[0]);
						formData.append("file", document.getElementById('file_perfil').files[0]);
						console.log("appended");


						setTimeout(
							function()
							{
								$('#editar_perfil').prop('disabled', false);
								$("#editar_perfil").html('Alterar Dados');
								$("#mudar_foto").html('Mudar Foto <i class="fas fa-check"></i>');
							}, 1500);

					}
				});



			$("#editar_perfil").click(function(event) {

				var nome = $("#nome").val();
				var apelido = $("#apelido").val();
				var email = $("#email").val();
				var password = $("#password").val();

				var telemovel = $("#telemovel").val();
				var date = new Date($('#data_nascimento').val());
				day = date.getDate();
				month = date.getMonth() + 1;
				year = date.getFullYear();
				var data = [day, month, year].join('/');

				console.log("NOME: " + nome + " Apelido: " + apelido + " email: " + email + "telemovel" + telemovel + "Data" + data);
				if (nome == "" || apelido == "" || email == "" || password == "" || data == "" || telemovel == "") {
					$("#error").text("Preencha todos os campos");
				} else {

					formData.append('nome',  nome);
					formData.append('apelido',  apelido);
					formData.append('email',  email);
					formData.append('password',  password);
					formData.append('data',  data);
					formData.append('telemovel',  telemovel);
					$.ajax({
						url: "ajax/editar_perfil.php",
						data: formData,
						type: "POST",
						cache: false,
						contentType: false,
						processData: false,
						dataType : 'json',
						beforeSend: function() {
							/*
							$('#progress_formulario').show();
							$("#span_enviar_anexo").html("<div id='loader-icon'><img src='img/loader.gif' style='width: 21%;' /></div>");
							//$('#loader-icon').show();

							$('.progress-bar').width('50%');
							$('#enviar').prop('disabled', true);
							*/
						},
						success:function(data)
						{
							//console.log(JSON.stringify(data));
							$(".foto_perfil").attr("src", data.foto_perfil);
							$(".nome_perfil").text(data.nome);
							$(".apelido_perfil").text(data.apelido);
							if (data.status == "0") {
								$("#error").text(data.mensagem);
							} else {
								$("#sucesso").text(data.mensagem);
							}



						},
						error:function(data){
							$("#error").text(data);
						}
					});

				}
			});
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
		});
	</script>
	<script async src="//cdn.iframe.ly/embed.js" charset="utf-8"></script>


	<?php
	include 'footer.php';
	?>
