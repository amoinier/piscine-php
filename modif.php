<?php
	session_start();
	header('Location: index.html');
	if ($_POST["submit"] === "OK" && file_exists("database") &&
	file_exists("database/account.csv"))
	{
		$data = unserialize(file_get_contents("database/account.csv"));
		$i = 1;
		if ($data)
		{
			foreach ($data as $key => $val)
			{
				if ($val['login'] === $_SESSION['login'])
				{
					$i = 0;
					$ok = $key;
				}
			}
			if ($i == 0 && $data[$ok]['passwd'] === $_POST['oldpw'])
			{
				$data[$ok]['passwd'] = hash(whirlpool, $_POST['newpw']);
				file_put_contents("database/account.csv", serialize($data));
				echo "OK\n";
			}
			if ($i == 0 && $_POST['mail'])
			{
				$data[$ok]['mail'] = $_POST['mail'];
				file_put_contents("database/account.csv", serialize($data));
				echo "OK\n";
			}
			if ($i == 0 && $_POST['fname'])
			{
				$data[$ok]['fname'] = $_POST['fname'];
				file_put_contents("database/account.csv", serialize($data));
				echo "OK\n";
			}
			if ($i == 0 && $_POST['lname'])
			{
				$data[$ok]['lname'] = $_POST['lname'];
				file_put_contents("database/account.csv", serialize($data));
				echo "OK\n";
			}
			if ($i == 0 && $_POST['street'])
			{
				$data[$ok]['street'] = $_POST['street'];
				file_put_contents("database/account.csv", serialize($data));
				echo "OK\n";
			}
			if ($i == 0 && $_POST['postalcode'])
			{
				$data[$ok]['postalcode'] = $_POST['postalcode'];
				file_put_contents("database/account.csv", serialize($data));
				echo "OK\n";
			}
			if ($i == 0 && $_POST['city'])
			{
				$data[$ok]['city'] = $_POST['city'];
				file_put_contents("database/account.csv", serialize($data));
				echo "OK\n";
			}
		}
	}
	else if ($_POST["submit"] === "destroy" && file_exists("database") &&
	file_exists("database/account.csv"))
	{
		$data = unserialize(file_get_contents("database/account.csv"));
		$i = 1;
		if ($data)
		{
			foreach ($data as $key => $val)
			{
				if ($val['login'] === $_SESSION['login'])
				{
					$i = 0;
					$ok = $key;
				}
			}
			if ($i == 0)
			{
				unset($data[$ok]);
				$data = array_values(array_filter($data));
				file_put_contents("database/account.csv", serialize($data));
				session_destroy();
				echo "OK\n";
			}
		}
	}
	else
		echo "ERROR\n";
?>
