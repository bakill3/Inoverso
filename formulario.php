<?php
include 'header.php';
?>
<div style="width: 50%; display: inline-block; vertical-align:top;" id="form_css1">
	<div style="color: black; margin-top: 28%; margin-left: 30%;" data-aos="zoom-in">
		<h1 style="color: #414042;" class="Neue-bold" id="entre_em_contacto">Entre em<br> contacto</h1>
		<h4 style="font-family: 'Open Sans', sans-serif; color: #B62125;" id="email_contacto">contacto@inoverso.com</h4>
	</div>
</div>

<div style="width: 50%; background-color: #B62125; display: inline-block; vertical-align:top; height: 100%;" id="form_css2">
	<div class="Neue-regular text-center" style="color: black; margin-top: 11%; font-size: 15px; color: #FFF;" id="div_child_form">
		<p class="text-white Neue-bold" id="error"></p>
		<div class="col-md-3 no-aos" style="display: inline-block;" data-aos="fade-right">
			<div class="form-group">
				<label>Primeiro Nome</label>
				<input type="text" class="form-control" placeholder="José" id="nome">
			</div>
		</div>
		<div class="col-md-3 no-aos" style="display: inline-block;" data-aos="fade-left" >
			<div class="form-group">
				<label>Apelido</label>
				<input type="text" class="form-control" placeholder="Marques" id="apelido">
			</div>
		</div>
		<br>
		<div class="col-md-3 no-aos" style="display: inline-block;" data-aos="fade-right">
			<div class="form-group">
				<label>Email</label>
				<input type="email" class="form-control" placeholder="ques@gmail.com" id="email">
			</div>
		</div>
		<div class="col-md-3 no-aos" style="display: inline-block;" data-aos="fade-left">
			<div class="form-group">
				<label>Nome do Negócio</label>
				<input type="text" class="form-control" placeholder="I9" id="nome_do_negocio">
			</div>
		</div>
		<br>
		<div class="col-md-3 no-aos" style="display: inline-block;" data-aos="fade-right">
			<div class="form-group">
				<label>Website</label>
				<input type="text" class="form-control" placeholder="google.com" id="website">
			</div>
		</div>
		<div class="col-md-3 no-aos" style="display: inline-block;" data-aos="fade-left">
			<div class="form-group">
				<label>Cidade</label>
				<input type="text" class="form-control" placeholder="Faro" id="cidade">
			</div>
		</div>
		<br>
		<div class="col-md-3 no-aos" style="display: inline-block;" data-aos="fade-right">
			<div class="form-group">
				<label>Data de Nascimento</label>
				<input type="date" class="form-control" id="data_nascimento">
			</div>
		</div>
		<div class="col-md-3 no-aos" style="display: inline-block;" data-aos="fade-left">
			<div class="form-group">
				<label>Nº de Telefone</label>
				<input type="number" class="form-control" placeholder="Telémovel/Telefone" id="telemovel">
			</div>
		</div>
		<br>
		<div class="col-md-6 no-aos" style="display: inline-block;" data-aos="zoom-in">
			<div class="form-group">
				<label>Descrição do Projeto</label>
				<textarea class="form-control" id="descricao" placeholder="Descrição"></textarea>
			</div>
		</div><br>
		<div class="col-md-3 no-aos" style="display: inline-block;" data-aos="fade-right">
			<div class="form-group">
				<label>Quanto pretende gastar</label>
				<input type="number" class="form-control" placeholder="€" id="gasto">
			</div>
		</div>
		<div class="col-md-3 no-aos" style="display: inline-block;" data-aos="fade-left">
			<!-- Old Button: <button class="btn btn-outline-warning" style="width: 100%;">Anexo</button> -->
			<span class="btn btn-outline-warning btn-file" style="width: 100%;" id="span_enviar_anexo">
				Anexo <input type="file" id="file-anexo" class="form-control">
			</span>
			<br>
		</div>

		<div class="col-md-6 no-aos" style="display: inline-block;" data-aos="zoom-in-up">
			<button class="btn btn-primary" style="display: inline-block; width: 100%; cursor: pointer; background:#0E4869; border:0px;" id="enviar">Enviar</button>
			<br><br>
		</div><br>

		<div class="col-md-6 no-aos" data-aos="zoom-in-up">
			<div class="progress" id="progress_formulario" style="display: none;">
				<div class="progress-bar" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100"></div>
			</div>
		</div>


	</div>
</div>


<?php
include 'footer.php';
?>
