<?php
	header('Location: panier.php');
	session_start();
	if ($_POST['submit'] === EDIT)
	{
		foreach ($_SESSION['basket'] as $key => $val)
		{
			if ($_POST['item'] === $val['item'])
			{
				if ($_POST['qte'] == 0)
				{
					unset($_SESSION['basket'][$key]);
					$_SESSION['basket'] = array_values(array_filter($_SESSION['basket']));
				}
				else
				{
					$_SESSION['basket'][$key]['qte'] = $_POST['qte'];
				}
			}
		}
	}
	else if ($_POST['submit'] === DEL)
	{
		foreach ($_SESSION['basket'] as $key => $val)
		{
			if ($_POST['item'] === $val['item'])
			{
				unset($_SESSION['basket'][$key]);
				$_SESSION['basket'] = array_values(array_filter($_SESSION['basket']));
			}
		}
	}
?>
