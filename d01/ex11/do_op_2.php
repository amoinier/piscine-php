#!/usr/bin/php
<?php
function ft_split($str, $c)
{
	$tab = explode($c, $str);
	$tab = array_values(array_filter($tab));
	return ($tab);
}
if ($argc == 2)
{
	$tab = $argv[1];
	if (strstr($tab, '+'))
	{
		$tab = ft_split($tab, '+');
		$i = $tab[0] + $tab[1];
	}
	else if (strstr($tab, '-'))
	{
		$tab = ft_split($tab, '-');
		$i = $tab[0] - $tab[1];
	}
	else if (strstr($tab, '/'))
	{
		$tab = ft_split($tab, '/');
		$i = $tab[0] / $tab[1];
	}
	else if (strstr($tab, '*'))
	{
		$tab = ft_split($tab, '*');
		$i = $tab[0] * $tab[1];
	}
	else if (strstr($tab, '%'))
	{
		$tab = ft_split($tab, '%');
		$i = $tab[0] % $tab[1];
	}
	$tab[0] = trim($tab[0]);
	$tab[1] = trim($tab[1]);
	if (ctype_digit($tab[0]) && ctype_digit($tab[1]))
		echo $i."\n";
	else
		echo "Syntax Error\n";
}
else
	echo "Incorrect Parameters\n";
?>
