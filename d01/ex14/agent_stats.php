#!/usr/bin/php
<?php
function ft_split($str, $c)
{
	$tab = explode($c, $str);
	sort($tab);
	$tab = array_values(array_filter($tab));
	return ($tab);
}
function is_digit($c)
{
	if (ord($c) >= 48 && ord($c) <= 57)
		return (1);
	else
		return (0);
}
$i = 0;
$moy = 0;
$div = 0;
$str = array();
$tab = array();
if (strstr($argv[1], "moyenne"))
{
	while (!feof(STDIN))
	{
		$str[$i] = fgets(STDIN);
		$tab = array_merge($tab, ft_split($str[$i], ';'));
		$i++;
	}
	foreach ($tab as $key => $val)
	{
		if (is_digit($val[0]))
		{
			$moy = $moy + $str[$i];
			$div++;
		}
	}
	echo $div;
	print_r($tab);
}

?>
