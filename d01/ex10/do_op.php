#!/usr/bin/php
<?php
if ($argc == 4)
{
	$tab = $argv;
	$ok = $tab[0];
	unset($tab[0]);
	$tab = array_values($tab);
	foreach ($tab as $val)
		$val = trim($val);
	if (strstr($tab[1], '+'))
		echo $tab[0]+$tab[2];
	else if (strstr($tab[1], '-'))
		echo $tab[0]-$tab[2];
	else if (strstr($tab[1], '*') || strstr($tab[1], $ok))
		echo $tab[0]*$tab[2];
	else if (strstr($tab[1], '/'))
		echo $tab[0]/$tab[2];
	else if (strstr($tab[1], '%'))
		echo $tab[0]%$tab[2];
	echo "\n";
}
else
	echo "Incorrect Parameters\n";
?>
