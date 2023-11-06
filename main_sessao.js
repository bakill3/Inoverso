$(document).ready(function() {
	//VERFICAR SE EXISTEM MENSAGENS
	setInterval(function() {
		var id_other = $("#id_other").val();
		$.ajax({
			type: "POST",
			url: "ajax/notifica-mensagens-nao-vistas.php",
			data: {

			},
			success: function(data){
				$('#vista_notificaoes').html(data);
				$('.toast').toast('show');
				$(".close_vista_notificacao").click(function(event) {
					console.log("Clicou");
					var id_notificacao = this.id;
					$.ajax({
						type: "POST",
						url: "ajax/apaga-notificacoes-nao-vistas.php",
						data: {
							id_notificacao: id_notificacao,
						},
						success: function(data){
							console.log("Fechou com sucesso");
						}
					});
				});
			}
		});
	}, 500);
	
});