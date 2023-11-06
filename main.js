/*
if ('serviceWorker' in navigator) {
	window.addEventListener('load', () => {
		navigator.serviceWorker
		.register('sw_cached_site.js')
		.then(reg => console.log('Service Worker: Registered (Pages)'))
		.catch(err => console.log(`Service Worker: Error: ${err}`));
	});
}
*/
function hasNumber(myString) {
	return /\d/.test(myString);
}

function validateEmail(email) {
	var re = /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
	return re.test(String(email).toLowerCase());
}

$(document).ready(function() {
	
	$(".ver_anexo").click(function(event) {
		var id_projeto = this.id;
		if ($("#anexo_file_" + id_projeto).is(":visible")) {
			$("#anexo_file_" + id_projeto).hide();
			$(this).text("Ver Anexo");
		} else {
			$(this).text("Fechar Anexo");
			$("#anexo_file_" + id_projeto).show();
		}
		
	});

	$("#enviar").click(function(event) {
		var formData = new FormData(this);
		var nome = $("#nome").val();
		var apelido = $("#apelido").val();
		var email = $("#email").val();
		var nome_do_negocio = $("#nome_do_negocio").val();
		var website = $("#website").val();
		var cidade = $("#cidade").val();
		var descricao = $("#descricao").val();
		var gasto = $("#gasto").val();

		var telefone = $("#telemovel").val();
		var date = new Date($('#data_nascimento').val());
		day = date.getDate();
		month = date.getMonth() + 1;
		year = date.getFullYear();
		var data = [day, month, year].join('/');
		console.log(data);

		var compare_dates = function(date1,date2){
			if (date1>date2) return ("Date1 > Date2");
			else if (date1<date2) return ("Date2 > Date1");
			else return ("Date1 = Date2"); 
		}

		/*

		var now = new Date();
		var month = now.getMonth()+1;
		var day = now.getDate();
		var now_date = ((''+day).length<2 ? '0' : '') + day + '/' + ((''+month).length<2 ? '0' : '') + month + '/' + now.getFullYear();

		console.log(now_date);

		console.log("-------------------");
		console.log(compare_dates(now_date, data));
		*/

		if (nome == "" || apelido == "" || email == "" || nome_do_negocio == "" || website == "" || cidade == "" || descricao == "" || gasto == "" || data == "" || telefone == "") {
			$("#error").text("Preencha todos os campos");
		} else if (hasNumber(nome) || hasNumber(apelido) || hasNumber(cidade)) {
			$("#error").text("Não meta números no Nome/Apelido/Cidade");
			console.log(hasNumber(cidade));
		} else if(validateEmail(email)) {


			if (document.getElementById("file-anexo").files.length > 0) {
				var unico = 1;

				console.log("a ir buscar o file");
				var name = document.getElementById("file-anexo").files[0].name;
				var form_data = new FormData();
				var oFReader = new FileReader();
				oFReader.readAsDataURL(document.getElementById("file-anexo").files[0]);
				form_data.append("file", document.getElementById('file-anexo').files[0]);
				form_data.append("teste", "coninha");
				console.log("appended");

				$.ajax({
					type: "POST",
					url: "ajax/formulario.php",
					beforeSend: function() {
						$('#progress_formulario').show();
						$("#span_enviar_anexo").html("<div id='loader-icon'><img src='img/loader.gif' style='width: 21%;' /></div>");
						//$('#loader-icon').show();

						$('.progress-bar').width('50%');
						$('#enviar').prop('disabled', true);

					},
					data: {
						nome: nome, 
						apelido: apelido,
						email: email,
						nome_do_negocio: nome_do_negocio,
						website: website,
						cidade: cidade,
						descricao: descricao,
						gasto: gasto,
						unico: unico,
						telefone: telefone,
						data: data,
					},
					success:function(data)
					{


						$.ajax({
							url: "ajax/anexo.php", 
							uploadProgress: function(event, position, total, percentageComplete)
							{
								$('.progress-bar').animate({
									width: percentageComplete + '%'
								}, {
									duration: 1000
								});
							},
							type: "POST",             
							data: form_data, 
							contentType: false,       
							cache: false,           
							processData:false,       
							success: function(data)  
							{	
								console.log("Sucesso");
								$('#loader-icon').hide();
								$('.progress-bar').width('100%');
								$('#enviar').prop('disabled', false);
								$('.progress-bar').width('0%');
								swal("Sucesso!", "Projeto enviado! Foi-lhe enviado um email com mais detalhes", "success");

								$("#span_enviar_anexo").html('Anexo <input type="file" id="file-anexo">');
								$('#progress_formulario').hide();
							}
						});


					}

				});



			} else {

				$.ajax({
					type: "POST",
					url: "ajax/formulario.php",
					beforeSend: function() {
						//$('#loader-icon').show();
						$('#enviar').prop('disabled', true);
						$('.progress-bar').width('100%');
						

					},
					data: {
						nome: nome, 
						apelido: apelido,
						email: email,
						nome_do_negocio: nome_do_negocio,
						website: website,
						cidade: cidade,
						descricao: descricao,
						gasto: gasto,
						telefone: telefone,
						data: data,
					},
					success:function(data)
					{
						$('#enviar').prop('disabled', false);
						swal("Sucesso!", "Projeto enviado! Foi-lhe enviado um email com mais detalhes", "success");
						$("#span_enviar_anexo").html('Anexo <input type="file" id="file-anexo">');
						$('#progress_formulario').hide();
						//alert(data);
					}

				});
				
			}




		} else {
			$("#error").text("Email Inválido");
		}

	});


var login_backend = function() {
	var email = $("#email").val();
	var password = $("#password").val();

	if (email == "" || password == "") {
		$("#error").text("Preencha todos os inputs");
	} else {
		$.ajax({
			type: "POST",
			url: "ajax/login_backend.php",
			data: {
				email: email, 
				password: password,
			},
			success:function(data)
			{
				if (data == "1") {
					window.location.href = "dashboard.php";
				} else if (data == "0") {
					window.location.href = "orcamentos.php";
				} else {
					$("#error").text(data);
				}
			}

		});
	}
};

$('#login').click(login_backend);

$("input").keypress(function() {
	if (event.which == 13) login_backend();
});

var pagina = location.pathname;

	//if (pagina == "/mensagens.php") {

		//ENVIAR MENSAGEM
		
//}


if (window.matchMedia('(max-width: 500px)').matches) {
	$("#form_css1").addClass('form_css_responsive');

	$("#form_css1_sobre").addClass('form_css_responsive');
	$("#form_css1_sobre").addClass('form_css1_sobre_class');


	

	$("#form_css2").css("width", "100%");

	$('.no-aos').removeAttr('data-aos');

	$("#div_child_form").css('display', 'table-row');

	$("#form_css2").css('display', 'table');

}
$("#logo").click(function(event) {
	window.location.href = "index.php";
});
$(document).ready(function(){
	$('.toast').toast('show');
});




if (window.matchMedia('(max-width: 768px)').matches) {
	$("#left_dashboard_nav").hide();
	$("#btn_responsive_nonav").show();
	$("#btn_responsive_nonav").css('display', 'inline-block');
	$("#second_nav_content").css('width', '96%');
	$("#btn_responsive_nonav_2").css("display", "block");
	$(".card_responsive_js").css("max-width", "100%");
}

$("#btn_responsive_nonav").click(function(event) {
	$("#btn_responsive_nonav").hide(300);
	$("#left_dashboard_nav").css('width', '100%', 'important');
	$("#left_dashboard_nav").show(300);
	$("#menu_left").css('padding-top', '0%', 'important');
	$("#second_nav_content").css('display', 'none');9
	$("#img_dash_div").css('padding-top', '10%', 'important');
	$("#img_dash").css('width', '40%', 'important');

			//$("#second_nav_content").css('width', '82%');
			//$("#second_nav_content").css('padding-left', '5%');
		});

$("#btn_responsive_nonav_2").click(function(event) {
	$("#left_dashboard_nav").hide(300);
	$("#btn_responsive_nonav").show(300);
	$("#btn_responsive_nonav").css('display', 'inline-block');
	$("#second_nav_content").css('width', '96%');
	$("#second_nav_content").css('display', 'inline-block');
			//$("img_dash_div").css('padding-top', '10%', 'important');
		});

});





