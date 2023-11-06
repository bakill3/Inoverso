<?php
include 'header_nonav.php';
if (isset($_GET['id'])) {
	$id_user = htmlspecialchars(mysqli_real_escape_string($link, $_GET['id']));
}
//SELECT * FROM projetos INNER JOIN orcamentos ON projetos.id_orcamento = orcamentos.id_orcamento INNER JOIN users ON projetos.id_user = users.id INNER JOIN localizacoes ON projetos.id_localizacao = localizacoes.id_localizacao WHERE users.id='$id_user'
$query = mysqli_query($link, "SELECT * FROM users WHERE id='$id_user'");

if (mysqli_num_rows($query) > 0) {
	$info = mysqli_fetch_assoc($query);
	//USERS
	$foto_user = $info['foto'];
	$nome_user = $info['nome'];
	$apelido_user = $info['apelido'];
	$email_user = $info['email'];
	$profissao = $info['profissao'];
	$data_nascimento = $info['data_nascimento'];
	$telefone = $info['telefone'];

	//PROJETOS
	$nome_do_negocio = $info['nome_do_negocio'];
	$descricao = $info['descricao'];
	$descricao = substr($descricao, 0, 20)."..."; //CORTAR DESCRIÇÃO
	$website = $info['website'];
	$data_acabamento = $info['data_acabamento'];

	//LOCALIZACOES
	$cidade = $info['cidade'];

	//ORÇAMENTOS
	$orcamento_final = $info['orcamento_final'];
}

?>

<div class="modal" id="projetos">
	<div class="modal-dialog modal-lg">
		<div class="modal-content">

			<!-- Modal Header -->
			<div class="modal-header">
				<h4 class="modal-title">Projetos/Orçamentos de <?php echo $nome_user." ".$apelido_user; ?></h4>
				<button type="button" class="close" data-dismiss="modal">&times;</button>
			</div>

			<!-- Modal body -->
			<div class="modal-body">
				<table class="table table-dark">
						<thead>
							<tr>
								<td>Nome do Negócio</td>
								<td>Descrição</td>
								<td>Website</td>
								<td>Data de Acabamento</td>
								<td>Cidade</td>
								<td>Orçamento</td>
							</tr>
						</thead>
						<tbody>
				<?php 
				$query2 = mysqli_query($link, "SELECT * FROM projetos INNER JOIN orcamentos ON projetos.id_orcamento = orcamentos.id_orcamento INNER JOIN users ON projetos.id_user = users.id INNER JOIN localizacoes ON projetos.id_localizacao = localizacoes.id_localizacao WHERE users.id='$id_user'");
				if (mysqli_num_rows($query2) > 0) {
					while ($info_projetos = mysqli_fetch_array($query2)) {
						?>
						
								<?php
									echo "<tr>";
									$id_user = $info_projetos['id'];

									$nome_do_negocio = $info_projetos['nome_do_negocio'];
									$descricao = $info_projetos['descricao'];

					//$descricao = substr($descricao, 0, 20)."..."; //CORTAR DESCRIÇÃO
					$website = $info_projetos['website'];
					$data_acabamento = $info_projetos['data_acabamento'];

					$cidade = $info_projetos['cidade'];
					$orcamento_final = $info_projetos['orcamento_final'];

					echo "<td>".$nome_do_negocio."</td>";
					echo "<td>".$descricao."</td>";
					echo "<td>".$website."</td>";
					echo "<td>".$data_acabamento."</td>";
					echo "<td>".$cidade."</td>";
					echo "<td>".$orcamento_final." €</td>";

					echo "</tr>";

				}

			} else {
				echo "<h1>Não existem projetos deste utilizador</h1>";
			}
			
			?>
		</tbody>
	</table>
	
</div>

<!-- Modal footer -->
<div class="modal-footer">
	<button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
</div>

</div>
</div>
</div>




<div style="display: inline-block; padding-left: 3%; padding-top: 2%; width: 81%;" id="second_nav_content">
	<h1 style="color: #414042; font-size: 80px;" class="Neue-bold" id="dashboard_title">INFO: <?php echo $nome_user." ".$apelido_user; ?></h1>

	<hr>
	<h4 class="Neue-regular" style="display: inline-block;">Aqui estão as informações sobre <?php echo $nome_user." ".$apelido_user; ?>:</h4>

	<div class="text-center">
		<div class="card" style="width: 300px; margin: 0 auto;">
			<img class="card-img-top" src="<?php echo $foto_user; ?>" alt="Card image cap" style="width: 300px;">
			<div class="card-body">
				<h5 class="card-title"><?php echo $nome_user." ".$apelido_user; ?></h5>
				<ul class="list-group">
					<li class="list-group-item"><?php echo $email_user; ?></li>
					<li class="list-group-item"><?php echo $profissao; ?></li>
					<li class="list-group-item"><?php echo $data_nascimento; ?></li>
					<li class="list-group-item"><?php echo $telefone; ?></li>
					<li class="list-group-item active" style="cursor: pointer;" data-toggle="modal" data-target="#projetos"><i class="fas fa-plus"></i></li>
				</ul>
				
			</div>
		</div>

	</div>

	<?php
	include 'footer.php';
	?>