
</div>
<div style="position: fixed; top: 2%; right: 1%; z-index: 35; display: inline-block; width: 50%;" id="vista_notificaoes">

</div>
<div id="footer" class="text-center lead fixed-bottom">
	<div class="col-md-4 text-center" style="margin: 0 auto;">

		<div class="responsive" style="font-size: 13px;">
			<!--<span style="display: block;">
				<i style="padding-top: 5%;" class="fab fa-facebook"></i>
				<i class="fab fa-instagram"></i></span> --!>
				<span style="display:block; padding-top: 3%;">Programação | Design Gráfico | Portimão | Faro | Portugal</span>
			</div>
		</div>
	</div>
	<?php
	if (isset($_SESSION['login'])) {
		echo "<script src='main_sessao.js'></script>";
	}
	?>

	<script src="main.min.js"></script>
	<script src="dist/aos.js"></script>
	<script>
		AOS.init({
			easing: 'ease-in-out-sine'
		});
	</script>
	<script src="dist/sweetalert.min.js"></script>
</body>
</html>
