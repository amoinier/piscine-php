#!/usr/bin/php
<?php
function ft_split($str)
{
	$tab = explode(' ', $str);
	$tab = array_values(array_filter($tab));
	return ($tab);
}
$str = $argv[1];
$tab = ft_split($str);
foreach ($tab as $key => $val)
{
	if ($key != 0)
		echo $val." ";
}
if ($argc >= 2)
	echo $tab[0]."\n";
?>
