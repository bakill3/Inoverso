<?php
include 'header.php';
if (isset($_SESSION['user'])) {
	header('Location: home.php');
	exit(0);
}
?>

<span class="display-4">Novo Projeto</span>
<?php
if (isset($_SESSION['error'])) {
	echo "<p class='text-danger'>".$_SESSION['error']."</p>";
	unset($_SESSION['error']);
}
?>
<form method="POST">
	<div class="form-group">
		<input type="email" name="email" class="form-control" placeholder="Email">
	</div>
	<div class="form-group">
		<input type="text" name="name" class="form-control" placeholder="Name">
	</div>
		<div class="form-group">
		<input type="text" name="surname" class="form-control" placeholder="Surname">
	</div>
	<div class="form-group">
		<input type="text" name="username" class="form-control" placeholder="Username">
	</div>
	<div class="form-group">
		<input type="password" name="pass1" class="form-control" placeholder="Password">
	</div>
	<div class="form-group">
		<input type="password" name="pass2" class="form-control" placeholder="Repeat Password">
	</div>
	<button type="submit" class="btn btn-warning" style="width: 100%;" name="register">Register</button>
	<a href="index.php" target="_blank">Login</a>
</form>

<?php
include 'footer.php';
?>
