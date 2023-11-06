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

<div class="modal fade" id="adicionar_projeto" tabindex="-1" role="dialog" aria-labelledby="adicionar_projeto_titulo" aria-hidden="true">
	<div class="modal-dialog modal-dialog-centered modal-lg" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="exampleModalLongTitle">Adicionar Projeto</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">


				<div class="text-center">
					<p class="text-danger Neue-bold" id="adicionar_error"></p>
					<p class="text-success Neue-bold" id="adicionar_sucesso"></p>
					<div class="col-md-6" style="display: inline-block;">
						<div class="input-group mb-3">
							<div class="input-group-prepend">
								<span class="input-group-text Neue-bold" style="font-weight: bold; background-color: #b62125; color: white;">Título</span>
							</div>
							<input type="text" name="nome" class="form-control Neue-regular" id="adicionar_nome_trabalho" style="font-weight: bold; background-color: #e6e7e9;">
							<div class="input-group-append">
								<span class="input-group-text btn btn-primary btn-lg btn-file"><span id="adicionar_mudar_foto"><i class="far fa-image"></i></span> <input type="file" id="adicionar_imagem_upload" class="form-control"></span>
							</div>
						</div>
						
					</div>
					
				</div>

				<div class="col-md-8" style="margin: 0 auto; width: 100%; height: 100%;">


					<div class="text-center Neue-regular" style="color: white !important;">


						
						<hr style="margin: 1% !important; width: 100%;     background-color: #bdb9b9; opacity: 0.7;">

						<div class="col-lg-12" style="display: inline-block; margin-top: 2%;">
							<label id="" class="Neue-regular" style="color: black;">Descrição do projeto</label>
							<div class="form-group">
								<textarea class="form-control Neue-regular" placeholder="Descrição do Projeto" id="adicionar_descricao_trabalho" style="width: 100%; min-height: 100px; background-color: #e6e7e9;"></textarea>
							</div>
						</div>


						<select class="custom-select" id="tamanho_imagem_add">

							<option value="0" class="Neue-regular" selected="selected">Simples/Regular</option>
							<option value="1" class="Neue-regular">Grande</option>

						</select><br><br>
						
						<div class="col-md-8" style="margin: 0 auto; margin-bottom: 10%;">
							<button class="bnt btn-dark btn-lg" style="width: 100%;" id="inserir_projeto">Adicionar Projeto</button>
						</div>
						<input type="hidden" id="id_projeto" value="">



					</div>


				</div>




			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
			</div>
		</div>
	</div>
</div>


<div id="uploadimageModal" class="modal" role="dialog">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<h4 class="modal-title">Redimensionar Imagem</h4>
				<button type="button" class="close" data-dismiss="modal">&times;</button>
				
			</div>
			<div class="modal-body text-center" style="margin: 0 auto;">

				<div class="col-md-8 text-center">
					<div id="image_demo" style="width:350px; margin-top:30px"></div>
				</div><br>
				<div>
					<button class="btn btn-primary crop_image btn-lg" style="width: 100%;">Feito</button>
				</div>
				
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-default" data-dismiss="modal" id="fechar_modal">Fechar</button>
			</div>
		</div>
	</div>
</div>



