<?php
include 'header_nonav.php';
$query = mysqli_query($link, "SELECT * FROM users");
$n_users = mysqli_num_rows($query);
?>
<div style="display: inline-block; padding-left: 3%; padding-top: 2%; width: 81%;" id="second_nav_content">
	<h1 style="color: #414042; font-size: 80px;" class="Neue-bold" id="dashboard_title">Clientes</h1>

	<hr>
	<h4 class="Neue-regular" style="display: inline-block;">Olá <?php echo $_SESSION['login'][2]." ".$_SESSION['login'][3]; ?>! Existem <b style="color: #b62125;"><?php echo $n_users; ?> utilizadores</b> no website:</h4>

	<div class="table-responsive">
		<table class="table table-dark table-hover">
			<thead>
				<tr>
					<td>Foto</td>
					<td>Nome</td>
					<td>Email</td>
					<td>Estatuto</td>
					<td>Data de Nascimento</td>
					<td>Telefone</td>
				</tr>
			</thead>
			<tbody>
				<?php

				while ($info = mysqli_fetch_array($query)) {
					$id_user = $info['id'];
					
					
					$foto_user = $info['foto'];

					$nome_user = $info['nome'];
					$apelido_user = $info['apelido'];
					$email_user = $info['email'];
					$profissao = $info['profissao'];
					$data_nascimento = $info['data_nascimento'];
					$telefone = $info['telefone'];

					echo "<tr class='clickable-row' data-href='cliente.php?id=".$id_user."' style='cursor: pointer;'>";

					echo "<td><img src='".$foto_user."' style='width: 50px; border-radius: 50%; display: inline-block;'></td>";
					echo "<td>".$nome_user." ".$apelido_user."</td>";
					echo "<td>".$email_user."</td>";
					echo "<td>".$profissao."</td>";
					echo "<td>".$data_nascimento."</td>";
					echo "<td>".$telefone."</td>";

					echo "</tr>";

				}

				?>
			</tbody>
		</table>
	</div>

</div>
<script>
	jQuery(document).ready(function($) {
		$('.clickable-row').click(function() {
			window.location = $(this).data('href');
		});
	});
</script>
<?php
include 'footer.php';
?>