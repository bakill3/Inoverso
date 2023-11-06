<?php
include 'header.php';
$query = mysqli_query($link, "SELECT * FROM portfolio INNER JOIN users ON portfolio.id_user = users.id ORDER BY portfolio.id_trabalho DESC");
?>
<div style="padding: 3%; margin-bottom: 7%;">
	<?php
	if (mysqli_num_rows($query) > 0) {
		$x = 0;
		while ($info = mysqli_fetch_array($query)) {
			$x += 1;
			echo $x;
			$id_trabalho = $info['id_trabalho'];
			$nome_trabalho = $info['nome_trabalho'];
			$descricao_trabalho = $info['descricao_trabalho'];
			$descricao_trabalho = substr($descricao_trabalho, 0, 100)."...";

			$capa = $info['capa'];

			$nome = $info['nome'];
			$apelido = $info['apelido'];
			$foto_perfil = $info['foto'];

			if ($x == 1 || $x % 5 == 0) {
				echo "<div class='card-deck' style='padding-bottom: 1%;'>";
			}

			echo "

			<div class='card card_responsive_js' style='max-width: 31%;'>
				<a class='nostyle' href='publicacao.php?id=".$id_trabalho."' style='cursor: pointer;'><img class='card-img-top' src='$capa' alt='$nome_trabalho' style='height:100%; max-height: 300px;'></a>
				<div class='card-body'>
				<a class='nostyle' href='publicacao.php?id=".$id_trabalho."' style='cursor: pointer;'>
					<h5 class='card-title Neue-bold'>$nome_trabalho</h5>
					<p class='card-text OpenSans-Regular' style='font-size: 15px;'>$descricao_trabalho</p>
					</a>
				</div>
			</div>

			";

			if ($x == 4 || $x % 4 == 0) {
				echo "</div>";
			}

		}

	}
	?>

</div>

<?php
include 'footer.php';
?>