<div style="display: inline-block;padding-top: 2%; width: 81%; height: 100%;" id="second_nav_content" class="Neue-regular ">
	<div data-aos="zoom-in-right" style="padding-left: 4%">
		<h1 style="color: #414042; font-size: 80px;" class="Neue-bold" id="dashboard_title">Editar Portfólio</h1>
	</div>

	<div style="height: 81%; background-color: #E6E7E8; margin-top: 3%;">
		
		<div class="card" style="width: 30%; display: inline-block; vertical-align: top; height: 90%;">
			<div class="card-header">
				<h2 class="responsive_title Neue-bold font-weight-bold" style="color: #414042; display: inline-block;" id="publicacoes_portfolio">Publicações</h2>
				<h3 style="display: inline-block; float: right; cursor: pointer;" data-toggle="modal" data-target="#adicionar_projeto" id="publicacoes_portfolio_icon"><i class="fas fa-folder-plus fa-lg"></i></h3>
			</div>
			<ul class="list-group" id="change_projeto" style="overflow: scroll; height: 100%;">
				<?php 
				//SELECT * FROM users WHERE role_status = '1'
				$query = mysqli_query($link, "SELECT * FROM portfolio INNER JOIN users ON portfolio.id_user = users.id ORDER BY portfolio.id_trabalho ASC");
				while ($info = mysqli_fetch_array($query)) {
					$id_user = $info['id'];
					$nome_lista = $info['nome'];
					$apelido_lista = $info['apelido'];
					$profissao_lista = $info['profissao'];
					$foto = $info['foto'];

					$id_trabalho = $info['id_trabalho'];
					$nome_trabalho = $info['nome_trabalho'];
					$descricao_trabalho = $info['descricao_trabalho'];
					$imagem = $info['imagem'];
					$tamanho_imagem = $info['tamanho_imagem'];

					echo '<li style="cursor: pointer;" class="list-group-item mudar_projeto" id="'.$id_trabalho.'" value="'.$nome_lista.' '.$apelido_lista.'">
					<h5 class="mb-1 Neue-regular responsive_titles" style="margin-left: 1.5%;">
					<span>'.$nome_trabalho.'</span>
					</h5>
					<img src="'.$foto.'" style="width: 8%; border-radius: 50%; display: inline-block;" id="img_lista_'.$id_trabalho.'">
					<p class="Neue-regular responsive_titles" style="display: inline-block;"><span id="nome_lista_'.$id_trabalho.'">'.$nome_lista.'</span> <span id="apelido_lista_'.$id_trabalho.'">'.$apelido_lista.'</span> - '.$profissao_lista.'</p>
					</li>';
				}
				?>
				<li class="list-group-item" id="adicionar_projeto_li">&nbsp;&nbsp;<p>&nbsp;&nbsp;&nbsp;&nbsp;</p></li>
				<li class="list-group-item">&nbsp;&nbsp;<p>&nbsp;&nbsp;&nbsp;&nbsp;</p></li>
				<li class="list-group-item">&nbsp;&nbsp;<p>&nbsp;&nbsp;&nbsp;&nbsp;</p></li>
			</ul>
		</div><div class="card" style="display: inline-block; vertical-align: top; width: 70%; height: 90%;">
			<div class="card-header" style="background-color: #E6E7E9;">
				<div class="Neue-regular responsive"><img src="" style="width: 4%; border-radius: 50%; display: inline-block;" id="imagem_escritor"> 
					<h6 id="nome_escritor" class="Neue-bold" style="display: inline-block;"></h6> <h6 id="apelido_escritor" class="Neue-bold" style="display: inline-block;"></h6> 
					<div class="apagar_projeto" style="display: inline-block; float: right;">
						<span class="apagar_artigo" style="color: #b62125; cursor: pointer;"><i class="far fa-trash-alt fa-2x"></i></span>
					</div>
				</div>
			</div>
			<div style="height: 100%;overflow-y: auto; width: 100%; display: inline-block; vertical-align: top; overflow-y: scroll; background-color: #E6E7E9; color: black;" class="text-gray-dark" id="textbox_main">
				<div id="clear_me">

					<div class="text-center">
						<p class="text-danger Neue-bold" id="error"><?php if (isset($_SESSION['error'])) { echo $_SESSION['error']; unset($_SESSION['error']); } ?></p>
						<p class="text-success Neue-bold" id="sucesso"><?php if (isset($_SESSION['success'])) { echo $_SESSION['success']; unset($_SESSION['success']); } ?></p>
						<div class="col-md-6" style="display: inline-block;">
							<div class="form-group input-group">
								<div class="input-group-prepend">
									<span class="input-group-text Neue-bold" style="font-weight: bold; background-color: #b62125; color: white;">Título</span>
								</div>
								<input type="text" name="nome" class="form-control Neue-regular" id="nome_trabalho" style="font-weight: bold; background-color: #e6e7e9;">
							</div>
						</div>
						<hr style="margin: 1% !important; width: 100%;     background-color: #bdb9b9; opacity: 0.7;">
					</div>
					
					<div class="col-md-12" style="margin: 0 auto; width: 100%; height: 100%;">


						<div class="text-center Neue-regular" style="color: white !important;">

							<div class="col-md-5" style="display: inline-block; margin-bottom: 3%;">
								<div class="form-group">
									<label class="Neue-regular lead" style="color: black;">Imagem de Capa:</label>
									<img class="img-responsive" src="" id="capa_trabalho" style="width: 100%;border: 1px solid black; border-radius: 2%;">
								</div>

								<span class="btn btn-outline-primary btn-file" style="width: 100%;">
									<span id="mudar_foto_capa">Imagem</span> <input type="file" id="capa_upload" class="form-control">
								</span>

								

							</div>


							<div class="col-md-5" style="display: inline-block; margin-bottom: 3%;">
								<div class="form-group">
									<label class="Neue-regular lead" style="color: black;">Imagem de Apresentação:</label>
									<img class="img-responsive" src="" id="imagem_trabalho" style="width: 100%;border: 1px solid black; border-radius: 2%;">
								</div>

								<span class="btn btn-outline-dark btn-file" style="width: 100%;">
									<span id="mudar_foto">Imagem</span> <input type="file" id="imagem_upload" class="form-control">
								</span>

								

							</div>

							<div class="col-md-8" style="display: inline-block; margin-bottom: 3%;">
								<label class="Neue-regular" style="color: black">Tamanho da imagem:</label>
								<select class="custom-select" id="tamanho_imagem">

									<option value="0" class="Neue-regular" selected="selected">Simples/Regular</option>
									<option value="1" class="Neue-regular">Grande</option>

								</select>

							</div>

							<hr style="margin: 1% !important; width: 100%;     background-color: #bdb9b9; opacity: 0.7;">
							<div class="col-lg-12" style="display: inline-block; margin-top: 2%;">
								<label id="" class="Neue-regular" style="color: black;">Descrição do projeto</label>
								<div class="form-group">
									<textarea class="form-control Neue-regular" placeholder="Descrição do Projeto" id="descricao_trabalho" style="width: 100%; min-height: 100px; background-color: #e6e7e9;"></textarea>
								</div>
							</div>

							<div class="col-md-8" style="margin: 0 auto; margin-bottom: 10%;">
								<button class="bnt btn-warning btn-lg" style="width: 100%;" id="atualizar_projeto">Atualizar Projeto</button>
							</div>
							<input type="hidden" id="id_projeto" value="">

							

						</div>


					</div>


				</div>
			</div>
			
		</div>

	</div>
	
	<script>
		$(document).ready(function() {
			var data_update = new FormData();
			var id_projeto = $("#id_projeto").val();

			//SE O ID DO PROJETO NÃO EXISTIR
			if (id_projeto == "") {
				$("#clear_me").hide();
				$(".apagar_projeto").hide();
				$("#textbox_main").append("<div id='main_message' class='text-center' style='margin-top: 9%;'><h1 class='Neue-regular'><i class='far fa-edit' style='font-size: 300%;'></i></h1><h2 class='Neue-bold'>Selecione um projeto para editar</h2></div>");
			}
			//-------------------------------------------------------------------------------------------------------------------------------------------------
			//BUSCAR FICHEIROS
			$("#imagem_upload").change(function(){
				if (document.getElementById("imagem_upload").files.length > 0) {
					$("#mudar_foto").html('<span class="spinner-border spinner-border-sm"></span> Carregando');
					$('#atualizar_projeto').prop('disabled', true);
					$("#atualizar_projeto").html('<span class="spinner-border spinner-border-sm"></span> Carregando Foto');


					var name = document.getElementById("imagem_upload").files[0].name;
					var oFReader = new FileReader();
					oFReader.readAsDataURL(document.getElementById("imagem_upload").files[0]);
					data_update.append("imagem_upload", document.getElementById('imagem_upload').files[0]);

					setTimeout(function() {
						$("#mudar_foto").html('Imagem');
						$('#atualizar_projeto').prop('disabled', false);
						$("#atualizar_projeto").html('Atualizar Projeto');

					}, 1500);
				}
			});

			$("#capa_upload").change(function(){
				if (document.getElementById("capa_upload").files.length > 0) {
					$("#mudar_foto_capa").html('<span class="spinner-border spinner-border-sm"></span> Carregando');
					$('#atualizar_projeto').prop('disabled', true);
					$("#atualizar_projeto").html('<span class="spinner-border spinner-border-sm"></span> Carregando Foto');


					var name = document.getElementById("capa_upload").files[0].name;
					var oFReader = new FileReader();
					oFReader.readAsDataURL(document.getElementById("capa_upload").files[0]);
					data_update.append("capa_trabalho", document.getElementById('capa_upload').files[0]);

					setTimeout(function() {
						$("#mudar_foto_capa").html('Imagem');
						$('#atualizar_projeto').prop('disabled', false);
						$("#atualizar_projeto").html('Atualizar Projeto');

					}, 1500);
				}
			});

			var data_inserir = new FormData();

			$("#adicionar_imagem_upload").change(function(){
				if (document.getElementById("adicionar_imagem_upload").files.length > 0) {
					$("#adicionar_mudar_foto").html('<span class="spinner-border spinner-border-sm"></span>');
					$('#inserir_projeto').prop('disabled', true);
					$("#inserir_projeto").html('<span class="spinner-border spinner-border-sm"></span> Carregando Foto');


					var name = document.getElementById("adicionar_imagem_upload").files[0].name;
					var oFReader = new FileReader();
					oFReader.readAsDataURL(document.getElementById("adicionar_imagem_upload").files[0]);
					data_inserir.append("adicionar_imagem_upload", document.getElementById('adicionar_imagem_upload').files[0]);

					setTimeout(function() {
						$("#adicionar_mudar_foto").html('<i class="far fa-image"></i></span>');
						$('#inserir_projeto').prop('disabled', false);
						$("#inserir_projeto").html('Adicionar Projeto');

					}, 1500);
				}
			});

			//-------------------------------------------------------------------------------------------------------------------------------------------------

			//ADICIONAR PROJETO
			$("#inserir_projeto").click(function(event) {
				var adicionar_nome_trabalho = $("#adicionar_nome_trabalho").val();
				var adicionar_descricao_trabalho = $("#adicionar_descricao_trabalho").val();
				var tamanho_imagem_add = $("#tamanho_imagem_add").val();

				console.log(adicionar_nome_trabalho);
				console.log(adicionar_descricao_trabalho);

				data_inserir.append('adicionar_nome_trabalho',  adicionar_nome_trabalho);
				data_inserir.append('adicionar_descricao_trabalho',  adicionar_descricao_trabalho);
				data_inserir.append('tamanho_imagem_add',  tamanho_imagem_add);


				$.ajax({
					url: "ajax/inserir_projeto.php",
					data: data_inserir,
					type: "POST",
					cache: false,
					contentType: false,
					processData: false,
					dataType : 'json',
					success:function(data)
					{
						if (data.status == "0") {
							$("#adicionar_error").text(data.mensagem);
						} else {
							$("#adicionar_sucesso").text(data.mensagem);
							var nome = data.nome;
							var apelido = data.apelido;
							var foto = data.foto;
							var id_projeto = data.id_projeto;

							var li = "<li style='cursor: pointer;' class='list-group-item mudar_projeto' id='" + id_projeto + "' value='nome apelido'><h5 class='mb-1 Neue-regular responsive_titles' style='margin-left: 1.5%;'><span>" + adicionar_nome_trabalho + "</span></h5><img src='" + foto + "' style='width: 8%; border-radius: 50%; display: inline-block;' id='img_lista_" + id_projeto + "'><p class='Neue-regular responsive_titles' style='display: inline-block;'><span id='nome_lista_" + id_projeto + "'>" + nome + "</span> <span id='apelido_lista_" + id_projeto + "'>" + apelido + "</span> - Administrador</p></li>";

							$(li).insertBefore( "#adicionar_projeto_li" );
						}


					}

				});

			});

			//-------------------------------------------------------------------------------------------------------------------------------------------------

			//ATUALIZAR PROJETO

			$("#atualizar_projeto").click(function(event) {
				var id_projeto = $("#id_projeto").val();
				var nome_trabalho = $("#nome_trabalho").val();
				var descricao_trabalho = $("#descricao_trabalho").val();

				var tamanho_imagem = $("#tamanho_imagem").val();

				console.log("ID DO PROJETO: " + id_projeto);
				console.log("Nome do trabalho: " + nome_trabalho);
				console.log("Descrição do trabalho: " + descricao_trabalho);
				console.log("Tamanho da imagem: " + tamanho_imagem);


				
				data_update.append('id_projeto',  id_projeto);

				data_update.append('nome_trabalho',  nome_trabalho);
				data_update.append('descricao_trabalho',  descricao_trabalho);
				data_update.append('tamanho_imagem',  tamanho_imagem);

				$.ajax({
					url: "ajax/update_projeto.php",
					data: data_update,
					type: "POST",
					cache: false,
					contentType: false,
					processData: false,
					dataType : 'json',
					success:function(data)
					{
					//$("#imagem_trabalho").attr("src", data.imagem_trabalho);
					if (data.status == "0") {
						$("#error").text(data.mensagem);
					} else {
						$("#sucesso").text(data.mensagem);
						console.log(data.teste);
						if (data.imagem_trabalho != "nope") {
							$("#imagem_trabalho").attr("src", data.imagem_trabalho);
						}
						if (data.capa_trabalho != "nope") {
							$("#capa_trabalho").attr("src", data.capa_trabalho);
						}
					}
				}

			});
			});

			//-------------------------------------------------------------------------------------------------------------------------------------------------


			//QUANDO SE SELECIONA/CARREGA-SE UM PROJETO
			$("#change_projeto").on('click', '.mudar_projeto', function(event) {
				$("#clear_me").show();
				$(".apagar_projeto").show();
				$("#main_message").hide();
				$(".mudar_projeto").removeClass("active");
				$(this).addClass("active");
				var id_projeto = this.id;

				var data = new FormData();

				data.append('id_projeto',  id_projeto);

				$.ajax({
					url: "ajax/display_projeto.php",
					data: data,
					type: "POST",
					cache: false,
					contentType: false,
					processData: false,
					dataType : 'json',
					success:function(data)
					{
						$("#nome_trabalho").val(data.nome_trabalho);
						$("#descricao_trabalho").val(data.descricao_trabalho);
						$("#imagem_trabalho").attr("src", data.imagem_trabalho);

						$("#capa_trabalho").attr("src", data.capa_trabalho);

						$("#id_projeto").val(id_projeto);

						var nome_lista = $("#nome_lista_" + id_projeto).text();
						var apelido_lista = $("#apelido_lista_" + id_projeto).text();
						var img_lista = $("#img_lista_" + id_projeto).attr('src');

						$("#imagem_escritor").attr('src', img_lista);
						$("#nome_escritor").text(nome_lista);
						$("#apelido_escritor").text(apelido_lista);

					}

				});

			});
			//-------------------------------------------------------------------------------------------------------------------------------------------------

			//APAGAR PROJETO
			$(".apagar_projeto").click(function(event) {

				var id_projeto = $("#id_projeto").val();
				if (id_projeto != "") {
					swal({
						title: "Tens a certeza?",
						text: "Depois de apagado, não poderás voltar a recuperar este projeto!",
						icon: "warning",
						buttons: true,
						dangerMode: true,
					})
					.then((willDelete) => {

						if (willDelete) {
							$.ajax({
								type: "POST",
								url: "ajax/eliminar_projeto.php",
								data: {id_projeto: id_projeto},
								success: function(data){
									swal("Sucesso!", "Poof! O teu projeto foi eliminado!", {
										icon: "success",
									});
									$("#" + id_projeto).remove();
									$("#id_projeto").val("");
									$("#clear_me").hide();
									$(".apagar_projeto").hide();
									$("#main_message").show();
									
								}
							});
							
						} else {
							swal("Sucesso!", "O teu projeto está seguro!", "success");
						}
					});
				}

			});
			//-------------------------------------------------------------------------------------------------------------------------------------------------


		});
	</script>
	<script async src="//cdn.iframe.ly/embed.js" charset="utf-8"></script>


	<?php
	include 'footer.php';
	?>
