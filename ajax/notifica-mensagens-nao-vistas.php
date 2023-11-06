<?php
include '../db_connect.php';
$id_user = $_SESSION['login'][1];

$query = mysqli_query($link, "SELECT * FROM notificacoes INNER JOIN users ON notificacoes.id_user_recebeu = users.id WHERE users.id='$id_user' AND notificacoes.vista_notificacoes='1'");
$output = '';
if (mysqli_num_rows($query) > 0) {
	while ($info = mysqli_fetch_array($query)) {
		$nome = $_SESSION['login'][2];
		$apelido = $_SESSION['login'][3];
		$id_notificacao = $info['id_notificacao'];

		$output = "
		<div aria-live='polite' aria-atomic='true' style='position: relative; min-height: 200px;'>
		  <div class='toast' style='position: absolute; top: 0; right: 0; /*background-color: rgba(182, 33, 37, 1);*/ box-shadow: 0px 0px 10px 3px rgba(0, 0, 0, 0.4); border: 1px solid black;' data-autohide='false'>
		    <div class='toast-header text-white' style='/*color: #414042 !important;*/ background-color: #00468C;'>
		      <img src='logo_white.png' class='rounded mr-2' alt='logo' style='width: 15px;'>
		      <strong class='mr-auto Neue-bold'>i9 - Mensagens Pendentes</strong>
		      <small>1 mis</small>
		      <button type='button' class='ml-2 mb-1 close close_vista_notificacao' data-dismiss='toast' aria-label='Close' id='$id_notificacao'>
		        <span aria-hidden='true'>&times;</span>
		      </button>
		    </div>
		    <div class='toast-body Neue-regular' style='color: #00468C;'>
		      Olá ".$nome." ".$apelido.", tem mensagens por ler.
		    </div>
		  </div>
		</div>
		";
		//mysqli_query($link, "UPDATE notificacoes SET vista_notificacoes='0' WHERE id_user_recebeu='$id_user'");
		//mysqli_query($link, "UPDATE users SET vista_notificacao='0' WHERE id='$id_user'");
	}
	
}
echo $output; 
?>