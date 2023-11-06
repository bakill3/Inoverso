<?php
include '../db_connect.php';
$btns=array("warning", "info", "default", "dark");
$id_user = $_SESSION['login'][1];
$id_other = htmlspecialchars(mysqli_real_escape_string($link, $_POST['id_other']));

//$query = mysqli_query($connection, "SELECT * FROM mensagens WHERE user_from='$id_user' AND user_to='$id_other' OR user_from='$id_other' AND user_to='$id_user' ORDER BY data ASC");
$query = mysqli_query($link, "SELECT * FROM users INNER JOIN mensagens ON users.id = mensagens.user_from WHERE mensagens.user_from = '$id_user' AND mensagens.user_to = '$id_other' OR mensagens.user_from = '$id_other' AND mensagens.user_to = '$id_user' ORDER BY mensagens.data ASC");

while ($info = mysqli_fetch_array($query)) {
	$message = $info['mensagem'];
	$nome = $info['nome'];
	$apelido = $info['apelido'];
	$date_sent = $info['data'];
	$nova_data = date('d/m/Y H:i', strtotime($date_sent));
	$user_from = $info['user_from'];
	$foto = $info['foto'];

	if ($user_from == $id_user) {
		$align = "right";
		$cor = "#b62125";
	} else {
		$align = "left";
		$cor = "#003d60";
	}

	echo "
	<div class='col-md-7 text-white float-".$align."' style='padding: 1.5%;'>
	<div class='card' style='background-color: ".$cor."'>
	<div class='card-header'>
	<img src='$foto' style='width: 10%; border-radius: 50%;'><span class='Neue-bold responsive' style='font-size: 15px; margin-left: 1.5%;'>".$nome." ".$apelido."</span> 
	</div>
	<div class='card-body'>
	<span class='Neue-regular'>". $message."</span>
	</div>
	<div class='card-footer'><span class='text-secondary'>".$nova_data."</span></div>
	</div>
	</div>
	";
}
?>