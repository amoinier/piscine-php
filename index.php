<?php
session_start();
?>
<html>
	<head>
		<meta charset="utf-8">
		<title>login</title>
		<link rel="stylesheet" href="./css/index.css" charset="utf-8">
		</style>
	</head>
	<body>
		<?php
		if (!$_SESSION['login'])
		{
			?>
			<form action="login.php" method="POST">
				Identifiant: <input type="text" name="login" value=><br />
				Mot de passe: <input type="password" name="passwd" value=>
				<input type="submit" name="submit" value="OK">
			</form>
			<a href="create.html">Creez votre compte</a><br />
			<?php
		}
		if ($_SESSION['login'])
		{
			?>
			<a href="modif.html">Modify your account</a><br />
			<a href="logout.php">Log out</a><br />
			<?php
		}
		?>
	</body>
</html>
