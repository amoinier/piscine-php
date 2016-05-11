#!/usr/bin/php
<?php
function ft_split($str)
{
	$tab = explode(' ', $str);
	sort($tab);
	$tab = array_values(array_filter($tab));
	return ($tab);
}
$tab = $argv;
unset($tab[0]);
$tab = array_values($tab);
$tab2 = array();
foreach ($tab as $key => $val)
{
	if (strstr($val, ' '))
	{
		$tab2 = array_merge($tab2, ft_split($val));
		unset($tab[$key]);
	}
}
$tab = array_merge($tab, $tab2);
sort($tab);
foreach ($tab as $val)
	echo $val."\n";
?>
