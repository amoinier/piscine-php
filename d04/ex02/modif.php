<?php
	if ($_POST["login"] && $_POST["oldpw"] && $_POST["newpw"] &&
	$_POST["submit"] === "OK" && file_exists("../private") &&
	file_exists("../private/passwd"))
	{
		$data = unserialize(file_get_contents("../private/passwd"));
		$i = 1;
		if ($data)
		{
			foreach ($data as $key => $val)
			{
				if ($val['login'] === $_POST["login"] && $val['passwd'] === hash(whirlpool, $_POST['oldpw']))
				{
					$i = 0;
					$ok = $key;
				}
			}
		}
		if ($i == 0)
		{
			$data[$ok]['passwd'] = hash(whirlpool, $_POST['newpw']);
			file_put_contents("../private/passwd", serialize($data));
			echo "OK\n";
		}
		else
		{
			echo "ERROR\n";
		}
	}
	else
		echo "ERROR\n";
?>
