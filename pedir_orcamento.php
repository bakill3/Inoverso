<?php
include 'header_nonav.php';
?>
<div style="display: inline-block; padding-left: 3%; padding-top: 2%; width: 81%;" id="second_nav_content">
	<h1 style="color: #414042; font-size: 80px;" class="Neue-bold" id="dashboard_title">Pedir Orçamento</h1>

	<hr>
	<div class="row">

		<div class="col-md-2 text-center">
			<i class="fas fa-user fa-7x" style="color: #b62125;"></i>
			<p class="Neue-regular font-weight-bold">Selecione o Cliente</p>

			<select class="custom-select" id="id_cliente">
				<option selected>Clientes</option>
				<option value="63">Gabriel Vicente (Designer)</option>
				<option value="64">Gabriel Brandão (Programador)</option>
			</select>
		</div>

		<div class="col-md-2 text-center">
			<i class="fas fa-cog fa-7x" style="color: #b62125;"></i>
			<p class="Neue-regular font-weight-bold">Selecione o Serviço</p>

			<select class="custom-select" id="servico">
				<option selected>Serviço</option>
				<option value="Fazer um Website">Fazer um Website</option>
				<option value="Flyers">Flyers</option>
			</select>
		</div>

		<div class="col-md-2 text-center">
			<i class="fas fa-pencil-alt fa-7x" style="color: #b62125;"></i>
			<p class="Neue-regular font-weight-bold">Dê um título</p>

			<input type="text" class="form-control" placeholder="Título" id="titulo">
		</div>

		<div class="col-md-2 text-center">
			<i class="far fa-clock fa-7x" style="color: #b62125;"></i>
			<p class="Neue-regular font-weight-bold">Em quanto tempo?</p>

			<input type="date" class="form-control" id="data_acabamento">
		</div>

		<div class="col-md-2 text-center">
			<i class="fas fa-link fa-7x" style="color: #b62125;"></i>
			<p class="Neue-regular font-weight-bold">Tem algum anexo?</p>

			<!-- <button class="btn btn-primary Neue-bold" style="background-color: #b62125; border-color: #b62125;">Carregar Anexo</button> -->
			<span class="btn btn-primary Neue-bold btn-file" style="background-color: #b62125; border-color: #b62125;">
				<span id="mudar_foto" class="Neue-bold" style="cursor: pointer;">Carregar Anexo</span> <input type="file" id="imagem_upload" class="form-control">
			</span>
		</div>
	</div>
	<hr>

	<input type="hidden" id="id_user" value="<?php echo $_SESSION['login'][1]; ?>">
	
	<div class="col-md-10">
		<h4 class="Neue-regular font-weight-bold"><i class="fas fa-info-circle" style="color: #b62125;"></i> Tem alguma informação importante para o trabalho?</h4>
		<textarea class="form-control" id="descricao" style="min-height: 150px; border: 1px solid #b62125"></textarea>
		<a href="orcamentos.php" class="btn btn-primary float-left Neue-bold" style="background-color: #b62125; border-color: #b62125; padding-left: 2%; padding-right: 2%;"><i class="fas fa-arrow-left"></i> Meus Orçamentos</a>
		<button class="btn btn-primary float-right Neue-bold" id="enviar_projeto" style="background-color: #b62125; border-color: #b62125; padding-left: 2%; padding-right: 2%;">Enviar</button>
	</div>

</div>
<script>
	$(document).ready(function() {
		var inserir_projeto = new FormData();
		var id_user = $("#id_user").val();



		//BUSCAR FICHEIROS
		$("#imagem_upload").change(function(){
			if (document.getElementById("imagem_upload").files.length > 0) {
				$("#mudar_foto").html('<span class="spinner-border spinner-border-sm"></span> Carregando');
				$('#enviar_projeto').prop('disabled', true);
				$("#enviar_projeto").html('<span class="spinner-border spinner-border-sm"></span> Carregando Anexo');


				var name = document.getElementById("imagem_upload").files[0].name;
				var oFReader = new FileReader();
				oFReader.readAsDataURL(document.getElementById("imagem_upload").files[0]);
				inserir_projeto.append("imagem_upload", document.getElementById('imagem_upload').files[0]);

				setTimeout(function() {
					$("#mudar_foto").html('Carregar Anexo');
					$('#enviar_projeto').prop('disabled', false);
					$("#enviar_projeto").html('Enviar');
				}, 1500);
			}
		});

		$("#enviar_projeto").click(function(event) {
			var id_cliente = $("#id_cliente").val();
			var date = new Date($('#data_acabamento').val());

			var servico = $("#servico").val();
			var titulo = $("#titulo").val();
			var descricao = $("#descricao").val();

			day = date.getDate();
			month = date.getMonth() + 1;
			year = date.getFullYear();
			var data_acabamento = [day, month, year].join('-');
			console.log(data_acabamento);

			inserir_projeto.append('data_acabamento',  data_acabamento);
			inserir_projeto.append('id_cliente',  id_cliente);
			inserir_projeto.append('id_user',  id_user);
			inserir_projeto.append('servico',  servico);

			inserir_projeto.append('titulo',  titulo);
			inserir_projeto.append('descricao',  descricao);

			$.ajax({
				url: "ajax/inserir_orcamento.php",
				data: inserir_projeto,
				type: "POST",
				cache: false,
				contentType: false,
				processData: false,
				dataType : 'json',
				success:function(data)
				{

					if (data.status == "0") {
						swal("Erro!", data.mensagem, "error");
					} else {
						swal("Sucesso!", data.mensagem, "success");
						
					}
				

				},
				error:function(data){
        			alert("error occured"); //===Show Error Message====
        			alert(data.erro);
    			}

			});

			
		});

	});
</script>

<?php
include 'footer.php';
?>