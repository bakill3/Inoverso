<?php
include 'header.php';
if (isset($_GET['id'])) {
	$id_projeto = htmlspecialchars(mysqli_real_escape_string($link, $_GET['id']));
	$query = mysqli_query($link, "SELECT * FROM portfolio INNER JOIN users ON portfolio.id_user = users.id WHERE portfolio.id_trabalho = '$id_projeto'");
	$info = mysqli_fetch_assoc($query);
	$nome_trabalho = $info['nome_trabalho'];
	$descricao_trabalho = $info['descricao_trabalho'];
	$imagem = $info['imagem'];

	$nome = $info['nome'];
	$apelido = $info['apelido'];
	$foto_autor = $info['foto'];
	$tamanho = $info['tamanho'];

	?>


	<div style="padding: 5%;" id="publicacao_padding_div">
		<div class="card mb-3">
			
			<div class="card-body">
				<h5 class="card-title Neue-bold"><?php echo $nome_trabalho; ?></h5>
				<p class="card-text Neue-regular" style="font-size: 15px;"><?php echo $descricao_trabalho; ?></p>

				<p class="card-text Neue-regular" style="font-size: 15px;"><small class="text-muted" style="display: inline-block;">Autor: <img src="<?php echo $foto_autor; ?>" style="width: 10%; border-radius: 50%; display: inline-block;">&nbsp;<b><?php echo $nome." ".$apelido; ?></b></small></p>
				
			</div>

			<div class="text-center" style="background-color: rgba(65, 64, 66, 1);">
				<img class="card-img-bottom" src="<?php echo $imagem; ?>" alt="Card image cap" style="box-shadow: 0px 5px 10px 3px rgba(0, 0, 0, 0.3)">
			</div>
			
		</div>	
	</div>


	<?php
}
include 'footer.php';
?>
