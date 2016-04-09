<?php
header('Location: edit_user.php');
session_start();
if (!file_exists("database/account.csv"))
	file_put_contents("database/account.csv", "");
$data = unserialize(file_get_contents("database/account.csv"));
$i = 1;
		if ($data)
		{
			foreach ($data as $key => $val)
			{
				if ($val['id'] == $_POST['id'])
				{
					$i = 0;
					$ok = $key;
				}
			}
		}
		if ($i == 0 && $_POST['submit'] === 'EDIT')
		{
			if ($_POST['login'] && $_POST['fname'] && $_POST['lname'] &&
			$_POST['mail'] && $_POST['street'] && $_POST['postalcode'] &&
			$_POST['city'] && $_POST['admin'])
			{
				$data[$ok]['login'] = $_POST['login'];
				$data[$ok]['fname'] = $_POST['fname'];
				$data[$ok]['lname'] = $_POST['lname'];
				$data[$ok]['mail'] = $_POST['mail'];
				$data[$ok]['street'] = $_POST['street'];
				$data[$ok]['postalcode'] = $_POST['postalcode'];
				$data[$ok]['city'] = $_POST['city'];
				$data[$ok]['admin'] = $_POST['admin'];
				file_put_contents("database/account.csv", serialize($data));
			}
			else {
				?>
				<meta http-equiv="refresh" content='0;URL=edit_user.php'/>
				<?php
			}
		}
		else if ($i == 0 && $_POST['submit'] === 'DEL')
		{
			unset($data[$ok]);
			$data = array_values(array_filter($data));
			file_put_contents("database/account.csv", serialize($data));
			echo "OK\n";
		}
		else
			echo "ERROR\n";
?>
