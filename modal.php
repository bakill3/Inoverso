<?php
include 'db_connect.php';
?>
<!-- MODAL -->

<?php
$querym = mysqli_query($link, "SELECT * FROM users");
$utilizadores = mysqli_num_rows($querym); //CONTA O NUMERO DE USERS DA QUERY "querym";

$query = mysqli_query($link, "SELECT * FROM projetos INNER JOIN users ON projetos.id_user = users.id INNER JOIN localizacoes ON projetos.id_localizacao = localizacoes.id_localizacao INNER JOIN orcamentos ON projetos.id_orcamento = orcamentos.id_orcamento") or die(mysqli_error($link)); //SELECIONA TUDO DOS USERS/LOCALIZACOES/PROJETOS
while ($info = mysqli_fetch_array($query)) {

	//DEFINIR VARS
	$id_user = $info['id'];
	$id_projeto = $info['id_projeto'];
	$nome_do_negocio = $info['nome_do_negocio'];
	$descricao = $info['descricao'];
	$website = $info['website'];
	$anexo = $info['anexo'];
	$data_acabamento = $info['data_acabamento'];
	$aprovado = $info['aprovado'];
	$orcamento = $info['orcamento_final'];
	$email_cliente = $info['email'];

	$limite = $id_user."/";
	$new_src = strstr($anexo, strval($limite)); 
	$nome_do_ficheiro = str_replace($limite,"",$new_src);

?>
<div class="modal fade" id="modal_<?php echo $id_projeto; ?>">
	<div class="modal-dialog modal-lg">
		<div class="modal-content">

			<!-- Modal Header -->
			<div class="modal-header">
				<h4 class="modal-title"><?php echo $nome_do_negocio; ?></h4>
				<button type="button" class="close" data-dismiss="modal">&times;</button>
			</div>

			<!-- Modal body -->
			<div class="modal-body">
<?php


	echo "<div class='card'>
	<div class='card-body'>
	Nome do negócio: $nome_do_negocio <br> 
	Website: $website <br>
	Descrição: $descricao <br>
	Orçamento: $orcamento € <br>
	Email do cliente: $email_cliente <br>";

	echo "<button class='btn btn-warning' style='display: inline-block;'>Enviar Email</button><a href='mensagens.php?id=$id_user' class='btn btn-success' style='display: inline-block; margin-left: 0.5%;'>Enviar Mensagem</a>";

	if ($anexo != "") {
		//echo "Anexo: <iframe src='https://docs.google.com/viewer?url=http%3A%2F%2Fteste.gabrieldesign.pt%2F".$anexo."&embedded=true' style='width: 100%; height: 100%;'></iframe>​";
		?>
		<button type="button" class="btn btn-primary ver_anexo" id="<?php echo $id_projeto; ?>" data-toggle="modal" style='display: inline-block;'>Ver Anexo</button>

		<!-- Modal body -->
		<div id="anexo_file_<?php echo $id_projeto; ?>" style="display: none;">
			<?php 
			if (strpos($anexo, '.jpg') !== false || strpos($anexo, '.png') !== false) {
				echo '<img src="'.$anexo.'" style="width: 100%; height: 100%;">';
			} else {
				//echo "<iframe data-iframely-url='https://docs.google.com/viewer?url=http%3A%2F%2Fteste.gabrieldesign.pt%2Fdesign%2F".$anexo."&embedded=true' style='width: 100%; height: 100%;'></iframe>​";
				echo "<iframe data-iframely-url='https://inoverso.com/".$anexo."' style='width: 100%; height: 100%;'></iframe>​";
			}
			?>
		</div>

		<?php
	}

	echo "
	</div>
	</div>
	</div>

<!-- Modal footer -->
<div class='modal-footer'>
	<button type='button' class='btn btn-danger' data-dismiss='modal'>Fechar</button>
</div>

</div>
</div>
</div>";
}
?>
