<?php
header('Location: panier.php');
function read_basket($basket)
{
	$total = 0;
	$a = "Your order is being validated !\n\n";
	foreach ($basket as $key => $val)
	{
		$s = 0;
		foreach ($val as $key => $val2)
		{
			if ($val2 == $val['item'])
				$a .= "Item: ".$val2." ";
			if ($val2 == $val['qte'])
			{
				$s = $val2;
				$a .= "Qantity: ".$s." ";
			}
			if ($val2 == $val['prix'])
			{
				$s = $s * $val2;
				$total = $total + $s;
				$a .= "Price: ".$s."euro(s)";
			}
		}
		$a .= "\n";
	}
	$a .= "\nTotal: ".$total."euro(s)";
	return ($a);
}
session_start();
if ($_POST['submit'] === 'YES')
{
	$data = unserialize(file_get_contents("database/bdd.csv"));
	foreach ($_SESSION['basket'] as $key1 => $val1)
	{
		foreach ($data as $key2 => $val2)
		{
			if ($val1['item'] == $val2['item'])
			{
				$data[$key2]['qte'] = $data[$key2]['qte'] - $val1['qte'];
			}
		}
		file_put_contents("database/bdd.csv", serialize($data));
	}
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
			$count = 0;
			if ($data[$ok]['purchase'])
			{
				foreach ($data[$ok]['purchase'] as $key => $val) {
					$count = $key + 1;
				}
			}
			$data[$ok]['purchase'][$count] = $_SESSION['basket'];
			$str = read_basket($_SESSION['basket']);
			mail($data[$_SESSION['nblogin']]['mail'], "Your command - E-CHEAP", $str);
			unset($_SESSION['basket']);
			if ($_SESSION['login'])
			{
				unset($data[$ok]['basket']);
				file_put_contents("database/account.csv", serialize($data));
			}
		}
	}
}
?>
