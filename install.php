<html>
	<head>
		<meta charset="utf-8">
		<title>Install</title>
	</head>
	<body>
		<form action="install.php" method="post">
			Pseudo: <input type="text" name="login"><br />
			Password: <input type="password" name="passwd"><br />
			Retape your password: <input type="password" name="passwd2"><br />
			Mail: <input type="email" name="mail"><br />
			<input type="submit" name="submit" value="install">
		</form>
	</body>
</html>
<?php
if ($_POST['submit'] === istall)
{
	if (!file_exists("database") && !file_exists("database/bdd.csv") && !file_exists("database/account.csv") && !file_exists("database/category.csv"))
	{
		mkdir("database");
		if (!file_exists("database/account.csv"))
			file_put_contents("database/account.csv", "");
		if (!file_exists("database/bdd.csv"))
			file_put_contents("database/bdd.csv", "");
		if (!file_exists("database/category.csv"))
			file_put_contents("database/category.csv", "");
		if (!file_exists("database/account.csv"))
			file_put_contents("database/account.csv", "");
		$data = unserialize(file_get_contents("database/account.csv"));
		if ($_POST['passwd'] === $_POST['passwd2'] && $_POST['login'] &&
		$_POST['mail'])
		{
			$data[0]['login'] = $_POST['login'];
			$data[0]['passwd'] = hash(whirlpool, $_POST['passwd']);
			$data[0]['mail'] = $_POST['mail'];
			$data[0]['admin'] = 1;
			$data[0]['id'] = 0 + 1;
			file_put_contents("database/account.csv", serialize($data));
			$_SESSION['login'] = $_POST['login'];
		}
		else
		{
			?>
			<meta http-equiv="refresh" content='0;URL=install.php'/>
			<?php
		}
		?>
		<meta http-equiv="refresh" content='0;URL=articles.php'/>
		<?php
	}
	else
		echo "The databse is already create.";
}
?>