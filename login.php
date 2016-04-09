<?php
header('Location: index.html');
session_start();?>
<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<title>login</title>
	</head>
	<body>
		<?php
		include("auth.php");
		if ($_POST["login"] && $_POST["passwd"])
		{
			if (auth($_POST['login'], $_POST['passwd']))
			{
				$_SESSION['login'] = $_POST['login'];
				$data = unserialize(file_get_contents("database/account.csv"));
				if ($data)
				{
					foreach ($data as $key => $val)
					{
						if ($val['login'] === $_SESSION['login'])
						{
							$_SESSION['nblogin'] = $key;
						}
					}
				}
				if ($_SESSION['basket'])
				{
					$data[$_SESSION['nblogin']]['basket'] = $_SESSION['basket'];
					file_put_contents("database/account.csv", serialize($data));
				}
			}
		}
		?>
	</body>
</html>
