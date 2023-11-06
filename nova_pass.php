<?php
if (isset($_POST['done'])) {
	$password = $_POST['password'];
	$pass_encriptada = password_hash($password, PASSWORD_DEFAULT);
	echo "Password: $password <br> Password Encriptada: $pass_encriptada";
}
?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
<form method="POST">
	<input type="text" name="password" placeholder="Password">
	<button type="submit" name="done">Encriptar</button>
</form>
</body>
</html>