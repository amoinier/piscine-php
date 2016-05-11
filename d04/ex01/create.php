<?php
	if ($_POST["login"] && $_POST["passwd"] && $_POST["submit"] === "OK")
	{
		if (!file_exists("../private"))
			mkdir("../private");
		if (!file_exists("../private/passwd"))
			file_put_contents("../private/passwd", "");
		$data = unserialize(file_get_contents("../private/passwd"));
		$i = 1;
		if ($data)
		{
			foreach ($data as $key => $val)
			{
				if ($val['login'] === $_POST["login"])
				{
					echo "ERROR\n";
					$i = 0;
				}
				$ok = $key + 1;
			}
		}
		if ($i != 0)
		{
			$data[$ok]['login'] = $_POST['login'];
			$data[$ok]['passwd'] = hash(whirlpool, $_POST['passwd']);
			file_put_contents("../private/passwd", serialize($data));
			echo "OK\n";
		}
	}
	else
		echo "ERROR\n";
?>
