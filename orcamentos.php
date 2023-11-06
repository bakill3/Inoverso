<?php
include 'header_nonav.php';
$query = mysqli_query($link, "SELECT * FROM projetos INNER JOIN orcamentos ON projetos.id_orcamento = orcamentos.id_orcamento INNER JOIN users ON projetos.id_user = users.id INNER JOIN localizacoes ON projetos.id_localizacao = localizacoes.id_localizacao WHERE users.id='".$_SESSION['login'][1]."'");

?>
<div style="display: inline-block; padding-left: 3%; padding-top: 2%; width: 81%;" id="second_nav_content">
	<h1 style="color: #414042; font-size: 80px;" class="Neue-bold" id="dashboard_title">Orçamentos</h1>

	<hr>
	<h4 class="Neue-regular" style="display: inline-block;">Olá <?php echo $_SESSION['login'][2]." ".$_SESSION['login'][3]; ?>! Aqui estão os seus <b style="color: #b62125;">orçamentos enviados:</b></h4>
	<a href="pedir_orcamento.php" class="btn btn-primary float-right Neue-bold" style="background-color: #b62125; border-color: #b62125; padding-left: 2%; padding-right: 2%; display: inline-block;">Pedir Orçamento</a>

	<div class="table-responsive">
		<table class="table table-dark">
			<thead>
				<tr>
					<td>Utilizador</td>
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

				while ($info = mysqli_fetch_array($query)) {
					echo "<tr>";
					$id_user = $info['id'];
					$nome_user = $info['nome'];
					$apelido_user = $info['apelido'];

					$nome_do_negocio = $info['nome_do_negocio'];
					$descricao = $info['descricao'];

				//$descricao = substr($descricao, 0, 20)."..."; //CORTAR DESCRIÇÃO
				$website = $info['website'];
				$data_acabamento = $info['data_acabamento'];

				$cidade = $info['cidade'];
				$orcamento_final = $info['orcamento_final'];

				echo "<td>".$nome_user." ".$apelido_user."</td>";
				echo "<td>".$nome_do_negocio."</td>";
				echo "<td>".$descricao."</td>";
				echo "<td>".$website."</td>";
				echo "<td>".$data_acabamento."</td>";
				echo "<td>".$cidade."</td>";
				echo "<td>".$orcamento_final." €</td>";

				echo "</tr>";

			}
			
			?>
		</tbody>
	</table>
</div>

</div>
<?php
include 'footer.php';
?>